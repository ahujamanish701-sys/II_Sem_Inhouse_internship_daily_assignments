<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Home</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<style>

body{
    background:linear-gradient(to right,#4facfe,#00f2fe);
    font-family:Arial, Helvetica, sans-serif;
}

.navbar{
    box-shadow:0 5px 10px rgba(0,0,0,0.2);
}

.hero{
    margin-top:70px;
}

.card{
    transition:.3s;
}

.card:hover{
    transform:translateY(-10px);
}

footer{
    background:#222;
    color:white;
    padding:15px;
    margin-top:60px;
}

</style>

</head>

<body>

<header class="bg-light border-bottom">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center py-3">

            <nav>
                <ul class="nav">
                    <li class="nav-item">
                        <a href="home.php" class="nav-link text-dark">Home</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link text-dark" href="aboutus.php">About us</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link text-dark" href="contact.php">Contact us</a>
                    </li>
                </ui>
             </nav>
            <a href="logout.php" class="btn btn-outline-danger bnt-sm">Logout</a>
        </div>
    </div>

</header>



<div class="container hero">

<div class="text-center text-white">

<h1>Welcome to Our Website</h1>

<p class="lead">
You have successfully logged in.
Explore our website and learn more about us.
</p>

</div>

<div class="row mt-5">

<div class="col-md-4">

<div class="card shadow p-3">

<h3>Easy Login</h3>

<p>
Secure login system with email and password verification.
</p>

</div>

</div>

<div class="col-md-4">

<div class="card shadow p-3">

<h3>User Friendly</h3>

<p>
Simple and attractive interface developed using PHP, HTML, CSS and Bootstrap.
</p>

</div>

</div>

<div class="col-md-4">

<div class="card shadow p-3">

<h3>Secure Database</h3>

<p>
Your account information is stored safely in the MySQL database.
</p>

</div>

</div>

</div>

</div>

<footer class="bg-dark text-white text-center py-3 mt-5">
    <p class="mb-0">&copy; <?php echo date("Y"); ?> MY Website. All Rights Reserved.</p>
</footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
