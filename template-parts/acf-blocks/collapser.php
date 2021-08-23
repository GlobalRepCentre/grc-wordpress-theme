<?php

/**
 * Collapser Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'collapser-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'collapser';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}

// Load values and assign defaults.
$header = get_field('header') ? : 'Collapser header';
$content = get_field('content') ? : 'Content';

?>

<div class="<?php echo esc_attr($className); ?>">
  <div class="title" tabindex="0" role="button" aria-controls="<?php echo esc_attr($id); ?>">
    <span class="text"><?php echo $header; ?></span><span class="plus-minus"><i class="fas fa-plus"></i></span>
  </div>
  <div id="<?php echo esc_attr($id); ?>" class="content" style="display: none;"><?php echo $content; ?></div>
</div>
