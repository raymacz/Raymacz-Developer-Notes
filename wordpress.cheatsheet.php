//* Theme Basic Structure
header.php ...................... Header Section
index.php ......................... Main Section / Main Template
  - The main template. If your Theme provides its own templates, index.php must be present.
home.php ..........................  Home Page
  - The home page template.
sidebar.php .................... Sidebar Section
single.php ....................... Post Template / Single Post Page
  - The single post template. Used when a single post is queried. For this and all other query
  templates, index.php is used if the query template is not present.
page.php ......................... Single Page Template
  - The page template. Used when an individual Page is queried.
category.php ...................... category template
  - The category template. Used when a category is queried.
author.php ........................ author template
  - The author template. Used when an author is queried.
date.php .......................... date/time template
  - The date/time template. Used when a date or time is queried. Year, month, day, hour,
  minute, second.
comments.php ................. Comment Template
  - the comments template. If not present, comments.php from the "default" Theme is used.
comments-popup.php ........ Popup Comment Template
  - The popup comments template. If not present, comments-popup.php from the "default"
  Theme is used.
search.php ...................... Search Content
  - The search results template. Used when a search is performed.
searchform.php ............ Search Form Template
  - The 404 Not Found template. Used when WordPress cannot find a post or page that
  matches the query.
archive.php ................... Archive / Category Template template will be overridden by category.php, author.php, and date.php respectively
functions.php ................ Special Functions
404.php .................... Error Page template
style.css .......................... Style Sheet
  - the main stylesheet. This must be included with your Theme, and it must contain the information header for your Theme.
footer.php ......................... Footer content

*/

<?php
// THE LOOPS
if (have_posts()); //
while (have_posts()); the_post();  the_content();//
// CATEGORY BASED LOOP
query_posts('category_name=Category&showposts=10');
                      while (have_posts()) : the_post(); the_content();;
          endwhile;
// The Stuff... Custom HTML & PHP Code


//https://codex.wordpress.org/Child_Themes
?>

<?php

// THEME DEFINITION short
/*
Theme Name: Wordpress
Theme URI: http://wordpress.org/
Description: Test Blog
Version: 1.6
Author: Ekin Ertaç
Author URI: http://ekinertac.com
Tags: powerful, cheat, sheet
*/
// THEME DEFINITION long
/*
 Theme Name:   Twenty Fifteen Child
 Theme URI:    http://example.com/twenty-fifteen-child/
 Description:  Twenty Fifteen Child Theme
 Author:       John Doe
 Author URI:   http://example.com
 Template:     twentyfifteen
 Version:      1.0.0
 License:      GNU General Public License v2 or later
 License URI:  http://www.gnu.org/licenses/gpl-2.0.html
 Tags:         light, dark, two-columns, right-sidebar, responsive-layout, accessibility-ready, mantle color, variable width, widgets
 Text Domain:  twenty-fifteen-child
*/

?>

<?php
// TEMPLATE INCLUDE TAGS
get_header(); // otherwise include wp-content/themes/default/header.php
get_sidebar(); // otherwise include wp-content/themes/default/sidebar.php
get_footer(); // otherwise include wp-content/themes/default/footer.php
comments_template(); // otherwise include wp-content/themes/default/comments.php
include (‘sample_any.php’); // PHP function – include any template

// TEMPLATE FUNCTION

wp_title(); // Description Title of the specific post or page
wp_get_archives();// Displays a date-based archives list
wp_list_authors(); // Displays a list of the blog's authors (users)
wp_list_bookmarks(); //Displays bookmarks found in the Administration > Blogroll > Manage Blogroll panel
wp_list_pages(); // Displays all a list of WordPress Pages as links
wp_register(); // Displays either the "Register" link to users that are not logged in or the "Site Admin" link if a user is logged in
wp_loginout(); // Displays the log in/out link  (login link, or if a user is logged in, a logout link)
wp_tag_cloud(); // Displays a list of tags called 'tag cloud'
bloginfo('param'); // 'name' Displays information about blog (see table below)


// API HOOKS

wp_head(); // Goes in the HTML <head> element of a theme; header.php template
wp_footer(); // Goes in the "footer" of a theme; footer.php template
wp_meta(); // Meta for administrators // Typically goes in the <li>Meta</li> section of a theme's menu or sidebar; sidebar.php template
comment_form(); // Goes in comments.php and comments-popup.php, directly before the comment form's closing tag (</form>)

