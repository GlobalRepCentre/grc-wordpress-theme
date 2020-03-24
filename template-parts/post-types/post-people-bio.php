<?php
/**
 * Template part for displaying single person posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Global_Reporting_Centre
 */

?>
<?php // get custom fields
    $personRole = get_field('persons_role');
    $personType = get_field('type_of_person');
?>

<article id="person" class="grid align-to-top">
    <div class="column shrink">
        <?php grc_person_image();?>
    </div>
    <div class="column">
        <header class="entry-header">
            <div class="grid no-padding">
                <div class="column shrink">
                    <h2 class="person"><?php the_title(); ?></h2>
                </div>
                <?php if( have_rows('personal_links') ):?>
                <div class="column">
                    <ul class="personal-links column">
                        <?php while ( have_rows('personal_links') ) : the_row();
                            if( get_row_layout() == 'email' ):?> <li><a target="_blank" href="mailto:<?php the_sub_field('email_address');?>"><i class="fas fa-envelope"></i></a></li>
                            <?php elseif( get_row_layout() == 'twitter' ):?> <li><a target="_blank" href="<?php the_sub_field('twitter_url');?>"><i class="fab fa-twitter"></i></a></li>
                            <?php elseif( get_row_layout() == 'linkedin' ):?> <li><a target="_blank" href="<?php the_sub_field('linkedin_url');?>"><i class="fab fa-linkedin"></i></a></li>
                            <?php elseif( get_row_layout() == 'instagram' ):?> <li><a target="_blank" href="<?php the_sub_field('instagram_url');?>"><i class="fab fa-instagram"></i></a></li>
                            <?php elseif( get_row_layout() == 'personal' ):?> <li><a target="_blank" href="<?php the_sub_field('personal_url');?>"><i class="fas fa-link"></i></a></li>
                            <?php endif;
                        endwhile; ?>
                    </ul>
                </div>
                <?php endif; ?>
            </div>
            <?php if ($personRole) :
                echo '<div class="person-role">' . $personRole . '</div>';
            endif; ?>
        </header><!-- .entry-header -->
        <div>
            <?php the_content(); ?>
        </div>
    </div>
</article>
<div class="site-width" id="people-buttons">
    <a class="button" href="/people"><i class="fas fa-arrow-left"></i>Back to People Page</a>
</div>