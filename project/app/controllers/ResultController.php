<?php
class ResultController extends BaseController
{
	
	public function selectResult(){
		$this->sumperchange();
		//var_dump(Session::get('perchange'));
		return View::make('selectResult');
	}
	public function sumperchange(){
		$out=Session::get('perchangefordb');
		$frame=Session::get('frame');
		$perchange=array();
		$i=1;$j=0;
		while(isset($out[$j][$i])){
			$temp=0;
			while(isset($out[$j][$i])){
				$temp+=$out[$j][$i];
				$j++;
			}
			$perchange[$i-1]=$temp/count($frame);
			$i++;
			$j=0;
		}
		Session::put('perchange', $perchange);
	}
	public function makegraph(){
		$date=Session::get('date');
			$frame=Session::get('frame');
			$perchange=Session::get('perchange');
		return View::make('graph')->with(array('date' => $date ,'frame' => $frame,'perchange' => $perchange ));;
	}
	public function makeimg(){
		$date=Session::get('date');
			$frame=Session::get('frame');
			$imgstart=Session::get('imgstart');
		return View::make('resultimage')->with(array('date' => $date ,'frame' => $frame,'imgstart' => $imgstart ));;
	}
	public function makevideo(){
		if(Session::get('linkvideo')==''){
		$date=Session::get('date');
		$frame=Session::get('frame');
		$imgnum=Session::get('imgstart');
		$callcore = 'sudo /home/project/OpenCV/workspace/video/video';
		$imgname='';
		$i=0;
		while(isset($frame[$i])){
			$j=1;
			$imgname=$imgname.' /var/www/html/project/public/image/'.$date[0].'_'.$frame[$i].'.jpg';
			while(isset($date[$j])){
				$imgname=$imgname.' /var/www/html/project/public/compareimg/'.$imgnum.'.jpg';
				$imgnum++;
				$j++;
			}
			$i++;
		}
		exec($callcore.$imgname);

		$linkvideo=$this->uploadvideo();
		Session::put('linkvideo',$linkvideo);
		echo $linkvideo;
		}else{
			$linkvideo=Session::get('linkvideo');
		}
		return View::make('vdo')->with(array('linkvideo' => $linkvideo));
	}
	
	public function makepdf(){
			$date=Session::get('date');
			$frame=Session::get('frame');
			$perchange=Session::get('perchange');
			//var_dump($perchange);
			//exit;
			$pdfdate='';
					$j=0;
					while(isset($perchange[$j])){
						$pdfdate=$pdfdate.'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'
				.$date[$j+1].' &nbsp; have changed by  '.$perchange[$j].'%</div><br />';
						$j++;
					}
			$pdf = App::make('dompdf');
			$pdfmesage = '<head>

			<title>Environment Change Detection</title>
			<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
			
			</head>
			<body>
			<br /><br />
			<div style="text-align: center;">
				<span style="font-size:32px;"><strong>THE DIFFERENCE IN<br />THE CHANGE OF THE ENVIRONMENT</strong></span></div>
			<div>
			<br /><br /><br />
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			The change of the land near the latitude of '.sprintf('%0.10f',Session::get('lat1')).' - '.sprintf('%0.10f',Session::get('lat2')).' and longitude of <br /><br />'.sprintf('%0.10f',Session::get('lng1')).' - '.sprintf('%0.10f',Session::get('lng2')).' 
			by counting the changes from '.$date[0].' to '.$date[count($date)-1].'<br /><br /><br />'.$pdfdate.'
				
			</body>
			
			';
			
			$pdf->loadHTML($pdfmesage);
			return $pdf->stream();
	}
	
