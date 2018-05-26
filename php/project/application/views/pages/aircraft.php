      <!--Page Content-->       
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"> Aircraft List</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            
            <div class="row">
                <div class="col-lg-8">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="glyphicon glyphicon-list"></i> Aircraft List
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
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover table-striped">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Name</th>
                                                    <th>Type</th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                    //Load database.
                                                    $con = mysqli_connect("mysql.coding.io","user-OMgnQb09bC","pM5u^A0nFd)]+^0lV?}p","db-u4BLEXV83Q");
                                                    if(!$con)
                                                    {
                                                        die('DB Connect error: '.mysqli_error());
                                                    }
                                                    //Query from db.
                                                    $sql = "SELECT * FROM aircraft";
                                                    $result = mysqli_query($con,$sql);
                                                    while($row = mysqli_fetch_array($result))
                                                    {
                                                        echo "<tr>
                                                            <td>".$row['a_id']."</td>
                                                            <td>".$row['a_name']."</td>
                                                            <td>".$row['a_type']."</td>";
                                                            $status = $row['status'];
                                                            if($status == "flying")
                                                            {
                                                                echo "<td><a href=".base_url()."index.php/pages/view/realtime/>flying</a></td>";
                                                            }
                                                            else 
                                                            {
                                                                echo "<td>".$status."</td>";
                                                            }
                                                            
                                                        echo "</tr>";
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
                <!-- /.col-lg-8 -->
                <div class="col-lg-4">
                <img src="<?php echo base_url(); ?>img/Phantpm3.png" alt="..." class="img-thumbnail">
                </div>
                <!-- /.col-lg-4 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->