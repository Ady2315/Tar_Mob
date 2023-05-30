<?php require('header.php'); ?>

<?php
    if (isset($_POST['filter'])) {
        $preturi = array();
        $marci = array();
        $oss = array();
        $stocari = array();
        $baterii = array();

        $preturiS = $marciS = $ossS = $stocariS = $bateriiS = "";

        if (!empty($_POST['pret']) && isset($_POST['pret'])) {
            foreach($_POST['pret'] as $pret) {
                if ($pret == 6000) array_push($preturi, "pret BETWEEN " . $pret . " AND " . $pret+100000);
                else array_push($preturi, "pret BETWEEN " . $pret-1000 . " AND " . $pret);
            }
            $preturiS = implode(" OR ", $preturi);
        }
        if (!empty($_POST['marca']) && isset($_POST['marca'])) {
            foreach($_POST['marca'] as $marca) {
                array_push($marci, "'" . $marca . "'");
            }
            $marciS = implode(", ", $marci);
        }
        if (!empty($_POST['os']) && isset($_POST['os'])) {
            foreach($_POST['os'] as $os) {
                array_push($oss, "'" . $os . "'");
            }
            $ossS = implode(", ", $oss);
        }
        if (!empty($_POST['stocare']) && isset($_POST['stocare'])) {
            foreach($_POST['stocare'] as $stocare) {
                array_push($stocari, $stocare);
            }
            $stocariS = implode(", ", $stocari);
        }
        if (!empty($_POST['baterie']) && isset($_POST['baterie'])) {
            foreach($_POST['baterie'] as $baterie) {
                if ($baterie == 5000) array_push($baterii, "baterie BETWEEN " . $baterie . " AND " . $baterie+100000);
                else array_push($baterii, "baterie BETWEEN " . $baterie-1000 . " AND " . $baterie);
            }
            $bateriiS = implode(" OR ", $baterii);
        }

        require('mysql.php');
        if (empty($preturi) && empty($marci) && empty($oss) && empty($stocari) && empty($baterii)) {
            $query_filter = "SELECT * FROM produse;";
        }
        else {
            $p = (!empty($preturiS)) ? $preturiS : "";
            $m = (!empty($marciS)) ? "marca IN ($marciS) " : "";
            $o = (!empty($ossS)) ? "os IN ($ossS) " : "";
            $s = (!empty($stocariS)) ? "mem_interna IN ($stocariS) " : "";
            $b = (!empty($bateriiS)) ? $bateriiS : "";

            $filtre = array($p, $m, $o, $s, $b);

            foreach($filtre as $key => $filtru) {
                if (empty($filtru)) {
                    unset($filtre[$key]);
                }
            }
            // var_dump($filtre);
            
            $query_filter = "SELECT * FROM produse WHERE " . implode(" AND ", $filtre) . ";";
        }
    }
    else {
        $query_filter = "SELECT * FROM produse;";
    }
