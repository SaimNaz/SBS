<?php
	session_start();
	require_once("database_connectivity.php");
	$error = "";
	if (isset($_POST['user_login_button'])) {
	    $uname = " ";
		$users_email = "";
		$user_password = "";
		$user_confirm_password = "";
		sleep(4);

		if (!isset($_POST['user_email_text']) && !isset($_POST['user_password']) && !isset($_POST['user_confirm_password']) && !isset($_POST['uname'])) {
			echo "<script>alert('No value')</script>";
		} else {
		    $uname = $_POST['uname'];
			$users_email = $_POST['user_email_text'];
			$user_password = $_POST['user_password'];
			$user_confirm_password = $_POST['user_confirm_password'];
			$zip_password = $_POST['zip_password'];
		
			if (!($user_password == $user_confirm_password)) {
				$error .= "Password is different.<br>";
			}

			if (!filter_var($users_email, FILTER_VALIDATE_EMAIL)) {
				$error .= "E-mail is not valid.<br>";
			}

			if ((strlen($user_password) < 6) && (strlen($user_confirm_password) < 6)) {
				$error .= "Please enter more than 6 digit password.<br>";
			}

			//echo "<script>alert('".$error." error ')</script>";

			if (!$error) {
				$user_password = md5($user_password);				
				$query = "SELECT users_email FROM userdatabase WHERE users_email = :usersemail";
				$stmt = $con -> prepare($query);
				$stmt -> bindParam(':usersemail', $users_email, PDO::PARAM_STR);
				if ($stmt-> execute()) {
					if ($stmt -> rowCount() >= 1) {
						echo "<script>alert('User already exists')</script>";
					} else {
						//echo "<script>alert('row count failed')</script>";
						$query_insert = "INSERT INTO userdatabase (users_name, users_email, users_password, users_zippassword) VALUES (:uname, :users_email, :users_password, :users_zippassword)";
						$stmt_insert = $con-> prepare($query_insert);
						$stmt_insert -> bindParam(':uname', $uname, PDO::PARAM_STR);
						$stmt_insert -> bindParam(':users_email', $users_email, PDO::PARAM_STR);
						$stmt_insert -> bindParam(':users_password', $user_password, PDO::PARAM_STR);
						$stmt_insert -> bindParam(':users_zippassword', $zip_password, PDO::PARAM_STR);
						if ($stmt_insert -> execute()) {
							//echo "<script>alert('Value inserted')</script>";
							$_SESSION['users_email'] = $users_email;
							header('location: ../dc/myhome.php');
						}
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
		<title>Sign Up</title>
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
				<h1>Create an account</h1>		
				<form class="form" role="form" id="user_signup_form" method="post" action="<?= $_SERVER['PHP_SELF'] ?>">
					<input type="text" name="uname" id="uname" placeholder="User Name" required="required"/>
					<input type="email" name="user_email_text" id="user_email_text" placeholder="E-mail" required="required"/>
					<input type="password" name="user_password" id="user_password" placeholder="Password" required="required"/>
                    <input type="password" name="user_confirm_password" id="user_confirm_password" placeholder="Confirm Password" required="required"/>
					<input type="password" name="zip_password" id="zip_password" placeholder="Zip Password" required="required"/>
					<button type="submit" name="user_login_button" id="user_login_button">Sign Up</button>
                </form>
                <div class="register_link">Already a user ?? <a href="sign_in_user.php">SIGN IN</a></div>
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
