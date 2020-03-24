<?php
/**
 * Template part for displaying individual posts in the homepage slider
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Global_Reporting_Centre
 */

?>

<?php // get custom fields
    $externalLink = get_field('external_link');
?>

<article id="post-<?php the_ID(); ?>" class="slider item">
    <?php if ($externalLink) : grc_featured_image($externalLink, 'thumbnail'); else: grc_featured_image(false, 'thumbnail'); endif; ?>
    <header class="entry-header">
        <a title="<?php the_title(); ?>" href="<?php if ($externalLink): echo $externalLink; else: echo esc_url(get_permalink()); endif; ?>" rel="bookmark">
            <h1><span><?php echo the_title(); ?></span></h1>
        </a>
        <div class="entry-meta">
        <?php
            if (in_category('news')) : grc_posted_on(); endif;
            if (in_category('events')) : grc_event_start_date_time(); endif;
        ?>
        </div>
        <span class="category-link"><?php grc_linked_category_output(); ?></span>
    </header>
</article>