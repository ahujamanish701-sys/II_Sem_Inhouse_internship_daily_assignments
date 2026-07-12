<?php
include("../dashboardheader.php");
include("../db_connect.php");
?>

<style>
    th,td{
        border: 3px solid black;
        border-collapse: collapse;
        padding: 6px;
    }

    </style>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-3">
            <a href="updatePassword.php" style="text-decoration:none"> Update Password </a>
            <br>
            <a href="updateProfile.php" style="text-decoration:none"> Update Profile </a>
        </div>
        <div class="col-md-9">
            <h2>Manage Users</h2>


<table border="2" style="border-collapse: collapse">
<tr>
<th>Name</th>
<th>Email</th>
<th>Role</th>
</tr>

<?php 

$selectQuery = "SELECT * FROM user";
$result = mysqli_query($conn,$selectQuery);
$user = mysqli_fetch_all($result);

if($user){
    
    for($i=0; $i<count($user);$i++){
        echo "<tr>
        <td> " . $user[$i][1] . "</td>
        <td> " . $user[$i][2] . "</td>
        <td> " . $user[$i][4] . "</td>
        </tr>";
    }

}else{
    echo "ERROR";
}


?>
</table>
<?php
include("../dashboardfooter.php");
include("../footer.php");
?>
