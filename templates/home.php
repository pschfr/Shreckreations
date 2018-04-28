<?php
/*
Template Name: Home Page
*/
?>
<?php get_header(); ?>
<section id="links" class="bg-black white tc pv3">
    <div class="mw8 center cf">
        <div class="fl w-third">
            <a href="<?php echo get_site_url(); ?>/test">
                Test
            </a>
        </div>
        <div class="fl w-third">
            <a href="<?php echo get_site_url(); ?>/test">
                Test
            </a>
        </div>
        <div class="fl w-third">
            <a href="<?php echo get_site_url(); ?>/test">
                Test
            </a>
        </div>
    </div>
</section>
<section id="content" role="main" class="row">
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
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
