<?php
/**
 * The template for displaying the footer.
 *
 * @package vt-patricia
 */
?>

	  </div><!-- #end row-->
	</div><!-- #end container-->
	
	<footer id="colophon" class="site-footer">

		<div class="container">
			<?php
				/* Footer Logo */
				get_template_part('template-parts/footer-logo');
				/* Copyright */
				do_action( 'vt_patricia_footer' );
			?>
		</div><!-- .container -->
		
	</footer><!-- #colophon -->
	
</div><!-- #end wrapper-->

<?php wp_footer(); ?>
</body>
</html>