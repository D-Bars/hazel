<?php get_header('front__page__links'); ?>

<?php if (have_posts()): ?>
    <main data-page="archive-products" class="portfolio__categories__box">
        <div class="category__line">
            <?php
            $categories = get_categories(array(
                'hide_empty' => false,
                'exclude' => 1,
            ));
            ?>

            <h3 class="category__item__title category__active" category-all><?php _e('ALL', 'hazel'); ?></h3>

            <?php if (!empty($categories) && !is_wp_error($categories)): ?>
                <?php
                $category_parent = [];
                $category_child = [];

                foreach ($categories as $category) {
                    if ($category->parent == 0) {
                        $category_parent[] = $category;
                    } else {
                        $category_child[$category->parent][] = $category;
                    }
                }

                foreach ($category_parent as $parent):
                    $category_name = $parent->name;
                    $data_children = '';
                    if (array_key_exists($parent->term_id, $category_child)) {
                        $data_children = ' data-children="' . implode(' ', array_map(function ($child) {
                            return esc_attr($child->name);
                        }, $category_child[$parent->term_id])) . '"';
                    }
                    ?>
                    <h3 class="category__item__title" data-category="<?php echo esc_attr($category_name); ?>" <?php echo $data_children; ?>>
                        <?php _e($category_name); ?>
                    </h3>
                <?php endforeach; ?>

                <?php foreach ($category_child as $parent_id => $children): ?>
                    <?php foreach ($children as $child): ?>
                        <h3 class="category__item__title" data-category="<?php echo esc_attr($child->name); ?>">
                            <?php _e($child->name); ?>
                        </h3>
                    <?php endforeach; ?>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
        <div class="category__content__box">
            <?php
            $items = new WP_Query(array(
                'post_type' => 'products',
                'posts_per_page' => -1
            ));
            if ($items->have_posts()) {
                while ($items->have_posts()) {
                    $items->the_post();

                    $item_image = get_the_post_thumbnail();
                    $item_title = get_the_title();
                    $item_subtitle = get_field('description__field');
                    $item_archive_link = get_post_type_archive_link('products');
                    $category_items = get_the_terms(get_the_ID(), 'category');

                    if (!empty($category_items) && !is_wp_error($category_items)) {
                        $category_names = wp_list_pluck($category_items, 'name');

                        $category_name_string = implode(', ', $category_names);
                    } else {
                        $category_name_string = '';
                    }
                    ?>
                    <a href="<?php the_permalink(); ?>" class="category__product"
                        data-category="<?php echo esc_attr($category_name_string); ?>">
                        <div class="category__product__wrapper__img"><?php echo $item_image; ?></div>
                        <div class="category__product__content__box">
                            <div class="category__product__title"><?php echo $item_title; ?></div>
                            <div class="category__product__subtitle"><?php echo $item_subtitle; ?></div>
                        </div>
                    </a>
                    <?php
                }
                wp_reset_postdata();
            }
            ?>
        </div>
    </main>

<?php else: ?>
    <p><?php _e('Products not found', 'hazel'); ?></p>
<?php endif; ?>

<?php get_footer(); ?>