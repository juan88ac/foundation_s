foundation_s
===

Based on starter theme called `_s`, or `underscores` & foundation zurb framework. check http://foundation.zurb.com/

It´s created to make theme developers life easier, mixing different frameworks which simplify the launch of a new project. All this frameworks handle Custom post Types creation, Metaboxes, Responsive design, Theme options features.

- Custom Header image enable. Check inc/custom-header.php for _s to see how it work. The code is inserted in header.php
- Custom Logo inserted into image in < header h1 a >. If there is not image will show the site name.
- Footer Menu. As Submenu using foundation sub-nav styles.
- Footer Multi Sidebars, change to have one, two o three columns. Copy from twentytwelve system.
- Widgets use foundation panel styles.
- Thumbnail enable for Pages, Posts & Slider, inserted inside partials/content-page.php, content-single.php & content.php. Image sizes set it in functions.php
- Slider Custom Post Type create Orbit slider, check partials/content-slider.php. check also templates/template-slider.php
- footer.php have Copyright, Year, Credits and Developer info. And WP font icon logo :)
- hacks.php file with some WP core hacks, like remove useless widgets, remove wp logo from admin bar, logo from login and more.
- Clearing markup for native gallery shortcode [gallery]. The markup is inside inc/new-gallery-markup.php. NOT FINISHED: the thumbnail size not working :(
- Support for foundation sub-nav in footer-menu in footer.php using new markup with custom walker. check inc/custom-menu-walker.php. NOT FINISHED: it doesn´t use current-menu-item to be replace it with active class.
- JSs hacks for WP_Nav_Menu_Widget to use foundation side-nav classes. check js/app.js
- Comments submit button use foundation small button round styles. check is/app.js
- Use of FontIcons by http://icomoon.io/app. Styles in scss/icon-fonts.scss, how to use in fonts/index.html
- Social fields for author profile. Facebook, Google Plus, Twitter & Linkedin.
- Author Bio template under post inside partials/content-bio.php. Use font icons for social networks links.
- Footer link for legal pages, selected on theme options panel. check: options.php and query in footer.php
- Custom Comments & Comment Form. ALERT: it works but debuggin get me "NOTICE: it works but give me an "Undefined variable: aria_req ... post_id" looking for a solution :P
- Header social links. check header.php
- vcard inside contact page template. check partials/content-contact.php


Page Templates:
- Right Sidebar
- Left Sidebar
- Slider
- Contact
- Front Page, it use slider. Next update: new layout
SOON!
- Portfolio
- Gallery


foundation settings
===

- The foundation.min.css is generated using codekit and foundation components scss files as codekit framework. Thank good they don´t use COMPASS :)
- scss/foundation have _variables.scss for foundation dimentions, gutter, etc. And foundation.scss wich calls all foundation scss files, if you don´t use codekit isert there the foundation scss files.
- foundation javascrips are enqueued by inc/foundation.php.
- js/foundation-setttings.js is to write foundation modules variables and settings. NOT FINISHED.
- All foundation js files are in js/foundation
- app.js is special js for theme configuration, as add class for dropdown menu and others.
- vento.js is in the footer.php.
- top-bar navigation enable, its display site name in < ul.title-area .name > and use .hide-for-small to remove < header hgroup > for mobile screens.
- top-bar use magellan plugin to fix the nav when scroll. check header.php



theme options framework
===

Thanx @davinsays for create this https://github.com/devinsays/options-framework-theme, foundation_s is fully integrated with this framework

- Just edit options.php file to create the options fields.
- Brand settings: Upload a logo, links color, link hover color, menu color, menu link color, menu link color hover. This colors also affect to buttons.
- Social Networks links: Facebook, Twitter, Linkedin, WP.org, Youtube, Vimeo, Google+, Instagram, Flickr, Dribbble.
- Contact details: Address, Postal code, Location, Phone, Email, Google Maps (use url to display man inside an iframe)
- Footer links: Select pages links to be in the footer like, Legal, Contact, Credits.



Advanced Custom Post Types Framework
===

IMPORTANT: Don´t know why but when create the .zip file to download form github it doesn´t bring the config.php file from this framework, please create a config.php inside of the acpt folder using this as a base: https://github.com/kevindees/advanced_custom_post_types/blob/master/sample-config.php

@kevindees create this easy code :) I prefer to use this than plugins, it also create nice metaboxes and taxonomies :). check https://github.com/kevindees/advanced_custom_post_types

- foundation_s load the framework using inc/acpt.php
- create post types, taxonomies & metaboxes in inc/acpt.php
CPTS:
- Slider
- Portfolio



SCSS
===

NOTE: style.css have the basic content styles from _s. I remove the rest becasue prefer the foudnation modernizr.

- style.scss (import styles)
- common.scss
- header.scss (import slider.scss) for Orbit.
- footer.scss
- content.scss (for all post and pages content)
- sidebars.scss
- slider.scss
- icon-font.scss (basic styles to use icomoon font icons)
- comments.scss
- contact.scss



Getting Started with Theme functions. This are the same as `underscores`
---------------

If you want to keep it simple, head over to http://underscores.me and generate your `_s` based theme from there. You just input the name of the theme you want to create, click the "Generate" button, and you get your ready-to-awesomize starter theme.

If you want to set things up manually, download `_s` from github. The first thing you want to do is copy the `_s` directory and change the name to something else — Like, say, `megatherium` — then you'll need to do a three-step find and replace on the name in all the templates.

1. Search for `'_s'` (inside single quotations) to capture the text domain.
2. Search for `_s_` to capture all the function names.
3. Search for ` _s` (with a space before it) to capture DocBlocks.
4. Search for `_s-` to capture prefixed handles.

OR

* Search for: `'_s'` and replace with: `'megatherium'`
* Search for: `_s_` and replace with: `megatherium_`
* Search for: <code>&nbsp;_s</code> and replace with: <code>&nbsp;Megatherium</code>
* Search for: `_s-` and replace with: `megatherium-`

Then, update the stylesheet header in style.css and the links in footer.php with your own information. Next, update or delete this readme.

Now you're ready to go! The next step is easy to say but harder to do: make an awesome WordPress theme. :)

---------------


Any idea or suggestion is wellcome :)
