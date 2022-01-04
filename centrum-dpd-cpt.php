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


// .css and .js register
// add_action('init', 'register_script');
// function register_script() {
//     wp_register_script( 'custom_jquery', plugins_url('/js/custom-jquery.js', __FILE__), array('jquery'), '2.5.1' );
//     wp_register_style( 'new_style', plugins_url('/css/cpt-team.css', __FILE__), false, '1.0.0', 'all');
// }

// add_action('wp_enqueue_scripts', 'enqueue_style');
// function enqueue_style(){
//    wp_enqueue_script('custom_jquery');
//    wp_enqueue_style( 'new_style' );
// }