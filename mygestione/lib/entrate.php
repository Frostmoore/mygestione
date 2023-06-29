<?php 
    session_start();
    include_once 'arrays.php';
    if(!$_SESSION['logged']){
        header("refresh:0;url=nopermission.php");
    }

    if(isset($_POST['addfatt'])){
        $rifclientr = $_POST['rifcli'];
        $rifproentr = $_POST['rifpro'];
        $entitaentr = $_POST['entita'];
        $dataorentr = DateTime::createFromFormat('Y-m-d', $_POST['dataora']);
        $dataorentr = $dataorentr->getTimeStamp();
        $presodentr = $_POST['note'];

        $sql = "INSERT INTO entrate (rifcli, rifpro, entita, dataora, note) VALUES (?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssss", $rifclientr, $rifproentr, $entitaentr, $dataorentr, $presodentr);
        $stmt->execute();
        $stmt->close();
        $conn->close();
        echo 'Fattura del <b>' . date("Y-m-d", $dataorentr) . '</b> inserita con successo! Sarai reindirizzato alla pagina delle Entrate tra 2 secondi.';
        header("refresh:2;url=../entrate.php");
    }

?>