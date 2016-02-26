=== WP Image Utils ===
Contributors: benohead, amazingweb-gmbh
Donate link: http://benohead.com/donate/
Tags: accents, assign, automatic, attach, bulk, featured, featured image, featured images, image, images, media, regenerate, rename, seo, thumb, thumbnail, thumbnails, thumbs
Requires at least: 3.5
Tested up to: 4.0.1
Stable tag: 0.3.4
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Easier handling of images in posts. Automatically rename image files and assign featured images.

== Description ==

This plugins aims at making working with images in posts easier especially for users with less experience.

In order to avoid problems with broken image links or for SEO optimization of image filenames, you can configure it to automatically rename image files you upload:

* Remove accents, special characters and/or non-ascii characters
* Convert the filename to lowercase
* Replace the base name by an MD5 checksum of the original file name
* Add the post slug to filename
* Add the current date to filename
* Add the site URL to filename, including or excluding the port number, Top Level Domain (e.g. .com)

You can have this performed for all files or define for specific extensions (e.g. only .gif files).

Additionally, you also have access to this function in the media library as a bulk operation or as an action for individual images.
When fixing names from the media library, this plugin will also automatically update posts referencing this image.

If your theme or some pages on your sites rely on some of the posts to have a featured image by your authors sometimes forget to set one, you can have the first image in the post be automatically selected as featured image if none was explicitly selected.

To handle existing posts or if you do not want to have it done automatically but do it once in a while, you can also bulk update the posts setting the first image in the post as featured image for posts which have no featured image. You can have it performed based on categories, tags, authors or post types.

Both the automatic image featuring and the bulk featuring support the following criteria so that you can limit it to the parts of your site where you have to have featured images:

* Categories
* Tags
* Authors
* Post types

It is also possible in the media library to regenerate thumbnails for one or for multiple images.

Translations are currently available in English, German, French and Portuguese. Please contact me, if you can help getting this plugin translated in more languages.

== Installation ==

1. Upload the folder `wp-image-utils` to the `/wp-content/plugins/`
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Setup the filename renaming and featuring of images

== Frequently Asked Questions ==

= How can I contact you with a complaint, a question or a suggestion? =
Send an email to henri.benoit@gmail.com

= How do I rename images which are already in my media library ? =
Go to the media library and either click on "Fix name" on the individual images or select multiple images and select the bulk action "Fix name".

== Screenshots ==

1. Settings for the image file renaming

2. Settings for the automatic featuring of images

3. Settings for the bulk featuring of images

== Changelog ==

= 0.3.4 =

* Fixed further strict PHP warnings.

= 0.3.3 =

* Fixed warning about prepare_items.

= 0.3.2 =

* Translation files were actually missing. Fixed.

= 0.3.1 =

* Fixed broken bulk feature image.
* Added sortable featured image column in post/page admin

= 0.3 =

* Added regeneration of thumbnails.
* Added German translation.
* Added French translation.
* Added Portuguese translation (special thanks to Valdir Luiz Jr for the translation).

= 0.2.5 =

* Improved handling of error conditions.

= 0.2.4 =

* Made sure that renaming only occurs for images.

= 0.2.3 =

* Removed widget not belonging to this plugin.

= 0.2.2 =

* Store original filename on upload.

= 0.2.1 =

* Use original filename to compute new one instead of current file name.

= 0.2 =

* Integrates in the media library.

= 0.1 =

* First version.

== Upgrade Notice ==

n.a.
