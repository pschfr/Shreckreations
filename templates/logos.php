<?php
/*
Template Name: Logos Page
*/
?>
<?php get_header(); ?>
<?php
    $args = array(
        'post_type' => 'logo',
        'posts_per_page' => -1
    );
    $loop = new WP_Query($args);
?>
<section id="content" role="main" class="pv4 tc">
    <div class="mw8 center cf">
        <?php if ( $loop->have_posts() ) : while ( $loop->have_posts() ) : $loop->the_post(); ?>
            <?php if (has_post_thumbnail()) { ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class('fl w-100 w-third-ns pa3'); ?>>
                    <section class="entry-content bb bw0-ns">
                        <a href="<?php the_post_thumbnail_url('full') ?>">
                            <img src="<?php the_post_thumbnail_url('thumbnail') ?>" alt="<?php the_title(); ?>" />
                        </a>
                        <h1 class="f5 normal"><?php the_title(); ?></h1>
                        <?php the_content(); ?>
                        <div class="entry-links"><?php wp_link_pages(); ?></div>
                    </section>
                </article>
            <?php } ?>
            <?php if ( ! post_password_required() ) comments_template( '', true ); ?>
        <?php endwhile; endif; ?>
    </div>
</section>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
