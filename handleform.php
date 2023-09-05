<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $center = $_POST["centerSelect"];
    $workingHours = $_POST["workingHours"];

    // Perform necessary validations and processing

    // Redirect to register.html
    header("Location: register.html");
    exit();
}
?>
</*?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $photoIdProof = $_POST["photoIdProof"];
    $photoIdNumber = $_POST["photoIdNumber"];
    $name = $_POST["name"];
    $gender = $_POST["gender"];
    $yearOfBirth = $_POST["yearOfBirth"];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "vaxportal";

    $conn = new mysqli($servername, $username, $password, $database);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $stmt = $conn->prepare("INSERT INTO registration (photoIdProof, photoIdNumber, name, gender, yearOfBirth) VALUES (?, ?, ?, ?, ?)");
    
    if ($stmt === false) {
        die("Error in preparing statement: " . $conn->error);
    }

    $stmt->bind_param("sssss", $photoIdProof, $photoIdNumber, $name, $gender, $yearOfBirth);

    if ($stmt->execute()) {
        echo "Registration successful!";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
*/
$variable = 456;