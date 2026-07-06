<!DOCTYPE html>
<html>
<head>
    <title>Simple Validation Form</title>
</head>
<body>

<h2>Student Registration</h2>

<?php
$errors = [];

if(isset($_POST['submit']))
{
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    // Email Validation
    if(!filter_var($email, FILTER_VALIDATE_EMAIL))
    {
        $errors[] = "Please enter a valid email address.";
    }

    // Phone Validation
    if(!is_numeric($phone))
    {
        $errors[] = "Phone number should contain only digits.";
    }
    else if(strlen($phone) < 10)
    {
        $errors[] = "Phone number is too short.";
    }
    else if(strlen($phone) > 10)
    {
        $errors[] = "Phone number is too long.";
    }

    // Display Success
    if(empty($errors))
    {
        echo "<h3 style='color:green;'>Form Submitted Successfully!</h3>";
    }
}
?>

<!-- Display Errors -->
<?php
if(!empty($errors))
{
    echo "<ul style='color:red;'>";
    foreach($errors as $error)
    {
        echo "<li>$error</li>";
    }
    echo "</ul>";
}
?>

<form method="post">

    Email:<br>
    <input type="text" name="email"><br><br>

    Phone:<br>
    <input type="text" name="phone"><br><br>

    <input type="submit" name="submit" value="Submit">

</form>

</body>
</html>