/// TEMPLATE TAGS

// /%postname%/ // Custom permalinks



<?php _e('Message');?> // Prints out message
wp_list_cats(); // Displays the categories
the_search_query(); // Value for search form
timer_stop(1); // Time to load the page
 get_num_queries(); // Queries to load the page

echo c2c_custom('test');// Displays the custom field 1
get_links_list(); // Display links from Blogroll; list of pages

// Date and Time Tagsthe_date_xml
the_time(); // 'm-­‐d-­‐y' Displays the time of the current post/page
the_date(); // Displays the date of a post or set of post/page
the_modified_date(); // (Version 2.1)  http://codex.wordpress.org/Template_Tags/the_modified_date
the_modified_time(); // http://codex.wordpress.org/Template_Tags/the_modified_time
get_the_time(); // (Version 1.5)  http://codex.wordpress.org/Template_Tags/get_the_time
get_calendar(); // Displays the built-in calendar http://codex.wordpress.org/Template_Tags/get_calendar
single_month_title(); // http://codex.wordpress.org/Template_Tags/single_month_title

//The Tag TAGS
the_tags(); // (Version 2.3)  http://codex.wordpress.org/Template_Tags/the_tags
get_the_tags(); // (Version 2.3) http://codex.wordpress.org/Template_Tags/get_the_tags
get_the_tag_list(); // (Version 2.3) http://codex.wordpress.org/Template_Tags/get_the_tag_list
single_tag_title(); // (Version 2.3) http://codex.wordpress.org/Template_Tags/single_tag_title
get_tag_link(); // http://codex.wordpress.org/Template_Tags/single_tag_title
wp_tag_cloud(); // (Version 2.3) http://codex.wordpress.org/Template_Tags/wp_tag_cloud
wp_generate_tag_cloud(); // http://codex.wordpress.org/Template_Tags/wp_generate_tag_cloud

// Link TAGS
edit_post_link(__('Edit Post'));  // Displays the edit link // http://codex.wordpress.org/Template_Tags/edit_post_link
edit_comment_link(); // http://codex.wordpress.org/Template_Tags/edit_comment_link
wp_link_pages(); // http://codex.wordpress.org/Template_Tags/wp_link_pages
get_year_link(); // http://codex.wordpress.org/Template_Tags/get_year_link
get_month_link(); // http://codex.wordpress.org/Template_Tags/get_month_link
get_day_link(); // http://codex.wordpress.org/Template_Tags/get_day_link
previous_posts_link(); // http://codex.wordpress.org/Template_Tags/previous_posts_link
next_posts_link(); // http://codex.wordpress.org/Template_Tags/next_posts_link
the_permalink(); // Displays the URL for the permalink

// Comment TAGS
comments_number(); // http://codex.wordpress.org/Template_Tags/comments_number
comments_link(); // http://codex.wordpress.org/Template_Tags/comments_link
comments_rss_link(); // http://codex.wordpress.org/Template_Tags/comments_rss_link
comments_popup_script(); // http://codex.wordpress.org/Template_Tags/comments_popup_script
comments_popup_link(); // Link of the posts comments http://codex.wordpress.org/Template_Tags/comments_popup_link
permalink_comments_rss(); // http://codex.wordpress.org/Template_Tags/permalink_comments_rss

// Comments TAGS inside the Loop Object
comment_ID(); // http://codex.wordpress.org/Template_Tags/comment_ID
comment_author(); // http://codex.wordpress.org/Template_Tags/comment_author
comment_author_IP(); // http://codex.wordpress.org/Template_Tags/comment_author_IP
comment_author_email(); // http://codex.wordpress.org/Template_Tags/comment_author_email
comment_author_url(); // http://codex.wordpress.org/Template_Tags/comment_author_url
comment_author_email_link(); // http://codex.wordpress.org/Template_Tags/comment_author_email_link
comment_author_url_link(); // http://codex.wordpress.org/Template_Tags/comment_author_url_link
comment_author_link(); // http://codex.wordpress.org/Template_Tags/comment_author_link
comment_type(); // http://codex.wordpress.org/Template_Tags/comment_type
comment_text(); // http://codex.wordpress.org/Template_Tags/comment_text
comment_excerpt(); // http://codex.wordpress.org/Template_Tags/comment_excerpt
comment_date(); // http://codex.wordpress.org/Template_Tags/comment_date
comment_time(); //  http://codex.wordpress.org/Template_Tags/comment_time
comment_author_rss(); // http://codex.wordpress.org/Template_Tags/comment_author_rss
comment_text_rss(); // http://codex.wordpress.org/Template_Tags/comment_text_rss
comment_link_rss(); // http://codex.wordpress.org/Template_Tags/comment_link_rss

