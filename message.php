<?php

$conn = mysqli_connect('rdbms.strato.de', 'dbu1035725', 'Stoeptegel3!3107', 'dbs10066227');
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if form is submitted
if (isset($_POST['submit'])) {

    // Get user and message data
    $user = $_POST['user'];
    $message = $_POST['message'];

    // Insert message into database
    $sql = "INSERT INTO chat (user, message, created_at) VALUES ('$user', '$message', NOW())";
    mysqli_query($conn, $sql);
}

// Retrieve messages from database
$sql = "SELECT * FROM chat ORDER BY created_at DESC";
$result = mysqli_query($conn, $sql);

// Display messages
while ($row = mysqli_fetch_assoc($result)) {
    $user = $row['user'];
    $message = $row['message'];
    $created_at = date('F j, Y, g:i a', strtotime($row['created_at']));
    echo "<strong>$user:</strong> $message <small>($created_at)</small><br>";
}

// Close database connection
mysqli_close($conn);
?>

<!-- HTML form for user input -->
<form method="post">
    <label for="user">Name:</label>
    <input type="text" name="user" id="user"><br>

    <label for="message">Message:</label>
    <textarea name="message" id="message"></textarea><br>

    <input type="submit" name="submit" value="Send">
</form>
