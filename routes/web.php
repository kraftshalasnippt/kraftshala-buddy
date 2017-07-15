<?php

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



Auth::routes();
Route::group(['middleware' => 'auth'], function () {
	Route::get('/', function () {
	    return view('welcome');
	});
	Route::get('/home', 'HomeController@index')->name('home');
	Route::resource('admin_user', 'Admin_UserController');
	Route::get('college/open/{id}', 'CollegeController@open');
	Route::get('college/newcollege', 'CollegeController@newcollege');
	Route::post('college/destroynew/{id}', 'CollegeController@destroynew');
	Route::resource('college', 'CollegeController');
	Route::get('appuser/createuser/{college}', 'AppUserController@createuser');
	Route::get('appuser/bantoggle/{id}', 'AppUserController@bantoggle');
	Route::get('appuser/verifyuser/{id}', 'AppUserController@verifyuser');
	Route::get('appuser/verifymobile/{id}', 'AppUserController@verifymobile');
	Route::get('appuser/verifyemail/{id}', 'AppUserController@verifyemail');
	Route::get('appuser/bannedusers', 'AppUserController@bannedusers');
	Route::get('appuser/destroybanneduser ', 'AppUserController@destroybanneduser');
	Route::get('appuser/display/{id}', 'AppUserController@display');
	Route::resource('appuser', 'AppUserController');
	Route::get('/CLUser','CLUserController@index');
	Route::get('/CLUser/users/{col}','CLUserController@users');
	Route::get('/CLUser/bannedusers/{col}','CLUserController@bannedusers');
	Route::post('/CLUser/destroy/{id}','CLUserController@destroy');
	Route::get('/CLUser/show/{id}','CLUserController@show');
	Route::get('/CLUser/display/{id}','CLUserController@display');
	Route::get('CLUser/bantoggle/{id}', 'CLUserController@bantoggle');
	Route::get('CLUser/verifyuser/{id}', 'CLUserController@verifyuser');
	Route::get('CLUser/verifymobile/{id}', 'CLUserController@verifymobile');
	Route::get('CLUser/verifyemail/{id}', 'CLUserController@verifyemail');
	Route::get('CLUser/edit/{id}', 'CLUserController@edit');
	Route::patch('CLUser/update/{id}', 'CLUserController@update');
	Route::get('CLUser/create', 'CLUserController@create');
	Route::post('CLUser/store', 'CLUserController@store');
});
