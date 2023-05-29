<?php require('header.php'); ?>

<style>
    .nav-container {
        display: none;
    }
    .footer {
        display: none;
    }
</style>

<?php 
    $emailErrL = $parolaErrL = "";  
    $usernameL = $parolaL = "";
    $errorL = "";
    if(isset($_POST['submit'])){
        require('mysql.php');
        $usernameL = $_POST['username'];
        $parolaL = $_POST['parola'];
        $query = "SELECT * FROM utilizator WHERE email='$usernameL' OR nume_utilizator='$usernameL';";
        $result = $conn->query($query);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_array()) {
                $verify = password_verify($parolaL, $row['parola']);
                // var_dump($verify);
                if($verify === true) {
                    $_SESSION['nume'] = $row['nume'];
                    $_SESSION['id_user'] = $row['id_utilizator'];

                    $_SESSION['active'] = true;
                    $conn->close();
                    echo "<meta http-equiv=\"refresh\" content=\"0.1; URL='index.php'\" >";

                    exit;
                }
                else if (!$verify) {
                    $parolaErrL = "Parola este gresita!";
                }
            }
        }
        else {
            $emailErrL = "Numele de utilizator nu exista!";
            $conn->close();
        }
    }
?>

<div class="op-container login-container">
    <form action="" method="POST" class="login-form  bg-box-dark">
        <div class="lr-header">
            <a href="index.php" class="link-noeffects color-dark-effect"><i class="bi bi-arrow-bar-left"></i></a>
            <h3>Conecteaza-te</h3>
        </div>
        <div class="lr-row space-between">
            <label for="username">Nume utilizator:</label>
            <input type="text" name="username" id="username" class="inputs">
            <span class="error"><?php echo $emailErrL; ?></span>
        </div>
        <div class="lr-row">
            <label for="parola">Parola:</label>
            <input type="password" name="parola" id="parola" class="inputs">
            <span class="error"><?php echo $parolaErrL; ?></span>
        </div>
        <div class="lr-footer">
            <a href="register.php" class="link-noeffects color-dark-effect">Nu ai cont?</a>
            <button type="submit" name="submit" class="inputs btn btn-success">Conecteaza-te</button>
        </div>
    </form>
</div>

<?php require('footer.php'); ?>