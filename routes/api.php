<?php

use App\Models\BaseModel;
use App\Models\TypePerson;
use Illuminate\Http\Request;
use \Illuminate\Support\Facades\Route;
use Routes\Models\RouteActionModel;
use Routes\Models\RouteModel;
use Routes\Services\RouteService;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group([
    'prefix' => 'auth'
], function () {
    Route::post('login', 'AuthController@login')->name('auto-part.oauth.login');
    Route::post('register', 'AuthController@register')->name('auto-part.oauth.register');
    Route::group([
        'middleware' => 'auth:api',
        ['except' => ['auth/login']]
    ], function () {
        Route::post('logout', 'AuthController@logout')->name('auto-part.oauth.logout');
    });
});

Route::group([
    'middleware' => 'auth:api',
    ['except' => ['auth/login']]
], function () {

    /*
     * Rotas protected
     */

    RouteService::createRoute('country', 'CountryController', BaseModel::getActionsDefault());

});


