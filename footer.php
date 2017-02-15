
<!-- FOOTER -->
<footer id="footer" class="footer clearfix">

	<?php 

if ( class_exists( 'Redux' ) && is_active_sidebar( 'footer-1' ) || class_exists( 'Redux' ) && is_active_sidebar( 'footer-2' ) || class_exists( 'Redux' ) && is_active_sidebar( 'footer-3' ) || class_exists( 'Redux' ) && is_active_sidebar( 'footer-4' ) ) {
    ?>
	<div class="container">
		<div class="footer-widget-wrapper clearfix">
			<div class="row clearfix">
				<?php 
    magzma_footer_widget();
    ?>
			</div>
		</div>
	</div>
	<?php 
}

?>

	<div id="copyright" class="footer-bottom clearfix">
		<div class="container">	
			<div class="social-footer">
				<ul>
					<?php 
magzma_social_profile();
?>
				</ul>
			</div>
			<div class="footer-menu-wrap">
				<?php 
magzma_footer_nav_menu();
?>
			</div>
			<div class="copyright-text">
				<?php 
magzma_footer_copyright();
?>
			</div>
		</div>
	</div>
</footer>
<!-- FOOTER END -->

</div>
<!-- MAIN WRAPPER END -->

<?php 
wp_footer();
?>

</body>
</html>