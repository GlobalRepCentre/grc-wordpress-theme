<?php
/**
 * Template part for displaying the GRC's about section on the home page
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Global_Reporting_Centre
 */

?>

<?php 
// Check for content defined in WP Theme Customizer under the 'Home' section
function grc_about_panel() { ?>
  <aside class="callout-panel about">
    <div>
      <div>
      <?php if (get_theme_mod('grc_about_panel_header')) : ?>
        <h1><?php echo get_theme_mod('grc_about_panel_header'); ?></h1>
      <?php endif;
      if (get_theme_mod('grc_about_panel_text')) : ?>
        <div><?php echo get_theme_mod('grc_about_panel_text'); ?></div>
      <?php endif; ?>
      </div>
      <div>
      <?php if (get_theme_mod('grc_about_panel_link')) : ?>
        <a class="call-to-action" href="<?php echo get_theme_mod('grc_about_panel_link'); ?>">
          <?php echo 'Learn More'; ?>
        </a>
      <?php endif; ?>
      </div>
    </div>
  </aside>
<?php }

grc_about_panel();