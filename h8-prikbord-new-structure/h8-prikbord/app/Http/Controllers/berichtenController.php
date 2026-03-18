<?php
// Haal databaseverbinding op
require_once '../config/conn.php';

// Check of er een actie is meegestuurd
$action = $_POST['action'] ?? '';

if ($action === "edit") {

    // Haal variabelen op
    $id      = intval($_POST['id']); // veilig maken
    $title   = trim($_POST['title']);
    $content = trim($_POST['content']);
    $author  = trim($_POST['author']);

    // Eenvoudige validatie
    if (empty($title)) {
        die("Vul een titel in.");
    }

    // 2. Query schrijven met placeholders
    $query = "UPDATE berichten SET title = :title, content = :content, author = :author WHERE id = :id";

    // 3. Statement voorbereiden
    $statement = $conn->prepare($query);

    // 4. Statement uitvoeren
    $statement->execute([
        ':title'   => $title,
        ':content' => $content,
        ':author'  => $author,
        ':id'      => $id
    ]);

    // Redirect naar overzicht
    header("Location: ../index.php");
    exit;
}

if ($action === "delete") {

    $id = intval($_POST['id']); // veilig maken

    // 2. Query schrijven
    $query = "DELETE FROM berichten WHERE id = :id";

    // 3. Statement voorbereiden
    $statement = $conn->prepare($query);

    // 4. Statement uitvoeren
    $statement->execute([
        ':id' => $id
    ]);

    // Redirect naar overzicht
    header("Location: ../index.php");
    exit;
}

// Als er geen actie is, terug naar index
header("Location: ../index.php");
exit;
?>