<?php

include "db.php";

$fname      = $_POST["fname"];
$lname      = $_POST["lname"];
$email      = $_POST["email"];
$password   = $_POST["password"];
$repassword = $_POST["repassword"];
$mobile     = $_POST["mobile"];
$address1   = $_POST["address1"];
$address2   = $_POST["address2"];
$name = "/^[A-Z][a-zA-z ]+$/";
$emailValidation = "/^[_a-z0-9]+(\.[_a-z0-9-])*@[a-z0-9]+(\.[a-z]{2,4})$/";
$number = "/^[0-9]+$/";    

//if(empty($fname) || empty($lname) || empty($email) || empty($password) || empty($repassword) || empty($mobile) || empty($address1) || empty($address2))
//{
//    echo "
//        <div class='alert alert-warning' role='alert' >
//  <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b><strong>Please fill allthe fields</strong></b>
//            </div>
//    ";
//    exit();
//}else
//{
    if(!preg_match($name,$fname)){
        echo "<div class='alert alert-danger' role='alert' >$fname is not valid</div>";
        exit();
    }
    if(!preg_match($name,$lname)){
        echo "<div class='alert alert-danger' role='alert' >$lname is not valid</div>";
        exit();
    }

    if(!preg_match($emailValidation,$email)){
        echo "<div class='alert alert-danger' role='alert' >$email is not valid</div>";
        exit();
    }

    if(strlen($password) < 9)
    {
        echo "Your password is weak";
        exit();
    }

    if(strlen($repassword) < 9)
    {
        echo "Your password is weak";
        exit();
    }
    if($password != $repassword)
    {
        echo "Your password is not the same";
        exit();
    }

    if(!preg_match($number,$mobile)){
        echo "<div class='alert alert-danger' role='alert' >$mobile is not valid</div>";
        exit();
    }

    if(strlen($mobile) != 10){
        echo "<div class='alert alert-danger' role='alert' >$mobile Your Mobile number should have 10 digits</div>";
        exit();
    }   
//}


$sql = "SELECT user_id FROM user_info WHERE email = '$email' LIMIT 1";
$check_query = mysqli_query($con,$sql);
$count_email = mysqli_num_rows($check_query);

if($count_email > 0){
    echo  "<div class='alert alert-warning' role='alert' >
            <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b><strong>This Email Address is already taken, try another one.</strong></b>
           </div>";
    exit();
}else{
    $password   = md5($password);
    $sql = "INSERT INTO `user_info` (`user_id`, `first_name`, `last_name`, `email`, `password`, `mobile`, `address1`, `address2`)  
    VALUES (NULL, '$fname', '$lname', '$email', '$password', '$mobile', '$address1', '$address2')";
    
    $run_query = mysqli_query($con,$sql);

    if($run_query){
         echo "<div class='alert alert-success' role='alert' >
            <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b><strong>You are successfully Registerd.</strong></b>
           </div>";
        
        
    }
}


?>