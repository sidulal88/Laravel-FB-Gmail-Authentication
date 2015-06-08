<?php

class AuthController extends \BaseController {

	/**
	 * Display a listing of tweets
	 *
	 * @return Response
	 */
	/*
		* this is the code for facebook login
	*/
	public function getFacebookLogin( $auth=NULL )
	{

		if($auth =='auth')
		{
			
			try
			{
				Hybrid_Endpoint::process();
			}
			catch(exception $e)
			{
				return redirect::to('fbauth');
			}
		}
		//return;

		$oauth = new Hybrid_Auth(app_path().'/config/fb_auth.php');
		$provider = $oauth->authenticate('Facebook');
		$profile = $provider->getUserProfile();
		return View::make('index');
	}

	public function getLoggedOut()
	{
		$fbauth = new Hybrid_Auth(app_path().'/config/fb_auth.php');
		$fbauth->logoutAllProviders();
		return View::make('index');
	}

	
}
