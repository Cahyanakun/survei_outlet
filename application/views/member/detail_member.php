 <div class="x_panel">
    <div class="x_title">
      <h2><?= $header; ?></h2>
        <div class="clearfix"> </div>
     </div>
     
     <div class="x_content"> 
        
      <div class="row">
        
       <div class="col-md-6">
          <table class="table table-striped table-responsive table-bordered nowrap">
              <tr>
                <td>Nama Member </td>
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
          <table class="table table-striped table-responsive table-bordered nowrap">
               <?php
                 foreach ($query1->result() as $key) :
               ?>
               <tr>
                <td>Hasil Keseluruhan Survei Bulan <?= $key->tanggal; ?> </td>
                <td><?= round($key->hasil_bagi, 2); ?></td>
               </tr>
              <?php endforeach; ?>
             
          </table>
          </div>

        
       </div> 
      </div>
   </div>
 </div>