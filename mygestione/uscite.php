<?php 
    session_start();
    include_once 'header.php';
    include_once 'lib/arrays.php';
    if(!$_SESSION['logged']){
        header("refresh:0;url=nopermission.php");
    }
?>

<div class="container-fluid">
    <div class="pagetitle"><h1>Tabella Uscite</h1></div>
    <br />
    
    <div class="centered-no-shadow">
        <form action="lib/uscite.php" method="post">
            <table class="regilog" style="margin-bottom: 25px;">
                <tr class="heading">
                    <td colspan="2">Aggiungi Spesa</td>
                </tr>
                <tr>
                    <td>Cliente</td>
                    <td><input type="text" name="rifcli" /></td>
                </tr>
                <tr>
                    <td>Prodotto</td>
                    <td><input type="text" name="rifpro" /></td>
                </tr>
                <tr>
                    <td>Spesa</td>
                    <td><input type="text" name="entita" /></td>
                </tr>
                <tr>
                    <td>Data Spesa</td>
                    <td><input type="text" name="dataora" /></td>
                </tr>
                <tr>
                    <td>Altro</td>
                    <td><input type="text" name="altro" /></td>
                </tr>
                <tr>
                    <td>Note</td>
                    <td><input type="text" name="note" /></td>
                </tr>
                <tr>
                    <td colspan="2"><button type="submit" class="btn btn-primary" name="addfatt">Aggiungi Spesa</button></td>
                </tr>
            </table>
        </form>
    </div>

    <div class="d-none d-sm-none d-md-block d-lg-block" style="margin-bottom: 25px;">
        <table class="regilog">
            <tr class="heading-piccolo">
                <td>ID Spesa</td>
                <td>Cliente</td>
                <td>Prodotto</td>
                <td>Data Spesa</td>
                <td>Spesa</td>
                <td>Altro</td>
                <td>Note</td>
            </tr>
            <?php 
                $totnetto = 0;
                $totprocapite = 0;
                foreach($usciteArr['id'] as $f => $v):?>
                <?php
                    $clientusc = $usciteArr['rifcli'][array_search($v, $usciteArr['id'])];
                    $prodottousc = $usciteArr['rifpro'][array_search($v, $usciteArr['id'])];
                    $dataorausc = $usciteArr['dataora'][array_search($v, $usciteArr['id'])];
                    $lordousc = $usciteArr['entita'][array_search($v, $usciteArr['id'])];
                    $notusc = $usciteArr['note'][array_search($v, $usciteArr['id'])];
                    $altrousc = $usciteArr['altro'][array_search($v, $usciteArr['id'])];
                    $totnetto += $lordousc;
                ?>
                <tr>
                    <td><?=$v;?></td>
                    <td><?=$clientusc;?></td>
                    <td><?=$prodottousc;?></td>
                    <td><?=date("Y-m-d", $dataorausc);?></td>
                    <td><?=number_format($lordousc, 2, '.', '') . "€";?></td>
                    <td><?=$altrousc;?></td>
                    <td><?=$notusc;?></td>
                </tr>

            <?php endforeach; ?>
            <tr>
                <td class="heading" colspan="6">TOT. Spese</td>
                <td><?=number_format($totnetto, 2, '.', '') . "€";?></td>
            </tr>
        </table>
    </div>

    <div class="d-xs-block d-sm-block d-md-none d-lg-none" style="margin-bottom: 25px;">
            <?php 
                $totnetto = 0;
                $totprocapite = 0;
                foreach($usciteArr['id'] as $f => $v):?>
                <?php
                    $clientusc = $usciteArr['rifcli'][array_search($v, $usciteArr['id'])];
                    $prodottousc = $usciteArr['rifpro'][array_search($v, $usciteArr['id'])];
                    $dataorausc = $usciteArr['dataora'][array_search($v, $usciteArr['id'])];
                    $lordousc = $usciteArr['entita'][array_search($v, $usciteArr['id'])];
                    $notusc = $usciteArr['note'][array_search($v, $usciteArr['id'])];
                    $altrousc = $usciteArr['altro'][array_search($v, $usciteArr['id'])];
                    $totnetto += $lordousc;
                ?>

            <div class="centered" style="margin-bottom: 25px;">
                <h4 style="margin-bottom: 25px;"><?=$v;?></h4>
                <p><b>Cliente: </b><?=$clientusc;?></p>
                <p><b>Prodotto: </b><?=$prodottousc;?></p>
                <p><b>Data Incasso: </b><?=date("Y-m-d", $dataorausc);?></p>
                <p><b>Incasso Lordo: </b><?=number_format($lordousc, 2, '.', '') . "€";?></p>
                <p><b>Altro: </b><?=$altrousc;?></p>
                <p><b>Note: </b><?=$notusc;?></p>
            </div>
        <?php endforeach; ?>
            <div class="centered" style="margin-bottom: 25px;">
                <h4>TOT Spese</h4>
                <p style="background-color: yellow;"><?=number_format($totnetto, 2, '.', '') . "€";?></p>
            </div>
    </div>



</div>

<?php
    include_once 'footer.php';
?>