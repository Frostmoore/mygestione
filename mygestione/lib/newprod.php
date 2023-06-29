<?php
    session_start();
    include_once 'arrays.php';
    if(!$_SESSION['logged']){
        header("refresh:0;url=nopermission.php");
    }

    if(isset($_POST['newprod'])){
        $nomeprod = mysqli_real_escape_string($conn, $_POST['nomeprodotto']);
        $clientiprod = mysqli_real_escape_string($conn, $_POST['clienti']);
        $noteprodotto = mysqli_real_escape_string($conn, $_POST['note']);

        $sql = "INSERT INTO prodotti (nome_prodotto, clienti, note) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sss", $nomeprod, $clientiprod, $noteprodotto);
        $stmt->execute();
        $stmt->close();
        $conn->close();

        echo "Prodotto " . $nomeprod . "modificato con successo! Sarai reindirizzato alla pagina Prodotti tra 2 secondi.";
        header("refresh:2;url=../prodotti.php");
    }

    if(isset($_POST['deleteprod'])){
        $sql = "DELETE FROM prodotti WHERE id = ?";
        $id = mysqli_real_escape_string($conn, $_POST['id']);
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $id);
        $stmt->execute();
        $stmt->close();
        $conn->close();
        header("refresh:0;url=../prodotti.php");
    }

    if(isset($_POST['editprod'])){
        $nomeprod = mysqli_real_escape_string($conn, $_POST['nomeprodotto']);
        $clientiprod = mysqli_real_escape_string($conn, $_POST['clienti']);
        $noteprodotto = mysqli_real_escape_string($conn, $_POST['note']);
        $id = mysqli_real_escape_string($conn, $_POST['prodid']);

        $sql = "UPDATE prodotti SET nome_prodotto = ?, clienti = ?, note = ? WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssss", $nomeprod, $clientiprod, $noteprodotto, $id);
        $stmt->execute();
        $stmt->close();
        $conn->close();

        echo "Prodotto " . $nomeprod . "inserito con successo! Sarai reindirizzato alla pagina Prodotti tra 2 secondi.";
        header("refresh:2;url=../prodotti.php");
    }
?>