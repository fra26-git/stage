<?php
session_start();
include "db.php";

if (!isset($_SESSION['username'])) {
    header("Location: login.html");
    exit();
}

$username = $_SESSION['username'];

if (isset($_POST['change'])) {

    $oldpassword = $_POST['oldpassword'];

    $newpassword = $_POST['newpassword'];

    $confirmpassword = $_POST['confirmpassword'];

    // Get current user
    $sql = "SELECT * FROM users 
            WHERE username='$username'";

    $result = $conn->query($sql);

    $user = $result->fetch_assoc();

    // Verify old password
    if (!password_verify($oldpassword, $user['password'])) {

        echo "<p style='color:red;'>
        Wrong current password!
        </p>";

    }

    // Check confirm password
    elseif ($newpassword != $confirmpassword) {

        echo "<p style='color:red;'>
        New passwords do not match!
        </p>";

    }

    // Strong password validation
    elseif (
        strlen($newpassword) < 8 ||
        !preg_match("/[A-Z]/", $newpassword) ||
        !preg_match("/[a-z]/", $newpassword) ||
        !preg_match("/[0-9]/", $newpassword)
    ) {

        echo "<p style='color:red;'>
        Password must contain:
        uppercase, lowercase, number, 8+ characters
        </p>";

    }

    else {

        // Encrypt new password
        $hashed = password_hash($newpassword, PASSWORD_DEFAULT);

        // Update password
        $update = "UPDATE users 
                   SET password='$hashed'
                   WHERE username='$username'";

        if ($conn->query($update) === TRUE) {

            echo "<p style='color:green;'>
            Password changed successfully!
            </p>";

        } else {

            echo "Error: " . $conn->error;
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>

<title>Settings</title>

<style>

body{
    background: #467868;
    font-family:Arial;
}

.box{
    width:400px;
    margin:50px auto;
    background:white;
    padding:30px;
    border-radius:10px;
}

input{
    width:100%;
    padding:12px;
    margin:10px 0;
}

button{
    width:100%;
    padding:12px;
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

    <!-- Verify old password -->
    <input type="password"
    name="oldpassword"
    placeholder="Current Password"
    required>

    <!-- New password -->
    <input type="password"
    name="newpassword"
    placeholder="New Password"
    required>

    
    <input type="password"
    name="confirmpassword"
    placeholder="Confirm New Password"
    required>

    <button type="submit" name="change">
        Change Password
    </button>

</form>

</div>

</body>
</html>