<?php
/**
 * The TRACE modules template file
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Global_Reporting_Centre
 */

get_header();
$sidebar = get_field('page_sidebar');
?>

<div id="primary" class="content-area site-width">
  <main id="main" class="site-main list-view modules">
    <h1 class="page-title"><?php the_title(); ?></h1>

    <?php if ($sidebar) : ?>
      <div class="grid align-to-top">
        <div class="column">
          <?php the_content(); ?>
        </div>
        <div class="column third sidebar">
          <?php echo $sidebar; ?>
        </div>
      </div>
    <?php else :
      the_content();
    endif; ?>

		<?php //query for stories
      $modules = new WP_Query(array (
        'post_type' => 'post',
        'category_name' => 'tracing-the-story',
        'posts_per_page' => '-1'
      ));

      if ($modules->have_posts()) : ?>
        <h2 class="section">Stories</h2>

        <?php while ($modules->have_posts()) : $modules->the_post();

          get_template_part( 'template-parts/list-view/list', 'small' );

        endwhile; ?>

      <?php endif; ?>
    </main>
</div>

<?php
get_footer();