<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PriceModel as Price;

date_default_timezone_set('Asia/Jakarta');

class PriceController extends Controller
{
    
    public function index(){

        $check_user = \App\HomeModel::getUser();
        if($check_user[0]->level == 'Owner' OR $check_user[0]->level == 'Operator'){ return redirect('/'); }
    	
        $data['user'] = $check_user;
        $data['price_list'] = Price::get();
    	return view('data/Price')->with($data);
    }

    public function simpan(Request $req){

    	$rules = [
            'nama_paket' => 'required',
            'local' => 'required',
            'non_local' => 'required',
            'description' => 'required',
        ];

        $this->validate($req,$rules);

    	try {

    		$Price = new Price;
    		$Price->nama_paket = $req->input('nama_paket');
    		$Price->local = $req->input('local');
    		$Price->non_local = $req->input('non_local');
    		$Price->description = $req->input('description');
    		$Price->save();

            $log = \App\HomeModel::log_save('Adding price','tb_price');

    		return redirect('price')->with('success','New price has been added.');

    	} catch (Exception $e) {
    		return redirect('price')->with('error','New price failed to added.');
    	}

    }

    public function update(Request $req){

    	$rules = [
            'nama_paket' => 'required',
            'local' => 'required',
            'non_local' => 'required',
            'description' => 'required',
        ];

        $this->validate($req,$rules);

    	try {

    		$Price = Price::findOrFail($req->input('price_id'));
    		$Price->id = $req->input('price_id');
    		$Price->nama_paket = $req->input('nama_paket');
    		$Price->local = $req->input('local');
    		$Price->non_local = $req->input('non_local');
    		$Price->description = $req->input('description');
    		$Price->save();

            $log = \App\HomeModel::log_save('Updating price','tb_price');

    		return redirect('price')->with('success', $req->input('nama_paket').' Success updating!.');

    	} catch (Exception $e) {
    		return redirect('price')->with('error','Failed to update.');
    	}

    }

    public function destroy(Request $req){

    	try {

    		$Price = Price::findOrFail($req->input('price_id'));
    		$Price->delete();

            $log = \App\HomeModel::log_save('Deleting price','tb_price');

    		return redirect('price')->with('success', 'Success deleting!.');

    	} catch (Exception $e) {
    		return redirect('price')->with('error','Failed to delete.');
    	}

    }

}
