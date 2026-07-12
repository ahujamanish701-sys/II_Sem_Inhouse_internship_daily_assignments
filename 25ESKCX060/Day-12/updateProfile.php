<?php
session_start();
include("db_connect.php");

// Check if user is logged in
if (!isset($_SESSION['user_email'])) {
    header("Location: login.php");
    exit();
}

$email = $_SESSION['user_email'];

// Fetch current user details
$query = "SELECT * FROM user WHERE email='$email'";
$result = mysqli_query($conn, $query);

if (!$result || mysqli_num_rows($result) == 0) {
    die("User not found.");
}

$user = mysqli_fetch_assoc($result);

// Update Profile
if (isset($_POST['update'])) {

    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $newEmail = mysqli_real_escape_string($conn, $_POST['email']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);

    // Default profile photo
  $photoName="";
    // Upload new photo if selected
    if (!empty($_FILES['photo']['name'])) {

        $photoName = time() . "_" . basename($_FILES['photo']['name']);

        $target = "uploads/" . $photoName;

        move_uploaded_file($_FILES['photo']['tmp_name'], $target);
    }
    
    // Update database
    $update = "UPDATE user SET
                name='$name',
                email='$newEmail',
                phone='$phone',
                profile_photo='$photoName'
                WHERE email='$email'";

    if (mysqli_query($conn, $update)) {

        $_SESSION['user_email'] = $newEmail;

        echo "<script>
                alert('Profile Updated Successfully');
                window.location='home.php';
              </script>";

        exit();
    }
    else{
        echo "<script>alert('Update Failed');</script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Update Profile</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<style>

body{
    background:linear-gradient(to right,#4facfe,#00f2fe);
    font-family:Arial, sans-serif;
}

.card{
    width:500px;
    margin:40px auto;
    border-radius:15px;
    padding:20px;
}

.profile-image{
    width:130px;
    height:130px;
    border-radius:50%;
    object-fit:cover;
    border:4px solid #0d6efd;
}

</style>

</head>

<body>

<div class="container">

<div class="card shadow">

<h2 class="text-center mb-4">
Update Profile
</h2>

<form method="POST" enctype="multipart/form-data">

<div class="text-center mb-3">

<?php
if(!empty($user['profile_photo'])){
?>

<img src="uploads/<?php echo $user['profile_photo']; ?>"
class="profile-image">

<?php
}else{
?>

<img src="https://via.placeholder.com/130"
class="profile-image">

<?php
}
?>

</div>

<div class="mb-3">

<label class="form-label">
Profile Photo
</label>

<input type="file"
name="photo"
class="form-control"
accept="image/*">

</div>

<div class="mb-3">

<label class="form-label">
Full Name
</label>

<input type="text"
name="name"
class="form-control"
value="<?php echo $user['name']; ?>"
required>

</div>

<div class="mb-3">

<label class="form-label">
Email
</label>

<input type="email"
name="email"
class="form-control"
value="<?php echo $user['email']; ?>"
required>

</div>

<div class="mb-3">

<label class="form-label">
Phone Number
</label>

<input type="text"
name="phone"
class="form-control" maxlength="10"
pattern="[0-9]{10}"
title="Enter a valid 10-digit phone number"
required
value="<?php echo $user['phone']; ?>"
 >

</div>

<div class="d-grid gap-2">

<button type="submit"
name="update"
class="btn btn-primary btn-lg">

Update Profile

</button>

<a href="home.php"
class="btn btn-secondary btn-lg">

Back to Home

</a>

</div>

</form>

</div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
