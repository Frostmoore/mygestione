<?php
    session_start();
    include_once 'arrays.php';
    if(!$_SESSION['logged']){
        header("refresh:0;url=../nopermission.php");
    }

    if(isset($_POST['editcliente'])){
        $id = mysqli_real_escape_string($conn, $_POST['id']);
        $nomecliente = mysqli_real_escape_string($conn, $_POST['nomecliente']);
        $tel = mysqli_real_escape_string($conn, $_POST['tel']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $prodotticliente = mysqli_real_escape_string($conn, $_POST['prodotti']);
        $notecliente = mysqli_real_escape_string($conn, $_POST['note']);

        $sql = "UPDATE clienti SET nome_cliente = ?, tel = ?, email = ?, prodotti = ?, note = ? WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssssss", $nomecliente, $tel, $email, $prodotticliente, $notecliente, $id);
        $stmt->execute();
        $stmt->close();
        $conn->close();
        echo "Cliente " . $nomecliente . " aggiornato con successo! Sarai reindirizzato alla pagina dei clienti tra 2 secondi.";
        header("refresh:2;url=../clienti.php");
    } else {
        header("refresh:0;url=../nopermission.php");
    }