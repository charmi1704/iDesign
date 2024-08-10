<?php
include_once('navbar.php');
?>
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>Edit Team</h2>   
                       
                    </div>
                </div>
                 <!-- /. ROW  -->
                 <hr />
               <div class="row">
                <div class="col-md-12">
                    <!-- Form Elements -->
                    <div class="panel panel-default">
                        
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12">
                                    
                                    <form role="form" method="post" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input class="form-control" value="<?php echo $fetch->name ?>" placeholder="Please Enter  Name" name="name" />
                                        </div>
										<div class="form-group">
                                            <label>Image</label>
                                            <input type="file" value="<?php echo $fetch->img ?>" class="form-control" name="img"/>
                                            <img src="upload/team/<?php echo $fetch->img?>" width="50px">
                                        </div>
                                        <div class="form-group">
                                            <label>Designation</label>
                                            <input class="form-control" value="<?php echo $fetch->designation ?>" placeholder="Please Enter designation" name="designation"/>
                                        </div>
                                        
                                        <button type="submit" class="btn btn-default" name="save">Save</button>
                                     

                                    </form>
                                    
                                 
    </div>
                               
                            </div>
                        </div>
                    </div>
                     <!-- End Form Elements -->
                </div>
            </div>
               
    </div>
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
        </div>
     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
    
   
</body>
</html>
