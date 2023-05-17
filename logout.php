<?php
    session_start();

    if ($_SESSION['active']) {
        $_SESSION['active'] = false;
        $_SESSION['nume'] = null;
        echo "<meta http-equiv=\"refresh\" content=\"0; URL='index.php'\" >";
    }
?>