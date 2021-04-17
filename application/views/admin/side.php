    <div id="wrapper">
      <!-- Sidebar -->
      <ul class="sidebar navbar-nav">
        <li class="nav-item <?php echo (base_url() . 'admin' == current_url() ? 'active' : '') ?>">
          <a class="nav-link" href="<?php echo base_url().'index.php/admin';?>">
            <i class="fas fa-fw fa-home"></i>
            <span>Dashboard</span>
          </a>
        </li>

        <li class="nav-item <?php echo (base_url() . 'admin/sesi' == current_url() ? 'active' : '') ?>">
          <a class="nav-link" href="<?php echo base_url() . 'index.php/admin/sesi' ?>">
            <i class="fas fa-fw fa-hourglass-start"></i>
            <span>Sesi</span></a>
        </li>
				<li class="nav-item">
					<a class="nav-link" href="#" data-toggle="modal" data-target="#logoutModal">
						<i class="fas fa-fw fa-power-off"></i>
						<span>Keluar</span></a>
				</li>
      </ul>