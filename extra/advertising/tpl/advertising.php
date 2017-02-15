<?php

if($ad_type == 'image_and_url') { ?>



<div class="image-ads">
	
	<a href="<?php echo esc_url( $link['url'] ); ?>">

		<?php 
		if($img_size == '300') {
			$magzma_ads_img = aq_resize($image['url'],  300 , 300, true);
		}
		elseif($img_size == '125') {
			$magzma_ads_img = aq_resize($image['url'],  125 , 125, true);
		}
		elseif($img_size == '160') {
			$magzma_ads_img = aq_resize($image['url'],  160 , 600, true);
		}
		elseif($img_size == '120') {
			$magzma_ads_img = aq_resize($image['url'],  120 , 600, true);
		}
		else {
			$magzma_ads_img = $image['url'];
		}
		?>
		<img src="<?php echo esc_url( $magzma_ads_img ); ?>" alt="<?php esc_html_e( 'Malabr Ads', 'magzma' ); ?>">

	</a>

</div>

<?php

}
else { ?>
	<?php echo balancetags($ad_script); ?>
<?php }

?>