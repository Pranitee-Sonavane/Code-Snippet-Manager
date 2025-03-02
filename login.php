<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    // Validate the login (you may need to encrypt passwords)
    // For simplicity, let's assume you have a users table with columns id, username, and password

    $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        session_start();
        $_SESSION['user'] = $username;
        header("Location: admin.php"); // Redirect to the admin panel after successful login
        exit();
    } else {
        echo "Invalid username or password";
    }
}

$conn->close();
?>
