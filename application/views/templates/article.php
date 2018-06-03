<div class="container" style="">
  <div class="row">
    <div class="col-md-9">

      <article class="">
        <h2><?php echo e($article->title);?></h2>
        <p class="pubdate"><?php echo e($article->pubdate);?></p>
        <?php echo $article->body?>
      </article>
    </div>

    <div class="col-md-3">

      <?php $this->load->view('templates/sidebar.php'); ?>
    </div>
  </div>
</div>
