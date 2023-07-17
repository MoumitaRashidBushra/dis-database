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
$sql = "INSERT INTO medical_records (patient_id, visit_date, diagnosis, prescription, gender) 
        VALUES ('$patient_id', '$visit_date',  '$diagnosis', '$prescription', '$gender')";
// Execute the query
if ($conn->query($sql) === TRUE) {
  echo "Medical Record inserted successfully.";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
// Close the connection
$conn->close();
}
    // Retrieve form data
?>
