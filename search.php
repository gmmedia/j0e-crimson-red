<?php

// Modify the search page markup
add_action( 'beans_before_load_document', 'j0e_search_setup_document' );

function j0e_search_setup_document() {

    // Post
    beans_add_attribute( 'beans_content', 'class', 'uk-article' );
    beans_add_attribute( 'beans_post_title', 'class', 'uk-h2' );
    beans_add_attribute( 'beans_post', 'class', 'uk-grid-margin' );

    // Post image
    beans_remove_action( 'beans_post_image' );

    // Post meta
    beans_remove_action( 'beans_post_meta_tags' );
    beans_remove_action( 'beans_post_meta_categories' );

    // Remove article search
    beans_remove_output( 'beans_no_post_search_form' );

}


// Add the search form
add_action( 'beans_search_title_after_markup', 'j0e_search_field' );

function j0e_search_field( $content ) {

    ?><div class="uk-grid-margin"><?php
        get_search_form();
    ?></div><?php

}


// Clean up the search results item markup
add_action( 'the_content', 'j0e_search_content' );

function j0e_search_content( $content ) {

    $output = "<p>";
        $output .= beans_output( 'j0e_search_post_content', substr( strip_tags( $content ), 0, 150 ) . ' ...' );
    $output .= "</p>";

    return $output;

}


// Load beans document.
beans_load_document();