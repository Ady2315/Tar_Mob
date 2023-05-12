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
                    for($i = 0; $i < 100; $i++) {
                        include('card.php');
                    }
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