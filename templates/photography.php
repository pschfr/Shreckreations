<?php
/*
Template Name: Photography Page
*/
?>
<?php get_header(); ?>
<?php
    $args = array(
        'post_type' => 'photo',
        'posts_per_page' => -1
    );
    $loop = new WP_Query($args);
?>
<section id="content" role="main" class="bg-black white pv3">
    <?php if ( $loop->have_posts() ) : while ( $loop->have_posts() ) : $loop->the_post(); ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <section class="entry-content">
                <?php if ( has_post_thumbnail() ) { the_post_thumbnail(); } ?>
                <?php the_content(); ?>
                <div class="entry-links"><?php wp_link_pages(); ?></div>
            </section>
        </article>
        <?php if ( ! post_password_required() ) comments_template( '', true ); ?>
        <?php endwhile; endif; ?>
</section>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
