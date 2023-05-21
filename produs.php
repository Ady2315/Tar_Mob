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
            <article class="big-card bg-box-dark">
                <h2 class="big-card-title"><?php echo $row['marca'] . ' ' . $row['model']; ?></h2>
                <!-- <div class="big-card-img"></div> -->
                <img src="./Images/produse/<?php echo $row['imagine']; ?>" alt="" class="big-card-img">
                <div class="big-card-body">
                    <div class="big-card-body-header">
                        <h1><?php echo $row['pret'] . " lei"; ?></h1>
                        <?php if($row['stoc'] > 0) { ?>
                            <button id="produce-button" class="btn btn-primary w-half bg-color-effect">Adauga in cos</button>
                        <?php } else { ?>
                            <button id="produce-button" class="btn btn-disabled w-half">Stoc epuizat</button>
                        <?php } ?>
                    </div>
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
                            <h4 class="spec-title">Diagonala:</h4>
                            <p class="spec-descript"><?php echo $row['diagonala'] . ' inch'; ?></p>
                        </div>
                        <div class="spec">
                            <h4 class="spec-title">Rezolutie:</h4>
                            <p class="spec-descript"><?php echo $row['rezolutie'] . ' pixeli'; ?></p>
                        </div>
                        <div class="spec">
                            <h4 class="spec-title">Tip display:</h4>
                            <p class="spec-descript"><?php echo $row['tip_display']; ?></p>
                        </div>
                        <div class="spec">
                            <h4 class="spec-title">Sistem de operare:</h4>
                            <p class="spec-descript"><?php echo $row['os'] . ' ' . $row['versiune_os']; ?></p>
                        </div>
                        <div class="spec">
                            <h4 class="spec-title">Procesor:</h4>
                            <p class="spec-descript"><?php echo $row['procesor']; ?></p>
                        </div>
                        <div class="spec">
                            <h4 class="spec-title">Numar nuclee:</h4>
                            <p class="spec-descript"><?php echo $row['nuclee']; ?></p>
                        </div>
                        <div class="spec">
                            <h4 class="spec-title">Memorie interna:</h4>
                            <p class="spec-descript"><?php echo $row['mem_interna'] . ' GB'; ?></p>
                        </div>
                        <div class="spec">
                            <h4 class="spec-title">Memorie RAM:</h4>
                            <p class="spec-descript"><?php echo $row['mem_ram'] . ' GB'; ?></p>
                        </div>
                        <div class="spec">
                            <h4 class="spec-title">Capacitate baterie:</h4>
                            <p class="spec-descript"><?php echo $row['baterie'] . ' mAh'; ?></p>
                        </div>
                        <div class="spec">
                            <h4 class="spec-title">Sloturi SIM:</h4>
                            <p class="spec-descript"><?php echo $row['sloturi_sim']; ?></p>
                        </div>
                    </div>
                </div>
            </article>
    <?php }
    }
?>

<?php require('footer.php'); ?>