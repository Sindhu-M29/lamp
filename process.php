<?php
// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "sindhu*29";
$dbname = "mydata";

// Create a new MySQLi connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check if the connection is successful
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form data is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $address = $_POST['address'];
    $city = $_POST['city'];
    $firstName = $_POST['firstName']; // Add this line
    $lastName = $_POST['lastName'];   // Add this line

    // Prepare SQL statement to insert data into the database
    $sql = "INSERT INTO Persons (LastName, FirstName, Address, City)
            VALUES ('$lastName', '$firstName', '$address', '$city')";

    // Execute SQL statement
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
// Close the database connection
$conn->close();
?>
