<?php

function include_jquery() {

	wp_deregister_script( 'jquery' );
	wp_enqueue_script( 'jquery', get_template_directory_uri() . '/src/js/jquery.min.js, ',
		1, true );
	add_action( 'wp_enqueue_scripts', 'jquery' );
}

add_action( 'wp_enqueue_scripts', 'include_jquery' );


function load_scripts() {

	wp_register_script( 'theme-script', get_template_directory_uri() . '/src/js/main.js', array( 'jquery' ), '1.0.0', true );
	wp_enqueue_script( 'theme-script' );

	wp_register_script( 'bootstrap', get_template_directory_uri() . '/src/js/bootstrap.js', array( 'jquery' ), '1.0.0', true );
	wp_enqueue_script( 'bootstrap' );
}

add_action( 'wp_enqueue_scripts', 'load_scripts' );

function load_stylesheets() {

	wp_register_style( 'bootstrap', get_template_directory_uri() . '/bootstrap.css',
		array(), false, 'all' );
	wp_enqueue_style( 'bootstrap' );

	wp_register_style( 'style', get_template_directory_uri() . '/style.css',
		array(), false, 'all' );
	wp_enqueue_style( 'style' );
}

add_action( 'wp_enqueue_scripts', 'load_stylesheets' );

require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';

/*
 *  Adding "menus" settings to dashboard
 *  Adding "thumbnails for post" settings to dashboard
 *
 *  Registering menus locations
 *
 *
*/

add_theme_support( 'menus' );

add_theme_support( 'post-thumbnails' );

register_nav_menus(

	array(
		'top-menu'    => __( 'Top Menu', 'golden-pothos' ),
		'Footer-menu' => __( 'Footer Menu', 'golden-pothos' )
	)
);

add_image_size( 'smallest', 300, 300, true );
add_image_size( 'largest', 700, 700, true );

function theme_setup() {
	$defaults = array(
		'height'      => 100,
		'width'       => 400,
		'flex-height' => true,
		'flex-width'  => true
	);
	add_image_size('theme-logo', 40, 40);
	add_theme_support('custom-logo', $defaults);
}

add_action('after_setup_theme', 'theme_setup');
