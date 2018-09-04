<?php
    require_once('database_connectivity.php');
    session_start();
    $show_page = "";
    if ($_SESSION['users_email']) {
        $show_page = true;
    } else  {
        header('location: sign_in_user.php');
    }

    if (isset($_POST['submit_button'])) {
        //storing all data into respective variable
        $file =  $_FILES['upload_file'];
        $fileName = $file['name'];
        $fileType = $file['type'];
        $fileSize = $file['size'];
        $filePath = $file['tmp_name'];
        //Restriction to the file type.
        //if ($fileName !== "" && ($fileType == "image/jpg" || $fileType == "image/gif" || $fileType == "image/png") && $fileSize <= 640000) {
        if (move_uploaded_file($filePath, "../uploads/".$fileName)) {
            try {
                $user_email = $_SESSION['users_email'];
                $query = "INSERT INTO usersupload (uploads, serialNum, uploadType, uploadName) VALUES ('$fileName','$user_email','$fileType','$fileName')";
                $er = $con->exec($query);
            } catch (PDOException $e) {
                echo $e->getMessage()." Error";
            }
        }
    }
?>
<?php 
    if ($show_page) :
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
		<link rel="stylesheet" href="../css/style.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"/>
        
        <title>Dashboard</title>
		
				<!-- Bootstrap -->
				<link href="../css/bootstrap.min.css" rel="stylesheet">
				<link href="../css/style.css" rel="stylesheet" />
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
						   <a href="../index.html"><h1><span>Secure </span>Software<span> BackUp</span></h1></a>
						</div>
					  </div>

					  <div class="navbar-collapse collapse">
						<div class="menu">
						  <ul class="nav nav-tabs" role="tablist">
							<li role="presentation"><a href="../index.html" class="active">Home</a></li>
							<li role="presentation"><a href="../about.html">About Us</a></li>
							<li role="presentation"><a href="index.php">SignUp/Login</a></li>
							<li role="presentation"><a href="../contact.html">Contact</a></li>
						  </ul>
						</div>
					  </div>
					</div>
				  </div>
				</nav>
			 </header>
	
        <div class="jumbotron main_container_user_dashboard">
			 </br></br></br></br></br>
            <div class="container">
                <div class="row">
                    <div class="col-xl-4">
                        <div class="card" style="width: 20rem;">
                            <img class="card-img-top" src="../images/a.jpg" alt="Card image cap">
                            <div class="card-body p-1">
                                <h5 class="card-title text-center"><?= explode("@", $_SESSION['users_email'])[0] ?></h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-8">
                        <div class="row">
                            <div class="h2 col-xl-9">Welcome to the storage server.</div>
                            <div class="col-xl-1 ml-auto">
                                <button type="button" class="btn btn-outline-dark" data-toggle="modal" name="logout_button" id="logout_button" data-target="#exampleModal">Log Out</button>
                            </div>
                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Log Out</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        Are you sure want to LOGOUT?
                                    </div>
                                    <div class="modal-footer">
                                        <a href="user_dashboard.php?logout=1" class="btn btn-secondary">Yes</a>
                                        <?php
                                            error_reporting(0);
                                            if ($_GET['logout']) {
                                                sleep(2);
                                                session_destroy();
                                                unset($_SESSION['users_email']);
                                                header('location: sign_in_user.php');                                   
                                            }
                                        ?>
                                        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                                    </div>
                                    </div>
                                </div>
                            </div>                            
                        </div>
                        <div class="h3 pt-5">E-mail: <?= $_SESSION['users_email'] ?></div>
                        <div class="h3">Authorized as <?= explode("@", $_SESSION['users_email'])[0] ?></div>
                        <form role="form" method="post" action="<?= $_SERVER['PHP_SELF']?>" enctype="multipart/form-data">
                            <div class="form-group pt-4">
                                <input type="file" class="form-control-file" name="upload_file" id="upload_file" required="required"/>
                            </div>
                            <div class="row col-xl-1 ml-xl-auto">
                                <button type="submit" class="btn btn-outline-dark" name="submit_button" id="submit_button">Upload File</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="container-fluid bg-warning p-4 pl-lg-5 mt-5">
                <div class="row ml-auto">
                    <div class="col-lg-12">
                    <?php
                        $user_email = $_SESSION['users_email'];
                        $queryGetAll = "SELECT * FROM usersupload WHERE serialNum='$user_email' ORDER BY sno DESC";
                        $stmt = $con->query($queryGetAll);
                        if ($stmt->rowCount() > 0) {
                            echo "<div class='card-columns'>";
                            foreach ($stmt as $row) {
                                $text=$row["serialNum"];
                                $image = $row['uploads'];
                                $type = $row['uploadType'];
                                $name = $row['uploadName'];                        
                                if ($type == 'image/jpeg' || $type == 'image/jpg' || $type == 'image/png' || $type == 'image/gif') {
                                    ?>
                                    <div class="m-1">
                                        <div class="card" style="width: 15rem">
                                            <a href="../uploads/<?=$image?>" target="_blank" class="btn btn-outline-dark">
                                                <img class="card-img-top p-1" src="../uploads/<?=$image?>" alt="Card image cap">
                                            </a>
                                            <div class="card-body">
                                                <h5 class="card-title"><?=$text.$type.$name?></h5>
                                            </div>                                 
                                            <div class="card-footer">
                                                <a href="view.php?sno=<?=$row['sno']?>" class="btn btn-outline-dark">Download</a>
                                                <a href="common_function.php?delete_no=<?=$row['sno']?>" class="btn btn-outline-dark">Remove</a>
                                            </div>
                                        </div>
                                    </div>
                                <?php
                                } else if ($type == 'video/mp4' || $type == 'video/webm' || $type == 'video/ogg' || $type == 'video/x-flv') {
                                    ?>
                                        
                                            <div class="   m-1">
                                                <div class="card" style="width: 16rem;">
                                                <a href="../uploads/<?= $image?>"  target="_blank">
                                                    <video class="card-img-top" width="auto" height="auto" controls>
                                                        <source src="../uploads/<?= $image?>" type="video/webm">
                                                        <source src="../uploads/<?= $image?>" type="video/mp4">
                                                        Sorry, your browser doesn\'t support the video element.
                                                    </video>
                                                    <div class="card-body">
                                                        <h5 class="card-title"><?= $name ?></h5>
                                                    </div>
                                                </a>
                                                <div class="card-footer">
                                                    <a href="view.php?sno=<?= $row['sno']?>" class="btn btn-outline-dark">Download</a>
                                                    <a href="common_function.php?delete_no=<?=$row['sno']?>" class="btn btn-outline-dark">Remove</a>  
                                                </div>
                                                </div>
                                            </div>
                                        
                                    <?php
                                } else if ($type == 'audio/mpeg' || $type == 'audio/ogg' || $type == 'audio/wav' || $type == 'audio/mp3') {
                                    ?>
                                        
                                            <div class="   m-1">
                                                <div class="card" style="width: 23rem;">
                                                <a href="../uploads/<?= $image ?>"  target="_blank">
                                                    <audio class="card-img-top" controls>
                                                        <source src="../uploads/<?= $image ?>" type="audio/mpeg">
                                                        Sorry, your browser does not support the audio element.
                                                    </audio>
                                                    <div class="card-body">
                                                        <h5 class="card-title"><?= $name ?></h5>
                                                    </div>
                                                </a>
                                                <div class="card-footer">
                                                    <a href="view.php?sno=<?= $row['sno']?>" class="btn btn-outline-dark">Download</a>
                                                    <a href="common_function.php?delete_no=<?=$row['sno']?>" class="btn btn-outline-dark">Remove</a>  
                                                </div>
                                                </div>
                                            </div>
                                        

                                    <?php
                                } else if ($type == 'application/x-zip-compressed') {
                                    ?>
                                    <div class="m-1">
                                        <div class="card" style="width: 15rem;">
                                            <a href="../uploads/<?= $image ?>">
                                                <img class="card-img-top w-75 pl-2" src="../Images/zipFileImage.png" alt="Preview un-available"/>
                                                <div class="card-body">
                                                    <h5 class="card-title"><?= $name ?></h5>
                                                </div>
                                            </a>
                                            <div class="card-footer">
                                                <a href="view.php?sno=<?= $row['sno']?>" class="btn btn-outline-dark">Download</a>
                                                <a href="common_function.php?delete_no=<?=$row['sno']?>" class="btn btn-outline-dark">Remove</a>  
                                            </div>        
                                        </div>     
                                    </div>
                                    
                                    <?php
                                } else if ($type == 'application/pdf') {
                                    ?>
                                    <div class="   m-1">
                                        <div class="card" style="width: 16rem">
                                            <a href="../uploads/<?= $image ?>"  target="_blank">
                                                <img class="card-img-top w-75 pl-2" src="../Images/pdf.png" alt="Preview un-available"/>
                                                <div class="card-body">
                                                    <h5 class="card-title"><?= $name ?></h5>
                                                </div>
                                            </a>    
                                            <div class="card-footer">
                                                <a href="view.php?sno=<?= $row['sno']?>" class="btn btn-outline-dark">Download</a>
                                                <a href="common_function.php?delete_no=<?=$row['sno']?>" class="btn btn-outline-dark">Remove</a>    
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                } else if (strpos($type, 'text') == 0) {
                                    ?>
                                    <div class="   m-1">
                                        <div class="card" style="width: 15rem;">
                                            <a href="../uploads/<?= $image ?>"  target="_blank">
                                                <img class="card-img-top w-75 pl-2" src="../Images/text.png" alt="Preview un-available"/>
                                                <div class="card-body">
                                                    <h5 class="card-title"><?= $name ?></h5>
                                                </div>
                                            </a>
                                            <div class="card-footer">
                                                <a href="view.php?sno=<?= $row['sno']?>" class="btn btn-outline-dark">Download</a>
                                                <a data-toggle="modal" href="" class="btn btn-outline-dark">Remove</a>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <?php
                                } else {
                                    ?>
                                    
                                        <div class="   m-1">
                                            <div class="card" style="width: 15rem;">
                                            <a href="../uploads/<?= $image ?>"  target="_blank">
                                                <img class="card-img-top w-75 pl-2" src=".." alt="Preview un-available"/>
                                                <div class="card-body">
                                                    <h5 class="card-title"><?= $name ?></h5>
                                                </div>
                                            </a>
                                            <div class="card-footer">
                                                <a href="view.php?sno=<?= $row['sno']?>" class="btn btn-outline-dark">Download</a>
                                                <a data-toggle="modal" href="" class="btn btn-outline-dark">Remove</a>
                                            </div>

                                            </div>
                                        </div>
                                    
                                    <?php
                                    
                                }
                                ?>
  
                            <?php
                            }
                            echo '</div>';

                        }
                        
                    ?>
                    </div>      
                </div>
            </div>
        </div>
    </body>

    <div class="modal fade" id="delete_item" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <?="sss". $_GET['item'] ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
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

<footer style="margin-top:10px">
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

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</html>
<?php
    endif;
?>