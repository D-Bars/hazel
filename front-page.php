<?php get_header(); ?>

<div class="about__us__block">
    <div class="about__us__content">
        <div class="about__us__wrapper__img"><i class="fa-solid fa-sign-hanging"></i></div>
        <span><?php _e('WE ARE HAZEL', 'hazel'); ?></span>
        <h2 class="about__us__title"><?php _e('ABOUT US', 'hazel'); ?></h2>
        <div class="about__us__description">
            <?php _e('Assertively impact bricks-and-clicks outsourcing after mission-critical ROI. Monotonectally underwhelm cost effective convergence without granular alignments. Progressively create client-based platforms.', 'hazel'); ?>
        </div>
    </div>
    <?php
    global $post;
    $advantages = get_posts(array(
        'post_type' => 'advantages',
        'numberposts' => 4
    ));
    $advantagesFieldsArr = [];
    foreach ($advantages as $advantage) {
        $advantagesFieldsArr[] = [
            'title' => __($advantage->post_title, 'hazel'),
            'description' => __($advantage->post_content, 'hazel'),
            'image' => get_the_post_thumbnail($advantage)
        ];
    }
    ?>
    <?php if ($advantages): ?>
        <div class="advantages__circle__box">
            <div class="advantages__circle">
                <div class="advantages__circle__content">
                    <h3 class="advantages__title" title></h3>
                    <div class="advantages__description" description></div>
                </div>
                <div class="advantages__items__box">
                    <?php
                    $i = 0;
                    foreach ($advantagesFieldsArr as $advantage):
                        ?>
                        <div class="advantages__item <?php echo (!$i) ? 'adv__active' : '' ?>"
                            data-title="<?php echo $advantage['title'] ?>"
                            data-description="<?php echo $advantage['description'] ?>">
                            <?php echo $advantage['image']; ?>
                        </div>
                        <?php $i += 1; endforeach; ?>
                </div>
            </div>
            <div class="advantages__mobile">
                <?php
                foreach ($advantagesFieldsArr as $advantage):
                    ?>
                    <div class="advantages__mobile__item">
                        <div class="advantages__mobile__left__box">
                            <div class="advantages__mobile__wrapper__img">
                                <?php echo $advantage['image']; ?>
                            </div>
                            <div class="advantages__mobile__stick"></div>
                        </div>
                        <div class="advantages__mobile__content">
                            <div class="title"><?php echo _e($advantage['title'], 'hazel'); ?></div>
                            <div class="description"><?php echo _e($advantage['description'], 'hazel'); ?></div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    <?php endif; ?>
</div>

<div class="why__us__block">
    <div class="why__us__background__wrapper">
        <div class="why__us__background" id="wrapper__parallax"></div>
    </div>
    <div class="why__us__content">
        <h2 class="why__us__title">WHY CHOOSE US?</h2>
        <div class="why__us__slider__block">
            <div class="why__us__slider__item">
                <div class="why__us__item__content">
                    <i class="fa-solid fa-globe"></i>
                    <div class="why__us__slider__title">Translation Read</div>
                    <div class="why__us__slider__description">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        Lorem ipsum dolor sit amet</div>
                </div>
            </div>
            <div class="why__us__slider__item">
                <div class="why__us__item__content">
                    <i class="fa-solid fa-print"></i>
                    <div class="why__us__slider__title">Demos Included</div>
                    <div class="why__us__slider__description">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        Lorem ipsum dolor sit amet</div>
                </div>
            </div>
            <div class="why__us__slider__item">
                <div class="why__us__item__content">
                    <i class="fa-solid fa-feather"></i>
                    <div class="why__us__slider__title">Usefull Features</div>
                    <div class="why__us__slider__description">Lorem ipsum dolor sit amet consectetur adipisicing
                        elit.Lorem ipsum dolor sit amet</div>
                </div>
            </div>
            <div class="why__us__slider__item">
                <div class="why__us__item__content">
                    <i class="fa-solid fa-tv"></i>
                    <div class="why__us__slider__title">Unlimited Colors</div>
                    <div class="why__us__slider__description">Lorem ipsum dolor sit amet consectetur adipisicing
                        elit.Lorem ipsum dolor sit amet</div>
                </div>
            </div>
            <div class="why__us__slider__item">
                <div class="why__us__item__content">
                    <i class="fa-solid fa-palette"></i>
                    <div class="why__us__slider__title">Minimalist Design</div>
                    <div class="why__us__slider__description">Lorem ipsum dolor sit amet consectetur adipisicing
                        elit.Lorem ipsum dolor sit amet</div>
                </div>
            </div>
            <div class="why__us__slider__item">
                <div class="why__us__item__content">
                    <i class="fa-solid fa-building"></i>
                    <div class="why__us__slider__title">Page Builder</div>
                    <div class="why__us__slider__description">Lorem ipsum dolor sit amet consectetur adipisicing
                        elit.Lorem ipsum dolor sit amet</div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="services__block">
    <div class="services__box">
        <div class="services__item services__left" id="TriggerObserv__left" PosLeft>
            <div class="services__wrapper__img"><img
                    src="<?php echo get_template_directory_uri(); ?>/assets/img/services1.jpg" alt="Services"></div>
            <div class="services__content">
                <span>WE'RE HAZEL</span>
                <div class="services__content__title">100% <span>RESPONSIVE
                        <br />FROM HD TO MOBILE</span>
                </div>
                <div class="services__content__description">Globally evisculate synergistic niche markets whereas timely
                    e-markets. Distinctively formulate timely web-readiness with long-term high-impact infrastructures.
                </div>
                <button class="services__btn">Buy Hazel</button>
            </div>
        </div>
        <div class="services__item services__right" id="TriggerObserv__right" PosRight>
            <div class="services__wrapper__img"><img
                    src="<?php echo get_template_directory_uri(); ?>/assets/img/services2.jpg" alt="Services"></div>
            <div class="services__content">
                <span>WE HAVE ALL</span>
                <div class="services__content__title">BUILD AN AWESOME <br /><span>
                        WEBSITE WITH HAZEL</span>
                </div>
                <div class="services__content__description">Globally evisculate synergistic niche markets whereas timely
                    e-markets. Distinctively formulate timely web-readiness with long-term high-impact infrastructures.
                </div>
                <button class="services__btn">see features</button>
            </div>
        </div>
    </div>
