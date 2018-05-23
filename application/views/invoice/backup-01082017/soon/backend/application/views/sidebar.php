<!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="<?php echo $_SESSION['users_photo'];?>" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <p><?php echo $_SESSION['users_name'];?></p>
              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li>
              <a href="<?php echo base_url()."Home";?>">
                <i class="fa fa-th"></i> <span>Home</span> 
              </a>
            </li>
            <li>
              <a href="<?php echo base_url()."Slider";?>">
                <i class="fa fa-image "></i> <span>Slider</span> 
              </a>
            </li>

            <li>
              <a href="<?php echo base_url()."Mini";?>">
                <i class="fa fa-image "></i> <span>Mini Slider</span> 
              </a>
            </li>
            <li>
              <a href="<?php echo base_url()."Contact";?>">
                <i class="fa fa-file-text"></i> <span>Contact Us</span> 
              </a>
            </li>
            <li>
              <a href="<?php echo base_url()."Suscriber";?>">
                <i class="fa fa-users"></i> <span>Suscriber</span> 
              </a>
            </li>
            <li>
              <a href="<?php echo base_url()."Section";?>">
                <i class="fa fa-expand"></i> <span>Section</span> 
              </a>
            </li>            
            <li>
              <a href="<?php echo base_url().'Akses';?>">
                <i class="fa fa-user"></i> <span>Hak Akses</span> 
              </a>
            </li>
            <li>
              <a href="<?php echo base_url().'Footer';?>">
                <i class="fa fa-user"></i> <span>Footer</span> 
              </a>
            </li>
            <li>
              <a href="<?php echo base_url()."Promo";?>">
                <i class="fa fa-line-chart"></i> <span>Promo</span> 
              </a>
            </li>
             <li>
              <a href="<?php echo base_url().'Merchant';?>">
                <i class="fa fa-user"></i> <span>Merchant</span> 
              </a>
            </li>
            <li>
              <a href="<?php echo base_url()."Logout";?>">
                <i class="fa fa-power-off"></i> <span>Logout</span> 
              </a>
            </li>
          </ul>
        </section>
        <!-- /.sidebar -->