<?php 
if(!isset($_GET['id']))
{
	echo "缺少参数,请勿直接访问本页面！";
	exit(0);
	
}
if(!isset($_GET['page']))
{
	$_GET['page'] = 1;
}
	
?>
<!-- Page Content -->  

    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>    
	        <div id="page-wrapper">
            <div class="row">
	            
                <div class="col-lg-12">
                    <h1 class="page-header"> Data Analysis</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            
			<?php
			// load database
				$con = mysqli_connect("mysql.coding.io","user-OMgnQb09bC","pM5u^A0nFd)]+^0lV?}p","db-u4BLEXV83Q");
				if (!$con)
				{
					die('Could not connect: ' . mysql_error());
				}
				// some code
				$sql = "select * from task where t_id=\"".$_GET['id']."\";";
				$result = mysqli_query($con,$sql);
				$row = mysqli_fetch_array($result);
				$a_id = $row['a_id'];
				$date = $row['t_date'];
				$start = $row['t_start_time'];
				$end   = $row['t_end_time'];
				// for row_data table
				$sql2  = "SELECT COUNT(*) FROM `raw_data` WHERE `a_id` = $a_id AND `date` = '$date' AND `time` BETWEEN '$start' AND '$end' ORDER BY `d_id` DESC";
				$result = mysqli_query($con,$sql2);
				$row = mysqli_fetch_array($result);
				$count = $row[0];
			?>
            <div class="row">
	            <div class="col-lg-6">
	                <div class="panel panel-info">
                            <div class="panel-heading">
                                Current Pollution Status
                            </div>
                            <div class="panel-body">
                                <div id="detailChart" style="height: 500px;"></div>
                            </div>
                    	</div>
                </div>
                
                <div class="col-lg-6">
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
		$sql = "select * from task where t_id=\"".$_GET['id']."\";";
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
			
			<div class="row">
				
			</div>
			
        </div>
        <!-- /#page-wrapper -->
    </div>
            	<div class="col-lg-12">
            		<div class="table-responsive">
                                        <table class="table table-bordered table-hover table-striped">
                                            <thead>
                                                <tr>
                                                    <th>AIRCRAFT</th>
                                                    <th>DATE</th>
                                                    <th>TIME</th>
                                                    <th>POLL1</th>
                                                    <th>POLL2</th>
                                                    <th>POLL3</th>
                                                    <th>POLL4</th>
                                                    <th>POLL5</th>
                                                    <th>Photo</th>
                                                </tr>
                                            </thead>
                                            <tbody>
												<?php
													$sql3  = "SELECT * FROM `raw_data` WHERE `a_id` = $a_id AND `date` = '$date' AND `time` BETWEEN '$start' AND '$end' ORDER BY `d_id` DESC LIMIT ".(20*($_GET['page'] - 1)).",20";
													$result = mysqli_query($con,$sql3);
													while($row = mysqli_fetch_array($result))
													{
														//$html_code = "
														$poll1 = $row['poll_1'];
														$poll2 = $row['poll_2'];
														$poll3 = $row['poll_3'];
														$poll4 = $row['poll_4'];
														$poll5 = $row['poll_5'];
														echo
														"<tr>
															<td>".$row['a_id']."</td>
															<td>".$row['date']."</td>
															<td>".$row['time']."</td>";
														if($poll1 > 200)
														{
															echo '<td><span class="label label-danger">'.$poll1."</span></td>";
														}
														else
														{
															echo '<td>'.$poll1."</td>";
														}
														if($poll2 > 200)
														{
															echo '<td><span class="label label-danger">'.$poll2."</span></td>";
														}
														else
														{
															echo '<td>'.$poll2."</td>";
														}
														if($poll3 > 200)
														{
															echo '<td><span class="label label-danger">'.$poll3."</span></td>";
														}
														else
														{
															echo '<td>'.$poll3."</td>";
														}
														if($poll4 > 200)
														{
															echo '<td><span class="label label-danger">'.$poll4."</span></td>";
														}
														else
														{
															echo '<td>'.$poll4."</td>";
														}
														if($poll5 > 200)
														{
															echo '<td><span class="label label-danger">'.$poll5."</span></td>";
														}
														else
														{
															echo '<td>'.$poll5."</td>";
														}
															echo "<td>".$row['photo_id']."</td>
														</tr>";
														
														//echo $html_code;
													}
													
												?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- /.table-responsive -->
            	</div>
            	<!-- /.col-lg-12-->
            </div>
			
            <!-- /.row -->
            <div class="row">
            	<div class="col-lg-2"></div>
					<div class="col-lg-1">
					<?php 
						if($_GET['page'] != 1)
						{
							$html_code = "
							<a href=\"./analyze2?id=".$_GET['id']."&page=".($_GET['page'] - 1)."\""."><button type=\"button\" class=\"btn btn-primary btn-sm\" ><< Pervious Page</button></a>
							";
							echo $html_code;
						}
					?>
						
					</div>
            	<div class="col-lg-2"></div>
					<div class="col-lg-1">
					<?php 
						if($count > 20)
						{
							$html_code = "
							<button type=\"button\" class=\"btn btn-default btn-sm\" >".$_GET['page']."/".((int)($count/20) + 1)."</button>
							
							";
							echo $html_code;
						}
					?>
					</div>
				<div class="col-lg-2"></div>
					<div class="col-lg-1">
					<?php 
						if($count > 20 && $_GET['page'] * 20 < $count)
						{
							$html_code = "
							<a href=\"./analyze2?id=".$_GET['id']."&page=".($_GET['page'] + 1)."\""."><button type=\"button\" class=\"btn btn-primary btn-sm\" >Next Page >></button></a>
							";
							echo $html_code;
						}
					?>
					</div>
					<div class="col-lg-3"></div>
					<div class="col-lg-12"></br></div>
					<div class="col-lg-12"></br></div>
					<div class="col-lg-12"></br></div>
            </div>
            
            <script type="text/javascript">
	    //Chart
    var detailChart = new Morris.Bar({
		  // ID of the element in which to draw the chart.
		  element: 'detailChart',
		  // Chart data records -- each entry in this array corresponds to a point on
		  // the chart.
		  <?php
			$result = mysqli_query($con,$sql3);
			$row = mysqli_fetch_array($result);
													
		  ?>
		  data: [
		    { date: 'poll_1', value: <?php echo $row['poll_1']; ?> },
		    { date: 'poll_2', value: <?php echo $row['poll_2']; ?> },
		    { date: 'poll_3', value: <?php echo $row['poll_3']; ?> },
		    { date: 'poll_4', value: <?php echo $row['poll_4']; ?> },
		    { date: 'poll_5', value: <?php echo $row['poll_5']; ?> }
		  ],
		  // The name of the data record attribute that contains x-values.
		  xkey: 'date',
		  // A list of names of data record attributes that contain y-values.
		  ykeys: ['value'],
		  // Labels for the ykeys -- will be displayed when you hover over the
		  // chart.
		  labels: ['Pollutions']
	});
	</script>  
