<?php

class Intarea{
		private $id_intarea;
		private $id_user;
		private $lat1;
		private $lng1;
		private $lat2;
		private $lng2;
		private $name;
		
		public function getid_intarea(){
				return $this->id_intarea;
		}
		public function getid_user(){
				return $this->id_user;
		}
		public function getlat1(){
				return $this->lat1;
		}
		public function getlng1(){
				return $this->lng1;
		}
		public function getlat2(){
				return $this->lat2;
		}
		public function getlng2(){
				return $this->lng2;
		}
		public function getname(){
				return $this->name;
		}

		
		public function setid_user($value){
				$this->id_user=$value;
		}	
		public function setlat1($value){
				$this->lat1=$value;
		}
		public function setlng1($value){
				$this->lng1=$value;
		}
		public function setlat2($value){
				$this->lat2=$value;
		}
		public function setlng2($value){
				$this->lng2=$value;
		}
		public function setname($value){
				$this->name=$value;
		}
		
		public function newIntarea($id_user,$lat1,$lng1,$lat2,$lng2,$name){
				$new = new IntareaEloquent;
				$new->id_user		= $id_user;
				$new->lat1			= $lat1;
				$new->lng1			= $lng1;
				$new->lat2			= $lat2;
				$new->lng2			= $lng2;
				$new->name			= $name;
				$new->save();
				$temp=IntareaEloquent::max('id_intarea');
				return $temp;
		}
		
		public static function getbyid($id_intarea){
			$data=IntareaEloquent::where('id_intarea',$id_intarea)->get();
				$i=0;
				//$temp=array();
				//while(isset($data[$i])){
					$new=new Intarea;
					$new->id_intarea	= $data[$i]->id_intarea;
					$new->id_user		= $data[$i]->id_user;
					$new->lat1			= $data[$i]->lat1;
					$new->lng1			= $data[$i]->lng1;
					$new->lat2			= $data[$i]->lat2;
					$new->lng2			= $data[$i]->lng2;
					$new->name			= $data[$i]->name;
					//$temp[$i]=$new;
					//$i++;
				//}
			return $new;
		}
		
		public static function getbyuser($id_user){
				$data=IntareaEloquent::where('id_user',$id_user)->get();
				$i=0;
				$temp=array();
				while(isset($data[$i])){
					$new=new Intarea;
					$new->id_intarea	= $data[$i]->id_intarea;
					$new->id_user		= $data[$i]->id_user;
					$new->lat1			= $data[$i]->lat1;
					$new->lng1			= $data[$i]->lng1;
					$new->lat2			= $data[$i]->lat2;
					$new->lng2			= $data[$i]->lng2;
					$new->name			= $data[$i]->name;
					$temp[$i]=$new;
					$i++;
				}
				return $temp;
		}
		
		public static function deletee($id_intarea){
			$obj=IntareaEloquent::where('id_intarea',$id_intarea);
			$obj->delete();
		}
		
		
}