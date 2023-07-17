<?php


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $patient_id = $_POST['patient_id'];
$bill_amount = $_POST['bill_amount'];
$bill_date = $_POST['bill_date'];
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
$sql = "INSERT INTO bills (patient_id, bill_amount, bill_date, gender) 
        VALUES ('$patient_id', '$bill_amount', '$bill_date', '$gender')";
// Execute the query
if ($conn->query($sql) === TRUE) {
  echo "Bills inserted successfully.";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
// Close the connection
$conn->close();
}
    // Retrieve form data
?>
