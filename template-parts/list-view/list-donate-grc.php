<?php
/**
 * Template part for displaying GRC donation panel
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Global_Reporting_Centre
 */
$allowed = array('p' => array(), 'a' => array());

$header = esc_html( get_theme_mod('grc_donate_header') );
$content = wp_kses( get_theme_mod('grc_donate_text'), $allowed );
$donateLink = esc_url(get_theme_mod('grc_donate_link'));
$donateLinkText = esc_html( get_theme_mod('grc_donate_link_text') );

?>

<?php if ($header || $content) : ?>

<aside class="callout-panel">
  <div>
    <div>
      <?php if ($header) : ?><h2><?php echo $header; ?></h2><?php endif; ?>
      <?php if ($content) : ?><div><?php echo $content; ?></div><?php endif; ?>
    </div>
    <?php if ($donateLink) : ?>
    <div>
      <a class="call-to-action" href="<?php echo $donateLink; ?>">
        <?php if ($donateLinkText) : echo $donateLinkText; else : echo 'Donate now'; endif; ?>
      </a>
    </div>
    <?php endif; ?>
  </div>
</aside>

<?php endif; ?>
