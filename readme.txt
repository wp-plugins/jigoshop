=== Jigoshop ===
Contributors: Jigoshop
License: GNU General Public License v3
Tags: 2checkout, 2co, affiliate, authorize, cart, checkout, commerce, coupons, e-commerce,ecommerce, gifts, moneybookers, online, online shop, online store, paypal, paypal advanced,Paypal Express, paypal pro, physical, reports, sagepay, sales, sell, shipping, shop,shopping, stock, stock control, store, tax, virtual, weights, widgets, wordpress ecommerce, wp e-commerce, woocommerce
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_donations&business=sales%40jigoshop%2ecom&lc=US&item_name=Jigoshop%20%2d%20Wordpress%2eorg%20donation%20link&no_note=0&currency_code=USD&bn=PP%2dDonationsBF%3abtn_donateCC_LG%2egif%3aNonHostedGuest
Requires at least: 3.8
Tested up to: 4.0.1
Stable tag: 1.13.3

A feature-packed eCommerce plugin built upon WordPress core functionality ensuring excellent performance and customizability.

== Description ==

Use <a href="https://www.jigoshop.com">Jigoshop</a> to turn your WordPress website into a dynamic eCommerce store.
Jigoshop is led by a motivated development team with years of experience with delivering professional online shops
for global brands. Our number one priority is to make it easy to get professional results for WordPress eCommerce solution.

With the Jigoshop plugin for WordPress you have your very own web store for your website. You have complete control
of your eCommerce shop.

= SETUP IN MINUTES =

Setup your web store in minutes with an extensive amount of shop settings including base country, currency,
catalog options, stock management, unlimited tax settings, shipping and payment gateways out of the box.
Plus there are hundreds of additional extensions to build up Jigoshop to be an even more powerful WP eCommerce
solution.

= PRODUCT TYPES =

Jigoshop includes several product type options for your eCommerce shop. They include:

* Downloadable or Virtual products
* Variable products (e.g. offer Size: S,M,L for one product)
* Affiliate (External) products (i.e. link your Add to cart button off-site)
* Grouped products

= DETAILED REPORTS =

Within the Jigoshop eCommerce plugin are various reporting features to give you real-time insight of your
shops performance. Features include sortable sales graphs and incoming order/review notifications.

= STOCK MANAGEMENT =

Jigoshop has the ability to manage your shops stock. Included is an option to allow Jigoshop to inform you
of low stock once it reaches your set threshold so that your shop never runs out of stock.

= EXTEND YOUR SHOP! =

Sure, Jigoshop runs out of the box! But Jigoshop’s functionality doesn’t have end there. We have over
one hundred extensions for Jigoshop available that will further extend the power of the best eCommerce
plugin ever! They include more Payment Gateways, more Shipping methods and much more.

Jigoshop eCommerce strives to maintain its status as the best WordPress eCommerce plugin ever. We hope you’ll
choose the best to power your eCommerce shop and help us prove to you that we really are the best!

You can take a look at our official extensions here: http://www.jigoshop.com/product-category/extensions/

And our Jigoshop-optimized themes here: http://www.jigoshop.com/product-category/themes/

== Upgrade Notice ==

