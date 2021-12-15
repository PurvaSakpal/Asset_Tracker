<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Asset;
use App\Models\AssetType;
use Illuminate\Support\Facades\DB;

class Charts extends Controller
{
    public function chart(){
        $result=DB::select(DB::raw("SELECT COUNT(*)as total_asset,assettype_name FROM assets GROUP BY assettype_name"));
        $chartdata="";
        foreach($result as $list){
            $chartdata.="['".$list->assettype_name."',   ".$list->total_asset."],";

        }
        $arr['chartData']=rtrim($chartdata,",");
        // return view('chart',$arr);

        $result1=DB::select(DB::raw("SELECT count(*) as activestatus,is_active FROM assets  GROUP BY is_active"));
        $chartdata1="";
        foreach($result1 as $list){
            $chartdata1="['".$list->is_active."',   ".$list->activestatus."],";

        }
        $arr1['chartDatabar']=rtrim($chartdata1,",");
        return view('chart',$arr,$arr1);
    }
}
