<?php

namespace App\Http\Controllers;

use App\Models\Avatar;
use App\Models\Camper;
use App\Models\Client;
use App\Models\Message;
use App\Models\User;
use DB;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Session;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public static function getValue($field, $table, $id)
    {
        return DB::table($table)->find($id)->$field;
    }
    public static function getLabelFromObject($data)
    {
        $label = $data->label_en;
        switch (app()->getLocale()) {
            case 'fr':
                $label = $data->label_en;
                break;
            case 'de':
                $label = $data->label_en;
                break;
            default:
                $label = $data->label_en;
        }
        return $label;
    }
    public static function getLabel($table, $id)
    {
        $data = DB::table($table)->find($id);
        return $data ? self::getLabelFromObject($data) : '';
    }

    public static function getMessageCount()
    {
        return Message::where('status', 0)->orderby('send_date')->get()->count();
    }
    public static function getCampersCount()
    {
        return Camper::where('is_confirmed', 0)->get()->count();
    }
    public static function getNotReadedMessages()
    {
        return Message::where('status', 0)->orderby('send_date')->get();
    }
    public static function getUser($id)
    {
        $user = User::find($id);
        return $user ? $user->name : '';
    }
    public static function getConnectedClient()
    {
        $email = Session::get('_client');
        return Client::where('email', $email)->first();
    }
    public static function getConnectedClientLastName()
    {
        $client = self::getConnectedClient();
        return $client ? self::getClientName($client->id) : '';
    }
    public static function getClientName($id)
    {
        $client = Client::find($id);
        return $client ? $client->client_last_name . ' ' . $client->client_name : '';
    }

    public static function getConnectedClientAvatarOrPicture()
    {
        $client = self::getConnectedClient();
        if ($client->photo != null) {
            return $client->photo;
        } else {
            $avatar = Avatar::find($client->id_avatars);
            return $avatar ? $avatar->image : 'default.jpg';
        }
    }

    public static function getCamperCategories()
    {
        return DB::table('camper_categories')->get();
    }

    public static function getCamperCategorie($idCamper)
    {
        return DB::table('campers')
            ->join('camper_categories', 'camper_categories.id', '=', 'campers.id_camper_categories')
            ->where('campers.id', $idCamper)
            ->select('camper_categories.*')
            ->first();
    }

    public static function getNotConfirmedcampers()
    {
        return Camper::join('clients', 'clients.id', '=', 'campers.id_clients')
            ->where('campers.is_confirmed', 0)
            ->select('campers.*', 'clients.client_name', 'clients.client_last_name')
            ->orderby('campers.created_at')
            ->get();
    }
    public static function getNotificationCount()
    {
        $client = self::getConnectedClient();
        return DB::table('notifications')->where([
            ['id_owner', $client->id], ['status', 'unread']])->get()->count();
    }
    public static function getNotificationCountByType($type)
    {
        $client = self::getConnectedClient();
        return DB::table('notifications')
            ->where([
                ['id_owner', $client->id], ['status', 'unread'], ['type', $type]])->get()->count();
    }

    public static function diffDate($date1, $date2)
    {
        return (strtotime($date2) - strtotime($date1)) / (3600 * 24);
    }

    public static function getCamperAvailability($id)
    {
        $today = date('Y-m-d');
        /**
         * 0-Blocked    -----------SD-----$today------ED---
         * 1-Reserved   -----------SD-----$today------ED---
         * 2-Available   ----------ED ----$today------SD---
         */
        $booking = Booking::where('id_campers', $id)->whereDate('start_date', '<=', $today)->whereDate('end_date', '>=', $today)->first();
        if ($booking != null) {
            return $booking->id_booking_status == 7 ? 0 : ($booking->id_booking_status != 3 ? 1 : 2);
        }

        return 2;
    }
}
