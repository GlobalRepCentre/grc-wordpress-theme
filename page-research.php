<?php
/**
 * The research page template file
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Global_Reporting_Centre
 */

get_header();
?>

<div id="primary" class="content-area site-width">
  <h1 class="page-title"><?php the_title(); ?></h1>
  <main id="main" class="site-main list-view research">
    <section>
      <?php the_content(); ?>
    </section>
    <?php if( have_rows('research_articles') ):
      while( have_rows('research_articles') ) : the_row();
      $title = get_sub_field('title');
      $authors = get_sub_field('authors');
      $description = get_sub_field('description');
      $link = get_sub_field('link_to_article');
      $relatedProject = get_sub_field('related');
      $relatedProjectLink = get_sub_field('related_link');
      $image = get_sub_field('image');
      $imageSize = 'thumbnail'; ?>

        <article class="column one small">
          <div class="grid">
            <div class="column shrink">
              <a title="<?php echo $title; ?>" href="<?php echo $link; ?>">
                <?php echo wp_get_attachment_image($image, $imageSize); ?>
              </a>
            </div>
            <div class="column">
              <header>
                <a title="<?php echo $title; ?>" class="block" href="<?php echo $link; ?>">
                  <?php echo '<h1>' . $title . '</h1>'; ?>
                </a>
                <div class="entry-meta">
                  <p><?php echo $authors; ?></p>
                </div>
              </header>
              <div class="description">
                <?php echo $description; ?>
              </div>
              <?php if ($relatedProject) : ?>
              <div class="related">
                <?php if ($relatedProjectLink) : ?>
                  <?php echo '<span>Related project: <a title="View related project" href="' . $relatedProjectLink . '">' . $relatedProject . '</a></span>'; ?>
                <?php else : ?>
                  <span>Related project: <?php echo $relatedProject; ?></span>
                <?php endif; ?>
              </div>
              <?php endif; ?>
            </div>
          </div>
        </article>
      <?php endwhile; ?>
    <?php endif; ?>
  </main>
</div>

<?php
get_footer();