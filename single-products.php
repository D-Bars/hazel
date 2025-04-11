<?php get_header('front__page__links'); ?>

<?php
$item_image = get_the_post_thumbnail(get_the_ID(), 'full');

$prev_post = get_previous_post(false);
$next_post = get_next_post(false);
?>

<main class="single__product">
    <?php
    while (have_posts()):
        the_post(); ?>
        <div class="single__product__header__box">
            <h1><?php the_title(); ?></h1>
            <div class="back__to__panel">
                <a class="back__to__btn back__to__archive" href="<?php echo get_post_type_archive_link('products'); ?>">
                    <?php _e('Back to archive', 'hazel'); ?>
                </a>
                <a href="<?php echo home_url(); ?>" class="back__to__btn back__to__home">
                    <?php _e('Back to home', 'hazel'); ?>
                </a>
            </div>
        </div>
        <div class="single__product__item__box">
            <?php
            $gallery_ids = get_post_meta(get_the_ID(), '_product_gallery', true);
            ?>
            <div class="product__slider__container">
                <!-- Основной слайдер -->
                <div class="single__product__slider-for">
                    <?php
                    // Получаем изображение товара
                    $item_image = get_the_post_thumbnail(get_the_ID(), 'full');
                    $full_url = get_the_post_thumbnail_url(get_the_ID(), 'full'); // URL изображения товара для ссылки
                    ?>

                    <!-- Дефолтная картинка для первого слайда (изображение товара) -->
                    <a class="product__slider-for__img" href="<?php echo esc_url($full_url); ?>" data-fancybox="gallery">
                        <?php echo $item_image; // Выводим изображение товара ?>
                    </a>

                    <?php
                    // Получаем изображения из галереи
                    if (!empty($gallery_ids) && is_array($gallery_ids)):
                        foreach ($gallery_ids as $image_id):
                            $img_url = wp_get_attachment_image_url($image_id, 'large');
                            $full_url = wp_get_attachment_image_url($image_id, 'full');
                            ?>
                            <!-- Следующие изображения из галереи -->
                            <a class="product__slider-for__img" href="<?php echo esc_url($full_url); ?>" data-fancybox="gallery">
                                <img src="<?php echo esc_url($img_url); ?>" alt="">
                            </a>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>

                <!-- Навигационный слайдер -->
                <div class="single__product__slider-nav">
                    <?php
                    // Получаем URL изображения товара для навигации
                    $item_image_url = get_the_post_thumbnail_url(get_the_ID(), 'thumbnail'); // Получаем URL изображения товара для миниатюры
                    ?>



                    <?php
                    // Получаем изображения из галереи
                    if (!empty($gallery_ids) && is_array($gallery_ids)):
                        ?>
                        <!-- Навигация для первого слайда (изображение товара) -->
                        <div class="product__slider-nav__img">
                            <img src="<?php echo esc_url($item_image_url); ?>" alt="">
                        </div>
                        <?php
                        foreach ($gallery_ids as $image_id):
                            $thumb_url = wp_get_attachment_image_url($image_id, 'thumbnail');
                            ?>
                            <!-- Остальные изображения из галереи для навигации -->
                            <div class="product__slider-nav__img">
                                <img src="<?php echo esc_url($thumb_url); ?>" alt="">
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>
            <div class="single__product__item__content"><?php the_content(); ?></div>
        </div>

        <div class="nav__products__panel">
            <?php
            if ($prev_post):
                $prev_post_url = get_permalink($prev_post->ID);
                ?>
                <a href="<?php echo esc_url($prev_post_url); ?>"
                    class="nav__products__arrow product__prev"><?php echo get_the_title($prev_post->ID); ?></a>
            <?php endif; ?>
            <?php
            if ($next_post):
                $next_post_url = get_permalink($next_post->ID);
                ?>
                <a href="<?php echo esc_url($next_post_url); ?>"
                    class="nav__products__arrow product__next"><?php echo get_the_title($next_post->ID); ?></a>
            <?php endif; ?>
        </div>
    <?php endwhile; ?>
</main>

<?php get_footer(); ?>