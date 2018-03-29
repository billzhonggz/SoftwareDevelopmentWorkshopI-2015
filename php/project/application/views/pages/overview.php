
       <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"> Overview</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-3 col-md-6" onclick="window.open('<?php echo base_url();?>index.php/pages/view/realtime/','_self')" style="cursor:pointer;">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-send fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge" style="font-size:2vw;">
                                    <?php
                                        $this->db->where('status','flying');
                                        $this->db->from('aircraft'); 
                                        echo $this->db->count_all_results();
                                        echo " ";
                                    ?>
                                     Flying
                                </div>
                                    <div style="font-size:2vw;"></div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left">
                                    <a href="<?php echo base_url();?>index.php/pages/view/realtime/">View Details</a>
                                </span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6" onclick="window.open('<?php echo base_url();?>index.php/pages/view/aircraft/','_self')" style="cursor:pointer;">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-warning fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge" style="font-size:2vw;">
                                    <?php
                                        $this->db->where('status','charge');
                                        $this->db->from('aircraft'); 
                                        echo $this->db->count_all_results();
                                        echo " ";
                                    ?>
                                    Charging
                                </div>
                                    <div></div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left">
                                    <a href="<?php echo base_url();?>index.php/pages/view/aircraft/">View Details</a>
                                </span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                
                <div class="col-lg-3 col-md-6" onclick="window.open('<?php echo base_url();?>index.php/pages/view/aircraft/','_self')" style="cursor:pointer;">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-support fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge" style="font-size:2vw;">
                                        <?php
                                            $this->db->where('status','offline');
                                            $this->db->from('aircraft'); 
                                            echo $this->db->count_all_results();
                                            echo " ";
                                        ?>
                                        Offline
                                    </div>
                                    <div></div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left">
                                    <a href="<?php echo base_url();?>index.php/pages/view/aircraft/">View Details</a>
                                </span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6" onclick="window.open('<?php echo base_url();?>index.php/pages/view/analyze/','_self')" style="cursor:pointer;">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-road fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge" style="font-size:2vw;">
                                        <?php
                                            echo $this->db->count_all('event');
                                            echo " ";
                                        ?>
                                        Events
                                    </div>
                                    <div></div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left">
                                    <a href="<?php echo base_url();?>index.php/pages/view/analyze/">View Details</a>
                                </span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <!-- /.row -->
            <div class="row">
				<div class="col-lg-8 ">
                    	<div class="panel panel-info">
                            <div class="panel-heading">
                                Current Pollution Map
                            </div>
                            <div class="panel-body">
                                <div id="container" style="height:500px;width:100%;">
                                </div>
                            </div>
                    	</div>
                	</div>
                	<!-- /.col-lg-12 -->
                <div class="col-lg-4">
	                <div class="panel panel-info">
                            <div class="panel-heading">
                                Current Pollution Status
                            </div>
                            <div class="panel-body">
                                <div id="overViewChart" style="height: 500px;"></div>
                            </div>
                    	</div>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
    <!-- MapHotareaJS -->
	<script type="text/javascript">
    var map = new BMap.Map("container");          // 创建地图实例

    var point = new BMap.Point(113.52, 22.30);
    map.centerAndZoom(point, 13);             // 初始化地图，设置中心点坐标和地图级别
    //map.enableScrollWheelZoom(); // 允许滚轮缩放
    
    var opts = {    
 	width : 250,     // 信息窗口宽度    
 	height: 100,     // 信息窗口高度    
 	title : "Pollution Position 001"  // 信息窗口标题   
	}    
	//var infoWindow = new BMap.InfoWindow("Status: DANGER", opts);  // 创建信息窗口对象    
	//map.openInfoWindow(infoWindow, map.getCenter());      // 打开信息窗口
  
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
    
    
    
    //Chart
    new Morris.Bar({
		  // ID of the element in which to draw the chart.
		  element: 'overViewChart',
		  // Chart data records -- each entry in this array corresponds to a point on
		  // the chart.
		  data: [
		    { date: 'Teaching Building', value: 20 },
		    { date: 'SHCV', value: 10 },
		    { date: 'new SHCV', value: 5 },
		    { date: 'Playground', value: 5 },
		    { date: 'Downtown', value: 35 }
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

    
    <!-- MapAPI -->

</body>

</html>
