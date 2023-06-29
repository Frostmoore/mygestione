<?php
    session_start();
    include_once 'arrays.php';
    if(!$_SESSION['logged']){
        header("refresh:0;url=../nopermission.php");
    }

    if(isset($_POST['nuovanota'])){
        $nota = mysqli_real_escape_string($conn, $_POST['nota']);
        $creaby = $_SESSION['username'];
        $sql = "INSERT INTO note (created, nota, modified, creaby) VALUES (?, ?, ?, ?)";
        $created = date(strtotime('now'));
        $modified = date(strtotime('now'));
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssss", $created, $nota, $modified, $creaby);
        $stmt->execute();
        $stmt->close();
        $conn->close();
        echo "Nuova nota creata con successo! Sarai reindirizzato alla Dashboard tra 2 secondi.";
        header("refresh:2;url=../index.php");
    } elseif(isset($_POST['editnota'])){
        $nota = mysqli_real_escape_string($conn, $_POST['notanew']);
        $id = mysqli_real_escape_string($conn, $_POST['idnota']);
        $modified = date(strtotime('now'));
        $sql = "UPDATE note SET nota = ?, modified = ? WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sss", $nota, $modified, $id);
        $stmt->execute();
        $stmt->close();
        $conn->close();
        echo "Nota modificata con successo! Sarai reindirizzato alla Dashboard tra 2 secondi.";
        header("refresh:2;url=../index.php");
    } else {
        echo 'Non so per quale motivo sei qui, ma se non clicchi su "Crea Nota" o "Edit", questa pagina è completamente inutile. Sarai reindirizzato alla Dashboard molto presto.... Shazam!!';
        header("refresh:2;url=../index.php");
    }
?>