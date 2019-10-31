<?php

use Illuminate\Http\Request;
use App\Http\Resources\CompanyCollection;
use App\Company;
use App\User;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('getCompaniesInfos', function(){
  return new CompanyCollection(Company::all());
});

Route::get('getFidelityCards/{user_id}', function(Request $request){
  //print_r($request->query());
  $user = User::findOrFail(10);
  return $user->fidelityCards()->get();
});
