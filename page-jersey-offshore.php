<?php
/**
 * The jersey offshore page template file
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Global_Reporting_Centre
 */

get_header();
?>

<div id="primary" class="content-area site-width">
    <h1 class="page-title"><?php the_title(); ?></h1>
    <span id="cat-description"><?php echo category_description(107); ?></span>
	<main id="main" class="site-main list-view">
    <?php

    $showDonationPanel = get_field('show_donation_panel');

    	// Query for project posts
		$args = array (
		    'post_type' => 'post',
            'category_name' => 'jersey-offshore',
            'posts_per_page' => 12,
        );

        // Get current page and append to custom query parameters array
        $args['paged'] = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;

    	// Query for ideas posts
        $jerseyoffshore = new WP_Query($args);

        // Pagination fix
        $temp_query = $wp_query;
        $wp_query = NULL;
        $wp_query = $jerseyoffshore;

        if ($jerseyoffshore->have_posts()) :

            while ($jerseyoffshore->have_posts()) : $jerseyoffshore->the_post();

                // Assign current post number to variable
                $current = $jerseyoffshore->current_post;

                // Use the current post number to determine the post's layout

                if ($current < 3) :

                    if ($current === 0 || $current === 3) :
                        get_template_part ( 'template-parts/list-view/list', 'hero' );

                    else :
                        get_template_part( 'template-parts/list-view/list', 'half' );

                    endif;

                elseif ($current === 3):
                    // Close the featured 1/2 width row
                    echo '</div>';
                    if ($showDonationPanel) : get_template_part( 'template-parts/list-view/list', 'donate-grc' ); endif;
                    get_template_part( 'template-parts/list-view/list', 'small' );

                else:
                    get_template_part( 'template-parts/list-view/list', 'small' );

                endif;

            endwhile; ?>

    </main>

        <?php else :

            echo '<p>Nothing here yet!</p></main></div>';

        endif;

        wp_reset_postdata();

        // Custom query loop pagination
        next_posts_link( '<i class="fas fa-arrow-left"></i> Previous Posts', $jerseyoffshore->max_num_pages );
        previous_posts_link('Newer Posts <i class="fas fa-arrow-right"></i>');

        // Reset main query object
        $wp_query = NULL;
        $wp_query = $temp_query; ?>

</div>

<?php
get_footer();