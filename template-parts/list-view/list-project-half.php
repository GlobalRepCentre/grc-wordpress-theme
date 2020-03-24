<?php
/**
 * Template part for displaying a one-half width project on the projects page
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Global_Reporting_Centre
 */

?>

<?php // get custom fields

$projectType = get_field('project_type');
$projectDescription = get_field('project_description'); 
$externalLink = get_field('external_link');

?>

<article class="column half">
        <?php if ($externalLink) : grc_featured_image($externalLink, 'thumbnail'); else: grc_featured_image(false, 'thumbnail'); endif; ?>
        <header>
            <a title="<?php the_title(); ?>" class="block" href="<?php if (!($externalLink)) : the_permalink(); else : echo $externalLink; endif; ?>"><?php the_title('<h1 class="project-title"><span>', '</span></h1>'); ?></a>
            <div class="feature-logo-buttons">
                <?php if( have_rows('feature_media_partner') ): ?>
                    <div class="partner-logo">
                        <span>In partnership with</span>
                        <?php while ( have_rows('feature_media_partner') ) : the_row();
                            $image = get_sub_field('partner_logo');
                            if( !empty( $image ) ): ?>
                            <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                            <?php endif;
                        endwhile; ?>
                    </div>
                    <div>
                        <a title="<?php the_title(); ?>" class="button" href="<?php if (!($externalLink)) : the_permalink(); else : echo $externalLink; endif; ?>">View feature<i class="fas fa-arrow-right"></i></a>
                    </div>
                <?php else: ?>
                    <div>
                        <a title="<?php the_title(); ?>" class="button" href="<?php if (!($externalLink)) : the_permalink(); else : echo $externalLink; endif; ?>">View feature<i class="fas fa-arrow-right"></i></a>
                    </div>
                <?php endif; ?>
            </div>
        </header>
        <div class="project-description project-info">
            <?php if ($projectType) : echo '<p class="type-of-project">' . $projectType . '</p>'; endif;
            // if there's a custom project description, use that
            if ($projectDescription) : echo '<p>' . $projectDescription . '</p>';
            // otherwise just use the excerpt
            else : echo '<p>' . get_the_excerpt() . '</p>'; endif; ?>
        </div>
</article>