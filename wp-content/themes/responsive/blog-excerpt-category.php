<?php

// Exit if accessed directly
if( !defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Blog Template
 *
Template Name: Blog Excerpt by Category (summary)
 *
 * @file           blog-excerpt.php
 * @package        Responsive
 * @author         Emil Uzelac
 * @copyright      2003 - 2014 CyberChimps
 * @license        license.txt
 * @version        Release: 1.1.0
 * @filesource     wp-content/themes/responsive/blog-excerpt.php
 * @link           http://codex.wordpress.org/Templates
 * @since          available since Release 1.0
 */

get_header();
?>

<div id="content-blog" class="<?php echo implode( ' ', responsive_get_content_classes() ); ?>">
	<style>
	</style>
	<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo bloginfo('template_directory'); ?>/core/js/responsiveslides.min.js"></script>
	<script>
	  $(function() {
	    $(".rslides").responsiveSlides();
	  });
	</script>

	<?php 

	// get category of current page
	$category_name = join(",", get_post_meta( $page_id, 'category_name', false ));

	$category_term = get_category_by_slug( $category_name );
	echo "<h2 class='sub-page-title'>". $category_term->name ."</h2>"

	?>


			<div class="wm-slide wm-slide-page">
				
				<?php 
				// show front page slides (with tag slide and slide-home)
				$the_query = new WP_Query( 'tag=slide+slide-page&posts_per_page=3&category_name=' . $category_name );

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

	<?php
	global $wp_query, $paged;
	if( get_query_var( 'paged' ) ) {
		$paged = get_query_var( 'paged' );
	}
	elseif( get_query_var( 'page' ) ) {
		$paged = get_query_var( 'page' );
	}
	else {
		$paged = 1;
	}

	$blog_query = new WP_Query( array( 'post_type' => 'post', 'paged' => $paged, 'category_name' => $category_name ) );
	$temp_query = $wp_query;
	$wp_query = null;
	$wp_query = $blog_query;

	if( $blog_query->have_posts() ) :

		while( $blog_query->have_posts() ) : $blog_query->the_post();
			?>
			<?php responsive_entry_before(); ?>
			<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<?php responsive_entry_top(); ?>
				<h2 class="entry-title post-title"><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h2>

				<div class="post-entry">
					<?php if( has_post_thumbnail() ) : ?>
						<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
							<?php the_post_thumbnail(); ?>
						</a>
					<?php endif; ?>
					<?php the_excerpt(); ?>
					<div class="post-meta">
						<?php the_time('m/d/y'); ?>
					</div>
					<?php wp_link_pages( array( 'before' => '<div class="pagination">' . __( 'Pages:', 'responsive' ), 'after' => '</div>' ) ); ?>
				</div>
				<!-- end of .post-entry -->

				<?php //get_template_part( 'post-data' ); ?>

				<?php responsive_entry_bottom(); ?>
			</div><!-- end of #post-<?php the_ID(); ?> -->
			<?php responsive_entry_after(); ?>

		<?php
		endwhile;

		if( $wp_query->max_num_pages > 1 ) :
			?>
			<div class="navigation">
				<div class="previous"><?php next_posts_link( __( '&#8249; Older posts', 'responsive' ), $wp_query->max_num_pages ); ?></div>
				<div class="next"><?php previous_posts_link( __( 'Newer posts &#8250;', 'responsive' ), $wp_query->max_num_pages ); ?></div>
			</div><!-- end of .navigation -->
		<?php
		endif;

	else :

		get_template_part( 'loop-no-posts' );

	endif;
	$wp_query = $temp_query;
	wp_reset_postdata();
	?>

</div><!-- end of #content-blog -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
