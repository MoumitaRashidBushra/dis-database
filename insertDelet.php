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
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare the SQL statements
       $sqlDeleteMedicalRecords = "DELETE FROM medical_records WHERE patient_id='$patient_id'";
    $sqlDeleteLabResults = "DELETE FROM lab_results WHERE patient_id='$patient_id'";
    $sqlDeleteAppointments = "DELETE FROM appointments WHERE patient_id='$patient_id'";
    $sqlDeletePayments = "DELETE FROM payments WHERE patient_id='$patient_id'";
    $sqlDeleteBills = "DELETE FROM bills WHERE patient_id='$patient_id'";
 $sqlDeletePatients = "DELETE FROM patients WHERE patient_id='$patient_id'";

    // Execute the queries
    
    $conn->query($sqlDeleteMedicalRecords);
    $conn->query($sqlDeleteLabResults);
    $conn->query($sqlDeleteAppointments);
    $conn->query($sqlDeletePayments);
    $conn->query($sqlDeleteBills);
$conn->query($sqlDeletePatients);
    // Check if any rows were affected in any of the tables
    if ($conn->affected_rows > 0) {
        echo "Patient deleted successfully.";
    } else {
        echo "No records found for the patient ID.";
    }

    // Close the connection
    $conn->close();
}
?>
