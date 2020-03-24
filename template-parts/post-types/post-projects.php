<?php
/**
 * Template part for displaying single projects posts
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
    
    // project-specific fields
    $projectType = get_field('project_type');
    $projectDescription = get_field('project_description');
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <?php if ($imageDisplayType === 'full') : ?>
        <div class="fullscreen-container<?php if ($imageShadow) : echo ' shadow'; endif; ?>">
            <?php grc_featured_singular_image('full'); ?>
            <header class="entry-header site-width">
                <?php the_title( '<h1 class="page-title">', '<i class="column shrink fas fa-arrow-down"></i></h1>' ); ?>
                <?php if ($projectType) : ?><em><?php echo $projectType; ?></em><?php endif; ?>
            </header><!-- .entry-header -->
        </div>
    <?php elseif ($imageDisplayType === 'wide') : ?>
        <?php grc_featured_singular_image('wide', $imageAlignment); ?>
        <header class="entry-header site-width">
            <?php the_title( '<h1 class="page-title">', '</h1>' ); ?>
        </header><!-- .entry-header -->
    <?php else : ?>
        <header class="entry-header site-width">
            <?php the_title( '<h1 class="page-title">', '</h1>' ); ?>
            <?php grc_featured_singular_image('large'); ?>
        </header><!-- .entry-header -->
    <?php endif; ?>

        <div class="entry-content">
            <div class="grid align-to-top">
                <div class="column two-third">
                    <div class="project-description">
                        <?php if ($projectType && $imageDisplayType !== 'full') : echo '<p class="type-of-project">' . $projectType . '</p>'; endif;
                        // if there's a custom project description, use that
                        if ($projectDescription) : echo '<p>' . $projectDescription . '</p>';
                        // otherwise just use the excerpt
                        else : echo '<p>' . get_the_excerpt() . '</p>'; endif; ?>
                    </div>
                    <?php the_content(); ?>
                </div>
                <div class="column third">
                    <?php // get more projects
                        $currentID = get_the_ID();
                        $args = array(
                            'post_type' => 'post',
                            'category_name' => 'projects',
                            'posts_per_page' => 2,
                            'tag' => 'featured',
                            'order' => 'DESC',
                            'orderby' => 'date',
                            'post__not_in' => array($currentID)
                        );
                    
                    $more_projects = new WP_Query($args);
                    
                    if ( $more_projects->have_posts() ) : ?>
                        <div class="other-posts">
                            <h2>More Projects</h2>
                            <a class="button small" href="https://us15.list-manage.com/subscribe/post?u=625d9e0d6500bffb3011fc2a0&id=29cfaf2756">Get Updates</a>
                            <?php while ( $more_projects->have_posts() ) :
                                $more_projects->the_post(); 
                                $projectDescription = get_field('project_description');
                                ?>
                                <div class="grid align-to-top no-padding">
                                    <div class="column">
                                        <header>
                                            <a href="<?php the_permalink()?>"><?php if ($projectDescription) : echo $projectDescription; else: echo get_the_excerpt(); endif; ?></a>
                                        </header>
                                    </div>
                                    <div class="column shrink">
                                        <?php if ( has_post_thumbnail( $_post->ID ) ) :
                                            echo '<a href="' . get_permalink( $_post->ID ) . '" title="' . esc_attr( $_post->post_title ) . '">';
                                            echo get_the_post_thumbnail( $_post->ID, 'thumbnail' );
                                            echo '</a>';
                                        else :
                                            echo '<a href="' . get_permalink( $_post->ID ) . '" title="' . esc_attr( $_post->post_title ) . '">';
                                            echo '<div class="ph-box small"></div>';
                                            echo '</a>';
                                        endif; ?>
                                    </div>                            	
                                </div>				
                            <?php endwhile; ?>
                        </div>
                    <?php endif;
                    wp_reset_postdata(); ?>
                </div>
            </div>
        </div><!-- .entry-content -->

</article>