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

    // Update guestbook entry in the database
    $id = $_GET["id"];
    $message = $_POST["message"];

    $sql = "UPDATE entries SET message = '$message' WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close connection
    $conn->close();
?>
