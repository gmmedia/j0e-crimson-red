<?php

// Include Beans
require_once( get_template_directory() . '/lib/init.php' );


// Remove Beans default styling
remove_theme_support( 'beans-default-styling' );


// Enqueue uikit assets
add_action( 'beans_uikit_enqueue_scripts', 'j0e_enqueue_uikit_assets', 5 );

function j0e_enqueue_uikit_assets() {

	// Enqueue uikit overwrite theme folder
	beans_uikit_enqueue_theme( 'j0e', get_stylesheet_directory_uri() . '/assets/less/uikit' );

	// Add the theme style as a uikit fragment to have access to all the variables
	beans_compiler_add_fragment( 'uikit', get_stylesheet_directory_uri() . '/assets/less/style.less', 'less' );

	// Add the theme js as a uikit fragment
	beans_compiler_add_fragment( 'uikit', get_stylesheet_directory_uri() . '/assets/js/toggle.js', 'js' );
	
	// Include the uikit components needed
	beans_uikit_enqueue_components( array( 'contrast', 'column' ) );
	beans_uikit_enqueue_components( array( 'sticky' ), 'add-ons' );

}


// Load language files from the child theme
load_child_theme_textdomain( 'tm-beans', get_stylesheet_directory() . '/languages/' );


// Remove site description
beans_remove_action( 'beans_site_title_tag' );


// Replace h2 and h3 with div - Make the theme semantic valid
beans_modify_markup( 'beans_widget_title', 'div' );

beans_add_attribute( 'beans_widget_title', 'class', 'uk-h3' );

beans_modify_markup( 'beans_comments_title', 'div' );

beans_add_attribute( 'beans_comments_title', 'class', 'uk-h3' );

add_filter( 'comment_form_defaults', 'example_comment_form_defaults' );

function example_comment_form_defaults( $args ) {

    return array_merge( $args, array(
        'title_reply_before' => '<div id="reply-title" class="comment-reply-title uk-h3">',
        'title_reply_after' => '</div>',
    ) );

}


// Modify beans layout (filter)
add_action( 'beans_layout_grid_settings', 'beans_child_layout_grid_settings' );

function beans_child_layout_grid_settings( $layouts ) {

    return array_merge( $layouts, array(
        'grid' => 10,
        'sidebar_primary' => 3,
		'sidebar_secondary' => 2,
    ) );
}


// Move the breadcrumb below the header.
beans_modify_action( 'beans_breadcrumb', 'beans_header_after_markup', 'j0e_move_breadcrumb' );

function j0e_move_breadcrumb() {
    ?>
    <div class="j0e-breadcrumb">
        <div class="uk-container uk-container-center">
            <?php echo beans_breadcrumb();
			// Only apply to home page.
			if ( is_home() ) {
				?>
				<a href="/" rel="home" title="<?php echo get_option( 'blogdescription' ) ?>">
					<h1 class="j0e-h1-small"><?php echo get_option( 'blogname' ) ?></h1>
				</a>
				<?php
			}
			?>
        </div>
    </div>
    <?php
}


// Add a vertical divider between main and sidebar
beans_add_attribute( 'beans_sidebar_primary', 'class', 'uk-position-relative' );


// Make navigation sticky
beans_add_attribute( 'beans_header', 'data-uk-sticky', '{top:-40}' );


// Muted footer links
beans_add_attribute( 'beans_footer_credit', 'class', 'uk-link-muted' );


// Add admin layout option (filter) (code by Chris - themebutler.com)
add_action( 'beans_layouts', 'j0e_layouts' );

function j0e_layouts( $layouts ) {

	$layouts['j0e_c'] = get_stylesheet_directory_uri() . '/assets/images/c.png';

	return $layouts;

}


// Add a paragraph to the more link
beans_wrap_markup( 'beans_post_more_link', 'beans_post_more_link_paragraph', 'p' );


// Add a more link to the excerpt
add_filter( 'the_content', 'j0e_modify_post_content' );

function j0e_modify_post_content( $content ) {

    // Stop here if we are on a single view.
    if ( is_singular() )
        return $content;

    // Return the excerpt() if it exists other truncate.
    if ( has_excerpt() )
        $content = '<p>' . get_the_excerpt() . beans_post_more_link() . '</p>';
    else
        $content = '<p>' . get_the_content() . '</p>';

    // Return content
    return $content;

}


