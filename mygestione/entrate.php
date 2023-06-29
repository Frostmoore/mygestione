<?php 
    session_start();
    include_once 'header.php';
    include_once 'lib/arrays.php';
    if(!$_SESSION['logged']){
        header("refresh:0;url=nopermission.php");
    }
?>

<div class="container-fluid">
    <div class="pagetitle"><h1>Tabella Entrate</h1></div>
    <br />
    
    <div class="centered-no-shadow">
        <form action="lib/entrate.php" method="post">
            <table class="regilog" style="margin-bottom: 25px;">
                <tr class="heading">
                    <td colspan="2">Aggiungi Fattura</td>
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
                    <td>Incasso Lordo</td>
                    <td><input type="text" name="entita" /></td>
                </tr>
                <tr>
                    <td>Data Incasso</td>
                    <td><input type="text" name="dataora" /></td>
                </tr>
                <tr>
                    <td>Preso da</td>
                    <td><input type="text" name="note" /></td>
                </tr>
                <tr>
                    <td colspan="2"><button type="submit" class="btn btn-primary" name="addfatt">Aggiungi Fattura</button></td>
                </tr>
            </table>
        </form>
    </div>

    <div class="d-none d-sm-none d-md-block d-lg-block" style="margin-bottom: 25px;">
        <table class="regilog">
            <tr class="heading-piccolo">
                <td>ID Fattura</td>
                <td>Cliente</td>
                <td>Prodotto</td>
                <td>Data Incasso</td>
                <td>Incasso Lordo</td>
                <td>TOT Tasse</td>
                <td>Guadagno</td>
                <td>Procapite</td>
                <td>Preso da</td>
            </tr>
            <?php 
                $totnetto = 0;
                $totprocapite = 0;
                foreach($entrateArr['id'] as $f => $v):?>
                <?php
                    $cliententr = $entrateArr['rifcli'][array_search($v, $entrateArr['id'])];
                    $prodottoentr = $entrateArr['rifpro'][array_search($v, $entrateArr['id'])];
                    $dataoraentr = $entrateArr['dataora'][array_search($v, $entrateArr['id'])];
                    $lordoentr = $entrateArr['entita'][array_search($v, $entrateArr['id'])];
                    $notentr = $entrateArr['note'][array_search($v, $entrateArr['id'])];
                    $imponibile = (floatval($lordoentr) / 100) * 78;
                    $impsost = ($imponibile / 100) * 5;
                    $contr = (floatval($lordoentr) / 100) * 27;
                    $anticipo = ($contr + $impsost) / 2;
                    $totasse = $impsost + $anticipo + $contr;
                    $guadagno = $lordoentr - $totasse;
                    $procapite = $guadagno / 3;
                    $totnetto += $guadagno;
                    $totprocapite += $procapite;
                ?>
                <tr>
                    <td><?=$v;?></td>
                    <td><?=$cliententr;?></td>
                    <td><?=$prodottoentr;?></td>
                    <td><?=date("Y-m-d", $dataoraentr);?></td>
                    <td><?=number_format($lordoentr, 2, '.', '') . "€";?></td>
                    <td><?=number_format($totasse, 2, '.', '') . "€";?></td>
                    <td><?=number_format($guadagno, 2, '.', '') . "€";?></td>
                    <td><?=number_format($procapite, 2, '.', '') . "€";?></td>
                    <td><?=$notentr;?></td>
                </tr>

            <?php endforeach; ?>
            <tr>
                <td class="heading" colspan="6">TOT. Netto</td>
                <td><?=number_format($totnetto, 2, '.', '') . "€";?></td>
            </tr>
            <tr>
                <td class="heading" colspan="7">TOT. Pro Capite</td>
                <td><?=number_format($totprocapite, 2, '.', '') . "€";?></td>
            </tr>
        </table>
    </div>

    <div class="d-xs-block d-sm-block d-md-none d-lg-none" style="margin-bottom: 25px;">
            <?php 
                $totnetto = 0;
                $totprocapite = 0;
                foreach($entrateArr['id'] as $f => $v):?>
                <?php
                    $cliententr = $entrateArr['rifcli'][array_search($v, $entrateArr['id'])];
                    $prodottoentr = $entrateArr['rifpro'][array_search($v, $entrateArr['id'])];
                    $dataoraentr = $entrateArr['dataora'][array_search($v, $entrateArr['id'])];
                    $lordoentr = $entrateArr['entita'][array_search($v, $entrateArr['id'])];
                    $notentr = $entrateArr['note'][array_search($v, $entrateArr['id'])];
                    $imponibile = (floatval($lordoentr) / 100) * 78;
                    $impsost = ($imponibile / 100) * 5;
                    $contr = (floatval($lordoentr) / 100) * 27;
                    $anticipo = ($contr + $impsost) / 2;
                    $totasse = $impsost + $anticipo + $contr;
                    $guadagno = $lordoentr - $totasse;
                    $procapite = $guadagno / 3;
                    $totnetto += $guadagno;
                    $totprocapite += $procapite;
                ?>

            <div class="centered" style="margin-bottom: 25px;">
                <h4 style="margin-bottom: 25px;"><?=$v;?></h4>
                <p><b>Cliente: </b><?=$cliententr;?></p>
                <p><b>Prodotto: </b><?=$prodottoentr;?></p>
                <p><b>Data Incasso: </b><?=date("Y-m-d", $dataoraentr);?></p>
                <p><b>Incasso Lordo: </b><?=number_format($lordoentr, 2, '.', '') . "€";?></p>
                <p><b>TOT Tasse: </b><?=number_format($totasse, 2, '.', '') . "€";?></p>
                <p style="background-color: lightyellow"><b>Guadagno: </b><?=number_format($guadagno, 2, '.', '') . "€";?></p>
                <p style="background-color: lightgreen"><b>Procapite: </b><?=number_format($procapite, 2, '.', '') . "€";?></p>
                <p><b>Preso da: </b><?=$notentr;?></p>
            </div>
        <?php endforeach; ?>
            <div class="centered" style="margin-bottom: 25px;">
                <h4>TOT netto</h4>
                <p style="background-color: yellow;"><?=number_format($totnetto, 2, '.', '') . "€";?></p>
                <h4>TOT Pro Capite</h4>
                <p style="background-color: green;"><?=number_format($totprocapite, 2, '.', '') . "€";?>
            </div>
    </div>



</div>

<?php
    include_once 'footer.php';
?>