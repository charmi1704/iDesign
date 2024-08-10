<?php
include_once('navbar.php');
?>



    <!-- Page Header Start -->
    <div class="container-fluid bg-secondary py-5">
        <div class="container py-5">
            <div class="row align-items-center py-4">
                <div class="col-md-6 text-center text-md-left">
                    <h1 class="mb-4 mb-md-0 text-primary text-uppercase">Our Projects</h1>
                </div>
                <div class="col-md-6 text-center text-md-right">
                    <div class="d-inline-flex align-items-center">
                        <a class="btn btn-outline-primary" href="">Home</a>
                        <i class="fas fa-angle-double-right text-primary mx-2"></i>
                        <a class="btn btn-outline-primary disabled" href="">Our Projects</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Page Header Start -->


    <!-- Projects Start -->
    <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-lg-6 col-md-8 col text-center mb-4">
                    <h6 class="text-primary font-weight-normal text-uppercase mb-3">Our Projects</h6>
                    <h1 class="mb-4">Some Of Our Awesome Interior Designing Projects</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-12 text-center mb-2">
                    <ul class="list-inline mb-4" id="portfolio-flters">
                        <li class="btn btn-outline-primary m-1 active"  data-filter="*">All</li>
                        <li class="btn btn-outline-primary m-1" data-filter=".first">Complete</li>
                        <li class="btn btn-outline-primary m-1" data-filter=".second">Running</li>
                        <li class="btn btn-outline-primary m-1" data-filter=".third">Upcoming</li>
                    </ul>
                </div>
            </div>
            <div class="row properties-box">
                <?php					
                    foreach($project as $w)
                    {
                ?>
                    <div class="col-lg-4 col-md-6 align-self-center mb-30 properties-items col-md-6 adv">
                        <div class="item">
                            <a href="#"><img src="../Admin/upload/project/<?php echo $w->img;?>"  width="100%" height="250px" /></a>
                            <h4>
                                <a href="../Admin/upload/project/<?php echo $w->img;?>">
                                <?php echo $w->title;?></a>
                            </h4>             
                                                        <hr></hr>  
                            <h6><?php echo $w->status;?></h6>                  
                        </div>
                    </div>
                <?php
                    }
                ?>
            </div>
        </div>
    </div>
</div>
    <!-- Projects End -->

    <?php
include_once('footer.php');
?>