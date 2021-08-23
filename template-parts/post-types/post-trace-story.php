<?php
/**
 * The template for displaying trace stories
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Global_Reporting_Centre
 */

get_header();
?>

    <?php
      $storyLink = get_field('story_link');
      $logLine = get_field('logline');
    ?>

      <article id="post-<?php the_ID(); ?>">
        <header class="entry-header">
          <?php grc_featured_image($storyLink, 'medium'); ?>
          <div class="header-content">
            <span class="category-link"><a class="linked-category news" href="https://globalreportingcentre.org/tracing-the-story" title="Tracing the Story">Tracing the Story</a></span>
            <?php the_title( '<h1 class="page-title">', '</h1>' ); ?>
            <?php if ($logLine) : ?><?php echo '<p>' . $logLine . '</p>'; ?><?php endif; ?>
            <?php if ($storyLink) : ?><a class="button light" href="<?php echo $storyLink; ?>" title="View story">View original story</a><?php endif; ?>
          </div>
        </header>
        <div class="entry-content">
          <?php the_content(); ?>
          <div class="trace-links">
          <?php
            previous_post_link('<i class="fas fa-arrow-left"></i> %link', '%title', true);
            next_post_link('%link <i class="fas fa-arrow-right"></i>', '%title', true);
          ?>
          </div>
        </div>
      </article>

<?php

get_footer();
