 <div class="x_panel">
    <div class="x_title">
    	<h2><?= $header; ?></h2>
      	<div class="clearfix"> </div>
      	<?= validation_errors('<p style="color:red;">','</p>'); ?>
     </div>
     
     <div class="x_content"> 
		<br />
		<form class="form-horizontal form-label-left" action="" enctype="multipart/form-data"
		method="post">

                     <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Username <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" class="form-control col-md-7 col-xs-12" name="username" value="<?= $username; ?>" required/>
                        </div>
                      </div>
                        <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Full Name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" class="form-control col-md-7 col-xs-12" name="fullname" value="<?= $fullname; ?>" required/>
                        </div>
                      </div>
                        <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Email <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" class="form-control col-md-7 col-xs-12" name="email" value="<?= $email; ?>" required/>
                        </div>  
                      </div>
                        <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Password <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" class="form-control col-md-7 col-xs-12" name="password" value="" required/>
                          <p class="text-help">** Masukkan Password Untuk Mengganti Perubahan</p>
                        </div>
                      </div>
                      
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button class="btn btn-primary" type="button" onclick="window.history.go(-1)">Cancel</button>
                          <button type="submit" class="btn btn-success" name="submit" value="Submit">Simpan Perubahan</button>
                        </div>
                      </div>

                    </form> 
      </div>
    </div>
   </div>
 </div>