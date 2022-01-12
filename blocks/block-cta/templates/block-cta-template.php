<?php if ( !defined('ABSPATH') ) die();
	
	$type = get_field('type');
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
	
	$className = 'acf-block--cta';
	if( !empty($block['className']) ) {
		$className .= ' ' . $block['className'];
	}
	if( !empty($block['align']) ) {
		$className .= ' align' . $block['align'];
	}						
?>
			<?php // Block preview
				if( !empty( $block['data']['__is_preview'] ) ) { ?>
				<img src="<?php echo ADBLOCKS__PLUGIN_URL; ?>assets/previews/cta-preview.png" alt="" class="adblock-preview">
			<?php } else { ?>

			<section class="<?php echo esc_attr($className); if($bgimg) { echo ' has-bg-img'; } if($bgcolor) { echo ' has-bg-color'; } if ($type == 'inline') { echo ' inline-cta'; } else { echo ' boxed-cta'; } if ($white) { echo ' white-text'; } if ($over) { echo ' has-overlay'; } if ($repeat) { echo ' repeat'; } ?>"<?php if ($bgcolor || $bgimg) { echo ' style="'.$has_bgcolor.' '.$has_bgimg.'"'; } ?>>
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