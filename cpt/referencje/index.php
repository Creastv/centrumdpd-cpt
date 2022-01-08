<?php
function crea_referencje_post_types() {

	$labels = array(
		'name'               => 'Referencje',
		'singular_name'      => 'Referencje',
		'menu_name'          => 'Referencje',
		'name_admin_bar'     => 'Referencje',
		'add_new'            => 'Dodaj',
		'add_new_item'       => 'Dodaj ',
		'new_item'           => 'Nowy ',
		'edit_item'          => 'Edytuj  ',
		'view_item'          => 'Zobacz  ',
		'all_items'          => 'Referencje',
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
		"rewrite"             => array( "slug" => "referencje", "with_front" => true ),
		'supports'      => array( 'title', 'page-attributes', 'thumbnail', 'editor', 'excerpt' ),
	);
    	register_post_type( 'referencje', $args );

}
add_action( 'init', 'crea_referencje_post_types' );

