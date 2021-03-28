<?php

use Illuminate\Support\Facades\Route;
use App\Modules\CarManagement\Controllers\CarController;

Route::resource('/carros', CarController::class);

Route::namespace('App\Modules\CarManagement\Controllers')->group(function () {
  Route::get('/carros/list/brands', 'CarController@getBrands');
});

