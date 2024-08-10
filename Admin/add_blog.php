<?php
include_once('navbar.php');
?>

 <!--include javascript file -->
 <script src="validation.js" type="text/javascript" ></script>



            <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>Add Blog</h2>   
                       
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
                                    
                                <h4 id="msg1" align="center" style="color:#FF0000; text-transform:capitalize"></h4>
		<br>
		<br>

                                    <form role="form" method="post" enctype="multipart/form-data" name="blogform" onsubmit="return blog(this)">
                                        <div class="form-group">
                                            <label>Title</label>
                                            <input class="form-control" placeholder="Please Enter Blog Name" name="name" id="name"/>
                                        </div>
										<div class="form-group">
                                            <label>Image</label>
                                            <input type="file" class="form-control" name="img" id="img"/>
                                        </div>
                                        <div class="form-group">
                                            <label>Description</label>
                                            <input class="form-control" placeholder="Please Enter Description" name="description" id="description"/>
                                        </div>
                                        
                                        
                                        <button type="submit" class="btn btn-default" name="submit">Submit</button>
                                        <button type="reset" class="btn btn-primary">Reset</button>

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
