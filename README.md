# WP templates

WP NOTES:

Config
Add to config file when publishing
- define(‘WPHOME’, ‘http://....’ );
- define(‘WPSITEURL’, ‘http://....’);
debug	mode

Add Plugins
-Search and Replace to clean up url for publishing
-Custom Post Type and Advanced Custom Fields
-WP SEO by Yoast
-Backup WP
-JetPack - social sharing
-Lightbox plus colorbox - photo gallery plugin
-Black Studio Tiny MCE - wywyg text editor
-Display Widgets - widget organiser
-Google Analytics + dashboard by Yoast
-Admin Menu Editor - restrick accès on admin area
-Theme-check for testing
-Black Studio TinyMCE Widget for visual wysiwyg editor
-Bootstrap shortcakes
-Ninja Form
-Walker class for extended bootstrap navigation
https://github.com/wp-bootstrap/wp-bootstrap-navwalker

page.php - controls all static page files

function.php - will be loaded from the parent and the chip template
 - It is used to register widgets and call dynamicsidebar() to display it where want to place(header,etc)
 - Menu locations can be registered. register_nav menu()

Template Tags
check codes for full list
