=== Featured Images in RSS for Mailchimp & Other Email ===
Contributors: 5starplugins
Donate link: https://5starplugins.com/
Tags: featured images in rss, rss images, featured image, thumbnails, images in rss, mailchimp, mailchimp rss, rss campaigns, infusionsoft, hubspot, constant contact, content marketing, marketing automation
Requires at least: 2.9
Tested up to: 5.5
Requires PHP: 5.6
Stable tag: trunk
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Send images to RSS instantly for free. Output blog photos to Mailchimp emails, Infusionsoft, Hubspot, Constant Contact, Zoho, Bloglovin’, Feedly and more. 

== Description ==

**Updating to v1.5.4 might be blocked because v1.5.3 thinks it needs a Premium license, this is fixed in v1.5.4 - simply Deactivate the plugin, if you've opted-in then click Skip & Deactivate on the pop-up survey, and then the Update link will appear. Apologies for the trouble.**

Get images in your RSS feed instantly for free. Output blog featured photos to Mailchimp RSS emails, Infusionsoft, Hubspot, Constant Contact, Zoho, Feedburner, Bloglovin’, Feedly, and other services that use RSS feed data. A trusted plugin, developed in California with over 30,000 active installs and 68+ five star reviews. We actively answer every support forum thread.

Featured Images In RSS was built for content marketers. Easy set-up with minimal configuration to get up and running in minutes.

This plugin is forever free. Upgrade to Premium to unlock powerful features for content marketing. Developed and supported in the United States by 5 Star Plugins.

Free Features:

* Can be used in any marketing automation service.
* Select Featured Image Size: thumbnail, medium, large, any theme-specific sizes, or full size
* Select Image Position: left above text, left text wrap, right text wrap, or centered above text
* Padding: Instantly set the spacing between the image and the body text.
* Feedly: Supports webfeedsFeaturedVisual class name on image HTML.
* Free support through the WordPress Support Forum.
* Plugin updates with free version new features, fixes and security patches.

> Premium Upgrade Features

> Enjoy a 14-day free trial no credit card required. Check out this full suite of image customization features for professional marketing.

> * Tech Support: Expert support in the U.S. to help get everything working and looking great.
> * Media and Enclosure Tags: Some services require it and it allows you to custom design email templates.
> * Use Media tag images only: Fix duplicate images issues when using image tags for advanced template designs.
> * Custom Image Sizes: Completely customize the size of image display for RSS feeds.
> * Feature Body Image: No featured photos set? No problem. Use the first photo from the body of posts.
> * Disable Responsive Images: Helps fix services that have issues with the responsive image code, like Mailchimp’s Preview.
> * Exclude Categories: Exclude unwanted categories not meant to be included in the RSS feed, like Homepage or Featured categories.
> * Custom Content in Feeds: Add custom content (text or HTML) before or after the post such as backlinks or ads.
> * Publish Delay: Add a time buffer to new posts from instantly hitting the RSS feed to safeguard from typos or accidents.
> * Premium plugin updates with new features, fixes and security patches.

**Real Testimonials**

