<?php 
    require('header.php');
    require('mysql.php');

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
    }
    $query = "SELECT * FROM produse WHERE id_produs='$id'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) { ?>
            <section class="big-card bg-box-dark">
                <h2 class="big-card-title"><?php echo $row['marca'] . $row['model']; ?></h2>
                <!-- <div class="big-card-img"></div> -->
                <img src="./Images/produse/<?php echo $row['imagine']; ?>" alt="" class="big-card-img">
                <div class="big-card-body">
                    <h3><?php echo $row['pret'] . " lei"; ?></h3>
                    <button id="produce-button" class="btn btn-primary bg-color-effect">Adauga in cos</button>
                    <div class="specs">
                        <div class="spec">
                            <h4 class="spec-title">Marca:</h4>
                            <p class="spec-descript"><?php echo $row['marca']; ?></p>
                        </div>
                        <div class="spec">
                            <h4 class="spec-title">Model:</h4>
                            <p class="spec-descript"><?php echo $row['model']; ?></p>
                        </div>
                        <div class="spec">
                            <h4 class="spec-title">Specificatie</h4>
                            <p class="spec-descript">Continut</p>
                        </div>
                        <div class="spec">
                            <h4 class="spec-title">Specificatie</h4>
                            <p class="spec-descript">Continut</p>
                        </div>
                        <div class="spec">
                            <h4 class="spec-title">Specificatie</h4>
                            <p class="spec-descript">Continut</p>
                        </div>
                    </div>
                </div>
            </section>
    <?php }
    }
?>

<?php require('footer.php'); ?>