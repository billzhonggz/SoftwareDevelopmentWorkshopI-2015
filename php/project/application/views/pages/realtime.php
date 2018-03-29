<!--应该放在body下的div-->
<style type="text/css">



#planeImg {
	transform:rotate(30deg);
	text-align:center; 
	position:relative; 
}

</style>
	<div style="position:absolute; left:0px; top:0px; height:100%; width:250px; background-color:#f8f8f8; z-index: 10;"></div>
	<div id="container" style="position:absolute;top:0px;right:0px; height:100%; width:90%; background-color=blue; z-index: 0;" ></div>
			<div id="r-result" style="position:absolute;bottom:60px;left:260px;">
				<input type="button"  onclick="openHeatmap();" value="Show Pollution Map"/>
				<input type="button"  onclick="closeHeatmap();" value="Hide Pollution Map"/>
			</div>
<!--/应该放在body下的div-->
			


    <div id="wrapper" ><!--这个里面的就应该对应你的模版的pagecontent-->
		<!-- Page Content  -->
		<!-- Map -->
				        <div id="page-wrapper">
			        
            <div class="container-fluid">

                <div class="row">
	                <div class="col-lg-12" style="background-color:rgba(255, 255, 255, 0.9);text-align: center;">
		                <h1>Realtime Data Monitor</h1>
		                
		                <button class="btn" style="position:absolute; top:20px; right:50px;" onclick="restart()">Restart</button>
		                <button class="btn" style="position:absolute; top:20px; right:150px;" onclick="pause()">Pause</button>
		                <div class="btn-group" style="position:absolute; top:20px; left:50px;">
							  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Aircrafts 
							    <span class="caret"></span>
							  </button>
							  <ul class="dropdown-menu">
							    <li><a href="#">DJ-001</a></li>
							  </ul>
						</div>
	                </div>
	                
                    <div class="col-lg-1 col-lg-offset-11"><div style="height:25px;"></div></div>
                    <div class="col-lg-2">
	                	<div class="panel panel-default">
                            <div class="panel-heading">
                                Aircraft Status
                            </div>
                            <div class="panel-body">
	                            <div style="text-align:center; ">
		                            <p id="planeImg"><img src="<?php echo base_url(); ?>5.gif" height=100% width=100%/></p>
	                            </div>
	                            <h4 >Aircraft: DJ-001</h4>
								<table style="position:relative; width:100%; font-size:0.7vw;" class="table">
									<tr>
										<th>Latitude</th>
										<th>Longitude</th>
									</tr>
									<tr>
										<td id="latitude">123123123</td>
										<td id="altitude">123123123</td>
									</tr>
								</table>
								</table>
                                <h5>Battery Status</h5>
								<div class="progress progress-striped active">
                                    <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 20%">
                                        20%
                                    </div>
                                </div>
                            </div>
                    	</div>
                	</div>
                    <div class="col-lg-2 col-lg-offset-8">
	                	<div class="panel panel-default">
                            <div class="panel-heading">
                                Pollution Status
                            </div>
                            <div class="panel-body">
	                            <h3> Sensor 1 </h3>
								<div class="progress progress-striped active">
                                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 100%" id="S1">
                                        100%
                                    </div>
                                </div>
                                <h3> Sensor 2 </h3>
								<div class="progress progress-striped active">
                                    <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%" id="S2">
                                        40%
                                    </div>
                                </div>
                                <h3> Sensor 3 </h3>
								<div class="progress progress-striped active">
                                    <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 20%" id="S3">
                                        20%
                                    </div>
                                </div>
                            </div>
                    	</div>
                	</div>
                    <div class="col-lg-12">
	                	<div class="panel panel-default">
                            <div class="panel-heading">
                                Realtime Data
                                <button class="button" onclick="cleanData();" style="position:absolute; right:50px;">Clean Data</button>
                            </div>
                            <div class="panel-body">
	                            <table class="table">
		                            <tr>
  										<th>   d_id    </th>
  										<th>Aircraft ID</th>
  										<th>   Date    </th>
  										<th></th>
  										<th></th>
  										<th></th>
  										<th>   Time    </th>
  										<th></th>
  										<th> Latitude  </th>
  										<th></th>
  										<th> Longitude </th>
  										<th> Pressure  </th>
  										<th></th>
  										<th>  Heading  </th>
  										<th> S 1  </th>
  										<th> S 2  </th>
  										<th> S 3  </th>
  										<th></th>
  									</tr>
	                            </table>
	                            <div  style="overflow:scroll; height:150px;">
	                            <table class="table" id="dataTable">
	                            
  								</table>
	                            </div>
                            </div>
                    	</div>
                	</div>
                </div>
           	</div>
        </div>
    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>
	
    <!-- MapHotareaJS -->
	<script type="text/javascript">
    var map = new BMap.Map("container");          // 创建地图实例

    //var point = new BMap.Point(113.547082,22.350518);
    var point = new BMap.Point(113.53302668950788,22.32993279914214);
    map.centerAndZoom(point, 15);             // 初始化地图，设置中心点坐标和地图级别
    map.enableScrollWheelZoom(); // 允许滚轮缩放
  
    var points2 =[
    {"lng":113.504819,"lat":22.247953,"count":50}
    ];
    var points =[
    <?php
		$con = mysqli_connect("cstserver.uic.edu.hk","j430003045","123456","j430003045");
		if (!$con)
		{
			die('Could not connect: ' . mysql_error());
		}
		// FIRST STEP
		$sql = "select * from task where t_id=7;";
		$result = mysqli_query($con,$sql);
		$row = mysqli_fetch_array($result);
		$a_id = $row['a_id'];
		$date = $row['t_date'];
		$start = $row['t_start_time'];
		$end   = $row['t_end_time'];
		// SECOUND
		$sql3  = "SELECT * FROM `raw_data` WHERE `a_id` = $a_id AND `date` = '$date' AND `time` BETWEEN '$start' AND '$end' ORDER BY `d_id` DESC LIMIT ".(0).",100";
		$result = mysqli_query($con,$sql3);
		

		while($row = mysqli_fetch_array($result))
		  {
			$html_code = "{\"lng\":".$row['longitude'].",\"lat\":".$row['latitude'].",\"count\":".((int)(($row['poll_1'] - 100) / 2))."},";
			echo $html_code;
		  }
	?>
    ];
    
    if(!isSupportCanvas()){
    	alert('热力图目前只支持有canvas支持的浏览器,您所使用的浏览器不能使用热力图功能~')
    }
	//详细的参数,可以查看heatmap.js的文档 https://github.com/pa7/heatmap.js/blob/master/README.md
	//参数说明如下:
	/* visible 热力图是否显示,默认为true
     * opacity 热力的透明度,1-100
     * radius 势力图的每个点的半径大小   
     * gradient  {JSON} 热力图的渐变区间 . gradient如下所示
     *	{
			.2:'rgb(0, 255, 255)',
			.5:'rgb(0, 110, 255)',
			.8:'rgb(100, 0, 255)'
		}
		其中 key 表示插值的位置, 0~1. 
		    value 为颜色值. 
     */
	var heatmapOverlay = new BMapLib.HeatmapOverlay({"radius":20});
	map.addOverlay(heatmapOverlay);
	heatmapOverlay.setDataSet({data:points,max:100});
	//是否显示热力图
    function openHeatmap(){
        heatmapOverlay.show();
    }
	function closeHeatmap(){
        heatmapOverlay.hide();
    }
	closeHeatmap();
    function setGradient(){
     	/*格式如下所示:
		{
	  		0:'rgb(102, 255, 0)',
	 	 	.5:'rgb(255, 170, 0)',
		  	1:'rgb(255, 0, 0)'
		}*/
     	var gradient = {};
     	var colors = document.querySelectorAll("input[type='color']");
     	colors = [].slice.call(colors,0);
     	colors.forEach(function(ele){
			gradient[ele.getAttribute("data-key")] = ele.value; 
     	});
        heatmapOverlay.setOptions({"gradient":gradient});
    }
	//判断浏览区是否支持canvas
    function isSupportCanvas(){
        var elem = document.createElement('canvas');
        return !!(elem.getContext && elem.getContext('2d'));
    }
    
    function addDataPoint_Out(lng,lat,count){
	    heatmapOverlay.addDataPoint(lng,lat,count);
    }
    
    //var marker = new BMap.Marker(new BMap.Point(116.418261,39.921984));        // 创建标注      
	//map.addOverlay(marker);

    
    //<!-- Loop Data Getting -->

		var id=18260;
		var loop1=self.setInterval(getData,1000);
		
		var newPoint = new BMap.Point(113.5,22.25);
		var formerPoint = new BMap.Point(113.5,22.25);
		var formerMarker = new BMap.Marker(newPoint);
		var newMarker = new BMap.Marker(newPoint);
		formerMarker.hide();
		newMarker.hide();
		function getData(){
			var oldData = document.getElementById("dataTable").innerHTML;
			var xmlhttp;
			if (window.XMLHttpRequest){
				// code for IE7+, Firefox, Chrome, Opera, Safari
				xmlhttp=new XMLHttpRequest();
  			}
  			else {// code for IE6, IE5
	  			xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  			}
  		    //addDataPoint_Out(116.42546, 39.918503, 100);
  			xmlhttp.onreadystatechange=function(){
	  			if (xmlhttp.readyState==4 && xmlhttp.status==200){
	  				document.getElementById("dataTable").innerHTML=xmlhttp.responseText+oldData;
	  				//document.getElementById("test").innerHTML=xmlhttp.responseXML.getElementsByTagName("td")[8].childNodes[0].nodeValue;
	  				var style = "rotate("+xmlhttp.responseXML.getElementsByTagName("td")[8].childNodes[0].nodeValue+"deg)";
	  				document.getElementById("planeImg").style.transform=style;
	  				
	  				document.getElementById("S1").innerHTML=xmlhttp.responseXML.getElementsByTagName("td")[9].childNodes[0].nodeValue;
	  				document.getElementById("S1").style.width=String((parseFloat(xmlhttp.responseXML.getElementsByTagName("td")[9].childNodes[0].nodeValue)-100)/3)+"%";
	  				
	  				document.getElementById("S2").innerHTML=xmlhttp.responseXML.getElementsByTagName("td")[10].childNodes[0].nodeValue;
	  				document.getElementById("S2").style.width=String((parseFloat(xmlhttp.responseXML.getElementsByTagName("td")[10].childNodes[0].nodeValue)-100)/3)+"%";
	  				
	  				document.getElementById("S3").innerHTML=xmlhttp.responseXML.getElementsByTagName("td")[11].childNodes[0].nodeValue;
	  				document.getElementById("S3").style.width=String((parseFloat(xmlhttp.responseXML.getElementsByTagName("td")[11].childNodes[0].nodeValue)-100)/3)+"%";
	  				
	  				document.getElementById("latitude").innerHTML=xmlhttp.responseXML.getElementsByTagName("td")[4].childNodes[0].nodeValue;
	  				document.getElementById("altitude").innerHTML=xmlhttp.responseXML.getElementsByTagName("td")[5].childNodes[0].nodeValue;
	  				
	  				var latitude = parseFloat(xmlhttp.responseXML.getElementsByTagName("td")[5].childNodes[0].nodeValue);
	  				var longitude = parseFloat(xmlhttp.responseXML.getElementsByTagName("td")[4].childNodes[0].nodeValue);
	  				formerPoint = newPoint;
	  				newPoint = new BMap.Point(latitude,longitude);
	  				var focusPoint = new BMap.Point(latitude,longitude-0.01);
	  				formerMarker = newMarker;
	  				newMarker = new BMap.Marker(newPoint);
	  				map.addOverlay(newMarker);
	  				map.centerAndZoom(focusPoint, 14);
	  				map.addOverlay(new BMap.Polyline([formerPoint,newPoint], {strokeColor:"blue", strokeWeight:2, strokeOpacity:0.5}));
	  				formerMarker.hide();
	  				var count = (parseFloat(xmlhttp.responseXML.getElementsByTagName("td")[8].childNodes[0].nodeValue)-100)/3;
	  				var datapoint = {"lng":longitude,"lat":latitude,"count":count};
	  				//heatmapOverlay.store.addDataPoint(longitude,latitude,count);
	  				
	  				//points.push({"lng":longitude,"lat":latitude,"count":count});
	  				//heatmapOverlay.remove();
	  				//heatmapOverlay = new BMapLib.HeatmapOverlay({"radius":20});
	  				//heatmapOverlay.setDataSet({data:points,max:100});
	  				//heatmapOverlay.show();
	  				//map.addOverlay(heatmapOverlay);
	  				}
  			}

  			
  			xmlhttp.open("GET","<?php echo base_url(); ?>getRealTimeData.php?t="+id,true);
  			xmlhttp.send();
  			//document.getElementById("test").innerHTML= inid;
  			id++;
  		}
  		
  		function cleanData(){
	  		document.getElementById("dataTable").innerHTML="";
  		}
  		
  		function pause(){
	  		clearInterval(loop1);
  		}
  		
  		function restart(){
	  		loop1=self.setInterval(getData,1000);
  		}
</script>
<script type="text/javascript">
window.onload=function(){
	openHeatmap();
}
</script>
</body>

</html>
