<?php
	session_start();
	if (isset($_SESSION['users_email'])) {
     header ("Location: ./dc/myhome.php");
	}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>About Us</title>

  <!-- Bootstrap -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="css/font-awesome.min.css">
  <link rel="stylesheet" href="css/animate.css">
  <link href="css/prettyPhoto.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet" />
  <link rel="icon" href="images/backup.png">
</head>

<body>
  <header>
    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
      <div class="navigation">
        <div class="container">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse.collapse">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
            <div class="navbar-brand">
               <a href="index.php"><h1><span>Secure </span> BackUp<span> Software</span></h1></a>
            </div>
          </div>

          <div class="navbar-collapse collapse">
            <div class="menu">
              <ul class="nav nav-tabs" role="tablist">
                <li role="presentation"><a href="index.php" class="active">Home</a></li>
                <li role="presentation"><a href="about.php">About Us</a></li>
                <li role="presentation"><a href="sub_components/sign_in_user.php">SignUp/Login</a></li>
                <li role="presentation"><a href="contact.php">Contact</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </nav>
  </header>

  <div class="aboutus">
    <div class="container">
      <h2 style="margin-top:50px; color:#333366; font-family:'viner hand ITC';">Information About US</h2>
      <hr>
      <div class="col-md-7 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms">
        <img src="images/7.jpg" class="img-responsive">
        <h3 style="color:#333366; font-family:'viner hand ITC';">We Keep Your Files Safe!!</h3>
        <p>Using Secure Backup System, you can store files, documents, images, videos in a secured manner. You can store documents
and files in any format which is kept in a separate folder. </p>
        <p>The stored folder is only accessible to the authorized users who can access the folder. If the user is found to be unauthorized by the admin, then admin can delete
a user.</p>
      </div>
      <div class="col-md-5 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
        <div class="skill">
          <h2 style="color:#333366; font-family:'viner hand ITC';">Your Files are Secure!!</h2>
          <p>You can upload, delete or download your file. All your files are password protected and only accessible to you.</p>

          <div class="progress-wrap">
            
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="our-team">
    <div class="container">
      <h3 style="color:#333366; font-family:'viner hand ITC';">Our Team</h3>
      <div class="text-center">
        <div class="col-md-4 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms">
          <img src="images/services/1.jpg" alt="">
          <h4>Ariba Tariq</h4>
          <p>M.Tech (SW), MNNIT Allahabad</p>
        </div>
        <div class="col-md-4 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
          <img src="images/services/2.jpg" alt="">
          <h4>Saima Naz</h4>
          <p>M.Tech (IS), MNNIT Allahabad</p>
        </div>
        <!--<div class="col-md-4 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="900ms">
          <img src="images/services/3.jpg" alt="">
          <h4>John Doe</h4>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing eil sed deiusmod tempor</p>
        </div>-->
      </div>
    </div>
  </div>

  <footer>
    <div class="footer">
     
          
		  <div class="copyright">
            &copy; Secure BackUp Software System. All Rights Reserved.
          </div> 
      
      <div class="pull-right">
        <a href="#home" class="scrollup"><i class="fa fa-angle-up fa-3x"></i></a>
      </div>
    </div>
  </footer>

  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="js/jquery-2.1.1.min.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.prettyPhoto.js"></script>
  <script src="js/jquery.isotope.min.js"></script>
  <script src="js/wow.min.js"></script>
  <script src="js/functions.js"></script>

</body>

</html>
