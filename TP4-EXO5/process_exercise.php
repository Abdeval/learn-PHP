<?php
// Connect to the database
$conn = new mysqli('localhost', 'root', 'mypass', 'test');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $author = $_POST['author'];
    $date = $_POST['date'];

    $sql = "INSERT INTO exercises (`title`, `author`, `date`) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $title, $author, $date);

    if ($stmt->execute()) {
        echo "New exercise added successfully.";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>
