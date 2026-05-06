  <?php
include "db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
$check = "SELECT * FROM users WHERE username='$username'";
$result = $conn->query($check);

if ($result->num_rows > 0) {
    
    echo "Username already taken! <a href='signup.html'>Try another</a>";
} else {
    $sql = "INSERT INTO users (username, password)
            VALUES ('$username', '$password')";

    if ($conn->query($sql) === TRUE) {
        echo "Signup successful! ";
    } else {
        echo "Error: " . $conn->error;
    }
}

$conn->close();
}

?>
