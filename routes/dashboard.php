<?php

use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\ContentController;
use App\Http\Controllers\Dashboard\IndexController;
use Illuminate\Support\Facades\Route;


Route::group(['prefix'=>'admin'],function(){
    Route::get('/',[IndexController::class,'index'])
           ->name('admin.index');
    Route::post('categories/softdelete/{id}',[CategoryController::class,'softDeleteMethod'])
          ->name('categories.soft.delete');      
    Route::resource('categories',CategoryController::class);       
    Route::resource('contents',ContentController::class);       
});
