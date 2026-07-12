<?php 
include("header.php"); 
include ("dashboardVerticalContent.php");
include ("checkUpdateError.php");
?>

<div class = "container mt-5" style ="max-width:400px;" >
<form action = "" method = "post">
<h3 class = "mb-3">Update Password</h3>
<input type = "password" name = "current_password" class = "form-control mb-3" placeholder = "Current Password" required>
<input type = "password" name = "new_password" class = "form-control mb-3" placeholder = "New Password" required>
<input type = "password" name = "confirm_new_password" class = "form-control mb-3" placeholder = "Confirm New Password" required>
<button type = "submit" class = "btn btn-primary">Update Password</button>
</form>
</div>

<?php include("footer.php"); ?>
