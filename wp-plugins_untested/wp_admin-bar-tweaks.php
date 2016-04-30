<?php

// Remove links ftom admin bar
// ---- Some of the common ones ----
// my-account / my-account-with-avatar: the first link, to your account. Note that the ID here changes depending on if you have Avatars enabled or not.
// my-blogs: the ‘My Sites’ menu if the user has more than one site
// get-shortlink: provides a Shortlink to that page
// edit: link to Edit [content-type]
// new-content: the ‘Add New’ dropdown
// comments: the ‘Comments’ dropdown
// appearance: the ‘Appearance’ dropdown
// updates: the ‘Updates’ dropdown

// Disable the admin bar for all users
// add_filter( 'show_admin_bar', '__return_false');
/* Disable WordPress Admin Bar for all users but admins. */
show_admin_bar(false);

// Add links to wordpress admin bar
function mytheme_admin_bar_render() {
	global $wp_admin_bar;
        $wp_admin_bar->add_menu( array(
        'parent' => 'new-content',
        'id' => 'new_media',
        'title' => __('Media'),
        'href' => admin_url( 'media-new.php')
    ) );
}
add_action( 'wp_before_admin_bar_render', 'mytheme_admin_bar_render' );

