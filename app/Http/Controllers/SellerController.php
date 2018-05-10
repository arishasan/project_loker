<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SellerModel as Seller;
use Illuminate\Support\Facades\Auth;

date_default_timezone_set('Asia/Jakarta');

class SellerController extends Controller
{
    
    public function index(){
        
        $check_user = \App\HomeModel::getUser();
        if($check_user[0]->level == 'Owner' OR $check_user[0]->level == 'Operator'){ return redirect('/'); }

        $data['id_user'] = AUTH::id();
        $data['level'] = \App\HomeModel::getUser();
    	$data['data_seller'] = Seller::get();
    	return view('data/Seller')->with($data);
    }

    public function simpan(Request $req){

    	$rules = [
            'nama' => 'required',
            'category' => 'required',
            'email' => 'required',
            'password' => 'required',
            'telpon' => 'required',
            'alamat' => 'required',
            'status_aktif' => 'required',
            'level' => 'required',
        ];

        $this->validate($req,$rules);

    	try {

    		$seller = new Seller;
    		$seller->nama = $req->input('nama');
    		$seller->category = $req->input('category');
            $seller->password = bcrypt($req->input('password'));
    		$seller->email = $req->input('email');
    		$seller->no_telpon = $req->input('telpon');
    		$seller->alamat = $req->input('alamat');
    		$seller->aktif = $req->input('status_aktif');
            $seller->level = $req->input('level');
    		$seller->save();

            $log = \App\HomeModel::log_save('Adding seller','tb_seller');

    		return redirect('seller')->with('success','New Seller has been added.');

    	} catch (Exception $e) {
    		return redirect('seller')->with('error','New Seller failed to added.');
    	}

    }

    public function update(Request $req){

    	$rules = [
            'nama' => 'required',
            'category' => 'required',
            'email' => 'required',
            'telpon' => 'required',
            'alamat' => 'required',
            'status_aktif' => 'required',
            'level' => 'required',
        ];

        $this->validate($req,$rules);

    	try {

    		$seller = Seller::findOrFail($req->input('seller_id'));
    		$seller->id = $req->input('seller_id');
    		$seller->nama = $req->input('nama');
    		$seller->category = $req->input('category');
    		$seller->email = $req->input('email');
    		$seller->no_telpon = $req->input('telpon');
    		$seller->alamat = $req->input('alamat');
    		$seller->aktif = $req->input('status_aktif');
            $seller->level = $req->input('level');
    		$seller->save();

            $log = \App\HomeModel::log_save('Updating seller','tb_seller');

    		return redirect('seller')->with('success', $req->input('nama').' Success updating!.');

    	} catch (Exception $e) {
    		return redirect('seller')->with('error','Failed to update.');
    	}

    }

    public function destroy(Request $req){

    	try {

    		$seller = Seller::findOrFail($req->input('seller_id'));
    		$seller->delete();

            $log = \App\HomeModel::log_save('Deleting seller','tb_seller');

    		return redirect('seller')->with('success', 'Success deleting!.');

    	} catch (Exception $e) {
    		return redirect('seller')->with('error','Failed to delete.');
    	}

    }

}
