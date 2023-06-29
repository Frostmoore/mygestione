<?php
    session_start();
    include_once 'arrays.php';
    
    if(!$_SESSION['logged']){
        header("refresh:0;url=../nopermission.php");
    }

    if(isset($_GET['elimina'])){
        $notid = $_GET['id'];
        $sql = "DELETE FROM note WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $notid);
        $stmt->execute();
        $stmt->close();
        $conn->close();
        header("refresh:0;url=../index.php");
    } else {
        echo 'Non so per quale motivo sei qui, ma se non clicchi su "Crea Nota", questa pagina è completamente inutile. Sarai reindirizzato alla Dashboard molto presto.... Shazam!!';
        header("refresh:2;url=../index.php");
    }