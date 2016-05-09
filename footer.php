<?php

/**
 * footer.php
 * Template for footer content.
 */

?>

			</div><!-- /.container -->
		</main><!-- /#main -->


		<footer class="container container-large">

			<hr class="margin-bottom">

			<?php get_template_part( 'nav', 'secondary' ); ?>

			<p>
				<span class="text-small">
					Made with &lt;3 in Massachusetts by <a href="http://gomakethings.com">Go Make Things</a>. Copyright <?php echo date( 'Y' ); ?>.
				</span>
			</p>

		</footer>

		<?php wp_footer(); ?>

	</body>
</html>