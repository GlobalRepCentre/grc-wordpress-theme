<?php
/**
 * Template part for displaying a hero article in list views
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Global_Reporting_Centre
 */

?>

<?php // get custom fields
    $externalLink = get_field('external_link');
?>

<article id="post-<?php the_ID(); ?>" class="hero">
    <div class="grid">
        <div class="column two-third">
            <?php if ($externalLink): grc_featured_image($externalLink, 'large'); else: grc_featured_image(false, 'large'); endif; ?>
        </div>
        <header class="entry-header column">
            <a title="<?php the_title(); ?>" href="<?php if ($externalLink): echo $externalLink; else: echo esc_url(get_permalink()); endif; ?>" rel="bookmark">
                <?php the_title('<h1 class="entry-title"><span>', '</span></h1>'); ?>
                <h2><?php echo get_the_excerpt(); ?></h2>
            </a>
            <?php if (!(in_category('features'))) : ?>
            <div class="entry-meta">
              <?php
              if (in_category('news')) : grc_posted_on(); endif;
              if (in_category('events')) : grc_event_start_date_time(); endif;
              if (in_category(array('ideas', 'news'))) : grc_posted_by(); endif;
              ?>
            </div><!-- .entry-meta -->
            <?php endif; ?>
            <?php if (is_front_page() || is_category('jersey-offshore')) :
                // Output the category if we're on the home page
                $category = get_the_category();
                $first_category_name = $category[0]->name;
                $first_category_slug = $category[0]->slug; ?>

                <?php if( have_rows('feature_media_partner') ): ?>
                <div class="partner-logo">
                    <span>In partnership with</span>
                    <?php while ( have_rows('feature_media_partner') ) : the_row();
                        $image = get_sub_field('partner_logo');
                        if( !empty( $image ) ): ?>
                            <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                        <?php endif;
                    endwhile; ?>
                </div>
                <?php endif;?>

                <div class="featured-buttons">
                    <?php if (in_category('podcast-promo')) : ?>
                    <a class="button primary" title="<?php the_title(); ?>" href="<?php if ($externalLink): echo $externalLink; else: echo esc_url(get_permalink()); endif; ?>" rel="bookmark">View Episode</a>
                    <a class="button" href="https://globalreportingcentre.org/on-chinas-new-silk-road-podcast">View Series</a>
                    <?php elseif (is_category('jersey-offshore')) : ?>
                    <a class="button primary" title="<?php the_title(); ?>" href="<?php if ($externalLink): echo $externalLink; else: echo esc_url(get_permalink()); endif; ?>" rel="bookmark">Read More</a>
                    <?php else : ?>
                    <a class="button primary" title="<?php the_title(); ?>" href="<?php if ($externalLink): echo $externalLink; else: echo esc_url(get_permalink()); endif; ?>" rel="bookmark"><?php if ($first_category_name === 'Features'): echo 'View Project'; else: echo 'Read More'; endif;?></a>
                    <a class="button" href="<?php echo esc_url( home_url( '/' ) . $first_category_slug ); ?>" title="All <?php echo $first_category_name; ?>"><?php if ($first_category_slug === 'medical-supply-chains' || $first_category_slug === 'jersey-offshore') : echo 'View Series'; else: echo 'All ' . $first_category_name; endif; ?></a>
                    <?php endif; ?>
                </div>

                <?php $post_tags = get_the_tags();

                if ( $post_tags && in_category('jersey-offshore') ) { ?>
                  <div class="language-tags"><span>Available in</span><?php foreach( $post_tags as $tag ) {
                      echo '<span class="language">' . $tag->name . '</span>';} ?>
                  </div>
                <?php } ?>

            <?php endif; ?>
        </header>
    </div>
</article>

<div class="grid align-to-top"> <!-- open the grid for the 1/2 width posts -->