[Click here for complete changelog](https://wordpress.org/plugins/jigoshop/changelog/ "Jigoshop Changelog")

== Installation ==

= Requirements =

* WordPress 3.8 or greater
* PHP version 5.3 or greater
* MySQL version 5.0 or greater
* The mod_rewrite Apache module (for permalinks)
* Some payment gateways require fsockopen support (for IPN access)
* Some extensions require allow_url_fopen enabled (for remote files fetching)

= Installation =

1.  Download the Jigoshop plugin file
2.  Unzip the file into a folder to your computer
3.  Upload the `/jigoshop/` folder to the `/wp-content/plugins/` folder on your site
4.  Visit the plugins page in WordPress Admin to activate the Jigoshop plugin

You can also navigate to the <a href="https://www.jigoshop.com/documentation/installation/">more in-depth installation or upgrade</a> guides.

= Setting up Jigoshop =

Take a look through our <a href="https://www.jigoshop.com/documentation" title="Jigoshop usage guide">Jigoshop usage guides</a> to help you setup Jigoshop for the first time.

== Frequently Asked Questions ==

= Will Jigoshop work with X theme? =

Jigoshop will in theory work with any theme, but of course, certain parts may need to be styled using CSS to make them match up. We've added default styling for Twenty Ten (the WordPress default theme) and we also offer <a href="http://www.jigoshop.com/product-category/themes/">premium themes optimised for Jigoshop</a>.

If you need a theme built, or have a theme that needs styling, <a href="https://www.jigoshop.com/contact/">give us a shout</a> and we may be able to assist.

= Can I have Jigoshop in my language =

Jigoshop comes with a .po file and is localisation ready in over 10 languages.
You can also <a href="https://www.jigoshop.com/documentation/localization-tutorial/">create your own translations</a> for Jigoshop.

= Which payment gateways do you have? =

Take a look through <a href="https://www.jigoshop.com/documentation/payment-gateways/">our list of payment gateways</a>. There are some free ones that are included with Jigoshop, and even more are available <a href="http://www.jigoshop.com/product-category/payment-gateways/">on jigoshop.com</a>.

= Will tax settings work in my country? =

Jigoshop has a flexible tax rule system which allows you to define tax rates per country - it should allow you to do what you want.

= I need hosting! =

You're in luck! We offer <a href="http://www.jigoshop.com/">optimised hosting packages</a> starting from 10 GBP per month.

= I need help! =

We have <a href="https://www.jigoshop.com/documentation/" title="Jigoshop Documentation">documentation</a> for seeking information.
However, if you want priority, dedicated support from Jigoshop staff, we dp offer <a href="http://www.jigoshop.com/support/" title="Jigoshop Premium Support">premium support packages</a>.

== Screenshots ==

1. Jigoshop admin dashboard
2. Admin product edit page
3. Jigoshop homepage on a premium theme
4. Standard customer checkout screen

== Changelog ==

= 1.13.3 - 2014-12-01 =
* Improved: [shipping] variable was divided into [shipping_cost] and [shipping_method].
* Improved: Order item is now passed to `jigoshop_order_product_title` filter as 3rd argument. Thanks to @ermx
* Fix: Default emails now install properly on jigoshop update.
* Fix: Urls for dummy products.

= 1.13.2 - 2014-11-26 =
* Improved: Additional email variables `[total_tax]`, `[is_local_pickup]`, `[checkout_url]`, `[payment_method]`.
* Improved: Coupons now can be added or removed in checkout.
* Fix: Some html errors.
* Fix: Typo in default email
* Fix: Removed ex. tax label from subtotal in cart when shop admin decide to show prices without tax.
* Fix: Generate default emails button no longer generates warning.

= 1.13.1 - 2014-11-21 =
* Fix: Warnings in email module.
* Fix: Email templates now installs properly after jigoshop activation.

= 1.13 - 2014-11-21 =
* New: Ability to select whether to show prices with or without tax in cart.
* New: Ability to select user when creating new order manually in admin panel.
* New: Brand, GTIN, MPN fields for product.
* New: Shortcode product_tag.
* Improved: Disabled options in select now are hidden.
* Improved: Stock status shows ':' instead of dash.
* Improved: Sku variable is no longer showing in emails when sku is disabled.
* Improved: Shop administrator is able to not set price for variables.
* Improved: Shop emails are now customizable.
* Fix: Disappearing items from cart after login.

= 1.12.3 - 2014-10-27 =
* Improved: Automatic plugin update mechanism uses as low HTTP requests as possible.

= 1.12.2 - 2014-10-17 =
* Improved: Show plugin updates even when licence is not activated.
* Improved: Checking for updates is now 5 times faster.
* Fix: Changing state or country in checkout will properly trigger recalculation of cart taxes.
* Fix: Countries with not defined states, will properly shown as selected.
* Fix: Email notifications about product stock status can be properly disabled.
* Fix: JS problems on admin user profile page.
* Fix: Date on Reports Page can be properly picked.
* Fix: Redirecting from my account pages will no longer generate errors.
* Fix: Worldpay payment page now will be correctly loaded.
* Fix: Coupon warnings about division by 0.
* Fix: Adding new tax will show properly buttons which are assigned to country/state select.

= 1.12.1 - 2014-10-07 =
* Fix: Phone number in order email.
* Fix: Updated polish translation.
* Fix: Triggering `jigoshop.cart.update` now properly passes data.
* Fix: `jigoshop.cart.update` gets called before data is updated (or removed).
* Fix: Pass properly rounded discount values to PayPal.

= 1.12 - 2014-09-30 =
* New: User fields in user's profile.
* New: Support for disabled elements in admin settings.
* New: `Jigoshop_Options` new methods `get`, `set`, `add`, `delete` and `exists` - replaces ones with `_option` in the name.
* New: `jigoshop_enqueue_settings_scripts` action.
* New: `jigoshop.cart.update` on `.form-cart-items` after Ajax cart update.
* New: Cart quantity changes are immediately saved!
* New: Ability to select exact hour when sales starts and ends.
* New: WordPress memory limit check.
* New: Actions in each product panel for additional fields.
* New: Customer email notification after placing order when getting to on-hold status.
* Improved: Emails: shop details header, tax number in company details.
* Improved: Formatted code of jigoshop emails.
* Improved: Removed invalid email about processing order when going to on-hold status.
* Improved: Grouped products are checking parent group for sales dates.
* Improved: Shipping calculator always works with data set in My Account page.
* Improved: Products do not need to have tax classes selected.
* Fix: Variation SKU fetching.
* Fix: Order total minimum requirement for coupons.
* Fix: Shipping taxes are calculated for each applicable tax class.
* Fix: Proper calculation of taxes after coupons have been applied.
* Fix: Memory checking when provided lowercase.
* Fix: Monthly report and reports are showing the same data now.

= 1.11.9 - 2014-09-16 =
* Fix: EU VAT handling for same country orders.
* Fix: Tax for shipping is properly added on new orders using PayPal standard.

= 1.11.8 - 2014-09-12 =
* Fix: Paying for pending orders.
* Fix: Proper checkbox saving in admin panel.
* Fix: Adding variations JavaScripts.
* Fix: Notice when related products are enabled.
* Improved: `get_sku()` method on product variation object will now return variation SKU (if not available - product SKU).
* Improved: Added `number` option type.
* Improved: Replaced `range` items with `number` ones - better to use (visible values).

= 1.11.7 - 2014-09-09 =
* Fix: Select2 errors on product, order and coupon pages.
* Fix: Notice about `WYSIJA` constant.
* Fix: Re-add `jigoshop_form` class for Groups integration plugin.
* Fix: Clearing multiple select fields.
* Improved: Add "Allow URL fopen" to System Info page.
* Improved: Handling of Jigoshop Settings scripts.

= 1.11.6 - 2014-09-05 =
* Fix: PayPal invalid amounts.
* Fix: JWOS with WordPress 4.0 compatibility.
* Fix: Admin styles with WordPress 4.0
* Improved: Preventing from displaying the same data twice with `jigoshop_get_formatted_variation()` function.
* Improved: Flush rewrite rules as earlier update introduced small changes.
* Improved: Update checkout on load to ensure tax is properly calculated.

= 1.11.5 - 2014-09-04 =
* Fix: Warning when free shipping is selected.
* Fix: Free shipping method will correctly calculate minimum value to let it work.
* Improved: Saving order tax information into database.
* Improved: Added short open tag check to System Info page.
* Improved: Reformatted write panels admin file with removal of deprecated classes and functions.
* Improved: Link to support in footer of every Jigoshop page.

= 1.11.4 - 2014-08-28 =
* Fix: Unknown postcode rules are not invalid.
* Fix: Permalink options now works properly.
* Fix: Remove all items sorting, it leaves only categories ordering working.
* Improved: Strengthened postcode validation to exact match.
* Improved: Compatibility with WooCommerce themes not created by WooThemes.
* Improved: Update prettyPhoto to 3.1.5

= 1.11.3 - 2014-08-21 =
* Fix: Problems with styling of posts not on Jigoshop pages.
* Fix: Warnings when adding or editing product attributes.
* Fix: Problems with line breaks inside tags on checkout.
* Fix: Redirection problems when using checkout without JavaScript.
* Improved: Ability to select whether to use billing or shipping for taxing. Thanks for the tip @elitistdogg

= 1.11.2 - 2014-08-19 =
* Fix: Removed duplicated "Settings" link in plugins panel.
* Fix: Proper handling of errors on checkout.
* Fix: Proper total tax fetching. Thanks to @newash
* Fix: Double `product_type` parameter when editing categories and tags from admin.
* Fix: Overlapping Y-axis values in Jigoshop Report.
* Improved: Hide shipping and tax from cart if customer country is not set.
* Improved: Jigoshop toolbar items based on user capabilities.
* Improved: `jigoshop_get_order` filter also gets `$this` as 3rd parameter. Thanks to @newash

= 1.11.1- 2014-08-07 =
* Fix: Proper selecting of shipping rate.
* Fix: Proper grouped and variable product price displaying.
* Fix: Removing price from products is now available again.
* Improved: Ability to set when messages and error disappear.

= 1.11 - 2014-08-06 =
* New: Compatibility with WooThemes themes.
* New: Check for PHP accelerators as they might cause problems.
* New: Support for variable products in Price Filter widget.
* New: `jigoshop_report_widgets` action to add custom report boxes.
* New: `jQuery.payment()` function to ease payment redirection.
* New: Ability to always select "All of" in country dropdown.
* New: Replaced old ThickBox with WordPress Media Gallery.
* Improved: "Edit Product Category" and "Edit Product Tag" admin bar links now works properly.
* Improved: Better message and error disappearing times.
* Fix: Invalid formatting of shipping dropdown.
* Fix: Displaying multiple select fields.
* Fix: Properly calculate tax for shipping.
* Fix: Licence validator now checks if plugin URL is correct.

= 1.10.6 - 2014-07-30 =
* Fix: Security issue on comments feed.
* Fix: Add obeying validate postcode setting in JavaScript validation.
* Fix: Validating of GB postcodes.
* Fix: Properly check EU VAT for billing country.

= 1.10.5 - 2014-07-28 =
* Fix: States changing in Edit Address and Cart pages.
* Fix: Small typo in `my_account` shortcode template when user is not logged in.
* Fix: Page jumping when messages are shown.
* Improved: Jigoshop widgets reformatting.
* Improved: Add ability to Jigoshop widgets to work together (i.e. Price Filter and Search).

= 1.10.4 - 2014-07-24 =
* Improved: Reformat and fix states changing script.
* Improved: Ability to check if current page is payment confirmation, "Thank you" and "My account" page.
* Improved: Edit address shortcode now has back button.
* Improved: Shortened and simplified JavaScript for checkout.
* Fix: Postcode validation.
* Fix: After address save page renders properly. Thanks to Jeff Grossman
* Fix: Product Categories widget properly handles showing counts option.

= 1.10.3 - 2014-07-21 =
* Fix: Memory checking typo.
* Fix: Stock status checking for products.
* Fix: PHP pre-5.3 main file compatible (for proper PHP version checking).
* Fix: Invalid shortcode attribute managing in add to cart shortcode (thanks to Josh Virkler).
* Improved: Memory checking error message is just a warning.

= 1.10.2 - 2014-07-21 =
* Fix: Memory check is not a fatal error anymore - plugin will continue to work.
* Fix: As memory is not a fatal error - required memory is downgraded to 64 MB.

= 1.10.1 - 2014-07-21 =
* Fix: Memory checking for some users. Thanks to freyaluna for finding it.

= 1.10 - 2014-07-21 =
* New: `jigoshop_countries::get_countries()` function - returns alphabetically sorted list of translated country names.
* New: `jigoshop_countries::has_country()` and `jigoshop_countries::has_state()` methods introduced.
* New: `jigoshop_render()` and `jigoshop_render_result()` functions - easy templates rendering.
* New: `jigoshop_product_list` shortcode.
* New: Check for minimum, required PHP version.
* New: Check for minimum, required WordPress version.
* New: Check for minimum, required memory size - currently 128 MB.
* New: Support and Docs links in Plugins list.
* New: Ability to define default customer country.
* New: Introduce Jigoshop menu to WordPress admin toolbar.
* New: `jigoshop_remove_script()` function and its support in JWOS.
* New: Provinces for Poland and Philippines. Thanks to Kristoffer Cheng
* New: `JIGOSHOP_URL` constant - for easy access to Jigoshop files from other plugins.
* New: `jigoshop_is_minimum_version()` function - for checking if Jigoshop matches at least specified version using `version_compare()` PHP function.
* New: `jigoshop_add_required_version_notice()`function - for adding preformatted notice when plugin requires higher version of Jigoshop.
* Improved: JWOS now supports PHP 5.3 with `short_open_tag` disabled.
* Improved: Reformatted main Jigoshop file.
* Improved: Proper variation price sanitization.
* Improved: Removed use of deprecated methods from Jigoshop cart, introduced payment methods template.
* Improved: Extracted account templates from shortcodes - now users can override them in their templates!
* Improved: PayPal decimal errors for HUF, JPN and TWD currencies. Thanks to newash
* Improved: Default look of checkout form.
* Improved: "Tel" and "County" are now "Phone" and "Province" in admin panel.
* Improved: Updating order status is at the end of saving the order. Thanks to newash
* Improved: Admin settings uses JWOS now.
* Improved: Jigoshop class information functions returns values from constants as they should.
* Improved: Reformatted WorldPay gateway class.
* Improved: New Google Analytics code using Universal Analytics. Thanks to Ragnar Karlsson for a tip!
* Fix: Warning when saving product meta.
* Fix: Removed Wordpress TwentyFourteen theme fix as it causes problems with real shops.
* Fix: HTTPS warnings for external fonts removed.
* Fix: Strict standards warning on edit address page.
* Fix: Reports chart properly scales Y-Axis ticks.

= 1.9.6 - 2014.06.11 =
* New: Add version constant to `jigoshop` class for easy checking in plugins.
* New: Javascript triggers `jigoshop.update_checkout` on body element when `update_checkout()` method is called. Useful for payment gateways.
* Fix: Properly convert asset URLs to directory paths in JWOS.
* Fix: Tax warnings when country is with states and no taxes are available for it.
* Fix: Properly include ThickBox for uploads.
* Fix: Taxes are applied to billing country instead of shipping country if product is shippable.
* Fix: Checking if specific countries are set properly before updating tax classes.
* Improved: Jigoshop styles on TwentyFourteen.
* Improved: Better recognition of SSL usage.
* Improved: Better recognition of available country and state on checkout.
* Improved: Review order template fixes.
* Improved: Jigoshop Countries class - now it has `get_country($country_code)` and `get_state($country_code, $state_code)` functions.
* Improved: Check if there is shipping and payment method before displaying it in orders list.
* Improved: Reformat of PayPal Standard gateway.
* Improved: Introduced `JIGOSHOP_VERSION` and `JIGOSHOP_DB_VERSION` (old `JIGOSHOP_VERSION`) constants - use them instead of jigoshop::jigoshop_version() function.
* Improved: Removed deprecated qualifier on product's `get_title()` function and updated the function.

= 1.9.5 - 2014.05.28 =
* Fix: Variation data disappearing in emails.
* Fix: Saving taxes.
* Improve: Hide infinite availability for variable products.
* Improve: Code cleaning.
* Improve: Update POT file for translations.

= 1.9.4 - 2014-05-26 =
* New: Checking for valid variation price (with proper error message).
* Fix: Add BlockUI JavaScript in header for proper PayPal Standard support.
* Fix: Minor code updates to PayPal Standard gateway.
* Fix: Saving options in specific circumstances.
* Fix: Warnings when no tax defined.
* Fix: Proper checking for tax state correctness. Thanks to Karl Engstrom
* Fix: Update variation formatting to use built-in values and selections as well.
* Improve: Minor update of PayPal gateway.

= 1.9.3.1 - 2014-05-18 =
* Fix: Quick fix for invalid use of `jigoshop_get_formatted_variation()`

= 1.9.3 - 2014-05-15 =
* New: "New" order status.
* Fix: First activation warnings.
* Fix: Taxes are calculated even when not set for base country.
* Fix: Database version checking on PHP 5.5.
* Fix: Ability to add taxes to single state. Thanks to elitistdogg!
* Fix: Order email warnings.
* Fix: Properly display variation details. Thanks to Jared Weiss!
* Fix: `jigoshop_localize_script()` now works properly.
* Improve: Remove lots of backwards compatibility code from Jigoshop_Options class. WARNING: Old plugins may stop working!
* Improve: Use `jigoshop_localize_script()` in order to avoid problems with external jQuery versions.

= 1.9.2 - 2014-05-13 =
* New: System Info icon.
* Improved: Code formatting of settings and tax classes.
* Fix: Saving multiple taxes - fixes issue where some states were not saved thus resulting in 0% tax.
* Fix: Calculating taxes in cart and checkout
* Fix: Properly displaying tax values when coupons are used and tax is applied after coupons.

= 1.9.1 - 2014-05-12 =
* Fix: Checking for shipping and billing state and country correctness.

= 1.9 - 2014-05-12 =
* New: Jigoshop Web Optimisation System - ability to combine CSS and JavaScript into a single files.
* New: Brand new look of Jigoshop Dashboard.
* New: API for localizing JavaScript files in order to work with Jigoshop Web Optimisation extension.
* New: Multipart form in admin settings to use with user-defined input fields. Thanks to Andrei Neamtu
* New: Ability to select all countries in tax class.
* New: More detailed information about low in stock variable products.
* New: Validating if customer shipping country and state is allowed for taxing purposes.
* Improved: Updated "Useful links" section.
* Improved: Load jQuery UI Sortable plugin by default.
* Improved: Load tim of admin dashboard for shops with many items.
* Fix: Specific countries with tax caused orders to pass without adding required tax cost. Thanks to Naomi Taylor
* Fix: Strict standards on `attribute_label()` method in `jigoshop_product` class.
* Fix: Licence validator now properly deactivates licences.
* Fix: Calculating taxes is always performed.
* Fix: `jigoshop::plugin_url()` now returns proper URL.

= 1.8.6 - 2014-04-24 =
* New: Checking for product type when loading products on sale.
* New: jQuery `jigoshop_add_variation` action after adding new variation in admin panel.
* Fix: Password type field on Checkout. Thanks to jlalunz
* Fix: Different user meta used for `address 2` line in checkout and `my_account` shortcode. Thanks to robselway

= 1.8.5 - 2014-04-15 =
* New: Checking if widgets has titles - otherwise skipping displaying them. Thanks to Stephen Cronin
* New: Action `jigoshop_user_edit_address` after address edition. Thanks to robselway
* Fix: Product statuses now matches these from Google Feed.

= 1.8.4 - 2014-04-01 =
* Fix: Category dropdown is now single selection. Thanks to Riccardo F
* Fix: Closing tags in `jigoshop_customer` class are now correctly included. Thanks to robselway

= 1.8.3 - 2014-03-31 =
* New: Orders in admin panel can be filtered by date
* Tweak: Updated licences
* Tweak: Moved country-states javascript to separate file
* Fix: Categories widget can redirect to "All" page too

= 1.8.2 - 2014-03-28 =
* New: Jigoshop manages its assets through new API `jigoshop_add_style()` and `jigoshop_add_script()`
* Tweak: PayPal landing page will now show Credit Card entry fields by default
* Tweak: Remove duplicated values from System Info
* Tweak: Redirect after error while adding product into cart
* Fix: Use calculated order price when using PayPal Standard gateway
* Fix: Force 0.01 charge on free orders at PayPal to allow it to process through PayPal
* Fix: Jigoshop categories widget will again use a pop-up select when 'dropdown' setting is enabled
* Fix: Resolve problems with Ukrainian translation
* Languages: New Chinese Taiwan translation courtesy of Eason Chen
* Languages: Updated Danish translation courtesy of Tine Kristensen
* Languages: Updated German translation courtesy of Andy Jordan
* Languages: Updated Polish translation courtesy of OptArt

= 1.8.1 - 2014-01-03 =
* Tweak: Variations that are all priced the same will no longer show the secondary price when selected
* Tweak: Free Shipping module only activates on totals after applied coupon amounts
* Tweak: Provide total quantity products sold for Reports
* Fix: Reports include orders from beginning day of date range
* Fix: After coupon removal on Cart, totals recalcualted
* Fix: Products on sale shortcode now uses default loop-shop template to allow pagination
* Fix: Products on sale shortcode won't show all products if non actually on sale
* Fix: Clicks on Checkout's 'ship to billing' will force a recalc for selected states and taxes
* Fix: Numerous fixes for PHP Strict warnings
* Languages: Updated pot file for translators
* Languages: Updated Ukranian translation courtesy of Anatolii Sakhnik
* Languages: Updated Croatian translation courtesy of Ivica Delic
* Languages: Updated German translation courtesy of Andy Jordan
* Languages: New Slovenian translation courtesy of David Bratuša

= 1.8 - 2013-10-10 =
* New: WorldPay payment gateway added to Jigoshop core
* New: Settings->General->`Complete processing Orders` option for 'processing' orders older than 30 days
* New: Implement Jigoshop Request API for extensions and gateways
* New: Javascript Checkout field validation to enhance payment conversion. Shows correct and incorrect fields.
	* Orders won't be placed until all Checkout fields required data are input and validated
* Tweak: Revamped all Jigoshop frontend javascript for modularity and efficiency
	* all Jigoshop javascript loads in footer for improved performance
* Tweak: Updated several external javascript libraries (jQuery blockUI, select2)
* Tweak: Removed large jQuery UI library from front end loading, loads required bits as needed (Price Filter)
* Tweak: Jigoshop now only loads one CSS file from all internal sources for efficiency
* Tweak: Add a codeblock option type in the settings for extensions to use internally
* Tweak: Combine Edit Order variation attributes with product addons extension in one panel for Orders
* Tweak: Add some filters for Jigoshop WPML extension to allow more translated items
* Tweak: Jigoshop Reports pie chart cleanup with separate legend that won't over write charts
* Tweak: Jigoshop Reports pie chart products now show with 5% share
* Fix: Jigoshop Reports pie chart for 'Most Sold' per period now accurately reflects top products sold
* Fix: Repair Google Analytics function for tracking code to load in header where it's required
* Fix: Repair Google eCommerce Product tracking for Thank You page
* Fix: Unpaid 'on-hold' orders from cash or cheque gateways will no longer be overwritten with another order
* Fix: FuturePay gateway will not be selectable on the Checkout for Orders over $500.00 (current credit limit)
* Fix: Test to ensure PayPal payment amounts and addresses matches initially submitted order as a security check
* Fix: Remove filter that was overriding Contact Form 7 or other mail extensions for 'From' name on emails
* Fix: Variations that use Parent Product for stock tracking, Parent will now reduce stock upon order payment
* Languages: Updated .pot file for translators
* Languages: Updated Brazilian translation courtesy of Raphael Suzuki
* Languages: Updated Czech translation courtesy of Jaroslav Ondra

== About Jigoshop ==

* <a href="https://www.jigoshop.com/new-tour-page/">Why Should you use Jigoshop?</a>
* <a href="https://www.jigoshop.com/showcase/">Showcase</a>
* <a href="https://www.jigoshop.com/documentation/">Documentation</a>
* <a href="https://www.jigoshop.com/getting-started-guide/">Getting Started Guide</a>
* <a href="https://www.jigoshop.com/blog/">Blog</a>
* <a href="https://www.jigoshop.com/contact/">Contact</a>

== Support ==

= About Support =

* <a href="https://www.jigoshop.com/support/">Free Support</a>
* <a href="https://www.jigoshop.com/compare-support-packages/">Compare Support Packages</a>

= Enterprise Level Support =

* <a href="https://www.jigoshop.com/product/enterprise-level-ad-hoc-emergency-support/">Enterprise Level &#8211; Ad-Hoc Emergency Support</a>
* <a href="https://www.jigoshop.com/product/ecommerce-ent-basic-support/">Enterprise Level &#8211; Basic Support</a>
* <a href="https://www.jigoshop.com/product/ent-level-full-website-management/">Enterprise Level &#8211; Full Website Management</a>
* <a href="https://www.jigoshop.com/product/ecommerce-ent-full-website-support/">Enterprise Level &#8211; Full Website Support</a>
* <a href="https://www.jigoshop.com/product/ecommerce-ent-premium-support/">Enterprise Level &#8211; Premium Support</a>

= Support for Small Business =

* <a href="https://www.jigoshop.com/product/ecommerce-smb-emergency-support/">SMB Level &#8211; Ad-Hoc Emergency Support</a>
* <a href="https://www.jigoshop.com/product/ecommerce-smb-basic-support/">SMB Level &#8211; Basic Support</a>
* <a href="https://www.jigoshop.com/product/ecommerce-smb-full-website-management/">SMB Level &#8211; Full Website Management</a>
* <a href="https://www.jigoshop.com/product/ecommerce-smb-full-website-support/">SMB Level &#8211; Full Website Support</a>
* <a href="https://www.jigoshop.com/product/ecommerce-smb-premium-support/">SMB Level &#8211; Premium Support</a>

== Themes ==

= Official Themes =

* <a href="https://www.jigoshop.com/product/corellian/">Corellian</a>
* <a href="https://www.jigoshop.com/product/jigoshop-reddish/">Jigoshop Reddish</a>
* <a href="https://www.jigoshop.com/product/jigotheme/">Jigotheme</a>
* <a href="https://www.jigoshop.com/product/origin/">Origin</a>
* <a href="https://www.jigoshop.com/product/overload/">Overload</a>
* <a href="https://www.jigoshop.com/product/serenum/">Serenum</a>
* <a href="https://www.jigoshop.com/product/stitched/">Stitched</a>
* <a href="https://www.jigoshop.com/product/trend-shop/">Trend Shop</a>

= External Themes =

* <a href="https://www.jigoshop.com/product/abaris/">Abaris</a>
* <a href="https://www.jigoshop.com/product/animal-house/">Animal House</a>
* <a href="https://www.jigoshop.com/product/argo/">Argo</a>
* <a href="https://www.jigoshop.com/product/aventador-jigoshop-theme/">Aventador Jigoshop Theme</a>
* <a href="https://www.jigoshop.com/product/bikes-2/">Bikes</a>
* <a href="https://www.jigoshop.com/product/bolsa/">Bolsa</a>
* <a href="https://www.jigoshop.com/product/catalog-theme/">Catalog Theme</a>
* <a href="https://www.jigoshop.com/product/child-care-2/">Child Care</a>
* <a href="https://www.jigoshop.com/product/earth-nature/">Earth Nature</a>
* <a href="https://www.jigoshop.com/product/electronic-devices/">Electronic Devices</a>
* <a href="https://www.jigoshop.com/product/eureka/">Eureka</a>
* <a href="https://www.jigoshop.com/product/fancytheme/">FancyTheme</a>
* <a href="https://www.jigoshop.com/product/fashion-store/">Fashion Store</a>
* <a href="https://www.jigoshop.com/product/fitness/">Fitness</a>
* <a href="https://www.jigoshop.com/product/greatest-hits/">Greatest Hits</a>
* <a href="https://www.jigoshop.com/product/hardware/">Hardware</a>
* <a href="https://www.jigoshop.com/product/hermes-theme/">Hermes Theme</a>
* <a href="https://www.jigoshop.com/product/lathika-theme/">Lathika Theme</a>
* <a href="https://www.jigoshop.com/product/mayashop-responsive-theme/">MayaShop &#8211; Responsive Theme</a>
* <a href="https://www.jigoshop.com/product/modern-crockery/">Modern Crockery</a>
* <a href="https://www.jigoshop.com/product/mommy-blog/">Mommy Blog</a>
* <a href="https://www.jigoshop.com/product/outdoor-style/">Outdoor Style</a>
* <a href="https://www.jigoshop.com/product/prometheus/">Prometheus</a>
* <a href="https://www.jigoshop.com/product/refined-style-theme/">Refined Style Theme</a>
* <a href="https://www.jigoshop.com/product/responsive-alternative-clothes-store/">Responsive Alternative Clothes Store</a>
* <a href="https://www.jigoshop.com/product/responsive-business-cards-store/">Responsive Business Cards Store</a>
* <a href="https://www.jigoshop.com/product/responsive-clothes-store/">Responsive Clothes Store</a>
* <a href="https://www.jigoshop.com/product/responsive-furniture-store/">Responsive Furniture Store</a>
* <a href="https://www.jigoshop.com/product/responsive-tickets-store/">Responsive Tickets Store</a>
* <a href="https://www.jigoshop.com/product/rustik-theme/">Rustik Theme</a>
* <a href="https://www.jigoshop.com/product/selene/">Selene</a>
* <a href="https://www.jigoshop.com/product/shiny-gems/">Shiny Gems</a>
* <a href="https://www.jigoshop.com/product/shop/">Shop</a>
* <a href="https://www.jigoshop.com/product/simplethemes-skeleton/">SimpleThemes: Skeleton</a>
* <a href="https://www.jigoshop.com/product/simplicity-theme/">Simplicity Theme</a>
* <a href="https://www.jigoshop.com/product/sneakers-addict/">Sneakers Addict</a>
* <a href="https://www.jigoshop.com/product/sommerce-shop/">Sommerce Shop</a>
* <a href="https://www.jigoshop.com/product/spares-of-the-highest-quality/">Spares Of The Highest Quality</a>
* <a href="https://www.jigoshop.com/product/sport-grunge/">Sport Grunge</a>
* <a href="https://www.jigoshop.com/product/sports-store/">Sports Store</a>
* <a href="https://www.jigoshop.com/product/storefront-echo/">Storefront Echo</a>
* <a href="https://www.jigoshop.com/product/supernova/">SuperNova</a>
* <a href="https://www.jigoshop.com/product/toledo-theme/">Toledo Theme</a>
* <a href="https://www.jigoshop.com/product/travel-island/">Travel Island</a>
* <a href="https://www.jigoshop.com/product/trendy-sunglasses/">Trendy Sunglasses</a>
* <a href="https://www.jigoshop.com/product/wallclassic-theme/">WallClassic Theme</a>
* <a href="https://www.jigoshop.com/product/wardrobe/">Wardrobe</a>
* <a href="https://www.jigoshop.com/product/wordpress-sold-theme/">WordPress Sold! Theme</a>
* <a href="https://www.jigoshop.com/product/zeux/">Zeux</a>

== Extensions ==

= Free Extensions =

* <a href="https://www.jigoshop.com/product/affiliates-jigoshop-integration-light/">Affiliates Integration Light</a>
* <a href="https://www.jigoshop.com/product/basic-bundle-shipping/">Basic Bundle Shipping</a>
* <a href="https://www.jigoshop.com/product/bluepay-for-jigoshop/">BluePay for Jigoshop</a>
* <a href="https://www.jigoshop.com/product/jigoshop-catalyst-connect/">Catalyst Connect</a>
* <a href="https://www.jigoshop.com/product/clickdesk-live-support/">ClickDesk Live Support</a>
* <a href="https://www.jigoshop.com/product/credimax-payment-gateway/">CrediMax Payment Gateway</a>
* <a href="https://www.jigoshop.com/product/custom-payment-gateway/">Custom Payment Gateway</a>
* <a href="https://www.jigoshop.com/product/dibs-payment-gateway/">DIBS Payment Gateway</a>
* <a href="https://www.jigoshop.com/product/doc-it/">Doc It</a>
* <a href="https://www.jigoshop.com/product/genesis-connect-for-jigoshop/">Genesis Connect for Jigoshop</a>
* <a href="https://www.jigoshop.com/product/german-full-translation-language-pack/">German Full Translation Language Pack</a>
* <a href="https://www.jigoshop.com/product/headway-connect/">Headway Connect</a>
* <a href="https://www.jigoshop.com/product/iadvize-live-chat/">iAdvize Live Chat</a>
* <a href="https://www.jigoshop.com/product/intuitive-custom-post-order/">Intuitive Custom Post Order</a>
* <a href="https://www.jigoshop.com/product/jigoshop-and-pagelines-integration/">Jigoshop &#038; PageLines Integration</a>
* <a href="https://www.jigoshop.com/product/jigoshop-additional-admin-emails/">Jigoshop Additional Admin Emails</a>
* <a href="https://www.jigoshop.com/product/jigoshop-admin-bar/">Jigoshop Admin Bar</a>
* <a href="https://www.jigoshop.com/product/jigoshop-basic-weight-shipping/">Jigoshop Basic Weight Shipping</a>
* <a href="https://www.jigoshop.com/product/jigoshop-csv-product-importer/">Jigoshop CSV Product Importer</a>
* <a href="https://www.jigoshop.com/product/jigoshop-easy-print-button/">Jigoshop Easy Print Button</a>
* <a href="https://www.jigoshop.com/product/jigoshop-photos-product-tab/">Jigoshop Photos Product Tab</a>
* <a href="https://www.jigoshop.com/product/jigoshop-product-add-ons/">Jigoshop Product Add-Ons</a>
* <a href="https://www.jigoshop.com/product/jigoshop-putler-connector/">Jigoshop Putler Connector</a>
* <a href="https://www.jigoshop.com/product/jigoshop-smart-send-shipping/">Jigoshop Smart Send Shipping</a>
* <a href="https://www.jigoshop.com/product/jigoshop-software-addon/">Jigoshop Software Addon</a>
* <a href="https://www.jigoshop.com/product/jigoshop-statistics-2/">Jigoshop Statistics</a>
* <a href="https://www.jigoshop.com/product/jigoshop-video-product-tab/">Jigoshop Video Product Tab</a>
* <a href="https://www.jigoshop.com/product/mailcheck-for-jigoshop/">Mailcheck for Jigoshop</a>
* <a href="https://www.jigoshop.com/product/mailpoet-jigoshop-add/">MailPoet Jigoshop Add-on</a>
* <a href="https://www.jigoshop.com/product/multi-currency-converter-lite/">Multi Currency Converter Lite</a>
* <a href="https://www.jigoshop.com/product/pagseguro-payment-gateway/">PagSeguro Payment Gateway</a>
* <a href="https://www.jigoshop.com/product/pinterest/">Pinterest</a>
* <a href="https://www.jigoshop.com/product/rbk-money-for-jigoshop/">RBK Money for Jigoshop</a>
* <a href="https://www.jigoshop.com/product/robokassa-payment-gateway-for-jigoshop/">Robokassa Payment Gateway for Jigoshop</a>
* <a href="https://www.jigoshop.com/product/shipworks-connector/">ShipWorks Connector</a>
* <a href="https://www.jigoshop.com/product/skrill/">Skrill</a>
* <a href="https://www.jigoshop.com/product/suffusion-commerce/">Suffusion Commerce</a>
* <a href="https://www.jigoshop.com/product/wanttt-com-button/">Wanttt.com Button</a>
* <a href="https://www.jigoshop.com/product/woocommerce-to-jigoshop-converter/">WooCommerce to Jigoshop Converter</a>
* <a href="https://www.jigoshop.com/product/wp-e-commerce-to-jigoshop-converter/">WP e-Commerce to Jigoshop Converter</a>
* <a href="https://www.jigoshop.com/product/wp-menu-cart/">WP Menu Cart</a>
* <a href="https://www.jigoshop.com/product/wpml-jigoshop-multi-language/">WPML Jigoshop Multi-Language</a>
* <a href="https://www.jigoshop.com/product/youtube-video-product-tab/">YouTube Video Product Tab</a>

= Translation =

* <a href="https://www.jigoshop.com/product/german-full-translation-language-pack/">German Full Translation Language Pack</a>
* <a href="https://www.jigoshop.com/product/jigoshop-norway-custom-emails/">Jigoshop Norway Custom Emails</a>
* <a href="https://www.jigoshop.com/product/jigoshop-price-by-role/">Jigoshop Price by Role</a>
* <a href="https://www.jigoshop.com/product/wpml-jigoshop-multi-language/">WPML Jigoshop Multi-Language</a>

= Import / Export =

* <a href="https://www.jigoshop.com/product/campaign-monitor/">Campaign Monitor</a>
* <a href="https://www.jigoshop.com/product/csv-order-and-client-export/">CSV Order and Client Export</a>
* <a href="https://www.jigoshop.com/product/google-product-feed/">Google Product Feed</a>
* <a href="https://www.jigoshop.com/product/installation-of-jigoshop-extension/">Installation of Jigoshop Extension</a>
* <a href="https://www.jigoshop.com/product/jigoshop-csv-product-importer/">Jigoshop CSV Product Importer</a>
* <a href="https://www.jigoshop.com/product/jigoshop-filtering/">Jigoshop Filtering</a>
* <a href="https://www.jigoshop.com/product/product-csv-suite/">Jigoshop Official CSV Importer</a>
* <a href="https://www.jigoshop.com/product/jigoshop-quickbooks-integration/">Jigoshop QuickBooks Integration</a>
* <a href="https://www.jigoshop.com/product/jigoshop-sorting/">Jigoshop Sorting</a>
* <a href="https://www.jigoshop.com/product/mailchimp/">MailChimp</a>
* <a href="https://www.jigoshop.com/product/jigoshop-duplicate-product/">Official Duplicate Product</a>
* <a href="https://www.jigoshop.com/product/sequential-order-numbers/">Sequential and Custom Order Numbers</a>
* <a href="https://www.jigoshop.com/product/woocommerce-to-jigoshop-converter/">WooCommerce to Jigoshop Converter</a>
* <a href="https://www.jigoshop.com/product/wp-e-commerce-to-jigoshop-converter/">WP e-Commerce to Jigoshop Converter</a>

= Other =

* <a href="https://www.jigoshop.com/product/access-coupons/">Access Coupons</a>
* <a href="https://www.jigoshop.com/product/account-funds/">Account Funds</a>
* <a href="https://www.jigoshop.com/product/ajax-content-browser/">Ajax Content Browser</a>
* <a href="https://www.jigoshop.com/product/attach-orders-to-users/">Attach Orders to Users</a>
* <a href="https://www.jigoshop.com/product/best-tree/">Best Tree</a>
* <a href="https://www.jigoshop.com/product/bulk-order-change/">Bulk Order Change</a>
* <a href="https://www.jigoshop.com/product/bulk-update-variations/">Bulk Update Variations</a>
* <a href="https://www.jigoshop.com/product/buy-selected/">Buy Selected</a>
* <a href="https://www.jigoshop.com/product/category-pages-and-thumbnails/">Category Pages and Thumbnails</a>
* <a href="https://www.jigoshop.com/product/checkout-modal-message-box/">Checkout Modal Message Box</a>
* <a href="https://www.jigoshop.com/product/clickdesk-live-support/">ClickDesk Live Support</a>
* <a href="https://www.jigoshop.com/product/custom-attributes-tinymce/">Custom Attributes TinyMCE</a>
* <a href="https://www.jigoshop.com/product/customer-discounts/">Customer Discounts</a>
* <a href="https://www.jigoshop.com/product/digital-licensing/">Digital Licensing</a>
* <a href="https://www.jigoshop.com/product/discfoo/">Discfoo</a>
* <a href="https://www.jigoshop.com/product/end-of-product-sale/">End Of Product Sale</a>
* <a href="https://www.jigoshop.com/product/extended-category-widget/">Extended Category Widget</a>
* <a href="https://www.jigoshop.com/product/extended-external-products/">Extended External Products</a>
* <a href="https://www.jigoshop.com/product/gateway-fees-integration-for-jigoshop/">Gateway Fees Integration for Jigoshop</a>
* <a href="https://www.jigoshop.com/product/genesis-connect-for-jigoshop/">Genesis Connect for Jigoshop</a>
* <a href="https://www.jigoshop.com/product/gravity-forms-integration/">Gravity Forms Integration</a>
* <a href="https://www.jigoshop.com/product/grouped-products-pro/">Grouped Products Pro</a>
* <a href="https://www.jigoshop.com/product/iadvize-live-chat/">iAdvize Live Chat</a>
* <a href="https://www.jigoshop.com/product/intuitive-custom-post-order/">Intuitive Custom Post Order</a>
* <a href="https://www.jigoshop.com/product/jigoshop-add-custom-button/">Jigoshop Add Custom Button</a>
* <a href="https://www.jigoshop.com/product/jigoshop-add-redirect-button/">Jigoshop Add Redirect Button</a>
* <a href="https://www.jigoshop.com/product/jigoshop-add-to-cart-ajax-validation/">Jigoshop Add To Cart Ajax Validation</a>
* <a href="https://www.jigoshop.com/product/jigoshop-additional-admin-emails/">Jigoshop Additional Admin Emails</a>
* <a href="https://www.jigoshop.com/product/jigoshop-address-book/">Jigoshop Address Book</a>
* <a href="https://www.jigoshop.com/product/jigoshop-admin-bar/">Jigoshop Admin Bar</a>
* <a href="https://www.jigoshop.com/product/jigoshop-bookings/">Jigoshop Bookings</a>
* <a href="https://www.jigoshop.com/product/jigoshop-catalog-deluxe/">Jigoshop Catalog Deluxe</a>
* <a href="https://www.jigoshop.com/product/jigoshop-catalog-page-rollover-effect/">Jigoshop Catalog Page Rollover Effect</a>
* <a href="https://www.jigoshop.com/product/jigoshop-category-slider/">Jigoshop Category Slider</a>
* <a href="https://www.jigoshop.com/product/jigoshop-convert-complete/">Jigoshop Convert To Complete</a>
* <a href="https://www.jigoshop.com/product/jigoshop-cookie-bar/">Jigoshop Cookie Bar</a>
* <a href="https://www.jigoshop.com/product/jigoshop-coupon-purchasers/">Jigoshop Coupon Purchasers</a>
* <a href="https://www.jigoshop.com/product/jigoshop-currency-converter-widget/">Jigoshop Currency Converter Widget</a>
* <a href="https://www.jigoshop.com/product/jigoshop-drag-drop-cart/">Jigoshop Drag &#038; Drop Cart</a>
* <a href="https://www.jigoshop.com/product/jigoshop-duplicate-order/">Jigoshop Duplicate Order</a>
* <a href="https://www.jigoshop.com/product/jigoshop-filtering/">Jigoshop Filtering</a>
* <a href="https://www.jigoshop.com/product/jigoshop-multiple-currencies/">Jigoshop Multiple Currencies</a>
* <a href="https://www.jigoshop.com/product/jigoshop-norway-custom-emails/">Jigoshop Norway Custom Emails</a>
* <a href="https://www.jigoshop.com/product/jigoshop-partial-orders/">Jigoshop Partial Orders</a>
* <a href="https://www.jigoshop.com/product/jigoshop-photos-product-tab/">Jigoshop Photos Product Tab</a>
* <a href="https://www.jigoshop.com/product/jigoshop-post-layout/">JigoShop Post Layout</a>
* <a href="https://www.jigoshop.com/product/jigoshop-product-add-ons/">Jigoshop Product Add-Ons</a>
* <a href="https://www.jigoshop.com/product/jigoshop-product-add-ons-premium/">Jigoshop Product Add-Ons Premium</a>
* <a href="https://www.jigoshop.com/product/jigoshop-product-attributes-on-lists/">Jigoshop Product Attributes On Lists</a>
* <a href="https://www.jigoshop.com/product/jigoshop-product-comparison/">Jigoshop Product Comparison</a>
* <a href="https://www.jigoshop.com/product/jigoshop-product-variation-images/">Jigoshop Product Variation Images</a>
* <a href="https://www.jigoshop.com/product/jigoshop-recaptcha/">Jigoshop reCAPTCHA</a>
* <a href="https://www.jigoshop.com/product/jigoshop-request-a-quote/">Jigoshop Request A Quote</a>
* <a href="https://www.jigoshop.com/product/jigoshop-rich-snippets/">Jigoshop Rich Snippets</a>
* <a href="https://www.jigoshop.com/product/jigoshop-smart-coupons/">Jigoshop Smart Coupons</a>
* <a href="https://www.jigoshop.com/product/jigoshop-software-addon/">Jigoshop Software Addon</a>
* <a href="https://www.jigoshop.com/product/jigoshop-sold/">Jigoshop Sold Graphic Icon</a>
* <a href="https://www.jigoshop.com/product/jigoshop-sorting/">Jigoshop Sorting</a>
* <a href="https://www.jigoshop.com/product/jigoshop-split-paypal-sales/">Jigoshop Split Paypal Sales</a>
* <a href="https://www.jigoshop.com/product/learndash-learning-management-platform/">LearnDash Learning Management Platform</a>
* <a href="https://www.jigoshop.com/product/mailcheck-for-jigoshop/">Mailcheck for Jigoshop</a>
* <a href="https://www.jigoshop.com/product/mailchimp-signup-widget/">MailChimp Signup Widget</a>
* <a href="https://www.jigoshop.com/product/mailpoet-jigoshop-add/">MailPoet Jigoshop Add-on</a>
* <a href="https://www.jigoshop.com/product/mini-cart-deluxe/">Mini Cart Deluxe</a>
* <a href="https://www.jigoshop.com/product/minimum-orders/">Minimum Orders</a>
* <a href="https://www.jigoshop.com/product/multiple-admin-emails/">Multiple Admin Emails</a>
* <a href="https://www.jigoshop.com/product/new-product-badge/">New Product Badge</a>
* <a href="https://www.jigoshop.com/product/jigoshop-duplicate-product/">Official Duplicate Product</a>
* <a href="https://www.jigoshop.com/product/pdf-invoices-and-packing-slips/">Official PDF Invoices</a>
* <a href="https://www.jigoshop.com/product/custom-product-tabs/">Official Product Tab Manager</a>
* <a href="https://www.jigoshop.com/product/password-protect/">Password Protect</a>
* <a href="https://www.jigoshop.com/product/per-product-shipping/">Per Product Shipping</a>
* <a href="https://www.jigoshop.com/product/product-accessories-premium/">Product Accessories Premium</a>
* <a href="https://www.jigoshop.com/product/responsive-swipe-product-slider-and-carousel/">Responsive Swipe Product Slider and Carousel</a>
* <a href="https://www.jigoshop.com/product/sendloop-signup-widget/">Sendloop Signup Widget</a>
* <a href="https://www.jigoshop.com/product/shipworks-connector/">ShipWorks Connector</a>
* <a href="https://www.jigoshop.com/product/subscriptions/">Subscriptions</a>
* <a href="https://www.jigoshop.com/product/suffusion-commerce/">Suffusion Commerce</a>
* <a href="https://www.jigoshop.com/product/wp-e-commerce-to-jigoshop-converter/">WP e-Commerce to Jigoshop Converter</a>
* <a href="https://www.jigoshop.com/product/wp-menu-cart/">WP Menu Cart</a>

= Media =

* <a href="https://www.jigoshop.com/product/ajax-content-browser/">Ajax Content Browser</a>
* <a href="https://www.jigoshop.com/product/bulk-update-variations/">Bulk Update Variations</a>
* <a href="https://www.jigoshop.com/product/buy-selected/">Buy Selected</a>
* <a href="https://www.jigoshop.com/product/jigoshop-catalyst-connect/">Catalyst Connect</a>
* <a href="https://www.jigoshop.com/product/category-pages-and-thumbnails/">Category Pages and Thumbnails</a>
* <a href="https://www.jigoshop.com/product/jigoshop-compatible-touch-carousel/">Compatible Touch Carousel</a>
* <a href="https://www.jigoshop.com/product/custom-attributes-tinymce/">Custom Attributes TinyMCE</a>
* <a href="https://www.jigoshop.com/product/extended-category-widget/">Extended Category Widget</a>
* <a href="https://www.jigoshop.com/product/fancy-product-preview/">Fancy Product Preview</a>
* <a href="https://www.jigoshop.com/product/headway-connect/">Headway Connect</a>
* <a href="https://www.jigoshop.com/product/iadvize-live-chat/">iAdvize Live Chat</a>
* <a href="https://www.jigoshop.com/product/jigoshop-and-pagelines-integration/">Jigoshop &#038; PageLines Integration</a>
* <a href="https://www.jigoshop.com/product/jigoshop-add-to-cart-ajax-validation/">Jigoshop Add To Cart Ajax Validation</a>
* <a href="https://www.jigoshop.com/product/jigoshop-ajax-layered-nav/">Jigoshop AJAX Layered Nav</a>
* <a href="https://www.jigoshop.com/product/jigoshop-ajax-private-message/">Jigoshop Ajax Private Message</a>
* <a href="https://www.jigoshop.com/product/jigoshop-category-slider/">Jigoshop Category Slider</a>
* <a href="https://www.jigoshop.com/product/jigoshop-currency-converter-widget/">Jigoshop Currency Converter Widget</a>
* <a href="https://www.jigoshop.com/product/jigoshop-drag-drop-cart/">Jigoshop Drag &#038; Drop Cart</a>
* <a href="https://www.jigoshop.com/product/jigoshop-html-emails/">Jigoshop HTML Emails</a>
* <a href="https://www.jigoshop.com/product/jigoshop-list-view/">Jigoshop List View</a>
* <a href="https://www.jigoshop.com/product/jigoshop-magnify/">Jigoshop Magnify</a>
* <a href="https://www.jigoshop.com/product/jigoshop-name-your-price-charity-donations/">Jigoshop Name Your Price / Charity / Donations</a>
* <a href="https://www.jigoshop.com/product/jigoshop-opening-times/">Jigoshop Opening Times</a>
* <a href="https://www.jigoshop.com/product/jigoshop-photos-product-tab/">Jigoshop Photos Product Tab</a>
* <a href="https://www.jigoshop.com/product/jigoshop-post-layout/">JigoShop Post Layout</a>
* <a href="https://www.jigoshop.com/product/jigoshop-product-attributes-images/">Jigoshop Product Attributes Images</a>
* <a href="https://www.jigoshop.com/product/jigoshop-product-attributes-on-lists/">Jigoshop Product Attributes On Lists</a>
* <a href="https://www.jigoshop.com/product/jigoshop-product-colorizer/">Jigoshop Product Colorizer</a>
* <a href="https://www.jigoshop.com/product/jigoshop-products-of-the-month/">Jigoshop Products of the Month</a>
* <a href="https://www.jigoshop.com/product/jigoshop-qr-codes/">Jigoshop QR Codes</a>
* <a href="https://www.jigoshop.com/product/jigoshop-quickview/">Jigoshop Quickview</a>
* <a href="https://www.jigoshop.com/product/jigoshop-recaptcha/">Jigoshop reCAPTCHA</a>
* <a href="https://www.jigoshop.com/product/jigoshop-rich-snippets/">Jigoshop Rich Snippets</a>
* <a href="https://www.jigoshop.com/product/jigoshop-smart-coupons/">Jigoshop Smart Coupons</a>
* <a href="https://www.jigoshop.com/product/jigoshop-sorting/">Jigoshop Sorting</a>
* <a href="https://www.jigoshop.com/product/jigoshop-video-product-tab/">Jigoshop Video Product Tab</a>
* <a href="https://www.jigoshop.com/product/jigoshop-zoom-plugin/">Jigoshop Zoom Plugin</a>
* <a href="https://www.jigoshop.com/product/magic-magnify-for-jigoshop/">Magic Magnify for Jigoshop</a>
* <a href="https://www.jigoshop.com/product/magic-magnify-plus-for-jigoshop/">Magic Magnify Plus for Jigoshop</a>
* <a href="https://www.jigoshop.com/product/magic-thumb-for-jigoshop/">Magic Thumb for Jigoshop</a>
* <a href="https://www.jigoshop.com/product/magic-touch-for-jigoshop/">Magic Touch for Jigoshop</a>
* <a href="https://www.jigoshop.com/product/magic-zoom-for-jigoshop/">Magic Zoom for Jigoshop</a>
* <a href="https://www.jigoshop.com/product/magic-zoom-plus-for-jigoshop/">Magic Zoom Plus for Jigoshop</a>
* <a href="https://www.jigoshop.com/product/minimum-orders/">Minimum Orders</a>
* <a href="https://www.jigoshop.com/product/custom-product-tabs/">Official Product Tab Manager</a>
* <a href="https://www.jigoshop.com/product/product-accessories-premium/">Product Accessories Premium</a>
* <a href="https://www.jigoshop.com/product/product-badges/">Product Badges</a>
* <a href="https://www.jigoshop.com/product/jigoshop-product-image-watermark/">Product Image Watermark</a>
* <a href="https://www.jigoshop.com/product/product-slider-carousel/">Product Slider Carousel</a>
* <a href="https://www.jigoshop.com/product/responsive-swipe-product-slider-and-carousel/">Responsive Swipe Product Slider and Carousel</a>
* <a href="https://www.jigoshop.com/product/sale-flash-options/">Sale Flash Options</a>
* <a href="https://www.jigoshop.com/product/sendloop-signup-widget/">Sendloop Signup Widget</a>
* <a href="https://www.jigoshop.com/product/social-buttons-for-jigoshop/">Social Buttons for Jigoshop</a>
* <a href="https://www.jigoshop.com/product/video-links/">Video Links</a>
* <a href="https://www.jigoshop.com/product/wp-menu-cart/">WP Menu Cart</a>
* <a href="https://www.jigoshop.com/product/youtube-video-product-tab/">YouTube Video Product Tab</a>
* <a href="https://www.jigoshop.com/product/youtube-video-tab/">YouTube Video Tab</a>

= Networking =

* <a href="https://www.jigoshop.com/product/amazon-estore-affiliates-for-jigoshop/">Amazon eStore Affiliates for Jigoshop</a>
* <a href="https://www.jigoshop.com/product/clockwork-sms-notifications-extension/">Clockwork SMS Notifications Extension</a>
* <a href="https://www.jigoshop.com/product/facebook-products-tab/">Facebook Products Tab</a>
* <a href="https://www.jigoshop.com/product/german-full-translation-language-pack/">German Full Translation Language Pack</a>
* <a href="https://www.jigoshop.com/product/google-product-feed/">Google Product Feed</a>
* <a href="https://www.jigoshop.com/product/iadvize-live-chat/">iAdvize Live Chat</a>
* <a href="https://www.jigoshop.com/product/jigoshop-ajax-private-message/">Jigoshop Ajax Private Message</a>
* <a href="https://www.jigoshop.com/product/jigoshop-category-purchasers/">Jigoshop Category Purchasers</a>
* <a href="https://www.jigoshop.com/product/jigoshop-cookie-bar/">Jigoshop Cookie Bar</a>
* <a href="https://www.jigoshop.com/product/jigoshop-coupon-share/">Jigoshop Coupon for Share</a>
* <a href="https://www.jigoshop.com/product/jigoshop-enhanced-search/">Jigoshop Enhanced Search</a>
* <a href="https://www.jigoshop.com/product/jigoshop-price-by-role/">Jigoshop Price by Role</a>
* <a href="https://www.jigoshop.com/product/jigoshop-product-enquiry-form/">Jigoshop Product Enquiry Form</a>
* <a href="https://www.jigoshop.com/product/jigoshop-product-purchasers/">Jigoshop Product Purchasers</a>
* <a href="https://www.jigoshop.com/product/jigoshop-putler-connector/">Jigoshop Putler Connector</a>
* <a href="https://www.jigoshop.com/product/jigoshop-smart-coupons/">Jigoshop Smart Coupons</a>
* <a href="https://www.jigoshop.com/product/mailchimp-signup-widget/">MailChimp Signup Widget</a>
* <a href="https://www.jigoshop.com/product/mailpoet-jigoshop-add/">MailPoet Jigoshop Add-on</a>
* <a href="https://www.jigoshop.com/product/pinterest/">Pinterest</a>
* <a href="https://www.jigoshop.com/product/sendloop/">Sendloop</a>
* <a href="https://www.jigoshop.com/product/sendloop-signup-widget/">Sendloop Signup Widget</a>
* <a href="https://www.jigoshop.com/product/social-buttons-for-jigoshop/">Social Buttons for Jigoshop</a>
* <a href="https://www.jigoshop.com/product/social-login/">Social Login</a>
* <a href="https://www.jigoshop.com/product/subscriptions/">Subscriptions</a>
* <a href="https://www.jigoshop.com/product/wanttt-com-button/">Wanttt.com Button</a>

= Marketing =

* <a href="https://www.jigoshop.com/product/affiliates-jigoshop-integration-light/">Affiliates Integration Light</a>
* <a href="https://www.jigoshop.com/product/affiliates-pro-integration-pack/">Affiliates Pro Integration Pack</a>
* <a href="https://www.jigoshop.com/product/amazon-estore-affiliates-for-jigoshop/">Amazon eStore Affiliates for Jigoshop</a>
* <a href="https://www.jigoshop.com/product/aweber-newsletter-for-jigoshop/">AWeber Newsletter for Jigoshop</a>
* <a href="https://www.jigoshop.com/product/campaign-monitor/">Campaign Monitor</a>
* <a href="https://www.jigoshop.com/product/discfoo/">Discfoo</a>
* <a href="https://www.jigoshop.com/product/end-of-product-sale/">End Of Product Sale</a>
* <a href="https://www.jigoshop.com/product/filtering-premium/">Filtering Premium</a>
* <a href="https://www.jigoshop.com/product/gravity-forms-integration/">Gravity Forms Integration</a>
* <a href="https://www.jigoshop.com/product/grouped-products-pro/">Grouped Products Pro</a>
* <a href="https://www.jigoshop.com/product/intuitive-custom-post-order/">Intuitive Custom Post Order</a>
* <a href="https://www.jigoshop.com/product/jigoshop-add-custom-button/">Jigoshop Add Custom Button</a>
* <a href="https://www.jigoshop.com/product/jigoshop-category-purchasers/">Jigoshop Category Purchasers</a>
* <a href="https://www.jigoshop.com/product/jigoshop-configurable-products/">Jigoshop Configurable Products</a>
* <a href="https://www.jigoshop.com/product/jigoshop-custom-availability/">Jigoshop Custom Availability</a>
* <a href="https://www.jigoshop.com/product/jigoshop-html-emails/">Jigoshop HTML Emails</a>
* <a href="https://www.jigoshop.com/product/jigoshop-linnworks-integration/">Jigoshop Linnworks Integration</a>
* <a href="https://www.jigoshop.com/product/jigoshop-opening-times/">Jigoshop Opening Times</a>
* <a href="https://www.jigoshop.com/product/jigoshop-price-on-request/">Jigoshop Price On Request</a>
* <a href="https://www.jigoshop.com/product/jigoshop-product-accessories/">Jigoshop Product Accessories</a>
* <a href="https://www.jigoshop.com/product/jigoshop-product-changes-notification/">Jigoshop Product Changes Notification</a>
* <a href="https://www.jigoshop.com/product/jigoshop-product-comparison/">Jigoshop Product Comparison</a>
* <a href="https://www.jigoshop.com/product/jigoshop-product-purchasers/">Jigoshop Product Purchasers</a>
* <a href="https://www.jigoshop.com/product/jigoshop-products-of-the-day/">Jigoshop Products Of The Day</a>
* <a href="https://www.jigoshop.com/product/jigoshop-products-of-the-month/">Jigoshop Products of the Month</a>
* <a href="https://www.jigoshop.com/product/jigoshop-putler-connector/">Jigoshop Putler Connector</a>
* <a href="https://www.jigoshop.com/product/jigoshop-quantity-on-lists/">Jigoshop Quantity On Lists</a>
* <a href="https://www.jigoshop.com/product/jigoshop-seo-deluxe-plugin/">Jigoshop SEO Deluxe Plugin</a>
* <a href="https://www.jigoshop.com/product/jigoshop-sold/">Jigoshop Sold Graphic Icon</a>
* <a href="https://www.jigoshop.com/product/jigoshop-split-paypal-sales/">Jigoshop Split Paypal Sales</a>
* <a href="https://www.jigoshop.com/product/jigoshop-statistics-2/">Jigoshop Statistics</a>
* <a href="https://www.jigoshop.com/product/jigoshop-wish-list/">Jigoshop Wish List</a>
* <a href="https://www.jigoshop.com/product/learndash-learning-management-platform/">LearnDash Learning Management Platform</a>
* <a href="https://www.jigoshop.com/product/limited-time-deals/">Limited Time Deals</a>
* <a href="https://www.jigoshop.com/product/mailchimp/">MailChimp</a>
* <a href="https://www.jigoshop.com/product/mailchimp-signup-widget/">MailChimp Signup Widget</a>
* <a href="https://www.jigoshop.com/product/mailpoet-jigoshop-add/">MailPoet Jigoshop Add-on</a>
* <a href="https://www.jigoshop.com/product/new-product-badge/">New Product Badge</a>
* <a href="https://www.jigoshop.com/product/product-commissions/">Product Commissions</a>
* <a href="https://www.jigoshop.com/product/random-product-widget/">Random Product Widget</a>
* <a href="https://www.jigoshop.com/product/responsive-swipe-product-slider-and-carousel/">Responsive Swipe Product Slider and Carousel</a>
* <a href="https://www.jigoshop.com/product/sale-flash-options/">Sale Flash Options</a>
* <a href="https://www.jigoshop.com/product/shipworks-connector/">ShipWorks Connector</a>
* <a href="https://www.jigoshop.com/product/simple-seo-meta-tags/">Simple SEO Meta Tags</a>
* <a href="https://www.jigoshop.com/product/up-sells-cross-sells/">Up-sells &#038; Cross-sells</a>
* <a href="https://www.jigoshop.com/product/viral-coupon-for-jigoshop/">Viral Coupon for Jigoshop</a>
* <a href="https://www.jigoshop.com/product/youtube-video-tab/">YouTube Video Tab</a>

= Shipping =

* <a href="https://www.jigoshop.com/product/add-flat-rate-shipping/">Add Flat Rate Shipping</a>
* <a href="https://www.jigoshop.com/product/australia-post-shipping-calculator/">Australia Post &#8211; Official Shipping Calculator</a>
* <a href="https://www.jigoshop.com/product/basic-bundle-shipping/">Basic Bundle Shipping</a>
* <a href="https://www.jigoshop.com/product/bring-shipping-method/">Bring Shipping Method</a>
* <a href="https://www.jigoshop.com/product/bundle-rate-shipping/">Bundle Rate Shipping</a>
* <a href="https://www.jigoshop.com/product/checkout-fields-manager/">Checkout Fields Manager</a>
* <a href="https://www.jigoshop.com/product/fedex-shipping-rates/">Fedex Shipping Rates</a>
* <a href="https://www.jigoshop.com/product/irish-an-post-shipping-module-for-jigoshop/">Irish An Post Shipping Module for Jigoshop</a>
* <a href="https://www.jigoshop.com/product/jigoshop-basic-weight-shipping/">Jigoshop Basic Weight Shipping</a>
* <a href="https://www.jigoshop.com/product/jigoshop-delivery-periods/">Jigoshop Delivery Periods</a>
* <a href="https://www.jigoshop.com/product/jigoshop-delivery-times/">Jigoshop Delivery Times</a>
* <a href="https://www.jigoshop.com/product/jigoshop-new-zealand-post-shipping/">Jigoshop New Zealand Post Shipping</a>
* <a href="https://www.jigoshop.com/product/jigoshop-smart-send-shipping/">Jigoshop Smart Send Shipping</a>
* <a href="https://www.jigoshop.com/product/pdf-invoices-and-packing-slips/">Official PDF Invoices</a>
* <a href="https://www.jigoshop.com/product/jigoshop-ups-shipping/">Official UPS Shipping</a>
* <a href="https://www.jigoshop.com/product/per-product-shipping/">Per Product Shipping</a>
* <a href="https://www.jigoshop.com/product/premium-shipping/">Premium Shipping</a>
* <a href="https://www.jigoshop.com/product/royal-mail-shipping/">Royal Mail Shipping</a>
* <a href="https://www.jigoshop.com/product/sequential-order-numbers/">Sequential and Custom Order Numbers</a>
* <a href="https://www.jigoshop.com/product/shipping-details-plugin-for-jigoshop/">Shipping Details Plugin</a>
* <a href="https://www.jigoshop.com/product/specific-country-states-delivery/">Specific Country and States Delivery</a>
* <a href="https://www.jigoshop.com/product/table-rate-shipping/">Table Rate Shipping</a>
* <a href="https://www.jigoshop.com/product/usps-advanced-shipping/">USPS Advanced Shipping</a>

= Payment Gateways =

* <a href="https://www.jigoshop.com/product/2checkout-payment-form/">2Checkout Payment Form</a>
* <a href="https://www.jigoshop.com/product/alertpay-gateway/">AlertPay Gateway</a>
* <a href="https://www.jigoshop.com/product/amazon-fps-payment-gateway/">Amazon FPS Payment Gateway</a>
* <a href="https://www.jigoshop.com/product/anz-egate/">ANZ eGate</a>
* <a href="https://www.jigoshop.com/product/authorize-net-dpm/">Authorize.Net DPM</a>
* <a href="https://www.jigoshop.com/product/authorize-net-pro/">Authorize.Net PRO</a>
* <a href="https://www.jigoshop.com/product/bcash/">Bcash</a>
* <a href="https://www.jigoshop.com/product/beanstream-payment-gateway/">BeanStream Payment Gateway</a>
* <a href="https://www.jigoshop.com/product/bluepay-for-jigoshop/">BluePay for Jigoshop</a>
* <a href="https://www.jigoshop.com/product/braintree-payment-supports/">Braintree Payment Supports</a>
* <a href="https://www.jigoshop.com/product/cardsave-payment-gateway-hosted/">CardSave Payment Gateway &#8211; Hosted</a>
* <a href="https://www.jigoshop.com/product/cardsave-payment-gateway/">CardSave Payment Gateway &#8211; Integrated</a>
* <a href="https://www.jigoshop.com/product/certoconnec-payment-gateway/">CertoConnect Payment Gateway</a>
* <a href="https://www.jigoshop.com/product/checkout-by-amazon-payment-gateway/">Checkout by Amazon Payment Gateway</a>
* <a href="https://www.jigoshop.com/product/click-buy-payment-gateway/">Click-and-Buy Payment Gateway</a>
* <a href="https://www.jigoshop.com/product/commonwealth-bank-payment-gateway-extension/">Commonwealth Bank Payment Gateway Extension</a>
* <a href="https://www.jigoshop.com/product/credimax-payment-gateway/">CrediMax Payment Gateway</a>
* <a href="https://www.jigoshop.com/product/custom-payment-gateway/">Custom Payment Gateway</a>
* <a href="https://www.jigoshop.com/product/cybersource-payment-gateway/">CyberSource Payment Gateway</a>
* <a href="https://www.jigoshop.com/product/datacash-payment-gateway/">DataCash Payment Gateway</a>
* <a href="https://www.jigoshop.com/product/dibs-payment-gateway/">DIBS Payment Gateway</a>
* <a href="https://www.jigoshop.com/product/dineromail/">DineroMail</a>
* <a href="https://www.jigoshop.com/product/directone-payment-gateway/">DirectOne Payment Gateway</a>
* <a href="https://www.jigoshop.com/product/dotpay-payment-gateway/">DotPay Payment Gateway</a>
* <a href="https://www.jigoshop.com/product/dwolla-gateway-for-jigoshop/">Dwolla Gateway for Jigoshop</a>
* <a href="https://www.jigoshop.com/product/ebs-gateway/">EBS Gateway</a>
* <a href="https://www.jigoshop.com/product/egopay-gateway-for-jigoshop/">EgoPay Gateway for Jigoshop</a>
* <a href="https://www.jigoshop.com/product/jigoshop-epaybg-gateway/">ePay.bg Payment Gateway</a>
* <a href="https://www.jigoshop.com/product/jigoshop-eway-australia-gateway/">eWay Australia Payment Gateway</a>
* <a href="https://www.jigoshop.com/product/eway-new-zealand-payment-gateway/">eWay New Zealand Payment Gateway</a>
* <a href="https://www.jigoshop.com/product/eway-payment-gateway/">eWAY Payment Gateway</a>
* <a href="https://www.jigoshop.com/product/eway-united-kingdom-payment-gateway/">eWay United Kingdom Payment Gateway</a>
* <a href="https://www.jigoshop.com/product/fastway-au-shipping-extension/">Fastway AU Shipping Extension</a>
* <a href="https://www.jigoshop.com/product/fat-zebra-gateway/">Fat Zebra Gateway</a>
* <a href="https://www.jigoshop.com/product/firstdata-global-payment-gateway/">FirstData Global Payment Gateway</a>
* <a href="https://www.jigoshop.com/product/freshbooks-for-jigoshop/">Freshbooks for Jigoshop</a>
* <a href="https://www.jigoshop.com/product/gateway-fees-integration-for-jigoshop/">Gateway Fees Integration for Jigoshop</a>
* <a href="https://www.jigoshop.com/product/goemerchant-payment-gateway-for-jigoshop/">GoEmerchant Payment Gateway for Jigoshop</a>
* <a href="https://www.jigoshop.com/product/google-checkout/">Google Checkout</a>
* <a href="https://www.jigoshop.com/product/gopay-cz-payment-gateway/">GoPay.cz Payment Gateway</a>
* <a href="https://www.jigoshop.com/product/ideal-payment-gateway/">iDEAL Payment Gateway</a>
* <a href="https://www.jigoshop.com/product/intuit-innovative-payment-gateway/">Intuit Innovative Payment Gateway</a>
* <a href="https://www.jigoshop.com/product/ipay88-payment-gateway/">iPay88 Payment Gateway</a>
* <a href="https://www.jigoshop.com/product/wordpress-jigoshop-abn-amro-internetkassa-credit-card-module/">Jigoshop ABN Amro Internetkassa Credit Card Module</a>
* <a href="https://www.jigoshop.com/product/jigoshop-acceptance-paytool-credit-card-module/">Jigoshop Acceptance PayTool Credit Card Module</a>
* <a href="https://www.jigoshop.com/product/jigoshop-amazon-simple-gateway/">Jigoshop Amazon Simple Pay Gateway</a>
* <a href="https://www.jigoshop.com/product/jigoshop-authorize-net-cim-payment-gateway/">Jigoshop Authorize.Net CIM Payment Gateway</a>
* <a href="https://www.jigoshop.com/product/jigoshop-barclaycard-epdq-credit-card-module/">Jigoshop BarclayCard ePDQ Credit Card Module</a>
* <a href="https://www.jigoshop.com/product/jigoshop-concardis-payengine-credit-card-module/">Jigoshop ConCardis PayEngine Credit Card Module</a>
* <a href="https://www.jigoshop.com/product/wordpress-jigoshop-ogone-credit-card-module/">Jigoshop Ogone Credit Card Module</a>
* <a href="https://www.jigoshop.com/product/jigoshop-payjunction-gateway/">Jigoshop PayJunction Gateway</a>
* <a href="https://www.jigoshop.com/product/jigoshop-paypal-advanced/">Jigoshop PayPal Advanced</a>
* <a href="https://www.jigoshop.com/product/jigoshop-paypal-express-gateway/">Jigoshop PayPal Express Gateway</a>
* <a href="https://www.jigoshop.com/product/jigoshop-paypal-payflow-pro-gateway/">Jigoshop PayPal Payflow Pro Gateway</a>
* <a href="https://www.jigoshop.com/product/jigoshop-postfinance-credit-card-module/">Jigoshop PostFinance Credit Card Module</a>
* <a href="https://www.jigoshop.com/product/jigoshop-saferpay-credit-card-module/">Jigoshop Saferpay Credit Card Module</a>
* <a href="https://www.jigoshop.com/product/jigoshop-sagepay-direct/">Jigoshop SagePay Direct</a>
* <a href="https://www.jigoshop.com/product/klarna-payment-gateway/">Klarna Payment Gateway</a>
* <a href="https://www.jigoshop.com/product/korta-gateway/">Korta Gateway</a>
* <a href="https://www.jigoshop.com/product/login-pay-amazon/">Login and Pay with Amazon</a>
* <a href="https://www.jigoshop.com/product/molpay-gateway-for-jigoshop/">MOLPay Gateway for Jigoshop</a>
* <a href="https://www.jigoshop.com/product/moneris-direct-us-gateway/">Moneris Direct US Gateway</a>
* <a href="https://www.jigoshop.com/product/moneris-eselectplus-payment-gateway/">Moneris eSelectPlus Payment Gateway</a>
* <a href="https://www.jigoshop.com/product/monsterpay-gateway/">MonsterPay gateway</a>
* <a href="https://www.jigoshop.com/product/mygate-payment-gateway/">MyGate Payment Gateway</a>
* <a href="https://www.jigoshop.com/product/nabtransact-direct-gateway/">NAB Transact Direct Gateway</a>
* <a href="https://www.jigoshop.com/product/netbanx-payment-gateway/">Netbanx Payment Gateway</a>
* <a href="https://www.jigoshop.com/product/netbilling-payment-gateway/">NETbilling Payment Gateway</a>
* <a href="https://www.jigoshop.com/product/nmi-payments-gateway/">NMI Payments Gateway</a>
* <a href="https://www.jigoshop.com/product/nochex-payment-gateway/">Nochex Payment Gateway</a>
* <a href="https://www.jigoshop.com/product/offline-credit-card-processing/">Offline Credit Card Processing</a>
* <a href="https://www.jigoshop.com/product/pagseguro-payment-gateway/">PagSeguro Payment Gateway</a>
* <a href="https://www.jigoshop.com/product/payfast-payment-gateway/">PayFast Payment Gateway</a>
* <a href="https://www.jigoshop.com/product/payleap-payment-gateway-for-jigoshop/">PayLeap Payment Gateway for Jigoshop</a>
* <a href="https://www.jigoshop.com/product/payment-express-dps-hosted/">Payment Express DPS Hosted Gateway</a>
* <a href="https://www.jigoshop.com/product/payment-express-px-post/">Payment Express PX Post</a>
* <a href="https://www.jigoshop.com/product/paymentsense-gateway/">PaymentSense Gateway</a>
* <a href="https://www.jigoshop.com/product/paymill-payment-gateway-for-jigoshop/">Paymill Payment Gateway for Jigoshop</a>
* <a href="https://www.jigoshop.com/product/paypal-digital-goods-gateway/">PayPal Digital Goods Gateway</a>
* <a href="https://www.jigoshop.com/product/jigoshop-paypal-pro/">PayPal Pro</a>
* <a href="https://www.jigoshop.com/product/payson-payment-gateway/">Payson Payment Gateway</a>
* <a href="https://www.jigoshop.com/product/paytrace-gateway/">PayTrace Gateway</a>
* <a href="https://www.jigoshop.com/product/payu-for-czech-republic-payment-gateway/">PayU for Czech Republic Payment Gateway</a>
* <a href="https://www.jigoshop.com/product/payu-payment-gateway/">PayU for Poland Payment Gateway</a>
* <a href="https://www.jigoshop.com/product/payu-latam/">PayU Latam</a>
* <a href="https://www.jigoshop.com/product/payu-romania/">PayU Romania</a>
* <a href="https://www.jigoshop.com/product/payu-russia/">PayU Russia</a>
* <a href="https://www.jigoshop.com/product/payu-turkey/">PayU Turkey</a>
* <a href="https://www.jigoshop.com/product/payu-ukraine/">PayU Ukraine</a>
* <a href="https://www.jigoshop.com/product/payway-api-westpac-gateway-for-jigoshop/">PayWay API (Westpac) Gateway for Jigoshop</a>
* <a href="https://www.jigoshop.com/product/payza-payment-gateway/">Payza Payment Gateway</a>
* <a href="https://www.jigoshop.com/product/pin-payments-payment-gateway/">Pin Payments Payment Gateway</a>
* <a href="https://www.jigoshop.com/product/plugn-pay-direct-gateway-for-jigoshop/">Plug&#8217;n Pay Direct Gateway for Jigoshop</a>
* <a href="https://www.jigoshop.com/product/plugn-pay-redirect-gateway-for-jigoshop/">Plug&#8217;n Pay Redirect Gateway for Jigoshop</a>
* <a href="https://www.jigoshop.com/product/przelewy24-payment-gateway/">Przelewy24 Payment Gateway</a>
* <a href="https://www.jigoshop.com/product/psigate-payment-gateway/">PSiGate Payment Gateway</a>
* <a href="https://www.jigoshop.com/product/quantum-payment-gateway/">Quantum Payment Gateway</a>
* <a href="https://www.jigoshop.com/product/quickbooks-payment-gateway/">QuickBooks Payment Gateway</a>
* <a href="https://www.jigoshop.com/product/quickpay-payment-gateway/">QuickPay Payment Gateway</a>
* <a href="https://www.jigoshop.com/product/rbk-money-for-jigoshop/">RBK Money for Jigoshop</a>
* <a href="https://www.jigoshop.com/product/realex-payment-gateway/">Realex Payment Gateway</a>
* <a href="https://www.jigoshop.com/product/robokassa-payment-gateway-for-jigoshop/">Robokassa Payment Gateway for Jigoshop</a>
* <a href="https://www.jigoshop.com/product/sagepay-form/">SagePay Form integration</a>
* <a href="https://www.jigoshop.com/product/sagepay-go/">SagePay Go</a>
* <a href="https://www.jigoshop.com/product/sagepay-server-inframe-integration/">SagePay Server Inframe integration</a>
* <a href="https://www.jigoshop.com/product/sagepay-server-integration/">SagePay Server integration</a>
* <a href="https://www.jigoshop.com/product/securenet-payment-gateway-for-jigoshop/">SecureNet Payment Gateway for Jigoshop</a>
* <a href="https://www.jigoshop.com/product/sermepa-gateway/">Sermepa Gateway</a>
* <a href="https://www.jigoshop.com/product/sisow-gateway-for-jigoshop/">Sisow Gateway for Jigoshop</a>
* <a href="https://www.jigoshop.com/product/skrill/">Skrill</a>
* <a href="https://www.jigoshop.com/product/stripe-for-jigoshop/">Stripe for Jigoshop</a>
* <a href="https://www.jigoshop.com/product/swipe-hq-payment-gateway/">Swipe HQ Payment Gateway</a>
* <a href="https://www.jigoshop.com/product/trustcommerce-payment-gateway/">TrustCommerce Payment Gateway</a>
* <a href="https://www.jigoshop.com/product/usa-epay-gateway/">USA ePay gateway</a>
* <a href="https://www.jigoshop.com/product/virtual-merchant-gateway/">Virtual Merchant Gateway</a>
* <a href="https://www.jigoshop.com/product/wirecard-payment-gateway/">Wirecard Payment Gateway</a>
* <a href="https://www.jigoshop.com/product/wordpress-jigoshop-viveum-credit-card-module/">WordPress Jigoshop Viveum Credit Card Module</a>
* <a href="https://www.jigoshop.com/product/worldpay-xml-direct-gateway-for-jigoshop/">WorldPay XML Direct Gateway for Jigoshop</a>
* <a href="https://www.jigoshop.com/product/zaakpay-payment-gateway/">ZaakPay Payment Gateway</a>

= Official Themes =

* <a href="https://www.jigoshop.com/product/corellian/">Corellian</a>
* <a href="https://www.jigoshop.com/product/jigoshop-reddish/">Jigoshop Reddish</a>
* <a href="https://www.jigoshop.com/product/jigotheme/">Jigotheme</a>
* <a href="https://www.jigoshop.com/product/origin/">Origin</a>
* <a href="https://www.jigoshop.com/product/overload/">Overload</a>
* <a href="https://www.jigoshop.com/product/serenum/">Serenum</a>
* <a href="https://www.jigoshop.com/product/stitched/">Stitched</a>
* <a href="https://www.jigoshop.com/product/trend-shop/">Trend Shop</a>
