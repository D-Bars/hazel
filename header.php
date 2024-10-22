<!DOCTYPE html>
<html lang="<?php language_attributes(); ?>">

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php bloginfo('name'); ?></title>
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    <header>
        <div class="container-fluid header__line__block" id="header__line">
            <div class="row">
                <div class="col-12 col-md-4">
                    <a href="/" class="header__logo__wrapper">
                        <?php if (the_custom_logo()): ?>
                            <?php the_custom_logo(); ?>
                        <?php else: ?>
                            <h1 class="header__logo__name"><?php bloginfo('name'); ?></h1>
                        </a>
                    <?php endif; ?>
                </div>


                <nav class="col-12 col-md-8">
                    <ul class="header__menu__box">
                        <li><a href="#" class="header__menu__item active__menu__item"><?php _e('Home', 'hazel'); ?></a></li>
                        <li><a href="#" class="header__menu__item"><?php _e('About', 'hazel'); ?></a></li>
                        <li><a href="#" class="header__menu__item"><?php _e('Services', 'hazel'); ?></a></li>
                        <li><a href="#" class="header__menu__item"><?php _e('Work', 'hazel'); ?></a></li>
                        <li><a href="#" class="header__menu__item"><?php _e('Clients', 'hazel'); ?></a></li>
                        <li><a href="#" class="header__menu__item"><?php _e('Contact', 'hazel'); ?></a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>