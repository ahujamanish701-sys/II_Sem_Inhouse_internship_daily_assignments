<!DOCTYPE html>
<html>
<head>
    <title>Login</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

<div class="container mt-5" style="max-width:500px;">

<h2 class="mb-3">Login</h2>

<form action="checkLogin.php" method="POST">

<input type="email"
class="form-control mb-3"
name="email"
placeholder="Enter your Email"
required>

<input type="password"
class="form-control mb-3"
name="password"
placeholder="Enter your Password"
required>

<button class="btn btn-primary w-100">
Login
</button>

</form>

</div>

</body>
</html>
