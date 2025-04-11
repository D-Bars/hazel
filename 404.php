<?php get_header('empty'); ?>
<div class="error__page__block">
    <div class="error__page__wrapper__img">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/404.svg" alt="Error404">
    </div>
    <div class="error__page__message">
        <span><?php _e('Sry, this page not found', 'hazel'); ?></span>
        <a class="error__page__home__btn" href="<?php echo home_url(); ?>"><?php _e('Home', 'hazel'); ?></a>
    </div>
</div>

<?php get_footer('empty'); ?>