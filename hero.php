<?php
    $slideImages = glob('./Images/Slideshow/*');
    $countImages = count($slideImages);
?>

<section id="hero-banner" class="container hero border-bot p-0">
    <?php
        for ($j = 0; $j < $countImages; $j++) { ?>
            <div class="hero-image" style="background-image: url('<?php echo $slideImages[$j]; ?>');">
                <button class="left-button arrow" onclick="plusSlides(-1)"><i class="bi bi-arrow-left-circle color-dark-effect"></i></button>
                <div class="dots">
                    <?php
                        for($i = 1; $i <= $countImages; $i++) { ?>
                            <span class="dot" onclick="currentSlide(<?php echo $i; ?>)"></span> 
                    <?php }
                    ?>
                </div>
                <button class="right-button arrow" onclick="plusSlides(1)"><i class="bi bi-arrow-right-circle color-dark-effect"></i></button>
            </div>
    <?php }
    ?>
    <!-- <img src="https://dummyimage.com/600x400/000/fff" alt="hero-image" class="hero-image"> -->
    
</section>