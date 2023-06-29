<?php
    include_once 'database.php';

    $note = "CREATE TABLE note(
        id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
        created VARCHAR(255) NOT NULL,
        nota TEXT NOT NULL,
        modified VARCHAR(255) NOT NULL,
        creaby VARCHAR(255) NOT NULL
    )";
    if (mysqli_query($conn, $note)) {
        echo 'Tabella <b>NOTE</b> creata con successo!';
    }