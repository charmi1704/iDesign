<?php

include_once('model.php'); // 1 step : load model in control

class control extends model    // 2 step extends(inherit) model class
{
	// auto call magic function  only make clsss object 
	function __construct()
	{
		session_start();
		
		model::__construct(); // 3 step call model __construct for database connectivity 
		
		$url=$_SERVER['PATH_INFO']; // PATH urldecode
		
		switch($url)
		{
			case '/index':
				if (isset($_REQUEST['submit'])) {
					
					$email = $_REQUEST['email'];
					$password = md5($_REQUEST['password']); // pass encripted 
					
					$where = array("email" => $email, "password" => $password);
					$res=$this->select_where('admin',$where);
					$chk=$res->num_rows; // 0 means false & 1 means true  check row wise condition
					
					if($chk==1)
					{
						$data=$res->fetch_object(); // single data fetch 
						$_SESSION['aname']=$data->name;
						$_SESSION['aid']=$data->id;
						echo "<script>
							alert('Login Success !');
							window.location='dashboard';
						</script>";
					}
					else
					{
						echo "<script>
							alert('Login Failed !');
						</script>";
					}
				}
			include_once('index.php');
			break;
			
			case '/admin_logout':
				unset($_SESSION['aid']);
				unset($_SESSION['aname']);
				echo "<script>
						alert('Logout Success !');
						window.location='index'
					</script>";
			break;

			case '/aprofile':
				$where=array("id"=>$_SESSION['aid']);
				$res=$this->select_where('admin',$where);
				$fetch=$res->fetch_object();
				
				include_once('aprofile.php');
				break;
				
				case '/user_logout':
					unset($_SESSION['uid']);
					unset($_SESSION['uname']);
					echo "<script>
							alert('Logout Success !');
							window.location='index'
						</script>";
				break;

			case '/dashboard':
			include_once('dashboard.php');
			break;
			
			case '/add_services':
				if (isset($_REQUEST['submit'])) {
					$name = $_REQUEST['name'];
					$img = $_FILES['img']['name'];
					// image upload in project folder
					$path = '../admin/upload/service/' . $img;
					$tmp_file = $_FILES['img']['tmp_name'];
					move_uploaded_file($tmp_file, $path);

					$description = $_REQUEST['description'];

					$data = array("name" => $name, "img" => $img, "description" => $description);

					$res=$this->insert('service',$data);
					if($res)
					{
						echo "<script>
							alert('service Success !');
						</script>";
					}
				}	
	
			include_once('add_services.php');
			break;
			
			case '/manage_services':
			$service=$this->select('service');
			include_once('manage_services.php');
			break;
			
			case '/add_projects':
				if (isset($_REQUEST['submit'])) {
					$title = $_REQUEST['title'];
					$img = $_FILES['img']['name'];
					// image upload in project folder
					$path = '../admin/upload/project/' . $img;
					$tmp_file = $_FILES['img']['tmp_name'];
					move_uploaded_file($tmp_file, $path);

					$status = $_REQUEST['status'];

					$data = array("title" => $title, "img" => $img, "status" => $status);

					$res=$this->insert('project',$data);
					if($res)
					{
						echo "<script>
							alert('project Success !');
						</script>";
					}
				}	
			include_once('add_projects.php');
			break;
			
			case '/manage_projects':
			$project=$this->select('project');
			include_once('manage_projects.php');
			break;
			
			case '/add_blog':
				if (isset($_REQUEST['submit'])) {
					$name = $_REQUEST['name'];
					$img = $_FILES['img']['name'];
					// image upload in project folder
					$path = '../admin/upload/blog/' . $img;
					$tmp_file = $_FILES['img']['tmp_name'];
					move_uploaded_file($tmp_file, $path);

					$description = $_REQUEST['description'];

					$data = array("name" => $name, "img" => $img, "description" => $description);

					$res=$this->insert('blog',$data);
					if($res)
					{
						echo "<script>
							alert('Blog Success !');
						</script>";
					}
				}	
			include_once('add_blog.php');
			break;
			
			case '/manage_blog':
			$blog=$this->select('blog');
			include_once('manage_blog.php');
			break;
			
			case '/add_team':
				if (isset($_REQUEST['submit'])) {
					$name = $_REQUEST['name'];
					$img = $_FILES['img']['name'];
					// image upload in project folder
					$path = 'upload/team/' . $img;
					$tmp_file = $_FILES['img']['tmp_name'];
					move_uploaded_file($tmp_file, $path);

					$designation = $_REQUEST['designation'];

					$data = array("name" => $name, "img" => $img, "designation" => $designation);

					$res=$this->insert('team',$data);
					if($res)
					{
						echo "<script>
							alert('team Success !');
						</script>";
					}
				}	
			include_once('add_team.php');
			break;
			
			case '/manage_team':
			$team=$this->select('team');
			include_once('manage_team.php');
			break;
			
			case '/manage_user':
			$user=$this->select('user');
			include_once('manage_user.php');
			break;
			
			case '/manage_feedback':
			$feedback=$this->select('feedback');
			include_once('manage_feedback.php');
			break;

			case '/manage_contact':
				$contact=$this->select('contact');
				include_once('manage_contact.php');
				break;
			

//============================================================================================================================================

			case '/delete':
			
				if(isset($_REQUEST['dservice'])) 
				{
					$id=$_REQUEST['dservice'];
					
					$where=array("id"=>$id);
					$res=$this->delete_where('service',$where);
					if($res)
					{
					echo "<script>
							alert('service Delete Success !');
							window.location='manage_services'
						</script>";
					}
				}

				if(isset($_REQUEST['dproject'])) 
				{
					$id=$_REQUEST['dproject'];
					
					$where=array("id"=>$id);
					$res=$this->delete_where('project',$where);
					if($res)
					{
					echo "<script>
							alert('Project Delete Success !');
							window.location='manage_projects'
						</script>";
					}
				}

				if(isset($_REQUEST['dfeedback'])) 
				{
					$id=$_REQUEST['dfeedback'];
					
					$where=array("id"=>$id);
					$res=$this->delete_where('feedback',$where);
					if($res)
					{
					echo "<script>
							alert('feedback Delete Success !');
							window.location='manage_feedback'
						</script>";
					}
				}

				if(isset($_REQUEST['dcontact'])) 
				{
					$id=$_REQUEST['dcontact'];
					
					$where=array("id"=>$id);
					$res=$this->delete_where('contact',$where);
					if($res)
					{
					echo "<script>
							alert('contact Delete Success !');
							window.location='manage_contact'
						</script>";
					}
				}

				if(isset($_REQUEST['dblog'])) 
				{
					$id=$_REQUEST['dblog'];
					
					$where=array("id"=>$id);
					$res=$this->delete_where('blog',$where);
					if($res)
					{
					echo "<script>
							alert('blog Delete Success !');
							window.location='manage_blog'
						</script>";
					}
				}

				if(isset($_REQUEST['dteam'])) 
				{
					$id=$_REQUEST['dteam'];
					
					$where=array("id"=>$id);
					$res=$this->delete_where('team',$where);
					if($res)
					{
					echo "<script>
							alert('Team Delete Success !');
							window.location='manage_team'
						</script>";
					}
				}
			
				if(isset($_REQUEST['duser'])) 
				{
					$id=$_REQUEST['duser'];
					
					$where=array("id"=>$id);
					$res=$this->delete_where('user',$where);
					if($res)
					{
					echo "<script>
							alert('User Delete Success !');
							window.location='manage_user'
						</script>";
					}
				}

//====================================================================================================================================

				
			case '/edit_blog':

				if(isset($_REQUEST['editblog'])) 
				{
					$id=$_REQUEST['editblog'];
					
					$where=array("id"=>$id);
					$res=$this->select_where('blog',$where);
					$fetch=$res->fetch_object();
					
					if(isset($_REQUEST['save']))
					{
						$name = $_REQUEST['name'];
						$description = $_REQUEST['description'];
						if($_FILES['img']['size']>0)
						{
							// get old_img name
							$old_img=$fetch->img;
							
							$img=$_FILES['img']['name'];	
							$path = 'upload/blog/' . $img;
							$tmp_file = $_FILES['img']['tmp_name'];
							move_uploaded_file($tmp_file, $path);
	
							$data = array("name" => $name,"img" => $img, "description" => $description);
	
							$res=$this->update_where('blog',$data,$where);
							if($res)
							{
								unlink('upload/blog/'.$old_img);
								echo "<script>
									alert('Blog Update Success !');
									window.location='manage_blog';
								</script>";
							}
							
						}
						else
						{
							$data = array("name" => $name, "description" => $description);
							$res=$this->update_where('blog',$data,$where);
							if($res)
							{
								echo "<script>
									alert('blog Update Success !');
									window.location='manage_blog';
								</script>";
							}
						}
						
					}
					
				}
				include_once('edit_blog.php');
				break;

				//===================================
			case '/edit_project':

				if(isset($_REQUEST['editproject'])) 
				{
					$id=$_REQUEST['editproject'];
					
					$where=array("id"=>$id);
					$res=$this->select_where('project',$where);
					$fetch=$res->fetch_object();
					
					if(isset($_REQUEST['save']))
					{
						$title = $_REQUEST['title'];
						$status = $_REQUEST['status'];
						if($_FILES['img']['size']>0)
						{
							// get old_img name
							$old_img=$fetch->img;
							
							$img=$_FILES['img']['name'];	
							$path = 'upload/project/' . $img;
							$tmp_file = $_FILES['img']['tmp_name'];
							move_uploaded_file($tmp_file, $path);
	
							$data = array("title" => $title,"img" => $img, "status" => $status);
	
							$res=$this->update_where('project',$data,$where);
							if($res)
							{
								unlink('upload/project/'.$old_img);
								echo "<script>
									alert('Project Update Success !');
									window.location='manage_projects';
								</script>";
							}
							
						}
						else
						{
							$data = array("title" => $title, "status" => $status);
							$res=$this->update_where('project',$data,$where);
							if($res)
							{
								echo "<script>
									alert('project Update Success !');
									window.location='manage_projects';
								</script>";
							}
						}
						
					}
					
				}
				include_once('edit_projects.php');
				break;

				//========================================

				case '/edit_services':

					if(isset($_REQUEST['editservice'])) 
					{
						$id=$_REQUEST['editservice'];
						
						$where=array("id"=>$id);
						$res=$this->select_where('service',$where);
						$fetch=$res->fetch_object();
						
						if(isset($_REQUEST['save']))
						{
							$name = $_REQUEST['name'];
							$description = $_REQUEST['description'];
							if($_FILES['img']['size']>0)
							{
								// get old_img name
								$old_img=$fetch->img;
								
								$img=$_FILES['img']['name'];	
								$path = 'upload/service/' . $img;
								$tmp_file = $_FILES['img']['tmp_name'];
								move_uploaded_file($tmp_file, $path);
		
								$data = array("name" => $name,"img" => $img, "description" => $description);
		
								$res=$this->update_where('service',$data,$where);
								if($res)
								{
									unlink('upload/service/'.$old_img);
									echo "<script>
										alert('service Update Success !');
										window.location='manage_services';
									</script>";
								}
							}
							else
							{
								$data = array("name" => $name, "description" => $description);
								$res=$this->update_where('manage_services',$data,$where);
								if($res)
								{
									echo "<script>
										alert('Categories Update Success !');
										window.location='manage_services';
									</script>";
								}
							}
							
						}
						
					}
					include_once('edit_services.php');
					break;
	

				//=============================================================

				case '/edit_team':

					if(isset($_REQUEST['editteam'])) 
					{
						$id=$_REQUEST['editteam'];
						
						$where=array("id"=>$id);
						$res=$this->select_where('team',$where);
						$fetch=$res->fetch_object();
						
						if(isset($_REQUEST['save']))
						{
							$name = $_REQUEST['name'];
							$designation = $_REQUEST['designation'];
							if($_FILES['img']['size']>0)
							{
								// get old_img name
								$old_img=$fetch->img;
								
								$img=$_FILES['img']['name'];	
								$path = 'upload/team/' . $img;
								$tmp_file = $_FILES['img']['tmp_name'];
								move_uploaded_file($tmp_file, $path);
		
								$data = array("name" => $name,"img" => $img, "designation" => $designation);
		
								$res=$this->update_where('team',$data,$where);
								if($res)
								{
									unlink('upload/team/'.$old_img);
									echo "<script>
										alert('Team Update Success !');
										window.location='manage_team';
									</script>";
								}
								
							}
							else
							{
								$data = array("name" => $name, "designation" => $designation);
								$res=$this->update_where('team',$data,$where);
								if($res)
								{
									echo "<script>
										alert('Team Update Success !');
										window.location='manage_team';
									</script>";
								}
							}
							
						}
						
					}
					include_once('edit_team.php');
					break;
	
					//========================================================

					case '/edit_user':
						if(isset($_REQUEST['edituser'])) 
							{
								$id=$_REQUEST['edituser'];
								
								$where=array("id"=>$id);
								$res=$this->select_where('user',$where);
								$fetch=$res->fetch_object();
								
								if(isset($_REQUEST['save']))
								{
									$name = $_REQUEST['name'];
									$email = $_REQUEST['email'];
									$mobile = $_REQUEST['mobile'];

									$_SESSION['uname']=$name;

									if($_FILES['img']['size']>0)
									{
										// get old_img name
										$old_img=$fetch->img;
										
										$img=$_FILES['img']['name'];	
										$path = 'upload/user/' . $img;
										$tmp_file = $_FILES['img']['tmp_name'];
										move_uploaded_file($tmp_file, $path);
				
										$data = array("title" => $title,"img" => $img, "email" => $email, "mobile" =>$mobile);
				
										$res=$this->update_where('user',$data,$where);
										if($res)
										{
											unlink('upload/user/'.$old_img);
											echo "<script>
												alert('user Update Success !');
												window.location='manage_user';
											</script>";
										}
										
									}
									else
									{
										$data = array("name" => $name, "email" => $email, "mobile" =>$mobile);
										$res=$this->update_where('user',$data,$where);
										if($res)
										{
											echo "<script>
												alert('user Update Success !');
												window.location='manage_user';
											</script>";
										}
									}
									
								}
								
							}
							include_once('edit_user.php');
						break;
			
			
						case '/status':
							if(isset($_REQUEST['status_user'])) 
							{
								$id=$_REQUEST['status_user'];
								
								$where=array("id"=>$id);
								
								// get data 
								$resdata=$this->select_where('user',$where);
								$fetch=$resdata->fetch_object();
								$status=$fetch->status;
								if($status=="Block")
								{
									$data = array("status" => "Unblock");
				
									$res=$this->update_where('user',$data,$where);
									if($res)
									{
										echo "<script>
											alert('User Unblock Success!');
											window.location='manage_user';
										</script>";
									}
								}
								else
								{
									$data = array("status" => "Block");
				
									$res=$this->update_where('user',$data,$where);
									if($res)
									{
										unset($_SESSION['uid']);
										unset($_SESSION['uname']);
										echo "<script>
											alert('User Block Success!');
											window.location='manage_user';
										</script>";
									}
								}
								
								
								
							}
							break;
			
			default:
			echo "<h1 style='color:red;text-align:center'> Page Not Found </h1>";
			break;
			
		}
		
	}
}
$obj=new control;

?>