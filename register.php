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
    $numeErrR = $usernameErrR = $emailErrR = $parolaErrR = $parolaConfirmErrR = "";  
    $numeR = $usernameR = $emailR = $parolaR = $parolaConfirm = "";
    $successR = $errorR = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        require('mysql.php');
        if (empty($_POST['nume'])) {  
            $numeErrR = "Introduceti un nume";  
        } 
        else {  
            $numeR = format($_POST['nume']);  
            if (!preg_match("/^[a-zA-Z-' ]*$/",$numeR)) {  
                $numeErrR = "Numele trebuie sa contina doar litere";  
            } 
        }
        if (empty($_POST['username'])) {  
            $usernameErrR = "Introduceti un nume de utilizator";  
        } 
        else {  
            $usernameR = format($_POST['username']);  
        }    
        if (empty($_POST['e-mail'])) {  
            $emailErrR = "Introduceti un email";  
        } 
        else {  
            $emailR = format($_POST['e-mail']);
            if (!filter_var($emailR, FILTER_VALIDATE_EMAIL)) {  
                $emailErrR = "Email invalid";
            }
            $query = "SELECT * from utilizator;";
            $verify = $conn->query($query);
            if ($verify->num_rows > 0) {
                while($row = $verify->fetch_array()) {
                    if ($row['email'] === $emailR) {
                        $emailErrR = "Emailul exista deja!";
                    }
                }
            }
        }
        if (empty($_POST['parola'])) {
            $parolaErrR = "Introduceti o parola";
        }
        else {
            $parolaR = format($_POST['parola']);
            $uppercase = preg_match('@[A-Z]@', $parolaR);
            $lowercase = preg_match('@[a-z]@', $parolaR);
            $number = preg_match('@[0-9]@', $parolaR);
            // $specialChars = preg_match('@[^\w]@', $parolaR);

            if (!$uppercase || !$lowercase || !$number || strlen($parolaR) < 8) {
                $parolaErrR = "Parola trebuie sa aiba cel putin 8 caractere, o litera mica, o litera mare, o cifra si un caracter special";
            }
        }
        if ($parolaR != $_POST['parola-confirm']) {
            $parolaConfirmErrR = "Parolele nu coincid";
        }
        if (empty($numeErrR) && empty($emailErrR) && empty($parolaErrR) && empty($parolaConfirmErrR) && empty($usernameErrR)) {
            $parolaHash = password_hash($parolaR, PASSWORD_DEFAULT);
            $query = "INSERT INTO utilizator (nume_utilizator, nume, email, parola) VALUES ('" . $usernameR . "', '" . $numeR . "', '" . $emailR . "', '" . $parolaHash . "');";
            $result = $conn->query($query);
            if(empty($result)) {
                $errorR = "A intervenit o eroare la inregistrare";
            }
            else {
                $trimite = "da";
                $successR = "Inregistrarea a fost facuta cu succes!";
                $numeR = $emailR = $parolaR = "";
            }
        }
        $conn->close();
    }  

    function format($data) {  
        $data = trim($data);  
        $data = stripslashes($data);  
        $data = htmlspecialchars($data);  
        return $data;  
    }  
?> 

<div class="op-container register-container">
    <form action="" method="post" class="register form bg-box-dark">
        <div class="form-row">
            <a href="index.php" class="link-noeffects color-dark color-dark-effect"><i class="bi bi-arrow-bar-left"></i></a>
            <h3>Inregistreaza-te</h3>
        </div>
        <div class="form-row">
            <label for="nume">Nume:</label>
            <input type="text" name="nume" id="nume" value="<?php echo $numeR; ?>" class="inputs">
            <span class="error"><?php echo $numeErrR; ?></span>
        </div>
        <div class="form-row">
            <label for="username">Nume utilizator:</label>
            <input type="text" name="username" id="username" value="<?php echo $usernameR; ?>" class="inputs">
            <span class="error"><?php echo $usernameErrR; ?></span>
        </div>
        <div class="form-row">
            <label for="e-mail">Email:</label>
            <input type="email" name="e-mail" id="e-mail" value="<?php echo $emailR; ?>" class="inputs">
            <span class="error"><?php echo $emailErrR; ?></span>
        </div>
        <div class="form-row">
            <label for="parola">Parola:</label>
            <input type="password" name="parola" id="parola" class="inputs">
            <span class="error"><?php echo $parolaErrR; ?></span>
        </div>
        <div class="form-row">
            <label for="parola-confirm">Confirma parola:</label>
            <input type="password" name="parola-confirm" id="parola-confirm" class="inputs">
            <span class="error"><?php echo $parolaConfirmErrR; ?></span>
        </div>
        <div class="form-row">
            <a href="login.php" class="link-noeffects color-dark-effect">Ai deja un cont?</a>
            <button type="submit" class="inputs btn btn-success">Creaza contul</button>
            <span class="success"><?php echo $successR; ?></span>
        </div>
    </form>
</div>

<?php require('footer.php'); ?>