<?php
    session_start();
    include_once 'header.php';
    if(!$_SESSION['logged']){
        header("refresh:0;url=login.php");
    }
?>


<div class="container-fluid">
    <div class="pagetitle"><h1>Registrazione Utente</h1></div>

    <table class="regilog">
        <form action="lib/register.php" method="post">
        <tr class="heading">
            <td colspan="2">Crea Nuovo Utente</td>
        </tr>
        <tr>
            <td>Username: </td>
            <td><input type="text" class="forminput" name="usernamereg" /></td>
        </tr>
        <tr>
            <td>Password: </td>
            <td><input type="password" class="forminput" name="userpassreg" /></td>
        </tr>
        <tr>
            <td>Conferma Password: </td>
            <td><input type="password" class="forminput" name="confermapass" /></td>
        </tr>
        <tr>
            <td>e-mail: </td>
            <td><input type="text" class="forminput" name="useremailreg" /></td>
        </tr>
        <tr>
            <td>Ruolo</td>
            <td><input type="text" class="forminput" name="userrolereg" /></td>
        </tr>
        <tr>
            <td colspan="2" class="longbtncell"><button type="submit" class="btn btn-success" name="registra">Registra Utente</button></td>
        </tr>
        </form>

    </table>

</div>

<?php
    include_once 'footer.php';
?>