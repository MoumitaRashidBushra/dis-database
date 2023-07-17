<?php


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $patient_id = $_POST['patient_id'];
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$date_of_birth = $_POST['date_of_birth'];
$gender = $_POST['gender'];
$contact_number = $_POST['contact_number'];
$address = $_POST['address'];
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
$sql = "UPDATE patients SET first_name='$first_name', last_name='$last_name', date_of_birth='$date_of_birth', gender='$gender', contact_number='$contact_number', address='$address' WHERE patient_id='$patient_id'";

// Execute the query
if ($conn->query($sql) === TRUE) {
  echo "Patient updated successfully.";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close the connection
$conn->close();
}
?>

