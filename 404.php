<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Global_Reporting_Centre
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

			<section class="error-404 not-found">
				<header class="page-header site-width">
					<h1 class="page-title"><?php esc_html_e( 'Sorry, that page can&rsquo;t be found.', 'global-reporting-centre' ); ?></h1>
				</header><!-- .page-header -->

				<div class="page-content site-width">
					<p>Try heading to the <a href="<?php echo get_home_url(); ?>">home page.</a>
				</div><!-- .page-content -->
			</section><!-- .error-404 -->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
