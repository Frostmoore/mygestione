<?php

    include_once 'database.php';

    /**************************/
    /*         UTENTI         */
    /**************************/
        $utenti = [];
        $id = [];
        $username = [];
        $password = [];
        $ruolo = [];
        $email = [];
        $created = [];
        $modified = [];

        
        $sqlid = "SELECT * FROM utenti";
        $resultid = mysqli_query($conn, $sqlid);
        while($row = mysqli_fetch_assoc($resultid)){
            foreach($row as $f => $v){
                if($f == 'id'){
                    array_push($id, $v);
                }
                if($f == 'username'){
                    array_push($username, $v);
                }
                if($f == 'user_password'){
                    array_push($password, $v);
                }
                if($f == 'email'){
                    array_push($email, $v);
                }
                if($f == 'ruolo'){
                    array_push($ruolo, $v);
                }
                if($f == 'created'){
                    array_push($created, $v);
                }
                if($f == 'modified'){
                    array_push($modified, $v);
                }

            }
            
        }

    $utenti = ['id' => $id, 'username' => $username, 'password' => $password, 'email' => $email, 'ruolo' => $ruolo, 'created' => $created, 'modified' => $modified];



    /**************************/
    /*          NOTE          */
    /**************************/
        $id = [];
        $created = [];
        $modified = [];
        $nota = [];
        $by = [];

        $sqlnote = "SELECT * FROM note ORDER BY id DESC LIMIT 5";
        $resultnote = mysqli_query($conn, $sqlnote);
        while($row = mysqli_fetch_assoc($resultnote)){
            foreach($row as $f => $v){
                if($f == 'id'){
                    array_push($id, $v);
                }
                if($f == 'created'){
                    array_push($created, $v);
                }
                if($f == 'modified'){
                    array_push($modified, $v);
                }
                if($f == 'nota'){
                    array_push($nota, $v);
                }
                if($f == 'creaby'){
                    array_push($by, $v);
                }
            }
        }

    $note = ['id' => $id, 'created' => $created, 'modified' => $modified, 'nota' => $nota, 'by' => $by];



    /**************************/
    /*         CLIENTI        */
    /**************************/
        $id = [];
        $nomecliente = [];
        $tel = [];
        $email = [];
        $prodotti = [];
        $notes = [];

        $sqlclienti = "SELECT * FROM clienti";
        $resultclienti = mysqli_query($conn, $sqlclienti);
        while($row = mysqli_fetch_assoc($resultclienti)){
            foreach($row as $f => $v){
                if($f == 'id'){
                    array_push($id, $v);
                }
                if($f == 'nome_cliente'){
                    array_push($nomecliente, $v);
                }
                if($f == 'tel'){
                    array_push($tel, $v);
                }
                if($f == 'email'){
                    array_push($email, $v);
                }
                if($f == 'prodotti'){
                    array_push($prodotti, $v);
                }
                if($f == 'note'){
                    array_push($notes, $v);
                }
            }
        }
    $clienti = ['id' => $id, 'nomecliente' => $nomecliente, 'tel' => $tel, 'email' => $email, 'prodotti' => $prodotti, 'note' => $notes];



    /**************************/
    /*        PRODOTTI        */
    /**************************/
        $id = [];
        $nomeprodotto = [];
        $clientipro = [];
        $noteprod = [];

        $sqlclienti = "SELECT * FROM prodotti ORDER BY id ASC";
        $resultclienti = mysqli_query($conn, $sqlclienti);
        while($row = mysqli_fetch_assoc($resultclienti)){
            foreach($row as $f => $v){
                if($f == 'id'){
                    array_push($id, $v);
                }
                if($f == 'nome_prodotto'){
                    array_push($nomeprodotto, $v);
                }
                if($f == 'clienti'){
                    array_push($clientipro, $v);
                }
                if($f == 'note'){
                    array_push($noteprod, $v);
                }
            }
        }
    $prodottiArr = ['id' => $id, 'nomeprodotto' => $nomeprodotto, 'clienti' => $clientipro, 'note' => $noteprod];
    


    /**************************/
    /*         ENTRATE        */
    /**************************/

        $identrate = [];
        $rifclientrate = [];
        $rifproentrate = [];
        $entitaentrate = [];
        $dataoraentrate = [];
        $notentrate = [];

        $sqlentrate = "SELECT * FROM entrate ORDER BY id DESC";
        $resultentrate = mysqli_query($conn, $sqlentrate);
        while($row = mysqli_fetch_assoc($resultentrate)){
            foreach($row as $f => $v){
                if($f == 'id'){
                    array_push($identrate, $v);
                }
                if($f == 'rifcli'){
                    array_push($rifclientrate, $v);
                }
                if($f == 'rifpro'){
                    array_push($rifproentrate, $v);
                }
                if($f == 'entita'){
                    array_push($entitaentrate, $v);
                }
                if($f == 'dataora'){
                    array_push($dataoraentrate, $v);
                }
                if($f == 'note'){
                    array_push($notentrate, $v);
                }

            }
        }
    $entrateArr = ['id' => $identrate, 'rifcli' => $rifclientrate, 'rifpro' => $rifproentrate, 'entita' => $entitaentrate, 'dataora' => $dataoraentrate, 'note' => $notentrate];
    


    /**************************/
    /*         USCITE         */
    /**************************/

        $iduscite = [];
        $rifclientuscite = [];
        $rifprouscite = [];
        $entitauscite = [];
        $dataorauscite = [];
        $altrouscite = [];
        $notuscite = [];

        $sqluscite = "SELECT * FROM uscite ORDER BY id DESC";
        $resultuscite = mysqli_query($conn, $sqluscite);
        while($row = mysqli_fetch_assoc($resultuscite)){
            foreach($row as $f => $v){
                if($f == 'id'){
                    array_push($iduscite, $v);
                }
                if($f == 'rifcli'){
                    array_push($rifclientuscite, $v);
                }
                if($f == 'rifpro'){
                    array_push($rifprouscite, $v);
                }
                if($f == 'entita'){
                    array_push($entitauscite, $v);
                }
                if($f == 'dataora'){
                    array_push($dataorauscite, $v);
                }
                if($f == 'altro'){
                    array_push($altrouscite, $v);
                }
                if($f == 'note'){
                    array_push($notuscite, $v);
                }

            }
        }
    $usciteArr = ['id' => $iduscite, 'rifcli' => $rifclientuscite, 'rifpro' => $rifprouscite, 'entita' => $entitauscite, 'dataora' => $dataorauscite, 'note' => $notuscite, 'altro' => $altrouscite];
?>