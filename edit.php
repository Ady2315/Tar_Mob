<?php require('header.php'); ?>

<section id="products">
    <h2>Produse</h2>
    <a href="add-prod.php"><button class="btn btn-primary">Adauga produse</button></a>
    <div id="products-list" class="card-container">
    <?php 
        require('mysql.php'); 
        $query = "SELECT * FROM produse;";
        $result = $conn->query($query);
        $cale = "./Images/produse/";

        if ($result->num_rows > 0) {
            while($row = $result->fetch_array()) { ?>
                <div class="card bg-box-dark">
                    <div class="card-image" style="background-image: url('<?php echo $cale . $row['imagine'] ?>');"></div>
                    <div class="card-body">
                        <h3 class="card-title"><?php echo $row['marca'] . " " . $row['model']; ?></h3>
                        <p class="card-text card-price"><?php echo $row['pret'] . " Lei"; ?></p>
                        <a href="modifica.php?id=<?php echo $row['id_produs']; ?>"><button href="index.php" id="produce-button" class="btn btn-primary w-full bg-color-effect">Modifica</button></a>
                        <a href="sterge.php?id=<?php echo $row['id_produs']; ?>"><button href="index.php" id="produce-button" class="btn btn-primary w-full bg-color-effect">Sterge</button></a>
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