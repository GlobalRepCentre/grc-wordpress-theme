<?php
/**
 * Template part for displaying single event and vancouver institute event posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Global_Reporting_Centre
 */

?>

<?php // get custom fields
    $imageDisplayType = get_field('image_display');
    $imageShadow = get_field('image_shadow');
    $imageAlignment = get_field('image_alignment');

    // event-specific fields
    $startdate_time = get_field('event_start');
    $end_time = get_field('event_end_time');
    $enddate_time = get_field('event_end');
    $venue = get_field('event_venue');
    $map = get_field('event_map_link');
    $register = get_field('registration_ticket_link');

    // Get current post category
    $category = get_the_category();
    $first_category_name = $category[0]->name;

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <?php if ($imageDisplayType === 'full') : ?>

    <div class="fullscreen-container<?php if ($imageShadow) : echo ' shadow'; endif; ?>">
        <?php grc_featured_singular_image('full'); ?>
        <header class="entry-header site-width">
            <?php grc_event_category_output();
            the_title( '<h1 class="page-title">', '<i class="column shrink fas fa-arrow-down"></i></h1>' ); ?>
            <?php if ($startdate_time) : ?>
                <em><?php echo $startdate_time; ?> to <?php if ($enddate_time) : echo $enddate_time; else : echo $end_time; endif; ?></em>
            <?php endif; ?>
        </header><!-- .entry-header -->
    </div>

    <?php elseif ($imageDisplayType === 'wide') : ?>

        <?php grc_featured_singular_image('wide', $imageAlignment); ?>

    <?php endif; ?>

    <div class="entry-content">
        <div class="grid align-to-top">
            <div class="column two-third">
                <?php if ($imageDisplayType === 'square') : ?>
                    <header>
                        <?php grc_event_category_output();
                        the_title( '<h1 class="page-title">', '</h1>' ); ?>
                    </header>
                    <?php grc_featured_singular_image('medium'); ?>
                <?php else : ?>
                    <?php if ($imageDisplayType !== 'full') : ?>
                        <header>
                            <?php grc_event_category_output();
                            the_title( '<h1 class="page-title">', '</h1>' ); ?>
                        </header>
                    <?php endif; ?>
                <?php endif; ?>
                <div class="event-details">
                    <div class="grid">
                        <?php if ($imageDisplayType !== 'full') : ?>
                            <div class="column shrink">
                                <span class="event"><?php echo $startdate_time; ?> to <?php if ($enddate_time) : echo $enddate_time; else : echo $end_time; endif; ?></span>
                            </div>
                        <?php endif; ?>
                        <?php if ($register) : ?><div class="column shrink"><a class="button" href="<?php echo $register; ?>" title="Register/Get Tickets">Register/Get Tickets</a></div><?php endif; ?>
                    </div>
                    <?php if ($venue && $map) : ?>
                        <p><span><i class="fas fa-map-marker-alt"></i>Location: <a title="View on Map" href="<?php echo $map; ?>"><?php echo $venue; ?></a></span></p>
                    <?php elseif ($venue) : ?>
                        <p><span><i class="fas fa-map-marker-alt"></i>Location: <?php echo $venue; ?></span></p>
                    <?php endif; ?>
                </div>
                <div class="post-content">
                    <?php the_content(); ?>
                </div>
            </div><!-- /two-third -->
            <div class="column third">
                <?php // get more events post to populate sidebar

                //get today's date
                $today = current_time('mysql');

                    $currentID = get_the_ID();

                    $args = array(
                        'post_type' => 'post',
                        'posts_per_page' => 2,
                        'meta_query' => array(
                            array(
                                'key'		=> 'event_start',
                                'compare'	=> '>=',
                                'value'		=> $today,
                            )
                        ),
                        'orderby'   => 'meta_value',
                        'order' => 'ASC',
                        // get two upcoming events that are not the current post
                        'post__not_in' => array($currentID)
                    );

                    if ($first_category_name === 'Events') :
                        $args['category_name'] = 'events';

                    else :
                        $args['category_name'] = 'vancouver-institute-events';

                    endif;

                    $upcoming_events = new WP_Query($args);

                    if ( $upcoming_events->have_posts() ) : ?>
                        <div class="other-posts">
                            <h2>Upcoming <?php if ($first_category_name !== 'Events'): echo 'Vancouver Institute '; endif; ?>Events</h2>
                            <?php while ( $upcoming_events->have_posts() ) :
                                $upcoming_events->the_post();
                                ?>
                                <div class="other-post">
                                    <?php
                                    if ( has_post_thumbnail( $_post->ID ) ) :
                                        echo '<a href="' . get_permalink( $_post->ID ) . '" title="' . esc_attr( $_post->post_title ) . '">';
                                        echo get_the_post_thumbnail( $_post->ID, 'thumbnail' );
                                        echo '</a>';
                                    else :
                                        echo '<a href="' . get_permalink( $_post->ID ) . '" title="' . esc_attr( $_post->post_title ) . '">';
                                        echo '<div class="ph-box small"></div>';
                                        echo '</a>';
                                    endif; ?>
                                    <header>
                                        <a href="<?php the_permalink()?>"><p><?php the_title(); ?></p></a>
                                        <div class="entry-meta">
                                            <span class="event"><?php echo $startdate_time; ?> to <?php if ($enddate_time) : echo $enddate_time; else : echo $end_time; endif; ?></span>
                                        </div>
                                    </header>
                                </div>
                            <?php endwhile; ?>
                        </div>
                    <?php else : ?>
                        <div class="other-posts">
                            <h2>Stay up to date</h2>
                            <?php if ($first_category_name === 'Events'): ?>
                                <p>To get notified of upcoming events, subscribe to our <a href="https://us15.list-manage.com/subscribe/post?u=625d9e0d6500bffb3011fc2a0&id=29cfaf2756">quarterly newsletter</a> or follow us on <a href="https://twitter.com/GlobalRepCentre">Twitter</a>, <a href="https://www.facebook.com/globalreportingcentre/">Facebook</a>, or <a href="https://www.instagram.com/globalreportingcentre/">Instagram</a>.</p>
                            <?php else : ?>
                                <p>For the latest Vancouver Institute Events and updates, follow them <a href="https://www.facebook.com/TheVancouverInstitute">on Facebook</a>.</p>
                            <?php endif; ?>
                        </div>
                    <?php endif;
                wp_reset_postdata(); ?>
            </div><!-- /.third -->
        </div>
    </div>
</article>