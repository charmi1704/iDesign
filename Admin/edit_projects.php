<?php
include_once('navbar.php');
?>
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>Edit Projects</h2>   
                       
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
                                            <label>Project Name</label>
                                            <input class="form-control" value="<?php echo $fetch->title; ?>" placeholder="Please Enter Project Name" name="title"/>
                                        </div>
										<div class="form-group">
                                            <label>Project Image</label>
                                            <input type="file" value="<?php echo $fetch->img; ?>" class="form-control" name="img"/>
                                            <img src="upload/project/<?php echo $fetch->img?>" width="50px">
                                        </div>
                                       
                                        <div class="form-group">
                                            <label>Project Status</label>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="status" id="optionsRadios1" value="Complete"   <?php if($fetch->status=="Complete"){ echo "checked"; }?>checked />Complete
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="status" id="optionsRadios2" value="Running"  <?php if($fetch->status=="Running"){ echo "checked"; }?>/>Running
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="status" id="optionsRadios3" value="Upcoming"  <?php if($fetch->status=="Upcoming"){ echo "checked"; }?>/>Upcoming
                                                </label>
                                            </div>
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
