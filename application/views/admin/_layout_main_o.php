<?php $this->load->view("admin/components/page_head"); ?>
  <body>
    <nav class="navbar navbar-default navbar-static-top">
      <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="<?php echo base_url('');?>"> <?php echo config_item("site_name") ; ?></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="<?php echo base_url('admin/dashboard');?>">Dashboard <span class="sr-only">(current)</span></a></li>
        <li><a href="<?php echo base_url('admin/page');?>">Pages</a></li>



        <li><a href="<?php echo base_url('admin/articles');?>">Articles</a></li>

        <li><a href="<?php echo base_url('admin/user');?>">Users</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">More <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="<?php echo base_url('admin/page/order');?>">Pages order</a></li>


            <li role="separator" class="divider"></li>
            <li><a href="<?php echo base_url('admin/fileupload');?>">Slider</a></li>

          </ul>
        </li>
      </ul>

      <ul class="nav navbar-nav navbar-right">

        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">Separated link</a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

    <div class="container containter-fluid">
      <!-- main column-->
      <div class="row">

      </div>
      <div class="col-md-9">
        <?php $this->load->view($subview); ?>
      </div>
      <!-- sidebar-->
      <div class="col-md-3">
          <section>
            <?php echo mailto('nrajlekhak@gmail.com','<i class="glyphicon glyphicon-user "></i> nrajlekhak@gmail.com'); ?> <br />
            <?php echo anchor('admin/user/logout', '<i class="glyphicon glyphicon-log-out "></i> logout'); ?>
          </section>

      <?php $this->load->view("admin/components/page_tail") ?>
