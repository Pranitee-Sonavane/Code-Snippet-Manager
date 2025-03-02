<?php
include 'db.php';

$sql = "SELECT id, name FROM snippets";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo '<li data-id="' . $row['id'] . '">' . $row['name'] . '</li>';
    }
} else {
    echo "0 results";
}

$conn->close();
?>
