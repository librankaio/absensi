<?php

namespace App\Http\Controllers;

use App\Models\Tabsent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AproveAbsensiController extends Controller
{
    public function index(Request $request){
        if(isset($request->dtfrom)){
            $query = "select * from tabsent where cast(tdtabsent as date) between '".$request->dtfrom."' and '".$request->dtto."'";
            $results = DB::select( DB::raw($query) );
            
            return view('pages.master.aprvabsensi',[
                'results' => $results
            ]);
        }
        return view('pages.master.aprvabsensi');
    }

    public function postAproveAbsensi(Request $request) {
        dd($request->all());
    }

    public function getAcc(Tabsent $tabsent){
        Tabsent::where('id', '=', $tabsent->id)->update(['approval' => 'Y']);

        return redirect()->back();
    }
    public function getDecline(Tabsent $tabsent){
        Tabsent::where('id', '=', $tabsent->id)->update(['approval' => 'N']);

        return redirect()->back();
    }
}
