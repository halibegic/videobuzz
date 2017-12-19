<?php

// Show a post meta field in post responses https://github.com/WP-API/WP-API
function videobuzz_rest_api_alter() {

    register_api_field( 'post',
        'video_url',
        array(
            'get_callback'    => function( $data, $field, $request, $type ) {
                return get_post_meta( $data['id'], '_video_url', true );
            },
            'update_callback' => null,
            'schema'          => null,
        )
    );
}

add_action( 'rest_api_init', 'videobuzz_rest_api_alter' );
