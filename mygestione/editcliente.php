<?php
    session_start();
    include_once 'header.php';
    include_once 'lib/arrays.php';
    if(!$_SESSION['logged']){
        header("refresh:0;url=nopermission.php");
    }
    $id = $_GET['id'];
    $edit = $_GET['editcli'];
    $nomecliente = $clienti['nomecliente'][array_search($id, $clienti['id'])];
    $tel = $clienti['tel'][array_search($id, $clienti['id'])];
    $email = $clienti['email'][array_search($id, $clienti['id'])];
    $prodotticliente = $clienti['prodotti'][array_search($id, $clienti['id'])];
    $notecliente = $clienti['note'][array_search($id, $clienti['id'])];
?>
<div class="container-fluid">
    <div class="pagetitle"><h1>Edit Cliente</h1></div>
    <br />

    <?php if(isset($edit)): ?>
        <table class="regilog">
            <tr class="heading">
                <td colspan="2">Modifica Info Cliente</td>
            </tr>
            <form action="lib/editcliente.php" method="post">
                <tr>
                    <td>Nome Cliente</td>
                    <td><input type="text" name="nomecliente" value="<?=$nomecliente;?>" /></td>
                </tr>
                <tr>
                    <td>Telefono Cliente</td>
                    <td><input type="text" name="tel" value="<?=$tel;?>" /></td>
                </tr>
                <tr>
                    <td>Email Cliente</td>
                    <td><input type="text" name="email" value="<?=$email;?>" /></td>
                </tr>
                <tr>
                    <td>Rif. Prodotti</td>
                    <td><input type="text" name="prodotti" value="<?=$prodotticliente;?>" /></td>
                </tr>
                <tr>
                    <td>Note Cliente</td>
                    <td><input type="text" name="note" value="<?=$notecliente;?>" /></td>
                </tr>
                <tr>
                    <td colspan="2"><button type="submit" name="editcliente" class="btn btn-primary">Salva Cliente</button><input type="text" style="display:none;" value="<?=$id;?>" name="id" /> </td>
                </tr>
            </form>
        </table>
    <?php endif; ?>

</div>