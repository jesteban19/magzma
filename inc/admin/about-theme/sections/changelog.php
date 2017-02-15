<?php
/**
 * Changelog
 */

$magzma = wp_get_theme( 'magzma' );

?>
<div class="magzma-tab-pane" id="changelog">

	<div class="magzma-tab-pane-center">
	
		<h1><?php echo esc_attr( $magzma['Name'] ); ?> <?php if( !empty($magzma['Version']) ): ?> <sup id="magzma-theme-version"><?php echo esc_attr( $magzma['Version'] ); ?> </sup><?php endif; ?></h1>

	</div>

	<?php
	WP_Filesystem();
	global $wp_filesystem;
	$magzma_changelog = $wp_filesystem->get_contents( get_template_directory().'/changelog.txt' );
	$magzma_changelog_lines = explode(PHP_EOL, $magzma_changelog);
	foreach($magzma_changelog_lines as $magzma_changelog_line){
		if(substr( $magzma_changelog_line, 0, 3 ) === "###"){
			echo '<hr /><h1>'.substr($magzma_changelog_line,3).'</h1>';
		} else {
			echo $magzma_changelog_line,'<br/>';
		}
	}

	?>
	
</div>