<?php if ( !defined('ABSPATH') ) die();

	$text = get_field('text') ?: __('Enter text here...', 'adblocks');
	$link = get_field('link');
	
	$bgcolor = get_field('bg_color');
	$bgimg = get_field('bg_img');
	$repeat = get_field('repeat');
	$white = get_field('white_text');
	$over = get_field('overlay');
	
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
				<img src="<?php echo ADBLOCKS__PLUGIN_URL; ?>assets/previews/cta-preview.png" alt="" class="adblock-preview">
			<?php } else { ?>

			<section class="acf-block--cta<?php if($white) { echo ' white-text'; } if( $over) { echo ' has-overlay'; } if ($repeat) { echo ' repeat'; } echo esc_attr($align); ?>"<?php if ($bgcolor || $bgimg) { echo ' style="'.$has_bgcolor.' '.$has_bgimg.'"'; } ?>>
				<div class="acf-block-container">
				
					<?php if( $text ) { ?>
					<div class="acf-block-cta-text">
						<?php echo $text; ?>
					</div>
					<?php } ?>
				
					<?php if( $link ) : ?>
					<div class="acf-block-cta-btn">
						<a href="<?php echo $link['url']; ?>" class="action-btn"<?php if($link['target']) { echo ' target="'.$link['target'].'"'; } ?>>
							<?php echo $link['title']; ?>
						</a>
					</div>
					<?php endif; ?>

				</div>
			</section>
			
			<?php } ?>