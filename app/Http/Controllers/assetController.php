<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Asset;
use App\Models\AssetType;
use App\Models\asset_image;
use Illuminate\Support\Facades\Storage;

class assetController extends Controller
{
    public function addasset(){
        $assets=AssetType::all();
        return view('addasset',compact('assets'));
    }
    public function postasset(Request $req){
        $validate=$req->validate([
            'name'=>'required',
            'type'=>'required',
            'active'=>'required',
        ]);
        if($validate){
            $name=$req->name;
            $code=random_int(1000000000000000,9999999999999999);
            $assetid=$req->type;
            $active=$req->active;
            $assetname=AssetType::where('id',$req->type)->first();
                $asset=new Asset();
                $asset->asset_name=$name;
                $asset->asset_code=$code;
                $asset->asset_type=$assetid;
                $asset->assettype_name=$assetname['type'];
                $asset->is_active=$active;
                if($asset->save())
                {
                    if($files=$req->file('image')){
                        $asstype=Asset::latest()->first();
                        foreach($files as $file):
                            $ass = new asset_image();
                            $filename=$file->getClientOriginalName();
                            $ass->asset_image=$filename;
                            $ass->asset_id=$asstype->id;
                            $dest=public_path("/assetimages");
                            if($file->move($dest,$filename))
                                {
                                    $asstype->image()->save($ass);
                                }
                        endforeach;
                        return back()->with("success","Successfully inserted");

                    }

                }
                else{
                    return back()->with("error","Error while saving asset");
                }

        }
    }
    public function assets(){
        $assets=Asset::paginate(2);
        //  $images=Asset::find()->image;
        // $images=asset_image::all();
        return view('asset',['assets'=>$assets]);
    }
    public function assetImage($id){
        $images=Asset::find($id)->image;
        return view('assetimages',['images'=>$images]);
    }
    public function deleteAsset(Request $req){
        // $assetimage=asset_image::where('aid',$req->aid)->get();
        // return $assetimage;
        $asset=Asset::where('id',$req->aid)->delete();
        // foreach($assetimage as $aimg):
        //     $imagePath=public_path().'uploads/'.$aimg;
        //     unlink($imagePath);
        // endforeach;

        return back()->with("success","Asset Deleted!!!");

    }
    public function editAsset($id){
        $asset=Asset::where('id',$id)->first();
        $assettype=AssetType::all();
        return view('editAsset',['asset'=>$asset,'assettype'=>$assettype]);
    }
    public function postEditAsset(Request $req){
        $validate=$req->validate([
            'name'=>'required',
            'type'=>'required',
            'active'=>'required',
        ]);
        if($validate){
            $name=$req->name;
            $id=$req->id;
            $assetid=$req->type;
            $active=$req->active;
            $assetname=AssetType::where('id',$req->type)->first();
            $data=Asset::where('id',$id)->update([
                'asset_name'=>$name,
                'asset_type'=>$assetid,
                'assettype_name'=>$assetname['type'],
                'is_active'=>$active,
            ]);
            return redirect('/assets');
            // return $active;
        }
    }
}
