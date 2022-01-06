<aside id="aside">
    <nav id="sideNav">
        <!-- MAIN MENU -->
        <ul class="nav nav-list">
            <li class="el_primary <?php if($this->params['controller'] == 'Dashboard' && $this->params['action'] == 'index') {echo 'active';} ?>" id="el_0">
                <!-- dashboard -->
                <a class="dashboard" href="<?php echo BASE_URL; ?>Dashboard">
                    <!-- warning - url used by default by ajax (if eneabled) -->
                    <i class="main-icon fa fa-dashboard"></i> <span>Dashboard</span>
                </a>
            </li>
            
            <li class="el_primary <?php if($this->params['controller'] == 'Admin' && $this->params['action'] == 'index') {echo 'active';} ?>" id="el_1">
                <!-- Admin -->
                <a class="" href="<?php echo BASE_URL; ?>Admin">
                    <i class="main-icon fa fa-users"></i> <span>Admin</span>
                </a>
            </li>
            
            <li class="el_primary <?php if($this->params['controller'] == 'Admin' && $this->params['action'] == 'logout') {echo 'active';} ?>" id="el_2">
                <!-- Admin  Log Out-->
                <a class="" href="<?php echo BASE_URL; ?>Admin/logout">
                    <i class="main-icon fa fa-power-off"></i> <span>Log Out</span>
                </a>
            </li>
        </ul>
    </nav>
    <span id="asidebg"><!-- aside fixed background --></span>
</aside>

