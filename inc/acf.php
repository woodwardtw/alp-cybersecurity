<?php
/**
 * UnderStrap ACF specific
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;



/** add additional classes / id to the facetwp-template div generated by a facetwp 
 ** layout template
 **/
add_filter( 'facetwp_shortcode_html', function( $output, $atts) {
    if ( $atts['template'] = 'example' ) { // replace 'example' with name of your template
    /** modify replacement as needed, make sure you keep the facetwp-template class **/
        $output = str_replace( 'class="facetwp-template"', 'class="facetwp-template row"', $output );
    }
    return $output; 
}, 10, 2 );


    //save acf json
        add_filter('acf/settings/save_json', 'acf_special_json_save_point');
         
        function acf_special_json_save_point( $path ) {
            
            // update path
            $path = get_stylesheet_directory() . '/acf-json'; //replace w get_stylesheet_directory() for theme
            
            
            // return
            return $path;
            
        }


        // load acf json
        add_filter('acf/settings/load_json', 'acf_special_json_load_point');

        function acf_special_json_load_point( $paths ) {
            
            // remove original path (optional)
            unset($paths[0]);
            
            
            // append path
            $paths[] = get_stylesheet_directory()  . '/acf-json';//replace w get_stylesheet_directory() for theme
            
            
            // return
            return $paths;
            
        }