<?php

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Site Front Page
 *
 * Note: You can overwrite front-page.php as well as any other Template in Child Theme.
 * Create the same file (name) include in /responsive-child-theme/ and you're all set to go!
 * @see            http://codex.wordpress.org/Child_Themes and
 *                 http://themeid.com/forum/topic/505/child-theme-example/
 *
 * @file           front-page.php
 * @package        Responsive
 * @author         Emil Uzelac
 * @copyright      2003 - 2014 CyberChimps
 * @license        license.txt
 * @version        Release: 1.0
 * @filesource     wp-content/themes/responsive/front-page.php
 * @link           http://codex.wordpress.org/Template_Hierarchy
 * @since          available since Release 1.0
 */

/**
 * Globalize Theme Options
 */
$responsive_options = responsive_get_options();
/**
 * If front page is set to display the
 * blog posts index, include home.php;
 * otherwise, display static front page
 * content
 */
if ( 'posts' == get_option( 'show_on_front' ) && $responsive_options['front_page'] != 1 ) {
	get_template_part( 'home' );
} elseif ( 'page' == get_option( 'show_on_front' ) && $responsive_options['front_page'] != 1 ) {
	$template = get_post_meta( get_option( 'page_on_front' ), '_wp_page_template', true );
	$template = ( $template == 'default' ) ? 'index.php' : $template;
	locate_template( $template, true );
} else {

	get_header();

	//test for first install no database
	$db = get_option( 'responsive_theme_options' );
	//test if all options are empty so we can display default text if they are
	$empty = ( empty( $responsive_options['home_headline'] ) && empty( $responsive_options['home_subheadline'] ) && empty( $responsive_options['home_content_area'] ) ) ? false : true;
	?>

	<div id="featured" class="grid col-940">

			<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>
			<script type="text/javascript" src="<?php echo bloginfo('template_directory'); ?>/core/js/responsiveslides.min.js"></script>
			<script>
			  $(function() {
			    $(".rslides").responsiveSlides();
			  });
			</script>


		<div id="featured-content" class="grid col-540">
			<div class="wm-slide wm-slide-home">
				
				<?php 
				// show front page slides (with tag slide and slide-home)
				$the_query = new WP_Query( 'tag=slide+slide-home&posts_per_page=3'  );

				// The Loop
				if ( $the_query->have_posts() ) {
				  echo '<ul class="rslides">';
					while ( $the_query->have_posts() ) {
						$the_query->the_post();
						echo '<li><a class="slide-title" href="'.get_permalink().'">' . get_the_title() . "</a>";
						echo '<a class="slide-img" href="'.get_permalink().'">
						       <img src="' . get_post_meta($post->ID, 'slider-img', true) . '" alt="' . get_the_title() . '" />
						    	</a>';
						echo '</li>';
					}
				  echo '</ul>';
				} else {
					// no posts found
				}
				/* Restore original Post Data */
				wp_reset_postdata();
				?>

			</div>
		</div>
		<!-- end of .col-460 -->

		<div id="featured-content" class="grid col-380 fit">
			<div class="wm-top-news">
				<h3>新闻头条</h2>
				
				<?php 
				// show front page slides (with tag slide and slide-home)
				$the_query = new WP_Query( 'posts_per_page=8' );

				// The Loop
				if ( $the_query->have_posts() ) {
				  echo '<ul>';
					while ( $the_query->have_posts() ) {
						$the_query->the_post();
						echo '<li><a class="" href="'.get_permalink().'">' . get_the_title() . "</a>";
						echo '</li>';
					}
				  echo '</ul>';
				} else {
					// no posts found
				}
				/* Restore original Post Data */
				wp_reset_postdata();
				?>

			</div>

		</div>
		<!-- end of #featured-image -->

	</div><!-- end of #featured -->

	<?php
	get_sidebar( 'home' );
	get_footer();
}
?>
