<?php
class RegisterController extends BaseController
{
 
    public function registerForm()
    {
        return View::make('register.form');
    }
     
    public function registerCreate()
    {
     
        $validator = Validator::make(Input::all(),array(
                'name'                              => 'required|min:4|max:100',
                'password'                          => 'required|min:4|max:15|confirmed',
                'password_confirmation'             => 'required|min:4|max:15',
                'email'                             => 'required|email|max:100|unique:tbl_user',
            ),
            array(
                'name.required'                     => 'Full Name ไม่สามารถเป็นค่าว่างได้',
                'email.required'                    => 'email ไม่สามารถเป็นค่าว่างได้',
                'email.email'                       => 'รูปแบบ E-Mail ไม่ถูกต้อง',
                'email.unique'                      => 'email นี้มีอยู่ในระบบแล้ว',       
                'password.required'                 => 'password ไม่สามารถเป็นค่าว่างได้',
                'password.confirmed'                => 'รหัสผ่านไม่ตรงกัน',
                'password_confirmation.required'    => 'confirm password ไม่สามารถเป็นค่าว่างได้',
            )
        );
         
        if ($validator->passes()) {
             
            $addUser = new UserLogin();
            $addUser->setname(Input::get('name'));
            $addUser->setpassword(Input::get('password'));
            $addUser->setemail(Input::get('email'));
            $addUser->setstatus('U');
            $addUser->newUserLogin(); 
            return Redirect::to('info')->with('flash_notice','ดำเนินการสำเร็จ'); 
             
        }else{
         
            return Redirect::to('register')->withErrors($validator)
                    ->withInput(Input::except('password'))
                    ->withInput(Input::except('password_confirmation'))
                    ->withInput(); 
                     
        }
    }
	
	    public function registerEdit()
    {
        return View::make('register.edit');
    }
	
	
	public function registerEditing()
    {
		$validator = Validator::make(Input::all(),array(
                'name'                              => 'required|min:4|max:100',
                'password'                          => 'required|min:4|max:15|confirmed',
                'password_confirmation'             => 'required|min:4|max:15',
            ),
            array(
                'name.required'                     => 'Full Name ไม่สามารถเป็นค่าว่างได้', 
                'password.required'                 => 'password ไม่สามารถเป็นค่าว่างได้',
                'password.confirmed'                => 'รหัสผ่านไม่ตรงกัน',
                'password_confirmation.required'    => 'confirm password ไม่สามารถเป็นค่าว่างได้',
            )
        );
        $user=new User;
		$user->setemail(Input::get('email')); //Auth
		$user->setname(Input::get('name'));
        $user->setpassword(Input::get('password'));
		$user->editUser();
		echo "data has been change";
		return View::make("setting");
    }
	
     
}