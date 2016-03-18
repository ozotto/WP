<?php
/**
 * Created by IntelliJ IDEA.
 * User: oscar
 * Date: 17.03.16
 * Time: 13:15
 */

function create_post_type_slider(){

    register_post_type( 'slider',
        array(
            'labels' => array(
                'name' => __( 'Slider' ),
                'singular_name' => __( 'Slider' )
            ),
            'public' => true,
            'has_archive' => true,
            'menu_icon' => 'dashicons-images-alt',
            'show_in_menu' => false,
            'supports' => array('title', 'thumbnail', 'excerpt', 'page-attributes', ),

        )
    );

}

function create_post_type_description(){

    register_post_type( 'description',
        array(
            'labels' => array(
                'name' => __( 'Description' ),
                'singular_name' => __( 'Description' )
            ),
            'public' => true,
            'has_archive' => true,
            'menu_icon' => 'dashicons-images-alt',
            'show_in_menu' => false,
            'supports' => array('title', 'editor', 'thumbnail', 'page-attributes', ),

        )
    );

}

function create_post_type_module(){

    register_post_type( 'module',
        array(
            'labels' => array(
                'name' => __( 'Modules' ),
                'singular_name' => __( 'module' )
            ),
            'public' => true,
            'has_archive' => true,
            'menu_icon' => 'dashicons-images-alt',
            'show_in_menu' => false,
            'supports' => array('title', 'editor', 'thumbnail', 'page-attributes', ),

        )
    );

}