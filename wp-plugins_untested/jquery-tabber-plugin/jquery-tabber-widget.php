<?php
/* Plugin Name: WPBeginner jQuery Tabber Widget
Plugin URI: http://www.wpbeginner.com
Description: A simple jquery tabber widget.
Version: 1.0
Author: WPBeginner
Author URI: http://www.wpbeginner.com
License: GPL2
*/

// creating a widget
class WPBTabberWidget extends WP_Widget {

function WPBTabberWidget() {
		$widget_ops = array(
		'classname' => 'WPBTabberWidget',
		'description' => 'Simple jQuery Tabber Widget'
);
$this->WP_Widget(
		'WPBTabberWidget',
		'WPBeginner Tabber Widget',
		$widget_ops
);
}
function widget($args, $instance) { // widget sidebar output

function wpb_tabber() { 

// Now we enqueue our stylesheet and jQuery script

wp_register_style('wpb-tabber-style', plugins_url('wp-tabber.css', __FILE__));
wp_register_script('wpb-tabber-widget-js', plugins_url('wpb-tabber.js', __FILE__), array('jquery'));
wp_enqueue_style('wpb-tabber-style');
wp_enqueue_script('wpb-tabber-widget-js');

// Creating tabs you will be adding you own code inside each tab
?>

<ul class="tabs">
<li class="active"><a href="#tab1">Tab 1</a></li>
<li><a href="#tab2">Tab 2</a></li>
<li><a href="#tab3">Tab 3</a></li>
</ul>

<div class="tab_container">

<div id="tab1" class="tab_content">
<?php 
// Enter code for tab 1 here. 
?>
</div>

<div id="tab2" class="tab_content" style="display:none;">
<?php 
// Enter code for tab 2 here. 
?>
</div>

<div id="tab3" class="tab_content" style="display:none;">
<?php 
// Enter code for tab 3 here. 
?>
</div>

</div>

<div class="tab-clear"></div>

<?php

}

extract($args, EXTR_SKIP);
// pre-widget code from theme
echo $before_widget; 
$tabs = wpb_tabber(); 
// output tabs HTML
echo $tabs; 
// post-widget code from theme
echo $after_widget; 
}
}

// registering and loading widget
add_action(
'widgets_init',
create_function('','return register_widget("WPBTabberWidget");')
);
?>