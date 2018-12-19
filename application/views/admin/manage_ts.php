 <div class="x_panel">
    <div class="x_title">
      <h3><?= $header; ?></h3>
        <div class="clearfix"> </div>
     </div>
     
     <div class="x_content"> 
      <table class="table table-striped table-hover flex-nowrap table-bordered nowrap" id="datatable">
        <thead>
          <tr>
            <th width>No</th>
            <th width>Nama</th>
            <th width>Nama Lengkap</th>
            <th width>E - Mail</th>
            <th>Opsi</th>
          </tr>
        </thead>
        <tbody>
          <?php
            $i = 1;
            foreach ($data->result() as $res) :
          ?>
          <tr>
            <td width><?= $i++;  ?></td>
            <td width><?= $res->username;  ?></td>
            <td width><?= $res->fullname;  ?></td>
            <td width><?= $res->email;  ?></td>
            <td>
              <a href="<?= base_url()?>super/admin/delete_data/<?= $res->id_admin; ?>" class="btn btn-danger" onclick="javascript: return confirm('Anda Yaki Hapus Data ?')"><i class="fa fa-trash"></i></a>
            </td>
          </tr>
        <?php endforeach; ?>
        </tbody>

      </table>

      </div>
    </div>
   </div>
 </div>