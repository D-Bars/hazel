<!DOCTYPE html>
<html lang="<?php language_attributes(); ?>">

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php bloginfo('name'); ?></title>
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <div data-scroll-container>
        <section data-scroll-section>
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
                                <li><a href="#"
                                        class="header__menu__item active__menu__item"><?php _e('Home', 'hazel'); ?></a>
                                </li>
                                <li><a href="#" class="header__menu__item"><?php _e('About', 'hazel'); ?></a></li>
                                <li><a href="#" class="header__menu__item"><?php _e('Services', 'hazel'); ?></a></li>
                                <li><a href="#" class="header__menu__item"><?php _e('Work', 'hazel'); ?></a></li>
                                <li><a href="#" class="header__menu__item"><?php _e('Clients', 'hazel'); ?></a></li>
                                <li><a href="#" class="header__menu__item"><?php _e('Contact', 'hazel'); ?></a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="header__content__block">
                    <div class="header__content__company__box">
                        <h1 class="header__company__title">
                            <?php _e('Lorem ipsum, dolor sit amet consectetur adipisicing elit. Consequatur, vel.', 'hazel'); ?>
                        </h1>
                        <div class="header__company__description">
                            <?php _e('Lorem ipsum, dolor sit amet consectetur adipisicing elit. Consequatur, vel. A fuga eveniet minima sunt placeat odit atque labore. Ad explicabo ducimus quibusdam laborum a reprehenderit, inventore impedit modi beatae.', 'hazel'); ?>
                        </div>
                        <div class="header__company__btn"><?php _e('Contact us here', 'hazel'); ?></div>
                    </div>
                </div>
            </header>