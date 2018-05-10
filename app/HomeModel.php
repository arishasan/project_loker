<?php

namespace App;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use App\LogModel as Log;

class HomeModel extends Model
{
    
    static function getUser(){
    	$user_id = AUTH::id();
    	$query = DB::table('tb_seller')
    		     ->select('*')
    			 ->where('id',$user_id)
    			 ->get();

    	return $query->toArray();
    }

    static function getActivity(){
    	$user_id = AUTH::id();
    	$query = DB::table('tb_log_activity')
    			 ->selectRaw('tb_log_activity.*,tb_seller.nama,tb_seller.created_at as `user_submit`')
    			 ->join('tb_seller','tb_log_activity.id_user','=','tb_seller.id')
    			 ->where('id_user',$user_id)
    			 ->orderBy('created_at','DESC')
    			 ->limit('5')
    			 ->get();

    	return $query->toArray();
    }

    static function getSettings(){
        $query = DB::table('tb_setting')
                 ->orderBy('created_at','DESC')
                 ->limit('1')
                 ->get();
                 
        return $query->toArray();
    }

    static function log_save($activity,$table){
        
        try {
            
            $log = new Log;
            $log->activity = $activity;
            $log->id_user = AUTH::id();
            $log->nama_table = $table;
            $log->save();

            return true;
        } catch (Exception $e) {
            return false;
        }

    }

}
