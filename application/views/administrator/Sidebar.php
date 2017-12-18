  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="#" class="img-circle" alt="">
        </div>
        <div class="pull-left info">
          <h5><?php echo $this->session->userdata('first_name') ?>
            <?php echo $this->session->userdata('last_name') ?></h5>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MENU PRINCIPAL</li>
        <?php   $rol=$this->session->userdata('id_rol'); 
          if($rol=='4' || $rol=='1' || $rol=='5' || $rol=='7' || $rol=='8' || $rol=='9' || $rol=='10' || $rol=='11'):?>
       
        <li class="active treeview">
          <a href="">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>   
          </a>
          <ul class="treeview-menu">
            <li class="active"><a href="<?php echo base_url(); ?>administrator"><i class="fa fa-circle-o"></i> Dashboard</a></li>
          </ul>           
        </li>
      <?php endif; ?>
       <?php  if($rol=='1'):?>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-users"></i>
            <span>Usuarios</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url(); ?>users"><i class="fa fa-users"></i> Ver Usuarios</a></li>
            <li><a href="<?php echo base_url(); ?>permissions"><i class="fa fa-check-square-o"></i> Ver Permisos</a></li>
            <li><a href="<?php echo base_url(); ?>roles"><i class="fa fa-check-square"></i> Ver Roles</a></li>
          </ul>
        </li>
      <?php endif; ?>
       <?php  if($rol=='1'):?>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-calendar-plus-o"></i><span>Categorias</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span> 
          </a>
          <ul class="treeview-menu">
            <li class="active"><a href="<?php echo base_url(); ?>category"><i class="fa fa-calendar-plus-o"></i> Ver categorias</a></li>
          </ul>
        </li>
     <?php endif; ?>
      <?php  if($rol=='1'):?>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-bars"></i> <span>Menus</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>   
          </a>
          <ul class="treeview-menu">
            <li class="active"><a href="<?php echo base_url(); ?>menus_top"><i class="fa fa-bars"></i> Ver Menu Superior</a></li>
            <li class="active"><a href="<?php echo base_url(); ?>menus_bottom"><i class="fa fa-bars"></i> Ver Menu Principal</a></li>
          </ul>
        </li>
      <?php endif; ?>
       <?php  if($rol=='1'):?>
        <li class="treeview">
          <a href=" ">
            <i class="fa fa-sliders"></i> <span>Sliders</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>           
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url(); ?>slider"><i class="fa fa-circle-o"></i> Sliders</a></li>
          </ul>   
        </li>
      <?php endif; ?>
        <?php  if($rol=='4' || $rol=='1' || $rol=='5' || $rol=='7' || $rol=='8' || $rol=='9' || $rol=='10' || $rol=='11'):?>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-newspaper-o "></i> <span>Noticias</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url(); ?>news"><i class="fa fa-circle-o"></i> Ver Noticias</a></li>
          </ul>            
        </li>
      <?php endif; ?>
        <?php  if($rol=='1'):?>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-youtube-play"></i>
            <span>Video</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url(); ?>video"><i class="fa fa-youtube-play"></i> Ver Videos</a></li>
          </ul>
        </li>
      <?php endif; ?>
        <?php  if($rol=='1'):?>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-share-square"></i>
            <span>Redes Sociales</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url(); ?>social"><i class="fa fa-share-square"></i> Ver Redes Soc.</a></li>
          </ul>
        </li>
      <?php endif; ?>
        <?php  if($rol=='1'):?>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-thumb-tack"></i>
            <span>Publicidad</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url(); ?>publicity"><i class="fa fa-thumb-tack"></i> Ver Publicidad</a></li>
          </ul>
        </li>
      <?php endif; ?>
        <li class="header">ETIQUETAS</li>
        <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Important</span></a></li>
        <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>Warning</span></a></li>
        <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>Information</span></a></li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
