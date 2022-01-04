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

