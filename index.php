<?php
session_start();
?>
<form method="post">
        Email: <input type="text" name="email"><br>
        Password: <input type="password" name="password"><br>
        <input type="submit" value="Login">
</form>

<?php
// MySQL database connection code
$host = "localhost";
$username = "root";
$password = "";
$database = "jett";

$connection = new mysqli('localhost', 'root', '', 'jett');

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

// Get user input from the form
$email = $_POST['email'];
$password = $_POST['password'];

// Query the database to check if the email and password are correct
$query = "SELECT * FROM mainreg WHERE username='$email' AND password='$password'";
$result = $connection->query($query);

if ($result->num_rows == 1) {

    header("location: https://hr2010.github.io/jetforms.in/");
    exit();
} 
else {
    echo "Login failed!"; // User not found or password doesn't match
}

$connection->close();
?>
