            <div class="x_panel">
              <div class="x_title">
                <h3><?= $header ?></h3>
              </div>
            </div>
            <div class="clearfix"></div>
            <?= validation_errors('<p style="color:red; font-size:12px;">','</p>'); ?>
            <?php
            if ($this->session->flashdata('alert'))
            {
                echo '<div class="alert alert-danger alert-message">';
                echo $this->session->flashdata('alert');
                echo '</div>';
            }
            ?>

           
                    <div class="row"> 
                <form class="form-horizontal" method="post" action="" enctype="multipart/form-data">
                    <div class="form-horizontal">
                        <div class="col-lg-8">
                            <div class="form-group">
                               <label class="label label-default">Nama </label>
                                    <select class="form-control" name="member" id="selNama">
                                       <option value="">Chossen One</option>
                                    <?php
                                        foreach ($listing->result() as $key) :
                                            if ($member == $key->id_member) {
                                                ?>
                                                <option selected="selected" value="<?= $key->id_member?>"><?= $key->fullname; ?></option>
                                                <?php
                                            }else{
                                                ?>
                                                <option value="<?= $key->id_member?>"><?= $key->fullname; ?></option>
                                                <?php
                                            }
                                    ?>
                                    

                                    <?php endforeach;  ?>
                                    </select> 
                            </div>
                        <div class='input-group date' id='datetime'>
                            <input type='text' class="form-control" name="tanggal" value="<?= $tanggal; ?>" />
                                 <span class="input-group-addon">
                                     <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                        </div>
                      </div>
                   
                            <div class="col-lg-8"> 
                                <ul class="nav nav-tabs navtab-bg"> 
                                    <li class="active"> 
                                        <a href="#home" data-toggle="tab" aria-expanded="false"> 
                                            <span class="visible-xs"><i class="fa fa-chevron-circle-right"></i></span> 
                                            <span class="hidden-xs">Tampilan Gerobak</span> 
                                        </a> 
                                    </li> 
                                    <li class=""> 
                                        <a href="#profile" data-toggle="tab" aria-expanded="true"> 
                                            <span class="visible-xs"><i class="fa fa-chevron-circle-left"></i></span> 
                                            <span class="hidden-xs">Keberishan</span> 
                                        </a> 
                                    </li> 
                                    <li class=""> 
                                        <a href="#messages" data-toggle="tab" aria-expanded="false"> 
                                            <span class="visible-xs"><i class="fa fa-caret-right"></i></span> 
                                            <span class="hidden-xs">Peralatan</span> 
                                        </a> 
                                    </li> 
                                    <li class=""> 
                                        <a href="#settings" data-toggle="tab" aria-expanded="false"> 
                                            <span class="visible-xs"><i class="fa fa-caret-left"></i></span> 
                                            <span class="hidden-xs">Produk</span> 
                                        </a> 
                                    </li> 
                                    <li class=""> 
                                        <a href="#ulasan" data-toggle="tab" aria-expanded="false"> 
                                            <span class="visible-xs"><i class="fa fa-archive"></i></span> 
                                            <span class="hidden-xs">Ulasan dan Catatan</span> 
                                        </a> 
                                    </li> 
                                    <li class=""> 
                                        <a href="#photo" data-toggle="tab" aria-expanded="false"> 
                                            <span class="visible-xs"><i class="fa fa-picture-o"></i></span> 
                                            <span class="hidden-xs">Gambar</span> 
                                        </a> 
                                    </li> 

                                </ul> 

                                <div class="tab-content"> 
                                    <div class="tab-pane active" id="home"> 
                                        <div class="clearfix"></div>
                                        <div class="form-group">
                                            <label class="label label-danger">Spanduk Depan</label>
                                            <select class="form-control" name="spd">
                                                <option value="">Chossen One</option>
                                                <option value="1" <?php if ($spd==1) {
                                                echo "selected";}?>>Kurang Baik</option>
                                                <option value="2" <?php if ($spd==2) {
                                                echo "selected";}?>>Baik</option>
                                                <option value="3" <?php if ($spd==3) {
                                                echo "selected";}?>>Sangat Baik</option>
                                            </select> 
                                        </div>
                                        <div class="form-group">
                                            <label class="label label-danger">Spanduk Kanan</label>
                                            <select class="form-control" name="spkn">
                                                <option value="">Chossen One</option>
                                                <option value="1" <?php if ($spkn==1) {
                                                echo "selected";}?>>Kurang Baik</option>
                                                <option value="2" <?php if ($spkn==2) {
                                                echo "selected";}?>>Baik</option>
                                                <option value="3" <?php if ($spkn==3) {
                                                echo "selected";}?>>Sangat Baik</option>
                                            </select> 
                                        </div>
                                        <div class="form-group">
                                            <label class="label label-danger">Spanduk Kiri</label>
                                            <select class="form-control" name="spki">
                                                <option value="">Chossen One</option>
                                                <option value="1" <?php if ($spki==1) {
                                                echo "selected";}?>>Kurang Baik</option>
                                                <option value="2" <?php if ($spki==2) {
                                                echo "selected";}?>>Baik</option>
                                                <option value="3" <?php if ($spki==3) {
                                                echo "selected";}?>>Sangat Baik</option>
                                            </select> 
                                        </div>
                                        <div class="form-group">
                                            <label class="label label-danger">Rumbai</label>
                                            <select class="form-control" name="rmb">
                                                <option value="">Chossen One</option>
                                                <option value="1" <?php if ($rmb==1) {
                                                echo "selected";}?>>Kurang Baik</option>
                                                <option value="2" <?php if ($rmb==2) {
                                                echo "selected";}?>>Baik</option>
                                                <option value="3" <?php if ($rmb==3) {
                                                echo "selected";}?>>Sangat Baik</option>
                                            </select> 
                                        </div>
                                        <div class="form-group">
                                            <label class="label label-danger">Stiker Harga</label>
                                            <select class="form-control" name="shr">
                                                <option value="">Chossen One</option>
                                                <option value="1" <?php if ($shr==1) {
                                                echo "selected";}?>>Kurang Baik</option>
                                                <option value="2" <?php if ($shr==2) {
                                                echo "selected";}?>>Baik</option>
                                                <option value="3" <?php if ($shr==3) {
                                                echo "selected";}?>>Sangat Baik</option>
                                            </select> 
                                        </div>
                                        <div class="form-group">
                                            <label class="label label-danger">Stiker Depan</label>
                                            <select class="form-control" name="sdp">
                                                <option value="">Chossen One</option>
                                                <option value="1" <?php if ($sdp==1) {
                                                echo "selected";}?>>Kurang Baik</option>
                                                <option value="2" <?php if ($sdp==2) {
                                                echo "selected";}?>>Baik</option>
                                                <option value="3" <?php if ($sdp==3) {
                                                echo "selected";}?>>Sangat Baik</option>
                                            </select> 
                                        </div>
                                        <div class="form-group">
                                            <label class="label label-danger">Stiker Info Mitra</label>
                                            <select class="form-control" name="sim">
                                                <option value="">Chossen One</option>
                                                <option value="1" <?php if ($sim==1) {
                                                echo "selected";}?>>Kurang Baik</option>
                                                <option value="2" <?php if ($sim==2) {
                                                echo "selected";}?>>Baik</option>
                                                <option value="3" <?php if ($sim==3) {
                                                echo "selected";}?>>Sangat Baik</option>
                                            </select> 
                                        </div>

                                    </div>
                                    <!-- Form Pertama -->

                                    <div class="tab-pane" id="profile"> 
                                        
                                        <div class="form-group">
                                            <label class="label label-primary">Kaca Display Depan</label>
                                            <select class="form-control" name="kbs">
                                               <option value="">Chossen One</option>
                                                <option value="1" <?php if ($kbs==1) {
                                                echo "selected";}?>>Kurang Baik</option>
                                                <option value="2" <?php if ($kbs==2) {
                                                echo "selected";}?>>Baik</option>
                                                <option value="3" <?php if ($kbs==3) {
                                                echo "selected";}?>>Sangat Baik</option>
                                            </select> 
                                        </div>
                                        <div class="form-group">
                                            <label class="label label-primary">Kaca Display Dapur Depan dan Samping</label>
                                            <select name="kdsp" class="form-control">
                                               <option value="">Chossen One</option>
                                                <option value="1" <?php if ($kdsp==1) {
                                                echo "selected";}?>>Kurang Baik</option>
                                                <option value="2" <?php if ($kdsp==2) {
                                                echo "selected";}?>>Baik</option>
                                                <option value="3" <?php if ($kdsp==3) {
                                                echo "selected";}?>>Sangat Baik</option>
                                            </select> 
                                        </div>
                                        <div class="form-group">
                                            <label class="label label-primary">Kaca Sliding Depan</label>
                                            <select class="form-control" name="ksdn">
                                                <option value="">Chossen One</option>
                                                <option value="1" <?php if ($ksdn==1) {
                                                echo "selected";}?>>Kurang Baik</option>
                                                <option value="2" <?php if ($ksdn==2) {
                                                echo "selected";}?>>Baik</option>
                                                <option value="3" <?php if ($ksdn==3) {
                                                echo "selected";}?>>Sangat Baik</option>
                                            </select> 
                                        </div>
                                        <div class="form-group">
                                            <label class="label label-primary">Cermin Sliding</label>
                                            <select class="form-control" name="cs">
                                               <option value="">Chossen One</option>
                                                <option value="1" <?php if ($cs==1) {
                                                echo "selected";}?>>Kurang Baik</option>
                                                <option value="2" <?php if ($cs==2) {
                                                echo "selected";}?>>Baik</option>
                                                <option value="3" <?php if ($cs==3) {
                                                echo "selected";}?>>Sangat Baik</option>
                                            </select> 
                                        </div>
                                        <div class="form-group">
                                            <label class="label label-primary">Kolong Tempat Adonan</label>
                                            <select class="form-control" name="kta">
                                               <option value="">Chossen One</option>
                                                <option value="1" <?php if ($kta==1) {
                                                echo "selected";}?>>Kurang Baik</option>
                                                <option value="2" <?php if ($kta==2) {
                                                echo "selected";}?>>Baik</option>
                                                <option value="3" <?php if ($kta==3) {
                                                echo "selected";}?>>Sangat Baik</option>
                                            </select> 
                                        </div>
                                        <div class="form-group">
                                            <label class="label label-primary">Tempat Dapur Penggorengan</label>
                                            <select class="form-control" name="tdp">
                                               <option value="">Chossen One</option>
                                                <option value="1" <?php if ($tdp==1) {
                                                echo "selected";}?>>Kurang Baik</option>
                                                <option value="2" <?php if ($tdp==2) {
                                                echo "selected";}?>>Baik</option>
                                                <option value="3" <?php if ($tdp==3) {
                                                echo "selected";}?>>Sangat Baik</option>
                                            </select> 
                                        </div>
                                        <div class="form-group">
                                            <label class="label label-primary">Kolong Gerobak</label>
                                            <select class="form-control" name="kg">
                                                <option value="">Chossen One</option>
                                                <option value="1" <?php if ($kg==1) {
                                                echo "selected";}?>>Kurang Baik</option>
                                                <option value="2" <?php if ($kg==2) {
                                                echo "selected";}?>>Baik</option>
                                                <option value="3" <?php if ($kg==3) {
                                                echo "selected";}?>>Sangat Baik</option>
                                            </select> 
                                        </div>

                                    </div> 

                                    <!-- form kedua -->
                                    <div class="tab-pane" id="messages"> 
                                        

                                        <div class="form-group">
                                            <label class="label label-info">Baskom</label>
                                            <select class="form-control" name="bsm">
                                                <option value="">Chossen One</option>
                                                <option value="1" <?php if ($bsm==1) {
                                                echo "selected";}?>>Kurang Baik</option>
                                                <option value="2" <?php if ($bsm==2) {
                                                echo "selected";}?>>Baik</option>
                                                <option value="3" <?php if ($bsm==3) {
                                                echo "selected";}?>>Sangat Baik</option>
                                            </select> 
                                        </div>
                                        <div class="form-group">
                                            <label class="label label-info">Wajan</label>
                                            <select class="form-control" name="wjn">
                                                 <option value="">Chossen One</option>
                                                <option value="1" <?php if ($wjn==1) {
                                                echo "selected";}?>>Kurang Baik</option>
                                                <option value="2" <?php if ($wjn==2) {
                                                echo "selected";}?>>Baik</option>
                                                <option value="3" <?php if ($wjn==3) {
                                                echo "selected";}?>>Sangat Baik</option>
                                            </select> 
                                        </div>
                                        <div class="form-group">
                                            <label class="label label-info">Sodet</label>
                                            <select class="form-control" name="sdt">
                                                 <option value="">Chossen One</option>
                                                <option value="1" <?php if ($sdt==1) {
                                                echo "selected";}?>>Kurang Baik</option>
                                                <option value="2" <?php if ($sdt==2) {
                                                echo "selected";}?>>Baik</option>
                                                <option value="3" <?php if ($sdt==3) {
                                                echo "selected";}?>>Sangat Baik</option>
                                            </select> 
                                        </div>
                                        <div class="form-group">
                                            <label class="label label-info">Kompor</label>
                                            <select class="form-control" name="kpr">
                                                <option value="">Chossen One</option>
                                                <option value="1" <?php if ($kpr==1) {
                                                echo "selected";}?>>Kurang Baik</option>
                                                <option value="2" <?php if ($kpr==2) {
                                                echo "selected";}?>>Baik</option>
                                                <option value="3" <?php if ($kpr==3) {
                                                echo "selected";}?>>Sangat Baik</option>
                                            </select> 
                                        </div>
                                        <div class="form-group">
                                            <label class="label label-info">Capitan</label>
                                            <select class="form-control" name="cpn">
                                               <option value="">Chossen One</option>
                                                <option value="1" <?php if ($cpn==1) {
                                                echo "selected";}?>>Kurang Baik</option>
                                                <option value="2" <?php if ($cpn==2) {
                                                echo "selected";}?>>Baik</option>
                                                <option value="3" <?php if ($cpn==3) {
                                                echo "selected";}?>>Sangat Baik</option>
                                            </select> 
                                        </div>
                                        <div class="form-group">
                                            <label class="label label-info">Ember Air</label>
                                            <select class="form-control" name="ema">
                                                <option value="">Chossen One</option>
                                                <option value="1" <?php if ($ema==1) {
                                                echo "selected";}?>>Kurang Baik</option>
                                                <option value="2" <?php if ($ema==2) {
                                                echo "selected";}?>>Baik</option>
                                                <option value="3" <?php if ($ema==3) {
                                                echo "selected";}?>>Sangat Baik</option>
                                            </select> 
                                        </div>
                                        <div class="form-group">
                                            <label class="label label-info">Lap Kain</label>
                                            <select class="form-control" name="lkn">
                                                <option value="">Chossen One</option>
                                                <option value="1" <?php if ($lkn==1) {
                                                echo "selected";}?>>Kurang Baik</option>
                                                <option value="2" <?php if ($lkn==2) {
                                                echo "selected";}?>>Baik</option>
                                                <option value="3" <?php if ($lkn==3) {
                                                echo "selected";}?>>Sangat Baik</option>
                                            </select> 
                                        </div>
                                        <div class="form-group">
                                            <label class="label label-info">Lap Kaca</label>
                                            <select class="form-control" name="lkc">
                                                <option value="">Chossen One</option>
                                                <option value="1" <?php if ($lkc==1) {
                                                echo "selected";}?>>Kurang Baik</option>
                                                <option value="2" <?php if ($lkc==2) {
                                                echo "selected";}?>>Baik</option>
                                                <option value="3" <?php if ($lkc==3) {
                                                echo "selected";}?>>Sangat Baik</option>
                                            </select> 
                                        </div>

                                    </div> 
                                        <!-- form ketiga -->

                                    <div class="tab-pane" id="settings"> 
                                       
                                        <div class="form-group">
                                            <label class="label label-warning">Bentuk Gorengan</label>
                                            <select class="form-control" name="bgn">
                                                 <option value="">Chossen One</option>
                                                <option value="1" <?php if ($bgn==1) {
                                                echo "selected";}?>>Kurang Baik</option>
                                                <option value="2" <?php if ($bgn==2) {
                                                echo "selected";}?>>Baik</option>
                                                <option value="3" <?php if ($bgn==3) {
                                                echo "selected";}?>>Sangat Baik</option>
                                            </select> 
                                        </div>
                                        <div class="form-group">
                                            <label class="label label-warning">Tepung Crispy</label>
                                            <select class="form-control" name="tcs">
                                                 <option value="">Chossen One</option>
                                                <option value="1" <?php if ($tcs==1) {
                                                echo "selected";}?>>Kurang Baik</option>
                                                <option value="2" <?php if ($tcs==2) {
                                                echo "selected";}?>>Baik</option>
                                                <option value="3" <?php if ($tcs==3) {
                                                echo "selected";}?>>Sangat Baik</option>
                                            </select> 
                                        </div>
                                        <div class="form-group">
                                            <label class="label label-warning">Minyak Goreng Di Wajan</label>
                                            <select class="form-control" name="mgdw">
                                               <option value="">Chossen One</option>
                                                <option value="1" <?php if ($mgdw==1) {
                                                echo "selected";}?>>Kurang Baik</option>
                                                <option value="2" <?php if ($mgdw==2) {
                                                echo "selected";}?>>Baik</option>
                                                <option value="3" <?php if ($mgdw==3) {
                                                echo "selected";}?>>Sangat Baik</option>
                                            </select> 
                                        </div>

                                    </div> 
                                        <!-- form keempat -->
                                    <div class="tab-pane" id="ulasan"> 
                                       
                                       <div class="form-group">
                                            <label class="label label-success">Ulasan</label>
                                           <textarea name="ulasan" class="form-control" placeholder="Ulasan" rows="5"><?= $ulasan; ?></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label class="label label-success">Catatan</label>
                                           <textarea name="catatan" class="form-control" placeholder="Catatan" rows="5"><?= $catatan; ?></textarea>
                                        </div>
                                        

                                    </div> 
                                        <!-- form keempat -->
                                    <div class="tab-pane" id="photo"> 
                                       
                                        <div class="form-group">
                                            <label class="label label-default">Photo Pertama</label>
                                            <br />
                                             <?php
                                                 if (isset($gambar)) {
                                                  echo '<input type="hidden" name="old_pict" value="'.$gambar.'">';
                                                  echo '<img src="'.base_url().'assets/survei/'.$gambar.'" width="70px">';
                                                 }
                                                ?>
                                              <div class="clear-fix"></div>
                                              <br />
                                            <input type="file" name="foto">
                                        </div>
                                        <div class="form-group">
                                            <label class="label label-default">Photo Kedua</label>
                                              <br />
                                             <?php
                                                 if (isset($gambar1)) {
                                                  echo '<input type="hidden" name="old_pict1" value="'.$gambar1.'">';
                                                  echo '<img src="'.base_url().'assets/survei/'.$gambar1.'" width="70px">';
                                                 }
                                                ?>
                                              <div class="clear-fix"></div>
                                              <br />
                                            <input type="file" name="foto1">
                                            
                                        </div>
                                        <div class="form-group">
                                            <label class="label label-default">Photo Ketiga</label>
                                              <br />
                                             <?php
                                                 if (isset($gambar2)) {
                                                  echo '<input type="hidden" name="old_pict2" value="'.$gambar2.'">';
                                                  echo '<img src="'.base_url().'assets/survei/'.$gambar2.'" width="70px">';
                                                 }
                                                ?>
                                              <div class="clear-fix"></div>
                                              <br />
                                            <input type="file" name="foto2"> 
                                        </div>
                                         <div class="form-group">
                                            <label class="label label-default">Photo Keempat</label>
                                              <br />
                                             <?php
                                                 if (isset($gambar3)) {
                                                  echo '<input type="hidden" name="old_pict3" value="'.$gambar3.'">';
                                                  echo '<img src="'.base_url().'assets/survei/'.$gambar3.'" width="70px">';
                                                 }
                                                ?>
                                              <div class="clear-fix"></div>
                                              <br />
                                            <input type="file" name="foto3"> 
                                        </div>
                                         <div class="text-center">
                                            <button type="submit" name="submit" class="btn btn-primary" value="Submit">Send</button>
                                            <button type="" class="btn btn-danger">Back</button>

                                            
                                        </div>

                                    </div> 
                                        <!-- form keempat -->

                                </div> 
                           

                            </div> 
                        </form>

                        </div>
                         <!-- end row -->



            </div>
        </div>
      </div>       
      <script>
    $("#datetime").datetimepicker({
        format : 'DD-MM-YYYY'

    });
</script>