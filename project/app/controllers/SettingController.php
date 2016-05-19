<?php

class SettingController extends BaseController
{
	
	public function updateframe(){
		$lat1=sprintf('%0.10f',$_POST["lat_from"]);
		$lng1=sprintf('%0.10f',$_POST["lng_from"]);
		$lat2=sprintf('%0.10f',$_POST["lat_to"]);
		$lng2=sprintf('%0.10f',$_POST["lng_to"]);
		$new=new Framee;$new->newFrame($lat1,$lng1,$lat2,$lng2);
		echo "<script>
		alert('ดำเนินการสำเร็จ');
		window.location.href='/updateframe';
		</script>";
	}
	public function delintframe(){
		$id=$_POST['id'];
		//var_dump($id);exit;
		Intframe::deletee($id);
		return Redirect::to('/admin');
	}
	public function saveintframe(){
		$lat1=sprintf('%0.10f',$_POST["lat_from"]);
		$lng1=sprintf('%0.10f',$_POST["lng_from"]);
		$lat2=sprintf('%0.10f',$_POST["lat_to"]);
		$lng2=sprintf('%0.10f',$_POST["lng_to"]);
		$new=new Intframe;$new->newIntframe($lat1,$lng1,$lat2,$lng2);
		echo "<script>
		alert('ดำเนินการสำเร็จ');
		window.location.href='/map';
		</script>";
	}
	public function getalluser(){
		$temp=UserLogin::getall();
		//echo $temp[0]->getid(); exit;
		return View::make('manageuser')->with(array("data"=>$temp));
	}
	public function deluser(){
		$id=$_POST['id'];
		//var_dump($id);exit;
		UserLogin::deletee($id);
		return Redirect::to('/manageuser');
	}
	public function getadminnoti(){
		$temp=Futarea::getall();
		$temp2=Intframe::getall();
		//var_dump($temp2); exit;
		return View::make('admin')->with(array("notiarea"=>$temp , "notiframe"=>$temp2));
	}
	public function getallimg(){
		$temp=Framee::getall();
		//var_dump($temp);
		return View::make('upload')->with(array("framee"=>$temp));
	}
	public function getallframe(){
		$temp=Framee::getall();
		//var_dump($temp);
		return View::make('updateframe')->with(array("framee"=>$temp));
	}
	
	public function getintarea(){
		$temp=Intarea::getbyuser(Auth::user()->id);
		//var_dump($temp);
		$i=0;
		$temp2=array();
		while(isset($temp[$i])){
			$id=$temp[$i]->getid_intarea();
			$temp2[$i]=Change::getdatee($id);
			$i++;
		}
		//echo($i);
		//var_dump($temp2);
		//var_dump($temp);exit;
		return View::make('inter')->with(array("data"=>$temp , "date2"=>$temp2));
	}
	public function getfutarea(){
		$temp=Futarea::getbyuser(Auth::user()->id);
		//var_dump($temp);
		return View::make('percent')->with(array("data"=>$temp));
	}
	
	public function savefutarea(){
		$id_user=Auth::user()->id;
		$lat1=Session::get('lat1');
		$lng1=Session::get('lng1');
		$lat2=Session::get('lat2');
		$lng2=Session::get('lng2');
		$datee=Session::get('date');
		$name=Session::get('name');
		$percent=NULL;
		$new=new Futarea;
		$new->newFutarea($id_user,$lat1,$lng1,$lat2,$lng2,$datee[0],$percent,$name);
		return Redirect::to('/percent');
	}
	public function saveintarea(){//ถ้าจะแก้ปัญหาไฟล์ชนกันต้องมาแก้ตรงนี้โดยแก้พาทไฟล์ที่จะย้ายเข้าโฟลเดอร์ให้ตรงกับ change
		$id_user=Auth::user()->id;
		$frame=Session::get('frame');
		$datee=Session::get('date');
		$lat1=Session::get('lat1');
		$lng1=Session::get('lng1');
		$lat2=Session::get('lat2');
		$lng2=Session::get('lng2');
		$name=Session::get('name');
		$perchange=Session::get('perchangefordb');
		$new=new Intarea;
		$id_intarea=$new->newIntarea($id_user,$lat1,$lng1,$lat2,$lng2,$name);//วนลูปนะ
		$j=0;
		while(isset($frame[$j])){
			$i=1;
			while(isset($datee[$i])){
				$change=new Change;
				$change->newChange($frame[$j],$datee[0],$datee[$i],$id_intarea,$perchange[$j][$i]);
				$i++;
			}
			$j++;
		}
		return Redirect::to('/inter');
	}
	
	public function uploadimg(){
		$file = Input::file('file');
		$date=$_POST['date'];
		$frame=$_POST['frame'];
		$haveimage=new Images;
		$haveimage=$haveimage->haveimage($frame,$date);
		//var_dump($file);
		if($haveimage){
			echo 'have this image in system already';
			exit;
		}
		if($file->guessExtension()!='jpeg'){
			echo 'file type must be .jpg';
			exit;
		}
		$newfile=$date.'_'.$frame.'.jpg';
		$file->move('/var/www/html/project/public/image/',$newfile);
		$newimage=new Images;
		$newimage->newimages($frame,$date);
		echo 'successful upload';
		var_dump($newfile);
	}
	public function editfutarea(){
		$id=$_POST['id_futarea'];
		$percent=$_POST['percent'];
		if(!is_numeric($percent))$percent=NULL;
		Futarea::editpercent($id,$percent);
		return Redirect::to('/percent');
	}
	public function seeintarea(){
		$id_intarea=$_POST['id_intarea'];
		$control=new SelectController;
		$control->clearsession();
		$intarea=Intarea::getbyid($id_intarea);
		$change=Change::getforshow($id_intarea);
		//var_dump($change['date']);exit;
		Session::put('lat1', $intarea->getlat1());
		Session::put('lng1', $intarea->getlng1());
		Session::put('lat2', $intarea->getlat2());
		Session::put('lng2', $intarea->getlng2());
		Session::put('name', $intarea->getname());
		Session::put('imgstart', $change['imgstart']);
		Session::put('frame', $change['frame']);
		Session::put('date', $change['date']);
		Session::put('perchangefordb', $change['perchange']);
		return Redirect::to('/selectResult');
		
	}	
	public function delfutarea(){
		$id=$_POST['id_futarea'];
		Futarea::deletee($id);
		return Redirect::to('/percent');
	}	
	public function delintarea(){
		$id=$_POST['id_intarea'];
		Change::deletee($id);
		Intarea::deletee($id);
		return Redirect::to('/inter');
	}
}