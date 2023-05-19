<?php require('header.php'); ?>

<article>
    <header>
        <h1>Daca doriti sa modificati datele contului, la final apasati pe butonul de salvare</h1>
    </header>


    <?php
        if (isset($_GET['id'])) {
            $id = $_GET['id'];

            require('mysql.php');

            if (isset($_POST['submit'])) {
                //daca s-a efectuat trimiterea formularului
                //actualizăm înregistrarea în baza de date
                $imagine = "";
                if (isset($_FILES['imagine'])) {
                    if($_FILES['imagine']['name'] != "") {
                        if(str_contains($_FILES['imagine']['type'], "image") && $_FILES['imagine']['name'] != "") {
                            $cale = "./Images/produse/";
                            $imagine = $_FILES['imagine'];
                            copy($imagine['tmp_name'], $cale . $imagine['name'] ) or die( "Could not copy file" );
                        }
                        else {
                            echo "Nu este o imagine valida!";
                        }
                    }
                }
                if (!empty($imagine)) {
                    $query = "UPDATE produse
                    SET marca='".$_POST['marca']."',
                        model='". $_POST['model'] ."',
                        diagonala='". $_POST['diagonala'] ."',
                        rezolutie='". $_POST['rezolutie'] ."',
                        tip_display='". $_POST['tip-display'] ."',
                        os='". $_POST['os'] ."',
                        versiune_os='". $_POST['versiune-os'] ."',
                        procesor='". $_POST['procesor'] ."',
                        nuclee='". $_POST['nuclee'] ."',
                        mem_interna='". $_POST['mem-interna'] ."',
                        mem_ram='". $_POST['mem-ram'] ."',
                        sloturi_sim='". $_POST['sloturi-sim'] ."',
                        stoc='". $_POST['stoc'] ."',
                        pret='". $_POST['pret'] ."',
                        imagine='". $imagine['name'] ."'
                        WHERE id_produs=".$id;
                }
                else {
                    $query = "UPDATE produse
                    SET marca='".$_POST['marca']."',
                        model='". $_POST['model'] ."',
                        diagonala='". $_POST['diagonala'] ."',
                        rezolutie='". $_POST['rezolutie'] ."',
                        tip_display='". $_POST['tip-display'] ."',
                        os='". $_POST['os'] ."',
                        versiune_os='". $_POST['versiune-os'] ."',
                        procesor='". $_POST['procesor'] ."',
                        nuclee='". $_POST['nuclee'] ."',
                        mem_interna='". $_POST['mem-interna'] ."',
                        mem_ram='". $_POST['mem-ram'] ."',
                        sloturi_sim='". $_POST['sloturi-sim'] ."',
                        stoc='". $_POST['stoc'] ."',
                        pret='". $_POST['pret'] ."'
                        WHERE id_produs=".$id;
                }

                $result = $conn->query($query);
                if (!$result) {
                    echo $conn->error;
                } else {
                    echo "<h2>Modificare efectuată cu success!</h2>";
                    echo "<p>Înapoi la <a href='edit.php'>lista</a>";
                }
            } else {
                //dacă nu s-a efectuat trimiterea, înseamnă că trebuie să afișăm formularul
                $query = "SELECT *
                    FROM utilizator
                    WHERE id_utilizator=".$id;

                $result = $conn->query($query);
                $row = $result->fetch_array();
                ?>
                <form id="editCont" action="" method="POST">

                    <div class="form-row">
                        <label for="nume">Nume:</label>
                        <input type="text" name="nume" id="nume" value="<?=$row["nume"]?>">
                        <input type="checkbox" name="nume-nou" id="nume-nou">
                    </div>
                    <div class="form-row">
                        <label for="username">Nume utilizator:</label>
                        <input type="text" name="username" id="username" value="<?=$row["nume_utilizator"]?>" >
                        <input type="checkbox" name="user-nou" id="user-nou">
                    </div>
                    <div class="form-row">
                        <label for="e-mail">Email:</label>
                        <input type="email" name="e-mail" id="e-mail" value="<?=$row["email"]?>">
                        <input type="checkbox" name="email-nou" id="email-nou">
                    </div>
                    <div class="form-row">
                        <label for="parola">Parola:</label>
                        <input type="password" name="parola" id="parola" value="<?=$row["parola"]?>">
                        <input type="checkbox" name="parola-noua" id="parola-noua">
                    </div>
                    <div class="form-row">
                        <label for="conf-pass">Confirma parola:</label>
                        <input type="password" name="conf-pass" id="conf-pass" value="<?=$row["parola"]?>" >
                    </div>

                    <div class="form-row">
                    <input type="submit" name="submit" value="Salveaza">
                    </div>

                </form>

                <?php

            }
            $conn->close();
        } else {
            echo "<p>Lipsă paramentru (nu știu ce client să modific)</p>";
            echo "<p>Mergeți înapoi la <a href='clienti.php'>clienti</a> și selectați unul</p>";
        }

    ?>



</article>

<?php require('footer.php'); ?>