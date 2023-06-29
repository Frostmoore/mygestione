<?php
    session_start();
    include_once 'arrays.php';
    if(!$_SESSION['logged']){
        header("refresh:0;url=../nopermission.php");
    }

    if(isset($_POST['registra'])){
        $query = "INSERT INTO utenti (username, user_password, email, ruolo, created, modified) VALUES (?, ?, ?, ?, ?, ?)";
        if($_POST['userpassreg'] === $_POST['confermapass']){
            if(!in_array($_POST['usernamereg'], $utenti['username'])){
                $pwd = mysqli_real_escape_string($conn, $_POST['userpassreg']);
                $pwd = password_hash($pwd, PASSWORD_DEFAULT);
                $uname = mysqli_real_escape_string($conn, $_POST['usernamereg']);
                $email = mysqli_real_escape_string($conn, $_POST['useremailreg']);
                $ruolo = mysqli_real_escape_string($conn, $_POST['userrolereg']);
                $created = date(strtotime('now'));
                $modified = date(strtotime('now'));
                $stmt = $conn->prepare($query);
                $stmt->bind_param("ssssss", $uname, $pwd, $email, $ruolo, $created, $modified);
                $stmt->execute();
                $stmt->close();
                $conn->close();
                echo 'Utente <b>' . $_POST['usernamereg'] . '</b> creato con successo!';
                header("refresh:5;url=../index.php");
            } else {
                echo '<p style="color: red;">Il nome utente che stai cercando di registrare è già esistente. Sarai reindirizzato alla pagina di registrazione tra 5 secondi.</p>';
                header("refresh:5;url=../register.php");
            }
        } else {
            echo '<p style="color: red;">La password non combacia con la conferma. Sarai reindirizzato alla pagina di registrazione tra 5 secondi.</p>';
            header("refresh:5;url=../register.php");
        }
    }

?>