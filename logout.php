<?php
    session_start();

    if ($_SESSION['active']) {
        $_SESSION['active'] = false;
        $_SESSION['nume'] = null;
    }
    if ($_COOKIE['active']) {
        setcookie("nume", null, time() - 3600);
        setcookie("user", null, time() - 3600);
        setcookie("active", null, time() - 3600);
    }
    echo "<meta http-equiv=\"refresh\" content=\"0; URL='index.php'\" >";
?>