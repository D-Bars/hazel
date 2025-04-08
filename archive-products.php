<?php get_header(); ?>

<?php if (have_posts()): ?>
    <?php while (have_posts()):
        the_post(); ?>

    <?php endwhile; ?>

<?php else: ?>
    <p><?php _e('Product not found', 'hazel'); ?></p>
<?php endif; ?>

<?php get_footer(); ?>