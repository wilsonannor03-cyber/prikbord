<?php

require_once '../config/conn.php';

$action = $_POST['action'];

if($action == "edit")
{
    //Haal variabelen op, doe inputvalidatie
    $title = $_POST['title'];
    $content = $_POST['content'];
    $id = $_POST['id'];

    if(empty($title))
    {
        die("Vul een titel in");
    }

    //1. Haal de verbinding erbij
    // (staat al bovenaan met require_once)

    //2. Schrijf query met placeholders
    $query = "UPDATE berichten SET title = :title, content = :content WHERE id = :id";
    
    //3. Zet query om naar statement
    $statement = $conn->prepare($query);

    //4. Voer statement uit, geef nu waarden mee voor de placeholders
    $statement->execute([
        ':title' => $title,
        ':content' => $content,
        ':id' => $id
    ]);

    //5. Niet van toepassing bij een UPDATE-query

    //Stuur gebruiker terug naar lijst met berichten (index.php in hoofdmap)
    header("Location: ../index.php");
    exit;
}

//.... hier komt de delete-code

if($action == "delete")
{
    $id = $_POST['id'];

 
    $query = "DELETE FROM berichten WHERE id = :id";


    $statement = $conn->prepare($query);

    $statement->execute([
        ':id' => $id
    ]);

    header("Location: ../index.php");
    exit;
}

