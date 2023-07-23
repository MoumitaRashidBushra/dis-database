<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $first_name = $_POST['first_name'];
    $specialization = $_POST['specialization'];
    $contact_number = $_POST['contact_number'];
   

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

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare the query to check the user's credentials
    $stmt = $conn->prepare("SELECT * FROM doctors WHERE specialization=? AND contact_number=? ");
    $stmt->bind_param("ss", $specialization, $contact_number);

    // Execute the query
    $stmt->execute();

    // Get the result
    $result = $stmt->get_result();

    // Check if the user exists and the password is correct
    if ($result->num_rows === 1) {
        // Successful login
        echo "Welcome! $first_name";
        // Redirect the user to the dashboard or another page on successful login
         header("Location: doctorDashboard.html");
         exit();
    } else {
        // Invalid credentials
        echo "Invalid username or password.";
    }

    // Close the database connection
    $stmt->close();
    $conn->close();
}
?>
