<!doctype html>
<html lang="nl">

<head>
    <title>Prikbord</title>
    <?php require_once 'resources/views/components/head.php'; ?>
</head>

<body>

    <?php require_once 'resources/views/components/header.php'; ?>
    
    <div class="container home">

        <p>Berichten:</p>

        <?php
        require_once 'config/conn.php';
        $query = "SELECT * FROM berichten";
        $statement = $conn->prepare($query);
        $statement->execute();
        $berichten = $statement->fetchAll(PDO::FETCH_ASSOC);
        ?>

        <ul>
            <?php foreach ($berichten as $bericht): ?>
                <li>
                    <a href="berichten/edit.php?id=<?php echo $bericht['id']; ?>">
                        <?php echo $bericht['titel']; ?>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>

    </div>

</body>

</html>