?>

        <aside class="sidebar">
            <button class="btn btn-primary w-full filter-button" onclick="ToggleFilter()">Filtreaza</button>
            <form id="filter-form" class="form filter-form" action="" method="post">
                <h2>Filtreaza</h2>
                <div class="filter-group bg-box-dark">
                    <div class="filter-btn">
                        <button type="submit" name="filter" id="search-button" class="btn btn-primary">Filtreaza</button>
                        <button type="reset" id="reset-button" class="btn btn-primary bg-color-effect">Reseteaza</button> 
                    </div>
                    <div class="checkbox-group">
                        <h3>Pret</h3>
                        <?php 
                            for ($i = 1000; $i <= 6000; $i += 1000) { 
                                if ($i == 1000) { ?>
                                    <div class="option">
                                        <input type="checkbox" name="pret[]" id="pret<?php echo $i; ?>" value="<?php echo $i; ?>">
                                        <label for=""><?php echo "Sub $i lei"; ?></label>
                                    </div>
                        <?php   }
                                else if ($i == 6000) { ?>
                                     <div class="option">
                                        <input type="checkbox" name="pret[]" id="pret<?php echo $i; ?>" value="<?php echo $i; ?>">
                                        <label for=""><?php echo "Peste $i lei"; ?></label>
                                    </div>
                        <?php   }
                                else { ?>
                                     <div class="option">
                                        <input type="checkbox" name="pret[]" id="pret<?php echo $i; ?>" value="<?php echo $i; ?>">
                                        <label for=""><?php echo $i-1000 . " - " . $i . " lei"; ?></label>
                                    </div>
                        <?php   }
                            } ?>
                    </div>
                    <div class="checkbox-group">
                        <h3>Marca</h3>
                        <?php 
                            require('mysql.php');
                            $query = "SELECT DISTINCT marca FROM produse ORDER BY marca";
                            $result = $conn->query($query);

                            if ($result->num_rows > 0) {
                                $i = 1;
                                while ($row = $result->fetch_array()) { ?>
                                    <div class="option">
                                        <input type="checkbox" name="marca[]" id="marca<?php echo $i; ?>" value="<?php echo $row['marca']; ?>">
                                        <label for=""><?php echo $row['marca']; ?></label>
                                    </div>
                            <?php   $i++;    
                                }
                            }
                            $conn->close();
                        ?>
                    </div>
                    <div class="checkbox-group">
                        <h3>Sistem de operare</h3>
                        <?php 
                            require('mysql.php');
                            $query = "SELECT DISTINCT os FROM produse ORDER BY os";
                            $result = $conn->query($query);

                            if ($result->num_rows > 0) {
                                $i = 1;
                                while ($row = $result->fetch_array()) { ?>
                                    <div class="option">
                                        <input type="checkbox" name="os[]" id="os<?php echo $i; ?>" value="<?php echo $row['os']; ?>">
                                        <label for=""><?php echo $row['os']; ?></label>
                                    </div>
                            <?php   $i++;    
                                }
                            }
                            $conn->close();
                        ?>
                    </div>
                    <div class="checkbox-group">
                        <h3>Memorie interna</h3>
                        <?php 
                            require('mysql.php');
                            $query = "SELECT DISTINCT mem_interna FROM produse ORDER BY mem_interna";
                            $result = $conn->query($query);

                            if ($result->num_rows > 0) {
                                $i = 1;
                                while ($row = $result->fetch_array()) { ?>
                                    <div class="option">
                                        <input type="checkbox" name="stocare[]" id="stocare<?php echo $i; ?>" value="<?php echo $row['mem_interna']; ?>">
                                        <label for=""><?php echo $row['mem_interna'] . " GB"; ?></label>
                                    </div>
                            <?php   $i++;    
                                }
                            }
                            $conn->close();
                        ?>
                    </div>
                    <div class="checkbox-group">
                        <h3>Capacitate baterie</h3>
                        <?php 
                            for ($i = 1000; $i <= 5000; $i += 1000) { 
                                if ($i == 1000) { ?>
                                    <div class="option">
                                        <input type="checkbox" name="baterie[]" id="baterie<?php echo $i; ?>" value="<?php echo $i; ?>">
                                        <label for=""><?php echo "Sub $i mAh"; ?></label>
                                    </div>
                        <?php   }
                                else if ($i == 5000) { ?>
                                     <div class="option">
                                        <input type="checkbox" name="baterie[]" id="baterie<?php echo $i; ?>" value="<?php echo $i; ?>">
                                        <label for=""><?php echo "Peste $i mAh"; ?></label>
                                    </div>
                        <?php   }
                                else { ?>
                                     <div class="option">
                                        <input type="checkbox" name="baterie[]" id="baterie<?php echo $i; ?>" value="<?php echo $i; ?>">
                                        <label for=""><?php echo $i-1000 . " - " . $i . " mAh"; ?></label>
                                    </div>
                        <?php   }
                            } ?>
                    </div>
                </div>
            </form>
        </aside>

        <section id="products">
            <h2 class="page-title">Produse</h2>
            <div id="products-list" class="card-container">
            <?php 
                require('mysql.php'); 
                $query = $query_filter;
                $result = $conn->query($query);
                $cale = "./Images/produse/";

                if ($result->num_rows > 0) {
                    while($row = $result->fetch_array()) { ?>
                        <div class="card bg-box-dark">
                            <a href="produs.php?id=<?php echo $row['id_produs']; ?>"><div class="card-image" style="background-image: url('<?php echo $cale . $row['imagine'] ?>');"></div></a>
                            <div class="card-body">
                                <a href="produs.php?id=<?php echo $row['id_produs']; ?>" class="link-noeffects color-dark color-dark-effect"><h3 class="card-title"><?php echo $row['marca'] . " " . $row['model']; ?></h3></a>
                                <p class="card-text card-price"><?php echo $row['pret'] . " Lei"; ?></p>
                                <?php if($row['stoc'] > 0) { ?>
                                    <a href="produse.php?id_produs=<?php echo $row['id_produs']; ?>&cos=adauga"><button id="produce-button" class="btn btn-primary w-full bg-color-effect">Adauga in cos</button></a>
                                <?php } else { ?>
                                    <button id="produce-button" class="btn btn-disabled w-full">Stoc epuizat</button>
                                <?php } ?>
                            </div>
                        </div>
                <?php }
                    $result->free();
                } 
                else {
                    echo "0 results";
                }
                $conn->close();
                ?>
            </div>
        </section>

<?php require('footer.php'); ?>