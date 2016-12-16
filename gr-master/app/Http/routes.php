<?php


/**
 * Groupe de Route non authentifier 
 */
Route::group(['middleware' => 'guest'], function (){
	Route::get('/login', ['as' => 'login', 'uses' => 'AccountController@getLogin']);
	Route::post('/login', ['as' => 'login', 'uses' => 'AccountController@postLogin']);
});

/**
 * Groupe de Route authentifier
 */
Route::group(['middleware' => 'auth'], function () {
    Route::get('/', function(){ return redirect()->route('dashboard'); });
    Route::get('/dashboard', ['as' => 'dashboard', 'uses' => 'DashboardController@index']);
    Route::get('/logout', ['as' => 'logout', 'uses' => 'AccountController@logout']);
    Route::resource('serre', 'SerreController');
    Route::resource('zone', 'ZoneController');
    Route::resource('climat', 'ClimatController');
    Route::resource('chauffage','ChauffageController');
    //Route::get('chauffage/courbe', ['as' => 'chauffage.courbe','uses' => 'ChauffageController@courbe']);
    Route::post('chauffage/courbe', ['as' => 'chauffage.show','uses' => 'ChauffageController@show']);
    Route::resource('ventilation','VentilationController');
    Route::post('ventilation/affiche', ['as' => 'ventilation.show','uses' => 'VentilationController@show']);
    Route::resource('photosynthese','PhotosyntheseController');
    Route::post('photosynthese/affiche', ['as' => 'photosynthese.show','uses' => 'PhotosyntheseController@show']);

});