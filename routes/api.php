<?php

use Illuminate\Http\Request;

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
// Vi du:
//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});
// apply methods
//Route::post('/person',function (){
//   $person=[
//     'first_name'=>'Tri',
//       'last_name'=>'Vo'
//   ];
//    return $person;
//});
//Route::delete('/person',function (){
//    $person=[
//        'first_name'=>'Tri',
//        'last_name'=>'Vo'
//    ];
//    return $person;
//});
//test get all index show update store destroy
Route::apiResource('/allin','Api\v1\PersonController');
//test get only and group
Route::prefix('v1')->group(function (){
    Route::apiResource('/person','Api\v1\PersonController')
        ->only(['show','destroy','update','store']);
    Route::apiResource('/people','Api\v1\PersonController')
        ->only(['index']);
});
Route::prefix('v2')->group(function (){
    Route::apiResource('/person','Api\v2\PersonController')
        ->only(['show']);
});
