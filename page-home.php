<?php
/**
 * The home page template file
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Global_Reporting_Centre
 */

get_header();
?>

<div class="list-view">

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

        <?php // Query parameters for featured posts
        $featuredArgs = array(
            'post_type' => 'post',
            // Include posts categorized as projects, ideas, or medical supply chains
            'category__in' => array(1, 16, 104),
            // Exclude 'exclude from home' and 'Vancouver Institute' categories
            'category__not_in' => array(18, 17),
            'posts_per_page' => 3,
        );

        // Query for featured posts
        $featured = new WP_Query($featuredArgs);

        if ($featured->have_posts()) :

             while ($featured->have_posts()) : $featured->the_post(); 
                // If it's the first post, put it in a hero template (Hero template contains the start of the featured 1/2 width row)
                if ($featured->current_post === 0): 
                    //get_template_part( 'template-parts/list-view/list', 'about-grc' );
                    get_template_part( 'template-parts/list-view/list', 'hero' );
                // Get 1/2 width template for posts #2 and #3
                else: get_template_part( 'template-parts/list-view/list', 'half' );
                endif;
            endwhile;

        endif;

        wp_reset_postdata();

            // Close the featured 1/2 width row and primary content div ?>
            </div>
        </main>
    </div><!-- close primary to enable full-width background for slider -->

    <?php // Query parameters for slider posts
        $sliderArgs = array(
            'post_type' => 'post',
            // Include posts categorized as news or events
            'category__in' => array(48, 13),
            // Exclude 'exclude from home' and 'Vancouver Institute' categories
            'category__not_in' => array(18, 17),
            'posts_per_page' => 9
        ); 

        // Query for featured posts
        $sliders = new WP_Query($sliderArgs);

        if ($sliders->have_posts()) : ?>

            <div class="site-width" id="grc-news-events">
                <hr>
                <h3>GRC News and Events</h3>
            </div>
    
            <div id="slider-container"><!-- start slider container -->
                <div id="slider-loader">
                    <img src="<?php bloginfo('template_url'); ?>/carousel/ajax-loader.gif" alt="Loader" />	
                </div>
                <div id="featured-slider" class="owl-carousel owl-theme site-width"><!-- start slider -->
                    <?php while ($sliders->have_posts()) : $sliders->the_post(); 
                        get_template_part( 'template-parts/slider/homepage', 'slide' );
                    endwhile; ?>
                </div><!-- close slider -->
            </div><!-- close slider container -->

        <?php endif; 

        wp_reset_postdata(); ?>

</div><!-- end list-view -->

<?php
get_footer();