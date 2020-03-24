<?php
/**
 * The news page template file
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Global_Reporting_Centre
 */

get_header();
?>

<div id="primary" class="content-area site-width">
    <h1 class="page-title"><?php the_title(); ?></h1>
    <main id="main" class="site-main list-view">
    <?php

        // Query parameters
        $args = array(
            'post_type' => 'post',
            'category_name' => 'news',
            'posts_per_page' => 13,
        );

        // Get current page and append to custom query parameters array
        $args['paged'] = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;
        
    	// Query for news posts
        $news = new WP_Query($args);
        
        // Pagination fix
        $temp_query = $wp_query;
        $wp_query = NULL;
        $wp_query = $news;

        if ($news->have_posts()) :
           
            while ($news->have_posts()) : $news->the_post(); 

                // Assign current post number to variable
                $current = $news->current_post; 

                if ($current < 3) :

                    // Use the current post number to determine the post's layout
                    if ($current === 0) :
                        get_template_part( 'template-parts/list-view/list', 'hero' );
                
                    else :
                        get_template_part( 'template-parts/list-view/list', 'half' );

                    endif; 
                
                elseif ($current === 3) :
                    // Close the featured 1/2 width row
                    echo '</div>';
                    get_template_part( 'template-parts/list-view/list', 'small' );
                
                else :
                    // For all other upcoming events
                    get_template_part( 'template-parts/list-view/list', 'small' );

                endif;
      
            endwhile; ?>

    </main>      

        <?php else :
            
            echo '<p>Nothing here yet!</p></main></div>';

        endif;
        
        wp_reset_postdata();

        // Custom query loop pagination
        next_posts_link( '<i class="fas fa-arrow-left"></i> Older Posts', $news->max_num_pages );
        previous_posts_link('Newer Posts <i class="fas fa-arrow-right"></i>');

        // Reset main query object
        $wp_query = NULL;
        $wp_query = $temp_query; ?>

</div>

<?php
get_footer();