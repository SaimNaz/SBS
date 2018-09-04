<?php
    require_once('database_connectivity.php');
    $sno = isset($_GET['sno']) ? $_GET['sno'] : "";
    //for direct downloading any stuff
    if ($sno) {
        //echo "<script>alert('jfhdksjf".$sno."')</script>";    
        $stat = $con->prepare("SELECT * FROM usersupload WHERE sno=?");
        $stat->bindParam(1, $sno);
        $stat->execute();
        $row = $stat->fetch();
        if (file_exists("../uploads/".$row['uploads'])) {
            header('Content-Disposition: attachment; filename=../uploads/'.$row['uploadName']);
            header("Content-Type:application/octet-stream");
            header('Content-length='.filesize("../uploads/".$row['uploads']));
            //echo "<script>console.log(../uploads/".$row['uploadType'].")</script>";
            readfile("../uploads/".$row['uploads']);
        }    
        return;
    }

    // $delete_id = isset($_GET['delete_no']) ? $_GET['delete_no'] : "";
    // echo "<script>alert('jfhdksjf".$delete_id."')</script>";
    // //for deleting stuff
    // if ($delete_id) {
    //     //echo "<script>alert('upload yes')</script>";
    //     try {
    //         $stmt = $con->prepare("DELETE FROM usersupload WHERE sno=?");
    //         $stmt ->bindParam(1, $delete_id);
    //         $stmt ->execute();
    //     } catch (PDOException $e) {
    //         echo $e->getMessage();
    //     }
    //     echo "<a href='user_dashboard.php'></a>";
    //     return;
    // }
?>