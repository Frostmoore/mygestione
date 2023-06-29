<?php 
    session_start();
    include_once 'header.php';
    include_once 'lib/arrays.php';
    if(!$_SESSION['logged']){
        header("refresh:0;url=nopermission.php");
    }
?>

<div class="container-fluid">

    <div class="pagetitle"><h1>Clienti</h1></div>


    <?php if(empty($clienti['id'])):?>

        <br />
        <h3>Ancora non ci sono clienti.</h3>
        <br />
        <form action="newcustomer.php" method="post" style="text-align: center;">
            <button type="submit" class="btn btn-primary" name="newcustomer">Aggiungi Clienti</button>
        </form>
    
    <?php else:?>
        <div class="d-none d-sm-none d-md-block d-lg-block">
            <table class="regilog">
                <tr class="heading-piccolo">
                    <td >Nome Cliente</td>
                    <td >Telefono Cliente</td>
                    <td >Email Cliente</td>
                    <td >Rif. Prodotti</td>
                    <td >Note Cliente</td>
                    <td >Edit</td>
                </tr>

                <?php foreach($clienti['id'] as $f=>$v): ?>
                <?php 
                    $nomecliente = $clienti['nomecliente'][array_search($v, $clienti['id'])];
                    $tel = $clienti['tel'][array_search($v, $clienti['id'])];
                    $email =  $clienti['email'][array_search($v, $clienti['id'])];
                    $prodotti = $clienti['prodotti'][array_search($v, $clienti['id'])];
                    $note =  $clienti['note'][array_search($v, $clienti['id'])];
                ?>
                    <tr >
                        <td><a href="cliente.php?id=<?=$v?>"><?=$nomecliente;?></a></td>
                        <td><a href="tel:<?=$tel;?>"><?=$tel;?></a></td>
                        <td><a href="mailto:<?=$email;?>"><?=$email;?></a></td>
                        <td><?=$prodotti;?></td>
                        <td><?=$note;?></td>
                        <td><form action="editcliente.php?id=<?=$v?>&edit=true" method="get"><button type="submit" name="editcli" class="btn btn-warning">Edit</button><input type="text" name="id" value="<?=$v;?>" style="display:none;" /></form></td>
                    </tr>
                    <?php endforeach; ?>

            </table>
            <br />
            <form action="newcustomer.php" method="post" style="text-align: center;">
                <button type="submit" class="btn btn-primary" name="newcustomer">Aggiungi Clienti</button>
            </form>
            <br />
        </div>

        <div class="d-md-none d-lg-none d-xs-block d-sm-block">
                <?php foreach($clienti['id'] as $f=>$v): ?>
                <?php 
                    $nomecliente = $clienti['nomecliente'][array_search($v, $clienti['id'])];
                    $tel = $clienti['tel'][array_search($v, $clienti['id'])];
                    $email =  $clienti['email'][array_search($v, $clienti['id'])];
                    $prodotti = $clienti['prodotti'][array_search($v, $clienti['id'])];
                    $note =  $clienti['note'][array_search($v, $clienti['id'])];
                ?>

            <div class="centered" style="margin-bottom: 25px;">
                <h4><?=$nomecliente;?></h4>
                <p><b>ID Cliente: </b><?=$v;?></p>
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
                    <form action="editcliente.php?id=<?=$v;?>&edit=true" method="get"><button type="submit" name="editcli" class="btn btn-warning">Edit</button><input type="text" name="id" value="<?=$v;?>" style="display:none;" /></form>
                </div>

            </div>
            <?php endforeach; ?>
            <br />
            <form action="newcustomer.php" method="post" style="text-align: center;">
                <button type="submit" class="btn btn-primary" name="newcustomer">Aggiungi Clienti</button>
            </form>
            <br />
        </div>

    <?php endif;?>


</div>
<?php
    include_once 'footer.php';
?>