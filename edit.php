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

    // Retrieve guestbook entry for editing
    $id = $_GET["id"];

    $sql = "SELECT * FROM entries WHERE id = $id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $message = $row["message"];
    } else {
        echo "Entry not found.";
    }

    // Close connection
    $conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Entry</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <h1>Edit Entry</h1>

    <div class="guestbook-form">
        <form action="update.php?id=<?php echo $id; ?>" method="POST">
            <textarea name="message" placeholder="Leave a message..." required><?php echo $message; ?></textarea>
            <br>
            <button type="submit">Update</button>
        </form>
    </div>
</body>
</html>
