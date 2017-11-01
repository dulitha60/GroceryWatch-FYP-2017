<?php

    session_start();

    $username = "";
    $email    = "";
    $errors = array(); 
    $_SESSION['success'] = "";




    // connect to database
$db = mysqli_connect('localhost', 'root', 'rootroot', 'registration');


//if the register button is clicked
if(isset($_POST['register'])){
    $username = mysqli_real_escape_string($_POST['username']);
    $email = mysqli_real_escape_string($_POST['email']);
    $password_1 = mysqli_real_escape_string($_POST['password_1']);
	$password_2 = mysqli_real_escape_string($_POST['password_2']);
    
    //ensure that form fields are filled properly
    if (empty($username)) { 
        array_push($errors, "Username is required"); //add error to error array
    }
    if (empty($email)) { 
        array_push($errors, "Email is required");
    }
    if (empty($password_1)) { 
        array_push($errors, "Password is required"); 
    }
    
    if ($password_1 != $password_2) {
		array_push($errors, "The two passwords do not match");
	}
    
    //if there no errors, save user to database
    if (count($errors) == 0) {
		$password = md5($password_1);//encrypt the password before storing in the database (security)
		$sql = "INSERT INTO users (username, email, password) 
				  VALUES('$username', '$email', '$password')";
        
        mysqli_query($db, $sql);
        $_SESSION['username'] = $username;
		$_SESSION['success'] = "You are now logged in";
		header('location: index.php');

    }

    
    
}

?>