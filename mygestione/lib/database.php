<?php
    
    $servername = 'Server_name';
    $username = 'User_name';
    $password = 'pw';
    $database = 'db';

    $conn = new mysqli($servername, $username, $password, $database);
    if ($conn->connect_error) {
        die("Connessione Fallita: " . $conn->connect_error);
    }
