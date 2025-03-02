<?php
include 'db.php';

// Check if the user is logged in
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

// Handle snippet submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $snippetName = mysqli_real_escape_string($conn, $_POST['snippetName']);
    $snippetCode = mysqli_real_escape_string($conn, $_POST['snippetCode']);

    $sql = "INSERT INTO snippets (name, code) VALUES ('$snippetName', '$snippetCode')";

    if ($conn->query($sql) === TRUE) {
        echo "Snippet saved successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Fetch snippets from the database
$sql = "SELECT * FROM snippets";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
</head>
<body>
    <h1>Welcome, <?php echo $_SESSION['user']; ?>!</h1>
    
    <!-- Snippet Form -->
    <form method="POST" action="">
        <label for="snippetName">Snippet Name:</label>
        <input type="text" name="snippetName" required>
        <br>
        <label for="snippetCode">Snippet Code:</label>
        <textarea name="snippetCode" required></textarea>
        <br>
        <button type="submit">Save Snippet</button>
    </form>

    <!-- Display Snippets -->
    <h2>Snippets:</h2>
    <ul>
        <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo '<li><strong>' . $row['name'] . ':</strong> ' . $row['code'] . '</li>';
            }
        } else {
            echo "<li>No snippets found.</li>";
        }
        ?>
    </ul>

    <p><a href="logout.php">Logout</a></p>
</body>
</html>
