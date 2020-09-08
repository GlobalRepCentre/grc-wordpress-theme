<?php
/**
 * Template part for displaying regular pages
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

    $sidebar = get_field('page_sidebar');
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <?php if ($imageDisplayType === 'full') : ?>
        <div class="fullscreen-container<?php if ($imageShadow) : echo ' shadow'; endif; ?>">
            <?php grc_featured_singular_image('full'); ?>
            <header class="entry-header site-width">
                <?php the_title( '<h1 class="page-title">', '<i class="column shrink fas fa-arrow-down"></i></h1>' ); ?>
                <?php grc_posted_on(); ?>
            </header>
        </div>
    <?php elseif ($imageDisplayType === 'wide') : ?>
        <?php grc_featured_singular_image('wide', $imageAlignment); ?>
        <header class="entry-header site-width">
            <?php the_title( '<h1 class="page-title">', '</h1>' ); ?>
        </header>
    <?php elseif ($imageDisplayType === 'square') : ?>
        <header class="entry-header site-width">
            <?php the_title( '<h1 class="page-title">', '</h1>' ); ?>
            <?php grc_featured_singular_image('large'); ?>
        </header>
    <?php elseif ($imageDisplayType === 'hide') : ?>
        <header class="entry-header site-width">
            <?php the_title( '<h1 class="page-title">', '</h1>' ); ?>
        </header>
    <?php endif; ?>

        <div class="entry-content">
            <?php if ($imageDisplayType !== 'full') : grc_posted_on(); endif; ?>
            <?php if ($sidebar) : ?>
                <div class="grid align-to-top">
                    <div class="column">
                        <?php the_content(); ?>
                        <?php if (is_page('awards')) : get_template_part( 'template-parts/custom-fields/custom', 'awards' ); endif; ?>
                        
                    </div>
                    <div class="column third sidebar">
                        <?php echo $sidebar; ?>
                    </div>
                </div>
            <?php else : 
                the_content(); 
                if (is_page('awards')) : get_template_part( 'template-parts/custom-fields/custom', 'awards' ); endif;
            endif; ?>
        </div><!-- .entry-content -->

</article>