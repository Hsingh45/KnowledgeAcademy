<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
  $username = $_POST['username'];
  $password = $_POST['password'];

  // Validate username and password
  // Add your PHP code here for validation, database interaction, or any other processing you want to perform.

  // For demonstration purposes, we'll just print the values.
  echo "Username: " . $username . "<br>";
  echo "Password: " . $password;

  // Save in database
  $servername = "localhost"; // Replace with your server name
  $username_db = "root"; // Replace with your database username
  $password_db = ""; // Replace with your database password
  $dbname = "onlineplatform"; // Replace with your database name

  // Create connection
  $conn = new mysqli($servername, $username_db, $password_db, $dbname);

  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  // Insert into database
  $sql = "INSERT INTO login (username, password) VALUES ('$username', '$password')";

  if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }

  $conn->close();
}
?>
