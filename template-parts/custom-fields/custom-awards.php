<?php
/**
 * Displays awards on the Awards page
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/
 *
 * @package Global_Reporting_Centre
 */

?>

<?php if( have_rows('awards_list') ): ?>
<div class="repeating-rows" id="awards">
    <?php while( have_rows('awards_list') ): the_row();

        if( get_row_layout() == 'year' ): ?>

            <h2><?php the_sub_field('award_year');?></h2>

        <?php elseif( get_row_layout() == 'award' ): ?>

            <?php if( have_rows('award_info') ): 

                while( have_rows('award_info') ): the_row(); 

                    // Get award values
                    $awardImage = get_sub_field('award_image');
                    $awardName = get_sub_field('award_name');
                    $awardCat = get_sub_field('award_cat');
                    $awardLink = get_sub_field('link_to_award');
                    $projectName = get_sub_field('project');
                    $projectLink = get_sub_field('link_to_project');

                    ?>

                    <div class="grid row">
                        <?php if ($awardImage): ?>
                        <div class="column shrink">
                            <?php if( $awardLink ): ?>
                                <a href="<?php echo $awardLink; ?>">
                                    <img src="<?php echo $awardImage['url']; ?>" alt="<?php echo $awardImage['alt'] ?>" />
                                </a>
                            <?php else: ?>
                                <img src="<?php echo $awardImage['url']; ?>" alt="<?php echo $awardImage['alt'] ?>" />
                            <?php endif; ?>
                        </div>
                        <?php endif; ?>
                        <div class="column">
                            <?php if( $awardLink ): ?>
                                <a href="<?php echo $awardLink; ?>">
                                    <?php echo '<span>' . $awardName . '</span>'; ?>
                                </a>
                            <?php else: ?>
                                <?php echo '<span>' . $awardName . '</span>'; ?>
                            <?php endif; ?>
                        </div>
                        <?php if ($awardCat): ?>
                        <div class="column">
                            <?php echo '<span>' . $awardCat . '</span>'; ?>
                        </div>
                        <?php endif; ?>
                        <div class="column">
                            <?php if( $projectLink ): ?>
                                <a href="<?php echo $projectLink; ?>">
                                    <?php echo '<span>' . $projectName . '</span>'; ?>
                                </a>
                            <?php else: ?>
                                <?php echo '<span>' . $projectName . '</span>'; ?>
                            <?php endif; ?>
                        </div>
                    </div>

                <?php endwhile; ?>

            <?php endif; ?>

        <?php endif; ?>

    <?php endwhile; ?>

</div>
<?php endif; ?>