<?php
/**
 * Displays GRC funders on the About page
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/
 *
 * @package Global_Reporting_Centre
 */

?>

<?php if( have_rows('repeating_rows') ):

$sectionHeader = get_field('section_header');
if ($sectionHeader) : echo '<h2>' . $sectionHeader . '</h2>'; endif; ?>

<div class="repeating-rows">
<?php while( have_rows('repeating_rows') ): the_row(); 

    $rowImage = get_sub_field('rows_image');
    $rowText = get_sub_field('rows_text');
    $rowLink = get_sub_field('rows_link');

    ?>

    <div class="grid row">
        <?php if ($rowImage): ?>
        <div class="column shrink">
            <?php if( $rowLink ): ?>
                <a href="<?php echo $rowLink; ?>">
                    <img src="<?php echo $rowImage['url']; ?>" alt="<?php echo $rowImage['alt'] ?>" />
                </a>
            <?php else: ?>
                <img src="<?php echo $rowImage['url']; ?>" alt="<?php echo $rowImage['alt'] ?>" />
            <?php endif; ?>
        </div>
        <?php endif; ?>
        <div class="column">
            <?php if( $rowLink ): ?>
                <a href="<?php echo $rowLink; ?>">
                    <?php echo '<span>' . $rowText . '</span>'; ?>
                </a>
            <?php else: ?>
                <?php echo '<span>' . $rowText . '</span>'; ?>
            <?php endif; ?>
        </div>
    </div>

<?php endwhile; ?>
</div>
<?php endif; ?>