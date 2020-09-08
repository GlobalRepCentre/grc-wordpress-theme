<?php
/**
 * Template part for displaying a podcast episode in a list view
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Global_Reporting_Centre
 */

?>

<?php // get custom fields
  $epNumber = get_field('episode_number');
?>

<article class="column one small">
  <header>
  <div class="grid">
    <div class="column shrink">
      <?php grc_featured_image(false, 'thumbnail'); ?>
    </div>
    <div class="column">
      <header>
        <a title="<?php the_title(); ?>" class="podcast" href="<?php the_permalink(); ?>"><span class="episode-number"><?php echo $epNumber; ?></span><?php the_title('<h1 class="title"><span>', '</span></h1>'); ?></a>
        <div class="entry-meta"><?php grc_podcast_date(); ?></div>
      </header>
      <div class="description">
        <?php echo '<p>' . get_the_excerpt() . '</p>'; ?>
      </div>
    </div>
  </div>
</article>
