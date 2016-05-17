<?php
class notiController extends BaseController
{
	public function debug(){
		return Response::download('/home/project/OpenCV/workspace/example.txt');
	}
	public function autocompare(){
		$nowdate=date("Y-m-d");
		//$nowdate=date('Y-m-d',(strtotime('+543 year', strtotime($nowdate))));
		$olddate=date('Y-m-d',(strtotime('-1 day', strtotime($nowdate))));
		$allfu=Futarea::getall();
		$i=0;
		while(isset($allfu[$i])){
			
		$eiei=new Framee;
		//$eiei=$eiei->findFrame($allfu[$i]->getlat1(),$allfu[$i]->getlng1(),$allfu[$i]->getlat2(),$allfu[$i]->getlng2());
		var_dump($eiei);
			$frame=Images::getimagerange($nowdate,$allfu[$i]->getlat1(),$allfu[$i]->getlng1(),$allfu[$i]->getlat2(),$allfu[$i]->getlng2());
		$i++;
		}
		exit;
		$i=0;
		while(isset($obj[$i])){//เปรียบเทียบรูปทั้งหมด
			//var_dump($obj[$i]->id_frame);
			//exit;
			while(isset($tframe[$j])){
				$framee =new Framee;
				$framee=$framee->findframe($lat1,$lng1,$lat2,$lng2);
			}
			//if(isset($framee[0]->id_frame)) //tam tor
			$i++;
		}
		
	}
}