<?php

class UserController extends \BaseController {

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
	// private $user;

	// function __construct($user){
	// 	$this->user = $user; 
	// }

	public function getIndex()
	{
		$data = User::all();
		return View::make('users.index', array('data'=>$data, 'message'=>'Hello') )
		->with('title', 'User List')
		->with('ser', 1);
	}

	public function getCreate()
	{
		return View::make('users.add')
		->with('title', 'New User');
	}

	public function getCreateReferralUser($ref)
	{
		return View::make('users.add', array('referal'=>$ref) )
		->with('title', 'New User');
	}

	public function postCreate()
	{

		$validation = User::validate(Input::all() );
		if($validation->fails())
		{
			return Redirect::route('referal-user-create', Input::get('referance_by'))
			->withErrors($validation)			
			->withInput();
		}
		else
		{
			$name                   = Input::get('name');
			$contact                = Input::get('contact');
			$email                  = Input::get('email');
			$username               = Input::get('username');
			$referance_by           = Input::get('referance_by');
			$password               = Input::get('password');			
			$code         	        = str_random(60);
			$active       	        = 1;			

			$user             		= new User;
			$user->name       		= $name ;
			$user->contact    		= $contact;
			$user->email      		= $email;
			$user->username  		= $username;
			$user->password  		= Hash::make($password);
			$user->referance_token  = str_random(25);
			$user->referance_by  	= $referance_by;
			$user->code       		= $code;
			$user->active    		= $active ;
			$user->role             = 'user';

			$user->save();

			return Redirect::route('home')->with('message', 'New User created Successfully!')->with('message_type', 'success');
		}
		
	}
	public function destroy($id)
	{

		User::find($id)->delete();
		return Redirect::route('user-list')
		->with('message', 'User Deleted Successfully')
		->with('message_type', 'danger');

	}
	
	public function getEdit($id)
	{
		$user = User::find($id);
		return View::make('users.edit', array('user'=> $user));

	}

	public function getUpdate($id)
	{
		
		$validation = User::validateUpdate(Input::all() );
		if($validation->fails())
		{
			return Redirect::route('user_get_edit', $id)->withErrors($validation)->withInput();
		}
		else
		{

			
			$user = User::find($id);
			$user->name       = Input::get('name');
			$user->contact    = Input::get('contact');
			$user->save();

			return Redirect::to('users')
			->with('message', 'User Updated Successfully!')
			->with('message_type', 'success');
		}


	} 
	public function getSignIn(){
		return View::make('log-in');
	}

	public function postSignIn(){
		$validation = User::validateSignIn(Input::all() );
		if($validation->fails())
		{
			return Redirect::route('user-sign-in')->withErrors($validation)->withInput();
		}
		else
		{

			$auth = Auth::attempt(array(
				'email' => Input::get('email'),
				'password' => Input::get('password')
				));
			if($auth){
				return Redirect::intended('/')
				->with('message', 'Sign in Successfully!')
				->with('message_type', 'success');
			}
			else{
				return Redirect::route('user-sign-in')
				->with('message', 'Unauthorised sign in')
				->with('message_type', 'danger')
				;
			}

		}

		return Redirect::route('home')->with('message', 'Unauthorised sign in or are you activated ?');


	}

	/*
		* this is the code for Facebook login
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
					return redirect::route('facebookAuth');
				}
			}


			$oauth = new Hybrid_Auth(app_path().'/config/fb_auth.php');
			$provider = $oauth->authenticate('Facebook');
			
			$profile = $provider->getUserProfile();
			$user = User::where('email', '=', $profile->email);

			if($user->count())
			{
				$user = $user->firstOrFail();	
				$user = User::find($user['id']);
				Auth::login($user);

			}
			else{

				$user 						= new User;
				$user->name       			= $profile->email;
				$user->username       		= $profile->email;
				$user->email       			= $profile->email;
				$user->password   			= Hash::make($profile->email);
				$user->referance_token    	= str_random(25);
				$user->active    			= 1;
				$user->role                 = 'user';
				$user->save();

				$auth = Auth::attempt(array(
					'email' => $profile->email,
					'password' => $profile->email
					));
			}

			if( Auth::check() ){
				return Redirect::route('home')
				->with('message', 'Sign in Successfully by Facebook !')
				->with('message_type', 'success');
			}
			else{
				return Redirect::route('user-sign-in')
				->with('message', 'Account Not Authorized')
				->with('message_type', 'danger');
			}



		}
/*
				* this is the code for Gmail login
	*/
				public function getGmailLogin( $auth=NULL ){

					if($auth =='auth'){

						try	{
							Hybrid_Endpoint::process();
						}catch(exception $e){
							return redirect::route('gmailAuth');
						}
					}

					$oauth = new Hybrid_Auth(app_path().'/config/gm_auth.php');
					$provider = $oauth->authenticate('Google');
					$profile = $provider->getUserProfile();
					$user = User::where('email', '=', $profile->email);

					if($user->count())
					{
						$user = $user->firstOrFail();	
						$user = User::find($user['id']);
						Auth::login($user);

					}
					else{

						$user 						= new User;
						$user->name       			= $profile->email;
						$user->username       		= $profile->email;
						$user->email       			= $profile->email;
						$user->password   			= Hash::make($profile->email);
						$user->referance_token    	= str_random(25);
						$user->active    			= 1;
						$user->role                 = 'user';
						$user->save();

						$auth = Auth::attempt(array(
							'email' => $profile->email,
							'password' => $profile->email
							));
					}

					if( Auth::check() ){
						return Redirect::route('home')
						->with('message', 'Sign in Successfully by Google !')
						->with('message_type', 'success');
					}
					else{
						return Redirect::route('user-sign-in')
						->with('message', 'Account Not Authorized')
						->with('message_type', 'danger');
					}

				}



				public function getSignOut(){
					Auth::logout();
					return Redirect::route('home');
				}

				public function userProfile($username){
					$user = User::where('username', '=', $username);

					if( $user->count() )
					{
						$user = $user->first();
						return View::make('users.profile')->with('user', $user);
					}

					return App::abort(404);
				}



			}