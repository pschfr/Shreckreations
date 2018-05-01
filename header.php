<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>" />
		<meta name="description" content="<?php bloginfo('name'); ?>, <?php is_front_page() ? bloginfo('description') : wp_title(''); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<title>
			<?php bloginfo('name'); ?>, <?php is_front_page() ? bloginfo('description') : wp_title(''); ?>
		</title>
		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?>>
		<header class="mt5 ph3 tc">
			<h1 class="f2-ns f3 fw3 ttu tracked lh-solid">
				<a href="<?php echo get_site_url(); ?>">
					<img src="<?php echo get_template_directory_uri(); ?>/includes/logo.svg" alt="<?php bloginfo('name'); echo ' '; bloginfo('description'); ?>" class="center db w-100 mw6 mb3" />
				</a>
				<?php bloginfo('name'); ?>
				<br />
				<span class="gray f3-ns f4">
					<?php bloginfo('description'); ?>
				</span>
			</h1>
			<?php wp_nav_menu(array(
				'theme_location' => 'first_menu',
				'menu_class'     => 'list pl0 ttu',
				'container'      => 'nav',
			)); ?>
		</header>
