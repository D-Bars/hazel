<?php get_header(); ?>

<?php
$item_image = get_the_post_thumbnail(get_the_ID(), 'full');
$item_full_description = get_field('full__description__field');
?>
<main class="single__product__item">
    <?php
    while (have_posts()):
        the_post(); ?>
        <h1><?php the_title(); ?></h1>
        <div class="single__product__item__box">
            <?php
            $gallery_ids = get_post_meta(get_the_ID(), '_product_gallery', true);
            if (!empty($gallery_ids) && is_array($gallery_ids)): ?>
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
                        $gallery_ids = get_post_meta(get_the_ID(), '_product_gallery', true);
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

                        <!-- Навигация для первого слайда (изображение товара) -->
                        <div class="product__slider-nav__img">
                            <img src="<?php echo esc_url($item_image_url); ?>" alt="">
                        </div>

                        <?php
                        // Получаем изображения из галереи
                        $gallery_ids = get_post_meta(get_the_ID(), '_product_gallery', true);
                        if (!empty($gallery_ids) && is_array($gallery_ids)):
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
            <?php endif; ?>
            <div class="single__product__item__content"><?php echo $item_full_description ?></div>
        </div>


    <?php endwhile; ?>
</main>

<?php get_footer(); ?>