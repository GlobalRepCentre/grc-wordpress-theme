<?php
/**
 * The new silk road page template file
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Global_Reporting_Centre
 */

get_header();

  // Custom fields
  $appleLink = get_field('apple_podcast_link');
  $googleLink = get_field('google_podcast_link');
  $spotifyLink = get_field('spotify_link');
  $stitcherLink = get_field('stitcher_link');
  $deezerLink = get_field('deezer_link');
  $radioPubLink = get_field('radiopub_link');
  $castBoxLink = get_field('castbox_link');
  $overCastLink = get_field('overcast_link');
  $iheartLink = get_field('iheart_link');

?>

<article id="new-silk-road" class="podcast">
  <div class="fullscreen-container<?php if ($imageShadow) : echo ' shadow'; endif; ?>">
    <?php grc_featured_singular_image('full'); ?>
    <header class="entry-header site-width">
      <span class="label">GRC Podcasts</span>
      <h1 class="page-title">On China's<span>New Silk Road</span></h1>
      <div class="podcast-buttons">
        <a href="<?php echo $appleLink; ?>" title="Listen on Apple Podcasts"><img src="https://globalreportingcentre.org/wp-content/uploads/2020/08/listen-on-apple-podcasts.png" width="200" width="49" /></a><a href="<?php echo $spotifyLink; ?>" title="Listen on Spotify"><img src="https://globalreportingcentre.org/wp-content/uploads/2020/08/listen-on-spotify.png" width="200" width="49" /></a><a href="<?php echo $googleLink; ?>" title="Listen on Google Podcasts"><img src="https://globalreportingcentre.org/wp-content/uploads/2020/08/listen-on-google-podcasts.png" width="200" width="49" /></a>
      </div>
    </header><!-- .entry-header -->
  </div>
  <div id="primary" class="content-area site-width">
  	<main id="main" class="site-main list-view">
      <section id="overview" class="grid align-to-top">
        <div class="column two-third" id="content-area">
          <?php the_content(); ?>
        </div>
        <div class="column" id="listen">
          <h2>Listen on</h2>
          <p><a title="Listen on Apple Podcasts" href="<?php echo $appleLink; ?>">Apple Podcasts</a> | <a title="Listen on Spotify" href="<?php echo $spotifyLink; ?>">Spotify</a> | <a title="Listen on Google Podcasts" href="<?php echo $googleLink; ?>">Google Podcasts</a> | <a title="Listen on Stitcher" href="<?php echo $stitcherLink; ?>">Stitcher</a> | <a title="Listen on Castbox" href="<?php echo $castBoxLink; ?>">Castbox</a> | <a title="Listen on Overcast" href="<?php echo $overCastLink; ?>">Overcast</a> | <a title="Listen on Deezer" href="<?php echo $deezerLink; ?>">Deezer</a> | <a title="Listen on RadioPublic" href="<?php echo $radioPubLink; ?>">RadioPublic</a> | <a title="Listen on iHeartRadio" href="<?php echo $iheartLink; ?>">iHeartRadio</a></p>
          <h2>Show credits</h2>
          <p>For a list of reporters and contributors to this project, please <a href="https://globalreportingcentre.org/on-chinas-new-silk-road-podcast/credits/" title="On China's New Silk Road Show Credits">visit this page</a>.</p>
        </div>
      </section>
      <?php
      $credits = url_to_postid('/credits');
      // Query for project posts
      $args = array (
        'post_type' => 'podcast',
        'posts_per_page' => -1,
        'post__not_in' => array(5636)
      );
      $episodes = new WP_Query($args);

      if ($episodes->have_posts()) : ?>
      <section id="episodes">
        <h2 class="extra-margin">Episodes</h2>
        <?php while ($episodes->have_posts()) : $episodes->the_post(); ?>
          <?php get_template_part ( 'template-parts/list-view/list', 'podcast-episode' ); ?>
        <?php endwhile; ?>
      </section>
      <?php endif; ?>

      <?php wp_reset_postdata(); ?>
    </main>
  </div>
</article>

<?php
get_footer();