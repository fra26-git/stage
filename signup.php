  <?php
include "db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") { 
 $firstname = $_POST['firstname'];
 $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
$check = "SELECT * FROM users WHERE firstname='$firstname'";
$result = $conn->query($check);

if ($result->num_rows > 0) {
    
    echo "frstname already taken! <a href='signup.html'>Try another</a>";
} else {
   
    $sql = "INSERT INTO users (firstname, password)
            VALUES ('$firstname', '$password')";

    if ($conn->query($sql) === TRUE) {
        echo "Signup successful! ";
    } else {
        echo "Error: " . $conn->error;
    }

}

$conn->close();
}

?>
