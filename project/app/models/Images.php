<?php
class Images{
		private $id_frame;
		private $imdate;
		private $id_images;
	
		public function getid_frame(){
				return $this->id_frame;
		}
		public function getid_images(){
				return $this->id_images;
		}
		public function getimdate(){
				return $this->imdate;
		}
		
		public function setid_frame($value){
				$this->id_frame=$value;
		}
		public function setimdate($value){
				$this->imdate=$value;
		}
		
		public function newImages($id_frame,$imdate){
				$new = new ImagesEloquent;
				$new->id_frame			= $id_frame;
				$new->imdate			= date_format(date_create($imdate),"Y-m-d");
				$new->save();
		}
		public function getframedate($frameid){
			$sql="SELECT `imdate` FROM `tbl_images` WHERE `id_frame`=".$frameid." ORDER BY `imdate`";
			$results = DB::select( DB::raw($sql));
			return $results;
		}
		
		public function haveimage($id_frame,$imdate){
			$sql="SELECT `imdate` FROM `tbl_images` WHERE `id_frame`='".$id_frame."' AND `imdate`='".date_format(date_create($imdate),"Y-m-d")."';";
			$results = DB::select( DB::raw($sql));
			//var_dump($results);
			//var_dump($sql);
			if(isset($results[0])){return true;}
			return false;
			
		}
		public static function getimagerange($date1,$llat1,$llng1,$llat2,$llng2){
			$sql="SELECT * FROM tbl_frame WHERE (`id_frame` IN (SELECT `id_frame` FROM `tbl_images` WHERE DATE(`create_at`) = DATE('".$date1."'))) AND 
			
			(`id_frame` IN
			(SELECT `id_frame` FROM tbl_frame 
			WHERE ( ".(string)$llat1." > `lat1` AND `lat1` > ".(string)$llat2." AND ".(string)$llng1." < `lng1` AND `lng1` < ".(string)$llng2." ) OR ("
			.(string)$llat1." > `lat2` AND `lat2` > ".(string)$llat2." AND ".(string)$llng1." < `lng1` AND `lng1` < ".(string)$llng2." ) OR ("
			.(string)$llat1." > `lat1` AND `lat1` > ".(string)$llat2." AND ".(string)$llng1." < `lng2` AND `lng2` < ".(string)$llng2." ) OR ("
			.(string)$llat1." > `lat2` AND `lat2` > ".(string)$llat2." AND ".(string)$llng1." < `lng2` AND `lng2` < ".(string)$llng2." )));";
			$temp=DB::select(DB::raw($sql));
			
			//$temp=ImagesEloquent::where('create_at','=>',$date1)->where('create_at','<=',$date2)->lists('id_frame','id_images');
			var_dump($temp);
			var_dump($sql);
			return $temp;
		}
		
		
}