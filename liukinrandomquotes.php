<?php
/*
Plugin Name: Liukin Random Quotes
Plugin URI: https://pc-solucion.es
Description: Plugin to add random quotes of any topic to the Wordpress widget area.
Author: José Manuel Moreno
Version: 0.9
Author URI: https://github.com/PCSolucion
*/

function Activar(){
    global $wpdb;

    $sql ="CREATE TABLE IF NOT EXISTS {$wpdb->prefix}liukin_quotes(
    `QuoteId` INT NOT NULL AUTO_INCREMENT,
        `Quote` VARCHAR(80) NULL,
        PRIMARY KEY (`QuoteId`));";

     $wpdb->query($sql);     

}

register_activation_hook(__FILE__,'Activar');

function CrearMenu(){
    add_menu_page( 
        __( 'Custom Menu Title', 'textdomain' ),
        'Liukin Quotes',
        'manage_options',
        plugin_dir_path(__FILE__).'admin/quotes_list.php',
        '',
        plugins_url ('/liukin-random-quotes/admin/img/icon.png' ),
        6
    ); 
}
add_action('admin_menu','CrearMenu');



  /*  add_submenu_page(
        'sp_menu', //Parent slug
        'Ajustes', //Título Página
        'Ajustes', //Título del Menú
        'manage_options',
        'sp_menu_ajustes',
        'Submenu'
    );

}

function Submenu(){
    echo "<h1> Contenido del Submenu</h1>";
}

*/
