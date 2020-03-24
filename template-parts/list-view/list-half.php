<?php
/**
 * Template part for displaying a half-width article in list views
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Global_Reporting_Centre
 */

?>

<?php // get custom fields
    $externalLink = get_field('external_link');
?>

<article id="post-<?php the_ID(); ?>" class="column half">
    <?php if ($externalLink) : grc_featured_image($externalLink, 'thumbnail'); else: grc_featured_image(false, 'thumbnail'); endif; ?>
    <header class="entry-header">
        <a title="<?php the_title(); ?>" href="<?php if ($externalLink): echo $externalLink; else: echo esc_url(get_permalink()); endif; ?>" rel="bookmark">
            <?php the_title('<h1 class="entry-title"><span>', '</span></h1>'); ?>
            <h2><?php echo get_the_excerpt(); ?></h2>
        </a>
        <?php if (is_front_page()) :
            // Output the category if we're on the home page
            $category = get_the_category();
            $first_category_name = $category[0]->name; 
            $first_category_slug = $category[0]->slug; ?>

            <div class="feature-logo-buttons">
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
                <?php elseif (!(in_category('projects'))) : ?>
                <div class="entry-meta">
                    <?php
                        if (in_category('news')) : grc_posted_on(); endif;
                        if (in_category('events')) : grc_event_start_date_time(); endif;
                        if (in_category(array('ideas', 'news'))) : grc_posted_by(); endif;
                    ?>
                </div><!-- .entry-meta -->
                <?php endif;?>
                <div class="featured-buttons">
                    <a class="button primary" title="<?php the_title(); ?>" href="<?php if ($externalLink): echo $externalLink; else: echo esc_url(get_permalink()); endif; ?>" rel="bookmark"><?php if ($first_category_name === 'Projects'): echo 'View Project'; else: echo 'Read More'; endif;?></a>
                    <a class="button" href="<?php echo esc_url( home_url( '/' ) . $first_category_slug ); ?>" title="All <?php echo $first_category_name; ?>"><?php echo 'All ' . $first_category_name; ?></a>
                </div>
            </div>
        <?php endif; ?>
    </header>
</article>