//Links Manager Tags
wp_list_bookmarks(); // (Version 2.1) http://codex.wordpress.org/Template_Tags/wp_list_bookmarks
get_bookmarks(); // (Version 2.1) http://codex.wordpress.org/Template_Tags/get_bookmarks

// Post Tags
the_ID(); // Displays the numeric ID of the current post http://codex.wordpress.org/Template_Tags/the_ID
the_title(); // Displays the posts/pages title http://codex.wordpress.org/Template_Tags/the_title
the_title_attribute(); // (Version 2.3) http://codex.wordpress.org/Template_Tags/the_title_attribute
the_title_rss(); // http://codex.wordpress.org/Template_Tags/the_title_rss
the_content(); //  Displays the content of the post/page http://codex.wordpress.org/Template_Tags/the_content
the_content_rss(); // http://codex.wordpress.org/Template_Tags/the_content_rss
the_excerpt(); // Displays the excerpt of the current post/page http://codex.wordpress.org/Template_Tags/the_excerpt
the_excerpt_rss(); //  http://codex.wordpress.org/Template_Tags/the_excerpt_rss
the_meta(); // http://codex.wordpress.org/Template_Tags/the_meta
single_post_title(); // http://codex.wordpress.org/Template_Tags/single_post_title
previous_post_link(); // '%link' Displays previous link http://codex.wordpress.org/Template_Tags/previous_post_link
next_post_link(); // '%link' Displays Newer Posts link http://codex.wordpress.org/Template_Tags/next_post_link
posts_nav_link(); // Displays Previous page and Next Page links http://codex.wordpress.org/Template_Tags/posts_nav_link

// Category TAGS
the_category(); // Displays the category of a post
the_category_rss(); // http://codex.wordpress.org/Template_Tags/the_category_rss
single_cat_title(); // http://codex.wordpress.org/Template_Tags/single_cat_title
category_nicename(); // http://codex.wordpress.org/Template_Tags/category_nicename
category_description(); // http://codex.wordpress.org/Template_Tags/category_description
wp_dropdown_categories(); // (Version 2.1) http://codex.wordpress.org/Template_Tags/wp_dropdown_categories
wp_list_categories(); //(Version 2.1) http://codex.wordpress.org/Template_Tags/wp_list_categories
in_category(); // http://codex.wordpress.org/Template_Tags/in_category
get_category_parents(); // http://codex.wordpress.org/Template_Tags/get_category_parents
get_the_category(); // http://codex.wordpress.org/Template_Tags/get_the_category
get_category_link(); // http://codex.wordpress.org/Function_Reference/get_category_link

// Author TAGS
the_author(); // Displays the author of the post http://codex.wordpress.org/Template_Tags/the_author
the_author_description();  // http://codex.wordpress.org/Template_Tags/the_author_description
the_author_login(); // http://codex.wordpress.org/Template_Tags/the_author_login
the_author_firstname(); //  http://codex.wordpress.org/Template_Tags/the_author_firstname
the_author_lastname(); // http://codex.wordpress.org/Template_Tags/the_author_lastname
the_author_nickname(); // http://codex.wordpress.org/Template_Tags/the_author_nickname
the_author_ID(); // http://codex.wordpress.org/Template_Tags/the_author_ID
the_author_email(); // http://codex.wordpress.org/Template_Tags/the_author_email
the_author_url(); // http://codex.wordpress.org/Template_Tags/the_author_url
the_author_link(); // (Version 2.1) http://codex.wordpress.org/Template_Tags/the_author_link
the_author_aim(); // http://codex.wordpress.org/Template_Tags/the_author_aim
the_author_yim(); // http://codex.wordpress.org/Template_Tags/the_author_yim
the_author_posts(); // http://codex.wordpress.org/Template_Tags/the_author_posts
the_author_posts_link(); // http://codex.wordpress.org/Template_Tags/the_author_posts_link
wp_list_authors(); // http://codex.wordpress.org/Template_Tags/wp_list_authors

