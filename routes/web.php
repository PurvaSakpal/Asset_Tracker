<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\loginStatus;
use App\Models\Asset;
use App\Models\AssetType;
use App\Http\Middleware;
use App\Http\Controllers\admin;
use App\Http\Controllers\Charts;
use App\Http\Controllers\assetController;
use App\Http\Controllers\assetTypeController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('login');
});
Route::post('/postlogin',[admin::class,'postLogin'])->name('postLogin');
Route::middleware([loginStatus::class])->group(function(){
    Route::get('loginstatus',function(){
      return "Successfully logined";
    });
    Route::get('/logout',[admin::class,'logout'])->name('logout');
    // Route::get('/dashboard',[admin::class,'dashboard'])->name('dashboard');
    Route::get('/master',[admin::class,'master'])->name('master');
    Route::get('/addassettype',[assetTypeController::class,'addAssetType'])->name('add.assettype');
    Route::get('/addasset',[assetController::class,'addAsset'])->name('add.asset');
    Route::post('/postassettype',[assetTypeController::class,'postAssetType'])->name('post.assettype');
    Route::post('/postasset',[assetController::class,'postasset'])->name('post.asset');
    Route::get('/assets',[assetController::class,'assets'])->name('assets');
    Route::get('/assettypes',[assetTypeController::class,'assetTypes'])->name('assetTypes');
    Route::patch('/deleteAsset',[assetController::class,'deleteAsset']);
    Route::patch('/deleteAssetType',[assetTypeController::class,'deleteAssetType']);
    Route::get('/editAsset/{id}',[assetController::class,'editAsset'])->name('editAsset');
    Route::get('/assetimage/{id}',[assetController::class,'assetImage'])->name('assetImage');
    Route::get('/editAssetType/{id}',[assetTypeController::class,'editAssetType'])->name('editAssetType');
    Route::post('/posteditassettype',[assetTypeController::class,'postEditAssetType'])->name('post.editassettype');
    Route::post('/posteditasset',[assetController::class,'postEditAsset'])->name('post.editasset');

    Route::get('/chart',[Charts::class,'chart'])->name('chart');
});
