<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class MasterDataController extends Controller
{
    public function index(){
        return view('pages.master.masterdata');
    }

    public function postMasterData(Request $request) {
        // dd($request->all());
        $password = Hash::make($request->password);

        if($request->uploadnpwp != null){
            $request->file('uploadnpwp')->store('npwp');
        } 

        User::create(['username' => $request->username, 'name' => $request->nama, 'nik' => $request->nik, 'password' => $password, 'privilage' => $request->privilage, 'stat'=>1]);

        DB::table('memp')->insert(['nik'=> $request->nik,'name'=>$request->nama,'phn'=>$request->phone,'addr'=>$request->domisili,'dob'=>$request->tanggallahir,'sex'=>$request->jeniskelamin, 'npwp'=>$request->descnpwp, 'npwp_pic'=>$request->file('uploadnpwp')->hashname(), 'username'=>$request->username, 'pwd'=>$password, 'usin'=> 1, 'stat'=> 1]);

        return redirect()->back();
    }
}
