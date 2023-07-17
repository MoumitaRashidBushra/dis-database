<?php


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$specialization = $_POST['specialization'];
$contact_number = $_POST['contact_number'];
$email = $_POST['email'];
//$gender = $_POST['gender'];


    // Connect to the appropriate database based on gender
    if ($specialization === 'Gynecology') {
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
$sql = "INSERT INTO doctors (first_name, last_name, specialization, contact_number,email) 
        VALUES ('$first_name', '$last_name', '$specialization', '$contact_number', '$email')";
// Execute the query
if ($conn->query($sql) === TRUE) {
  echo "Doctor inserted successfully.";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
// Close the connection
$conn->close();
}
    // Retrieve form data
?>
