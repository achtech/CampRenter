<?php

namespace App\Http\Controllers;

use App\Models\Avatar;
use App\Models\Booking;
use App\Models\BookingExtra;
use App\Models\Camper;
use App\Models\Client;
use App\Models\Insurance;
use App\Models\InsuranceExtra;
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
            ->where('campers.is_completed', 1)
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
    /**
     * -------------------From-----------To--------------
     */

    public static function getInsurance($idCategorie, $nbrDays, $tons = 0)
    {

        $t = $tons > 3.5 ? ">3" : "<=3";

        $data = Insurance::where('id_camper_categories', $idCategorie)
            ->where('nbr_days_from', "<=", $nbrDays)
            ->where('nbr_days_To', ">=", $nbrDays);
        $data = $tons == 0 ? $data->first() : $data->where('tonage', $t)->first();

        if ($data == null) {
            $data = Insurance::where('id_camper_categories', $idCategorie)->whereNull('nbr_days_To');
            $data = $tons == 0 ? $data->first() : $data->where('tonage', $t)->first();
        }

        if ($data != null) {
            return $data->initial_price + ($nbrDays - $data->nbr_days_from + 1) * $data->price_per_day;
        }
        return 0;
    }

    public static function getExtraInsurance($name, $nbrDays)
    {
        $data = InsuranceExtra::where('name', 'like', '%' . $name . '%')
            ->where('nbr_days_from', "<=", $nbrDays)
            ->where('nbr_days_To', ">=", $nbrDays)
            ->first();
        if ($data == null) {
            $data = InsuranceExtra::where('name', $name)
                ->whereNull('nbr_days_To')
                ->first();
        }
        if ($data != null) {
            return $data->initial_price + ($nbrDays - $data->nbr_days_from + 1) * $data->price_per_day;
        }
        return 0;
    }

    public static function getExtraData($name, $nbrDays)
    {

        $data = InsuranceExtra::where('name', 'like', '%' . $name . '%')
            ->where('nbr_days_from', "<=", $nbrDays)
            ->where('nbr_days_To', ">=", $nbrDays)
            ->get();
        if (count($data) == 0) {
            $data = InsuranceExtra::where('name', $name)
                ->whereNull('nbr_days_To')
                ->get();
        }
        return $data;
    }

    public static function isExtraByOwner($extra_name, $id_booking)
    {
        $booking = BookingExtra::join('insurance_extra', 'insurance_extra.id', '=', 'booking_extras.id_insurance_extra')->where('name', $extra_name)->where('id_bookings', $id_booking)->first();
        return $booking != null && $booking->price != 0;
    }

    public static function isSubExtraByOwner($extra_name, $sub_extra, $id_booking)
    {
        $booking = BookingExtra::join('insurance_extra', 'insurance_extra.id', '=', 'booking_extras.id_insurance_extra')
            ->where('name', $extra_name)->where('sub_extra', $sub_extra)->where('id_bookings', $id_booking)->first();
        return $booking != null && $booking->price != 0;
    }
    public static function isSubExtraBooking($extra_name, $id_booking)
    {
        $camper_id = Booking::find($id_booking)->id_campers;
        return DB::table('camper_insurances')
            ->join('insurance_extra', 'insurance_extra.id', '=', 'camper_insurances.id_insurance_extra')
            ->where('id_campers', $camper_id)
            ->where('name', $extra_name)
            ->get()
            ->count() > 0;

    }

    public static function hasSubExtra($extra_name)
    {
        return InsuranceExtra::where('name', $extra_name)->whereNotNull('sub_extra')->get()->count() > 0;
    }

    public static function getSubExtra($extra_name)
    {
        return InsuranceExtra::where('name', $extra_name)->get();
    }

    public static function isSubExtraIncluded($extra_name, $subExtra, $idCampers)
    {
        return DB::table('camper_insurances')
            ->join('insurance_extra', 'insurance_extra.id', '=', 'camper_insurances.id_insurance_extra')
            ->where('id_campers', $idCampers)
            ->where('name', $extra_name)
            ->where('sub_extra', $subExtra)
            ->get()
            ->count() > 0;

    }

    public static function getSubExtraData($extra_name, $sub_extra_name, $nbrDays)
    {
        $data = InsuranceExtra::where('name', 'like', '%' . $extra_name . '%')
            ->where('nbr_days_from', "<=", $nbrDays)
            ->where('nbr_days_To', ">=", $nbrDays)
            ->where('sub_extra', "like", $sub_extra_name)
            ->get();
        if (count($data) == 0) {
            $data = InsuranceExtra::where('name', $extra_name)
                ->where('sub_extra', "like", $sub_extra_name)
                ->whereNull('nbr_days_To')
                ->get();
        }
        return $data;
    }

    public static function getSubExtraInsurance($extra_name, $sub_extra_name, $nbrDays)
    {
        $data = InsuranceExtra::where('name', 'like', '%' . $extra_name . '%')
            ->where('nbr_days_from', "<=", $nbrDays)
            ->where('nbr_days_To', ">=", $nbrDays)
            ->where('sub_extra', "like", $sub_extra_name)
            ->first();
        if ($data == null) {
            $data = InsuranceExtra::where('name', $extra_name)
                ->whereNull('nbr_days_To')
                ->where('sub_extra', "like", $sub_extra_name)
                ->first();
        }
        if ($data != null) {
            return $data->initial_price + ($nbrDays - $data->nbr_days_from + 1) * $data->price_per_day;
        }
        return 0;
    }

}
