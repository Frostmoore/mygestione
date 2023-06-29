<?php
    include_once 'header.php';
?>

<div class="container-fluid" style="height: 100vh;">

    <div class="pagetitle"><h1>Login Utente</h1></div>

    <table class="regilog">

        <form action="lib/login.php" method="post">
        
            <tr class="heading">
                <td colspan="2">Login</td>
            </tr>
            <tr>
                <td>Username:</td>
                <td><input type="text" class="forminput" name="usernamelog" /></td>
            </tr>
            <tr>
                <td>Password:</td>
                <td><input type="password" class="forminput" name="userpasslog" /></td>
            </tr>
            <tr>
                <td colspan="2" class="longbtncell"><button type="submit" class="btn btn-success" name="login">LogIn</button></td>
            </tr>
    
        </form>

    </table>

</div>

<?php
    include_once 'footer.php';
?>