> "Must-have for content marketing. This is a super easy way to customize the featured images that appear in the RSS feed – no more ugly pre-populated visuals. I especially love the Mailchimp integration. It’s great to have this much control over our content. Image is everything!" - @morganmariequinn [Read the review](https://wordpress.org/support/topic/must-have-for-content-marketing/)

> "Must Have for Featured Image Based Themes & MailChimp Users. For several years my WordPress theme has used featured images at the head of all my posts. The problem is, then, when feeding my RSS feed to MailChimp, that featured image at the head of the post is lost. Sometimes the image is highly crucial to the post (not to mention more enjoyable), so this plugin is a life saver. A must have!" - @ericdye [Read the review](https://wordpress.org/support/topic/must-have-for-featured-image-based-themes-mailchimp-users/)

> "It just works – lovely! Great with MailChimp. I installed this plugin, changed the (very simple) settings and the featured images started appearing in my MailChimp campaigns straight away – perfect!" - @barn2media [Read the review](https://wordpress.org/support/topic/it-just-works-lovely-great-with-mailchimp/)

We promise you'll love the features this plugin provides for your content marketing automation!

**Need help** or wish it did something else as well? Use the [Support](http://wordpress.org/support/plugin/featured-images-for-rss-feeds) tab to submit your thoughts.

**Love this plugin?** Please submit a [rating and review](https://wordpress.org/support/plugin/featured-images-for-rss-feeds/reviews/?filter=5#new-post), I'd appreciate your praise. (Have an issue? Post to the support forums before leaving a bad review.)

== Installation ==

Go to Plugins -> Add New, search for the name of the plugin, and then find it in the list, and click Install Now, then Activate. Configure the plugin options as desired.

Or use the manual upload method if you have a plugin ZIP file:

1. Click the Upload option. Choose the plugin zip file. Click the Upload button.
2. Activate the plugin.
3. Configure the plugin options as desired.

== Frequently Asked Questions ==

= SUPPORT =
Visit the WordPress support forum here for free plugin support only. Premium support is provided through our Premium Knowledge Center and by contacting us from your WordPress Dashboard plugin settings page.

= How do I use it? Where do I go to edit plugin options? =
After successful installation and activation, go to “Featured Images” settings in your WordPress Dashboard. Look for it in the black left sidebar. This is where you can configure this plugin and find links to support.

= Images are not aligning or resizing properly =
Please note that the alignment and sizing CSS is sometimes stripped out depending on the RSS reader/service you’re using it with, and may require custom CSS inside the service you’re using (Mailchimp, etc)

[View an example of Mailchimp RSS Template Code](https://wordpress.org/support/topic/example-mailchimp-rss-template-code)

[Need to center your RSS image in Mailchimp?](https://wordpress.org/support/topic/image-center-on-rss-mailchimp-campaign)

The Premium version now includes media and image tag support, which may work better with your RSS service.

= No images showing in your RSS feed? =
Always check your raw feed first. Validate your feed is working here [https://validator.w3.org/feed/](https://validator.w3.org/feed/) and you can use other services to preview what the feed displays visually.

If the images are NOT showing up in your raw feed with our plugin installed and activated, please visit the forum to submit the issue if you use the free version or contact our Premium support page if upgraded.

If they are showing in the raw feed, then it's a reader service issue and not a feed issue with this plugin.

Be sure your site is NOT blocking image requests that do not have the referrer domain set in the request header, usually an option or setting labeled "protect images" or "disable image hotlinking". If there's not an obvious plugin cause of this, it could be a CDN like Cloudflare, or some lines like these in your .htaccess file:
RewriteCond %{HTTP_REFERER} !^https://domain.com/.*$ [NC]
RewriteCond %{HTTP_REFERER} !^https://www.domain.com/.*$ [NC]
RewriteRule .*\.(jpg|jpeg|gif|png|bmp)$ - [F,NC]

= Images ARE showing in RSS but not showing in Mailchimp =
First, make sure the RSS feed URL set-up in Mailchimp is correct and validated. Validate your feed is working here [https://validator.w3.org/feed/](https://validator.w3.org/feed/)

Please see our [Mailchimp specific help](https://support.5starplugins.com/article/23-i-can-t-view-images-in-my-newsletter) if all of the above is correct and you still can’t view the images in your Mailchimp email. 

= Images ARE showing in RSS but not showing in Hubspot =
First, make sure the RSS feed URL set-up in Hubspot is correct and validated. Validate your feed is working here [https://validator.w3.org/feed/](https://validator.w3.org/feed/)

If images are showing up in your feed data, then it may be a Hubspot specific setting, and you may need to enable images in the Hubspot feed reader, as mentioned in these Hubspot articles:

How-to set-up an RSS to email in Hubspot:
[https://knowledge.hubspot.com/blog-user-guide-v2/how-to-set-up-an-rss-to-email-blog-subscription-for-an-external-blog](https://knowledge.hubspot.com/blog-user-guide-v2/how-to-set-up-an-rss-to-email-blog-subscription-for-an-external-blog)

Hubspot RSS module product update: 
[http://designers.hubspot.com/blog/product-update-new-rss-module-images](http://designers.hubspot.com/blog/product-update-new-rss-module-images)

Hubspot RSS email styling:
[https://knowledge.hubspot.com/articles/kcs_article/email/can-i-style-the-main-body-content-of-my-rss-email](https://knowledge.hubspot.com/articles/kcs_article/email/can-i-style-the-main-body-content-of-my-rss-email)

If it's still not working, it’s best to contact Hubspot support to see if they can help with how to link up the image in the RSS description field, or the image in the Media tag, to the RSS item URL.

= Double images showing =
You might have both the featured image set, as well as a body image inserted. Delete the body image to have one image show up. If your theme doesn’t show the featured image, and you’re adding a body image so it shows, then either change themes or customize the theme so it displays the featured image – it can be easy or hard, depending on how the theme is coded and styled. 

This issue can occur in some services when using advanced design features. Our Premium version fix duplicate images issues with an option to use Media tag images only. It can fix duplicate images issues when using image tags for advanced template designs.

Still having trouble with double images? Visit our forum thread for free version users: [https://wordpress.org/support/topic/2-images/](https://wordpress.org/support/topic/2-images/)

= How does the plugin work with Mailchimp? =
There are two ways our plugin works within Mailchimp, the free way and the Premium way.

The free way: It prepends the <description> part of the RSS feed with the image URL, and so in Mailchimp using the RSSITEM:CONTENT or RSSITEM:CONTENT_FULL merge tag will show the image successfully, with two caveats: one, if your website is not on https, Mailchimp's Preview Mode has an issue with the images, but a test or real email send should work fine. And two, you may need some custom CSS to style/size it.

The Premium way: When you check the Media Tag option, it creates and includes the Media:Content block, and then in Mailchimp you can use the RSSITEM:IMAGE merge tag, and place the image wherever you like, create custom designs, etc. Those same two caveats apply, non-https websites may not show the images in Preview Mode but should work when sent, and custom CSS is even more desirable, which we can help with, and which is why it's a Premium option.

= Blurry images in Mailchimp or other Services =
Blurry images usually means the size selected in the plugin's option page is too small. Try increasing it, or using "Full" size. If still blurry using Full, then the original image size uploaded is too small, upload a larger image.

The other option is to use some custom CSS to display the image(s) smaller in the email, max width should always be 600px for Mailchimp, so make sure your images are at least that large, and ideally exactly that width, with a reasonable height (300-500px typically).

= Free Features =
* Featured image size: Select from thumbnail, medium, large, any theme-specific sizes, and full size.
* Image Position: Select Image left above text, Image left text wrap, Image right text wrap, and Image centered above text.  
* Padding: Instantly set the spacing between the image and the body text.
* Feedly: Now support Feedly's webfeedsFeaturedVisual class name on image HTML.

= Premium Version Features =
Upgrade to the Premium version for a full suite of image customization features for professional marketing.

Enjoy a 14-day free trial no credit card required. Check out this full suite of image customization features for professional marketing.

* Tech Support: Expert support in the U.S. to help get everything working and looking great.
* Media and Enclosure Tags: Some services require it and it allows you to custom design email templates.
* Use Media tag images only: Fix duplicate images issues when using image tags for advanced template designs.
* Custom Image Sizes: Completely customize the size of image display for RSS feeds.
* Feature Body Image: No featured photos set? No problem. Use the first photo from the body of posts.
* Disable Responsive Images: Helps fix services that have issues with the responsive image code, like Mailchimp’s Preview.
* Exclude Categories: Exclude unwanted categories not meant to be included in the RSS feed, like Homepage or Featured categories.
* Custom Content in Feeds: Add custom content (text or HTML) before or after the post such as backlinks or ads.
* Publish Delay: Add a time buffer to new posts from instantly hitting the RSS feed to safeguard from typos or accidents.
* Premium plugin updates with new features, fixes and security patches.

= Testimonials =
**Real Testimonials**

> "Must-have for content marketing. This is a super easy way to customize the featured images that appear in the RSS feed – no more ugly pre-populated visuals. I especially love the Mailchimp integration. It’s great to have this much control over our content. Image is everything!" - @morganmariequinn [Read the review](https://wordpress.org/support/topic/must-have-for-content-marketing/)

> "Must Have for Featured Image Based Themes & MailChimp Users. For several years my WordPress theme has used featured images at the head of all my posts. The problem is, then, when feeding my RSS feed to MailChimp, that featured image at the head of the post is lost. Sometimes the image is highly crucial to the post (not to mention more enjoyable), so this plugin is a life saver. A must have!" - @ericdye [Read the review](https://wordpress.org/support/topic/must-have-for-featured-image-based-themes-mailchimp-users/)

> "It just works – lovely! Great with MailChimp. I installed this plugin, changed the (very simple) settings and the featured images started appearing in my MailChimp campaigns straight away – perfect!" - @barn2media [Read the review](https://wordpress.org/support/topic/it-just-works-lovely-great-with-mailchimp/)

We promise you'll love the features this plugin provides for your content marketing automation!

= Need help? =
Be sure to check the [Support Threads](http://wordpress.org/support/plugin/featured-images-for-rss-feeds) to see if you’re question has already been answered. If not, submit your question and we’ll answer it. 

= Love this plugin? =
Please submit a [rating and review](https://wordpress.org/support/plugin/featured-images-for-rss-feeds/reviews/?filter=5#new-post), we'd appreciate your testimonial.

(Have an issue? Post to the support forums before leaving a poor review.)

== Screenshots ==
1. An example RSS feed with images included to the left with the text wrapping to the right, medium sized.
2. An example RSS feed with featured images included above the text, full sized.
3. A screenshot of the plugin's options screen.
4. A sad example of a plain RSS feed with no images, because they aren't using this plugin. Don't have sad RSS feeds, use this plugin!

== Changelog ==
= 1.5.6 =
* Fixed: Bump Tested version to WordPress 5.4, and align with Premium v1.5.6 numbering.

= 1.5.5 =
* Fixed: Premium bumped to v1.5.5, no changes to free version.

= 1.5.4 =
* Fixed: Fatal error on some sites due to incorrect version of file uploaded to repo, apologies!

= 1.5.3 =
* Updated: Update Freemius SDK to latest version, updated WordPress compatibility to v5.3

= 1.5.2 =
* Updated: Update Freemius SDK to latest version, updated WordPress compatibility to v5.1

= 1.5.1 =
* Added: Add option to make the prepended image clickable, props to @crzyhrse for the suggestion.
* Updated: Revised our support link, free and premium support now provided via https://support.5starplugins.com/

= 1.5 =
* Fixed: (Premium update only) Various feed XML validation improvements and fixes.
* Updated: Freemius SDK updated to the latest version

= 1.4.9 =
* Fixed: (Premium update only) Various feed XML validation improvements and fixes.

= 1.4.8 =
* Fixed: Various feed XML validation improvements and fixes.
* Fixed: To fix a duplicate image issue when adding images as a Media/Enclosure tag, a new option to remove the regular prepended image from the main feed.
* Added: Media and Enclosure tags (Premium options) now resize to image size chosen, instead of always being full sized.
* Updated: Freemius SDK updated to the latest version

= 1.4.7 =
* Fix: Add full size to media tag from first attached image of post. Props to @babouz44.

= 1.4.6 =
+ Added: Added Yahoo Media support to RSS namespace for services that may require it to work with media:content tag
+ Added: support for Feedly's webfeedsFeaturedVisual class name on image HTML

= 1.4.5 =
* Fix: Automatic deactivation of free plugin when premium plugin activated fixed, and free trial text link adjusted.

= 1.4.4 =
* Fix: Small issue with activating Trial version and Premium options being displayed, now fixed.

= 1.4.3 =
* Fix: Corrected max-width: 100% output for image widths, failed to escape % signs, now fixed.

= 1.4.2 =
* New: Added support for Feedly's &lt;webfeeds:cover image=&gt; tag to the Media tag option.
* New: Enclosure Tag Option: Output images in &lt;enclosure&gt; tag
* Fix: Added MIME type output on the media tag
* Fix: Fixed the Trial license with free plugin fatal error, and trial upgrade links
* Fix: Translation slug fix to support translate.wordpress.org
* Fix: Updated Freemius SDK to latest version

= 1.4.1 =
* Fix: Oops - the new opt-in and admin notices were displaying in the wrong place, apologies, this is now fixed.

= 1.4 =
* New: Added option for custom image padding.
* Update: Refactored the code from top to bottom, now performs much better.
* Update: Translation ready, we're accepting translated pot files.
* New: Now using Freemius for opt-in user usage data and better support, feature requests.
* New: Premium Version now available with media and image tag support, custom images sizes, exclude categories, pre and post feed content, and more. Free trial available, and instant upgrades on checkout.

== Upgrade Notice ==
= 1.5.6 =
* Fixed: Bump Tested version to 5.4, and align with Premium v1.5.6 numbering.