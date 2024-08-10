
<?php
include_once('navbar.php');
?>
<body>
	<div class="tm-page-wrap mx-auto">

		<!-- Page content -->
		<main>
			<div class="container-fluid px-0">
				<div class="mx-auto tm-content-container">					
					<div class="row mt-3 mb-5 pb-3">
						<div class="col-12">
							<div class="mx-auto tm-about-text-container px-3">
								<h2 class="tm-page-title text-center mb-4 tm-text-primary">Edit User</h2>
               				</div>							
						</div>						
					</div>
                    <div class="mx-auto pb-3 tm-about-text-container px-3">
                        <div class="row">
                            <div class="col-lg-12  mb-5">
                            <form role="form" method="post" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input class="form-control" value="<?php echo $fetch->name;?>"  placeholder="Please Enter Name" name="name"/>
                                        </div>
                                        <div class="form-group">
                                            <label>Image</label>
                                            <input type="file"  value="<?php echo $fetch->img;?>" class="form-control" name="img" />
                                            <img src="../admin/upload/user/<?php echo $fetch->img?>" width="50px">
                                        </div>
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input class="form-control" value="<?php echo $fetch->email;?>"  placeholder="Please Enter Blog Name" name="email"/>
                                        </div>
                                        <div class="form-group">
                                            <label>Mobile</label>
                                            <input class="form-control" value="<?php echo $fetch->mobile;?>" placeholder="Please Enter Mobile" name="mobile" />
                                        </div>
                                        
                                        
                                        <button type="submit" class="btn btn-primary" name="save">Save</button>

                                    </form>   
                            </div>
                        </div>  
                    </div>                                      			
				</div>

		
			</div>
		</main>
<?php
include_once('footer.php');
?>
                    <!-- Form Elements -->
                    <div class="panel panel-default">
                        
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12">
                                    
                                    <form role="form" method="post" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input class="form-control" value="<?php echo $fetch->name;?>"  placeholder="Please Enter Name" name="name"/>
                                        </div>
                                        <div class="form-group">
                                            <label>Image</label>
                                            <input type="file"  value="<?php echo $fetch->img;?>" class="form-control" name="img" />
                                            <img src="upload/user/<?php echo $fetch->img?>" width="50px">
                                        </div>
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input class="form-control" value="<?php echo $fetch->email;?>"  placeholder="Please Enter Blog Name" name="email"/>
                                        </div>
                                        <div class="form-group">
                                            <label>Mobile</label>
                                            <input class="form-control" value="<?php echo $fetch->mobile;?>" placeholder="Please Enter Mobile" name="mobile" />
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
