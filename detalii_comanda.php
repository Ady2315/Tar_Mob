<?php require('header.php'); ?>

<article class="wrapper">
    <header>
        <h1>Introduceti datele necesare expedieri</h1>
    </header>


    <?php
        if (isset($_COOKIE)) {
            if (isset($_COOKIE['cos']) && !empty($_COOKIE['cos'])) {
                if (isset($_POST['submit'])) {
                    $nume = $_POST['nume'];
                    $adresa = $_POST['adresa'];
                    $oras = $_POST['localitate'];
                    $judet = $_POST['judet'];
                    $telefon = $_POST['telefon'];
                    $id_client;

                    if (empty($nume) || empty($adresa) || empty($oras) || empty($judet) || empty($telefon)) {
                        echo "<p class=\"msg error\">Introduceti toate datele.</p><br>";
                        echo "<meta http-equiv=\"refresh\" content=\"2; URL='detalii_comanda.php'\" >";
                    }
                    else {
                        require('mysql.php');

                        $query = "INSERT INTO clienti (nume, adresa, localitate, judet, telefon) VALUES ('" . $nume . "', '" . $adresa . "', '" . $oras . "', '" . $judet . "', '" . $telefon . "');";

                        $result = $conn->query($query);
                        if (!$result) {
                            echo $conn->error;
                        } 
                        $conn->close();

                        require('mysql.php');

                        $query = "SELECT * FROM clienti WHERE nume='" . $nume . "' AND telefon='" . $telefon . "';";
                        $result = $conn->query($query);
                        if ($result->num_rows > 0) {
                            $row = $result->fetch_array();
                            $id_client = $row['id_client'];
                        }
                        $conn->close();

                        require('mysql.php');

                        $data = date("Y-m-d");
                        $stari = array("In tranzit", "In curs de procesare", "Spre destinatie");
                        $stare = $stari[rand(0, count($stari) - 1)];

                        $query = "INSERT INTO comenzi (id_client, data, stare) VALUES (" . $id_client . ", '" . $data . "', '" . $stare . "');";
                        $result = $conn->query($query);
                        if (!$result) {
                            echo $conn->error;
                        }
                        else {
                            echo "<h1>Comanda a fost inregistrata cu succes.</h1>";
                            echo "<meta http-equiv=\"refresh\" content=\"5; URL='index.php'\" >";
                        }
                        $conn->close();
                    }

                } else {
                    //dacă nu s-a efectuat trimiterea, înseamnă că trebuie să afișăm formularul
                    ?>
                    <form class="form bg-box-dark" id="comanda" action="" method="POST">
                        <div class="form-row">
                            <label for="nume">Nume:</label>
                            <input type="text" name="nume" id="nume">
                        </div>
                        <div class="form-row">
                            <label for="adresa">Adresa:</label>
                            <input type="text" name="adresa" id="adresa">
                        </div>
                        <div class="form-row">
                            <label for="localitate">Localitate:</label>
                            <input type="text" name="localitate" id="localitate">
                        </div>
                        <div class="form-row">
                            <label for="judet">Judet:</label>
                            <input type="text" name="judet" id="judet">
                        </div>
                        <div class="form-row">
                            <label for="telefon">Telefon:</label>
                            <input type="tel" name="telefon" id="telefon">
                        </div>
                        <div class="form-row">
                        <input type="submit" name="submit" value="Confirmati comanda">
                        </div>
                    </form>

                <?php
                }
            }
        } else {
            header("Location: index.php");
        }

    ?>



</article>

<?php require('footer.php'); ?>