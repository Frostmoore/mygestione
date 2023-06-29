<?php
    session_start();
    include_once 'arrays.php';

    if(!$_SESSION['logged']){
        header("refresh:0;url=../nopermission.php");
    }

    if(isset($_POST['editpw'])){
        $password = mysqli_real_escape_string($conn, $_POST['password']);
        $confirm = mysqli_real_escape_string($conn, $_POST['confirm']);
        $id = mysqli_real_escape_string($conn, $_POST['id']);
        $username = $utenti['username'][array_search($id, $utenti['id'])];
        if($password !== $confirm){
            echo '<p style="color:red;">La password che hai inserito non combacia con la conferma. Sarai reindirizzato alla pagina del profilo tra 2 secondi.</p>';
            header("refresh:2;url=../profilo.php?uname=" . $username . "&edituser=true");
        } else {
            $sql = "UPDATE utenti SET user_password = ? WHERE id = ?";
            $password = password_hash($password, PASSWORD_DEFAULT);
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ss", $password, $id);
            $stmt->execute();
            $stmt->close();
            $conn->close();
            echo "Password modificata con successo per l' utente " . $username . ". Sarai reindirizzato alla pagina del tuo profilo tra 2 secondi.";
            header("refresh:2;url=../profilo.php?uname=" . $username);
        }
    }