<?php
    session_start();
    include_once 'header.php';
    include_once 'lib/arrays.php';
    if(!$_SESSION['logged']){
        header("refresh:0;url=nopermission.php");
    }
?>


<div class="container-fluid">
    <div class="pagetitle"><h1>prodotti</h1></div>
    <br />

    <?php if(empty($prodottiArr['id'])):?>

        <h3 style="text-align:center;">Ancora non ci sono Prodotti</h3>

    <?php else:?>
        <div class="d-none d-sm-none d-md-block d-lg-block">
            <table class="regilog">
                <tr class="heading-piccolo">
                    <td>Nome Prodotto</td>
                    <td>Rif. Clienti</td>
                    <td>Note</td>
                    <td>Edit</td>
                    <td>Elimina</td>
                </tr>
                <?php foreach($prodottiArr['id'] as $f=>$v):?>
                <?php
                    $np = $prodottiArr['nomeprodotto'][array_search($v, $prodottiArr['id'])];
                    $cliepro = $prodottiArr['clienti'][array_search($v, $prodottiArr['id'])];
                    $nop = $prodottiArr['note'][array_search($v, $prodottiArr['id'])];
                ?>
                    <tr>
                        <td><?=$np;?></td>
                        <td><?=$cliepro;?></td>
                        <td><?=$nop;?></td>
                        <td><form action="newprod.php?id=<?=$v;?>&editprod=true" method="get"><button name="editprod" class="btn btn-warning" type="submit">Edit</button><input type="text" name="prodid" style="display:none;" value="<?=$v;?>"/></form></td>
                        <td><form action="lib/newprod.php" method="post"><button name="deleteprod" class="btn btn-danger" type="submit">Elimina</button><input type="text" style="display:none;" name="id" value="<?=$v;?>" /></form></td>
                    </tr>
                <?php endforeach;?>
            </table>
        </div>

        <div class="d-xs-block d-sm-block d-md-none d-lg-none">
            
            <?php foreach($prodottiArr['id'] as $f=>$v):?>
                <?php
                    $np = $prodottiArr['nomeprodotto'][array_search($v, $prodottiArr['id'])];
                    $cliepro = $prodottiArr['clienti'][array_search($v, $prodottiArr['id'])];
                    $nop = $prodottiArr['note'][array_search($v, $prodottiArr['id'])];
                ?>
                <div class="centered" style="margin-bottom:25px;">
                    <h4><?= $np; ?></h4>
                    <p><b>ID Prodotto: </b><?=$v;?></p>
                    <p><b>Storico Clienti: </b></p>
                    <ul>
                        <?php
                            foreach(explode("+", $cliepro) as $p){
                                echo '<li>' . $p . '</li>';
                            }
                        ?>
                    </ul>
                    <p><b>Prezzi: </b><?=$nop;?></p>
                    <br />
                    <div class="centerbtn">
                        <form action="newprod.php?id=<?=$v;?>&editprod=true" method="get"><button name="editprod" class="btn btn-warning" type="submit">Edit</button><input type="text" name="prodid" style="display:none;" value="<?=$v;?>"/></form>
                        <br />
                        <form action="lib/newprod.php" method="post"><button name="deleteprod" class="btn btn-danger" type="submit">Elimina</button><input type="text" style="display:none;" name="id" value="<?=$v;?>" /></form>
                    <br />
                    </div>

                </div>
                
            <?php endforeach;?>
        </div>

    <?php endif;?>
    <br />
    <form action="newprod.php" method="post" style="text-align: center;"><button type="submit" name="newprod" class="btn btn-primary">Aggiungi Prodotto</button></form>
    <br />
</div>


<?php
    include_once 'footer.php';
?>