foundation_s
===

Based on starter theme called `_s`, or `underscores` & foundation zurb framework. check http://foundation.zurb.com/

It´s created to make theme developers life easier, mixing different frameworks which simplify the launch of a new project. All this frameworks handle Custom post Types creation, Metaboxes, Responsive design, Theme options features.

- Custom Header image enable. Check inc/custom-header.php for _s to see how it work. THe code is inserted in header.php
- Rightbar.php and Leftbar Page template.
- Footer Menu.
- Footer Multi Sidebars. Copy from twentytwelve sistem.
- Widgets use foundation panel styles.
- Thumbnail enable for Pages & Posts, inserted inside partials/content-page.php, content-single.php & content.php. Image sizes sett it in functions.php
- Slider Custom Post Type create Orbit slider, check partials/content-slider.php for orbit template. home.php show the slider.
- footer.php have Copyright, Year, Credits and Developer info. And WP tiny logo :)
- hacks.php file with some WP core hacks, like remove useless widgets, wp logo from admin bar, logo from login and more.
- Clearing markup for native gallery shortcode [gallery]. The markup is inside inc/new-gallery-markup.php. NOT FINISHED: the thumbnail size is not working :(
- Support for foundation sub-nav in footer-menu in footer.php using new markup with custom walker. check inc/custom-menu-walker.php. NOT FINISHED: it doesn´t use current-menu-item to be replace it with active class.
- JSs hacks for WP_Nav_Menu_Widget to use foundation side-nav classes. check js/app.js
- Comments submit button use foundation small button round styles. check is/app.js
- Use of FontIcons by http://icomoon.io/app. Styles in scss/icon-fonts.scss, how to use in fonts/index.html
- Social fields for author profile. Facebook, Google Plus, Twitter & Linkedin.
- Author Bio template under post inside partials/content-bio.php. Use font icons for social networks links.


foundation settings
===

- The foundation.min.css is generated using codekit and foundation components scss files as codekit framework. Thank good they don´t use COMPASS :)
- scss/foundation have _variables.scss for foundation dimentions, gutter, etc. And foundation.scss wich calls all foundation scss files, if you don´t use codekit isert there the foundation scss files.
- foundation javascrips are enqueued by inc/foundation.php.
- js/foundation-setttings.js is to write foundation modules variables and settings. (not finish yet)
- All foundation js files are in js/foundation
- app.js is special js for theme configuration, as add class for dropdown menu works.
- vento.js is in the footer.php.
- top-bar navigation enable, its display site name in < ul.title-area .name > and use .hide-for-small to remove < header hgroup > for mobile screens.



theme options framework
===

Thanx @davinsays for create this https://github.com/devinsays/options-framework-theme, foundation_s is fully integrated with this framework

- Just edit options.php file to create the options fields.
- Logo field set and inserted into image in header h1. If there is not image will show the site name.



Advanced Custom Post Types Framework
===

@kevindees invet this easy code :) I prefer to use this than plugins, it also create nice metaboxes and taxonomies :). check https://github.com/kevindees/advanced_custom_post_types

- foundation_s load the framework using inc/acpt.php
- create post types, taxonomies & metaboxes in inc/acpt.php



SCSS
===

NOTE: style.css have the basic content styles from _s. I remove the rest becasue prefer the foudnation modernizr.

- style.scss (import styles)
- common.scss
- header.scss (import slider.scss) for Orbit.
- footer.scss
- content.scss (for all post and pages content)
- sidebar.scss





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
