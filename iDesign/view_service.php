<?php
include_once('navbar.php');
?>


<div class="container-fluid bg-light">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 mt-5 py-5 pr-lg-5">
                <h5 class="mb-3"><?php echo $w->name;?></h5>
                    <p class="m-0"><?php echo $w->description;?></p>
                </div>
                <div class="col-lg-5">
                    <div class="d-flex flex-column align-items-center justify-content-center h-100 overflow-hidden">
                <img src="../admin/upload/service/<?php echo $w->img;?>" width="50px" height="150px"/>
                    </div>
                </div>
            </div>
        </div>
    </div>