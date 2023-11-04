<?php
// Database connection code (e.g., db.php)
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $specialty = $_POST["field"];

    // Insert new doctor data into the database
    $query = "INSERT INTO doctors (name, field) VALUES ('$name', '$field')";
    $result = mysqli_query($conn, $query);

    if ($result) {
        echo "Doctor added successfully!";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

// Close the database connection
mysqli_close($conn);
?>
