 <div class="x_panel">
    <div class="x_title">
      	<div class="clearfix"> </div>
      	<?= validation_errors('<p style="color:red;">','</p>'); ?>
     </div>
     
     <div class="x_content"> 
		<br />
		<form class="form-horizontal form-label-left" action="" enctype="multipart/form-data"
		method="post">

                    <div class="form-group">
                        <div class='input-group date' id='datetime'>
                            <input type='text' class="form-control" placeholder="DD-MM-YYYY" name="a"/>
                            
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                            </div>
                        </div>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button class="btn btn-primary" type="button" onclick="window.history.go(-1)">Cancel</button>
                          <button type="submit" class="btn btn-success" name="submit" value="Submit">Submit</button>
                        </div>
                      </div>

                    </form> 
      </div>
    </div>
   </div>
 </div>

 <script>
    $("#datetime").datetimepicker({
        format : 'DD-MM-YYYY'

    });
</script>