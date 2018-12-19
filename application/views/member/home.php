            <div class="row">
              <div class="col-md-12">
                <div class="x_panel">
                  <div class="x_content">
                    
                  
                  <h3><?= $you; ?>&nbsp;<?= $fullname; ?></h3>
                  <div class="row">
                  <div class="col-md-6">
              <table class="table table-striped table-responsive table-bordered nowrap dt-responsive">
              <tr>
                <td>Nama Lengkap </td>
                <td><?= $fullname; ?></td>
              </tr>
              <tr>
                <td>Username </td>
                <td><?= $username; ?></td>
              </tr>
              <tr>
                <td>Jenis Kelamin </td>
                <td>
                  <?php 
                    if($jk == 'L'){echo "Laki - Laki";}
                    else{ echo "Perempuan";}
                  ?>
                </td>
              </tr>
              <tr>
              <td>Email </td>
                <td><?= $email; ?></td>
              </tr>
              <tr>
              <td>No.Handphone </td>
                <td><?= $telp; ?></td>
              </tr>
              <tr>
              <td>Alamat </td>
                <td><?= $alamat; ?></td>
              </tr>
               <td>Tanggal Registrasi </td>
                <td><?= $tanggal; ?></td>
              </tr>
          </table>
          </div>
          <div class="col-md-6">
          <table class="table table-striped table-responsive table-bordered nowrap dt-responsive">
              <?php
                 foreach ($query as $key) :
               ?>
               <tr>
                <td>Hasil Keseluruhan Survei Bulan <?= $key->tanggal; ?> </td>
                <td><?= round($key->hasil_bagi, 2); ?></td>
               </tr>
              <?php endforeach; ?>
          </table>

          </div>
          </div>
          <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <a href="<?= base_url() ?>member/edit_profil_member" class="btn btn-primary">Edit Profile</a>
                          <button class="btn btn-info" type="button" onclick="window.print()">Print</button>
                        </div>
                      </div>
                </div>
              </div>
            </div>
          </div>
          </div>