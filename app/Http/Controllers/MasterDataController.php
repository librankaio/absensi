<?php

namespace App\Http\Controllers;

use App\Models\Memp;
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
        dd($request->all());
        $password = Hash::make($request->password);

        if($request->uploadnpwp != null && $request->uploadktp == null && $request->uploadbpjs == null){
            $request->file('uploadnpwp')->store('npwp');
            User::create(['username' => $request->username, 'name' => $request->nama, 'nik' => $request->nik, 'password' => $password, 'privilage' => $request->privilage, 'stat'=>1]);

            DB::table('memp')->insert(['nik'=> $request->nik,'name'=>$request->nama,'phn'=>$request->phone,'addr'=>$request->domisili,'dob'=>$request->tanggallahir,'sex'=>$request->jeniskelamin, 'npwp_pic'=>$request->file('uploadnpwp')->hashname(), 'npwp'=>$request->descnpwp, 'ktp'=>$request->descktp, 'bpjs'=>$request->descbpjs, 'username'=>$request->username, 'pwd'=>$password, 'usin'=> 1, 'stat'=> 1]);

            return redirect()->back();
        }elseif($request->uploadnpwp == null && $request->uploadktp != null && $request->uploadbpjs == null){
            $request->file('uploadktp')->store('ktp');
            User::create(['username' => $request->username, 'name' => $request->nama, 'nik' => $request->nik, 'password' => $password, 'privilage' => $request->privilage, 'stat'=>1]);

            DB::table('memp')->insert(['nik'=> $request->nik,'name'=>$request->nama,'phn'=>$request->phone,'addr'=>$request->domisili,'dob'=>$request->tanggallahir,'sex'=>$request->jeniskelamin, 'ktp_pic'=>$request->file('uploadktp')->hashname(), 'npwp'=>$request->descnpwp, 'ktp'=>$request->descktp, 'bpjs'=>$request->descbpjs, 'username'=>$request->username, 'pwd'=>$password, 'usin'=> 1, 'stat'=> 1]);

            return redirect()->back();
        }elseif($request->uploadnpwp == null && $request->uploadktp == null && $request->uploadbpjs != null){
            $request->file('uploadktp')->store('ktp');
            User::create(['username' => $request->username, 'name' => $request->nama, 'nik' => $request->nik, 'password' => $password, 'privilage' => $request->privilage, 'stat'=>1]);

            DB::table('memp')->insert(['nik'=> $request->nik,'name'=>$request->nama,'phn'=>$request->phone,'addr'=>$request->domisili,'dob'=>$request->tanggallahir,'sex'=>$request->jeniskelamin, 'bpjs_pic'=>$request->file('uploadbpjs')->hashname(), 'npwp'=>$request->descnpwp, 'ktp'=>$request->descktp, 'bpjs'=>$request->descbpjs, 'username'=>$request->username, 'pwd'=>$password, 'usin'=> 1, 'stat'=> 1]);

            return redirect()->back();
        }

        User::create(['username' => $request->username, 'name' => $request->nama, 'nik' => $request->nik, 'password' => $password, 'privilage' => $request->privilage, 'stat'=>1]);

        DB::table('memp')->insert(['nik'=> $request->nik,'name'=>$request->nama,'phn'=>$request->phone,'addr'=>$request->domisili,'dob'=>$request->tanggallahir,'sex'=>$request->jeniskelamin, 'npwp'=>$request->descnpwp, 'username'=>$request->username, 'pwd'=>$password, 'usin'=> 1, 'stat'=> 1]);

        return redirect()->back();
    }

    public function list(){
        $results = DB::table('memp')->get();
        return view('pages.master.masterdatalist',[
            'results' => $results,
        ]);
    }

    public function edit(Memp $memp){
        $privilage = DB::table('users')->where('username', $memp->username)->first();
        return view('pages.master.masterdataedit',[ 
            'memp' => $memp,
            'privilage' => $privilage
        ]);
        // $data = DB::table('memp')->where('id', $memp->id)->get();
        // return view('pages.master.masterdataedit',[
        //    'data' => $data,
        // ]);
    }
}
