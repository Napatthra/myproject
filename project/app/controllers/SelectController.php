<?php
class SelectController extends BaseController
{
	public function clearsession(){
		Session::forget('frame');
		Session::forget('lat1');
		Session::forget('lng1');
		Session::forget('lat2');
		Session::forget('lng2');
		Session::forget('date');
		Session::forget('perchange');
		Session::forget('perchangefordb');
		Session::forget('imgstart');
		Session::forget('linkvideo');
		Session::forget('name');
	}
	public function selectimage(){
		$lat1=$_POST["lat_from"];
		$lng1=$_POST["lng_from"];
		$lat2=$_POST["lat_to"];
		$lng2=$_POST["lng_to"]; //ต้องทำให้เป็นมุมบนขวากะล่างซ้าย
		$name=$_POST["name"];
		if($lat1<$lat2){
			$x=$lat1;
			$lat1=$lat2;
			$lat2=$x;
		}
		if($lng1>$lng2){
			$x=$lng1;
			$lng1=$lng2;
			$lng2=$x;
		}
		$framee =new Framee;
		$framee=$framee->findframe($lat1,$lng1,$lat2,$lng2);
		if(!isset($framee[0]->id_frame))return Redirect::to('map')->with('flash_notice','พื้นที่นี้ยังไม่มีให้บริการ');//เชคว่าพื้นที่นั้นไม่มีเฟรม
		
		//===================================FINDFRAME========================================
		//////////////////////////////////////////////////////////////////////////////////////
		$conframe=0;$i=0;$haveimg=true;
		while(isset($framee[$i]->id_frame)){
			$frame[$i]=$framee[$i]->id_frame;
			$img =new Images;
			$alldate[$i]=$img->getframedate($framee[$i]->id_frame);
			if(!isset($alldate[$i])){$haveimg=false;}//array 2 มิติ
			if(($framee[$i]->lat1 > $lat1 && $lat1 > $framee[$i]->lat2 && $framee[$i]->lng1 < $lng1 && $lng1 < $framee[$i]->lng2) || 
			($framee[$i]->lat1 > $lat2 && $lat2 > $framee[$i]->lat2 && $framee[$i]->lng1 < $lng1 && $lng1 < $framee[$i]->lng2) || 
			($framee[$i]->lat1 > $lat1 && $lat1 > $framee[$i]->lat2 && $framee[$i]->lng1 < $lng2 && $lng2 < $framee[$i]->lng2) || 
			($framee[$i]->lat1 > $lat2 && $lat2 > $framee[$i]->lat2 && $framee[$i]->lng1 < $lng2 && $lng2 < $framee[$i]->lng2))
			{$conframe++;}
			$i++;
		}
		if($conframe<4&&$conframe>count($framee)){
			echo $conframe;
			echo "ไม่มีเฟรมครอบคลุม พท."; //กรณีที่เฟรมไม่ถึงสี่เฟรมจะจับไม่ได้
		}
		if(!$haveimg)return Redirect::to('map')->with('flash_notice','พื้นที่นี้ยังไม่มีให้บริการ');//บอกว่าพทนั้นไม่มีเฟรม
		////////////////////////////////////////////////////////////////////////////////////////
		////////////////////////////////////////////////////////////////////////////////////////
		
		//////=======================check date not dup==================================================
		////////////////////////////////////////////////////////////////////////////////////////
		$date=$alldate[0];
		$i=1;$l=0;
		while(isset($alldate[$i])){
			$k=0;
			while(isset($date[$k])){
				$havedate=false;
				$j=0;
				while(isset($alldate[$i][$j])){
					if( !strcmp($alldate[$i][$j]->imdate ,$date[$k]->imdate )){
						$havedate=true;
						}
					$j++;
				}
				if(!$havedate)$date[$k]->imdate="";
				$k++;
			}
			$i++;
		}
		$k=0;$l=0;
		while(isset($date[$k])){
			if($date[$k]->imdate!=''){
				$rdate[$l]=$date[$k]->imdate;
				$l++;
			}
			$k++;
		}
		//////////////////////////////////////////////////////////////////////////////////////////
		//////////////////////////////////////////////////////////////////////////////////////////
		$this->clearsession();
		Session::put('frame', $frame);
		Session::put('lat1', $lat1);
		Session::put('lng1', $lng1);
		Session::put('lat2', $lat2);
		Session::put('lng2', $lng2);
		Session::put('name', $name);
		return View::make('tabledate')->with(array('date' => $rdate , 'frame' => $frame ));
	}
	
	
}