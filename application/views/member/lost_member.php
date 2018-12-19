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
    <link href="<?php echo base_url(); ?>dashfont-awesome/css/font-awesome.min.css" rel="stylesheet">
   
    <!-- Custom Theme Style -->
    <link href="<?php echo base_url(); ?>dash/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="login">
    <div>
      <div class="login_wrapper">
        <?php
            if($this->session->flashdata('alert')){
            echo '<div class="alert alert-warning alert-message" style="margin-bottom: 30px; ">';
            echo $this->session->flashdata('alert');
            echo '</div>';
          }
        ?>
        <?php
            if($this->session->flashdata('success')){
            echo '<div class="alert alert-success alert-message" style="margin-bottom: 30px; ">';
            echo $this->session->flashdata('success');
            echo '</div>';
          }
        ?>
        <div class="animate form login_form">
          <section class="login_content">
            <form method="post" action="">
              <h1>Lost Your Accout!</h1>
              <div>
                <input type="text" class="form-control" placeholder="Masukkan E-Mail Anda" name="email" required="" />
              </div>
                <button class="btn btn-default submit" type="submit" name="submit" value="Submit">Submit</button>
              </div>

              <div class="clearfix"></div>
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
