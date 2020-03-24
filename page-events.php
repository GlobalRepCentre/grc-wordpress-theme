<?php
/**
 * The events page template file
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Global_Reporting_Centre
 */

get_header();
?>

<div id="primary" class="content-area site-width">
    <main id="main" class="site-main list-view">
    <h1 class="page-title"><?php the_title(); ?></h1>
        <?php 
		//get today's date
		$today = current_time('mysql');

		//query for upcoming events
		$upcoming = new WP_Query(array (
			'post_type' => 'post',
            'category_name' => 'events',
            'meta_query' => array(
				array(
				    'key'		=> 'event_start',
				    'compare'	=> '>=',
				    'value'		=> $today,
				)
			),
			'orderby'   => 'meta_value',
			'order' => 'ASC',
		));

        if ($upcoming->have_posts()) : ?>

            <div class="grid align-to-top">

                <h2 class="section">Upcoming Events</h2>
            
                <?php while ($upcoming->have_posts()) : $upcoming->the_post(); 

                        get_template_part( 'template-parts/list-view/list', 'small' );
        
                endwhile; ?>

            </div>

        <?php endif; ?>

    </main>      

    <?php wp_reset_postdata();
    
    //query for archived events
	$past = new WP_Query(array (
		'post_type' => 'post',
		'category_name' => 'events',
		'meta_query' => array(
			array(
				 'key'		=> 'event_start',
				'compare'	=> '<',
				'value'		=> $today,
			)
		),
		'orderby'   => 'meta_value',
		'order' => 'DESC',
	));

    if($past->have_posts()) : ?>

        <aside id="past-events" class="list-view">

            <h2 class="section">Past Events</h2>
                                
            <?php while($past->have_posts()): $past->the_post();
                    
                 get_template_part( 'template-parts/list-view/list', 'small' );
                        
            endwhile; ?>

        </aside>
                
    <?php endif;
        
    wp_reset_postdata(); ?>

</div>

<?php
get_footer();