<?php require('header.php'); ?>

<article class="wrapper">
    <header>
        <h1>Daca doriti sa modificati datele contului, la final apasati pe butonul de salvare</h1>
    </header>


    <?php
        $success = "";
        if (isset($_GET['id'])) {
            $id = $_GET['id'];

            require('mysql.php');

            if (isset($_POST['submit'])) {
                            $numeErrR = $usernameErrR = $emailErrR = $parolaErrR = $parolaConfirmErrR = "";  
                $numeR = $usernameR = $emailR = $parolaR = $parolaConfirm = "";
                $successR = $errorR = "";

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

                function format($data) {  
                    $data = trim($data);  
                    $data = stripslashes($data);  
                    $data = htmlspecialchars($data);  
                    return $data;  
                }  

                $result = $conn->query($query);
                if (!$result) {
                    echo $conn->error;
                } else {
                    echo "<h2>Modificare efectuată cu success!</h2>";
                    echo "<p>Înapoi la <a href='edit.php'>lista</a>";
                }
            } else {
                //dacă nu s-a efectuat trimiterea, înseamnă că trebuie să afișăm formularul
                $query = "SELECT *
                    FROM utilizator
                    WHERE id_utilizator=".$id;

                $result = $conn->query($query);
                $row = $result->fetch_array();
                ?>
                <form class="form bg-box-dark" id="editCont" action="" method="POST">

                    <div class="form-row">
                        <label for="nume">Nume:</label>
                        <input type="text" name="nume" id="nume" value="<?=$row["nume"]?>" class="inputs">
                    </div>
                    <div class="form-row">
                        <label for="username">Nume utilizator:</label>
                        <input type="text" name="username" id="username" value="<?=$row["nume_utilizator"]?>" class="inputs">
                    </div>
                    <div class="form-row">
                        <label for="e-mail">Email:</label>
                        <input type="email" name="e-mail" id="e-mail" value="<?=$row["email"]?>" class="inputs">
                    </div>
                    <div class="form-row">
                        <label for="parola">Parola:</label>
                        <input type="password" name="parola" id="parola" value="<?=$row["parola"]?>" class="inputs">
                    </div>
                    <div class="form-row">
                        <label for="conf-pass">Confirma parola:</label>
                        <input type="password" name="conf-pass" id="conf-pass" value="<?=$row["parola"]?>" class="inputs">
                    </div>

                    <div class="form-row">
                    <button type="submit" name="submit" class="inputs btn btn-primary">Salveaza</button>
                    </div>

                </form>

                <?php

            }
            $conn->close();
        } else {
            echo "<p>Lipsă paramentru (nu știu ce client să modific)</p>";
            echo "<p>Mergeți înapoi la <a href='clienti.php'>clienti</a> și selectați unul</p>";
        }

    ?>



</article>

<?php require('footer.php'); ?>