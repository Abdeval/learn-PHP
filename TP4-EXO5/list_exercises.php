<?php
// Connect to the database
$conn = new mysqli('localhost', 'root', 'mypass', 'test');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id, title, author, date FROM exercises";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['id']}</td>
                <td>{$row['title']}</td>
                <td>{$row['author']}</td>
                <td>{$row['date']}</td>
                <td>
                    <button onclick=\"redirectToModify({$row['id']})\">Edit</button>
                    <button onclick=\"confirmDelete({$row['id']})\">Delete</button>
                </td>
            </tr>";
    }
} else {
    echo "<tr><td colspan='5'>No exercises found.</td></tr>";
}

$conn->close();
?>