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

	<div id="primary" class="content-area<?php if (has_category('tracing-the-story')): echo ' module'; endif; ?>">
		<main id="main" class="site-main">

    <?php

      $showDonationPanel = get_field('show_donation_panel');
      $postType = '';

        while ( have_posts() ) :

            the_post();

            if (has_category('medical-supply-chains')) :
                $postType = 'msc';
                get_template_part( 'template-parts/post-types/post', 'medical-supply-chains' );

            elseif (has_category('jersey-offshore')) :
              $postType = 'jo';
              get_template_part( 'template-parts/post-types/post', 'jersey-offshore' );

            elseif (has_category('ideas')) :
                $postType = 'ideas';
                get_template_part( 'template-parts/post-types/post', 'ideas' );

            elseif (has_category('tracing-the-story')) :
              get_template_part( 'template-parts/post-types/post', 'trace-story' );

            elseif (has_category('events') || has_category('vancouver-institute-events')) :
                get_template_part( 'template-parts/post-types/post', 'events' );

            elseif (has_category('features')) :
                get_template_part( 'template-parts/post-types/post', 'projects' );

            elseif (has_category('news')) :
                get_template_part( 'template-parts/post-types/post', 'news' );

            elseif ('people' === get_post_type()) :
                get_template_part( 'template-parts/post-types/post', 'people-bio' );

            elseif ('podcast' === get_post_type()) :
              get_template_part( 'template-parts/post-types/post', 'podcast' );

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
		endwhile; // End of the loop.
        ?>

		</main><!-- #main -->
	</div><!-- #primary -->

  <?php if ($showDonationPanel && ($postType === 'msc' || $postType === 'jo' || $postType === 'ideas')) : get_template_part( 'template-parts/list-view/list', 'donate-grc' ); endif; ?>

<?php

get_footer();
