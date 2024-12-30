<?php
// Connect to the database
$conn = new mysqli('localhost', 'root', 'mypass', 'test');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if an ID is passed
if (isset($_GET['id'])) {
    $id = intval($_GET['id']); // Sanitize input

    // Prepare and execute the delete query
    $sql = "DELETE FROM exercises WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo "Exercise deleted successfully.";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "No exercise ID provided.";
}

$conn->close();

// Redirect back to the main page (optional)
header("Location: exo.php");
exit;
?>
