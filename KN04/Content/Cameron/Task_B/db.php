<?php
$servername = getenv('DB_HOST');
$username = getenv('DB_USER');
$password = getenv('DB_PASSWORD');
$dbname = getenv('DB_NAME');

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT Host, User FROM mysql.user;";
$result = $conn->query($sql);

while ($row = $result->fetch_assoc()) {
    echo ($row["Host"] . " / " . $row["User"] . "<br />");
}

$conn->close();
?>