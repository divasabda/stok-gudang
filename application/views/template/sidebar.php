  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <?php if($this->session->userdata('akses')=='1'):?>
      <a href="<?php echo base_url('admin/home')?>" class="brand-link">
    <?php elseif($this->session->userdata('akses')=='2'):?>
      <a href="<?php echo base_url('owner/home')?>" class="brand-link">
    <?php endif?>
      <img src="<?php echo base_url('assets/AdminLTE/')?>dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">STOK BAHAN</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

          <?php if($this->session->userdata('akses')=='1'):?>

          <li class="nav-item">
            <a href="<?php echo base_url('admin/bahan')?>" class="nav-link">
              <i class="nav-icon fas fa-box"></i>
              <p>
                Menu Bahan
              </p>
            </a>
          </li>

<!--        menu bahan masuk -->
          <li class="nav-item">
            <a href="<?php echo base_url('admin/bahan-masuk')?>" class="nav-link">
              <i class="nav-icon fas fa-dolly-flatbed fa-flip-horizontal"></i>
              <p>
                Menu Bahan masuk
              </p>
            </a>
          </li>

<!--       menu bahan keluar  -->

          <li class="nav-item">
            <a href="<?php echo base_url('admin/bahan-keluar')?>" class="nav-link">
              <i class="nav-icon fas fa-dolly-flatbed"></i>
              <p>
                Menu Bahan Keluar
              </p>
            </a>
          </li>

<!--       menu peramalan  -->

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-star"></i>
              <p>
                Peramalan
              </p>
            </a>
          </li>

<!--      menu laporan -->

          <li class="nav-item">
            <a href="<?php echo base_url('admin/laporan')?>" class="nav-link">
              <i class="nav-icon far fa-list-alt"></i>
              <p>
                Menu Laporan
              </p>
            </a>
          </li>

      <?php elseif($this->session->userdata('akses')=='2'):?>

<!--      menu laporan -->

          <li class="nav-item">
            <a href="<?php echo base_url('owner/home')?>" class="nav-link">
              <i class="nav-icon far fa-list-alt"></i>
              <p>
                Menu Laporan
              </p>
            </a>
          </li>

       <?php endif; ?>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>