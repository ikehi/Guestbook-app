<!DOCTYPE html>
<html>
<head>
    <title>Guestbook</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <h1>Guestbook</h1>

    <!-- Guestbook entries -->
    <div class="guestbook-entries">
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

            // Retrieve guestbook entries
            $sql = "SELECT * FROM entries ORDER BY created_at DESC";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<div class='entry'>";
                    echo "<p class='entry-date'>" . $row["created_at"] . "</p>";
                    echo "<p class='entry-message'>" . $row["message"] . "</p>";
                    echo "<a class='entry-edit' href='edit.php?id=" . $row["id"] . "'>Edit</a>";
                    echo "<a class='entry-delete' href='delete.php?id=" . $row["id"] . "'>Delete</a>";
                    echo "</div>";
                }
            } else {
                echo "<p>No entries found.</p>";
            }

            // Close connection
            $conn->close();
        ?>
    </div>

    <!-- Create entry form -->
    <div class="guestbook-form">
        <h2>Create Entry</h2>
        <form action="create.php" method="POST">
            <textarea name="message" placeholder="Leave a message..." required></textarea>
            <br>
            <button type="submit">Submit</button>
        </form>
    </div>
</body>
</html>
