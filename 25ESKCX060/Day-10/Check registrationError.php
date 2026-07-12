<?php
include("db_connect.php");
$error = "";

if($_SERVER["REQUEST_METHOD"]=="POST"){

$name = mysqli_real_escape_string($conn, $_POST["name"]);
$email = mysqli_real_escape_string($conn, $_POST["email"]);
$password =  mysqli_real_escape_string($conn, $_POST["password"]);
$confirmpassword =  mysqli_real_escape_string($conn, $_POST["confirmpassword"]);



if( $name== "" || $email == "" || $password == "" || $confirmpassword == ""  ){
    $error = "All fields are required.";
    echo $error;
}else if(strlen($password) < 8){
    echo "Password must be at least 8 characters long.";
}

else if(!preg_match('/[A-Z]/', $password)){
    echo "Password must contain at least one uppercase letter.";
}

else if(!preg_match('/[a-z]/', $password)){
    echo "Password must contain at least one lowercase letter.";
}

else if(!preg_match('/[0-9]/', $password)){
    echo "Password must contain at least one number.";
}

else if($password != $confirmpassword){
  
    echo "Passwords do not match.";
}
else{
    $insertQuery = "Insert into user(name,email,password) values('$name','$email','$password')";

    $result=mysqli_query($conn,$insertQuery);

    if($result){
        header("Location: success.php");
    }else{
        echo "ERROR occured while storing data";
        echo "ERROR:" . mysqli_error($conn);
        exit();
        }
        
    
}   
}
?>
