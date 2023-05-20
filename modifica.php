<?php require('header.php'); ?>

<article class="wrapper">
    <header>
        <h1>Modificati datele produsului</h1>
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
                        baterie='". $_POST['baterie'] ."',
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
                        baterie='". $_POST['baterie'] ."',
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
                    FROM produse
                    WHERE id_produs=".$id;

                $result = $conn->query($query);
                $row = $result->fetch_array();

                ?>
                <form class="form bg-box-dark" id="editProdus" action="" method="POST">

                    <div class="form-row">
                        <label for="marca">Marca:</label>
                        <input type="text" name="marca" id="marca" value="<?=$row["marca"]?>" >
                    </div>
                    <div class="form-row">
                        <label for="model">Model:</label>
                        <input type="text" name="model" id="model" value="<?=$row["model"]?>" >
                    </div>
                    <div class="form-row">
                        <label for="diagonala">Diagonala:</label>
                        <input type="number" name="diagonala" id="diagonala" value="<?=$row["diagonala"]?>" >
                    </div>
                    <div class="form-row">
                        <label for="rezolutie">Rezolutie:</label>
                        <input type="text" name="rezolutie" id="rezolutie" value="<?=$row["rezolutie"]?>" >
                    </div>
                    <div class="form-row">
                        <label for="tip-display">Tip display:</label>
                        <input type="text" name="tip-display" id="tip-display" value="<?=$row["tip_display"]?>" >
                    </div>
                    <div class="form-row">
                        <label for="os">Sistem de operare:</label>
                        <input type="text" name="os" id="os" value="<?=$row["os"]?>" >
                    </div>
                    <div class="form-row">
                        <label for="versiune-os">Versiune:</label>
                        <input type="number" name="versiune-os" id="versiune-os" value="<?=$row["versiune_os"]?>" >
                    </div>
                    <div class="form-row">
                        <label for="procesor">Procesor:</label>
                        <input type="text" name="procesor" id="procesor" value="<?=$row["procesor"]?>" >
                    </div>
                    <div class="form-row">
                        <label for="nuclee">Numar nuclee:</label>
                        <input type="number" name="nuclee" id="nuclee" value="<?=$row["nuclee"]?>" >
                    </div>
                    <div class="form-row">
                        <label for="mem-interna">Memorie interna:</label>
                        <input type="number" name="mem-interna" id="mem-interna" value="<?=$row["mem_interna"]?>" >
                    </div>
                    <div class="form-row">
                        <label for="mem-ram">Memorie RAM:</label>
                        <input type="number" name="mem-ram" id="mem-ram" value="<?=$row["mem_ram"]?>" >
                    </div>
                    <div class="form-row">
                        <label for="baterie">Baterie:</label>
                        <input type="number" name="baterie" id="baterie" value="<?=$row["baterie"]?>" >
                    </div>
                    <div class="form-row">
                        <label for="sloturi-sim">Sloturi SIM:</label>
                        <input type="number" name="sloturi-sim" id="sloturi-sim" value="<?=$row["sloturi_sim"]?>" >
                    </div>
                    <div class="form-row">
                        <label for="stoc">Stoc:</label>
                        <input type="number" name="stoc" id="stoc" value="<?=$row["stoc"]?>" >
                    </div>
                    <div class="form-row">
                        <label for="pret">Pret:</label>
                        <input type="number" name="pret" id="pret" value="<?=$row["pret"]?>" >
                    </div>
                    <div class="form-row">
                        <label for="imagine">Imagine:</label>
                        <input type="file" name="imagine" id="imagine">
                    </div>

                    <div class="form-row">
                    <input type="submit" name="submit" value="Modifica">
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