<?php
    // Database connection details
    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "guestbook";

    // Create connection
    $conn = new mysqli($host, $username, $password, $database);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Delete guestbook entry from the database
    $id = $_GET["id"];

    $sql = "DELETE FROM entries WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close connection
    $conn->close();
?>
