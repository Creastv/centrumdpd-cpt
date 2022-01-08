<?php
/*
* Plugin Name: Centrum Dobrej Praktyki Dystrybucyjnej - Custom Post Types
* Description: Custome post Team | Services.
* Plugin URI: https://creastv.pl/
* Version: 1.0
* Author: ITHolding
* Author URI: https://creastv.pl/
* License: GPLv2 or later
* Text Domain: crea
*/

require_once plugin_dir_path( __FILE__ ) . 'cpt/zespol/index.php';
require_once plugin_dir_path( __FILE__ ) . 'cpt/oferta/index.php';
require_once plugin_dir_path( __FILE__ ) . 'cpt/referencje/index.php';

add_filter( 'wpseo_breadcrumb_links', 'yoast_seo_breadcrumb_append_link' );
  function yoast_seo_breadcrumb_append_link( $links ) {
	global $post;
	if ( is_singular( array( 'oferta') ) ) {
		$breadcrumb[] = array(
			'url' => site_url( '/oferta/' ),
			'text' => 'Oferta',
		);
		array_splice( $links, 1, -2, $breadcrumb );
	}
    if (is_singular( array( 'zespol') )) {
		$breadcrumb[] = array(
			'url' => site_url( '/zespol/' ),
			'text' => 'Zespół',
		);
		array_splice( $links, 1, -2, $breadcrumb );
	}
	 if (is_singular( array( 'referencje') )) {
		$breadcrumb[] = array(
			'url' => site_url( '/referencje/' ),
			'text' => 'Referencje',
		);
		array_splice( $links, 1, -2, $breadcrumb );
	}
	return $links;
  }
  