<?php
/*
Plugin Name: Liukin Random Quotes
Plugin URI: https://pc-solucion.es
Description: Plugin to add random quotes of any topic to the Wordpress widget area.
Author: José Manuel Moreno
Version: 0.9
Author URI: https://github.com/PCSolucion
*/
//Activate plugin creata table in DB if no exists
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


// Creating the widget 
class lrq_widget extends WP_Widget {
  
    function __construct() {
    parent::__construct(
      
    // Base ID of your widget
    'lrq_widget', 
      
    // Widget name will appear in UI
    __('Liukin Random Quotes', 'lrq_widget_domain'), 
      
    // Widget description
    array( 'description' => __( 'Widget for Liukin Random Quotes Plugin', 'lrq_widget_domain' ), ) 
    );
    }
      
    // Creating widget front-end
      
    public function widget( $args, $instance ) {
    $title = apply_filters( 'widget_title', $instance['title'] );
      
    
          


    // before and after widget arguments are defined by themes
    echo $args['before_widget'];
    if ( ! empty( $title ) )
    echo $args['before_title'] . $title . $args['after_title'];
      
    // This is where you run the code and display the output
    global $wpdb;
    // this adds the prefix which is set by the user upon instillation of wordpress
    $table_name = $wpdb->prefix . "liukin_quotes";
    // this will get the data from your table
    $retrieve_data = $wpdb->get_results( "SELECT Quote FROM $table_name order by rand() limit 1" );
    
            foreach ($retrieve_data as $retrieved_data){
                
                      echo $retrieved_data->Quote;?>
              
                <?php }
 
    echo $args['after_widget'];
    

    }
              
    // Widget Backend 
    public function form( $instance ) {
    if ( isset( $instance[ 'title' ] ) ) {
    $title = $instance[ 'title' ];
    }
    else {
    $title = __( 'New title', 'lrq_widget_domain' );
    }
    // Widget admin form
    ?>
    <p>
    <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
    <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
    </p>
    <?php 
    }
          
   
     
    // Class lrq_widget ends here
    } 
     
     
    // Register and load the widget
    function wpb_load_widget() {
        register_widget( 'lrq_widget' );
    }
    add_action( 'widgets_init', 'wpb_load_widget' );


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
