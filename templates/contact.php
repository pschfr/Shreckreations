<?php
/*
Template Name: Contact Page
*/
?>
<?php
    if (function_exists('wpcf7_enqueue_scripts'))
        wpcf7_enqueue_scripts();
 
    if (function_exists('wpcf7_enqueue_styles'))
        wpcf7_enqueue_styles();
?>
<?php get_header(); ?>
<section id="content" role="main" class="bg-black white pv4">
    <div class="mw8 center cf">
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class('fl w-100'); ?>>
                <header class="header" id="header">
                    <h1 class="entry-title"><?php the_title(); ?></h1>
                </header>
                <section class="entry-content">
                    <?php if ( has_post_thumbnail() ) { the_post_thumbnail(); } ?>
                    <?php the_content(); ?>
                    <div class="entry-links"><?php wp_link_pages(); ?></div>
                </section>
            </article>
            <?php if ( ! post_password_required() ) comments_template( '', true ); ?>
        <?php endwhile; endif; ?>
    </div>
</section>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
