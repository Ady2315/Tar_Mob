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
        $query = "SELECT nume_utilizator, nume, parola, email FROM utilizator WHERE email='$usernameL' OR nume_utilizator='$usernameL';";
        $result = $conn->query($query);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_array()) {
                $verify = password_verify($parolaL, $row['parola']);
                // var_dump($verify);
                if($verify === true) {
                    $_SESSION['nume'] = $row['nume'];
                    $_SESSION['user'] = $row['nume_utilizator'];

                    $_SESSION['active'] = true;
                    $conn->close();
                    echo "<meta http-equiv=\"refresh\" content=\"1; URL='index.php'\" >";

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
    <form action="" method="POST" class="login">
        <div class="form-row">
            <a href="index.php">Inapoi</a>
            <h3>Conecteaza-te</h3>
        </div>
        <div class="form-row">
            <label for="username">Nume utilizator:</label>
            <input type="text" name="username" id="username">
            <span class="error"><?php echo $emailErrL; ?></span>
        </div>
        <div class="form-row">
            <label for="parola">Parola:</label>
            <input type="password" name="parola" id="parola">
            <span class="error"><?php echo $parolaErrL; ?></span>
        </div>
        <div class="form-row">
            <a href="register.php">Nu ai cont?</a>
            <input type="submit" name="submit" value="Conecteaza-te">
        </div>
    </form>
</div>

<?php require('footer.php'); ?>