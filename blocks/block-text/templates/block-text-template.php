<?php if ( !defined('ABSPATH') ) die();

	$layout = get_field('layout') ?: '1col';
	$center = get_field('center');
	$center_x = get_field('center_x');

	$bgcolor = get_field('bg_color');
	$bgimg = get_field('bg_img');
	$max = get_field('center_max');
	$repeat = get_field('repeat');
	$white = get_field('white_text');
	$over = get_field('overlay');
	
	$text = get_field('text_group');						
	$text1 = $text['text_1'] ?: __('Enter text here...', 'adblocks');
	$text2 = $text['text_2'] ?: __('Enter text here...', 'adblocks');
	$text3 = $text['text_3'] ?: __('Enter text here...', 'adblocks');
	
	if ($bgcolor) {
		$has_bgcolor = 'background-color: '.$bgcolor.';';
	} else {
		$has_bgcolor = null;
	}
	if ($bgimg) {
		$has_bgimg = 'background-image: url('.$bgimg['url'].');';
	} else {
		$has_bgimg = null;
	} 

	if( !empty($block['align']) ) {
	    $align = ' align' . $block['align'];
	} else {
		$align = null;
	}
?>
			<?php // Block preview
				if( !empty( $block['data']['__is_preview'] ) ) { ?>
			    	<img src="<?php echo ADBLOCKS__PLUGIN_URL; ?>assets/previews/text-preview.png" alt="" class="adblock-preview">
			
			<?php } else { ?>
						
			<section class="acf-block--text<?php if($bgimg) { echo ' has-bg-img'; } if($bgcolor) { echo ' has-bg-color'; } if($white) { echo ' white-text'; } if( $over) { echo ' has-overlay'; } if ($repeat) { echo ' repeat'; } echo esc_attr($align); ?>"<?php if ($bgcolor || $bgimg) { echo ' style="'.$has_bgcolor.' '.$has_bgimg.'"'; } ?>>
				<div class="acf-block-container<?php if ($max) { echo ' center-max'; } ?>">

					<div class="acf-block-text--<?php echo $layout; ?><?php if ($center) { echo ' centered'; } if ($center_x) { echo ' centered-x'; } ?>">
					<?php if ( $layout == '1col' ) { ?>
			        	
			        	<div class="acf-block-text-column">
				        	<?php echo $text1;?>
			        	</div>
			        	
					<?php } elseif ( $layout == '2col' || $layout == '2-1col' || $layout == '1-2col' ) { ?>
			      
			        	<div class="acf-block-text-column">
				        	<?php echo $text1;?>
			        	</div>
			        	<div class="acf-block-text-column">
				        	<?php echo $text2;?>
			        	</div>
			
					<?php } elseif ( $layout == '3col' ) { ?>
					
						<div class="acf-block-text-column">
				        	<?php echo $text1;?>
			        	</div>
			        	<div class="acf-block-text-column">
				        	<?php echo $text2;?>
			        	</div>
			        	<div class="acf-block-text-column">
				        	<?php echo $text3;?>
			        	</div>
			        	
					<?php } ?>
					</div>
				
				</div>
			</section>
			
			<?php } ?>