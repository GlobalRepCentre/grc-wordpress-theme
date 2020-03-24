<?php
/**
 * The projects page template file
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Global_Reporting_Centre
 */

get_header();
?>

<div id="primary" class="content-area site-width">
    <h1 class="page-title"><?php the_title(); ?></h1>
	<main id="main" class="site-main">
        <?php

        // Query parameters
        $args = array(
            'post_type' => 'post',
            'category_name' => 'features',
            'posts_per_page' => -1,
            'meta_query' => [
                'relation' => 'OR',
                ['key' => 'featured_feature', 'compare' => 'NOT EXISTS'],
                ['key' => 'featured_feature', 'compare' => 'EXISTS'],
            ],
            'orderby' => array(
                'meta_value_num' => 'DESC',
                'menu_order' => 'ASC',
            ),
        );
        
    	// Query for project posts
        $features = new WP_Query($args);

        if ($features->have_posts()) : ?>

            <div class="grid align-to-top projects-view">
           
            <?php while ($features->have_posts()) : $features->the_post(); 

                // Get size setting from ACF
                $size = get_field('project_format');

                if ($size) : // If the size is set
                    if ($size === 'small') :
                        get_template_part( 'template-parts/list-view/list', 'project-half' );
                    elseif ($size === 'large') :
                        get_template_part( 'template-parts/list-view/list', 'project-hero' );
                    else : // the default size
                        get_template_part( 'template-parts/list-view/list', 'project-full' );
                    endif;

                else :
                    // Fallback in case get_field fails
                    get_template_part( 'template-parts/list-view/list', 'project-half' );      
                
                endif;
      
            endwhile; ?>

            </div><!-- end main project grid -->

    </main>      

        <?php else :
            
            echo '<p>No projects yet!</p></main></div>';

        endif;

        wp_reset_postdata(); ?>

</div>

<?php
get_footer();