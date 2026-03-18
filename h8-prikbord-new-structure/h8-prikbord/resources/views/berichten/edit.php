<!doctype html>
<html lang="nl">

<head>
    <title>Prikbord / Aanpassen</title>
    <?php require_once '../resources/views/components/head.php'; ?>
</head>

<body>

    <?php require_once '../resources/views/components/header.php'; ?>

    <div class="container">
        <h1>Aanpassen bericht</h1>

        <?php
        //Haal id uit de URL
        $id = $_GET['id'];

        //Voer query uit
        require_once '../config/conn.php';
        $query = "SELECT * FROM berichten WHERE id = :id";
        //(maak het 5-stappenplan nog af)

        ?>

        <!-- Formulier voor edit: -->
        <form action="edit_handler.php" method="POST">
            <input type="hidden" name="action" value="edit">
            <input type="hidden" name="id" value="<?php echo $id; ?>">

            <!-- Voeg hier de andere velden toe -->
            <label for="title">Titel:</label>
            <input type="text" name="title" id="title" value="<?php echo htmlspecialchars($title); ?>">

            <label for="content">Inhoud:</label>
            <textarea name="content" id="content"><?php echo htmlspecialchars($content); ?></textarea>

            <label for="author">Auteur:</label>
            <input type="text" name="author" id="author" value="<?php echo htmlspecialchars($author); ?>">

            <input type="submit" value="Bewerk bericht">
        </form>

        <!-- Formulier voor delete: -->
        <form action="delete_handler.php" method="POST">
            <input type="hidden" name="action" value="delete">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <input type="submit" value="Verwijder bericht">
        </form>

    </div>  

</body>

</html>
