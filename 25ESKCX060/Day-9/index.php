<!DOCTYPE html>
<html>
<head>

<title>Registration Successful</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body style="background:#eef2f7;">

<div class="container mt-5">

<div class="card shadow">

<div class="card-header bg-success text-white">

<h3>Registration Details</h3>

</div>

<div class="card-body">

    <div class="card text-center shadow mt-4">
    <div class="card-body">
        <h2 class="text-success">🎉 Registration Successful!</h2>
        <p>Thank you for registering. Your information has been received successfully.</p>
    </div>
</div>

<p><b>Name:</b> <?php echo $_POST['name']; ?></p>

<p><b>Phone:</b> <?php echo $_POST['phone']; ?></p>

<p><b>Email:</b> <?php echo $_POST['email']; ?></p>

<p><b>Date of Birth:</b> <?php echo $_POST['dob']; ?></p>

<p><b>Country:</b> <?php echo $_POST['country']; ?></p>

<p><b>Course:</b> <?php echo $_POST['course']; ?></p>

<p><b>Gender:</b> <?php echo $_POST['gender']; ?></p>

<p><b>Address:</b> <?php echo $_POST['address']; ?></p>

<div class= "text-center mt-4">
<a href="index.html" class="btn btn-primary">Register Another Student</a>
</div>
</div>

</div>

</div>

</body>
</html>
