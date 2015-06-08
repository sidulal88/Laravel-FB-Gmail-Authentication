<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function home()
	{

		if ( Auth::check() )
		{
			return View::make('index');
		}
		else
		{
			return View::make('log-in');
		}
		
	}
	public function getFaq(){
		return View::make('faq');
	}

	public function facebook()
	{

		return Share::load('http//localhost:8000', 'My example')->facebook();
	}

}
