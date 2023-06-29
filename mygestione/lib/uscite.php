<?php 
    session_start();
    include_once 'arrays.php';
    if(!$_SESSION['logged']){
        header("refresh:0;url=nopermission.php");
    }

    if(isset($_POST['addfatt'])){
        $rifcliusc = $_POST['rifcli'];
        $rifprousc = $_POST['rifpro'];
        $entitausc = $_POST['entita'];
        $altrousc = $_POST['altro'];
        $dataorusc = DateTime::createFromFormat('Y-m-d', $_POST['dataora']);
        $dataorusc = $dataorusc->getTimeStamp();
        $presodusc = $_POST['note'];

        $sql = "INSERT INTO uscite (rifcli, rifpro, entita, altro, dataora, note) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssssss", $rifcliusc, $rifprousc, $entitausc, $altrousc, $dataorusc, $presodusc);
        $stmt->execute();
        $stmt->close();
        $conn->close();
        echo 'Spesa del <b>' . date("Y-m-d", $dataorusc) . '</b> inserita con successo! Sarai reindirizzato alla pagina delle Uscite tra 2 secondi.';
        header("refresh:2;url=../uscite.php");
    }

?>