// Setup document fragments, markups and attributes
add_action( 'wp', 'j0e_setup_document' );

function j0e_setup_document() {
	
	// No cat and tags on listings
	if ( !is_singular() ) {
		beans_remove_action( 'beans_post_meta_tags' );
		beans_remove_action( 'beans_post_meta_categories' );
	}
	
	// Search form toggle in header
	beans_replace_attribute( 'beans_search_form', 'class', 'uk-form-icon uk-form-icon-flip', 'uk-display-inline-block' );
	beans_remove_markup( 'beans_search_form_input_icon' );

	// Add grid min width for slim content page
	if ( beans_get_layout() == 'j0e_c' )
		beans_add_attribute( 'beans_content', 'class', 'tm-centered-content' );

	// Post and archive title
	beans_add_attribute( 'beans_post_title', 'class', 'uk-margin-small-bottom' );
	beans_remove_attribute( 'beans_post_title', 'class', 'uk-article-title' );
	beans_remove_attribute( 'beans_archive_title', 'class', 'uk-article-title' );

	// Only applies to singular and not pages
	if ( is_singular() && !is_page() ) {
		// Post navigation
		beans_add_attribute( 'beans_post_navigation', 'class', 'uk-grid-margin' );

		// Post comments
		beans_add_attribute( 'beans_no_comment', 'class', 'tm-no-comments uk-text-center uk-text-large uk-block' );

	}
	
}


// Add primary menu search field (code by Chris - themebutler.com)
add_action( 'beans_primary_menu_append_markup', 'j0e_primary_menu_search' );

function j0e_primary_menu_search() {

	?><div class="tm-search uk-visible-large uk-navbar-content" style="display: none;"><?php
		get_search_form();
	?></div><?php

	?><div class="tm-search-toggle uk-visible-large uk-navbar-content uk-display-inline-block">
		<i class="uk-icon-search"></i>
	</div>
	<?php

}


// Remove comment after note (filter)
add_action( 'comment_form_defaults', 'j0e_comment_form_defaults' );

function j0e_comment_form_defaults( $args ) {

	$args['comment_notes_after'] = '';

	return $args;

}


// Register bottom widget area
add_action( 'widgets_init', 'j0e_register_bottom_widget_area' );

function j0e_register_bottom_widget_area() {

	beans_register_widget_area( array(
		'name' => 'Bottom / Footer',
		'id' => 'bottom',
		'description' => 'Widgets in this area will be shown in the bottom section as a grid.',
		'beans_type' => 'grid'
	) );

}


// Add the bottom widget area
add_action( 'beans_footer_before_markup', 'j0e_bottom_widget_area' );

function j0e_bottom_widget_area() {

	// Stop here if no widget
	if( !beans_is_active_widget_area( 'bottom' ) )
		return;

	?><section class="tm-bottom uk-block">
		<div class="uk-container uk-container-center">
			<?php echo beans_widget_area( 'bottom' ); ?>
		</div>
	</section><?php

}


// Register hero widget area
add_action( 'widgets_init', 'j0e_register_hero_widget_area' );

function j0e_register_hero_widget_area() {

	beans_register_widget_area( array(
        'name' => 'Hero',
        'id' => 'hero',
        'description' => 'Widgets in this area will be shown in the hero section as a grid.',
        'beans_type' => 'grid'
	) );

}


// Add the hero area
add_action( 'beans_main_grid_before_markup', 'j0e_hero_widget_area' );

function j0e_hero_widget_area() {

	// Stop here if no widget
	if( !beans_is_active_widget_area( 'hero' ) )
		return;

	?><section class="uk-block">
		<div class="class=uk-container uk-container-center j0e-hero-section">
			<?php echo beans_widget_area( 'hero' ); ?>
		</div>
	</section><?php

}


// Add post meta item date icon
add_action( 'beans_post_meta_item_date_prepend_markup', 'j0e_post_meta_item_date_icon' );

function j0e_post_meta_item_date_icon() {

	?><i class="uk-icon-clock-o uk-margin-small-right uk-text-muted"></i><?php

}


// Add post meta item author icon
add_action( 'beans_post_meta_item_author_prepend_markup', 'j0e_post_meta_item_author_icon' );

function j0e_post_meta_item_author_icon() {

	?><i class="uk-icon-user uk-margin-small-right uk-text-muted"></i><?php

}


