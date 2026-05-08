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
<meta charset="UTF-8">
<title>Dashboard</title>
<style>
    body{
        background: #1ca5b8;
     }
.topbar{
    background: #768;;
    padding:15px 20px;
    display:flex;
    justify-content:space-between;
    align-items:center;
    box-shadow:0 2px 5px rgba(0,0,0,0.1);
}

.user-menu{
    position:relative;
    display:flex;
    align-items:center;
    cursor:pointer;
}

.top-img{
    width:40px;
    height:40px;
    border-radius:50%;
    margin-right:10px;
    object-fit:cover;
}

.dropdown{
    display:none;
    position:absolute;
    top:50px;
    right:0;
    background:white;
    width:150px;
    box-shadow:0 2px 10px rgba(0,0,0,0.2);
    border-radius:5px;
}

.dropdown a{
    display:block;
    padding:12px;
    text-decoration:none;
    color:black;
}

.dropdown a:hover{
    background:#f4f6f9;
}
</style>
</head>

<body>
    <script>

function toggleMenu() {

    let menu = document.getElementById("dropdown");

    if (menu.style.display === "block") {

        menu.style.display = "none";

    } else {

        menu.style.display = "block";
    }
}

</script>
<div class="sidebar">
    <h2>MyApp</h2>
    
  
</div>

<div class="main">

    
     <div class="topbar">

    <h3>Dashboard</h3>

    <div class="user-menu">

        <img src="images/user.png" class="top-img">

        <span onclick="toggleMenu()">
            <?php echo $_SESSION['username']; ?>
        </span>

        <div class="dropdown" id="dropdown">

            <a href="profile.php">Profile</a>

            <a href="settings.php">Settings</a>

            <a href="logout.php">Logout</a>

        </div>

    </div>

</div>  
    </div>

    <?php if (isset($_GET['success'])) { ?>
        <div class="alert">Login successful!</div>
    <?php } ?>

    
    <div class="content">
        <h2>Welcome</h2>
        <p>This is your dashboard. You are successfully logged in.</p>

        <br>

       
        <div class="cards">

            <div class="card">
                <h3>Quick Info</h3>
                <p>You can add your content here.</p>
            </div>

            <div class="card">
                <h3>Messages</h3>
                <p>You have new messages.</p>
            </div>

            <div class="card">
                <h3>Profile</h3>
                <p>Update your profile here.</p>
            </div>

        </div>
    </div>

</div>

</body>
</html>