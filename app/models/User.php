<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	//protected $fillable = array('name', 'email', 'username', 'password', 'password_temp', 'code', 'active');
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');

	public static $rules_create = array(
			'name'            => 'required|min:2',
			'email'           => 'required|max:60|email|unique:users',
			'username'        => 'required|alpha_dash|between:3,50|unique:users',
			'password'        => 'required|alpha_num|between:4,20',
			'password_again'  => 'required|same:password'
		);

	public static function validate($data){
		return Validator::make($data, static::$rules_create);
	}

	public static $rules_sign_in = array(
			'email'           => 'required|email',
			'password'        => 'required'
		);

	public static function validateSignIn($data){
		return Validator::make($data, static::$rules_sign_in);
	}

	public static $rules_update = array(
			'name'            => 'required|min:2'
		);

	public static function validateUpdate($data){
		return Validator::make($data, static::$rules_update);
	}

	public static $rules_password_change = array(
			'oldpassword'           => 'required',
			'password'        => 'required|min:6',
			'password_again'  => 'required|same:password'
		);

	public static function validateChangePassword($data){
		return Validator::make($data, static::$rules_password_change);
	}

}
