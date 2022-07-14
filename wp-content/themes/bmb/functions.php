<?php

    /**
     * 
     * Template Name: functions.php
     * 
     *  
     */ 
    
    function fn_theme_scripts(){
        /** include style file*/
        // adding font awesome icon file

        // wp_enqueue_style('fontawesome',get_template_directory_uri().'/assets/vendor/bootstrap/css/bootstrap.min.css');
       

        
		// adding functions js
        // wp_enqueue_style('purecounter',get_template_directory_uri().'/assets/vendor/purecounter/purecounter.js', array());
       
		
        // custom stylesheet
        wp_enqueue_style('custom_style',get_stylesheet_uri());

    }

    add_action('wp_enqueue_scripts','fn_theme_scripts');

    //adding new feature to wordpress theme
    function fn_theme_supports(){
        add_theme_support('title-tag');
        add_theme_support('post-thumbnails');
        add_theme_support('html5',array('search-form'));
        add_theme_support('custom-logo');
    }

    add_action('after_setup_theme','fn_theme_supports');


    // register navigation menu
    function fn_nav_menu(){
        register_nav_menus(array(
            'primary-menu'=>__('Primary Menu','text_domain'),
            'footer-menu'=>__('Footer Menu','text_domain')
        ));
    }
    
    add_action('init','fn_nav_menu');

    function add_link_atts($atts){
        $atts['class']='';
        return $atts;
    }

    add_filter('nav_menu_link_attributes','add_link_atts');

// 	function wpa_scripts() {
// 		wp_enqueue_script(
// 			'wpa_script',
// 			get_template_directory_uri() . '/js/script.js',
// 			array('jquery'),
// 			null,
// 			true
// 		);
// 		$script_data = array(
// 			'image_path' => get_template_directory_uri() . '/images/'
// 		);
// 		wp_localize_script(
// 			'wpa_script',
// 			'wpa_data',
// 			$script_data
// 		);
// 	}
// 	add_action( 'wp_enqueue_scripts', 'wpa_scripts' );
	function wpa_scripts() {
		wp_register_script( 'my-script', 'myscript_url' );
		wp_enqueue_script( 'my-script' );
		$translation_array = array( 'templateUrl' => get_stylesheet_directory_uri() );
		//after wp_enqueue_script
		wp_localize_script( 'my-script', 'object_name', $translation_array );
	}
	add_action( 'wp_enqueue_scripts', 'wpa_scripts' );
	
?>