<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>About Us</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<style>

body{
background:#f5f5f5;
font-family:Arial, Helvetica, sans-serif;
}

.about{
margin-top:70px;
}

img{
border-radius:15px;
}

footer{
background:#222;
color:white;
padding:15px;
margin-top:50px;
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


<div class="container about">

<div class="row">

<div class="col-md-6">

<img src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f?w=700"
class="img-fluid shadow">

</div>

<div class="col-md-6">

<h2>About Us</h2>

<p>
Welcome to our website. This project has been developed using PHP,
MySQL, HTML, CSS and Bootstrap.
</p>

<p>
Our aim is to provide a secure user authentication system with
Registration, Login, Password Update and Home Page features.
</p>

<p>
This project demonstrates form validation, database connectivity,
responsive web design and secure user management.
</p>

<h4>Technologies Used</h4>

<ul>

<li>PHP</li>

<li>MySQL</li>

<li>HTML5</li>

<li>CSS3</li>

<li>Bootstrap 5</li>

<li>JavaScript</li>

</ul>

</div>

</div>

</div>

<footer class="bg-dark text-white text-center py-3 mt-5">
    <p class="mb-0">&copy; <?php echo date("Y"); ?> MY Website. All Rights Reserved.</p>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
