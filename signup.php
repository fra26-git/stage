<?php
include "db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $firstname = trim($_POST['firstname']);
    $lastname = trim($_POST['lastname']);
    $email = trim($_POST['email']);
    $username = trim($_POST['username']);

    $plain_password = $_POST['password'];

    
    if (!preg_match("/^[a-zA-Z]+$/", $firstname)) {
        die("Firstname must contain text only!");
    }

    if (!preg_match("/^[a-zA-Z]+$/", $lastname)) {
        die("Lastname must contain text only!");
    }


    if (!preg_match("/^[a-zA-Z]+$/", $username)) {
        die("Username must contain text only!");
    }

   
    if (
        strlen($plain_password) < 8 ||
        !preg_match("/[A-Z]/", $plain_password) ||
        !preg_match("/[a-z]/", $plain_password) ||
        !preg_match("/[0-9]/", $plain_password)
    ) {

        die("Password must contain:
        - At least 8 characters
        - One uppercase letter
        - One lowercase letter
        - One number");
    }

   
    $password = password_hash($plain_password, PASSWORD_DEFAULT);

   
    $check = "SELECT * FROM users 
              WHERE email='$email' 
              OR username='$username'";

    $result = $conn->query($check);

    if ($result->num_rows > 0) {

        echo "Email or Username already taken!";

    } else {

        $sql = "INSERT INTO users
        (firstname, lastname, email, username, password)
        VALUES
        ('$firstname', '$lastname', '$email', '$username', '$password')";

        if ($conn->query($sql) === TRUE) {
       header("Location: login.html");
exit();
           

        } else {

            echo "Error: " . $conn->error;
        }
    }

    $conn->close();
}
?>