<?php


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $specialist_name = $_POST['specialist_name'];
$gender = $_POST['gender'];

    // Connect to the appropriate database based on gender
    if ($gender === 'Female') {
        $dbname = 'medical_database_for_female';
    } else {
        $dbname = 'medical_database';
    }

$servername = "localhost";
$username = "root";
$password = "";
// Create a new connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check the connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$sql = "INSERT INTO patients (specialist_name, gender,) 
        VALUES ('$specialist_name','$gender,')";
// Execute the query
if ($conn->query($sql) === TRUE) {
  echo "Specialist name inserted successfully.";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
// Close the connection
$conn->close();
}
    // Retrieve form data
?>
