<footer>
    <?php global $theme__options; ?>
    <div class="footer__logo__link__wrapper">
        <?php
        if ($theme__options['footer__logo']): ?>
            <a href="<?php echo home_url(); ?>">
                <?php echo '<img src="' . esc_url($theme__options['footer__logo']) . '" alt="FooterLogo">' ?>
            </a>
        <?php endif; ?>
    </div>
    <div class="footer__social__media__box">

        <?php if ($theme__options['footer__linkedIn']): ?>
            <div class="footer__social__media__item">
                <a href="<?php echo $theme__options['footer__linkedIn'] ?>"><i class="fa-brands fa-linkedin-in"></i></a>
            </div>
        <?php endif; ?>

        <?php if ($theme__options['footer__facebook']): ?>
            <div class="footer__social__media__item">
                <a href="<?php echo $theme__options['footer__facebook'] ?>"><i class="fa-brands fa-facebook-f"></i></a>
            </div>
        <?php endif; ?>

        <?php if ($theme__options['footer__instagram']): ?>
            <div class="footer__social__media__item">
                <a href="<?php echo $theme__options['footer__instagram'] ?>"><i class="fa-brands fa-instagram"></i></a>
            </div>
        <?php endif; ?>

        <?php if ($theme__options['footer__youtube']): ?>
            <div class="footer__social__media__item">
                <a href="<?php echo $theme__options['footer__youtube'] ?>"><i class="fa-brands fa-youtube"></i></a>
            </div>
        <?php endif; ?>


    </div>
</footer>
<?php wp_footer(); ?>
</body>

</html>