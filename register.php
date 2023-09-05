<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $centerSelect = $_POST["centerSelect"];
    $workingHours = $_POST["workingHours"];

    // Retrieve registration form data
    $photoIdProof = $_POST["photoIdProof"];
    $photoIdNumber = $_POST["photoIdNumber"];
    $name = $_POST["name"];
    $gender = $_POST["gender"];
    $yearOfBirth = $_POST["yearOfBirth"];

    // Database connection details
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "vaxportal";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $database);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Check the number of registrations for the current day
    $query = "SELECT COUNT(*) AS totalRegistrations FROM registration WHERE DATE(ADDTIME(NOW(), '05:30:00')) = CURDATE()";
    $result = $conn->query($query);

    if ($result === false) {
        die("Error in executing query: " . $conn->error);
    }

    $row = $result->fetch_assoc();
    $totalRegistrations = $row['totalRegistrations'];

    // Check if the total registrations reached the limit
    if ($totalRegistrations <10) {
        // Proceed with registration
        $stmt = $conn->prepare("INSERT INTO registration (centerSelect, workingHours, photoIdProof, photoIdNumber, name, gender, yearOfBirth) VALUES (?, ?, ?, ?, ?, ?, ?)");

        if ($stmt === false) {
            die("Error in preparing statement: " . $conn->error);
        }

        $stmt->bind_param("sssssss", $centerSelect, $workingHours, $photoIdProof, $photoIdNumber, $name, $gender, $yearOfBirth);

        if ($stmt->execute()) {
            echo "Registration successful!";
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "No more slots available for today!";
    }

    // Close connection
    $conn->close();
}
?>
