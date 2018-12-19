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
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Name Surveyor <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" class="form-control col-md-7 col-xs-12" name="nama" value="<?= $nama; ?>">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Name Surveyor <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" class="form-control col-md-7 col-xs-12" name="nama" value="<?= $nama; ?>">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Name Surveyor <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" class="form-control col-md-7 col-xs-12" name="nama" value="<?= $nama; ?>">
                        </div>
                      </div>
                      
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button type="submit" class="btn btn-success" name="submit" value="Submit">Submit</button>
                        </div>
                        <button class="btn btn-primary" type="button" onclick="window.history.go(-1)">Cancel</button>
                      </div>

                    </form> 
      </div>
    </div>
   </div>
 </div>