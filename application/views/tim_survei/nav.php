 <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar" style="border: 3;">
              <a href="<?= base_url(); ?>tim_survei/admin" class="site_title"><img src="<?= base_url();?>dash/img/ico.png" alt="" style="width: 40px; height: 35px;"> <span>SISFO CEMANI</span></a>
            </div>
            <div class="clearfix"></div>
            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>Sistem Informasi</h3>
                <ul class="nav side-menu">
                  <li><a href="<?= base_url(); ?>tim_survei/admin"><i class="fa fa-dashboard"></i> Dashboard</a>
                  </li>
                  <li><a><i class="fa fa-file"></i> Data Survei <span class="fa fa-chevron-circle-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?= base_url(); ?>survei">Lihat Data</a></li>
                      <li><a href="<?= base_url(); ?>survei/add_data">Tambah Data</a></li>
                    </ul>
                  </li>
                  <li><a href="<?= base_url(); ?>tim_survei/cek_member"><i class="fa fa-user"></i> Member</a>
                  </li>
                </ul>
              </div>

            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Logout" href="<?= base_url()?>login/logout">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
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
                    <i class="fa fa-user"> </i>&nbsp;  <?= $this->session->userdata('user'); ?>
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="<?= base_url()?>tim_survei/admin/edit_profil"><i class="fa fa-edit pull-right"></i>Edit Profile</a></li>
                    <li><a href="<?= base_url()?>login/logout"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                  </ul>
                </li>
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->