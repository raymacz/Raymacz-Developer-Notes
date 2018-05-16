https://wordpress.tv/2013/03/15/andrew-nacin-wp_query-wordpress-in-depth/

<?php 
//Conditional Tags
	 is_author(), is_home(), is_date(), is_archive(), etc.

//Ways to Query	
	- query_posts() // (bad & not really good to use)
	- new WP_Query() // to create a secondary loop
	- get_posts() // array of posts objects

//The Loop
	while (have_posts()) :
		the_post();
	endwhile;
	
//Secondary Loop
	$query = new WP_Query();
	while ($query->have_posts()):
		$query->the_posts();
	endwhile;
	
// An array of posts
 $result = get_posts();
  foreach ($result as $post_obj) {
	  
  }

// note: every query object has its own methods
   
	is_author();  /* is the same as calling as */	$wp_query->is_author();
	// note of the code: it only does is call the method for the main query -->> $wp_query
		function is_author() {
			global $wp_query;
			return $wp_query->is_author();
		}	
		
//With the regular loop
  while ($query->have_posts()):
		the_post();
		if (is_author()) echo "An author query."; // if author page
  endwhile;
  
// A secondary loop
  $query = new WP_Query(); // or $my_query
	while ($query->have_posts()):
		$query->the_posts();
		if ( $query->is_author() ) echo "An author query.";
	endwhile;
  wp_reset_postdata();
  
 // why call?
		 wp_reset_postdata(); /* used for */ while ($query->have_posts())  // resets like global, leaking of widgets so it won't break
		 wp_reset_query();  /* used for */ while (have_posts())  /* also does */ wp_reset_postdata(); // see explanation below.
  
 // what about? // why this is bad? // how to alter w/o using this?
		query_posts();
		
// how can you alter a query or the main query?	
// what is the main query? why its important?

//---------------------------------------------
// Watch carefull how Wordpress loads & works
//wp-blog-header.php

//load the Wordpress Bootstrap
require './wp-load.php';

// do Magic & do parse
wp();

//decide w/c template files to load
require WPINC. .'/template-loader.php';

function wp($query_vars = '') {
	global $wp;
	$wp->main($query_vars);
}

	/* note:  in the Bootstrap:*/	$wp = new WP(); /* So there's a wp() function, and a WP class.*/
	class WP() {
			// ...
			function main() {
				$this->init();
				$this->parse_request();  //note WP::parse_request();
				$this->send_headers();
				$this->query_posts();  // note  WP::query_posts();
				$this->handle_404();
				$this->register_globals();
				// ...
			}	
			// ...
	}
	WP::parse_request();
	/* Parses the URL using WP_Rewrite */
	/* Sets up query variables for WP_Query */
	WP::query_posts() {
		global $wp_the_query;
		$wp_the_query->query($this->query_vars);
	}	
	
	// NOTE; it means -->> Before we get to the theme, we already have your posts.
	// That's running 2 queries!
	/* One,  the query Wordpress thought we wanted. Two, this new one you're actually going to use*/   query_posts();
