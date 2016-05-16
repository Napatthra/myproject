<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/index', function(){return View::make('index');});
Route::get('/', function(){return View::make('hello');});
Route::get('/hello', function(){return 'Hello World';});

Route::group(array('before' => 'role'), function() {
	Route::get('/admin', 'SettingController@getadminnoti');
	Route::post('/admin', 'ImageController@adminset');
	 Route::post('/upload', 'SettingController@uploadimg');
	Route::get('/upload', 'SettingController@getallimg');
});

Route::group(array('before' => 'selectarea'), function () {
	Route::post('/selectResult', 'ImageController@compareimg');
	Route::get('/selectResult', 'ResultController@selectResult');
	Route::get('/resultImage', 'ResultController@makeimg');
	Route::get('/resultVDO', 'ResultController@makevideo');
	Route::get('/vdo', function()
	{
	   return View::make('vdo');
	});
	Route::get('/pdf', 'ResultController@makepdf');
	Route::get('/resultGraph', 'ResultController@makegraph');
});

Route::group(array('before' => 'auth'), function () {
    Route::get('/edituser', 'UserController@getsetting');
    Route::post('/edituser', 'UserController@postsetting');
	Route::get('/info', function()
	{
		return View::make('info');
	});
	
	
	Route::get('/inter', 'SettingController@getintarea');
	Route::get('/percent', 'SettingController@getfutarea');
	
	Route::get('/saveinter', 'SettingController@saveintarea');
	Route::get('/savepercent', 'SettingController@savefutarea');
});

Route::get('/register', 'RegisterController@registerForm');
Route::post('/register/create', 'RegisterController@registerCreate');
Route::get('/login', 'UserController@getsignin');
Route::post('/login', 'UserController@postsignin');
Route::get('/logout', 'UserController@signout');

Route::get('/start', function(){return View::make('start');});
Route::get('/map', function(){return View::make('map');});
Route::post('/findframe', 'SelectController@selectimage');

Route::post('/editpercent', 'SettingController@editfutarea');
Route::post('/seeinter', 'SettingController@seeintarea');
Route::post('/deletepercent', 'SettingController@delfutarea');
Route::post('/deleteinter', 'SettingController@delintarea');

Route::get('/fb', function()
{
    return View::make('fb');
});




// Route::get('/register', function()
// {
//     return View::make('register/form');
// });




Route::get('/test', 'UserController@edituserpass');

