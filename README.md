foundation_s
===

Based on starter theme called `_s`, or `underscores` & foundation zurb framework. check http://foundation.zurb.com/



foundation settings
===

- The foundation.min.css is generated using codekit and foundation components scss files as codekit framework. Thank good they don´t use COMPASS :)
- scss/foundation have _variables.scss for foundation dimentions, gutter, etc. And foundation.scss wich calls all foundation scss files, if you don´t use codekit isert there the foundation scss files.
- foundation javascrips are enqueued by inc/functions.php.
- js/foundation-setttings.js is to write foundation modules variables and settings. (not finish yet)
- All foundation js files are in js/foundation
- app.js is special js for theme configuration, as add class for dropdown menu works.
- vento.js is in the footer.php.



theme options frameowrk
===

Thanx @davinsays for create this https://github.com/devinsays/options-framework-theme, foundation_s is fully integrated with this framework

- Just edit options.php file to create the options fields.



Advanced Custom Post Types Framework
===

@kevindees invet this easy code :) I prefer to use this than plugins, it also create nice metaboxes and taxonomies :). check https://github.com/kevindees/advanced_custom_post_types

- foundation_s load the framwork using inc/acpt.php
- create post types, taxonomies & metaboxes in inc/acpt.php



SCSS
===

NOTE: style.css have the basic content styles from _s. I remove the rest becasue prefer the foudnation modernizr.

- common.scss
- header.scss
- style.scss




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
