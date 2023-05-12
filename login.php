<?php require('header.php'); ?>

<style>
    .nav-container {
        display: none;
    }
    .footer {
        display: none;
    }
</style>

<div class="op-container login-container">
    <form action="" method="post" class="login">
        <div class="form-row">
            <a href="#">Inapoi</a>
            <h3>Conecteaza-te</h3>
        </div>
        <div class="form-row">
            <label for="username">Nume utilizator:</label>
            <input type="text" name="username" id="username">
        </div>
        <div class="form-row">
            <label for="parola">Parola:</label>
            <input type="password" name="parola" id="parola">
        </div>
        <div class="form-row">
            <a href="register.php">Nu ai cont?</a>
            <input type="submit" value="Conecteaza-te">
        </div>
    </form>
</div>

<?php require('footer.php'); ?>