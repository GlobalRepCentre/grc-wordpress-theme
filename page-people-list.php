<?php
/**
 * The people page template file
 * Template Name: People Page
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Global_Reporting_Centre
 */

get_header(); ?>

<?php 
// Get page slug to use as meta_query value
// That way we get the correct type of person
$slug = get_post_field( 'post_name', get_post() ); 

?>

<div id="primary" class="content-area site-width">
    <h1 class="page-title"><?php the_title(); ?></h1>
	<main id="main" class="site-main">
        <?php the_content(); ?>
        <div class="people-buttons">
            <button class="active" name="staff">Staff</button>
            <button name="collaborators">Collaborators</button>
            <button name="advisory-board">Advisory Board</button>
            <button name="journalism-advisors">Journalism Advisors</button>
        </div>
        <section class="active people-list" id="staff">
            <h2 class="section margin-top">Staff</h2>
            <?php $args = array(
                'post_type' => 'people',
                'posts_per_page' => -1,
                'meta_query' => array(
                    array(
                        'key' => 'type_of_person',
                        'value' => 'staff'
                    )
                )
            );

            $staff = new WP_Query($args);

            while ( $staff->have_posts() ) : $staff->the_post();

                get_template_part( 'template-parts/post-types/post', 'people' );

            endwhile;

            wp_reset_postdata();

            $args = array(
                'post_type' => 'people',
                'posts_per_page' => -1,
                'meta_query' => array(
                    array(
                        'key' => 'type_of_person',
                        'value' => 'assistants'
                    )
                )
            );

            $assistants = new WP_Query($args);

            echo '<h2 class="section top-margin-two">Production and Research Assistants</h2>';

            while ( $assistants->have_posts() ) : $assistants->the_post();

                get_template_part( 'template-parts/post-types/post', 'people' );

            endwhile;

            wp_reset_postdata(); ?>
        </section>
        <section class="people-list" id="collaborators">
            <h2 class="section margin-top">Collaborators</h2>
            <p>Meet our collaborators and see what GRC projects they’re working on.</p>
            <?php $args = array(
                'post_type' => 'people',
                'posts_per_page' => -1,
                'meta_query' => array(
                    array(
                        'key' => 'type_of_person',
                        'value' => 'collaborators'
                    )
                )
            );
        
            $collaborators = new WP_Query($args);
        
            while ( $collaborators->have_posts() ) : $collaborators->the_post();
            
                get_template_part( 'template-parts/post-types/post', 'people' );
        
            endwhile;

            wp_reset_postdata(); ?>
        </section>
        <section class="people-list" id="advisory-board">
            <h2 class="section margin-top">Advisory Board</h2>
            <?php $args = array(
                'post_type' => 'people',
                'posts_per_page' => -1,
                'meta_query' => array(
                    array(
                        'key' => 'type_of_person',
                        'value' => 'advisory-board'
                    )
                )
            );
        
            $staff = new WP_Query($args);
        
            while ( $staff->have_posts() ) : $staff->the_post();
            
                get_template_part( 'template-parts/post-types/post', 'people' );
        
            endwhile;

            wp_reset_postdata(); ?>
        </section>
        <section class="people-list" id="journalism-advisors">
            <h2 class="section margin-top">Journalism Advisors</h2>
            <p>Our Journalism Advisors are drawn from leaders in the global journalism community who provide advice and guidance on the growth of the Global Reporting Centre.</p>
            <?php $args = array(
                'post_type' => 'people',
                'posts_per_page' => -1,
                'meta_query' => array(
                    array(
                        'key' => 'type_of_person',
                        'value' => 'journalism-advisors'
                    )
                )
            );
        
            $collaborators = new WP_Query($args);
        
            while ( $collaborators->have_posts() ) : $collaborators->the_post();
            
                get_template_part( 'template-parts/post-types/post', 'people' );
        
            endwhile;

            wp_reset_postdata(); ?>
        </section>

    </main>      

</div>

<?php
get_footer();