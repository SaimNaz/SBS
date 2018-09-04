<?php
	session_start();
	
	
	if (isset($_SESSION['users_email'])) {
     header ("Location: ../dc/myhome.php");
	}
	
	
	require_once('database_connectivity.php');
	$error = "";
	
	if (isset($_POST['login-button'])) {
		if (isset($_POST['user_email']) && isset($_POST['user_password'])) {
			$user_email = $_POST['user_email'];
			$user_password = $_POST['user_password'];
			$user_password = md5($user_password);
			
			//echo "<script>alert('".$user_email."')</script>";
			if (!filter_var($user_email, FILTER_VALIDATE_EMAIL)) {
				$error .= "E-mail is not proper<br>";
				//echo "<script>alert('".$error."')</script>";
			}

			if (!$error) {
				$query = "SELECT * FROM userdatabase where users_email = :users_email";
				if ($stmt = $con->prepare($query)) {
					$stmt-> bindParam(':users_email', $user_email, PDO::PARAM_STR);
					$stmt -> execute();
					if ($stmt -> rowCount() == 1) {
						//echo "<script>alert('herer')</script>";
						$all_data_row = $stmt -> fetchAll();
						if ($all_data_row[0]['users_password'] == $user_password) {
							$_SESSION['users_email'] = $user_email;
							header('location: ../dc/myhome.php');
						} else {
							$error .= "Password is incorrect<br>";
						}
						//echo "<script>console.log('".$all_data_row[0]['users_password']." value ')</script>";
					} else {
						$error .= "E-mail/Password incorrect!!<br>"; 
					}
				}
			} 
		} 
	}
?>


<!DOCTYPE html>
<html lang="en" >
	<head>
		<meta charset="UTF-8">
		<title>Login</title>
		<link rel="stylesheet" href="../css/style.css">
		<!-- Bootstrap -->
  <link href="../css/bootstrap.min.css" rel="stylesheet">
  <link href="../css/style.css" rel="stylesheet" />
  <link rel="icon" href="../images/backup.png">
	</head>
	<body>
	 <header>
    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
      <div class="navigation">
        <div class="container">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse.collapse">
							<span class="sr-only">Toggle navigation</span>
						
						</button>
            <div class="navbar-brand">
               <a href="../index.php"><h1><span>Secure </span>Software<span> BackUp</span></h1></a>
            </div>
          </div>

          <div class="navbar-collapse collapse">
            <div class="menu">
              <ul class="nav nav-tabs" role="tablist">
                <li role="presentation"><a href="../index.php" class="active">Home</a></li>
                <li role="presentation"><a href="../about.php">About Us</a></li>
                <li role="presentation"><a href="sign_in_user.php">SignUp/Login</a></li>
                <li role="presentation"><a href="../contact.php">Contact</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </nav>
  </header>

		<div class="wrapper">
			<div class="contain">
				<h1>Welcome</h1>		
				<form class="form" method="post" action="<?= $_SERVER['PHP_SELF']?>" role="form" id="sign_in_user">
					<input type="email" placeholder="E-mail" name="user_email" id="user_email" required="required">
					<input type="password" placeholder="Password" name="user_password" id="user_password" required="required">
					<button type="submit" id="login-button" name="login-button">Login</button>
				</form>
				<div class="register_link">Not a user ?? <a href="sign_up_user.php">REGISTER</a></div>
				<span style="color: red">
					<?php
						if($error) {
							echo $error;
						}
					?>
				</span>
			</div>
			
			<ul class="bg-bubbles">
				<li></li>
				<li></li>
				<li></li>
				<li></li>
				<li></li>
				<li></li>
				<li></li>
				<li></li>
				<li></li>
				<li></li>
			</ul>
		</div>
		<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    	
    	<script  src="../js/index.js"></script>
  
  
  <footer style="margin-top:800px">
    <div class="footer">
         <div class="copyright">
            &copy; Secure Software BackUp System. All Rights Reserved.
          </div> 
        <div class="pull-right">
        <a href="#home" class="scrollup"><i class="fa fa-angle-up fa-3x"></i></a>
      </div>
    </div>
  </footer>


  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="../js/jquery-2.1.1.min.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="../js/bootstrap.min.js"></script>
  <script src="../js/jquery.prettyPhoto.js"></script>
  <script src="../js/jquery.isotope.min.js"></script>
  <script src="../js/wow.min.js"></script>
  <script src="../js/functions.js"></script>
	</body>
</html>
