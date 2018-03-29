      <!--Page Content-->       
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"> Event List</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="glyphicon glyphicon-list"></i> Event List
                            <!--<div class="pull-right">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                                        Actions
                                        <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu pull-right" role="menu">
                                        <li><a href="#">Action</a>
                                        </li>
                                        <li><a href="#">Another action</a>
                                        </li>
                                        <li><a href="#">Something else here</a>
                                        </li>
                                        <li class="divider"></li>
                                        <li><a href="#">Separated link</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>-->
                        </div>
                        <!-- /.panel-heading -->
                        
                        <!-- Display result table. -->
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Event ID</th>
                                                    <th>Airctaft ID</th>
                                                    <th>Date</th>
                                                    <th>Start Time</th>
                                                    <th>End Time</th>
                                                    <th>Pollution 1</th>
                                                    <th>Pollution 2</th>
                                                    <th>Pollution 3</th>
                                                    <th>Pollution 4</th>
                                                    <th>Pollution 5</th>
                                                    <th>Photo ID</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
                                                    //Before load the list, load database first.
                                                    $con = mysqli_connect("cstserver.uic.edu.hk","j430003045","123456","j430003045");
                                                    if(!$con)
                                                    {
                                                        die('DB Connect error: '.mysqli_error());
                                                    }
                                                    //Query from db.
                                                    $sql = "SELECT * FROM event";
                                                    $result = mysqli_query($con,$sql);
                                                    while($row = mysqli_fetch_array($result))
                                                    {
                                                        $html_code = "
                                                        <tr>
                                                            <td>".$row['e_id']."</td>
                                                            <td>".$row['a_id']."</td>
                                                            <td>".$row['e_date']."</td>
                                                            <td>".$row['e_start_time']."</td>
                                                            <td>".$row['e_end_time']."</td>
                                                            <td>".$row['e_poll_1']."</td>
                                                            <td>".$row['e_poll_2']."</td>
                                                            <td>".$row['e_poll_3']."</td>
                                                            <td>".$row['e_poll_4']."</td>
                                                            <td>".$row['e_poll_5']."</td>
                                                            <td>".$row['photo_id']."</td>
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
                <!-- /.col-lg-4 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->