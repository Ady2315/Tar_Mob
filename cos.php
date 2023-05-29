<?php require('header.php'); ?>

    <h2>Cosul tau de cumparaturi</h2>
    <div class="wrapper cos">
        <div class="cart-list">
            <?php
                $produse = 0;
                if (isset($_COOKIE)) {
                    if (isset($_COOKIE['cos'])) {
                        $arr = exportCookieCart();
                        $produse = implode(", ", array_keys($arr));
                        if (empty($produse)) {
                            $produse = 0;
                        }
                    }
                }
                require('mysql.php');
                $query = "SELECT * FROM produse WHERE id_produs IN (" . $produse. ");";
                $result = $conn->query($query);
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_array()) { ?>
                        <article class="wide-card bg-box-dark">
                            <!-- <div class="big-card-img"></div> -->
                            <img src="./Images/produse/<?php echo $row['imagine']; ?>" alt="" class="wide-card-img">
                            <div class="wide-card-body">
                                <div class="wide-card-body-header">
                                    <h3 class="wide-card-title"><?php echo $row['marca'] . ' ' . $row['model']; ?></h3>
                                    <div class="amount">
                                        <?php if (isset($_COOKIE)) {
                                            if (isset($_COOKIE['cos'])) { ?>
                                                <a href="cos.php?id_prod=<?php echo $row['id_produs']; ?>&cos=decrement&id=<?php echo $row['id_produs']; ?>" class="link-noeffects color-dark font-2"><i class="bi bi-dash"></i></a>
                                                <span class="font-2"><?php echo $arr[$row['id_produs']]; ?></span>
                                                <a href="cos.php?id_prod=<?php echo $row['id_produs']; ?>&cos=increment" class="link-noeffects color-dark font-2"><i class="bi bi-plus"></i></a>
                                        <?php    }
                                        } ?>
                                    </div>
                                    <a href="cos.php?id_produs=<?php echo $row['id_produs']; ?>&cos=sterge"><button id="produce-button" class="btn btn-primary w-half bg-color-effect bg-warning">Sterge</button></a>
                                </div>
                            </div>
                            <h1 class="wide-card-price"><?php echo $row['pret'] . " lei"; ?></h1>
                        </article>        
                <?php }
                }
                else { ?>
                    <h1>Nu aveti produse adaugate in cos.</h1>
                    <h2>Reveniti la pagina de <a href="produse.php" class="color-dark">produse<i class="bi bi-arrow-left-short"></i></a></h2>
        <?php   }
            ?>
        </div>
            <?php
                if (isset($_COOKIE)) {
                    if (isset($_COOKIE['cos'])) {
                        $arr = exportCookieCart();
                        $produse = implode(", ", array_keys($arr));
                        if (!empty($produse)) {
                            require('mysql.php');
                            $query = "SELECT id_produs, pret FROM produse WHERE id_produs IN (" . $produse. ");";
                            $result = $conn->query($query);
                            if ($result->num_rows > 0) {
                                $suma = 0;
                                while($row = $result->fetch_array()) {
                                    $suma += ($row['pret'] * $arr[$row['id_produs']]);
                                } ?>
                                <div class="summary bg-box-dark">
                                    <h2>Valoare cos de cumparaturi</h2>
                                    <h2><?php echo $suma . " Lei"; ?></h2>
                                    <a href="detalii_comanda.php"><button class="btn btn-primary">Continua comanda</button></a>
                                </div>
                        <?php }
                        }
                    }
                }
            ?>
    </div>

<?php require('footer.php'); ?>