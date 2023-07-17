<?php



if ($_SERVER['REQUEST_METHOD'] === 'POST') {

$gender = $_POST['gender'];
$patient_id = $_POST['patient_id'];
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

// Check the connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Retrieve form data
$patient_id = $_POST['patient_id'];

// Prepare the SQL statement
$sql = "DELETE FROM appointments WHERE patient_id='$patient_id'";

// Execute the query
if ($conn->query($sql) === TRUE) {
  echo "Appointment deleted successfully.";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close the connection
$conn->close();
}
?>
