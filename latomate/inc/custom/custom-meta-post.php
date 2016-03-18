<?php
/**
 * Created by IntelliJ IDEA.
 * User: oscar
 * Date: 17.03.16
 * Time: 14:13
 */

function custom_meta_slider() {
    $prefix = '_meta_slider_';

    $cmb_news = new_cmb2_box( array(
        'id'            => $prefix . 'metabox',
        'title'         => __( 'Information URL', 'cmb2' ),
        'object_types'  => array( 'slider', ),
    ) );

    $cmb_news->add_field( array(
        'name' => __( 'Website URL', 'cmb2' ),
        'id'   => $prefix . 'url',
        'type' => 'text_url',
    ) );

}

function custom_meta_module() {
    $prefix = '_meta_module_';

    $cmb_module = new_cmb2_box( array(
        'id'            => $prefix . 'metabox',
        'title'         => __( "Plus d'informations", 'cmb2' ),
        'object_types'  => array( 'module', ),
    ) );

    $cmb_module->add_field( array(
        'name' => __( 'Activer bouton', 'cmb2' ),
        'desc' => __( 'voir les détails', 'cmb2' ),
        'id'   => $prefix . 'checkbox',
        'type' => 'checkbox',
    ) );

    $cmb_module->add_field( array(
        'name' => __( 'Website URL', 'cmb2' ),
        'id'   => $prefix . 'url',
        'type' => 'text_url',
    ) );

}