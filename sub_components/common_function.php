<?php
    require_once('database_connectivity.php');
    $delete_id = isset($_GET['delete_no']) ? $_GET['delete_no'] : "";
    //echo "<script>alert('jfhdksjf".$delete_id."')</script>";
    //for deleting stuff
    if ($delete_id) {
        try {
            
            $stmt = $con->prepare("DELETE FROM usersupload WHERE sno=?");
            $stmt ->bindParam(1, $delete_id);
            $stmt ->execute();
            
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        header('location: user_dashboard.php');
        return;
    }
?>