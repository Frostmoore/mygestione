<?php
    session_start();
    include_once 'header.php';
    include_once 'lib/arrays.php';
    if(!$_SESSION['logged']){
        header("refresh:0;url=login.php");
    }
?>

<?php if(!$_SESSION['logged']):?>
<?php header("refresh:0;url=login.php");?>
<?php else: ?>

<div class="container-fluid">
    <div class="pagetitle"><h1>Dashboard</h1></div>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4 note">
            <h3>Note</h3>
            <br/>
            <?php if(empty($note['id'])): ?>
                <div class="nota">
                    <br />
                    <h4>Non ci sono note</h4>
                    <a class="btn btn-primary creanota" href="creanota.php">Creane Una</a>
                </div>
            <?php else: ?>
                <?php foreach($note['id'] as $n): ?>
                    <div class="nota">
                        <div class="notastrumenti">
                        <a class="btn btn-danger eliminanota" href="lib/deletenote.php?id=<?=$n?>&elimina=true">Elimina</a>
                        <a class="btn btn-warning editanota" href="editanota.php?id=<?=$n?>&edit=true">Edit</a>
                        </div>
                        <div class="gestcontent">
                            <p class="notedata"><b><?= date("d-m-Y H:m", $note['created'][array_search($n, $note['id'])]); ?></b></p>
                            <p class="noteby">by <i><?= $note['by'][array_search($n, $note['id'])]; ?></i></p>
                            <p class="testonota"><?= stripslashes($note['nota'][array_search($n, $note['id'])]); ?></p>
                            <?php if(date($note['created'][array_search($n, $note['id'])]) !== date($note['modified'][array_search($n, $note['id'])])):?>
                                <p class="notedata" style="max-width: 100%;">Edit: <b><?= date("d-m-Y H:m", $note['modified'][array_search($n, $note['id'])]); ?></b></p>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
                <a class="btn btn-primary creanota" href="creanota.php">Crea una Nota</a><br />
            <?php endif; ?>
        </div>


        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-8 note">
            <h3>Finanze</h3>
            <br/>
            <div class="nota" style="display: block;">
                <div class="notastrumenti">
                    <h4 style="text-align: center; color: white;width: 100%;margin-bottom: 0;">Report Finanziario Generale</h4>
                </div>
                <div class="gestcontent">
                    <?php 
                        $uscitetot = 0;
                        $entratetot = 0;
                        foreach($usciteArr['id'] as $k=>$v){
                            $uscitetot += floatval($usciteArr['entita'][array_search($v, $usciteArr['id'])]);
                        }
                        foreach($entrateArr['id'] as $k=>$v){
                            $entratetot += floatval($entrateArr['entita'][array_search($v, $entrateArr['id'])]);
                        }
                        $uscitetot = number_format($uscitetot, 2, '.', '') . ' €';
                        $impon = ($entratetot / 100) * 78;
                        $contri = ($entratetot / 100) * 27;
                        $tassa = ($impon / 100) * 5;
                        $anti = ($contri + $tassa) / 2;
                        $tottasse = $contri + $tassa + $anti;
                        $entratetot = $entratetot - $tottasse;
                        $entratetot = number_format($entratetot, 2, '.', '') . ' €';
                        $netto = $entratetot - $uscitetot;
                        $procap = $netto/3;
                        //echo $uscitetot . '</br>';
                        //echo $entratetot . '</br>';
                    ?>

                    <div class="row">
                        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 repocont">
                            <h4>Uscite</h4>
                            <div class="reportuscite">
                                <h3><a href="uscite.php"><?=$uscitetot;?></a></h3>
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 repocont">
                            <h4>Netto</h4>
                            <div class="reportnetto" style="<?php if($netto > 0){echo 'background-color: rgb(162, 255, 162)';}else{echo 'background-color: rgb(255, 131, 131)';}?>">
                                <h1><?=$netto;?> €</h1>
                            </div>

                            <h4 style="margin-top: 10px;">Pro Capite</h4>
                            <div class="reportnetto" style="<?php if($netto > 0){echo 'background-color: rgb(162, 255, 162)';}else{echo 'background-color: rgb(255, 131, 131)';}?>">
                                <h1><?=number_format($procap, 2, ',', '');?> €</h1>
                            </div>

                        </div>

                        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 repocont">
                            <h4>Entrate</h4>
                            <div class="reportentrate">
                                <h3><a href="entrate.php"><?=$entratetot;?></a></h3>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>


</div>
<?php endif; ?>

<?php 
    include_once 'footer.php';
?>
