<?php
    session_start();
    include_once 'header.php';
    include_once 'lib/arrays.php';
    if(!$_SESSION['logged']){
        header("refresh:0;url=nopermission.php");
    }
    $edit = $_GET['editprod'];
    $id = $_GET['prodid'];
    $nomprod = $prodottiArr['nomeprodotto'][array_search($id, $prodottiArr['id'])];
    $rifcli = $prodottiArr['clienti'][array_search($id, $prodottiArr['id'])];
    $nop = $prodottiArr['note'][array_search($id, $prodottiArr['id'])];
?>

<?php if(isset($edit)):?>
    <div class="container-fluid">
        <div class="pagetitle"><h1>aggiungi prodotto</h1></div>

        <table class="regilog">
            <form action="lib/newprod.php" method="post">
                <tr class="heading">
                    <td colspan="2">Nuovo Prodotto</td>
                </tr>
                <tr>
                    <td>Nome</td>
                    <td><input type="text" name="nomeprodotto" value="<?=$nomprod;?>"/></td>
                </tr>
                <tr>
                    <td>Rif. Clienti</td>
                    <td><input type="text" name="clienti" value="<?=$rifcli;?>" /></td>
                </tr>
                <tr>
                    <td>Note</td>
                    <td><input type="text" name="note" value="<?=$nop;?>" /></td>
                </tr>
                <tr>
                    <td colspan="2"><button class="btn btn-primary" name="editprod">Aggiungi Prodotto</button><input type="text" name="prodid" style="display:none;" value="<?=$id;?>"/></td>
                </tr>
            </form>
        </table>
    </div>

<?php else:?>
    <div class="container-fluid">
        <div class="pagetitle"><h1>aggiungi prodotto</h1></div>

        <table class="regilog">
            <form action="lib/newprod.php" method="post">
                <tr class="heading">
                    <td colspan="2">Nuovo Prodotto</td>
                </tr>
                <tr>
                    <td>Nome</td>
                    <td><input type="text" name="nomeprodotto" /></td>
                </tr>
                <tr>
                    <td>Rif. Clienti</td>
                    <td><input type="text" name="clienti" /></td>
                </tr>
                <tr>
                    <td>Note</td>
                    <td><input type="text" name="note" /></td>
                </tr>
                <tr>
                    <td colspan="2"><button class="btn btn-primary" name="newprod">Aggiungi Prodotto</button></td>
                </tr>
            </form>
        </table>
    </div>
<?php endif;?>


<?php
    include_once 'footer.php';
?>