<?php
// Database connection details
$dsn = 'mysql:host=localhost;dbname=quote_generator';
$username = 'root';
$password = 'mypass';

try {
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Fetch a random quote and its associated data
    $sql = "SELECT q.quote, a.author, cp.color1, cp.color2, cp.color3, cp.text_color
            FROM quotes q
            JOIN authors a ON q.author_id = a.id
            JOIN color_palettes cp ON q.palette_id = cp.id
            ORDER BY RAND() LIMIT 1";

    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    // Check if the data was fetched successfully
    if ($row) {
        // Return the quote data and color palette as JSON
        header('Content-Type: application/json');
        echo json_encode([
            'quote' => $row['quote'],
            'author' => $row['author'],
            'color1' => $row['color1'],
            'color2' => $row['color2'],
            'color3' => $row['color3'],
            'text_color' => $row['text_color']
        ]);
    } else {
        // Return an error message if no data is found
        echo json_encode(['error' => 'No quote found.']);
    }

} catch (PDOException $e) {
    echo json_encode(['error' => 'Database connection failed: ' . $e->getMessage()]);
}
?>
