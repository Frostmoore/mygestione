<?php
    session_start();
    include_once 'header.php';
    include_once 'lib/arrays.php';
    if(!$_SESSION['logged']){
        header("refresh:0;url=nopermission.php");
    }

?>

<div class="container-fluid">

    <?php if(isset($_GET['edituser'])): ?>
        <?php
            if(isset($_GET['id'])){
                $id = mysqli_real_escape_string($conn, $_GET['id']);
            } else {
                $id = $utenti['id'][array_search($_SESSION['username'], $utenti['username'])];
            }
            $username = $utenti['username'][array_search($id, $utenti['id'])];
            $email = $utenti['email'][array_search($id, $utenti['id'])];
            $ruolo = $utenti['ruolo'][array_search($id, $utenti['id'])];
        ?>
        <div class="pagetitle"><h1>Modifica Profilo</h1></div>
            <br />
            <h3>Informazioni Profilo</h3>
            <br />
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 profinfo" style="padding: 10px;">
            <br />
            <div><h3>Profilo n. <b><?=$id?></b></h3></div>
            <br />
            <div class="form-center">
                <form action="lib/edituser.php" method="post">
                
                    <label for="username">Nome Utente: </label>
                    <input type="text" id="username" name="username" value="<?=$username?>" />
                    <br />

                    <label for="email">Email: </label>
                    <input type="text" id="email" name="email" value="<?=$email?>" />
                    <br />

                    <label for="ruolo">Ruolo: </label> 
                    <input type="text" id="ruolo" name="ruolo" value="<?=$ruolo?>" />
                    <input type="text" name="id" style="display:none;" value="<?=$id;?>" />
                    <br />

                    <button type="submit" class="btn btn-warning" name="editutente" style="margin-top: 25px;">Salva</button>
            
                </form>
            </div>
        </div>
        
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 profipass">
            <br />
            <h3>Modifica Password</h3>
            <br />
            <div class="form-center">
                <form action="lib/editpw.php" method="post">
                
                    <label for="password">Password: </label>
                    <input type="password" id="password" name="password" />
                    <br />

                    <label for="confirm">Conferma: </label>
                    <input type="password" id="confirm" name="confirm" />
                    <input type="text" name="id" style="display: none;" value="<?=$id?>" />
                    <br />

                    <button type="submit" class="btn btn-warning" name="editpw" style="margin-top: 25px;">Cambia Password</button>
                
                </form>
            </div>
        </div>

        <?php elseif($_GET['uname'] == $_SESSION['username']): ?>
        <?php 
            $username = mysqli_real_escape_string($conn, $_GET['uname']);
            $id = $utenti['id'][array_search($username, $utenti['username'])];
            $email = $utenti['email'][array_search($username, $utenti['username'])];
            $ruolo = $utenti['ruolo'][array_search($username, $utenti['username'])];
        ?>
        <div class="pagetitle"><h1>Profilo Personale</h1></div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 profinfonoform">
            <br />
            <h3>Informazioni Profilo</h3>
            <br />
            <div class="profilid" style="padding: 10px;display: inline-block; position:relative; transform: translateX(-50%); left: 50%;"><h3>Profilo n. <b><?=$id;?></b></h3>
                <br />

                <h4>Username: </h4><p><?=$username;?></p>
                <h4>Email: </h4><p><?=$email;?></p>
                <h4>Ruolo: </h4><p><?=$ruolo;?></p>
                <br />
                <form action="profilo.php?id=<?=$id;?>" method="get">
                    <button type="submit" class="btn btn-warning" name="edituser">Edit</button>
                    <br />
                </form>
            </div>
        </div>

        <?php else:?>
        <?php
            header("refresh:0;url=nopermission.php");
        ?>


    <?php endif; ?>
</div>

<?php
    include_once 'footer.php';
?>