	protected function uploadvideo(){
        ini_set("max_execution_time", 0);
        session_start();

        $OAUTH2_CLIENT_ID = '62144918596-06j0v1tit50u2h68bp9blm08ir6kme4f.apps.googleusercontent.com';
        $OAUTH2_CLIENT_SECRET = 'Ss4iIiRELUdd3hsgMLeoESAt';
        $client = new Google_Client();
        $client->setClientId($OAUTH2_CLIENT_ID);
        $client->setApprovalPrompt('auto');
        $client->revokeToken();
        $client->setAccessType('offline');
        $client->setClientSecret($OAUTH2_CLIENT_SECRET);
        $client->setScopes('https://www.googleapis.com/auth/youtube');
        $redirect = "http://smith96.ce.kmitl.ac.th:8002/vdo";
        $client->setRedirectUri($redirect); 
        $client->refreshToken('1/xq2c1P6typFPtGYDlY4J8xQ2lVkQH6jR-ifuEgbh_94MEudVrK5jSpoR30zcRFq6');
        $_SESSION['access_token']=$client->getAccessToken();
        $client->setAccessToken($_SESSION['access_token']);


        // Define an object that will be used to make all API requests.
        $youtube = new Google_Service_YouTube($client);

        if (isset($_GET['code'])) {
              if (strval($_SESSION['state']) !== strval($_GET['state'])) {
                var_dump("////session state////"); var_dump($_SESSION['state']); 
                var_dump("////state////");var_dump($_GET['state']); 
                die('The session state did not match.');
            }
            $client->authenticate($_GET['code']);
            $_SESSION['token'] = $client->getAccessToken();
            header('Location: ' . $redirect);
            var_dump("////token////"); var_dump($_SESSION['token']);
            header('Location: ' . $redirect);
        }

        if (isset($_SESSION['token'])) {
          $client->setAccessToken($_SESSION['token']);
          if ($client->isAccessTokenExpired()) {
              $client->refreshToken('1/xq2c1P6typFPtGYDlY4J8xQ2lVkQH6jR-ifuEgbh_94MEudVrK5jSpoR30zcRFq6');
              $_SESSION['access_token']=$client->getAccessToken();
              $client->setAccessToken($_SESSION['access_token']);
          }
        }

        //chdir('assets');
        $group = 10; 
        // Check to ensure that the access token was successfully acquired.
    
        if ($client->getAccessToken()) {
              $videoPath = "/home/project/cvideo/video.avi";
              $title = "video.avi";

                // Create a snippet with title, description, tags and category ID
                // Create an asset resource and set its snippet metadata and type.
                // This example sets the video's title, description, keyword tags, and
                // video category.
                    $snippet = new Google_Service_YouTube_VideoSnippet();
                    $snippet->setTitle($title);
                    $snippet->setDescription($title);
                    $snippet->setTags(array("tag1", "tag2"));

                // Numeric video category. See
                // https://developers.google.com/youtube/v3/docs/videoCategories/list 
                    $snippet->setCategoryId("22");

                // Set the video's status to "public". Valid statuses are "public",
                // "private" and "unlisted".
                    $status = new Google_Service_YouTube_VideoStatus();
                    $status->privacyStatus = "public";

                // Associate the snippet and status objects with a new video resource.
                    $video = new Google_Service_YouTube_Video();
                    $video->setSnippet($snippet);
                    $video->setStatus($status);

                // Specify the size of each chunk of data, in bytes. Set a higher value for
                // reliable connection as fewer chunks lead to faster uploads. Set a lower
                // value for better recovery on less reliable connections.
                    $chunkSizeBytes = 1 * 1024 * 1024;

                // Setting the defer flag to true tells the client to return a request which can be called
                // with ->execute(); instead of making the API call immediately.
                    $client->setDefer(true);

                // Create a request for the API's videos.insert method to create and upload the video.
                    $insertRequest = $youtube->videos->insert("status,snippet", $video);

                // Create a MediaFileUpload object for resumable uploads.
                    $media = new Google_Http_MediaFileUpload(
                        $client,
                        $insertRequest,
                        'video/*',
                        null,
                        true,
                        $chunkSizeBytes
                        );

                    $media->setFileSize(filesize($videoPath));


                // Read the media file and upload it chunk by chunk.
                    $status = false;
                    $handle = fopen($videoPath, "rb");
                    while (!$status && !feof($handle)) {
                      $chunk = fread($handle, $chunkSizeBytes);
                      $status = $media->nextChunk($chunk);
                  }

                  $result = false;
                  if($status != false) {
                   $result = $status;
                  }

               fclose($handle);

                // If you want to make other calls after the file upload, set setDefer back to false
               $client->setDefer(false);

               //echo "Video Uploaded";
               //echo sprintf('<li>%s (%s)</li>',
               // $status['snippet']['title'],
               // $status['id']);

            /*catch (Google_Service_Exception $e) {
                echo sprintf('A service error occurred: <code>%s</code>',
                htmlspecialchars($e->getMessage()));
            } 
            catch (Google_Exception $e) {
                echo sprintf('An client error occurred: <code>%s</code>',
                htmlspecialchars($e->getMessage()));
            }*/

            $_SESSION['token'] = $client->getAccessToken();
              $group = $group+10;
          
        } 

        else {
          // If the user hasn't authorized the app, initiate the OAuth flow
          $state = mt_rand();
          $client->setState($state);
          $_SESSION['state'] = $state;

          $authUrl = $client->createAuthUrl();
          $re = "https://developers.google.com/oauthplayground/";
          echo "Authorization Required "; 
         echo "You need to.......".$authUrl;
        echo "<a href='".$re."'>authorize access</a>";
        echo " authorize access before proceeding";

		

        //header('Location: ' . filter_var($auth_url, FILTER_SANITIZE_URL));
          
        }
        return $status['id'];
    }

}