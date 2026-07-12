<?php
echo '
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Password Updated Successfully</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body{
            background: linear-gradient(135deg,#4facfe,#00f2fe);
            height:100vh;
            display:flex;
            justify-content:center;
            align-items:center;
            font-family:Arial,sans-serif;
        }

        .box{
            background:white;
            padding:40px;
            border-radius:20px;
            box-shadow:0 10px 25px rgba(0,0,0,0.2);
            text-align:center;
            width:420px;
        }

        .icon{
            font-size:70px;
            color:green;
        }

        h2{
            color:green;
            margin-top:15px;
        }

        p{
            color:#555;
            font-size:18px;
        }

        .btn{
            margin-top:20px;
        }
    </style>
</head>

<body>

<div class="box">
    <div class="icon">✔</div>

    <h2>Password Updated Successfully!</h2>

    <p>Your password has been changed successfully.<br>
    Please use your new password the next time you log in.</p>

    <a href="login.php" class="btn btn-success">Go to Login</a>
</div>

</body>
</html>
';
?>
