<!-- Name : Saima Naz, Ariba Tariq -->

<?php
	session_start();
	if (isset($_SESSION['users_email'])) {
     header ("Location: ./dc/myhome.php");
	}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>Secure BackUp Software System</title>

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
              <a href="index.php"><h1><span>Secure </span>BackUp<span> Software</span></h1></a>
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

  <section id="main-slider" class="no-margin">
    <div class="carousel slide">
      <div class="carousel-inner">
        <div class="item active" style="background-image:url(images/iStock.jpg); height:600px;">
          <div class="container">
            <div class="row slide-margin">
              <div class="col-sm-6">
                <div class="carousel-content">
                  <h2 class="animation animated-item-1" style="font-size:35px; line-height:1.2;">Welcome to <span>Secure Backup Software System</span></h2>
                  <p class="animation animated-item-2" style="line-height:1.5; color:#666666">A place where you can store files, documents, images, videos in a secured manner.</p>
                  <a class="btn-slide animation animated-item-3" href="about.php" style="font-size:16px">Read More</a>
                </div>
              </div>

            </div>
          </div>
        </div>
        <!--/.item-->
      </div>
      <!--/.carousel-inner-->
    </div>
    <!--/.carousel-->
  </section>
  <!--/#main-slider-->

  <div class="feature">
    <div class="container">
      <div class="text-center">
        <div class="col-md-3">
          <div class="hi-icon-wrap hi-icon-effect wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms">
            <i class="fa fa-book"></i>
            <h2>All Files At One Place</h2>
            <p>Keep all your files at one place.</p>
          </div>
        </div>
        <div class="col-md-3">
          <div class="hi-icon-wrap hi-icon-effect wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
            <i class="fa fa-laptop"></i>
            <h2>Authorized Login</h2>
            <p>You can only access your files if you are authorized.</p>
          </div>
        </div>
        <div class="col-md-3">
          <div class="hi-icon-wrap hi-icon-effect wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="900ms">
            <i class="fa fa-heart-o"></i>
            <h2>Easy To Use</h2>
            <p>You can simply upload and download your files.</p>
          </div>
        </div>
        <div class="col-md-3">
          <div class="hi-icon-wrap hi-icon-effect wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="1200ms">
            <i class="fa fa-cloud"></i>
            <h2>Secure Backup</h2>
            <p>All your files are encrypted for security purpose.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <section id="conatcat-info">
    <div class="container">
      <div class="row">
        <div class="col-sm-8">
          <div class="media contact-info wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
            <div class="pull-left">
              <i class="fa fa-phone"></i>
            </div>
            <div class="media-body">
              <h2>Have a question?</h2>
              <p>Feel free to contact us at +91 98765 43210</p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--/.container-->
  </section>
  <!--/#contact-info-->

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
