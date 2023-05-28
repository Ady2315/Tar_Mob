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
                <div class="big-card-header">
                    <a href="produse.php" class="link-noeffects color-dark-effect"><i class="bi bi-caret-left-fill"></i></a>
                    <h2 class="big-card-title"><?php echo $row['marca'] . ' ' . $row['model']; ?></h2>
                </div>
                <!-- <div class="big-card-img"></div> -->
                <img src="./Images/produse/<?php echo $row['imagine']; ?>" alt="" class="big-card-img">
                <div class="big-card-body">
                        <h1><?php echo $row['pret'] . " lei"; ?></h1>
                        <?php if($row['stoc'] > 0) { ?>
                            <a href="produse.php?id=<?php echo $row['id_produs']; ?>&id_produs=<?php echo $row['id_produs']; ?>&cos=adauga" class="w-full"><button id="produce-button" class="btn btn-primary w-full bg-color-effect">Adauga in cos</button></a>
                        <?php } else { ?>
                            <button id="produce-button" class="btn btn-disabled w-half">Stoc epuizat</button>
                        <?php } ?>
                </div>
                <div class="specs">
                    <div class="spec">
                        <h4 class="spec-title">Marca:</h4>
                        <p class="spec-descript"><?php echo $row['marca']; ?></p>
                    </div>
                    <div class="spec bg-grid-dark shadow100-x">
                        <h4 class="spec-title">Model:</h4>
                        <p class="spec-descript"><?php echo $row['model']; ?></p>
                    </div>
                    <div class="spec">
                        <h4 class="spec-title">Diagonala:</h4>
                        <p class="spec-descript"><?php echo $row['diagonala'] . ' inch'; ?></p>
                    </div>
                    <div class="spec bg-grid-dark shadow100-x">
                        <h4 class="spec-title">Rezolutie:</h4>
                        <p class="spec-descript"><?php echo $row['rezolutie'] . ' pixeli'; ?></p>
                    </div>
                    <div class="spec">
                        <h4 class="spec-title">Tip display:</h4>
                        <p class="spec-descript"><?php echo $row['tip_display']; ?></p>
                    </div>
                    <div class="spec bg-grid-dark shadow100-x">
                        <h4 class="spec-title">Sistem de operare:</h4>
                        <p class="spec-descript"><?php echo $row['os'] . ' ' . $row['versiune_os']; ?></p>
                    </div>
                    <div class="spec">
                        <h4 class="spec-title">Procesor:</h4>
                        <p class="spec-descript"><?php echo $row['procesor']; ?></p>
                    </div>
                    <div class="spec bg-grid-dark shadow100-x">
                        <h4 class="spec-title">Numar nuclee:</h4>
                        <p class="spec-descript"><?php echo $row['nuclee']; ?></p>
                    </div>
                    <div class="spec">
                        <h4 class="spec-title">Memorie interna:</h4>
                        <p class="spec-descript"><?php echo $row['mem_interna'] . ' GB'; ?></p>
                    </div>
                    <div class="spec bg-grid-dark shadow100-x">
                        <h4 class="spec-title">Memorie RAM:</h4>
                        <p class="spec-descript"><?php echo $row['mem_ram'] . ' GB'; ?></p>
                    </div>
                    <div class="spec">
                        <h4 class="spec-title">Capacitate baterie:</h4>
                        <p class="spec-descript"><?php echo $row['baterie'] . ' mAh'; ?></p>
                    </div>
                    <div class="spec bg-grid-dark shadow100-x">
                        <h4 class="spec-title">Sloturi SIM:</h4>
                        <p class="spec-descript"><?php echo $row['sloturi_sim']; ?></p>
                    </div>
                </div>
            </article>
    <?php }
    }
?>

<?php require('footer.php'); ?>