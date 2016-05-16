<?php

class Futarea{
		private $id_user;
		private $id_futarea;
		private $lat1;
		private $lng1;
		private $lat2;
		private $lng2;
		private $fdate;
		private $percent;
		private $name;

		public function getid_futarea(){
				return $this->id_futarea;
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
		public function getfdate(){
				return $this->fdate;
		}
		public function getpercent(){
				return $this->percent;
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
		public function setfdate($value){
				$this->fdate=$value;
		}
		public function setpercent($value){
				$this->percent=$value;
		}
		
		public function newFutarea($id_user,$lat1,$lng1,$lat2,$lng2,$fdate,$percent,$name){
				$new = new FutareaEloquent;
				$new->id_user		= $id_user;
				$new->lat1			= $lat1;
				$new->lng1			= $lng1;
				$new->lat2			= $lat2;
				$new->lng2			= $lng2;
				$new->fdate			= $fdate;
				$new->percent		= $percent;
				$new->name			= $name;
				$new->save();
		}
		
		public static function getall(){
			$data=FutareaEloquent::all();
			//var_dump($data);
			$i=0;
			$temp=array();
			while(isset($data[$i])){
				$new=new Futarea;
				$new->id_futarea	= $data[$i]->id_futarea;
				$new->lat1			= $data[$i]->lat1;
				$new->lng1			= $data[$i]->lng1;
				$new->lat2			= $data[$i]->lat2;
				$new->lng2			= $data[$i]->lng2;
				$new->fdate			= $data[$i]->fdate;
				$new->percent		= $data[$i]->percent;
				$new->name			= $data[$i]->name;
				$temp[$i]=$new;
				$i++;
			}
			return $temp;
		}
		
		public static function getbyuser($id_user){
			$data=FutareaEloquent::where('id_user',$id_user)->get();
			$i=0;
			$temp=array();
			while(isset($data[$i])){
				$new=new Futarea;
				$new->id_futarea	= $data[$i]->id_futarea;
				$new->lat1			= $data[$i]->lat1;
				$new->lng1			= $data[$i]->lng1;
				$new->lat2			= $data[$i]->lat2;
				$new->lng2			= $data[$i]->lng2;
				$new->fdate			= $data[$i]->fdate;
				$new->percent		= $data[$i]->percent;
				$new->name			= $data[$i]->name;
				$temp[$i]=$new;
				$i++;
			}
			return $temp;
		}
		
		public static function editpercent($id_futarea,$percent){
			$obj=FutareaEloquent::where('id_futarea',$id_futarea)->update(array('percent' => $percent));
		}
		public static function deletee($id_futarea){
			$obj=FutareaEloquent::where('id_futarea',$id_futarea);
			$obj->delete();
		}
		

}