<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $code = mysqli_real_escape_string($conn, $_POST['code']);

    $sql = "INSERT INTO snippets (name, code) VALUES ('$name', '$code')";

    if ($conn->query($sql) === TRUE) {
        echo "Snippet saved successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
