<?php
/**
 * Template part for displaying single podcast episode posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Global_Reporting_Centre
 */

  // Custom fields
  $epNumber = get_field('episode_number');
  $appleLink = (get_field('apple_podcast_link') ? get_field('episode_number') : 'https://podcasts.apple.com/ca/podcast/on-chinas-new-silk-road/id1528239383');
  $googleLink = (get_field('google_podcast_link') ? get_field('episode_number') : 'https://www.google.com/podcasts?feed=aHR0cHM6Ly9nbG9iYWxyZXBvcnRpbmdjZW50cmUubGlic3luLmNvbS9yc3M%3D');
  $spotifyLink = (get_field('spotify_link') ? get_field('episode_number') : 'https://open.spotify.com/show/3Q0zqudQ5Tqa5mbIeWx6rX');
  $stitcherLink = (get_field('stitcher_link') ? get_field('episode_number') : 'https://www.stitcher.com/podcast/on-chinas-new-silk-road');
  $deezerLink = (get_field('deezer_link') ? get_field('episode_number') : 'https://www.deezer.com/us/show/1646942');
  $radioPubLink = (get_field('radiopub_link') ? get_field('episode_number') : 'https://radiopublic.com/on-chinas-new-silk-road-8jRqrD');
  // If it's the credits page
  $creditsPage = (is_single(5636) ? true : false);
?>

<article class="podcast">
  <header class="podcast-ep-header">
    <div id="episode-overview" class="site-width">
      <div>
        <span class="label"><a href="https://globalreportingcentre.org/on-chinas-new-silk-road-podcast/">On China's New Silk Road</a></span>
        <h1 class="podcast-title"><?php if ($epNumber) : ?><span class="episode-number">ep<?php echo $epNumber; ?></span><?php endif; ?><?php the_title(); ?></h1>
      </div>
      <div class="podcast-buttons">
        <a href="<?php echo $appleLink; ?>" title="Listen on Apple Podcasts"><img src="https://globalreportingcentre.org/wp-content/uploads/2020/08/listen-on-apple-podcasts.png" width="200" width="49" /></a>
        <a href="<?php echo $spotifyLink; ?>" title="Listen on Spotify"><img src="https://globalreportingcentre.org/wp-content/uploads/2020/08/listen-on-spotify.png" width="200" width="49" /></a>
        <a href="<?php echo $googleLink; ?>" title="Listen on Google Podcasts"><img src="https://globalreportingcentre.org/wp-content/uploads/2020/08/listen-on-google-podcasts.png" width="200" width="49" /></a>
      </div>
      <?php if (!$creditsPage) : grc_podcast_image(); endif; ?>
    </div>
  </header>
  <div class="content-area site-width">
    <section id="overview" class="grid align-to-top">
      <div class="column two-third" id="content-area">
        <?php if (!$creditsPage) : ?><div class="entry-meta"><?php grc_podcast_date(); ?></div><?php endif; ?>
        <?php if (!$creditsPage) : ?><h2><?php the_title(); ?></h2><?php endif; ?>
        <p><span class="label">Listen<?php if ($creditsPage) : echo ' to the show '; endif;?> on</span><a title="Subscribe on Apple Podcasts" href="<?php echo $appleLink; ?>">Apple Podcasts</a> | <a title="Subscribe on Spotify" href="<?php echo $spotifyLink; ?>">Spotify</a> | <a title="Subscribe on Google Podcasts" href="<?php echo $googleLink; ?>">Google Podcasts</a> | <a title="Subscribe on Stitcher" href="<?php echo $stitcherLink; ?>">Stitcher</a> | <a title="Subscribe on Deezer" href="<?php echo $deezerLink; ?>">Deezer</a> | <a title="Subscribe on RadioPublic" href="<?php echo $radioPubLink; ?>">RadioPublic</a></p>
      </div>
    </section>
    <section id="transcript">
      <?php the_content(); ?>
    </section>
  </div>
</article>