</div>

<div class="questions__block">
    <div class="questions__content">
        <div class="questions__title">Pre<span>-</span>Sale Questions</div>
        <div class="questions__subtitle">Prospective functionalities for interactive commun generate economically sound
            infrastructures before process.</div>
        <button class="questions__btn">contact us</button>
    </div>
</div>

<div class="portfolio__block">
    <div class="portfolio__heade__box">
        <div class="separator__line"></div>
        <span>WE BUILD GOOD STUFF</span>
        <h2 class="portfolio__title">OUR PORTFOLIO</h2>
        <div class="portfolio__subtitle">Assertively impact bricks-and-clicks outsourcing after mission-critical ROI.
            Monotonectally underwhelm cost effective convergence without granular alignments. Progressively create
            client-based platforms.</div>
    </div>
    <div class="portfolio__categories__box">
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
                    $category_items = get_the_terms(get_the_ID(), 'category');

                    if (!empty($category_items) && !is_wp_error($category_items)) {
                        $category_names = wp_list_pluck($category_items, 'name');

                        $category_name_string = implode(', ', $category_names);
                    } else {
                        $category_name_string = '';
                    }
                    ?>
                    <div class="category__product" data-category="<?php echo esc_attr($category_name_string); ?>">
                        <div class="category__product__wrapper__img"><?php echo $item_image; ?></div>
                        <div class="category__product__content__box">
                            <div class="category__product__title"><?php echo $item_title; ?></div>
                            <div class="category__product__subtitle"><?php echo $item_subtitle; ?></div>
                        </div>
                    </div>
                    <?php
                }
                wp_reset_postdata();
            }
            ?>
        </div>
    </div>
</div>

<?php
global $post;
$reviews = get_posts(array(
    'post_type' => 'reviews',
    'numberposts' => -1
));
?>

<?php
if ($reviews):
    ?>
    <div class="reviews__block">
        <h2><?php _e('OUR CLIENTS FEEDBACK', 'hazel'); ?></h2>
        <div class="customers__img__box">
            <?php foreach ($reviews as $review):
                $customer__fullname = get_field('customer_full_name', $review->ID);
                $customer__profession = get_field('customer_profession', $review->ID);
                $customer__review = get_field('customer_review', $review->ID);
                ?>
                <div class="customer__wrapper__img" 
                data-fullname="<?php echo $customer__fullname; ?>"
                data-profession="<?php echo $customer__profession; ?>"
                data-review="<?php echo $customer__review ?>"
                >
                    <?php echo get_the_post_thumbnail($review); ?>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="customers__review__box">
            <div class="customer__review__content"></div>
            <div class="customer__review__fullname"></div>
            <div class="customer__review__profession"></div>
        </div>
        <div class="separator__stick"></div>
    </div>
<?php endif; ?>

<div class="manufacturers__block">
    <div class="manufacturer__wrapper__img"><img src="" alt=""></div>
    <div class="manufacturer__wrapper__img"><img src="" alt=""></div>
    <div class="manufacturer__wrapper__img"><img src="" alt=""></div>
    <div class="manufacturer__wrapper__img"><img src="" alt=""></div>
</div>

<div class="contact__form__block">
    <div class="contact__form__wrapper__img"><img src="" alt=""></div>
    <span></span>
    <h2></h2>
    <!-- shortcode -->
    <div class="contact__details__box"><!-- design el!(::after) -->
        <div class="contact__details__item"></div>
    </div>
</div>

<div class="map__block">
    <div class="banner__box">
        <div class="banner__wrapper__img">
            <div class="banner__mask__img"><img src="" alt=""></div>
        </div>
        <span></span>
        <h2></h2>
    </div>
    <div class="map__box"></div>
</div>

<?php get_footer(); ?>