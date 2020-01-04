<nav class="main-header navbar navbar-expand navbar-white navbar-light">
  <!-- Left navbar links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
    </li>
  </ul>

  <!-- Right navbar links -->
  <ul class="navbar-nav ml-auto">
    <li class="nav-item">
      <a class="nav-link" href="<?php echo base_url(); ?>User/logout">
        <i class="fas fa-sign-out-alt"></i>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#">
        <i class="fas fa-th-large"></i>
      </a>
    </li>
  </ul>
</nav>
<!-- Sidebar -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="<?php echo base_url(); ?>User/dashboard" class="brand-link">
    <span class="brand-text font-weight-light">Challan System</span>
  </a>
  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="info">
        <a href="#" class="d-block">Admin</a>
      </div>
    </div>
    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
        <li class="nav-item">
          <a href="<?php echo base_url(); ?>User/dashboard" class="nav-link">
            <i class="nav-icon fas fa-th"></i>
            <p>
              Dashboard
            </p>
          </a>
        </li>
        <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Master
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview" style="display: none;">
              <li class="nav-item">
                <a href="<?php echo base_url(); ?>User/company_information_list" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                    Company Information
                  </p>
                </a>
              </li>

              <li class="nav-item">
                <a href="<?php echo base_url(); ?>User/item_information_list" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                    Item Information
                  </p>
                </a>
              </li>

              <li class="nav-item">
                <a href="<?php echo base_url(); ?>User/item_group_information_list" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                    Item Group Information
                  </p>
                </a>
              </li>

              <li class="nav-item">
                <a href="<?php echo base_url(); ?>User/party_information_list" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                    Party Information
                  </p>
                </a>
              </li>

              <li class="nav-item">
                <a href="<?php echo base_url(); ?>User/vehicle_information_list" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                    Vehicle Information
                  </p>
                </a>
              </li>

              <li class="nav-item">
                <a href="<?php echo base_url(); ?>User/remark_information_list" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                    Remark Information
                  </p>
                </a>
              </li>
              <!-- <li class="nav-item">
                <a href="<?php echo base_url(); ?>User/process_information_list" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                    Process Information
                  </p>
                </a>
              </li> -->
              <li class="nav-item">
                <a href="<?php echo base_url(); ?>User/user_information_list" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                    User Information
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url(); ?>User/unit_information_list" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                    Unit Information
                  </p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-chart-pie"></i>
                <p>
                  Transaction
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview" style="display: none;">
                <li class="nav-item">
                  <a href="<?php echo base_url(); ?>Transaction/inword_information_list" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>
                      Inward Information
                    </p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?php echo base_url(); ?>Transaction/outword_information_list" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>
                      Outward Information
                    </p>
                  </a>
                </li>
              </ul>
            </li>

            <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-chart-pie"></i>
                  <p>
                    Reports
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview" style="display: none;">
                  <li class="nav-item">
                    <a href="<?php echo base_url(); ?>Report/item_wise_stock_report" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>
                        Item Wise Stock Reports
                      </p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="<?php echo base_url(); ?>Report/vehicle_report" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>
                        Vehicle Reports
                      </p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="<?php echo base_url(); ?>Report/ci_report" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>
                      CI Boaring Reports
                      </p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="<?php echo base_url(); ?>Report/outword_bif_report" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>
                      Outword BIF Reports
                      </p>
                    </a>
                  </li>


                </ul>
              </li>





      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>
