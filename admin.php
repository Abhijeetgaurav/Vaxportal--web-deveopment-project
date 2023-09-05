<?php
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

// Function to validate admin credentials
function validateAdminCredentials($conn, $username, $password) {
    // Prepare and execute SQL select statement
    $stmt = $conn->prepare("SELECT * FROM admin WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if any matching admin record is found
    if ($result->num_rows > 0) {
        $admin = $result->fetch_assoc();
        // Verify the entered password with the stored password
        if ($admin["password"] === $password) {
            return true; // Valid admin credentials
        }
    }

    return false; // Invalid admin credentials
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Check if the entered credentials match any admin record in the database
    if (validateAdminCredentials($conn, $username, $password)) {
        // Successful login
        // Redirect to the admin dashboard or homepage
        header("Location: admin.html");
        exit();
    } else {
        // Incorrect credentials
        $error = "Invalid username or password.";
        echo $error;
    }
}

// Close database connection
$conn->close();
?>

