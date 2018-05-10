<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PriceModel as Price;
use App\CustomerModel as Customer;
use App\DetModel as DetailSewa;
use App\SewaModel as Sewa;

date_default_timezone_set('Asia/Jakarta');

class SewaController extends Controller
{
    
    public function index(){

        $check_user = \App\HomeModel::getUser();

        if($check_user[0]->level == 'Owner'){ return redirect('/'); }

        $data['user'] = $check_user;
    	$data['customer_list'] = Customer::get();
    	$data['list_paket'] = Price::get();
    	return view('transaksi/Sewa')->with($data);

    }

    public function simpan(Request $req){

    	$rules = [
            'paket_id' => 'required',
            'ket' => 'required',
            'price' => 'required',
            'customer_id' => 'required',
        ];

        $this->validate($req,$rules);
    	
    	try {
    		$sewa = new Sewa;
    		$sewa->id_customer = $req->input('customer_id');
    		$sewa->save();

    		$last_sewa_id = $sewa->id;

    		foreach ($req->input('paket_id') as $key => $value) {
    			$det_sewa = new DetailSewa;
    			$det_sewa->id_sewa = $last_sewa_id;
    			$det_sewa->id_paket = $value;
    			$det_sewa->ket_paket = $req->input('ket')[$key];
    			$det_sewa->save();
    		}

            $log = \App\HomeModel::log_save('Commiting new transaction','tb_sewa');

    		return redirect('transaksi/sewa')->with('success','Transaction Success.');

    	} catch (Exception $e) {
    		return redirect('transaksi/sewa')->with('error','Transaction Failed.');
    	}

    }

}
