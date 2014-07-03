<?php

// Exit if accessed directly
if( !defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Home Widgets Template
 *
 *
 * @file           sidebar-home.php
 * @package        Responsive
 * @author         Emil Uzelac
 * @copyright      2003 - 2014 CyberChimps
 * @license        license.txt
 * @version        Release: 1.0
 * @filesource     wp-content/themes/responsive/sidebar-home.php
 * @link           http://codex.wordpress.org/Theme_Development#Widgets_.28sidebar.php.29
 * @since          available since Release 1.0
 */
?>
<?php responsive_widgets_before(); // above widgets container hook ?>
	<div id="widgets" class="home-widgets">
	<style>
		#widgets .widget-wrapper {
			height: 280px;
			padding: 15px;
		}
		#widgets .widget-wrapper h3{
			margin-left: 10px;
		}
		#widgets .widget-wrapper ul{
		}
		#widgets .widget-wrapper li {
			margin-bottom: 4px;
		}
		#widgets .widget-wrapper li a{
			color: #222;
		}
	</style>
		<div id="home_widget_1" class="grid col-300">
			<?php responsive_widgets(); // above widgets hook ?>

			<?php if( !dynamic_sidebar( 'home-widget-1' ) ) : ?>
				<div class="widget-wrapper">

					<div class="widget-title-home"><h3><?php _e( '政府报道', 'responsive' ); ?></h3></div>
					<div class="textwidget">
						<ul>
							<?php
							global $post;
							$args = array(
								'posts_per_page'   => 5,
								'offset'           => 0,
								'category'         => 2, // 政府报道
								'orderby'          => 'post_date',
								'order'            => 'DESC',
								'include'          => '',
								'exclude'          => '',
								'meta_key'         => '',
								'meta_value'       => '',
								'post_type'        => 'post',
								'post_mime_type'   => '',
								'post_parent'      => '',
								'post_status'      => 'publish',
								'suppress_filters' => true );
							$myposts = get_posts($args);
							foreach($myposts as $post) :
							?>
							<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
							<?php endforeach; ?>
						</ul> 
					</div>

				</div><!-- end of .widget-wrapper -->
			<?php endif; //end of home-widget-1 ?>

			<?php responsive_widgets_end(); // responsive after widgets hook ?>
		</div>
		<!-- end of .col-300 -->

		<div id="home_widget_2" class="grid col-300">
			<?php responsive_widgets(); // responsive above widgets hook ?>

			<?php if( !dynamic_sidebar( 'home-widget-2' ) ) : ?>
				<div class="widget-wrapper">

					<div class="widget-title-home"><h3><?php _e( '学术研究', 'responsive' ); ?></h3></div>
					<div class="textwidget">
						<ul>
							<?php
							global $post;
							$args = array(
								'posts_per_page'   => 5,
								'offset'           => 0,
								'category'         => 6, // 学术研究
								'orderby'          => 'post_date',
								'order'            => 'DESC',
								'include'          => '',
								'exclude'          => '',
								'meta_key'         => '',
								'meta_value'       => '',
								'post_type'        => 'post',
								'post_mime_type'   => '',
								'post_parent'      => '',
								'post_status'      => 'publish',
								'suppress_filters' => true );
							$myposts = get_posts($args);
							foreach($myposts as $post) :
							?>
							<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
							<?php endforeach; ?>
						</ul> 
					</div>
				</div><!-- end of .widget-wrapper -->
			<?php endif; //end of home-widget-2 ?>

			<?php responsive_widgets_end(); // after widgets hook ?>
		</div>
		<!-- end of .col-300 -->

		<div id="home_widget_3" class="grid col-300 fit">
			<?php responsive_widgets(); // above widgets hook ?>

			<?php if( !dynamic_sidebar( 'home-widget-3' ) ) : ?>
				<div class="widget-wrapper">

					<div class="widget-title-home"><h3><?php _e( '科普知识', 'responsive' ); ?></h3></div>
					<div class="textwidget">
						<ul>
							<?php
							global $post;
							$args = array(
								'posts_per_page'   => 5,
								'offset'           => 0,
								'category'         => 3, // 科普知识
								'orderby'          => 'post_date',
								'order'            => 'DESC',
								'include'          => '',
								'exclude'          => '',
								'meta_key'         => '',
								'meta_value'       => '',
								'post_type'        => 'post',
								'post_mime_type'   => '',
								'post_parent'      => '',
								'post_status'      => 'publish',
								'suppress_filters' => true );
							$myposts = get_posts($args);
							foreach($myposts as $post) :
							?>
							<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
							<?php endforeach; ?>
						</ul> 
					</div>
				</div><!-- end of .widget-wrapper -->
			<?php endif; //end of home-widget-3 ?>

			<?php responsive_widgets_end(); // after widgets hook ?>
		</div>
		<!-- end of .col-300 fit -->
	</div><!-- end of #widgets -->
<?php responsive_widgets_after(); // after widgets container hook ?>