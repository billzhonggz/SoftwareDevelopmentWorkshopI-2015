<?php 
if(!isset($_GET['t_id']))
{
	echo "缺少参数,请勿直接访问此页面！";
	exit(0);
}

?>
<!-- Page Content -->        
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"> Data Analysis</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            
            <div class="row">

                <div class="col-lg-12">
                <div class="panel panel-info">
                            <div class="panel-heading">
                                Map
                            </div>
                            <div class="panel-body">
                                <div id="container" style="height:450px;width:100%;">
                                </div>
                            </div>
                            <div class="panel-footer">
                                <div id="r-result">
									<input type="button"  onclick="openHeatmap();" value="Show Pollution Map"/><input type="button"  onclick="closeHeatmap();" value="Hide Pollution Map"/>
                                </div>
                            </div>
                               
                 <!-- /#wrapper -->
    <!-- MapHotareaJS -->
	<script type="text/javascript">
    var map = new BMap.Map("container");          // 创建地图实例
    var point = new BMap.Point(113.52, 22.30);
    map.centerAndZoom(point, 13);             // 初始化地图，设置中心点坐标和地图级别
    map.enableScrollWheelZoom(); // 允许滚轮缩放
    

    var points =[
	<?php
		$con = mysqli_connect("mysql.coding.io","user-OMgnQb09bC","pM5u^A0nFd)]+^0lV?}p","db-u4BLEXV83Q");
		if (!$con)
		{
			die('Could not connect: ' . mysql_error());
		}
		// FIRST STEP
		$sql = "select * from task where t_id=\"".$_GET['t_id']."\";";
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
	heatmapOverlay = new BMapLib.HeatmapOverlay({"radius":20});
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
	window.onload = openHeatmap();
	</script>
    
    <!-- MapAPI -->

                 
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
    
    


</body>

</html>
