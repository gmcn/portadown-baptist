<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Starting_Theme
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="icon" href="<?php echo get_template_directory_uri(); ?>/images/favicon.png">
<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/images/favicon.png">
<link type="text/plain" rel="author" href="<?php echo get_template_directory_uri(); ?>/humans.txt" />
<link type="text/plain" rel="robots" href="<?php echo get_template_directory_uri(); ?>/robots.txt" />
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'starting-theme' ); ?></a>

	<header class="site-header" role="banner">

		<nav class="navbar">
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/"><img src="<?php echo get_stylesheet_directory_uri();?>/images/logo.svg" alt="<?php echo get_bloginfo( 'description', 'display' ) ?>"/></a>
          </div>
          <div id="navbar" class="navbar-collapse collapse" aria-expanded="false" style="height: 1px;">
						<ul class="nav navbar-nav navbar-right social-header">
							<li>
								<a href="/"><img src="<?php echo get_stylesheet_directory_uri();?>/images/facebook-icon_header.svg" alt="Like Portadown Baptist on Facebook"></a>
							</li>
							<li>
								<a href="/"><img src="<?php echo get_stylesheet_directory_uri();?>/images/twitter-icon_header.svg" alt="Follow Portadown Baptist on Twitter"></a>
							</li>
							<li>
								<a href="/"><img src="<?php echo get_stylesheet_directory_uri();?>/images/youtube-icon_header.svg" alt="Portadown Baptist on Youtube"></a>
							</li>
						</ul>
						<?php wp_nav_menu( array(
				      'theme_location' => 'menu-1',
				      'menu_id' => 'navbar',
				      'menu_class' => 'navbar-collapse mainnav',
				      'items_wrap' => '<ul id="" class="nav navbar-nav navbar-right">%3$s</ul>' ) );
				      ?>
          </div><!--/.nav-collapse -->
        </div><!--/.container-fluid -->
      </nav>

	</header><!-- #masthead -->

	<div id="content" class="site-content">
