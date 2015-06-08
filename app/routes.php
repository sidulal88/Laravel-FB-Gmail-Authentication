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

Route::get('/', array('as' => 'home','uses' => 'HomeController@home'));
Route::get('/new', array('as' => 'user-create','uses' => 'UserController@getCreate'));
Route::group(array('before'=> 'csrf'), function(){
	Route::post('/new', array('as' => 'user-cretae-post','uses' => 'UserController@postCreate'));
});

Route::group( array('before'=> 'guest' ), function(){
	Route::get('/referal/{key}', array('as' => 'referal-user-create','uses' => 'UserController@getCreateReferralUser'));
	Route::get('fbauth/{auth?}', array('as'=>'facebookAuth', 'uses'=>'UserController@getFacebookLogin') );
	Route::get('gauth/{auth?}', array('as'=>'gmailAuth', 'uses'=>'UserController@getGmailLogin') );
	Route::get('/login', array('as' => 'user-sign-in','uses' => 'UserController@getSignIn'));

	/*
	* CSRF protection group
	*/
	Route::group(array('before'=> 'csrf'), function(){
		Route::post('/login', array('as' => 'user-sign-in-post','uses' => 'UserController@postSignIn'));
	});



});


/*
	* Authenticated group 
*/
	Route::group( array('before'=> 'auth' ), function(){
	/*
		* CSRF protection group
	*/
		
		Route::group(array('before' => 'role'), function() {

			Route::group(array('before'=> 'csrf'), function(){
				Route::put('/update/{id}', array('as' => 'put-user-update','uses' => 'UserController@getUpdate'));
			});
			Route::get('/users', array('as' => 'user-list','uses' => 'UserController@getIndex'));
			Route::get('/view/{id}', array('as' => 'user-get-edit','uses' => 'UserController@getEdit'));		
			Route::get('/destroy/{id}', array('as' => 'delete-user-destroy','uses' => 'UserController@destroy'));
		});

		Route::get('logout', array('as'=>'logout', 'uses'=>'UserController@getSignOut'));

	});



