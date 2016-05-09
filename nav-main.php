<?php

/**
 * nav-main.php
 * Template for site navigation.
 * You may wish to use `wp_nav_menu()` here, or alternatively, hand-code your navigation.
 * http://codex.wordpress.org/Function_Reference/wp_nav_menu
 */

?>


<?php
	// Get hero (if one exists)
	global $post;
	$hero = get_post_meta( $post->ID, 'keel_page_hero', true );
?>

<header class="container container-large <?php if ( empty( $hero ) ) { echo 'margin-bottom-large'; } else { echo 'margin-bottom-small'; } ?>">
	<nav class="nav-wrap">
		<a class="logo" href="<?php echo site_url(); ?>/">
			&lt;/&gt;
			<?php echo get_bloginfo( 'name' ); ?>
		</a>
		<?php if ( has_nav_menu( 'primary' ) ) : ?>
			<div class="nav-menu" id="nav-menu">
				<?php wp_nav_menu(
					array(
						'theme_location' => 'primary',
						'container'      => false,
						'menu_class'     => 'nav',
						'depth'          => -1,
					)
				); ?>
			</div>
		<?php endif; ?>
	</nav>
</header>