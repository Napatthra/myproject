
<!DOCTYPE html>
<html>
  <head>
    <title>Map</title>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <link href="css/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
      <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    
    <style>
      html, body {
        height: 90%;
        width: 100%;
        /*margin-width:30px;*/
        /*padding: 0px*/
      }
       #map {
        height: 90%;
        width: 80%;
        margin-left:10%;
        /*padding: 0px*/
      }
    .divh {
        border-radius: 8px 8px 8px 8px;
        background-color: rgba(255,255,255,0.6);
        width: 200px;    
        padding: 0px;
        text-align: center;
        margin-top:5%;
        margin-left:43%;
        box-shadow: 0px 1px 5px rgba(0, 0, 0, 0.7);
    }
    .input-group-addon.success {
    color: rgb(255, 255, 255);
    background-color: rgba(102, 102, 102, 0.9);
    box-shadow: 0px 0.5px 1px rgba(0, 0, 0, 0.6);
    }
    </style>
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
    <script src="js/jquery.js"></script>
    <script>
      var map;
      var poly;
      var lat_from, lng_from, lat_to, lng_to;
      var flightPlanCoordinates,flightPath;
      function initialize() {

        var mapOptions = {
          zoom: 15,
          center: new google.maps.LatLng(13.7268,100.7801)
        };
        map = new google.maps.Map(document.getElementById('map'),mapOptions);

        poly = new google.maps.Polyline({
          strokeColor: '#000000',
          strokeOpacity: 1.0,
          strokeWeight: 3
        });

        //poly.setMap(map);
        
        //map.addListener('click', addLatLng);

        // var path = poly.getPath();

        // // Because path is an MVCArray, we can simply append a new coordinate
        // // and it will automatically appear.
        //path.push(event.latLng);

        // Add a new marker at the new plotted point on the polyline.
        var marker = new google.maps.Marker({
          position: new google.maps.LatLng(13.7272,100.7780), 
          draggable:true,
          title: 'Drag to select place',
          //title: "Drag me"
         // title: '#' + path.getLength(),
          map: map
        });
        // var path = poly.getPath();
        // // console.log(event.lat);
        //  path.push(event.latLng);



        google.maps.event.addListener(marker, 'dragstart', function() {
            var my_Point =marker.getPosition();  // หาตำแหน่งของตัว marker เมื่อกดลากแล้วปล่อย
                map.panTo(my_Point);  // ให้แผนที่แสดงไปที่ตัว marker   
                console.log(my_Point.lat());
                console.log(my_Point.lng());
                lat_from=my_Point.lat();
                lng_from=my_Point.lng();
                console.log(lat_from);
                console.log(lng_from);
                $('#lat_from').val(my_Point.lat());
                //$('#lat_value2').val(my_Point.lat());  // เอาค่า latitude ตัว marker แสดงใน textbox id=lat_value
                $('#lng_from').val(my_Point.lng());
               // $('#lon_value2').val(my_Point.lng()); // เอาค่า longitude ตัว marker แสดงใน textbox id=lon_value   
        }); 

        google.maps.event.addListener(marker, 'dragend', function() {
            var my_Point =marker.getPosition();  // หาตำแหน่งของตัว marker เมื่อกดลากแล้วปล่อย
                map.panTo(my_Point);  // ให้แผนที่แสดงไปที่ตัว marker   
                console.log(my_Point.lat());
                console.log(my_Point.lng());
                lat_to=my_Point.lat();
                lng_to=my_Point.lng();
                console.log(lat_to);
                console.log(lng_to);
                //$('#lat_value').val(my_Point.lat());
                $('#lat_to').val(my_Point.lat());  // เอาค่า latitude ตัว marker แสดงใน textbox id=lat_value
               // $('#lon_value').val(my_Point.lng());
                $('#lng_to').val(my_Point.lng()); // เอาค่า longitude ตัว marker แสดงใน textbox id=lon_value 
       
          flightPlanCoordinates = [
          {lat:lat_from , lng: lng_from},
          {lat: lat_from, lng: lng_to},
          {lat: lat_to, lng: lng_to},
          {lat: lat_to, lng: lng_from},
          {lat:lat_from , lng: lng_from}
          ];

          flightPath = new google.maps.Polyline({
          path: flightPlanCoordinates,
          geodesic: true,
          strokeColor: '#FF0000',
          strokeOpacity: 1.0,
          strokeWeight: 2
        });
       // flightPath.setMap(map);
        }); 
        

        
      }
        function addLine(){
           flightPath.setMap(map);
        }
        function subLine(){
           flightPath.setMap(null);
        }
        
      google.maps.event.addDomListener(window, 'load', initialize);
    </script>
  </head>
 
  <body style="background-image: url('bgs.jpg');">
    <nav class="navbar navbar-light  navbar-fixed-top" style="background-color: #666666;">
       <a class="navbar-brand" href="start"> <font color="#ffffff"> <i class="fa fa-child" style="font:#FFF;"></i> Environment Change Detection</font></a>
    </nav>
    
    <div class="divh">
    <span style="color:#800000;text-align:center;"><h2>Select Place</h2></span>
    </div>
    
    <div id="map"></div>
    
    <form id="form_get_detailMap" name="form_get_detailMap" method="post" action="">
    
      <div class="row">
        
        <div class="col-lg-offset-3 col-lg-3"> 
            <div class="input-group">
              <span class="input-group-addon success" id="basic-addon1">From Latitude </span>
              <input name="lat_from" type="text"  id="lat_from" value="0" class="form-control" />
            </div>

            <div class="input-group">
              <span class="input-group-addon success" id="basic-addon1">To Latitude  </span>
              <input name="lat_to" type="text" id="lat_to" value="0" class="form-control" />
            </div>
        </div>
  
        <div class="col-lg-3">
          <div class="input-group">
             <span class="input-group-addon success" id="basic-addon1">From Longitude  </span>
             <input name="lng_from" type="text" id="lng_from" value="0" class="form-control" />
          </div>

          <div class="input-group">
             <span class="input-group-addon success" id="basic-addon1">To Longitude  </span>
             <input name="lng_to" type="text" id="lng_to" value="0" class="form-control" />
          </div>
        </div>
      </div>
    </form> 

    <div>
      <div class="input-group">
        <span class="input-group-addon success" id="basic-addon1">Name of location  </span>
          <input name="name" type="text" id="name" value="" class="form-control" />
      </div>
    </div>
    
   
      
     
    <div class="text-center">
      <input onclick="subLine();" class="btn btn-danger" type=button value="Clear Frame">
      <input onclick="addLine();" class="btn btn-success" type=button value="Set Frame">
      <a href="tabledate" class="btn btn-primary" >NEXT <i class="fa fa-hand-o-left"></i></a>
    </div>
    <br>

  </body>

</html>





  

