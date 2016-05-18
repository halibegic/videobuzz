<?php

// Register meta box(es)
function videobuzz_add_meta_box() {

    add_meta_box(
        'videobuzz-meta',                   // $id
        __( 'Post Settings', 'videobuzz' ), // $title
        'videobuzz_meta_box_callback',      // $callback
        'post',                             // $page
        'normal',                           // $context
        'high'                              // $priority
  	);
}

add_action( 'add_meta_boxes', 'videobuzz_add_meta_box' );

// Meta box display callback
function videobuzz_meta_box_callback( $post ) {

    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return;
    }

	// Video URL
	$video_url = get_post_meta( $post->ID, '_video_url', true );

	// Featured
	$featured_post = get_post_meta( $post->ID, '_featured_post', true );
?>
    <table class="form-table">
        <tr>
            <th>
                <label for="_video_url"><?php _e( 'Video URL:', 'videobuzz' ); ?></label>
            </th>
            <td>
                <input type="text" class="widefat" name="_video_url" value="<?php echo $video_url ?>" /><br>
                <small><?php _e( 'Paste the URL from video sites like YouTube, Vimeo or Dailymotion.', 'videobuzz' ); ?></small>
            </td>
        </tr>
        <tr>
            <th>
                <label for="_featured_post"><?php _e( 'Featured Post:', 'videobuzz' ); ?></label>
            </th>
            <td>
                <input type="checkbox" name="_featured_post" value="1"<?php echo ($featured_post == '1' ? ' checked="checked"' : ''); ?> /><br>
                <small><?php _e( 'Check to display post inside carousel.', 'videobuzz' ); ?></small>
            </td>
        </tr>
    </table><!-- .form-table -->
<?php
}

// Save meta box content
function videobuzz_save_meta_box($post_id) {

    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return;
    }

    if ( isset( $_POST[ "_video_url" ] ) ) {
        update_post_meta( $post_id, "_video_url", $_POST[ "_video_url" ] );
    }

    if ( isset( $_POST[ "_featured_post" ] ) ) {
        update_post_meta( $post_id, "_featured_post", $_POST[ "_featured_post" ] );
    }
}

add_action( 'save_post', 'videobuzz_save_meta_box' );
