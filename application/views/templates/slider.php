<section id="main-slider" class="no-margin">
    <div class="carousel slide wet-asphalt">
        <ol class="carousel-indicators">
          <li data-target="#main-slider" data-slide-to="" class="active"></li>
          <?php $count =1; for($i =1;$i<count($images);$i++){  ?>

            <li data-target="#main-slider" data-slide-to="<?php echo $count++; ?>"></li>

        <?php   }  ?>
        </ol>
        <div class="carousel-inner">
          <?php $count =1; foreach ($images as $image){  ?>
            <div class="<?php ($count==1) ? $str= 'item active' : $str='item'; echo $str;?>" style="background-image: url(<?php echo get_image($image); ?>)">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="carousel-content center centered">
                                <h2 class="boxed animation animated-item-1"><?php echo $image->file_caption ?></h2>
                                <p class="boxed animation animated-item-2"><?php echo $image->file_desc ?></p>
                                <br>
                                <a class="btn btn-md animation animated-item-3" href="#">Learn More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!--/.item-->
            <?php $count++; } ?>
        </div><!--/.carousel-inner-->
    </div><!--/.carousel-->
    <a class="prev hidden-xs" href="#main-slider" data-slide="prev">
        <i class="icon-angle-left"></i>
    </a>
    <a class="next hidden-xs" href="#main-slider" data-slide="next">
        <i class="icon-angle-right"></i>
    </a>
</section><!--/#main-slider-->
