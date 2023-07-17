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

// Retrieve the patient ID from the form submission
$patient_id = $_POST['patient_id'];

// Prepare the SQL statement to fetch the patient data
$sql = "SELECT * FROM appointments WHERE patient_id = '$patient_id'";

// Execute the query
$result = $conn->query($sql);

// Check if any rows were returned
if ($result->num_rows > 0) {
    // Output the data in a table format
    echo "<table>
        <tr>
            <th>Patient ID</th>
            <th>Doctor Id</th>
            <th>Date of Appointment</th>
            <th>Time of Appointment</th>
            <th>Gender</th>
           
        </tr>";

    // Fetch each row and display the data
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
            <td>".$row['patient_id']."</td>
            <td>".$row['doctor_id']."</td>
            <td>".$row['appointment_date']."</td>
            <td>".$row['appointment_time']."</td>
            <td>".$row['gender']."</td>
        
        </tr>";
    }

    echo "</table>";
} else {
    echo "No data found for the provided patient ID.";
}

// Close the connection
$conn->close();
}
?>
