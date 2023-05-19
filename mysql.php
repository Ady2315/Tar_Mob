<?php
    $host = "127.0.0.1";
    $user = "root";
    $password = "Phq2-31gif5";
    $database = "tar_mob";

    $conn = new mysqli($host, $user, $password, $database);

    if ($conn -> connect_errno) {
        echo "Failed to connect to MySQL: " . $conn -> connect_error;
        exit();
    }
?>