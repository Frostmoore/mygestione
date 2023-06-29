<?php
    include_once 'database.php';

    $utenti = "CREATE TABLE utenti(
        id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
        username VARCHAR(255) NOT NULL,
        user_password VARCHAR(255) NOT NULL,
        email VARCHAR(255) NOT NULL UNIQUE,
        ruolo VARCHAR(255) NOT NULL,
        created VARCHAR(255) NOT NULL,
        modified VARCHAR(255) NOT NULL
    )";
    if (mysqli_query($conn, $utenti)) {
        echo 'Tabella <b>UTENTI</b> creata con successo!</br>';
    }

    $clienti = "CREATE TABLE clienti(
        id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
        nome_cliente VARCHAR(255) NOT NULL,
        tel VARCHAR(255) NOT NULL,
        email VARCHAR(255) NOT NULL,
        prodotti VARCHAR(255) NOT NULL,
        note TEXT NOT NULL
    )";
    if (mysqli_query($conn, $clienti)){
        echo 'Tabella <b>CLIENTI</b> creata con successo!</br>';
    }

    $prodotti = "CREATE TABLE prodotti(
        id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
        nome_prodotto VARCHAR(255) NOT NULL,
        clienti VARCHAR(255) NOT NULL,
        note TEXT NOT NULL
    )";
    if (mysqli_query($conn, $prodotti)) {
        echo 'Tabella <b>PRODOTTI</b> creata con successo!';
    }

    $calendario = "CREATE TABLE calendario(
        id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
        dataora VARCHAR(255) NOT NULL,
        cliente VARCHAR(255) NOT NULL,
        prodotto VARCHAR(255) NOT NULL,
        pagato VARCHAR(255) NOT NULL,
        altro TEXT NOT NULL,
        renew INT(1) NOT NULL,
        every VARCHAR(255) NOT NULL,
        gsma VARCHAR(255) NOT NULL,
        note TEXT NOT NULL
    )";
    if (mysqli_query($conn, $calendario)) {
        echo 'Tabella <b>CALENDARIO</b> creata con successo!';
    }

    $entrate = "CREATE TABLE entrate(
        id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
        rifcli VARCHAR(255) NOT NULL,
        rifpro VARCHAR(255) NOT NULL,
        entita VARCHAR(255) NOT NULL,
        dataora VARCHAR(255) NOT NULL,
        note TEXT NOT NULL
    )";
    if (mysqli_query($conn, $entrate)) {
        echo 'Tabella <b>ENTRATE</b> creata con successo!';
    }

    $uscite = "CREATE TABLE uscite(
        id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
        rifcli VARCHAR(255) NOT NULL,
        rifpro VARCHAR(255) NOT NULL,
        entita VARCHAR(255) NOT NULL,
        altro VARCHAR(255) NOT NULL,
        dataora VARCHAR(255) NOT NULL,
        note TEXT NOT NULL
    )";
    if (mysqli_query($conn, $uscite)) {
        echo 'Tabella <b>USCITE</b> creata con successo!';
    }