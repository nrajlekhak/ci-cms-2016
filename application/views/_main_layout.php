<?php $this->load->view('components/page_head'); ?>

  <body>

<div class="container-fluid" style="min-height: 500px;">
    <!-- page title -->






<header class="navbar navbar-inverse navbar-fixed-top wet-asphalt" role="banner">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" style="color:white; " href="<?php echo base_url('');?>"><?php echo config_item("site_name") ; ?></a>
        </div>
        <div class="collapse navbar-collapse">
              <?php echo get_menu($menu); ?>
        </div>
    </div>
</header><!--/header-->







  <?php
    $this->load->view('templates/'.$subview);
  ?>




</div>
<?php $this->load->view('components/page_tail'); ?>
