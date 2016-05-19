<?php

class Framee{
		private $id_frame;
		private $lat1;
		private $lng1;
		private $lat2;
		private $lng2;
		
		public function getid_frame(){
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

		
		public function setid($value){
				$this->id_frame=$value;
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
		
		public function newFrame($lat1,$lng1,$lat2,$lng2){
				$new = new FrameeEloquent;
				$new->lat1			= $lat1;
				$new->lng1			= $lng1;
				$new->lat2			= $lat2;
				$new->lng2			= $lng2;
				$new->save();
		}
		
		public static function getbyid($id_frame){
			$data=FrameeEloquent::where('id_frame',$id_frame)->get();
			$i=0;
			//var_dump($data[$i]['id_frame']);
			$temp=array();
			while(isset($data[$i])){
				//$new=new Framee;
				$new['id_frame']		= $data[$i]['id_frame'];
				$new['lat1']			= $data[$i]['lat1'];
				$new['lng1']			= $data[$i]['lng1'];
				$new['lat2']			= $data[$i]['lat2'];
				$new['lng2']			= $data[$i]['lng2'];
				$temp[$i]=$new;
				$i++;
			}
			return $temp;
		}
		public function findFrame($llat1,$llng1,$llat2,$llng2){
			$sql="set @EPSLION = 0.001 ;";
			DB::statement( DB::raw($sql));
			$sql=" SELECT * FROM tbl_frame WHERE ( "
			.(string)$llat1." > `lat1`-@EPSLION AND `lat1` > ".(string)$llat2."-@EPSLION AND ".(string)$llng1."-@EPSLION < `lng1` AND `lng1`-@EPSLION < ".(string)$llng2." ) OR ("
			.(string)$llat1." > `lat2`-@EPSLION AND `lat2` > ".(string)$llat2."-@EPSLION AND ".(string)$llng1."-@EPSLION < `lng1` AND `lng1`-@EPSLION < ".(string)$llng2." ) OR ("
			.(string)$llat1." > `lat1`-@EPSLION AND `lat1` > ".(string)$llat2."-@EPSLION AND ".(string)$llng1."-@EPSLION < `lng2` AND `lng2`-@EPSLION < ".(string)$llng2." ) OR ("
			.(string)$llat1." > `lat2`-@EPSLION AND `lat2` > ".(string)$llat2."-@EPSLION AND ".(string)$llng1."-@EPSLION < `lng2` AND `lng2`-@EPSLION < ".(string)$llng2." ); "; 
			$results = DB::select( DB::raw($sql));
			//echo $sql;
			if(!isset($results)){
				$sql="SELECT * FROM tbl_frame 
				WHERE ( `lat1` > ".(string)$llat1."-@EPSLION AND ".(string)$llat1." > `lat2`-@EPSLION AND `lng1`-@EPSLION < ".(string)$llng1." AND ".(string)$llng1."-@EPSLION < `lng2` AND
				`lat1` > ".(string)$llat2."-@EPSLION AND ".(string)$llat2." > `lat2`-@EPSLION AND `lng1`-@EPSLION < ".(string)$llng2." AND ".(string)$llng2."-@EPSLION < `lng2`);";
				$results = DB::select( DB::raw($sql));
			}
			//echo $sql;
			//var_dump($results);
			//exit;
			return $results;
		}
		public static function getall(){
			$data=FrameeEloquent::all();
			//var_dump($data);
			$i=0;
			$temp=array();
			while(isset($data[$i])){
				$new=new Framee;
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