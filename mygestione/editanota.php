<?php
    session_start();
    include_once 'lib/arrays.php';
    include_once 'header.php';
    if(!$_SESSION['logged']){
        header("refresh:0;url=../nopermission.php");
    }
    $id = $_GET['id'];
?>
    <?php if(isset($_GET['edit'])):?>
        <div class="container-fluid">
            <div class="pagetitle"><h1>Modifica Nota</h1></div>

            <table class="regilog">
                <form action="lib/newnote.php" method="post">
                
                    <tr class="heading">
                        <td>Testo:</td>
                    </tr>
                    <tr>
                        <td><textarea rows="20" cols="50" name="notanew"><?= $note['nota'][array_search($id, $note['id'])]; ?></textarea></td>
                    </tr>
                    <tr>
                        <td class="longbtncell"><button type="submit" class="btn btn-warning" name="editnota">Salva</button><input type="text" style="display:none;" value="<?= $id;?>" name="idnota" /></td>
                    </tr>
                
                </form>
            </table>
        </div>
    <?php else: ?>
        <p>Non so per quale motivo sei qui, ma se non clicchi su "Edit", questa pagina è completamente inutile. Sarai reindirizzato alla Dashboard molto presto.... Shazam!!</p>
        <?php header("refresh:2;url=../index.php"); ?>
    <?php endif; 
        include_once 'footer.php';
    ?>