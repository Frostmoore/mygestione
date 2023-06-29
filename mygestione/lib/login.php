<?php
    session_start();
    include_once 'arrays.php';

    if(isset($_POST['login'])) {
        $un = mysqli_real_escape_string($conn, $_POST['usernamelog']);
        $pw = mysqli_real_escape_string($conn, $_POST['userpasslog']);
        if(in_array($un, $utenti['username'])){
            if($pw == password_verify($pw, $utenti['password'][array_search($un, $utenti['username'])])) {
                $_SESSION['username'] = $un;
                $_SESSION['logged'] = true;
                $_SESSION['ruolo'] = $utenti['ruolo'][array_search($un, $utenti['username'])];

                echo '<p>Hai effettuato correttamente il login. Sarai reindirizzato alla dashboard in 2 secondi.</p>';
                header("refresh:2;url=../index.php");

            }
        }
    }