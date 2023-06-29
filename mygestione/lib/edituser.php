<?php
    include_once 'arrays.php';

    if(!$_SESSION['logged']){
        header("refresh:0;url=../nopermission.php");
    }

    if(isset($_POST['editutente'])){
        $sql = "UPDATE utenti SET username = ?, email = ?, ruolo = ?, modified = ? WHERE id = ?";
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $ruolo = mysqli_real_escape_string($conn, $_POST['ruolo']);
        $modified = date(strtotime('now'));
        $id = mysqli_real_escape_string($conn, $_POST['id']);
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssss", $username, $email, $ruolo, $modified, $id);
        $stmt->execute();
        $stmt->close();
        $conn->close();
        echo 'Utente <b>' . $username . '</b> modificato con successo! Verrai reindirizzato alla pagina del tuo profilo in 2 secondi.';
        header("refresh:2;url=../profilo.php?uname=" . $_POST['username']);
    }