<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>SISFO CEMANI :: </title>
    <link rel="shortcut icon" href="<?= base_url();?>dash/img/ico.png">
    <script src="<?php echo base_url(); ?>dash/js/jquery-1.10.2.js"></script>
    <!-- Bootstrap -->
    <link href="<?php echo base_url(); ?>dash/css/bootstrap.min.css" rel="stylesheet">
    <!-- Data Tables -->
    <link href="<?php echo base_url(); ?>dash/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>dash/css/responsive.bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?php echo base_url(); ?>dash/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- Dropzone -->
    <link href="<?php echo base_url(); ?>dash/dropzone/dist/min/dropzone.min.css" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="<?php echo base_url(); ?>dash/css/custom.min.css" rel="stylesheet">

    <!-- DATETIME -->
    <link href="<?php echo base_url(); ?>dash/js/date/bootstrap-datetimepicker.css" rel="stylesheet">
    <script src="<?php echo base_url(); ?>dash/js/date/jquery-2.js"></script>
    <script src="<?php echo base_url(); ?>dash/js/date/moment-with-locales.js"></script>
    <script src="<?php echo base_url(); ?>dash/js/date/bootstrap-datetimepicker.js"></script>

  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
       <?php echo $nav; ?>

        <!-- page content -->
        <div class="right_col" role="main">
          <?php echo $content; ?>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
           SISTEM INFORMASI SURVEI OUTLET &copy;2018 Cemani Fried Chicken
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="<?php echo base_url(); ?>dash/js/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="<?php echo base_url(); ?>dash/js/bootstrap.min.js"></script>   
    <!-- Data Tables -->
    <script src="<?php echo base_url(); ?>dash/js/jquery.dataTables.min.js"></script>   
    <script src="<?php echo base_url(); ?>dash/js/dataTables.bootstrap.min.js"></script>   
    <script src="<?php echo base_url(); ?>dash/js/dataTables.responsive.min.js"></script>   
    <!-- Custom Theme Scripts -->
    <script src="<?php echo base_url(); ?>dash/js/custom.min.js"></script>
    <!-- Dropzone -->
    <script src="<?php echo base_url(); ?>dash/dropzone/dist/min/dropzone.min.js"></script>

    


    <script type="text/javascript">
      $(document).ready(function(){
        $('#datatable').DataTable();
      });
      $('.alert-message').alert().delay(3000).slideUp('slow');
    </script>
  </body>
</html>