<?php

	
	use Illuminate\Auth\UserTrait;
	use Illuminate\Auth\UserInterface;
	use Illuminate\Auth\Reminders\RemindableTrait;
	use Illuminate\Auth\Reminders\RemindableInterface;

	// class UserLoginEloquent extends Eloquent{
	// 	public $table='userlogin';
	// }
	
	class UserLoginEloquent extends Eloquent implements UserInterface, RemindableInterface {
	
	use UserTrait, RemindableTrait;
	public $timestamps = false;
	protected $table = 'tbl_user';
	protected $hidden = array('password','remember_token');

	// Get the unique identifier for the user.
	public function getAuthIdentifier()
	{
		return $this->getKey();
	}	

	//Get the password for the user.
	public function getAuthPassword()
	{
		return $this->password;
	}

	//Get the e-mail address where password reminders are sent.
	public function getReminderEmail()
	{
		return $this->email;
	}

	public function getRememberToken(){
		return $this->remember_token;
	}

	public function setRememberToken($value){
		$this->remember_token=$value;
	}
}






?>