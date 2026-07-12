<?php
include("header.php");
include("checkRegisterationError.php");
?>


<div class="container mt-5" style="max-width:500px;" >
<form action="" method="post">
<h3 class="mb-3">Register</h3>

<input type="text" class="form-control mb-3" name="name" placeholder="Enter your Name" value="<?= $name?>">
<input type="email" class="form-control mb-3"  name="email" placeholder="Enter your Email" value="<?= $email?>">

<input type="password" class="form-control mb-3" name="password" placeholder="Enter your password" value="<?= $password?>">

<input type="password" class="form-control mb-3" name="confirmpassword" placeholder="Confirm your password" value="<?= $confirmpassword?>">


<button class="btn btn-primary w-100">Register</button> 
        
</form>
            
</div>
<?php
include("footer.php");
?>


