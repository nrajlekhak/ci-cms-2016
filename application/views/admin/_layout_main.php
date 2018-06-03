<?php $this->load->view("admin/components/page_head"); ?>

<div id="wrapper">

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?php echo base_url(); ?>"><?php echo config_item("site_name") ; ?></a>
        </div>
        <!-- Top Menu Items -->
        <ul class="nav navbar-right top-nav">
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-envelope"></i> <b class="caret"></b></a>
                <ul class="dropdown-menu message-dropdown">
                  <li>to be added later</li>
                  <li>to be added later</li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bell"></i> <b class="caret"></b></a>
                <ul class="dropdown-menu alert-dropdown">
                  <li>added later</li>
                  <li>added later</li>
                  <li>added later</li>
                  <li>added later</li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i>nrajlekhak@gmail.com <b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li>
                        <a href="#"><i class="fa fa-fw fa-user"></i>Niraj lekhak</a>
                    </li>

                    <li class="divider"></li>
                    <li>
                        <a href="<?php echo base_url('admin/user/logout'); ?>"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                    </li>
                </ul>
            </li>
        </ul>
        <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav side-nav">
                <li class="active">
                    <a href="<?php echo base_url('admin/dashboard') ?>"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                </li>
                <li>
                    <a href="<?php echo base_url('admin/page') ?>"><i class="fa fa-fw fa-bar-chart-o"></i>Pages</a>
                </li>
                <li>
                    <a href="<?php echo base_url('admin/articles') ?>"><i class="fa fa-fw fa-table"></i> Articles</a>
                </li>
                <li>
                    <a href="<?php echo base_url('admin/user') ?>"><i class="fa fa-fw fa-user"></i>User</a>
                </li>

                <li>
                    <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-arrows-v"></i> More <i class="fa fa-fw fa-caret-down"></i></a>
                    <ul id="demo" class="collapse">
                        <li>
                            <a href="<?php echo base_url('admin/page/order');?>">Menu Order</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url('admin/fileupload');?>">Slider</a>
                        </li>
                    </ul>
                </li>

            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </nav>

    <div id="page-wrapper">

        <div class="container-fluid">
          <div class="row" style="min-height: 590px;">


            <?php $this->load->view($subview); ?>
            </div>
        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->
  <?php $this->load->view("admin/components/page_tail") ?>
