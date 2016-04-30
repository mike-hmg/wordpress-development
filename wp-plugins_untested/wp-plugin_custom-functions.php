<?php
/*
Plugin Name: Site Plugin for example.com
Description: Site specific code changes for example.com
*/
/* Start Adding Functions Below this Line */



?>

<? php

// Set a default color scheme for new users
function set_default_admin_color($user_id) {

    $args = array(

        'ID' => $user_id,

        'admin_color' => 'sunrise'

    );

    wp_update_user( $args );

}

add_action('user_register', 'set_default_admin_color');

// Stop users from changing their color profiles
if ( !current_user_can('manage_options') )
remove_action( 'admin_color_scheme_picker', 'admin_color_scheme_picker' );


// Creating shortcodes (adsense example)
function get_adsense($atts) {
	return '<script type="text/javascript"><!--
google_ad_client = "pub-546321545321589";
/* 468x60, created 9/13/10 */
google_ad_slot = "54321565498";
google_ad_width = 468;
google_ad_height = 60;
//-->
</script>
<script type="text/javascript"
src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script>
';
}
add_shortcode('adsense', 'get_adsense'); // Call with `[adsense]`

// Set styles for `Contact Form 7`
div.wpcf7 { 
background-color: #fbefde;
border: 1px solid #f28f27;
padding:20px;
}
.wpcf7 input[type="text"],
.wpcf7 input[type="email"],
.wpcf7 textarea {
background:#725f4c;
color:#FFF;
font-family:lora, sans-serif; 
font-style:italic;    
}
.wpcf7 input[type="submit"],
.wpcf7 input[type="button"] { 
background-color:#725f4c;
width:100%;
text-align:center;
text-transform:uppercase;
}

// MORE SPECIFIC Contact Form 7 Styling
// div#wpcf7-f201-p203-o1{ 
// background-color: #fbefde;
// border: 1px solid #f28f27;
// padding:20px;
// }
// #wpcf7-f201-p203-o1 input[type="text"],
// #wpcf7-f201-p203-o1 input[type="email"],
// #wpcf7-f201-p203-o1 textarea {
// background:#725f4c;
// color:#FFF;
// font-family:lora, "Open Sans", sans-serif; 
// font-style:italic;    
// }
// #wpcf7-f201-p203-o1 input[type="submit"],
// #wpcf7-f201-p203-o1 input[type="button"] { 
// background-color:#725f4c;
// width:100%;
// text-align:center;
// text-transform:uppercase;
}

// add a link to the WP Toolbar
function custom_toolbar_link($wp_admin_bar) {
	$args = array(
		'id' => 'wpbeginner',
		'title' => 'Search WPBeginner', 
		'href' => 'https://www.google.com:443/cse/publicurl?cx=014650714884974928014:oga60h37xim', 
		'meta' => array(
			'class' => 'wpbeginner', 
			'title' => 'Search WPBeginner Tutorials'
			)
	);
	$wp_admin_bar->add_node($args);
}
add_action('admin_bar_menu', 'custom_toolbar_link', 999);

/*
* add a group of links under a parent link
*/

// Add a parent shortcut link

function custom_toolbar_link($wp_admin_bar) {
	$args = array(
		'id' => 'wpbeginner',
		'title' => 'WPBeginner', 
		'href' => 'https://www.wpbeginner.com', 
		'meta' => array(
			'class' => 'wpbeginner', 
			'title' => 'Visit WPBeginner'
			)
	);
	$wp_admin_bar->add_node($args);

// Add the first child link 
	
	$args = array(
		'id' => 'wpbeginner-guides',
		'title' => 'WPBeginner Guides', 
		'href' => 'http://www.wpbeginner.com/category/beginners-guide/',
		'parent' => 'wpbeginner', 
		'meta' => array(
			'class' => 'wpbeginner-guides', 
			'title' => 'Visit WordPress Beginner Guides'
			)
	);
	$wp_admin_bar->add_node($args);

// Add another child link
$args = array(
		'id' => 'wpbeginner-tutorials',
		'title' => 'WPBeginner Tutorials', 
		'href' => 'http://www.wpbeginner.com/category/wp-tutorials/',
		'parent' => 'wpbeginner', 
		'meta' => array(
			'class' => 'wpbeginner-tutorials', 
			'title' => 'Visit WPBeginner Tutorials'
			)
	);
	$wp_admin_bar->add_node($args);

// Add a child link to the child link

$args = array(
		'id' => 'wpbeginner-themes',
		'title' => 'WPBeginner Themes', 
		'href' => 'http://www.wpbeginner.com/category/wp-themes/',
		'parent' => 'wpbeginner-tutorials', 
		'meta' => array(
			'class' => 'wpbeginner-themes', 
			'title' => 'Visit WordPress Themes Tutorials on WPBeginner'
			)
	);
	$wp_admin_bar->add_node($args);

}

add_action('admin_bar_menu', 'custom_toolbar_link', 999);

// Move Admin bar to the bottom
function stick_admin_bar_to_bottom_css() {
        echo "
        <style type='text/css'>
        html {
                padding-bottom: 28px !important;
        }    
        body {
                margin-top: -28px;
        }
        #wpadminbar {
                top: auto !important;
                bottom: 0;
        }
        #wpadminbar .quicklinks .menupop ul {
                bottom: 28px;
        }
        </style>
        ";
}

add_action('admin_head', 'stick_admin_bar_to_bottom_css');
add_action('wp_head', 'stick_admin_bar_to_bottom_css');

// Display users IP Address
function get_the_user_ip() {
if ( ! empty( $_SERVER['HTTP_CLIENT_IP'] ) ) {
//check ip from share internet
$ip = $_SERVER['HTTP_CLIENT_IP'];
} elseif ( ! empty( $_SERVER['HTTP_X_FORWARDED_FOR'] ) ) {
//to check ip is pass from proxy
$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
} else {
$ip = $_SERVER['REMOTE_ADDR'];
}
return apply_filters( 'wpb_get_ip', $ip );
}

add_shortcode('show_ip', 'get_the_user_ip');

// Enable shortcodes in sidebar widgets
add_filter('widget_text', 'do_shortcode');


/* Stop Adding Functions Below this Line */
?>