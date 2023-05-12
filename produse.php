<?php require('header.php'); ?>

        <aside class="sidebar">
            <form action="" method="post">
                <h2>Filtreaza</h2>
                <div class="filter-group bg-box-dark">
                    <button id="search-button" class="btn btn-primary w-full">Filtreaza</button> 
                    <div class="checkbox-group">
                        <h3>Marca</h3>
                        <div class="option">
                            <input type="checkbox" name="optiune1" id="optiune1">
                            <label for="optiune1">Samsung</label>
                        </div>
                        <div class="option">
                            <input type="checkbox" name="optiune2" id="optiune2">
                            <label for="optiune2">Apple</label>
                        </div>
                        <div class="option">
                            <input type="checkbox" name="optiune3" id="optiune3">
                            <label for="optiune3">Huawei</label>
                        </div>
                    </div>
                    <div class="checkbox-group">
                        <h3>Marca</h3>
                        <div class="option">
                            <input type="checkbox" name="optiune1" id="optiune1">
                            <label for="optiune1">Samsung</label>
                        </div>
                        <div class="option">
                            <input type="checkbox" name="optiune2" id="optiune2">
                            <label for="optiune2">Apple</label>
                        </div>
                        <div class="option">
                            <input type="checkbox" name="optiune3" id="optiune3">
                            <label for="optiune3">Huawei</label>
                        </div>
                    </div>
                    <div class="checkbox-group">
                        <h3>Marca</h3>
                        <div class="option">
                            <input type="checkbox" name="optiune1" id="optiune1">
                            <label for="optiune1">Samsung</label>
                        </div>
                        <div class="option">
                            <input type="checkbox" name="optiune2" id="optiune2">
                            <label for="optiune2">Apple</label>
                        </div>
                        <div class="option">
                            <input type="checkbox" name="optiune3" id="optiune3">
                            <label for="optiune3">Huawei</label>
                        </div>
                    </div>
                    <div class="checkbox-group">
                        <h3>Marca</h3>
                        <div class="option">
                            <input type="checkbox" name="optiune1" id="optiune1">
                            <label for="optiune1">Samsung</label>
                        </div>
                        <div class="option">
                            <input type="checkbox" name="optiune2" id="optiune2">
                            <label for="optiune2">Apple</label>
                        </div>
                        <div class="option">
                            <input type="checkbox" name="optiune3" id="optiune3">
                            <label for="optiune3">Huawei</label>
                        </div>
                    </div>
                </div>
            </form>
        </aside>

        <section id="products">
            <h2>Produse</h2>
            <div id="products-list" class="card-container">
            <?php 
                require('mysql.php'); 
                $query = "SELECT * FROM produse;";
                $result = $conn->query($query);
                $cale = "./Images/produse/";

                if ($result->num_rows > 0) {
                    while($row = $result->fetch_array()) { ?>
                        <div class="card bg-box-dark">
                            <a href="produs.php?id=<?php echo $row['id_produs']; ?>"><div class="card-image" style="background-image: url('<?php echo $cale . $row['imagine'] ?>');"></div></a>
                            <div class="card-body">
                                <a href="produs.php?id=<?php echo $row['id_produs']; ?>" class="link-noeffects color-dark color-dark-effect"><h3 class="card-title"><?php echo $row['marca'] . " " . $row['model']; ?></h3></a>
                                <p class="card-text card-price"><?php echo $row['pret'] . " Lei"; ?></p>
                                <button href="index.php" id="produce-button" class="btn btn-primary w-full bg-color-effect">Adauga in cos</button>
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
        <nav class="nav justify-center">
            <ul class="nav-list">
              <li class="nav-list-item"><a class="color-dark-effect color-hover-dark" href="#"><i class="bi bi-caret-left"></i></a></li>
              <li class="nav-list-item"><a class="color-dark-effect color-hover-dark" href="#">1</a></li>
              <li class="nav-list-item"><a class="color-dark-effect color-hover-dark" href="#">2</a></li>
              <li class="nav-list-item"><a class="color-dark-effect color-hover-dark" href="#">3</a></li>
              <li class="nav-list-item"><a class="color-dark-effect color-hover-dark" href="#"><i class="bi bi-caret-right"></i></a></li>
            </ul>
        </nav>

<?php require('footer.php'); ?>