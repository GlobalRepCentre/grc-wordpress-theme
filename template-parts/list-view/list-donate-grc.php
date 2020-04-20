<?php
/**
 * Template part for displaying GRC donation panel
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Global_Reporting_Centre
 */

?>

<?php 
// Check for content defined in WP Theme Customizer under the 'Home' section
function grc_donate_panel() { ?>
    <aside class="callout-panel">
        <div>
        <?php if (get_theme_mod('grc_donate_panel_header')) : ?>
            <h2><?php echo get_theme_mod('grc_donate_panel_header'); ?></h2>
        <?php endif;

        if (get_theme_mod('grc_donate_panel_text')) : ?>
            <div><?php echo get_theme_mod('grc_donate_panel_text'); ?></div>
        <?php endif; ?>
        </div>
        <div>
        <?php if (get_theme_mod('grc_donate_panel_link')) : ?>
            <a target="_blank" rel="noopener noreferrer" class="call-to-action" href="<?php echo get_theme_mod('grc_donate_panel_link'); ?>">
                <?php if (get_theme_mod('grc_donate_panel_link_text')) :
                    echo get_theme_mod('grc_donate_panel_link_text');
                else :
                    echo 'Our approach';
                endif; ?>
            </a>
        <?php endif; ?>
        </div>
    </aside>
<?php }

grc_donate_panel();