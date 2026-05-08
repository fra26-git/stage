<?php
session_start();
include "db.php";

if (!isset($_SESSION['username'])) {
    header("Location: login.html");
    exit();
}

if (isset($_POST['change'])) {

    $newpassword = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $username = $_SESSION['username'];

    $sql = "UPDATE users 
            SET password='$newpassword' 
            WHERE username='$username'";

    if ($conn->query($sql) === TRUE) {

        echo "Password changed successfully!";

    } else {

        echo "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Settings</title>

<style>
body{
    font-family: Arial;
    background:#f4f6f9;
    padding:40px;
}

.box{
    background:white;
    padding:30px;
    width:400px;
    margin:auto;
    border-radius:10px;
}

input{
    width:100%;
    padding:10px;
    margin:10px 0;
}

button{
    padding:10px;
    width:100%;
    background:#2c3e50;
    color:white;
    border:none;
}
</style>

</head>

<body>

<div class="box">

<h2>Change Password</h2>

<form method="POST">

<input type="password" 
name="password" 
placeholder="New Password" required>

<button type="submit" name="change">
Change Password
</button>

</form>

</div>

</body>
</html>