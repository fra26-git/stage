<?php
echo "PHP is working!";
?>


<?php
include "db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $username = $_POST['username'];

    $plain_password = $_POST['password'];

    
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

    // Encrypt password
    $password = password_hash($plain_password, PASSWORD_DEFAULT);

    // Check email
    $check = "SELECT * FROM users WHERE email='$email'";
    $result = $conn->query($check);

    if ($result->num_rows > 0) {

        echo "Email already taken!
        <a href='signup.html'>Try another</a>";

    } else {

        $sql = "INSERT INTO users
        (firstname, lastname, email, username, password)
        VALUES
        ('$firstname', '$lastname', '$email', '$username', '$password')";

        if ($conn->query($sql) === TRUE) {

            echo "Signup successful!";

        } else {

            echo "Error: " . $conn->error;
        }
    }

    $conn->close();
}
?>