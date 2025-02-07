<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include("connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data safely
    $department = $_POST["department"];
    $gender = $_POST["gender"];
    $name = $_POST["name"];
    $email = $_POST["email"];
    $date = $_POST["date"];
    $time = $_POST["time"];

    // Prepare the SQL statement
    $stmt = $conn->prepare("INSERT INTO appointment (department, gender, name, email, date, time) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssss", $department, $gender, $name, $email, $date, $time);

    // Execute the query and check for success
    if ($stmt->execute()) {
        echo "<p style='color:green;'> Appointment booked successfully!</p>";
    } else {
        echo "<p style='color:red;'> Error: " . $stmt->error . "</p>";
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
}
?>
