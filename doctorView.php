<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $gender = $_POST['gender'];
    $doctor_id = $_POST['doctor_id'];
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
$doctor_id = $_POST['doctor_id'];

// Prepare the SQL statement to fetch the patient data
$sql = "SELECT * FROM doctors WHERE doctor_id = '$doctor_id'";

// Execute the query
$result = $conn->query($sql);

// Check if any rows were returned
if ($result->num_rows > 0) {
    // Output the data in a table format
    echo "<table>
        <tr>
            <th>Patient ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Specialization</th>
            
            <th>Contact Number</th>
            <th>Address</th>
        </tr>";

    // Fetch each row and display the data
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
            <td>".$row['doctor_id']."</td>
            <td>".$row['first_name']."</td>
            <td>".$row['last_name']."</td>
            <td>".$row['specialization']."</td>
            <td>".$row['contact_number']."</td>
            <td>".$row['email']."</td>
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
