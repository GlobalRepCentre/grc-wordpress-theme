<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Global_Reporting_Centre
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

    <?php

      $showDonationPanel = get_field('show_donation_panel');
    
        while ( have_posts() ) :
            
            the_post();

            if (has_category('medical-supply-chains')) :
                get_template_part( 'template-parts/post-types/post', 'medical-supply-chains' );

            elseif (has_category('ideas')) :
                get_template_part( 'template-parts/post-types/post', 'ideas' );
            
            elseif (has_category('events') || has_category('vancouver-institute-events')) :
                get_template_part( 'template-parts/post-types/post', 'events' );

            elseif (has_category('projects')) :
                get_template_part( 'template-parts/post-types/post', 'projects' );

            elseif (has_category('news')) :
                get_template_part( 'template-parts/post-types/post', 'news' );
                
            elseif ('people' === get_post_type()) :
                get_template_part( 'template-parts/post-types/post', 'people-bio' );
            
            else :
                get_template_part('template-parts/content');

            endif;

            if (has_category('ideas')) :
                the_post_navigation( array(
                    'prev_text'                  => __( '<i class="fas fa-arrow-left"></i>' . '  ' . '%title' ),
                    'next_text'                  => __( '%title' . '  ' . '<i class="fas fa-arrow-right"></i>' ),
                    'in_same_term'               => true,
                    'taxonomy'                   => __( 'category' ),
                    'screen_reader_text' => __( 'Continue Reading' ),
                ) );
            endif;

            if ($showDonationPanel) : get_template_part( 'template-parts/list-view/list', 'donate-grc' ); endif;

		endwhile; // End of the loop.
        ?>
        
		</main><!-- #main -->
	</div><!-- #primary -->

<?php

get_footer();
