<?php
/**
 * Template part for displaying a full-width hero project on the projects page
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

<article class="column one hero">
    <?php if ($externalLink) : grc_featured_image($externalLink, 'large'); else: grc_featured_image(false, 'large'); endif; ?>
    <header class="column shrink">
        <a title="<?php the_title(); ?>" href="<?php if (!($externalLink)) : the_permalink(); else : echo $externalLink; endif; ?>"><?php the_title('<h1 class="project-title"><span>', '</span></h1>'); ?></a>
    </header>
    <div class="grid no-padding project-info">
        <?php if( have_rows('feature_media_partner') ): ?>
        <div class="partner-logo column shrink">
            <span>In partnership with</span>
            <?php while ( have_rows('feature_media_partner') ) : the_row();
                $image = get_sub_field('partner_logo');
                if( !empty( $image ) ): ?>
                <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                <?php endif;
            endwhile; ?>
        </div>
        <?php endif; ?> 
        <div class="column shrink">
            <a title="<?php the_title(); ?>" class="button" href="<?php if (!($externalLink)) : the_permalink(); else : echo $externalLink; endif; ?>">View feature<i class="fas fa-arrow-right"></i></a>
        </div>
    </div>
    <div class="project-description">
      <?php if ($projectType) : echo '<p class="type-of-project">' . $projectType . '</p>'; endif; ?>
      <?php
      // if there's a custom project description, use tjat
      if ($projectDescription) : echo '<p>' . $projectDescription . '</p>';
      // otherwise just use the excerpt
      else : echo '<p>' . get_the_excerpt() . '</p>'; endif; ?>
    </div>
</article>