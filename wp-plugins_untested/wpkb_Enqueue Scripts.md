<?php

// ENQUEUE SCRIPTS
function wpb_adding_scripts() {
wp_register_script('my_amazing_script', plugins_url('amazing_script.js', __FILE__), array('jquery'),'1.1', true);
wp_enqueue_script('my_amazing_script');
}

add_action( 'wp_enqueue_scripts', 'wpb_adding_scripts' );  

// Explanation:
// We started by registering our script through the wp_register_script() function. This function accepts 5 parameters:
// $handle – Handle is the unique name of your script. Ours is called “my_amazing_script”
// $src – src is the location of your script. We are using the plugins_url function to get the proper URL of our plugins folder. Once WordPress finds that, then it will look for our filename amazing_script.js in that folder.
// $deps – deps is for dependency. Since our script uses jQuery, we have added jQuery in the dependency area. WordPress will automatically load jQuery if it is not being loaded already on the site.
// $ver – This is the version number of our script. This parameter is not required.
// $in_footer – We want to load our script in the footer, so we have set the value to be true. If you want to load the script in the header, then you would say false.

// ENQUEUE STYLES (CSS)
function wpb_adding_styles() {
wp_register_script('my_stylesheet', plugins_url('my-stylesheet.css', __FILE__));
wp_enqueue_script('my_stylesheet');
}

add_action( 'wp_enqueue_scripts', 'wpb_adding_styles' );  


// NOTE template_directory_uri() vs. plugins_url
// function wpb_adding_scripts() {
// wp_register_script('my_amazing_script', get_template_directory_uri() . '/js/amazing_script.js', array('jquery'),'1.1', true);
// wp_enqueue_script('my_amazing_script');
// }

// add_action( 'wp_enqueue_scripts', 'wpb_adding_scripts' );  
// 

?>
