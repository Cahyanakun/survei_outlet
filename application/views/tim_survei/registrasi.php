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
        <div>

          <?php
            if($this->session->flashdata('alert')){
            echo '<div class="alert alert-warning alert-message" style="margin-bottom: 30px; ">';
            echo $this->session->flashdata('alert');
            echo '</div>';
          }
        ?>

        </div>
        <div class="animate form login_form">
          <section class="login_content">
             <?= validation_errors('<p class="" style="color: red;">', '</p>')?>
            <form method="post" action="">
              <h1>Buat Akun</h1>
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Nama Lengkap" name="fullname" value="<?= $fullname; ?>" />
              </div>
              
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Username" name="username" value="<?= $username; ?>" />
              </div>
              <div class="form-group">
                <input type="text" class="form-control" placeholder="E - Mail" name="email" value="<?= $email; ?>" />
              </div>
              <div class="form-group">
                <input type="password" class="form-control" placeholder="Password" name="pass1" />
              </div>
              <div class="form-group">
                <input type="password" class="form-control" placeholder="Ketik Ulang Password" name="pass2" />
              </div>
               
              <div>
                <button class="btn btn-primary submit" type="submit" name="submit" value="Submit">Register</button>
                <a class="reset_pass" href="<?= base_url()?>lost_admin">Lupa Password?</a>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <h3 class="change_link">Sudah Punya Akun ?
                  <a href="<?= base_url(); ?>login" class="to_register"> Sign In! </a>
                </h3>

                <div class="clearfix"></div>
                <br />
                <div>
                   <img src="<?= base_url();?>dash/img/ico.png" alt="" style="width: 250px; height: 160px;">
                  <p>©2016 All Rights Reserved.</p>
                </div>
              </div>
            </form>
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
