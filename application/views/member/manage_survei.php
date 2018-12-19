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
            <th width>Nama Member</th>
            <th width>Tanggal</th>
            <th width>Nilai Keseluruhan</th>
            <th width>Real Times</th>
            <th>Opsi</th>
          </tr>
        </thead>
        <tbody>
          <?php
            $i = 1;
            foreach ($listing as $res) :
          ?>
          <tr>
            <td width="20px"><?= $i++;  ?></td>
            <td width="50px"><?= $res->fullname;  ?></td>
            <td width="50px"><?= $res->tanggal;  ?></td>
            <td width="70px"><?= $res->val1;  ?></td>
            <td width="50px"><?= $res->date;  ?></td>
            <td>
              <a href="<?= base_url()?>member/detail_survei/<?= md5($res->id_survei); ?>" class="btn btn-info"><i class="fa fa-search-plus"></i>&nbsp; Details</a>
            </td>
          </tr>
        <?php endforeach; ?>
        </tbody>

      </table>

      </div>
    </div>
   </div>
 </div>