<?php 
    require('header.php'); 
    include('hero.php');
?>
    <h2 class="page-title">Ultimele aparitii</h2>
    <section id="new-products">
        <div id="products-list" class="home-card-container">
            <?php
                require('mysql.php'); 
                $query = "SELECT * FROM (SELECT * FROM produse ORDER BY id_produs DESC LIMIT 5) Var1 ORDER BY id_produs DESC;";
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
                                    <a href="index.php?id_produs=<?php echo $row['id_produs']; ?>&cos=adauga"><button id="produce-button" class="btn btn-primary w-full bg-color-effect">Adauga in cos</button></a>
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