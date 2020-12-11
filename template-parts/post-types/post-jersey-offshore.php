<?php
/**
 * Template part for displaying single jersey offshore posts
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
    $authors = get_field('post_author');
    $authors_bio = get_field('authors_bio');
    $storyDescription = get_field('ideas_description');
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <?php if ($imageDisplayType === 'full') : ?>

        <div class="fullscreen-container<?php if ($imageShadow) : echo ' shadow'; endif; ?>">
            <?php grc_featured_singular_image('full'); ?>
            <header class="entry-header site-width">
                <?php grc_linked_category_output(); ?>
                <?php the_title( '<h1 class="page-title">', '<i class="column shrink fas fa-arrow-down"></i></h1>' ); ?>
                <?php if ($authors) : grc_posted_by($authors); endif; ?>
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
                                // if there's a custom description, use that
                                if ($storyDescription) : echo '<p class="post-description">' . $storyDescription . '</p>';
                                // otherwise just use the excerpt
                                else : echo '<p class="post-description">' . get_the_excerpt() . '</p>'; endif; ?>
                                <div class="post-meta">
                                    <?php if (($imageDisplayType !== 'full') && ($authors)) : grc_posted_by($authors); grc_posted_on(); endif; ?>
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
                            <?php if ($storyDescription) : echo '<p class="post-description">' . $storyDescription . '</p>';
                            else : echo '<p class="post-description">' . get_the_excerpt() . '</p>'; endif; ?>
                            <?php if (($imageDisplayType !== 'full') && ($authors)) : grc_posted_by($authors); grc_posted_on(); endif; ?>
                        </div>
                    <?php endif; ?>
                    <div class="post-content">
                        <?php the_content(); ?>
                        <?php if ($authors_bio) : echo '<div class="authors-bio">' . $authors_bio . '</div>'; endif; ?>
                    </div>
                </div>
                <div class="column third">
                    <?php
                        $currentID = get_the_ID();
                        $args = array(
                            'post_type' => 'post',
                            'category_name' => 'jersey-offshore',
                            'posts_per_page' => 2,
                            'order' => 'DESC',
                            'orderby' => 'date',
                            // get the two most recent stories that are not the current post
                            'post__not_in' => array($currentID)
                        );

                    $more_jersey_offshore = new WP_Query($args);

                    if ( $more_jersey_offshore->have_posts() ) : ?>
                        <div class="other-posts">
                            <h2>More Jersey Offshore Stories</h2>
                            <?php while ( $more_jersey_offshore->have_posts() ) :
                                $more_jersey_offshore->the_post();
                                $authors = get_field('post_author');
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
                                            <span class="author">By <?php if($authors) : echo $authors; endif; ?></span>
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