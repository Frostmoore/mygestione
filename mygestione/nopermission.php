<?php
    session_start();
    include_once 'header.php';
?>

<div class="container-fluid">
    <div class="pagetitle"><h1>Permesso negato</h1></div>
    <p>Siamo spiacenti, ma non hai i permessi necessari per accedere a questa pagina. Se sei arrivato qui per caso, ciao anche a te! </p>
    <p>Noi siamo <a href="https://www.seemypage.it/">SeeMyPage</a>, una startup che si occupa di sviluppo web e marketing. </p>
    <p>Se credi ci sia un errore, manda una email al nostro sviluppatore, <a href="mailto: dev@seemypage.it">cliccando qui</a>, sicuramente saprà come risolvere il tuo problema.</p>
    <p>Se sei solo un coglione e ti sei dimenticato di effettuare l'accesso, clicca su <a href="login.php">login</a> per accedere al gestionale. Pollo.</p>
</div>

<?php
    include_once 'footer.php';
?>
