<?php
/**
 * The Header for our theme
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */
?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8) ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<meta name="google-site-verification" content="Zbkyb4DL-U9IkG4gp_hHAthloegNwGnkYNBgS2PZCAQ" />
	<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/images/favicon1.ico" />
	<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
	<![endif]-->

	<?php wp_head(); ?>
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/font_icons8.css"/>
	<script src="<?php echo get_template_directory_uri(); ?>/js/jquery-1.8.3.ext.min.js"></script>
	<script src="<?php echo get_template_directory_uri(); ?>/js/scripts.js"></script>
	<script src="//api-maps.yandex.ru/2.1/?lang=ru_RU" type="text/javascript"></script>
</head>

<body <?php body_class(); ?>>

<div class="overlay">
	<span class="close">✕</span>
	<div class="opacity"> </div>
	<div class="left_triangle">
		<div class="triangle"></div>
	</div>
	<div class="right_triangle">
		<div class="triangle"></div>
	</div>

	<h3></h3>
	<img  src="">


	<div class="counter_of_images"></div>
</div>


<div id="page" class="hfeed site">


<header class="header">
	<div class="header_controls">
			<div class="header_bg">
				<div class="opacity">
					
				</div>
				<div id="search-container" class="search-box-wrapper hide">
					<div class="search-box">
						<?php get_search_form(); ?>
					</div>
				</div>
				<div class="header_more icons8-menu" title = "See more">
				</div>
				<div class="header_search icons8-search" title="Find">
				</div>
				<div class="ru_en-block">
					<span>En/</span>
					<a href = "/" title = "Go to russian version">ru</a>
				</div>
				<div class="block_of_a">
					<a href="/en/all-news" title="See all news">See all news</a>
				</div>



			</div>
	</div>

	<h1 class="header_logo">
		
		<?php $posts = get_posts ("category_name=logo&orderby=date&numberposts=1"); ?>
            <?php if ($posts) : ?>
            <?php foreach ($posts as $post) : setup_postdata ($post); ?>
            	<?php the_post_thumbnail('full'); ?> 
            <?php endforeach; ?>
            <?php endif; ?>
<a href = "/en/" title = "Terra de luxe"></a>
	</h1>





	
	

<nav id="primary-navigation" class="site-navigation primary-navigation" role="navigation">
		<?php wp_nav_menu( array( 'menu' => 'mainmenuru', 'menu_class' => 'nav-menu' ) ); ?>
</nav>

<div class="opacity bg"></div>


	


</header>





	<div id="main" class="site-main">
