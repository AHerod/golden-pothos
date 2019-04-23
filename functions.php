<?php

function load_stylesheets() {

	wp_register_style( 'bootstrap', get_template_directory_uri() . '/src/css/bootstrap.min.css',
		array(), false, 'all' );
	wp_enqueue_style( 'bootstrap' );

	wp_register_style( 'style', get_template_directory_uri() . '/style.css',
		array(), false, 'all' );
	wp_enqueue_style( 'style' );
}

add_action( 'wp_enqueue_scripts', 'load_stylesheets' );



function load_scripts() {

	wp_register_script( 'scripts', get_template_directory_uri() . '/src/js/main.js',
		'', 1, true );
	wp_enqueue_script( 'scripts' );
}

add_action( 'wp_enqueue_scripts', 'load_scripts' );




function include_jquery() {

	wp_deregister_script( 'jquery' );
	wp_enqueue_script( 'jquery', get_template_directory_uri() . '/src/js/jquery.min.js, ',
		1, true );
	add_action('wp_enqueue_scripts', 'jquery');
}

add_action('wp_enqueue_scripts', 'include_jquery');
