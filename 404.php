<?php

// Modify the 404 page markup
add_action( 'beans_before_load_document', 'j0e_404_setup_document' );

function j0e_404_setup_document() {

    // Post
    beans_remove_attribute( 'beans_no_post_article_content', 'class', 'uk-alert uk-alert-warning' );
    beans_modify_markup( 'beans_no_post_article_content', 'h2' );
    beans_add_attribute( 'beans_no_post_article_content', 'class', 'uk-margin-large-bottom' );

}


// Update the 404 page title
add_action( 'beans_no_post_article_title_text_output', 'j0e_404_post_title' );

function j0e_404_post_title() {

	return beans_output( 'j0e_no_post_article_title_text', __( '404', 'tm-beans' ) );

}


// Update the 404 page content
add_action( 'beans_no_post_article_content_text_output', 'j0e_404_post_content' );

function j0e_404_post_content() {

	return beans_output( 'j0e_no_post_article_content_text', __( 'Page not found', 'tm-beans' ) );

}


// Load Beans document
beans_load_document();
