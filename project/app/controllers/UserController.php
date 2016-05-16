<?php
class UserController extends BaseController
{
	public function getsignin(){
		return View::make('login');
	}

	public function postsignin(){
		$credentials=Input::only('email','password');
		//print_r($credentials);
		if(Auth::attempt($credentials)){
			if(Auth::user()->status=='A'){
				return Redirect::to('/admin');
			}else{
				return Redirect::to('/start');
			}
		}
		return Redirect::to('/login');
	}

	public function getsetting(){
		return View::make("register.edituser");
	}
	
	public function edituserpass(){
		$id=$_POST['id'];
		$id=$i;
		$user = new UserLogin();
		$user->setpassword(Input::get('password'));
		//$user->setpassword('12345');
		$user->editpassword($id);
		$i++;
		return Redirect::to('admin');
	}
	public function postsetting(){
		$user = new UserLogin();
		$user->setid(Auth::user()->id);
		$user->setname(Input::get('name'));
		$user->setpassword(Input::get('password'));
		$user->editUserLogin();
		return Redirect::to('edituser')->with('flash_notice','ดำเนินการสำเร็จ');
	}
	
	
	public function signout(){ //do end session
		//Session::flush();
		Auth::logout();
		return Redirect::to('/start')->with('flash_notice','LOG OUT');
	}

	// public function getprofile(){
	// 	$obj=new UserLogin;
	// 	$user=&obj->getById(Auth::user()->id);
	// 	return View::make('profile')->with(array("name"=>user->getname(),"email"=>getemail()));
	// }
}