// CONDITIONS FUNCTIONS
is_sticky(); // Check if sticky post
is_home(); // When the main blog page is being displayed.
is_front_page(); // When it is the front of the site displayed, whether it is posts or a Page
is_single(); // When any single Post page is being displayed
is_single('17'); // When Post 17 is being displayed as a single Post (understand Id, name, slug)
comments_open(); //  When comments are allowed for the current Post being processed in the Loop
pings_open(); // When pings are allowed for the current Post being processed in the Loop
is_page(); //  When any Page is being displayed
is_page('42'); //  When Page 42 (ID) is being displayed
is_page_template(); // Is a Page Template being used?
is_category(); // When any Category archive page is being displayed.
is_category('9'); // When the archive page for Category 9 is being displayed (understand Id, name, slug)
in_category('5'); // Returns true if the current post is in the specified category id
is_tag(); // When any Tag archive page is being displayed
has_tag(); // When the current post has a tag. Must be used inside The Loop. (Version 2.6)
is_author(); //  When any Author page is being displayed
is_author('4'); // When the archive page for Author 4 (ID) is being displayed. (NickName, NiceName)
is_date(); //  When any date-based archive page is being displayed (i.e. a monthly, yearly, daily or time-based archive).
is_year(); // When a yearly archive is being displayed.
is_month(); // When a monthly archive is being displayed.
is_day(); // When a daily archive is being displayed.
is_time(); // When an hourly, "minutely", or "secondly" archive is being displayed.
is_archive(); // When any type of Archive page is being displayed. Category, Tag, Author and Date based pages are all types of Archives.



FUNCTION bloginfo($param) {}; ?>
 https://developer.wordpress.org/reference/functions/bloginfo/

'wpurl' - URL for WordPress installation
'name' - Weblog title; set in General Options. (Default)
'description' - Tagline for your blog; set in General Options.
  <meta name="description" content="<?php bloginfo('description'); ?>" />
'url' - URL for your blog's web site address.
  <a href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a>
'rdf_url' - URL for RDF/RSS 1.0 feed.
'rss_url' - URL for RSS 0.92 feed.
'rss2_url' -  URL for RSS 2.0 feed.
'atom_url' -  URL for Atom feed.
'comments_rss2_url' - URL for comments RSS 2.0 feed
'comments_atom_url' - URL for comments Atom 1.0 feed
<link rel="alternate" href="<?php bloginfo('rss2_url'); ?>" type="application/rss+xml" title="RSS 2.0" />
'pingback_url' - URL for Pingback (XML-RPC file).
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
'admin_email' - Administrator's email address; set in General Options.
<a href="mailto:<?php bloginfo(' admin_email '); ?>">Administrator</a>
'html_type' - "Content-type" for your blog.
'charset' - Character encoding for your blog; set in Reading Options.
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>"; charset="<?php bloginfo('charset'); ?>" />
'language' - The code for your blog's current language
'version' - Version of WordPress your blog uses.
'text_direction' - Returns 'rtl' for right to left or 'ltr' for left to right (Default).
'template_url' - URL for template in use
'template_directory' - URL for template's directory
'stylesheet_url' - URL for primary CSS file. Consider echoing get_stylesheet_uri() instead.
 Returns: http//example.com/wp-content/themes/ +
 your-active-theme-name(value from wp_options, "stylesheet" row) +
 "/style.css"(hardcoded in wp-includes/theme.php)






?>

<!--  NAVIGATION MENU -->
// Category Based Navigation

<ul  id="menu">
  <li  <?php  if (is_home()) {  ?>
       class="corrent-­‐cat"  <?php } ?>>
       <a href="<?php bloginfo('home'); ?>"> Home </a></li>
       <?php  wp_list_categories('title_li=&orderby=id');  ?>
</ul>

// Pages	Based	Navigation
<ul id="menu">
  <li <?php  if (is_home()) {
        ?>
  class="current_page_item"  <?php
    } ?>>
    <a  href="<?php   bloginfo('home'); ?>">home</a></li>
