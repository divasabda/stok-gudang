  <!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
    </ul>
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">

      <li class="nav-item dropdown user-menu">
        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
          <i class="fas fa-user-astronaut fa-2x"></i>
          <?php if($this->session->userdata('akses')==1 || $this->session->userdata('akses')==2 ):?>
          <span class="d-none d-md-inline"><?php echo $this->session->userdata('ses_nama'); ?></span>
          <?php endif; ?>
        </a>
        <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <!-- User image -->

          <!-- Menu Footer-->
          <li class="user-footer bg-yellow">
            <a href="#" class="btn btn-default btn-flat">Profile</a>
            <a href="<?php echo base_url('logout')?>" class="btn btn-default btn-flat float-right">Sign out</a>
          </li>
        </ul>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->