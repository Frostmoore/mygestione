<?php 
    session_start();
    include_once 'header.php';
    include_once 'lib/arrays.php';
    if(!$_SESSION['logged']){
        header("refresh:0;url=nopermission.php");
    }
    $id = $_GET['id'];
    $nomecliente = $clienti['nomecliente'][array_search($id, $clienti['id'])];
    $tel = $clienti['tel'][array_search($id, $clienti['id'])];
    $email =  $clienti['email'][array_search($id, $clienti['id'])];
    $prodotti = $clienti['prodotti'][array_search($id, $clienti['id'])];
    $note =  $clienti['note'][array_search($id, $clienti['id'])];

?>

<div class="container-fluid">

    <div class="pagetitle"><h1><?=$nomecliente;?></h1></div>

    <div class="centered">
        <p><b>ID Cliente: </b><?=$id;?></p>
        <p><b>Numero di Telefono: </b><a href="tel:<?=$tel;?>"><?=$tel;?></a>
        <p><b>Indirizzo e-mail: </b><a href="mailto:<?=$email;?>"><?=$email;?></a>
        <p><b>Storico Prodotti acquistati: </b><ul>
            <?php
                foreach(explode("+", $prodotti) as $p){
                    echo '<li>' . $p . '</li>';
                }
            ?>
        </ul>
        <p><b>Note: </b><?=$note;?></p>
        <div class=" centerbtn">
            <form action="editcliente.php?id=<?=$id;?>&edit=true" method="get"><button type="submit" name="editcli" class="btn btn-warning">Edit</button><input type="text" name="id" value="<?=$id;?>" style="display:none;" /></form>
        </div>

    </div>

</div>
<?php
    include_once 'footer.php';
?>