<?php
    session_start();
    include_once 'header.php';
    include_once 'lib/arrays.php';
    if(!$_SESSION['logged']){
        header("refresh:0;url=nopermission.php");
    }
?>

<div class="container-fluid">
    <div class="pagetitle"><h1>Aggiungi un nuovo cliente</h1></div>
    <br />
    <form action="lib/newcustomer.php" method="post">
        <table class="regilog">
            <tr class="heading">
                <td colspan="2">Aggiungi Cliente</td>
            </tr>
            <tr>
                <td>Nome Cliente</td>
                <td><input type="text" name="nomecliente"></td>
            </tr>
            <tr>
                <td>Tel Cliente</td>
                <td><input type="text" name="tel"></td>
            </tr>
            <tr>
                <td>Email Cliente</td>
                <td><input type="text" name="email"></td>
            </tr>
            <tr>
                <td>Prodotti</td>
                <td><input type="text" name="prodotti"></td>
            </tr>
            <tr>
                <td>Note Cliente</td>
                <td><input type="text" name="note"></td>
            </tr>
            <tr>
                <td colspan="2"><button type="submit" name="nuovocliente" class="btn btn-primary">Salva Cliente</button></td>
            </tr>
        </table>
    </form>
</div>

<?php
    include_once 'footer.php';
?>