<?php
class ImageController extends BaseController
{
	public function adminset(){
		$myfile = fopen("/home/project/OpenCV/workspace/compare/pr.txt", "w") or die("Unable to open file!");
		$txt = $_POST["block"]."\r\n";
		if($txt=='')$txt="64";
		fwrite($myfile, $txt);
		$txt = $_POST["bin"]."\r\n";
		if($txt=='')$txt="90";
		fwrite($myfile, $txt);
		$txt = $_POST["cut"]."\r\n";
		if($txt=='')$txt="20";
		fwrite($myfile, $txt);
		$txt = $_POST["light"]."\r\n";
		if($txt=='')$txt="0";
		fwrite($myfile, $txt);
		fclose($myfile);
		echo "<script>
		alert('ดำเนินการสำเร็จ');
		window.location.href='/admin';
		</script>";
		//echo "<script type='text/javascript'>alert('ดำเนินการสำเร็จ');</script>";
		//return Redirect::to('/admin');
	}

	public function compareimg(){
		$frame = Session::get('frame');
		$date=$_POST["date"];
		//save img change ลง intarea ถ้าเป็นเมมเบอร์
		//var_dump($date);
		//var_dump($frame);
		$imgstart=Change::getmaxid()+1;
		$imgnum=$imgstart;
		$j=0;
		while(isset($frame[$j])){
			$i=1;
			while(isset($date[$i])){
				$callcore = 'sudo /home/project/OpenCV/workspace/compare/compare';
				$imagecom = ' /var/www/html/project/public/image/'.$date[0].'_'.$frame[$j].'.jpg /var/www/html/project/public/image/'.$date[$i].'_'.$frame[$j].'.jpg /var/www/html/project/public/compareimg/'.$imgnum.'.jpg';
				//ควรมีกรณี -1
				exec($callcore.$imagecom,$oout );
				$out[$j][$i]=$oout[0];
				unset($oout);
				//var_dump($out[$j][$i]);
				$imgnum++;
				//save img change ลง change
				$i++;
			}
			$j++;
		}
		

		Session::put('date', $date);
		Session::put('imgstart', $imgstart);

		Session::put('perchangefordb',$out);
		return Redirect::to('/selectResult');
	}

	
	
	
}