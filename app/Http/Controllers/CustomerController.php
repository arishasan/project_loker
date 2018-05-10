<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CustomerModel as Customer;

date_default_timezone_set('Asia/Jakarta');

class CustomerController extends Controller
{

	public function index(){
        
        $check_user = \App\HomeModel::getUser();
        if($check_user[0]->level == 'Owner' OR $check_user[0]->level == 'Operator'){ return redirect('/'); }

        $data['user'] = $check_user;
		$data['customer_list'] = Customer::get();
		return view('data/Customer')->with($data);
	}

	public function simpan(Request $req){

    	$rules = [
            'nama_perusahaan' => 'required',
            'alamat' => 'required',
            'no_telpon' => 'required',
            'kota' => 'required',
        ];

        $this->validate($req,$rules);

    	try {

    		$Customer = new Customer;
    		$Customer->nama_perusahaan = $req->input('nama_perusahaan');
    		$Customer->alamat = $req->input('alamat');
    		$Customer->no_telpon = $req->input('no_telpon');
    		$Customer->kota = $req->input('kota');
    		$Customer->save();

            $log = \App\HomeModel::log_save('Adding customer','tb_customer');

    		return redirect('customer')->with('success','New customer has been added.');

    	} catch (Exception $e) {
    		return redirect('customer')->with('error','New customer failed to added.');
    	}

    }

    public function update(Request $req){

    	$rules = [
            'nama_perusahaan' => 'required',
            'alamat' => 'required',
            'no_telpon' => 'required',
            'kota' => 'required',
        ];

        $this->validate($req,$rules);

    	try {

    		$Customer = Customer::findOrFail($req->input('customer_id'));
    		$Customer->id = $req->input('customer_id');
    		$Customer->nama_perusahaan = $req->input('nama_perusahaan');
    		$Customer->alamat = $req->input('alamat');
    		$Customer->no_telpon = $req->input('no_telpon');
    		$Customer->kota = $req->input('kota');
    		$Customer->save();

            $log = \App\HomeModel::log_save('Updating customer','tb_customer');

    		return redirect('customer')->with('success', $req->input('nama_perusahaan').' Success updating!.');

    	} catch (Exception $e) {
    		return redirect('customer')->with('error','Failed to update.');
    	}

    }

    public function destroy(Request $req){

    	try {

    		$Customer = Customer::findOrFail($req->input('customer_id'));
    		$Customer->delete();

            $log = \App\HomeModel::log_save('Deleting customer','tb_customer');

    		return redirect('customer')->with('success', 'Success deleting!.');

    	} catch (Exception $e) {
    		return redirect('customer')->with('error','Failed to delete.');
    	}

    }

}
