<?php

class Intframe{
		private $id_intframe;
		private $lat1;
		private $lng1;
		private $lat2;
		private $lng2;
		
		public function getid_intframe(){
				return $this->id_frame;
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
		
		public function newIntframe($lat1,$lng1,$lat2,$lng2){
				$new = new IntframeEloquent;
				$new->lat1			= $lat1;
				$new->lng1			= $lng1;
				$new->lat2			= $lat2;
				$new->lng2			= $lng2;
				$new->save();
		}
		
		public static function getbyid($id_frame){
			$data=IntframeEloquent::where('id_frame',$id_frame)->get();
			$i=0;
			//var_dump($data[$i]['id_frame']);
			$temp=array();
			while(isset($data[$i])){
				//$new=new Framee;
				$new['id_intframe']		= $data[$i]['id_intframe'];
				$new['lat1']			= $data[$i]['lat1'];
				$new['lng1']			= $data[$i]['lng1'];
				$new['lat2']			= $data[$i]['lat2'];
				$new['lng2']			= $data[$i]['lng2'];
				$temp[$i]=$new;
				$i++;
			}
			return $temp;
		}
		public static function getall(){
			$data=IntframeeEloquent::all();
			//var_dump($data);
			$i=0;
			$temp=array();
			while(isset($data[$i])){
				$new=new Intframee;
				$new->id_frame		= $data[$i]->id_frame;
				$new->lat1			= $data[$i]->lat1;
				$new->lng1			= $data[$i]->lng1;
				$new->lat2			= $data[$i]->lat2;
				$new->lng2			= $data[$i]->lng2;
				$temp[$i]=$new;
				$i++;
			}
			return $temp;
		}
	
}
?>