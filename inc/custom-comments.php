<?php
/**
 * Comment Form
 */

add_filter( 'comment_form_default_fields', 'videobuzz_comment_form_fields' );

function videobuzz_comment_form_fields( $fields ) {

    $commenter = wp_get_current_commenter();
    $req = get_option( 'require_name_email' );
    $aria_req = ( $req ? " aria-required='true'" : '' );
    $html5 = current_theme_supports( 'html5', 'comment-form' ) ? 1 : 0;

    $fields = array(
        'author' => '<div class="row"><div class="col-md-4"><input class="form-control mb-30" id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' placeholder="' . __( 'Your Name', 'videobuzz' ) . ( $req ? ' *' : '' ) . '" /></div>',
        'email' => '<div class="col-md-4"><input class="form-control mb-30" id="email" name="email" ' . ( $html5 ? 'type="email"' : 'type="text"' ) . ' value="' . esc_attr( $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' placeholder="' . __( 'Your Email', 'videobuzz' ) . ( $req ? ' *' : '' ) . '" /></div>',
        'url' => '<div class="col-md-4"><input class="form-control mb-30" id="url" name="url" ' . ( $html5 ? 'type="url"' : 'type="text"' ) . ' value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" placeholder="' . __( 'Your Website', 'videobuzz' ) . '" /></div></div>',
    );

    return $fields;
}

add_filter( 'comment_form_defaults', 'videobuzz_comment_form' );

function videobuzz_comment_form( $args ) {

    $args['comment_field'] = '<div class="row"><div class="col-md-12"><textarea class="form-control mb-30" id="comment" name="comment" cols="45" rows="4" aria-required="true" placeholder="' . _x( 'Your Comment', 'noun', 'videobuzz' ) . ( ' *' ) . '"></textarea></div></div>';
    $args['class_submit'] = 'btn btn-default'; // since WP 4.1
    $args['comment_notes_before'] = ''; // Removes comment before notes
	$args['comment_notes_after'] = ''; // Removes comment after notes

    return $args;
}
