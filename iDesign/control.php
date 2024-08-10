

<?php

include_once('../Admin/model.php'); // 1 step : load model in control
class control extends model     // 2 step extends(inherit) model class
{
	// auto call magic function  only make clsss object 
	function __construct()
	{
		session_start();

		model::__construct(); // 3 step call model __construct for database connectivity 
		
		$url=$_SERVER['PATH_INFO']; // PATH urldecode
		
		switch($url)
		{
			case '/home':
				$project=$this->select('project');
				$team=$this->select('team');
				$blog=$this->select('blog');
				$service=$this->select('service');
			include_once('index.php');
			break;
			
			case '/about':
			$team=$this->select('team');
			include_once('about.php');
			break;
			
			case '/service':
			$service=$this->select('service');
			include_once('service.php');
			break;
			
			case '/view_service':
				include_once('view_service.php');
				break;
				
			case '/project':
			$project=$this->select('project');
			include_once('project.php');
			break;
			
			case '/blog':
			$blog=$this->select('blog');
			include_once('blog.php');
			break;
			
			case '/contact':
				if (isset($_REQUEST['submit'])) {

					$name = $_REQUEST['name'];
					$email = $_REQUEST['email'];
					$message = $_REQUEST['message'];

					$data = array("name" => $name, "email" => $email, "message" => $message);

					$res=$this->insert('contact',$data);
					if($res)
					{
						echo "<script>
							alert('contact Success !');
						</script>";
					}
				}	
			include_once('contact.php');
			break;
			
			case '/signup':
				if (isset($_REQUEST['submit'])) {
					$name = $_REQUEST['name'];
					$password = md5($_REQUEST['password']);
					$img = $_FILES['img']['name'];
					// image upload in project folder
					$path = '../admin/upload/user/' . $img;
					$tmp_file = $_FILES['img']['tmp_name'];
					move_uploaded_file($tmp_file, $path);

					$email = $_REQUEST['email'];
					$mobile = $_REQUEST['mobile'];

					$data = array("name" => $name, "password" => $password, "img" => $img,  "email" => $email, "mobile" => $mobile);

					$res=$this->insert('user',$data);
					if($res)
					{
						echo "<script>
							alert('user Success !');
						</script>";
					}
				}	
			include_once('signup.php');
			break;
			
			case '/login':
				if (isset($_REQUEST['submit'])) {
					
					$email = $_REQUEST['email'];
					$password = md5($_REQUEST['password']); // pass encripted 
					
					$where = array("email" => $email, "password" => $password);
					$res=$this->select_where('user',$where);
					$chk=$res->num_rows; // 0 means false & 1 means true  check row wise condition
					
					if($chk==1)
					{
						$data=$res->fetch_object(); // single data fetch 
						if($data->status=="Unblock")
							{
								$_SESSION['uname']=$data->name;
								$_SESSION['uid']=$data->id;
								
								echo "<script>
									alert('Login Success !');
									window.location='home'
								</script>";
							}
							else
							{
								echo "<script>
									alert('Your Account Blocked so Contacts us !');
									window.location='home'
								</script>";
							}
					}
					else
					{
						echo "<script>
							alert('Login Failed due to wrong credential!');
						</script>";
					}
				}
			include_once('login.php');
			break;
			
			case '/profile':
				$where=array("id"=>$_SESSION['uid']);
				$res=$this->select_where('user',$where);
				$fetch=$res->fetch_object();
				
				include_once('profile.php');
				break;
				
				case '/user_logout':
					unset($_SESSION['uid']);
					unset($_SESSION['uname']);
					echo "<script>
							alert('Logout Success !');
							window.location='home'
						</script>";
				break;

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
											window.location='profile';
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
											window.location='profile';
										</script>";
									}
								}
								
							}
							
						}
						include_once('edit_user.php');
					break;
		

			default:
			echo "<h1 style='color:red;text-align:center'> Page Not Found </h1>";
			break;
			
			}
		
		
			}
}
$obj=new control;

?>