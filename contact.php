<?php require('header.php'); ?>

<div id="contact">
    <address>
        <h3>Ne puteti gasi:</h3>
        <div class="addr-row">
            <h4>Sediu:</h4>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Cumque cupiditate amet deserunt similique, tempora repellat.</p>
        </div>
        <div class="addr-row">
            <h4>Localitate:</h4>
            <p>Alba Iulia</p>
        </div>
        <div class="addr-row">
            <h4>Judet:</h4>
            <p>Alba</p>
        </div>
        <div class="addr-row">
            <h4>Telefon:</h4>
            <p>0257589598</p>
        </div>
        <div class="addr-row">
            <h4>Social:</h4>
            <div class="social">
                <a href="#"><i class="bi bi-facebook"></i></a>
                <a href="#"><i class="bi bi-whatsapp"></i></a>
                <a href="#"><i class="bi bi-instagram"></i></a>
            </div>
        </div>
    </address>

    <form action="" method="POST">
        <div class="form-row">
            <h3>Pentru intrebari sau curiozitati:</h3>
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
            <label for="telefon">Telefon:</label>
            <input type="tel" name="telefon" id="telefon">
        </div>
        <div class="form-row flex-col">
            <label for="comment">Comentariu:</label>
            <textarea name="comment" id="comment" cols="30" rows="10"></textarea>
        </div>
        <div class="form-row">
            <input type="checkbox" name="condition" id="condition">
            <label for="condition">Acceptati termenii si conditiile</label>
        </div>
        <div class="form-row">
            <input type="submit" value="Trimite" class="btn btn-primary">
        </div>
    </form>
</div>

<?php require('footer.php'); ?>