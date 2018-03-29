<?php

	if(isset($_SESSION['iflogin']) && $_SESSION['iflogin'] == 1)
	{
		?>

<!-- /#wrapper -->

    <!-- jQuery -->
    <script src="<?php echo base_url();?>/bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url();?>/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="<?php echo base_url();?>/bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="<?php echo base_url();?>/bower_components/raphael/raphael-min.js"></script>
    <script src="<?php echo base_url();?>/bower_components/morrisjs/morris.min.js"></script>
    <script src="<?php echo base_url();?>/js/morris-data.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="<?php echo base_url();?>/dist/js/sb-admin-2.js"></script>
  </body>
</html>

<?php
	}
	else
	{
		// login
	}
?>