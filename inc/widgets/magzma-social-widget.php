<?php

class magzma_socialbox extends WP_Widget
{
  function magzma_socialbox(){
    $widget_ops = array('classname' => 'socialbox-widget', 'description' => '');

		$control_ops = array('id_base' => 'social_box-widget');

		parent::__construct('social_box-widget', 'Magzma Social Box', $widget_ops, $control_ops);
  }
 
  function form($instance){

    $instance = wp_parse_args( (array) $instance, array( 'title' => '' ) );
    
    $title 		= !empty($instance['title']) ? $instance['title'] : '';
	?>
	<p>
		<label for="<?php echo sanitize_text_field( $this->get_field_id('title') ); ?>"><?php esc_html_e( 'Title', 'magzma' ); ?></label><br>
		<input style="width:216px" id="<?php echo sanitize_text_field( $this->get_field_id('title') ); ?>" name="<?php echo sanitize_text_field( $this->get_field_name('title') ); ?>" value="<?php echo sanitize_text_field( $title ); ?>">
	</p>
	<hr style="border:none;height:1px;background:#BFBFBF">
	<p><?php esc_html_e( 'This widget will shown all of your social links that you create on Social Options.', 'magzma' ); ?></p>
	

	<?php
  }
 
  function update($new_instance, $old_instance){

    $instance = $old_instance;
    $instance['title'] 			= strip_tags($new_instance['title']);
    return $instance;
  }
 
  function widget($args, $instance){

    extract($args, EXTR_SKIP);

    echo balancetags( $before_widget ); 
    ?>
  		<?php
  		if($instance['title']) {
			echo  balancetags( $before_title ). sanitize_text_field( $instance['title'] ).balancetags( $after_title );
		} ?>

    		<ul class="social-box-widget clearfix">
    		<?php magzma_social_profile(); ?>
    		</ul>

    <?php
	echo balancetags( $after_widget );
  }
}
add_action( 'widgets_init', create_function('', 'return register_widget("magzma_socialbox");') );