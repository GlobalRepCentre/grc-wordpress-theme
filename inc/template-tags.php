<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Global_Reporting_Centre
 */

if ( ! function_exists( 'grc_posted_on' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time.
	 */
	function grc_posted_on() {
    if ( is_page() && !is_front_page() || in_category('events') || in_category('projects') ) {
		 return;
    }
    $time_string = '<time class="entry-date" datetime="%1$s">%2$s</time>';

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
	);

	$posted_on = sprintf(
		esc_html_x( '%s', 'post date' ),
		$time_string
	);

	echo '<span class="posted-on">Published ' . $posted_on . '</span>'; // WPCS: XSS OK.
	}
endif;

if ( ! function_exists( 'grc_podcast_date' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time.
	 */
	function grc_podcast_date() {

  $time_string = '<time class="entry-date" datetime="%1$s">%2$s</time>';
	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
	);

	$posted_on = sprintf(
		esc_html_x( '%s', 'post date' ),
		$time_string
	);

	echo '<span class="posted-on">Released ' . $posted_on . '</span>'; // WPCS: XSS OK.
	}
endif;

if ( ! function_exists( 'grc_posted_by' ) ) :

	function grc_posted_by() {
        if ( ! in_category('ideas') ) {
		    return;
        }

        $author = get_field('post_author');

        if (!($author)) : $author = 'GRC Staff'; endif; 
    
		$byline = sprintf(
			esc_html_x( 'by %s', 'post author', 'global-reporting-centre' ),
			'<span class="author vcard">' . $author . '</span>'
		);

        echo '<span class="byline"> ' . $byline . '</span>'; // WPCS: XSS OK.

	}
endif;

if ( ! function_exists( 'grc_event_start_date_time' ) ) :

    // Print the event start date and time
	function grc_event_start_date_time() {
        if ( ! in_category(array('events', 'vancouver-institute-events')) ) {
		    return;
        }
        if (get_field('event_start')) :
            $startdate = get_field('event_start');
            echo '<span class="event startdate">' . $startdate . '</span>';    
        endif;
    }
endif;

if ( ! function_exists( 'grc_entry_footer' ) ) :
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function grc_entry_footer() {
		// Hide category and tag text for pages.
		if ( 'post' === get_post_type() ) {
			/* translators: used between list items, there is a space after the comma */
			$categories_list = get_the_category_list( esc_html__( ', ', 'global-reporting-centre' ) );
			if ( $categories_list ) {
				/* translators: 1: list of categories. */
				printf( '<span class="cat-links">' . esc_html__( 'Posted in %1$s', 'global-reporting-centre' ) . '</span>', $categories_list ); // WPCS: XSS OK.
			}

			/* translators: used between list items, there is a space after the comma */
			$tags_list = get_the_tag_list( '', esc_html_x( ', ', 'list item separator', 'global-reporting-centre' ) );
			if ( $tags_list ) {
				/* translators: 1: list of tags. */
				printf( '<span class="tags-links">' . esc_html__( 'Tagged %1$s', 'global-reporting-centre' ) . '</span>', $tags_list ); // WPCS: XSS OK.
			}
		}

		if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
			echo '<span class="comments-link">';
			comments_popup_link(
				sprintf(
					wp_kses(
						/* translators: %s: post title */
						__( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'global-reporting-centre' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					get_the_title()
				)
			);
			echo '</span>';
		}

		edit_post_link(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Edit <span class="screen-reader-text">%s</span>', 'global-reporting-centre' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			),
			'<span class="edit-link">',
			'</span>'
		);
	}
endif;

if ( ! function_exists( 'grc_featured_image' ) ) :
	/**
	 * Displays an optional featured post thumbnail.
	 */
    
    // If externalLink exists its value gets passed in
	function grc_featured_image($externalLink=false, $imgSize='medium') {
		if ( post_password_required() || is_attachment() ) {
			return;
        } ?>

        <figure class="post-image">
            <a href="<?php // check if an external link was defined in ACF
                if (!($externalLink)) : the_permalink(); else : echo $externalLink; endif; ?>" title="<?php the_title(); ?>" aria-hidden="true" tabindex="-1">
                <?php if (has_post_thumbnail()) : the_post_thumbnail($imgSize); else : echo '<div class="ph-box"></div>'; endif; ?>
            </a>
        </figure>
  <?php }
    
    // On the people page we don't want to link to the post
	function grc_person_image() {

		if ( post_password_required() || is_attachment() ) {
			return;
        } ?>

        <figure class="post-image person">
            <?php if (has_post_thumbnail()) : the_post_thumbnail('medium'); else : echo '<div class="ph-box"></div>'; endif; ?>
        </figure>
        
  <?php }
  
  // On the podcast pages we don't want to link to the post
	function grc_podcast_image() {

		if ( post_password_required() || is_attachment() ) {
			return;
        } ?>

        <figure class="post-image">
            <?php if (has_post_thumbnail()) : the_post_thumbnail('large'); else : echo '<div class="ph-box"></div>'; endif; ?>
        </figure>
        
	<?php }

endif;

if ( ! function_exists( 'grc_featured_singular_image' ) ) :
	/**
	 * Displays the featured image for singular pages
	 */
	function grc_featured_singular_image($imageDisplayType='wide', $imageAlignment='middle') {
        
		if ( post_password_required() || is_attachment() || $imageDisplayType === 'hide' ) {
			return;
        }

        // Retrieve featured image metadata
        $post_thumbnail_id = get_post_thumbnail_id($post_id);
        $photo_credit = get_field('photo_credit', $post_thumbnail_id);
        $photo_caption = get_post($post_thumbnail_id)->post_excerpt; ?>

        <?php 
            if ($imageDisplayType === 'full') : 
                echo '<figure class="fullscreen">';
                the_post_thumbnail('large');

            elseif ($imageDisplayType === 'wide') : 
                echo '<figure class="widescreen ' . $imageAlignment . '">'; 
                the_post_thumbnail('large');

            else : 
                echo '<figure class="square">';
                the_post_thumbnail('large');

            endif; ?>

            <?php if (($photo_credit) || ($photo_caption)) : ?>
            <figcaption>
                <?php if ($photo_caption) : echo $photo_caption; endif; ?>
                <?php if ($photo_credit) : echo '<span>' . $photo_credit . '</span>'; endif; ?>
            </figcaption>
            <?php endif; ?>
        </figure> <?php
    }
endif;     


if ( ! function_exists( 'grc_linked_category_output' ) ) :
	function grc_linked_category_output() {

        $category = get_the_category();

        // Get the first category of a post (in case multiple categories are assigned)
        $first_category_name = $category[0]->name;
        // Use the slug instead of the category URL so that we don't prepend the URL with '/category'
        $first_category_slug = $category[0]->slug;

        if ($first_category_slug === 'exclude-from-home') :
            // If it's the exclude from home category, get the second category
            $first_category_name = $category[1]->name;
            $first_category_slug = $category[1]->slug;
        endif;

        // Wrap it in a link to that category's page ?>
        <a class="linked-category <?php echo $first_category_slug; ?>" href="<?php echo esc_url( home_url( '/' ) . $first_category_slug ); ?>" title="<?php echo $first_category_name; ?>">
            <?php echo $first_category_name; ?>
        </a>

    <?php 
	}
endif;


if ( ! function_exists( 'grc_event_category_output' ) ) :
	function grc_event_category_output() {

        $category = get_the_category();
        $first_category_name = $category[0]->name;

        if ($first_category_name === 'Events') : ?>
            <a class="linked-category events" href="<?php echo esc_url( home_url( '/' ) . 'events'); ?>" title="All GRC Events">Events</a>
        <?php else : ?>
            <a class="linked-category events" href="<?php echo esc_url( home_url( '/' ) . 'vancouver-institute-events'); ?>" title="All Vancouver Institute Events">VI Events</a>
        <?php endif; 

	}
endif;
