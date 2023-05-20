<?php require('header.php'); ?>

<article class="wrapper">
    <header>
        <h1>Adaugati un produs</h1>
    </header>

    <?php
            require("mysql.php");

            if (isset($_POST['submit'])) {
                //daca s-a efectuat trimiterea formularului
                //înregistrăm clientul nou în baza de date
                $marca = $_POST['marca'];
                $model = $_POST['model'];
                $diagonala = $_POST['diagonala'];
                $rezolutie = $_POST['rezolutie'];
                $tipDisplay = $_POST['tip-display'];
                $os = $_POST['os'];
                $versiune = $_POST['versiune-os'];
                $procesor = $_POST['procesor'];
                $nuclee = $_POST['nuclee'];
                $stocare = $_POST['mem-interna'];
                $ram = $_POST['mem-ram'];
                $baterie = $_POST['baterie'];
                $sim = $_POST['sloturi-sim'];
                $stoc = $_POST['stoc'];
                $pret = $_POST['pret'];

                if(isset($_FILES['imagine-produs'])) {
                    $imagine = $_FILES['imagine-produs'];
                    $format = "image";
                    if(str_contains($imagine['type'], $format) && $imagine['name'] != "") {
                        $cale = "./Images/produse/";

                        $query = "INSERT INTO produse (marca, model, diagonala, rezolutie, tip_display, os, versiune_os, procesor, nuclee, mem_interna, mem_ram, baterie, sloturi_sim, stoc, pret, imagine) VALUES ('$marca', '$model', $diagonala, '$rezolutie', '$tipDisplay', '$os', $versiune, '$procesor', $nuclee, $stocare, $ram, $baterie, $sim, $stoc, $pret, '" . $imagine['name'] . "');";
                            // echo $query;

                        // var_dump($imagine['name']);
                        $result = $conn->query($query);
                        if($result && copy($imagine['tmp_name'], $cale . $imagine['name'] )) {
                            // echo "aci";
                            echo "<h2>Inserare efectuată cu success!</h2>";
                            echo "<p>Înapoi la <a href='edit.php'>lista</a>";
                        }
                        else {
                            echo "Imaginea nu a putut fi introdusa" . $conn->error;
                        }
                    }
                    else {
                        echo "Nu este o imagine valida!";
                    }
                }
                else {
                    echo "Nu ati ales o imagine!";
                }

            } else {
                //dacă nu s-a efectuat trimiterea, înseamnă că trebuie să afișăm formularul


                ?>
                <form class="form bg-box-dark" id="editProdus" action="" method="POST" enctype="multipart/form-data">

                    <div class="form-row">
                        <label for="marca">Marca:</label>
                        <input type="text" name="marca" id="marca">
                    </div>
                    <div class="form-row">
                        <label for="model">Model:</label>
                        <input type="text" name="model" id="model">
                    </div>
                    <div class="form-row">
                        <label for="diagonala">Diagonala:</label>
                        <input type="text" name="diagonala" id="diagonala">
                    </div>
                    <div class="form-row">
                        <label for="rezolutie">Rezolutie:</label>
                        <input type="text" name="rezolutie" id="rezolutie">
                    </div>
                    <div class="form-row">
                        <label for="tip-display">Tip display:</label>
                        <input type="text" name="tip-display" id="tip-display">
                    </div>
                    <div class="form-row">
                        <label for="os">Sistem de operare:</label>
                        <input type="text" name="os" id="os">
                    </div>
                    <div class="form-row">
                        <label for="versiune-os">Versiune:</label>
                        <input type="text" name="versiune-os" id="versiune-os">
                    </div>
                    <div class="form-row">
                        <label for="procesor">Procesor:</label>
                        <input type="text" name="procesor" id="procesor">
                    </div>
                    <div class="form-row">
                        <label for="nuclee">Numar nuclee:</label>
                        <input type="text" name="nuclee" id="nuclee">
                    </div>
                    <div class="form-row">
                        <label for="mem-interna">Memorie interna:</label>
                        <input type="text" name="mem-interna" id="mem-interna">
                    </div>
                    <div class="form-row">
                        <label for="mem-ram">Memorie RAM:</label>
                        <input type="text" name="mem-ram" id="mem-ram">
                    </div>
                    <div class="form-row">
                        <label for="baterie">Baterie:</label>
                        <input type="text" name="baterie" id="baterie">
                    </div>
                    <div class="form-row">
                        <label for="sloturi-sim">Sloturi SIM:</label>
                        <input type="number" name="sloturi-sim" id="sloturi-sim">
                    </div>
                    <div class="form-row">
                        <label for="stoc">Stoc:</label>
                        <input type="number" name="stoc" id="stoc">
                    </div>
                    <div class="form-row">
                        <label for="pret">Pret:</label>
                        <input type="text" name="pret" id="pret">
                    </div>
                    <div class="form-row">
                        <label for="">Imagine:</label>
                        <input type="file" name="imagine-produs" id="imagine-produs">
                    </div>

                    <div class="form-row">
                    <input type="submit" name="submit" value="Adauga">
                    </div>

                </form>

                <?php

            }
            $conn->close();

    ?>



</article>

<?php require('footer.php'); ?>