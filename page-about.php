<?php
/**
 * Template for displaying the about page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Global_Reporting_Centre
 */
  get_header();
  $sidebar = get_field('page_sidebar');
?>

<div id="primary" class="content-area">
  <main id="main" class="site-main">

    <article id="page-about" <?php post_class(); ?>>

      <header class="entry-header">
        <h1 class="site-width">Global journalism, done differently.<sup><a href="#collaborate">[1]</a><a href="#experiment">[2]</a><a href="#teach">[3]</a></sup></h1>
      </header>

      <div class="entry-content">
      <?php if ($sidebar) : ?>
        <div class="grid align-to-top">
          <div class="column">
            <?php the_content(); ?>
            <?php get_template_part( 'template-parts/custom-fields/custom', 'funders' ); ?>
          </div>
          <div class="column third sidebar">
            <?php echo $sidebar; ?>
          </div>
        </div>
      <?php else : 
        the_content(); 
        get_template_part( 'template-parts/custom-fields/custom', 'funders' ); 
      endif; ?>
      </div><!-- .entry-content -->

    </article>

  </main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();