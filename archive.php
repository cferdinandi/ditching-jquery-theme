<?php

/**
 * archive.php
 * Template for posts by category, tag, author, date, etc.
 */

get_header(); ?>


<?php if (have_posts()) : ?>

	<header>
		<h1>
			<?php if ( is_post_type_archive( 'gmt-events' ) ) : ?>
				<?php

					// Upcoming/past category titles
					$show_keel_events_header_future = true;
					$show_keel_events_header_past = true;

					$options = events_get_theme_options();
					_e( $options['page_title'], 'keel' );

				 ?>
			 <?php elseif ( is_post_type_archive( 'gmt-projects' ) ) : ?>
			 	<?php
			 		$options = projects_get_theme_options();
			 		_e( $options['page_title'], 'keel' );

			 	 ?>
			<?php elseif (is_category()) : // If this is a category archive ?>
				<?php _e( 'Articles on', 'keel' ) ?> <?php single_cat_title(); ?>...
			<?php elseif( is_tag() ) : // If this is a tag archive ?>
				<?php _e( 'Articles on', 'keel' ) ?> <?php single_tag_title(); ?>...
			<?php elseif (is_day()) : // If this is a daily archive ?>
				<?php _e( 'Articles from', 'keel' ) ?> <?php the_time('F jS, Y'); ?>...
			<?php elseif (is_month()) : // If this is a monthly archive ?>
				<?php _e( 'Articles from', 'keel' ) ?> <?php the_time('F, Y'); ?>...
			<?php elseif (is_year()) : // If this is a yearly archive ?>
				<?php _e( 'Articles from', 'keel' ) ?> <?php the_time('Y'); ?>...
			<?php elseif (is_author()) : // If this is an author archive ?>
				<?php _e( 'Articles by', 'keel' ) ?> <?php the_author(); ?>...
			<?php elseif (isset($_GET['paged']) && !empty($_GET['paged'])) : // If this is a paged archive ?>
				<?php _e( 'Archive', 'keel' ) ?>
			<?php endif; ?>
		</h1>
	</header>

	<?php if ( is_post_type_archive( array( 'gmt-events', 'gmt-projects' ) ) ) : ?>
		<?php
			// Show page description
			echo stripslashes( wpautop( $options['page_text'] ) );
		?>
	<?php endif; ?>


	<?php if ( is_post_type_archive( 'gmt-projects' ) ) : ?>
		<ol>
	<?php endif; ?>


	<?php
		// Start the loop
		while (have_posts()) : the_post();
	?>
		<?php
			// Insert the post content
			get_template_part( 'content', get_post_type() );
		?>
	<?php endwhile; ?>


	<?php if ( is_post_type_archive( 'gmt-projects' ) ) : ?>
		</ol>
	<?php endif; ?>


	<?php
		// Previous/next page navigation
		get_template_part( 'nav', 'page' );
	?>


<?php else : ?>
	<?php
		// If no content, include the "No post found" template
		get_template_part( 'content', 'none' );
	?>
<?php endif; ?>


<?php get_footer(); ?>