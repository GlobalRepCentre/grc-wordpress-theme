<?php
/**
 * Template part for displaying single news posts
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

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <?php if ($imageDisplayType === 'full') : ?>

        <div class="fullscreen-container<?php if ($imageShadow) : echo ' shadow'; endif; ?>">
            <?php grc_featured_singular_image('full'); ?>
            <header class="entry-header site-width">
                <?php grc_linked_category_output(); ?>
                <?php the_title( '<h1 class="page-title">', '<i class="column shrink fas fa-arrow-down"></i></h1>' ); ?>
                <?php grc_posted_on(); ?>
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
                            <?php grc_linked_category_output(); ?>
                            <?php the_title( '<h1 class="page-title">', '</h1>' ); ?>
                            <?php 
                                echo '<p class="post-description">' . get_the_excerpt() . '</p>'; ?>
                                <div class="post-meta">
                                    <?php if ($imageDisplayType !== 'full') : grc_posted_on(); endif; ?>
                                </div>
                        </header>
                        <?php grc_featured_singular_image('medium'); ?>
                    <?php else : ?>
                        <?php if ($imageDisplayType !== 'full') : ?>
                            <header>
                                <?php grc_linked_category_output(); 
                                the_title( '<h1 class="page-title">', '</h1>' ); ?>
                            </header>
                        <?php endif; ?> 
                        <div class="post-meta">
                            <?php echo '<p class="post-description">' . get_the_excerpt() . '</p>'; ?>
                            <?php if ($imageDisplayType !== 'full') : grc_posted_on(); endif; ?>
                        </div>
                    <?php endif; ?>
                    <div class="post-content">
                        <?php the_content(); ?>
                    </div>
                </div>
                <div class="column third">
                    <?php // get more news posts for sidebar
                        $currentID = get_the_ID();
                        $args = array(
                            'post_type' => 'post',
                            'category_name' => 'news',
                            'posts_per_page' => 2,
                            'order' => 'DESC',
                            'orderby' => 'date',
                            // get the two most recent stories that are not the current post
                            'post__not_in' => array($currentID)
                        );
                    
                    $other_news = new WP_Query($args);
                    
                    if ( $other_news->have_posts() ) : ?>
                        <div class="other-posts">
                            <h2>Other Recent News</h2>
                            <?php while ( $other_news->have_posts() ) :
                                $other_news->the_post(); 
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
                                        <a href="<?php the_permalink()?>"><?php the_excerpt(); ?></a>
                                        <div class="entry-meta">
                                            <?php grc_posted_on(); ?>
                                        </div>
                                    </header>
                                </div>
                            <?php endwhile; ?>
                        </div>
                    <?php endif;
                    wp_reset_postdata(); ?>
                </div><!-- ..third -->
        </div><!-- .entry-content -->
</article>