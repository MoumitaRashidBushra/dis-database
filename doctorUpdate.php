<?php


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $doctor_id = $_POST['doctor_id'];
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

// Retrieve form data


// Prepare the SQL statement
$sql = "UPDATE doctors SET first_name='$first_name', last_name='$last_name', specialization='$specialization',  contact_number='$contact_number', email='$email' WHERE doctor_id='$doctor_id'";

// Execute the query
if ($conn->query($sql) === TRUE) {
  echo "Doctor updated successfully.";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close the connection
$conn->close();
}
?>

