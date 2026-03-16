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
            <!-- Schrijf hier een foreach die door $berichten loopt -->
            <li>Hier komt een lijst met berichten.</li>
        </ul>

    </div>

</body>

</html>
