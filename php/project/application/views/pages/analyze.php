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
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="glyphicon glyphicon-list"></i> Choose a task
                          
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover table-striped">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
													<th>AIRCRAFT</th>
                                                    <th>DATE</th>
                                                    <th>START TIME</th>
                                                    <th>END TIME</th>
                                                    <th>EVENT</th>
													<th>DETAIL</th>
                                                </tr>
                                            </thead>
                                            <tbody>
											<?php 
											// Use PHP to throw the table
											$con = mysqli_connect("mysql.coding.io","user-OMgnQb09bC","pM5u^A0nFd)]+^0lV?}p","db-u4BLEXV83Q");
											if (!$con)
											{
												die('Could not connect: ' . mysql_error());
											}
											// some code
											$result = mysqli_query($con,"select * from task order by t_id desc limit 0,7;");

											while($row = mysqli_fetch_array($result))
											  {
												$html_code = "
												<tr>
                                                    <td>".$row['t_id']."</td>
													<td>".$row['a_id']."</td>
                                                    <td>".$row['t_date']."</td>
                                                    <td>".$row['t_start_time']."</td>
                                                    <td>".$row['t_end_time']."</td>
                                                    <td>".$row['description']."</td>
													<td><a href=\"./analyze2?id=".$row['t_id']."\">Detail</a></td>
												</tr>
												
												";
												echo $html_code;
											  }
											?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- /.table-responsive -->
                                </div>
                                <!-- /.col-lg-12 -->
                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->

            <!-- /.row -->
            <div class="row">
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
                                                </tr>
                                            </thead>
                                            <tbody>
											<?php 
											// Use PHP to throw the table

											$result = mysqli_query($con,"select * from raw_data order by d_id desc limit 0,5;");

											while($row = mysqli_fetch_array($result))
											  {
												$html_code = "
												<tr>
                                                    <td>".$row['a_id']."</td>
													<td>".$row['date']."</td>
                                                    <td>".$row['time']."</td>
                                                    <td>".$row['poll_1']."</td>
                                                    <td>".$row['poll_2']."</td>
                                                    <td>".$row['poll_3']."</td>
													<td>".$row['poll_4']."</td>
													<td>".$row['poll_5']."</td>
												</tr>
												
												";
												echo $html_code;
											  }
											?>

                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- /.table-responsive -->
            	</div>
            	<!-- /.col-lg-12-->
            </div>
			
            <!-- /.row 底部两个按钮
            <div class="row">
            	<div class="col-lg-3"></div>
            	<div class="col-lg-1">
            		<button type="button" class="btn btn-default btn-sm" > Graph </button>
            	</div>
            	<div class="col-lg-4"></div>
            	<div class="col-lg-1">
            		<button type="button" class="btn btn-primary btn-sm" > Export </button>
            	</div>
            	<div class="col-lg-3"></div>
            </div>
             /.row -->
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
    
    


</body>

</html>
