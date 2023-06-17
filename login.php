<?php
session_start();
//-- Page hide korar jonno
if (empty($_SESSION['user_name'])) {

//database connection----!	
$server = "localhost";
$username="root";
$pass="";
$db = "library_management";
$conn= mysqli_connect($server,$username,$pass,$db); 
//--------------
//-------- Login start---------
$login_show_sql = "SELECT * FROM tbl_user WHERE user_id=2";
$login_show_sql_run = mysqli_query($conn,$login_show_sql);
$logind_data = mysqli_fetch_assoc($login_show_sql_run);
 $db_user = $logind_data['user_name'];
 $db_email = $logind_data['user_email'];
 $db_contact = $logind_data['user_contact'];
 $db_pass = $logind_data['user_pass'];
?>
<!DOCTYPE html>
<head>
<meta charset="utf-8">
<title>Login Library Management System</title>
    <link rel="stylesheet" type="text/css" href="css/stylelogin.css" media="screen" />
</head>
<body>
<div class="container">
	<section id="content">		
			<h1>Admin Login</h1>
			<?php 
				 if(isset($_POST['submit'])){
				 	$user = $_POST['username'];
				 	$pass = $_POST['password'];

				 	if ($user==$db_user AND $pass==$db_pass) {
				 		header("location:index.php");
				 		$_SESSION['login'] = true;
				 		$_SESSION['user_name'] = $db_user;
				 		$_SESSION['user_email'] = $db_email;
				 		$_SESSION['msg']="Successfully LogIn.";

				 	}elseif($user!==$db_user OR $pass!==$db_pass){
				 		echo("<b style='color:red;'>Username Or Password Don't Match.</b>");
				 	}else{header("location:login");}
				 }
			?>
			<form action="login.php" method="POST">							
			<div>
				<input type="text" placeholder="Username" required="" name="username"/>
			</div>
			<div>
				<input type="password" placeholder="Password" required="" name="password"/>
			</div>
			<div>
				<input type="submit" name="submit" value="Log in" />
			</div>
		</form><!-- form -->
		<div class="button">
			<a href="http://www.mpi.edu.bd">Mymensingh Polytechnic Institute</a>
		</div><!-- button -->
	</section><!-- content -->
</div><!-- container -->
</body>
</html>
<?php }else{header("location:index.php");}?>