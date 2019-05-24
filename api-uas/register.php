<?php

include_once 'koneksi.php';

$response = array("error" => FALSE);

if (isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password'])) {
 $username = htmlspecialchars($_POST['username']);
 $email = htmlspecialchar($_POST['email']);
 $password = htmlspecialchars($_POST['password']);
 
 $encrypted_password = hash("sha256", $password);// encrypted password
    
    $sql = $MySQLiconn->query("SELECT email from user WHERE email = '$email'");

    if(mysqli_num_rows($sql) > 0) {
  $response["error"] = TRUE;
        $response["message"] = "User already existed";

        echo json_encode($response);
    }else{
     $sql = $MySQLiconn->query("INSERT INTO users(username, email, password, tanggal) VALUES('$username', '$email', '$encrypted_password', NOW())"); 

     if($sql) {
         $response["error"] = FALSE;
         $response["message"] = "Register Successfull";

   echo json_encode($response);
     } else {
      $response["error"] = TRUE;
         $response["message"] = "Register Failure";

   echo json_encode($response);
     }  
 
    }
    
}
?>