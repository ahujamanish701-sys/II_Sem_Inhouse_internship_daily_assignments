g<?php

include('db_connection.php');

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';
    $phone = $_POST['phoneNumber'] ?? '';
    $dob = $_POST['dob'] ?? '';
    $gender = $_POST['gender'] ?? '';
    $branch = $_POST['branch'] ?? '';
    $sql = "INSERT INTO `skit` (`sn`, `name`, `email`, `phone`, `dob`, `gender`, `branch`) VALUES (NULL, '$name', '$email', '$phone', '$dob', '$gender', '$branch')";
    if (mysqli_query($conn, $sql)) {
        echo "New record created successfully";
    } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }}

$name = $_POST['name'] ?? '';
$email = $_POST['email'] ?? '';
$phone = $_POST['phoneNumber'] ?? '';
$dob = $_POST['dob'] ?? '';
$gender = $_POST['gender'] ?? '';
$branch = $_POST['branch'] ?? '';

$errors = [];
$success = "";
echo $branch . "<br>";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
$name = trim($_POST['name'] ?? '');
$email = trim($_POST['email'] ?? '');
$phone = trim($_POST['phone'] ?? '');
$dob = trim($_POST['dob'] ?? '');
$gender = trim($_POST['gender'] ?? '');
$branch = trim($_POST['branch'] ?? '');
// Name: required only
if ($name === '') {
 $errors['name'] = 'Name is required.';
 echo "Name is required.<br>";
}
 // Email: required only
 if ($email === '') {
$errors['email'] = 'Email is required.';
 echo "Email is required.<br>";
}
// Phone: required only
//if ($phone === '') {  
//$errors['phone'] = 'Phone number is required.';
//echo "Phone number is required.<br>";
//}
//dob: required only
if ($dob === '') {
    $errors['dob'] = 'Date of birth is required.';
    echo "Date of birth is required.<br>";
}
//gender: required only
if ($gender === '') {
    $errors['gender'] = '  Gender is required.';
    echo "Gender is required.<br>";
}

if ($branch === '') {
    $errors['branch'] = 'Branch is required.';
    echo "Branch is required.<br>";
}

if (empty($errors)) {
$success = 'Form submitted successfully.';
// Further processing (save to DB, send email, etc.) goes here
}
}
$sql = "INSERT INTO `skit` (`sn`, `name`, `email`, `phone`, `dob`, `gender`, `branch`) VALUES (NULL, '$name', '$email', '$phone', '$dob', '$gender', '$branch')";
if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
} else {
echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

$folder="uploads/";
if(isset($_FILES['myfile'])){
    mkdir($folder, 07/77, true);
}
if(isset($_FILES['file'])) {
    $allowed_ext = array('jpg', 'jpeg', 'png', 'gif');
    //pathinfo(file["name"])
    $extension = strtolower(pathinfo($_FILES['myfile']['name'], PATHINFO_EXTENSION));
   //20 MB
   $maxsize = 20 * 1024 * 1024; // 20 MB in bytes
    if (!in_array($extension, $allowed_ext)) {
        echo "Invalid file type. Only JPG, JPEG, PNG, and GIF are allowed.";
    } elseif ($_FILES['myfile']['size'] > $maxsize) {
        echo "File size exceeds the limit of 20MB.";
    } else {
        move_uploaded_file($_FILES['myfile']['tmp_name'], $folder . $_FILES['myfile']['name']);
        echo "File uploaded successfully.";
    }
if(!in_array($extension, $allowedTypes)) {
echo "Error: Only JPG, PNG, GIF, and PDF files are allowed.";
} elseif ($_FILES['myfile']['size'] > $maxSize) {
echo "Error: File size exceeds the 2MB limit.";
} else {
$newFileName = uniqid() . '.' . $extension;
$destination = $folderPath . $newFileName;
if (move_uploaded_file($_FILES['myfile']['tmp_name'], $destination)) {
echo "File uploaded successfully: " . $newFileName;
} else {
echo "Error uploading file.";
}
}
}
