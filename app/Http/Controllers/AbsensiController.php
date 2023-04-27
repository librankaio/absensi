<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AbsensiController extends Controller
{
    public function index(){
        return view('pages.transaction.absen');
    }

    public function postAbsen(Request $request) {
        // dd($request->tdtabsent);
        // $dtabsent = Carbon::createFromFormat('d/m/Y', $request->tdtabsent)->format('Y-m-d');
        // dd($dtabsent);
        DB::table('tabsent')->insert(['nik'=> $request->nik,'name_memp'=>$request->nama,'tdtabsent'=>$request->tdtabsent, 'usin'=> 1, 'stat'=> 1]);

        return redirect()->back();
    }
}
