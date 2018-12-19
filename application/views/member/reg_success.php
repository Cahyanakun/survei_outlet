<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title> SISFO CEMANI ::  </title>

    <!-- Bootstrap -->
    <link href="<?php echo base_url(); ?>dash/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?php echo base_url(); ?>dash/font-awesome/css/font-awesome.min.css" rel="stylesheet">
   
    <!-- Custom Theme Style -->
    <link href="<?php echo base_url(); ?>dash/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="login">
    <div>
      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
             <div class="jumbotron">
                  <h2>Terima Kasih Telah Mendaftarkan Akun Anda</h2>
              </div>            
              <div>
                <a href="<?= base_url() ?>member">Silahkan Masuk</a>>
              </div>
          </section>
        </div>
      </div>
    </div>
    <!-- jQuery -->
    <script src="<?php echo base_url(); ?>dash/js/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="<?php echo base_url(); ?>dash/js/bootstrap.min.js"></script>   

      <script type="text/javascript">
      $('.alert-message').alert().delay(3000).slideUp('slow');
    </script>
  </body>
</html>
