<?php
/**
 * @package Make
 */

/**
 * Allow toggling of the footer credit.
 *
 * @since 1.2.3.
 *
 * @param bool    $show    Whether or not to show the footer credit.
 */
$footer_credit = apply_filters( 'make_show_footer_credit', true );
?>

<?php if ( make_get_thememod_value( 'footer-text' ) || is_customize_preview() ) : ?>
<div class="footer-text">
	<?php echo make_get_thememod_value( 'footer-text' ); ?>
</div>
<?php endif; ?>

<?php if ( true === $footer_credit ) : ?>
<div class="site-info">
	<span class="theme-name">Make: A WordPress template</span>
	<span class="theme-by"><?php /* Translators: this string indicates attribution. */ esc_html_e( 'by', 'make' ); ?></span>
	<span class="theme-author">
		<a title="The Theme Foundry <?php esc_attr_e( 'homepage', 'make' ); ?>" href="https://thethemefoundry.com/">
			The Theme Foundry
		</a>
	</span>
</div>
<?php endif; ?>
