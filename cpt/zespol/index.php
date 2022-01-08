<?php
function crea_team_post_types() {

	$labels = array(
		'name'               => 'Zespół',
		'singular_name'      => 'Zespół',
		'menu_name'          => 'Zespół',
		'name_admin_bar'     => 'Zespół',
		'add_new'            => 'Dodaj',
		'add_new_item'       => 'Dodaj ',
		'new_item'           => 'Nowy ',
		'edit_item'          => 'Edytuj  ',
		'view_item'          => 'Zobacz  ',
		'all_items'          => 'Zespół',
		'search_items'       => 'Szukaj',
		'parent_item_colon'  => 'Parent :',
		'not_found'          => 'Nie znaleziono',
		'not_found_in_trash' => 'Nie znaleziono',
		
	);
	$args = array( 
		'public' => true,
		'has_archive' => false,
		'show_in_rest' => true,
		'hierarchical'      => true,
		'menu_icon'     => plugin_dir_url( __FILE__ ) . 'img/admin-ico.png',
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'publicly_queryable' => true,
		// 'rewrite' => array('slug' => 'case-study',  'with_front' => false,),
		"rewrite"             => array( "slug" => "zespol", "with_front" => true ),
		'supports'      => array( 'title', 'page-attributes', 'thumbnail', 'editor' ),
	);
    	register_post_type( 'zespol', $args );

}
add_action( 'init', 'crea_team_post_types' );


// Template setings
// function load_team_template( $template ) {
//     global $post;
//     if ( 'zespol' === $post->post_type && locate_template( array( 'single-team.php' ) ) !== $template ) {
//         return plugin_dir_path( __FILE__ ) . 'single-team.php';
//     }
//     return $template;
// }
// add_filter( 'single_template', 'load_team_template' );

/*
**** Register meta box(es) ****
*/
function crea_register_meta_boxes() {
	add_meta_box( 'mi-meta-box-id', __( 'Dodatkowe informacje', 'crea' ), 'crea_mi_display_callback', 'zespol' );
}
add_action( 'add_meta_boxes', 'crea_register_meta_boxes' );

/*
**** Meta box display callback ****
*/
function crea_mi_display_callback( $post ) {
	
	$position = get_post_meta( $post->ID, 'position', true );
	$linkiedin = get_post_meta( $post->ID, 'linkiedin', true );
	$phone = get_post_meta( $post->ID, 'phone', true );
	$email = get_post_meta( $post->ID, 'email', true );

	wp_nonce_field( 'mi_meta_box_nonce', 'meta_box_nonce' );

	echo '<p><label for="position_label">Work position</label> <input type="text" name="position" id="position" value="'. $position .'" /></p>';
	echo '<p><label for="linkiedin_label">Linkiedin</label> <input type="text" name="linkiedin" id="linkiedin" value="'. $linkiedin .'" /></p>';
	echo '<p><label for="phone_label">Phone No:</label> <input type="text" name="phone" id="phone" value="'. $phone .'" /></p>';
	echo '<p><label for="email_label">E-mail:</label> <input type="text" name="email" id="email" value="'. $email .'" /></p>';
}

/*
**** Save meta box content ****
*/
function crea_save_meta_box( $post_id ) {

	if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;

	if( !isset( $_POST['meta_box_nonce'] ) || !wp_verify_nonce( $_POST['meta_box_nonce'], 'mi_meta_box_nonce' ) ) return;

	if( !current_user_can( 'edit_post' ) ) return;

	if( isset( $_POST['position'] ) )
	update_post_meta( $post_id, 'position', $_POST['position'] );

	if( isset( $_POST['linkiedin'] ) )
	update_post_meta( $post_id, 'linkiedin', $_POST['linkiedin'] );

	if( isset( $_POST['phone'] ) )
	update_post_meta( $post_id, 'phone', $_POST['phone'] );

	if( isset( $_POST['email'] ) )
	update_post_meta( $post_id, 'email', $_POST['email'] );
}
add_action( 'save_post', 'crea_save_meta_box' );