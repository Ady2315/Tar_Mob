<?php 
    require('header.php'); 
    include('hero.php');
?>
    <h2>Ultimele aparitii</h2>
    <section id="new-products">
        <div id="products-list" class="card-container">
            <?php
                for($i = 0; $i < 5; $i++) {
                    include('card.php');
                }
            ?>
        </div>
    </section>
    
<?php require('footer.php'); ?>