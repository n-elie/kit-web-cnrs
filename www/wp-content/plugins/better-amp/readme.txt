=== Better AMP - WordPress Complete AMP ===
Contributors: betterstudio
Donate link: http://betterstudio.com/
Tags: amp,accelerated mobile pages, mobile theme, google amp
Requires at least: 3.0
Tested up to: 4.8.0
Stable tag: 4.8.0
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Complete AMP solution for WordPress. It supports everything in WP.

== Description ==

This plugin is most complete AMP ( Google Accelerated Mobile Pages) support for WordPress with supporting everything and created in speed mater and will load faster than all other AMP plugins.

[Online Demo](http://demo.betterstudio.com/publisher/amp-demo/) | [Support](https://github.com/better-studio/better-amp/)

All pages, posts, categories, tags, author page, search... are supported in BetterAMP and there is a lot of more options that you can use them in customizer with live preview.


Also BetterAMP supports RTL languages completely.

== Installation ==

This section describes how to install the plugin and get it working.

e.g.

1. Upload the plugin files to the `/wp-content/plugins/better-amp` directory, or install the plugin through the WordPress plugins screen directly.
1. Activate the plugin through the 'Plugins' screen in WordPress
1. Use the Settings->Better AMP screen to configure the plugin
1. (Make your instructions match the desired user flow for activating and installing your plugin. Include any steps that might be needed for explanatory purposes)


== Frequently Asked Questions ==

= What is the URL for AMP pages? =

You can see AMP version of your site with adding /amp/ to your site url: domain.com/amp/
All inner pages url will be started with same /amp/ in start of url: domain.com/amp/category/fashion
Also BetterAMP supports the /amp/ in the end of url to cover "Automatic AMP" plugin urls. 


== Screenshots ==
1. Homepage + Slider + Off-Canvas Navigation + Contact Info + Social Links
2. Post (Supports all post types) + Social Share + Share Count + Comments
3. Category Archive + Tag Archive + 2 type of listings
4. Search Result + Author Archive
5. Page (Contact page) + 404 page

== Changelog ==

= 1.7.0 =
- Fixed: RTL Ads issue. Thanks @Igor @Issa
- Fixed: WPML issues with AMP urls by excluding language subdirectories. Thanks @david.g

- Improved: "WPO Tweaks" plugin compatibility.
- Add: Pretty Links Plugin Compatibility


= 1.6.3 =
- Fixed: Validation issue about WordPress update.


= 1.6.2 =
- Improved: AMP codes improved.
- Fixed: Infinite redirect to AMP version in subdirectory wp installations.


= 1.6.1 =
- Improved: Style improved.

= 1.6.0 =
- Added: Full WPML support added to AMP.
- Added: Auto redirect to AMP for mobile visitors added (compatible with all cache plugins).
- Added: "Google Auto Ad" compatibility added.
- Added: New fields for adding custom code in head, body start and end of page.
- Added: Favicon support added.
- Added: Option to enable/disable header sticky feature.

- Improved: Admin panel usability improved.
- Improved: Codes improved.
- Improved: Will not redirect visitor to amp for "None AMP Link"  at footer! Thanks @Karl

- Fixed: Custom CSS was not after all css codes.

- Devs: @better-amp/template/body/start action added.
- Devs: Gulp.js file updated.

= 1.5.3 =
- Fixed: Third Party plugins a URL compatibility. Thanks @Karl
- Fixed: Content sanitizer improved to support special type of video tag.


= 1.5.2 =
- Improved: WooCommerce outdated functions updated.


= 1.5.1 =
- Added: Related posts added (6 algorithm to show related posts)
- Added: Comments will be shown in AMP.
- Added: Option to change share links to short/normal link.
- Added: CSS validator added for custom css and element css!
- Added: "WP Speed Grades" plugin compatibility added.
- Added: "WP-Optimize" plugin compatibility.
- Added: "Speed Booster Pack" plugin compatibility.
- Added: NextGEN Gallery Support
- Added: Comments pagination support added.

- Improved: Related posts moved after share buttons.

- Fixed: Incorrect AMP Author Avatar url (plugin conflict).
- Fixed: iFrames height not comes from iFrame tag!
- Fixed: Posts "hentry" class removed for better SEO results.
- Fixed: "Auto URL Convertor" field description fixed.
- Fixed: Exclude auto convert link only works for one pattern!
- Fixed: single featured images goes out of box in mobile.


= 1.4.0 =
- Added: AMP "Above The Fold" plugin compatibility added.
- Added: New option to exclude URL (and URL pattern) from AMP URL converter. You can use it to exclude subdirectories.

- Improved: AMP pages SEO improved.
- Improved: AMP validator improved. It's even smarter!

- Fixed: AMP ads rtl style fixed.
- Fixed: AMP minor warning fixed.


= 1.3.3 =
- Fixed: "Custom Permalinks" support added to BetterAMP.
- Fixed: "link" tags will be removed from BetterAMP pages body section.
- Fixed: Structured data validation issue with custom image logo (BetterAMP).
- Fixed: "Convert Plug" plugin validation issue fixed.


= 1.3.2 =
- Fixed: AMP post inline ads not working properly.
- Fixed: AMP PHP Warning. Thanks @isrgrajan


= 1.3.1 =
* Added: "WordPress Fastest Cache" plugin compatibility added.
* Improved: is_better_amp() works before template_redirect action.


= 1.3.0 =
* Added: Static homepage support added.
         You can chose a page to be shown for AMP homepage.

* Added: Complete "Structured Data" support added.
* Added: Complete YoastSEO compatibility added. No need to "Glue for Yoast SEO & AMP".
* Added: Ad Location: AMP middle of post content ad location.
* Added: "Ultimate Tweaker" plugin compatibility added.

* Improved: [video] shortcode compatibility improved.
* Improved: Facebook and Vimeo embeds compatibility improved.
* Improved: Improvement: Android title bar color will be same as BetterAMP theme color. Thanks @Antonio
* Improved: BetterAds min supported version changed to 1.9

* Fixed: BetterAMP will keeps elements inline styles.
         Creates custom class and adds style code into page style section automatically.

* Fixed: Incorrect homepage title when YoastSEO is active.
* Fixed: Style sanitizer improved to make 100% Google validated codes.
* Fixed: "WP Speed of Light" plugin compatibility.
* Fixed: PHP old versions fatal error.
* Fixed: AMP-IFRAME sanitizer improved to force protocol attribute.
* Fixed: Social share links protocol changed to HTTPS
* Fixed: Sanitizer value_url fixed to not print empty src!
* Fixed: Facebook Comments Plugin compatibility. Extra codes (js and markups) will be removed.
* Fixed: WooCommerce templates are overriding out of AMP! Thanks @ptsadmin
* Fixed: Post formats archive page shows 404 error. Thanks @kstockl


= 1.2.3 =
* Fixed: Thumbnail is not showing bug.


= 1.2.2 =
* Added: Video/Audio Featured support added to AMP.
* Added: AMP Youtube, Twitter, Facebook, Vimeo, Soundcloud, Vine and Instagram support added.
* Fixed: Thumbnail of static pages fixed to be responsive.


= 1.2.1 =
* Added: 'Better WordPress Minify' plugin Compatibility.
* Fixed: Search page style issue fixed.


= 1.2.0 =
* Added: AMP Smart style printing. 200% smaller CSS file
* Added: Option to show/hide share in pages.

* Improved: AMP content validator layer improved.
* Improved: Design.

* Fixed: Blockquote style.
* Fixed: Home slider RTL style fixed.
* Fixed: Whatsapp link not works.
* Fixed: AMP changed to amp for third-party plugins compatibility.
* Fixed: Only 1 gallery is showing.
* Fixed: RTL style fixed.


= 1.1.3 =
* Improved: WP-Rocket compatibility improved.
* Fixed: Auto validator fixed for iFrame tag attrs.
* Fixed: Share link changed to none-AMP version link.
* Fixed: Script tags making page invalid fixed.
* Fixed: Post image is not showing fixed.


= 1.1.2 =
* Improved: RTL style checked and fixed for all pages.
* Fixed: Large listing image style.
* Fixed: Subtitle wrong tag close.
* Fixed: Google Analytics not works.
* Fixed: Missing close tag for <head>


= 1.1.1 =
* Fixed: "WP Rocket" plugin lazy load compatibility.
* Fixed: "Lazy Load" plugin compatibility.
* Fixed: "Lazy Load XT" plugin compatibility.
* Fixed: Customizer page not showing correctly.
* Fixed: Scroll to end customizer page issue.


= 1.1.0 =
* 10 Ad Location added.
* Ad Location 1: After header (in all pages)
* Ad Location 2: Before post title
* Ad Location 3: After post title
* Ad Location 4: Above post content
* Ad Location 5: Post content ads (After X Paragraph)
* Ad Location 6: Below post content
* Ad Location 7: After comments in posts
* Ad Location 8: Footer (in all pages)
* Ad Location 9: After title in archive pages
* Ad Location 10: After X posts in archive pages

* Added: New level of AMP page validator added.
* This validator includes all Google AMP rules and will make your site
* content validated with 99% warranty!

* Added: WooCommerce support added (Shop, Product, Shop Categories, Shop tags and Cart page)
* Added: Attachment page support added.

* Added: Custom css field added.

* Improvement: Style file printing changed.

* Fixed: A lof of code fix and improvement.
* Fixed: undefined function fixed.
* Fixed: Url encode added to make sure shared url will work correctly in social networks in RTL languages.
* Fixed: Share link changed to pretty permalink.
* Fixed: rel=amphtml generating for non-amp pages fixed.
* Fixed: Showing BetterStudio themes mega menu disabled in AMP.
* Fixed: Social share sorter fixed in customizer.

= 1.0.4 =
* Fix: Fatal error in creating new post.

= 1.0.3 =
* Fix: The undefined index warning in admin.

= 1.0.2 =
* Fix: Search page issue
* Improvement: Style improved.

= 1.0.1 =
* Fix: Menu item is not showing. 

= 1.0 =
* Public release

== Upgrade Notice ==

= 1.0 =
Nothing
