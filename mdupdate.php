<?php


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $patient_id = $_POST['patient_id'];
$visit_date = $_POST['visit_date'];
$diagnosis = $_POST['diagnosis'];
$prescription = $_POST['prescription'];
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

// Retrieve form data


// Prepare the SQL statement
$sql = "UPDATE medical_records SET patient_id='$patient_id', visit_date='$visit_date', diagnosis='$diagnosis',prescription='$prescription', gender='$gender' WHERE patient_id='$patient_id'";

// Execute the query
if ($conn->query($sql) === TRUE) {
  echo "Appointment updated successfully.";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close the connection
$conn->close();
}
?>

