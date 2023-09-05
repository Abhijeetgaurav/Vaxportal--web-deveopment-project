<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Database connection details
    $servername = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $database = "vaxportal";

    // Create connection
    $conn = new mysqli($servername, $dbUsername, $dbPassword, $database);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare and execute SQL select statement
    $stmt = $conn->prepare("SELECT * FROM signup WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if user exists and password matches
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if ($row["password"] === $password) {
            // Successful login
            // Redirect to home page or user dashboard
            header("Location: user.html");
            echo "<script>alert('Login successful!');</script>";
            exit();
        } else {
            // Incorrect password
            echo "Incorrect password!";
        }
    } else {
        // User does not exist
        echo "User does not exist!";
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();
}
?>
