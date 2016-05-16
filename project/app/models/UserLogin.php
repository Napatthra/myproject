<?php
	class UserLogin{
		private $id;
		private $name;
		private $email;
		private $password;
		private $create_at;
		private $status;

		public function getid(){
			return $this->id;
		}
		public function getname(){
			return $this->name;
		}
		public function getemail(){
			return $this->email;
		}
		public function getpassword(){
			return $this->password;
		}
		public function getstatus(){
			return $this->status;
		}

		public function setid($value){
			$this->id=$value;
		}
		public function setname($value){
			$this->name=$value;
		}
		public function setemail($value){
			$this->email=$value;
		}
		public function setpassword($value){
			$this->password=Hash::make($value);
		}
		public function setcreate($value){
			$this->create_at=$value;
		}
		public function setstatus($value){
			$this->status=$value;
		}

		
		public function newUserLogin(){
			$new = new UserLoginEloquent;
			$new->name			= $this->name;
			$new->email			= $this->email;
			$new->password		= $this->password;
			$new->create_at		= date("Y-m-d H:i:s",time());
			$new->status		= $this->status;
			$new->save();
		}

		public function editUserLogin(){
			$edit = UserLoginEloquent::find($this->id);
			$edit->name			= $this->name;
			//$edit->email		= $this->email;
			$edit->password		= $this->password;
			$edit->save();
		}

		public static function getById($id){
			$data=UserLoginEloquent::find($id);
			if($data==NULL){
				return NULL;
			}
			$obj=new UserLogin;
			$obj->id=$data->id;
			$obj->name=$data->name;
			$obj->email=$data->email;

			return $obj;
		}

		public static function getall(){
			$data=UserLoginEloquent::all();
			$i=0;
			$temp=array();
			while(isset($data[$i])){
				$new=new UserLogin;
				$new->name			= $data[$i]->name;
				$new->email			= $data[$i]->email;
				$new->password		= $data[$i]->password;
				$temp[$i]=$new;
				$i++;
			}
			return $temp;
		}
		
		public static function deletee($id){
			$obj=FutareaEloquent::where('id',$id);
			$obj->delete();
		}
	}
?>