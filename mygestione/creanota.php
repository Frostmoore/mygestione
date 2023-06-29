<?php
    session_start();
    include_once 'lib/arrays.php';
    include_once 'header.php';
    if(!$_SESSION['logged']){
        header("refresh:0;url=nopermission.php");
    }
?>

<div class="container-fluid">
    <div class="pagetitle"><h1>Crea una nuova nota</h1></div>

    <table class="regilog">
        <form action="lib/newnote.php" method="post">
            <tr class="heading">
                <td colspan="2">Crea una nuova nota</td>
            </tr>
            <tr>
                <td>Testo: </td>
                <td><textarea rows="20" cols="50" name="nota"></textarea></td>
            </tr>
            <tr>
                <td colspan="2" class="longbntcell"><button type="submit" class="btn btn-success" name="nuovanota">Salva</button></td>
            </tr>
        </form>
    </table>
</div>

<?php
    include_once 'footer.php';
?>