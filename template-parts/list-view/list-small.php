<?php
/**
 * Template part for displaying a small article in list views
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Global_Reporting_Centre
 */

?>

<?php // get custom fields
    $externalLink = get_field('external_link');

    if (in_category(array('events', 'vancouver-institute-events'))) :
        // event-specific fields
        $startdate_time = get_field('event_start');
        $end_time = get_field('event_end_time');
        $enddate_time = get_field('event_end');
    endif; 

    if (in_category('projects')) :
        // project-specific fields
        $projectType = get_field('project_type');
        $projectDescription = get_field('project_description'); 
    endif;

?>

<article class="column one small">
    <div class="grid">
        <div class="column shrink">
            <?php if (in_category(array('vancouver-institute-events'))) :
                if ($externalLink) : grc_featured_image($externalLink, 'medium');
                else: grc_featured_image(false, 'medium'); endif;
            else : 
                if ($externalLink) : grc_featured_image($externalLink, 'thumbnail');
                else: grc_featured_image(false, 'thumbnail'); endif;
            endif; ?>
        </div>
        <div class="column">
            <header>
                <a title="<?php the_title(); ?>" class="block" href="<?php if (!($externalLink)) : the_permalink(); else : echo $externalLink; endif; ?>"><?php the_title('<h1 class="title"><span>', '</span></h1>'); ?></a>

                <?php if (in_category('projects')) : ?>
                    <a title="<?php the_title(); ?>" class="button" href="<?php if (!($externalLink)) : the_permalink(); else : echo $externalLink; endif; ?>">View project<i class="fas fa-arrow-right"></i></a>
                <?php endif; ?>

            </header>

            <div class="description">
                <?php if ($projectType) : echo '<p class="type-of-project">' . $projectType . '</p>'; endif;
                 // if there's a custom project description, use that
                if ($projectDescription) : echo '<p>' . $projectDescription . '</p>';
                // otherwise just use the excerpt
                else : echo '<p>' . get_the_excerpt() . '</p>'; endif; ?>
            </div>

            <?php if (!(in_category('projects'))) : ?>
            <div class="entry-meta">
                <?php
                    if (in_category('news')) : grc_posted_on(); endif;
                    if (in_category(array('events', 'vancouver-institute-events'))) : grc_event_start_date_time(); endif;
                    if (in_category(array('ideas', 'news'))) : grc_posted_by(); endif;
                ?>
            </div><!-- .entry-meta -->
            <?php endif; ?>
        </div>
    </div>
</article>