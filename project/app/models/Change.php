<?php

class Change{
	private $id_change;
	private $id_frame;
	private $date1;
	private $date2;
	private $id_intarea;
	private $perchange;
	
	public function getid_change(){
			return $this->id_change;
	}
	public function getid_frame(){
			return $this->id_frame;
	}
	public function getdate1(){
			return $this->date1;
	}
	public function getdate2(){
			return $this->date2;
	}
	public function getid_intarea(){
			return $this->id_intarea;
	}
	public function getperchange(){
			return $this->perchange;
	}
	
	public function setid($value){
			$this->id_frame=$value;
	}	
	public function setdate1($value){
			$this->date1=$value;
	}	
	public function setdate2($value){
			$this->date2=$value;
	}	
	public function setid_intarea($value){
			$this->id_intarea=$value;
	}	
	public function setperchange($value){
			$this->perchange=$value;
	}	
	
	public function newChange($id_frame,$date1,$date2,$id_intarea,$perchange){
			$new = new ChangeEloquent;
			$new->id_frame		= $id_frame;
			$new->date1			= $date1;
			$new->date2			= $date2;
			$new->id_intarea	= $id_intarea;
			$new->perchange		= $perchange;
			$new->save();
	}
	
	public static function getmaxid(){
		$temp=ChangeEloquent::max('id_change');
		return $temp;
	}
	
	public static function getforshow($id_intarea){
		$temp['imgstart']=ChangeEloquent::where('id_intarea',$id_intarea);
		$temp['imgstart']=$temp['imgstart']->min('id_change');
		$temp['frame']=ChangeEloquent::where('id_intarea',$id_intarea)->distinct()->lists('id_frame');
		var_dump($temp['frame']);
		$temp['frame']=$temp['frame'];
		$date2=ChangeEloquent::where('id_intarea',$id_intarea)->distinct()->lists('date2');
		$date1=ChangeEloquent::where('id_intarea',$id_intarea)->distinct()->lists('date1');
		$temp['date']=array_merge($date1,$date2);
		//var_dump($temp['date']);exit;
		//$perchange
		$j=0;
		while(isset($temp['frame'][$j])){
			$i=1;
			while(isset($temp['date'][$i])){
				$temp['perchange'][$j][$i]=ChangeEloquent::where('id_intarea',$id_intarea)
												->where('date2',$temp['date'][$i])
												->where('id_frame',$temp['frame'][$j])
												->lists('perchange');
				$temp['perchange'][$j][$i]=$temp['perchange'][$j][$i][0];
				$i++;
			}
			$j++;
		}
		return $temp;
	}
	public static function getdatee($id_intarea){
		$date2=ChangeEloquent::where('id_intarea',$id_intarea)->distinct()->lists('date2');
		$date1=ChangeEloquent::where('id_intarea',$id_intarea)->distinct()->lists('date1');
		$datee=array_merge($date1,$date2);
		return $datee;
	}
	public static function getbyintarea($id_intarea){
				$data=ChangeEloquent::where('id_intarea',$id_intarea)->get();
				$i=0;
				$temp=array();
				while(isset($data[$i])){
					$new = new Change;
					$new->id_change		= $data[$i]->id_change;
					$new->id_frame		= $data[$i]->id_frame;
					$new->date1			= $data[$i]->date1;
					$new->date2			= $data[$i]->date2;
					$new->id_intarea	= $data[$i]->id_intarea;
					$new->perchange		= $data[$i]->perchange;
					$temp[$i]=$new;
					$i++;
				}
				return $temp;
	}
	
	public static function deletee($id_intarea){
			$obj=ChangeEloquent::where('id_intarea',$id_intarea);
			$obj->delete();
		}
		
}