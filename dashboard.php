<?php
session_start();


if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Dashboard</title>

<style>
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: Arial, sans-serif;
    display: flex;
    background: white;
}


.sidebar {
    width: 230px;
    height: 100vh;
    background: #2c3e50;
    color: white;
    position: fixed;
}

.sidebar h2 {
    text-align: center;
    padding: 20px;
    border-bottom: 1px solid #444;
}

.sidebar a {
    display: block;
    padding: 12px 20px;
    color: white;
    text-decoration: none;
}

.sidebar a:hover {
    background: #34495e;
}


.main {
    margin-left: 230px;
    width: 100%;
    
    color: #34495e;
}

.topbar {
    background: lightblue;
    color: #34495e; 
    padding: 15px 20px;
    display: flex;
    justify-content: space-between;
    box-shadow: 0 2px 5px rgba(0,0,0,0.1);
}

.alert {
    color: rgb(90, 24, 212);
    padding: 12px;
    margin: 20px;
    border-radius: 5px;
}


.content {
    padding: 20px;
    background:  #4756;
}


.cards {
    display: flex;
    gap: 20px;
    flex-wrap: wrap;
 

      
}

.card {
    background: #666;
    padding: 20px;
    flex: 1;
    min-width: 250px;
    border-radius: 10px;
    box-shadow: 0 2px 8px rgba(0,0,0,0.1);
}
@media (max-width: 768px) {
    .sidebar {
        position: relative;
        width: 100%;
        height: auto;
    }

    .main {
        margin-left: 0;
    }

    .cards {
        flex-direction: column;
        background:;
    }
}
</style>
</head>

<body>
<div class="sidebar">
    <h2>MyApp</h2>
    <a href="#">Dashboard</a>
    <a href="#">Profile</a>
    <a href="#">Messages</a>
    <a href="#">Settings</a>
    <a href="logout.php">Logout</a>
</div>

<div class="main">

    <div class="topbar">
        <h3>Dashboard</h3>
        <span>Welcome, <?php echo $_SESSION['username']; ?></span>
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