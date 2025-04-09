<?php get_header(); ?>

<main class="single-product">
    <?php
    while ( have_posts() ) : the_post(); ?>
        <h1><?php the_title(); ?></h1>
        <div><?php the_content(); ?></div>
    <?php endwhile; ?>
</main>

<?php get_footer(); ?>