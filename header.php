<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
	<![endif]-->
	<?php wp_head(); ?>
</head>


<body <?php body_class(); ?>>
	<div id="page">
		<header id="main-header" role="banner">
			<div class="container">
				<div class="logo-container">
					<a href="<?= esc_url( home_url( '/' ) ); ?>">
						<img src="wp-content/themes/PTM/img/logo.png" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>" id="logo" />
						<span class="site-title"><i>Proxy</i> ta mère</span>
					</a>
				</div>
				<div class="menu-container clearfix">
					<?php
					$primaryNav = wp_nav_menu( array( 'theme_location' => 'primary-menu', 'container' => '', 'fallback_cb' => '', 'echo' => false ) );
					echo $primaryNav;
					?>
				</div>
			</div><!-- End container -->
		</header><!-- #masthead -->

		<div id="main" class="site-main">