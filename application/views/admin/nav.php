 <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar" style="border: 3;">
              <a href="<?= base_url(); ?>super/admin" class="site_title"><img src="<?= base_url();?>dash/img/ico.png" alt="" style="width: 40px; height: 35px;"> <span>SISFO CEMANI</span></a>
            </div>
            <div class="clearfix"></div>
            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>Sistem Informasi</h3>
                <ul class="nav side-menu">
                  <li><a href="<?= base_url(); ?>super/admin"><i class="fa fa-home"></i> Dashboard</a>
                  </li>
                  <li><a href="<?= base_url(); ?>super/cek_ts"><i class="fa fa-users"></i>Tim Survei</a>
                  </li>
                  <li><a><i class="fa fa-file"></i>Hasil Survei <span class="fa fa-chevron-circle-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?= base_url(); ?>survei">Lihat Data</a></li>
                      <li><a href="<?= base_url(); ?>survei/add_data">Tambah Data</a></li>
                    </ul>
                  </li>
                  <li><a href="<?= base_url(); ?>super/cek_member"><i class="fa fa-user"></i>Data Member</a>
                  </li>
                </ul>
              </div>
              <div class="menu_section">

              </div>

            </div>
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-user"> </i>&nbsp; <?= $this->session->userdata('user'); ?>
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="<?= base_url(); ?>super/admin/edit_profil"><i class="fa fa-edit pull-right"></i>Edit Profile</a></li>
                    <li><a href="<?= base_url()?>login/logout"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                  </ul>
                </li>
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->