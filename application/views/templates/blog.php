<section id="title" class="emerald">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <h1>Blog</h1>
                <p>Pellentesque habitant morbi tristique senectus et netus et malesuada</p>
            </div>
            <div class="col-sm-6">
                <ul class="breadcrumb pull-right">
                    <li><a href="<?php echo base_url(); ?>">Home</a></li>
                    <li class="active">Blog</li>
                </ul>
            </div>
        </div>
    </div>
</section><!--/#title-->

<section id="blog" class="container">

    <div class="row">
        <aside class="col-sm-4 col-sm-push-8">



            <div class="widget ads">
                <div class="row">
                    <div class="col-xs-6">
                        <a href="#"><img class="img-responsive img-rounded" src="" alt=""></a>
                    </div>
<!-- future plans to add advert rotation system -->

                </div>
            </div><!--/.ads-->
              <?php $this->load->view('templates/sidebar.php');?>
              


        </aside>

        <div class="col-sm-8 col-sm-pull-4">
          <?php if($pagination): ?>

                <?php echo $pagination; ?>

          <?php endif; ?>

            <div class="blog">
              <?php if(count($articles)): foreach ($articles as $article):  ?>
                <?php echo get_article($article);?>
              <?php endforeach; endif; ?>
            </div>
            </div><!--/.col-md-8-->
            <?php if($pagination): ?>

                  <?php echo $pagination; ?>

          <?php endif; ?>

    </div><!--/.row-->
</section><!--/#blog-->
