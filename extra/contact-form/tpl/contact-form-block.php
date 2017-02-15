<?php 
	$form_select = $instance['form_select']; 
?>		

<?php echo do_shortcode('[contact-form-7 id="' . $form_select . '"]');  ?>

<?php wp_reset_postdata(); ?>