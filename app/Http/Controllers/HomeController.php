<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SettingModel as Setting;
use App\User as User;

date_default_timezone_set('Asia/Jakarta');

class HomeController extends Controller
{
    
    public function index(){
        $data['user'] = \App\HomeModel::getUser();
    	$data['activity'] = \App\HomeModel::getActivity();
    	return view('Landing')->with($data);
    }

    public function settingIndex(){

    	$check_user = \App\HomeModel::getUser();
        if($check_user[0]->level == 'Operator'){ return redirect('/'); }

        $data['user'] = $check_user;
    	$data['data_setting'] = \App\HomeModel::getSettings();
    	return view('interface/Setting')->with($data);
    }

    public function simpan_setting(Request $req){
    	
    	try {
    		
    		$check = \App\HomeModel::getSettings();
    		if(count($check) > 0){

    			$setting = new Setting;
    			$setting = Setting::findOrFail($req->input('set_id'));
    			$setting->id = $req->input('set_id');
    			$setting->SLI = $req->input('SLI');
    			$setting->SLJ = $req->input('SLJ');
    			$setting->SMS_domestic = $req->input('SMS_dom');
    			$setting->SMS_international = $req->input('SMS_int');
    			$setting->save();

    		}else{

    			$setting = new Setting;
    			$setting->SLI = $req->input('SLI');
    			$setting->SLJ = $req->input('SLJ');
    			$setting->SMS_domestic = $req->input('SMS_dom');
    			$setting->SMS_international = $req->input('SMS_int');
    			$setting->save();

    		}

    		$log = \App\HomeModel::log_save('Change Setting','tb_setting');

    		return redirect('setting')->with('success','Setting has been saved.');
    	} catch (Exception $e) {
    		return redirect('setting')->with('success','Setting failed to be saved.');
    	}

    }

    public function ubah_passwordIndex(){
    	$data['user'] = \App\HomeModel::getUser();
    	return view('interface/Ubah_password')->with($data);
    }

    public function simpan_ubah_password(Request $req){
    	$rules = [
            'password' => 'required|confirmed',
            'password_confirmation' => 'required',
        ];

        $this->validate($req,$rules);

        try {

    		$Price = new User;
    		$Price = User::findOrFail($req->input('set_id'));
    		$Price->id = $req->input('set_id');
    		$Price->password = bcrypt($req->input('password'));
    		$Price->save();

    		$log = \App\HomeModel::log_save('Change Password','tb_seller');

    		return redirect('user/password')->with('success','Password has been changed.');

    	} catch (Exception $e) {
    		return redirect('user/password')->with('error','Password failed to be changed.');
    	}

    }

}
