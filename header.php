<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Global_Reporting_Centre
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'global-reporting-centre' ); ?></a>
	<header class="site-header" role="banner">
        <div class="outer">
            <div class="site-width nav-container">
                <div id="branding-toggle">
                    <div class="site-branding">
                      <a href="<?php echo get_home_url(); ?>" class="custom-logo-link" rel="home"><img width="150" height="70" src=https://globalreportingcentre.org/wp-content/uploads/2020/06/global_reporting_centre_logo.svg" class="custom-logo" alt="Global Reporting Centre Logo"></a><span class="screen-reader-text"><?php bloginfo('name'); ?></span>
                    </div>
                    <button id="menu-toggle" class="toggle" aria-controls="primary-menu" aria-expanded="false" aria-label="Toggle Menu">
                        <span></span><span></span><span></span><span></span>
                    </button>
                </div>
                <nav id="site-navigation" class="main-navigation" role="navigation">
                    <?php
                    wp_nav_menu( array(
                        'theme_location' => 'primary',
                        'menu_id'        => 'primary-menu',
                        'container'      => 'ul',
                    ) );
                    ?>
                </nav>
            </div>
        </div>
	</header><!-- #masthead -->
	<div id="content">
