<div>

    <a href="validation.php?afaire=deconnexion">Déconnexion</a>

    <?php

    session_start();
    if (!isset($_SESSION['CONNECT']) || $_SESSION['CONNECT'] !== 'OK') {
        header('Location: login.php');
        exit();
    }
    echo "Hello " . $_SESSION['login'];
    ?>
</div>