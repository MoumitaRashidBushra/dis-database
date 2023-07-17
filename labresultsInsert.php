<?php


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $patient_id = $_POST['patient_id'];
$test_name = $_POST['test_name'];
$result_value = $_POST['result_value'];
$result_date = $_POST['result_date'];
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
$sql = "INSERT INTO lab_results (patient_id, test_name, result_value, result_date, gender) 
        VALUES ('$patient_id', '$test_name',  '$result_value', '$result_date', '$gender')";
// Execute the query
if ($conn->query($sql) === TRUE) {
  echo "Lab result inserted successfully.";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
// Close the connection
$conn->close();
}
    // Retrieve form data
?>
