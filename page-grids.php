<?php

/* Template Name: Grid */


// Setup j0e
beans_add_smart_action( 'beans_before_load_document', 'j0e_index_setup_document' );

function j0e_index_setup_document() {

	// Posts grid
	beans_add_attribute( 'beans_content', 'class', 'tm-posts-grid uk-grid uk-grid-width-small-1-2 uk-grid-width-medium-1-3 uk-grid-width-large-1-4 uk-grid-small' );
	beans_add_attribute( 'beans_content', 'data-uk-grid-margin', '' );
	beans_add_attribute( 'beans_content', 'data-uk-grid-match', "{target:'.uk-panel'}" );
	beans_wrap_inner_markup( 'beans_post', 'j0e_post_panel', 'div', array(
	  'class' => 'uk-panel uk-panel-box j0e-no-border'
	) );

	// Post content
	beans_remove_attribute( 'beans_content', 'class', 'tm-centered-content' );

	// Post article
	beans_remove_attribute( 'beans_post', 'class', 'uk-article' );

	// Post meta
	beans_remove_action( 'beans_post_meta' );
	beans_remove_action( 'beans_post_meta_tags' );
	beans_modify_action( 'beans_post_meta_categories', 'beans_post_header', null, 7 );

	// Post image
	beans_modify_action( 'beans_post_image', 'beans_post_header_before_markup', 'beans_post_image' );

	// Post title
	beans_add_attribute( 'beans_post_title', 'class', 'uk-margin-small-top uk-h3' );

	// Post more link
	beans_add_attribute( 'beans_post_more_link', 'class', 'uk-button uk-button-mini' );

	// Posts pagination
	beans_add_attribute( 'beans_posts_pagination', 'class', 'uk-width-1-1' );

	// Add Favicon
	beans_favicon();
}


// Resize post image (filter)
beans_add_smart_action( 'beans_edit_post_image_args', 'j0e_index_post_image_args' );

function j0e_index_post_image_args( $args ) {

	$args['resize'] = array( 244, 142, true );

	return $args;

}


add_filter( 'beans_loop_query_args', 'beans_child_view_query_args' );

function beans_child_view_query_args() {

    return array(
		'post_type' => 'post',
        //'category_name' => 'your-cat-slug',
        'paged' => get_query_var( 'paged' )
    );

}

// Trim the content.
add_filter( 'the_content', 'example_post_excerpt' );

function example_post_excerpt( $content ) {

    return wp_trim_words( $content, 35, '...' );

}

// Load beans document
beans_load_document();