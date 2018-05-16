<?php
/*
Template Name: Home Page
*/
?>
<?php get_header(); ?>
<section id="links" class="bg-black white tc ttu fw9 f3-l pv4">
    <div class="mw8 center cf">
        <div class="fl w-100 w-50-m w-25-ns pa3">
            <a href="<?php echo get_site_url(); ?>/logos" class="white db relative">
                <img src="https://via.placeholder.com/450x250" class="" alt="Logos" />
                <span class="dib w-100 absolute bottom-1 left-0">Logos</span>
            </a>
        </div>
        <div class="fl w-100 w-50-m w-25-ns pa3">
            <a href="<?php echo get_site_url(); ?>/illustration" class="white db relative">
                <img src="https://via.placeholder.com/450x250" class="" alt="Illustration" />
                <span class="dib w-100 absolute bottom-1 left-0">Illustration</span>
            </a>
        </div>
        <div class="fl w-100 w-50-m w-25-ns pa3">
            <a href="<?php echo get_site_url(); ?>/photography" class="white db relative">
                <img src="https://via.placeholder.com/450x250" class="" alt="Photography" />
                <span class="dib w-100 absolute bottom-1 left-0">Photography</span>
            </a>
        </div>
        <div class="fl w-100 w-50-m w-25-ns pa3">
            <a href="<?php echo get_site_url(); ?>/misc" class="white db relative">
                <img src="https://via.placeholder.com/450x250" class="" alt="misc" />
                <span class="dib w-100 absolute bottom-1 left-0">Misc.</span>
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
