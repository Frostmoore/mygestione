<?php
    session_start();
    include_once 'arrays.php';
    if(!$_SESSION['logged']){
        header("refresh:0;url=../nopermission.php");
    }

    if(isset($_POST['nuovocliente'])){
        $nomecliente = mysqli_real_escape_string($conn, $_POST['nomecliente']);
        $tel = mysqli_real_escape_string($conn, $_POST['tel']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $prodotti = mysqli_real_escape_string($conn, $_POST['prodotti']);
        $note = mysqli_real_escape_string($conn, $_POST['note']);

        $sql = "INSERT INTO clienti (nome_cliente, tel, email, prodotti, note) VALUES (?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssss", $nomecliente, $tel, $email, $prodotti, $note);
        $stmt->execute();
        $stmt->close();
        $conn->close();

        echo "Cliente " . $nomecliente . "creato con successo! Sarai reindirizzato alla pagina Clienti tra 2 secondi.";
        header("refresh:2;url=../clienti.php");
    }