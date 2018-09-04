<?php
try {
    $db_host = '127.0.0.1'; 
    $db_name = 'cloudstorage'; 
    $db_user = 'root';
    $user_pw = '';  
    $con = new PDO('mysql:host='.$db_host.'; dbname='.$db_name, $db_user, $user_pw);  
    $con->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION ); 
} catch (PDOException $err) {  
    echo "harmless error message if the connection fails";
    die(); 
}
?>