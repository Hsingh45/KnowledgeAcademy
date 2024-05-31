<?php
// Replace these values with your actual database credentials
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "onlineplatform";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $mobileNumber = $_POST['mobileNumber'];
    $email = $_POST['email'];
    $age = $_POST['age'];
    $class = $_POST['class'];

    // Check if course codes are selected
    if (isset($_POST['courseCode'])) {
        if (is_array($_POST['courseCode'])) {
            $courseCodes = $_POST['courseCode'];
            $courseCodesStr = implode(", ", $courseCodes);
        } else {
            $courseCodesStr = $_POST['courseCode'];
        }
    }

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO register1 (firstName, lastName, mobileNumber, email, age, class, courseCodes) VALUES (?, ?, ?, ?, ?, ?, ?)");
    if ($stmt) {
        $stmt->bind_param("ssssiss", $firstName, $lastName, $mobileNumber, $email, $age, $class, $courseCodesStr);

        // Execute the prepared statement
        $stmt->execute();

        echo "New records created successfully";

        $stmt->close();
    } else {
        echo "Error: " . $conn->error;
    }

    $conn->close();
}
?>