<?php  wp_list_pages('sort_column=menu_order&depth=1&title_li='); ?>
</ul>

<!-- // TEMPLATE EXAMPLES -->

<!-- header.php -->

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php
bloginfo('charset'); ?>" />
<title><?php bloginfo('name'); ?> <?php wp_title(); ?></title>
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<?php wp_get_archives('type=monthly&format=link'); ?>
<?php comments_popup_script(); // off by default ?>
<?php wp_head(); // API Hook ?>
</head>
<body>

<!-- index.php -->

<?php get_header(); // header.php ?>
<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); // the loop ?>
<div class="post" id="post-<?php the_ID(); ?>">
<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to
<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
<?php the_time('F jS, Y') ?> by <?php the_author() ?>
<?php the_content('Read the rest of this entry &raquo;'); ?>
Post Tags: <?php the_tags(' ', ', ', '<br />'); ?>
Posted in <?php the_category(', ') ?>
<?php comments_popup_link('No Comments &#187;', '1 Comment &#187;', '%
Comments &#187;'); ?>
</div>
<?php endwhile; ?>
<?php next_posts_link('&laquo; Older Entries') ?>
<?php previous_posts_link('Newer Entries &raquo;') ?>
<?php else : ?>
<h2 class="center">Not Found</h2>
<p class="center">Sorry, but you are looking for something that isn't here.</p>
<?php include (TEMPLATEPATH . "/searchform.php"); ?>
<?php endif; ?>
<?php get_sidebar(); // sidebar.php ?>
<?php get_footer(); // footer.php ?>

<!-- sidebar.php -->

<ul>
<?php /* Widgetized sidebar, if you have the plugin installed. */
if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar() ) : ?>
<li>
<?php include (TEMPLATEPATH . '/searchform.php'); ?>
</li>
<?php wp_list_pages('title_li=<h2>Pages</h2>' ); ?>
<?php wp_list_bookmarks(); ?>
<li><h2>Archives</h2>
<ul>
<?php wp_get_archives('type=monthly'); ?>
</ul>
</li>
<li><h2>Meta</h2>
<ul>
<?php wp_meta(); // API Hook ?>
<?php wp_register(); ?>
<li><?php wp_loginout(); ?></li>
</ul>
</li>
<?php endif; ?>
</ul>

<!-- comments.php -->


<?php if ($comments) : ?>
<h3 id="comments"><?php comments_number('No Responses', 'One Response', '% Responses' );?> to
<?php the_title(); ?></h3>
<ol >
<?php foreach ($comments as $comment) : // The Comments Loop ?>
<li id="comment-<?php comment_ID() ?>">
<?php echo get_avatar( $comment, 32 ); ?>
<cite><?php comment_author_link() ?></cite> Says:
<?php if ($comment->comment_approved == '0') : ?>
<em>Your comment is awaiting moderation.</em>
<?php endif; ?>
<a href="#comment-<?php comment_ID() ?>" title="">
<?php comment_date('F jS, Y') ?> at <?php comment_time() ?>
</a>
<?php comment_text() ?>
</li>
<?php endforeach; /* end for each comment */ ?>
</ol>
<?php else : // this is displayed if there are no comments so far ?>
<?php if ('open' == $post->comment_status) : // comments are open, but there are no comments ?>
<?php else : // comments are closed ?>
<p class="nocomments">Comments are closed.</p>
<?php endif; ?>
<?php endif; ?>


<!-- footer.php -->

<?php wp_footer(); // API Hook
/*
 Template Heirarchy
  http://storage8.static.itmages.com/i/17/0815/h_1502816840_7403959_31d92a0ee4.png
 http://codex.wordpress.org/
 http://codex.wordpress.org/Theme_Development
 http://codex.wordpress.org/Upgrading_WordPress
*/

// LANGUAGE function

load_theme_textdomain(); // function used for translation available for the theme
?>

<!-­‐-­‐next page-­‐-­‐> Divides the content into pages
<!-­‐-­‐more-­‐-­‐> Cuts off the content	and adds a link to	the	rest of	the	 content
</body>
</html>

<?php
/*
Template Heirarchy https://wphierarchy.com/
Popper Theme
1.) Theme Basic Structure
2.) template-parts (folder)
3.) functions.PHP
4.) inc folder / widgets/recent-comments.php

?>
