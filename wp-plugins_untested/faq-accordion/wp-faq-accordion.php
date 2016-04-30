<?php
/** 
* plugin for FAQ Accordian

* CALL WITH SHORTCODE
* 	[faq_accordion]
**/


function accordion_shortcode() { 

// Registering the scripts and style
wp_register_style('wpb-jquery-ui-style', 'http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/themes/humanity/jquery-ui.css', false, null);
wp_enqueue_style('wpb-jquery-ui-style');
wp_register_script('wpb-custom-js', plugins_url('/accordion.js', __FILE__ ), array('jquery-ui-accordion'), '', true);
wp_enqueue_script('wpb-custom-js');

// Getting FAQs from WordPress FAQ Manager plugin's custom post type questions
$posts = get_posts(array(  
'posts_per_page' => 10,
'orderby' => 'menu_order',
'order' => 'ASC',
'post_type' => 'question',
));
	
// Generating Output 
$faq  .= '<div id="accordion">'; //Open the container
foreach ( $posts as $post ) { // Generate the markup for each Question
$faq .= sprintf(('<h3><a href="">%1$s</a></h3><div>%2$s</div>'),
$post->post_title,
wpautop($post->post_content)
);
}
$faq .= '</div>'; //Close the container
return $faq; //Return the HTML.
}
add_shortcode('faq_accordion', 'accordion_shortcode');