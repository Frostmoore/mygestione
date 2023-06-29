<?php
    session_start();
    include_once 'header.php';
    include_once 'lib/arrays.php';
    if(!$_SESSION['logged'] || !$_SESSION['ruolo'] == "admin"){
        header("refresh:0;url=../nopermission.php");
    }
?>

<div class="container-fluid">
    <div class="pagetitle"><h1>Gestione Utenti</h1></div>
    <div class="d-none d-sm-none d-md-block d-lg-block">
        <table class="regilog">
            <tr class="heading-piccolo">
                <td>Nome Utente</td>
                <td>Email</td>
                <td>Ruolo</td>
                <td>Creato</td>
                <td>Modificato</td>
                <td>Edit</td>
            </tr>
            <?php foreach($utenti['id'] as $k => $v): ?>
                <?php 
                    $id = $v;
                    $username = $utenti['username'][array_search($id, $utenti['id'])];
                    $email = $utenti['email'][array_search($id, $utenti['id'])];
                    $ruolo = $utenti['ruolo'][array_search($id, $utenti['id'])];
                    $created = $utenti['created'][array_search($id, $utenti['id'])];
                    $modified = $utenti['modified'][array_search($id, $utenti['id'])];
                ?>
                <tr>
                    <td><?= $username; ?></td>
                    <td><?= $email; ?></td>
                    <td><?= $ruolo; ?></td>
                    <td><?= date("Y-m-d", $created); ?></td>
                    <td><?= date("Y-m-d", $modified); ?></td>
                    <td><form action="profilo.php" method="get"><button type="submit" class="btn btn-warning" name="edituser">Edit</button><input type="text" style="display: none;" value="<?=$id;?>" name="id" /></form></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>

    <div class="d-xs-block d-sm-block d-md-none d-lg-none">
        <?php foreach($utenti['id'] as $k => $v): ?>
            <?php 
                $id = $v;
                $username = $utenti['username'][array_search($id, $utenti['id'])];
                $email = $utenti['email'][array_search($id, $utenti['id'])];
                $ruolo = $utenti['ruolo'][array_search($id, $utenti['id'])];
                $created = $utenti['created'][array_search($id, $utenti['id'])];
                $modified = $utenti['modified'][array_search($id, $utenti['id'])];
            ?>
            <div class="centered" style="margin-bottom: 25px;">
                <h4 style="margin-bottom: 25px;"><?=$username;?></h4>
                <p><b>ID Utente: </b><?=$id;?></p>
                <p><b>Email: </b><?=$email;?></p>
                <p><b>Ruolo Utente: </b><?=$ruolo;?></p>
                <p><b>Creato il: </b><?=date("Y-m-d", $created);?></p>
                <p><b>Ultima Modifica: </b><?=date("Y-m-d", $modified);?></p>
                <div class="centerbtn" style="margin-top: 25px;margin-bottom: 25px;"><form action="profilo.php" method="get"><button type="submit" class="btn btn-warning" name="edituser">Edit</button><input type="text" style="display: none;" value="<?=$id;?>" name="id" /></form>
                </div>
            </div>

        <?php endforeach; ?>
    </div>

</div>

<?php
    include_once 'footer.php';
?>