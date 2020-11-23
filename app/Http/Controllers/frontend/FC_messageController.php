<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\chat;
use DB;
class FC_messageController extends Controller
{

    public function index()
    {
        $client = Controller::getConnectedClient();
        $renters = DB::select('select  DISTINCT if(id_owners=?,id_renters,id_owners) AS id from chats where   (id_owners = ? OR id_renters = ?)' , [$client->id,$client->id,$client->id]);
        
        $ids = [];
        foreach($renters as $r){
            $ids[] = $r->id;
        }
        $messages = DB::select("select * from v_client_messages where id in (select max(id) from v_client_messages where renter_id IN (".implode(',', $ids).") group by `renter_id`)");
        return view('frontend.clients.message.index')->with('messages',$messages);
      }

    public function show($idRenter)
    {

        $client = Controller::getConnectedClient();
        $idClient = $client->id;
        $renters = DB::select('
        select  DISTINCT if(id_owners=?,id_renters,id_owners) AS id
        from    chats 
        where   (id_owners = ? OR id_renters = ?)'
        , [$client->id,$client->id,$client->id]);
        
        $ids = [];
        foreach($renters as $r){
            $ids[] = $r->id;
        }
        $messages = DB::select("select * from v_client_messages where id in (select max(id) from v_client_messages where renter_id IN (".implode(',', $ids).") group by `renter_id`)");
        $ids = Chat::where(function ($query) use ($idRenter) {
            $query->where('id_renters', $idRenter)
                  ->orWhere('id_owners', $idRenter);
        })
        ->where(function ($query) use ($idClient) {
            $query->where('id_renters', $idClient)
                  ->orWhere('id_owners', $idClient);
        })->chunkById(200, function ($ch) {
            $ch->each->update(['status' => 'read']);
        });
        $conversations = DB::table("v_client_messages")
            ->where(function ($query) use ($idRenter) {
                $query->where('renter_id', $idRenter)
                      ->orWhere('owner_id', $idRenter);
            })
            ->where(function ($query) use ($idClient) {
                $query->where('renter_id', $idClient)
                      ->orWhere('owner_id', $idClient);
            })->orderBy('id')->get();
        $id_bookings = $this->getIdBooking($idRenter);
        return view('frontend.clients.message.detail')
            ->with('messages',$messages)
            ->with('conversations',$conversations)
            ->with('activeRenter',$idRenter)
            ->with('id_bookings',$id_bookings);

    }
 
    public function store(Request $request){
        $client = Controller::getConnectedClient();
        $input = request()->except(['_token', '_method', 'action']);
        $input['created_by'] = $client->id;
        $input['updated_by'] = $client->id;
        $input['id_owners'] = $client->id;
        $input['status'] = "unread";
        $input['date_sent'] = now();
        $input['id_bookings'] = $this->getIdBooking($request->id_renters);
        dd($input);
        $data = Chat::create($input);
        return redirect(route('frontend.clients.message.detail',$request->id_renters));
    }
    
    public  static function notReadedMessageCount(){
        $client = Controller::getConnectedClient();
        return DB::table("chats")->where('status', "unread")->where('id_owners', $client->id)->get()->count();
    }

    public function getIdBooking($idRenter){
        $client = Controller::getConnectedClient();
        $idClient = $client->id;
        $data =  DB::table("v_booking_camper")
                        ->whereIn('id_renters', [$idRenter,$idClient])
                        ->whereIn('id_owners', [$idRenter,$idClient])
                        ->whereIn('status',[3,4])->first();
        return $data ? $data->id_bookings  : 0;
    }
}
