<?php
class ResultController extends BaseController
{
	public function autocompare(){
		$framee =new Framee;
		$framee=$framee->findframe($lat1,$lng1,$lat2,$lng2);
		//if(isset($framee[0]->id_frame)) //tam tor
		
		
	}
}