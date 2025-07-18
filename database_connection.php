<?php
// adapted from https://www.geeksforgeeks.org/php/how-to-insert-form-data-into-database-using-php/

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "users";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Collect and sanitize form data
$first_name = mysqli_real_escape_string($conn, $_POST['fname']);
$last_name = mysqli_real_escape_string($conn, $_POST['lname']);

// Insert data into database
$sql = "INSERT INTO user_info (first_name, last_name) 
        VALUES ('$first_name', '$last_name')";
if ($conn->query($sql) === TRUE) {
    echo "New user added!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close the connection
$conn->close();
?>