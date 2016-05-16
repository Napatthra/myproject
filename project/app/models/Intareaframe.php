<?php

class Intareaframe{
		private $id_frame;
		private $id_intarea;
		
		public function getid_intarea(){
				return $this->id_intarea;
		}
		public function getid_frame(){
				return $this->id_frame;
		}
		public function setid_intarea($value){
				$this->id_intarea=$value;
		}	
		public function setid_frame($value){
				$this->id_frame=$value;
		}	
		
		public function newIntareaframe($id_frame,$id_intarea){
			$new = new IntareaframeEloquent;
			$new->id_frame		=$id_frame;
			$new->id_intarea	=$id_intarea;
			$new->save();
		}
		
		public static function getbyintarea($id){ //nottest
			$data=Intareaframe::where('id_intarea',$id);
			$i=0;
			$temp=array();
			while(isset($data[$i])){
				$new=new Intareaframe;
				$new->id_frame		=$data[$i]->id_frame;
				$new->id_intarea	=$data[$i]->id_intarea;
				$temp[$i]=$new;
				$i++;
			}
			return $temp;
		}
}