<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package videobuzz
 */

?>
			<footer class="footer" role="contentinfo">

				<div class="footer-top">

					<div class="container">

						<div class="row">

							<?php
							! is_active_sidebar( 'footer-1' ) || dynamic_sidebar('footer-1');
							! is_active_sidebar( 'footer-2' ) || dynamic_sidebar('footer-2'); ?>

							<div class="clearfix visible-xs"></div>

							<?php
							! is_active_sidebar( 'footer-3' ) || dynamic_sidebar('footer-3');
							! is_active_sidebar( 'footer-4' ) || dynamic_sidebar('footer-4'); ?>

						</div><!-- .row -->

					</div><!-- .container -->

				</div><!-- .footer-top -->

				<div class="footer-bottom">

					<div class="container">
						<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'videobuzz' ) ); ?>"><?php printf( esc_html__( 'Proudly powered by %s', 'videobuzz' ), 'WordPress' ); ?></a>
						<span class="sep"> | </span>
						<?php printf( esc_html__( 'Theme: %1$s by %2$s.', 'videobuzz' ), 'Video Buzz', '<a href="https://halibegic.info" rel="designer">halibegic</a>' ); ?>

					</div><!-- .container -->

				</div><!-- .footer-bottom -->

			</footer><!-- .footer -->

		</div><!-- .wrapper -->

	</div><!-- .main -->

	<?php wp_footer(); ?>

</body>
</html>
