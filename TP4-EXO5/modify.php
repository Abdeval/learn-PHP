<?php
// Start the session to display messages later
session_start();

// Connect to the database
$conn = new mysqli("localhost", "root", "mypass", "test");

// Check if ID is provided in the query string
if (!isset($_GET['id']) || empty($_GET['id'])) {
    header("Location: index.php?error=invalid_id");
    exit();
}

$id = $_GET['id'];

// Fetch the existing data for the exercise
$result = $conn->query("SELECT * FROM exercises WHERE id = $id");
if ($result->num_rows == 0) {
    header("Location: index.php?error=not_found");
    exit();
}

$exercise = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Update the exercise in the database
    $title = $_POST['title'];
    $author = $_POST['author'];
    $date = $_POST['date'];

    $conn->query("UPDATE exercises SET title='$title', author='$author', date='$date' WHERE id = $id");

    // Set a success message in the session and redirect back
    $_SESSION['message'] = "Exercise updated successfully!";
    header("Location: exo.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Modify Exercise</title>
</head>
<body>
    <h2>Modify Exercise</h2>
    <form method="POST">
        <div>
            <label for="title">Title:</label>
            <input type="text" id="title" name="title" value="<?php echo $exercise['title']; ?>" required />
        </div>
        <div>
            <label for="author">Author:</label>
            <input type="text" id="author" name="author" value="<?php echo $exercise['author']; ?>" required />
        </div>
        <div>
            <label for="date">Creation Date:</label>
            <input type="date" id="date" name="date" value="<?php echo $exercise['date']; ?>" required />
        </div>
        <button type="submit">Save Changes</button>
    </form>
</body>
</html>
