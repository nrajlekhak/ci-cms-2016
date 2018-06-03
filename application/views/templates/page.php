<div class="container" style="">
  <div class="row">
    <div class="col-md-9">

      <article class="">
        <h2><?php echo e($page->title);?></h2>
        <?php echo $page->body ?>
      </article>
    </div>

    <div class="col-md-3">

      <?php $this->load->view('templates/sidebar.php'); ?>
    </div>
  </div>
</div>
