<?php $this->load->view('templates/slider.php') ?>
<!-- recent works -->
<section id="recent-works">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <h3>Our Latest Projects</h3>
                <p>check out some of our latest works</p>
                <div class="btn-group">
                    <a class="btn btn-danger" href="#scroller" data-slide="prev"><i class="icon-angle-left"></i></a>
                    <a class="btn btn-danger" href="#scroller" data-slide="next"><i class="icon-angle-right"></i></a>
                </div>
                <p class="gap"></p>
            </div>
            <div class="col-md-9">
                <div id="scroller" class="carousel slide">
                    <div class="carousel-inner">

                      <?php for($i =0;$i<6;$i++){ ?>
                        <?php if($i == 0){ ?>
                        <div class="item active">
                            <div class="row">
                              <?php } else if ($i == 3) { ?>
                                <div class="item">
                                    <div class="row">
                          <?php    }?>

                                <div class="col-xs-4">
                                    <div class="portfolio-item">
                                        <div class="item-inner">


                                                <?php echo get_except($articles[$i]); ?>
                                      
                                            <div class="overlay">
                                            <a class="preview btn btn-danger" title=""
                                            href="
                                            <?php echo 'article/'.intval($articles[$i]->id).'/'.($articles[$i]->slug); ?>"><i class="icon-eye-open"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <?php if($i == 2 or $i == 5){ ?>
                                </div><!--/.row-->
                            </div><!--/.item-->
                            <?php } ?>
                        <?php } ?>


                    </div>
                </div>
            </div>
        </div><!--/.row-->
    </div>
</section><!--/#recent-works-->
