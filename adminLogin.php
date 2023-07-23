<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $pass = $_POST['pass'];
    

    // Connect to the appropriate database based on gender
    
    
       
    $dbname = "medical_database";
    $servername = "localhost";
    $user = "root";
    $password = "";

    // Create a new connection
    $conn = new mysqli($servername, $user, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare the query to check the user's credentials
    $stmt = $conn->prepare("SELECT * FROM adminlogin WHERE username=? AND pass=? ");
    $stmt->bind_param("ss", $username, $pass);

    // Execute the query
    $stmt->execute();

    // Get the result
    $result = $stmt->get_result();

    // Check if the user exists and the password is correct
    if ($result->num_rows === 1) {
        // Successful login
        echo "Welcome! $username";
        // Redirect the user to the dashboard or another page on successful login
        header("Location: index.html");
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
