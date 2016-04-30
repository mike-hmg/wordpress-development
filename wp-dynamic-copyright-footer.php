<?php
/*
Plugin Name: PLUGINNAME
Plugin URI: http://#
Description: CUSTOM
Version: 1.0 BASE
Author: Mike Hart
Author URI: http://www.hmgsolutions.com
Comments:
# Call the function/value with 
	`<?php echo comicpress_copyright(); ?>`
*/



	function comicpress_copyright() {
	global $wpdb;
	$copyright_dates = $wpdb->get_results("
	SELECT
	YEAR(min(post_date_gmt)) AS firstdate,
	YEAR(max(post_date_gmt)) AS lastdate
	FROM
	$wpdb->posts
	WHERE
	post_status = 'publish'
	");
	$output = '';
	if($copyright_dates) {
	$copyright = "&copy; " . $copyright_dates[0]->firstdate;
	if($copyright_dates[0]->firstdate != $copyright_dates[0]->lastdate) {
	$copyright .= '-' . $copyright_dates[0]->lastdate;
	}
	$output = $copyright;
	}
	return $output;
	}

?>