//---------------------------------------------

	$wp_the_query = new WP_Query();
	$wp_query =& $wp_the_query; //using references, means whatever is the value of each, will be the value of both.
	/* So the real main query is in  */ $wp_the_query /* & a live copy of it is stored in */ $wp_query.
	
	//  @wp_query will be like a shortcut to @wp_the_query // you can use: (from - PHP beyond the basics tutorial video)
			unset($wp_query); // $wp_query value will be nothing  while $wp_the_query will become the last value of both before it was unset.
	 function ref_test(&$x) 
		// note: whatever $var is passed to $x as reference, will also affect $var even if its local function variable. 
		global $var1 /* this is also like $var placed inside the function & will have the same result value. no need to pass $x */  function ref_test ($x)
	 $var2 =& ref_test();	/* both need to use like handshake */  function &ref_test() // to make referencing work 
			/* whatever */ (global $var1)  /* global variable is declared inside the function will have the same value as */ $var2
			

	// Actually, WP_Query doesn't run just one query. it usually runs four:
		/* 1. Get my posts: */  'SELECT SQL_CALC_FOUND_ROWS FROM wp_post LIMIT 0, 10'; 
		/* 2. How many posts exist? */  'SELECT FOUND_ROWS()'
		/* 3. Get all metedata for these posts.
		/* 4. Get all terms for these posts. e.g. Taxonomy
		/* So if you use */ get_post_custom(); /* or */ get_post_meta(); /* etc, each one of these is not calling any other query
			
	// point is we are running one query, & we are ignoring the results & doing it again.
	// 'measure twice, cut once' is bad for performance.
	
	/* Other problems with */ query_posts()
	 // - Pagination breaks. Wordpress calculated  paging using the query it did, not the query you did.
	 // - you easily mess up globals. This can break widgets and more. 
	 // - conclusion: query_posts() is bad.
	 
	 // TO SOLVE THIS ISSUE:
	 
	 // Introducing pre_get_posts // a truly awesome hook. 
	 
	 function nacin_alter_home($query) {
		 if($query->is_home()) $query->set('author', '-5');
	 }
	 add_action('pre_get_posts', 'nacin_alter_home'); // fires before the query actauly happens. More like a filter.
	 // 'pre_get_post' fire for every post query:
	   /* - */ get_post(); 
	   /* - */ new WP_query(); // -
	   /* - That random recent posts widget your client installed w/o you knowing. */
	   /* - Everything will run the filter before its gets to the template*/
	   
	 //  What if I just want it on the main query... 
	  // Main Query only! 
	 function nacin_alter_home($query) {
		 global $wp_the_query;
		 if($wp_the_query === $query) && $query->is_home())
			 $query->set('author', '-5');
	 }
	 add_action('pre_get_posts', 'nacin_alter_home');
	 
	 // Hmm.. How does this work?
	 
	 $wp_the_query /* should never be modified. It holds the main query, forever.  NOTE!!! Do not touch */ $wp_query;
	 $wp_query /* keeps a live reference to $wp_the_query, unless you use. */ query_posts();
	 
	/* Break the reference to */ $wp_the_query;
	function query_posts($query) {
		unset($wp_query);
		$wp_query =& new WP_Query($query);
		return $wp_query;
	}
 
	query_posts('author=-5');
	while (have_posts()):
		the_posts();
	endwhile;
	wp_reset_query(); // resets the query

	function wp_reset_query() {
		unset($wp_query);
		$wp_query =& $wp_the_query;
		// Resets the globals, too.
		wp_reset_postdata();
	}
	wp_reset_query() /* 3 things it does */
		/* 1. it removes the current */ $wp_query 
		/* 2. it restores the original main query reference */
		/* 3. it resets globals */
	// NOTE: all of the globals 7 years ago from 2014	still exist
	
	/* Calling */ the_post();
		wp_reset_query() /* will reset */ $wp_query /* & the globals
	
	/* Calling */ $my_query->the_post()?
		wp_reset_postdata() // will reset the globals.
	
	//New in Wordpress 3.3!
	
	/*rather than */ $other_query_object === $wp_the_query
	/* you can use */ $other_query_object->is_main_query();
	
	is_main_query(); /* the function, will act on */ $wp_query /* like any other conditional tag.
	
	/* what about page templates? */
	  /* understandable to use */ query_posts() /* in page templates */
	  
	// this simply sets the query properties w/o affecting the plugins, pagination, query strings,   
	function nacin_my_template($query) {
		 if(!$query->is_main_query())
			 return;
		 if(!is_page_template('my-template.php'))
			 return;
		 $query->set('author', '-5');
		 $query->set('posts_per_page','25');
	 }
	 add_action('pre_get_posts', 'nacin_my_template');
	
	// Some lessons
	/* Every */ WP_Query() /* object has methods that mimic the global conditional tags */
		// global conditional tags - E.G.
		the_post()
		have_post()
		is_author() 
		is_main_query()
		/* you can utilize all these w/ a Secondary Loop * it will work */
	
	/* The global conditional tags apply to */ $wp_query /* the main or current query. */
	$wp_query /* is always the main query, unless you use */ query_posts() /* Restore it with */ wp_reset_query()
	
	/* FINALLY */ 
		'pre_get_post' /* is a powerful and hook. Just use it properly. */
		/* Always check if you're modifying the main query using */ $query->is_main_query()
		/* pro tip: Nacin doesn't use query post */
		/* Much more efficient to hook asap & tell wordpress what to query before it displays the template*/
		// Highly recommended to use a Secondary Loop
	
	/* why */ $query_posts() /* is not deprecated? */
		// because a lot of people are comfortable & code is easier to read.
		/* it's not a problem unless you have no idea what's happening. To be sure use */ wp_reset_query()
		
	//functions.php	
		// is a theme file but not a template file
		// its a separate file that runs while Wordpress is still loading.
		// loaded in the admin. loaded everywhere. better than a plugin.  
		
	
	
?>	