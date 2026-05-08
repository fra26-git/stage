<?php
session_start();
include "db.php";

$username = $_SESSION['username'];

if (isset($_FILES['image'])) {

    $image = $_FILES['image']['name'];

    $tmp = $_FILES['image']['tmp_name'];

    $path = "uploads/" . $image;

    move_uploaded_file($tmp, $path);

    $sql = "UPDATE users
            SET profile_image='$path'
            WHERE username='$username'";

    if ($conn->query($sql) === TRUE) {

        $_SESSION['profile_image'] = $path;

        header("Location: dashboard.php");

    } else {

        echo "Upload failed!";
    }
}
?>