// Add post meta item categories icon
add_action( 'beans_post_meta_categories_prepend_markup', 'j0e_post_meta_item_categories_icon' );

function j0e_post_meta_item_categories_icon() {

	?><i class="class=uk-icon-archive uk-margin-small-right uk-text-muted"></i><?php

}


// Add post meta item tags icon
add_action( 'beans_post_meta_tags_prepend_markup', 'j0e_post_meta_item_tags_icon' );

function j0e_post_meta_item_tags_icon() {

	?><i class="uk-icon-tags uk-margin-small-right uk-text-muted"></i><?php

}


// Add post meta item comment icon
add_action( 'beans_post_meta_item_comments_prepend_markup', 'j0e_post_meta_item_comments_icon' );

function j0e_post_meta_item_comments_icon() {

	?><i class="uk-icon-comments uk-margin-small-right uk-text-muted"></i><?php

}


// Add the new secondary menu
add_action( 'beans_header_after_markup', 'j0e_secondary_menu' );

function j0e_secondary_menu() {
	if ( has_nav_menu( 'secondary-menu' ) ) {
		?><div class="j0e-secondary-menu"><?php
		wp_nav_menu( array( 
			'menu' => 'Secondary Menu',
			'menu_class' => 'uk-navbar-nav uk-visible-larget',
			'container' => 'nav',
			'container_class' => 'uk-container uk-container-center uk-navbar',
			'theme_location' => 'secondary-menu',
			'beans_type' => 'navbar'
		) );
		?></div><?php
	}
}


// Register new Footer Menu
add_action( 'init', 'j0e_register_my_footer_menu' );

function j0e_register_my_footer_menu() {
    register_nav_menu( 'footer-menu',__( 'Footer Menu' ) );
}


// Register new Top Social Menu
add_action( 'init', 'j0e_register_my_social_menu' );

function j0e_register_my_social_menu() {
    register_nav_menu( 'social-menu',__( 'Social Menu' ) );
}


// Add the new Top Social Menu
add_action( 'beans_header_before_markup', 'j0e_social_menu' );

function j0e_social_menu() {
	if ( has_nav_menu( 'social-menu' ) ) {
		?><div class="j0e-social-bar"><?php
		wp_nav_menu( array( 
		    'menu' => 'Social Menu',
		    'menu_class' => 'uk-subnav uk-navbar-flip',
		    'container' => 'div',
		    'container_class' => 'uk-container uk-container-center',
		    'theme_location' => 'social-menu',
		    'beans_type' => 'navbar'
		) );
		?></div"><?php
	}
}
beans_remove_attribute( 'beans_menu[_navbar][_social-menu]', 'class', 'uk-navbar-nav' );


// Register new secondary menu
add_action( 'init', 'j0e_register_my_secondary_menu' );

function j0e_register_my_secondary_menu() {
    register_nav_menu( 'secondary-menu',__( 'Secondary Menu' ) );
}


// Overwrite the footer credit and add the footer menu for contact, privacy...
add_action( 'beans_footer_credit_right_text_output', 'j0e_footer_menu' );

function j0e_footer_menu() {
	if ( has_nav_menu( 'footer-menu' ) ) {
		wp_nav_menu( array( 
		    'menu' => 'Footer Menu',
		    'menu_class' => 'uk-subnav uk-subnav-line uk-contrast',
		    'theme_location' => 'footer-menu',
		    'beans_type' => 'navbar'
		) );
	}
}
beans_remove_attribute( 'beans_menu[_navbar][_footer-menu]', 'class', 'uk-navbar-nav' );


// Let WordPress handle the image sizes
add_filter( 'beans_post_image_edit', '__return_false' );


// Smaller grid between gallery images
beans_add_attribute( 'beans_post_gallery', 'class', 'uk-grid-medium' );


// Set new gallery defaults
function j0e_gallery_defaults( $settings ) {
	$settings['galleryDefaults']['link'] = 'file';
	$settings['galleryDefaults']['size'] = 'thumbnail';
	$settings['galleryDefaults']['columns'] = '4';
	return $settings;
}
add_filter( 'media_view_settings', 'j0e_gallery_defaults' );


// Set content_width for images and oembed like Youtube
if ( ! isset( $content_width ) ) {
	$content_width = 705;
}


// Includes
require_once( get_stylesheet_directory() . '/includes/editor-buttons.php' );