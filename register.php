<?php require('header.php'); ?>

<style>
    .nav-container {
        display: none;
    }
    .footer {
        display: none;
    }
</style>

<div class="op-container register-container">
    <form action="" method="post" class="register">
        <div class="form-row">
            <a href="#">Inapoi</a>
            <h3>Inregistreaza-te</h3>
        </div>
        <div class="form-row">
            <label for="nume">Nume:</label>
            <input type="text" name="nume" id="nume">
        </div>
        <div class="form-row">
            <label for="e-mail">Email:</label>
            <input type="email" name="e-mail" id="e-mail">
        </div>
        <div class="form-row">
            <label for="parola">Parola:</label>
            <input type="password" name="parola" id="parola">
        </div>
        <div class="form-row">
            <label for="parola-confirm">Confirma parola:</label>
            <input type="password" name="parola-confirm" id="parola-confirm">
        </div>
        <div class="form-row">
            <a href="login.php">Ai deja un cont?</a>
            <input type="submit" value="Creaza contul">
        </div>
    </form>
</div>

<?php require('footer.php'); ?>