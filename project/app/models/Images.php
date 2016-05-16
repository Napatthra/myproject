<?php
class Images{
		private $id_frame;
		private $imdate;
	
		public function getid_frame(){
				return $this->id_frame;
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
		
}