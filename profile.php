<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.html");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Profile</title>

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
</style>

</head>

<body>

<div class="box">

<h2>User Profile</h2>

<p><b>Username:</b>
<?php echo $_SESSION['username']; ?>
</p>

</div>

</body>
</html>