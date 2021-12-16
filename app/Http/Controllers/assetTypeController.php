<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AssetType;

class assetTypeController extends Controller
{
    public function addAssetType(){
        return view('addAssetType');
    }
    public function postAssetType(Request $req){
        $validate=$req->validate([
            'type'=>'required',
            'description'=>'max:500',
        ]);
        if($validate){
            $type=$req->type;
            $desc=$req->description;
            $assetType=new AssetType();
            $assetType->type=$type;
            $assetType->description=$desc;
            if($assetType->save())
            {
                return back()->with("success","Asset Type Added successfully");
            }
            else{
                return back()->with("error","Error while adding");
            }
        }
    }
    public function assetTypes(){
        $assettype=AssetType::paginate(3);
        return view('assetType',['assettype'=>$assettype]);
    }
    public function editAssetType($id){
        $asset=AssetType::whereId($id)->first();
        return view('editAssetType',['asset'=>$asset]);
    }
    public function postEditAssetType(Request $req){
        $validate=$req->validate([
            'type'=>'required',
            'description'=>'required|max:500',
        ]);
        if($validate){
            $id=$req->hid;
            AssetType::where('id',$id)->update([
                'type' => $req->type,
                'description' => $req->description,
                ]);
            return redirect('/assettypes');
        }
    }
    public function deleteAssetType(Request $req){
            AssetType::where('id',$req->aid)->delete();
        return back()->with("success","Asset Type Deleted!!!");

    }
}
