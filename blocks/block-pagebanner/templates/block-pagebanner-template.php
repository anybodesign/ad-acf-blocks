<?php if ( !defined('ABSPATH') ) die();

	$text = get_field('text');
	$type = get_field('bg_type');
	
	$bg = get_field('bg_img');
	$video = get_field('bg_video');
	$poster = get_field('poster');
	
	$scroll = get_field('scroll');
	$scroll_btn = get_field('scroll_btn');
	
	if ($scroll_btn) {
		$btn = $scroll_btn;
	} else {
		$btn = ADBLOCKS__PLUGIN_URL .'/blocks/block-pagebanner/assets/arrow.svg';
	}

	if( !empty($block['align']) ) {
	    $align = ' align' . $block['align'];
	} else {
		$align = null;
	}	
?>

			<?php if( !empty( $block['data']['__is_preview'] ) ) { // Block preview ?>


			<?php } else { ?>			
			
			<section class="acf-block--pagebanner<?php echo esc_attr($align); ?>">
				<div class="acf-block-container">
					
					<?php if ( $type == 'video' && $video ) { ?>
					<video id="banner_video" class="banner-video" loop muted autoplay<?php if ( $poster ) { echo ' poster="'.$poster.'"'; } ?>>
						<source type="video/mp4" src="<?php echo $video; ?>">
					</video>
					<button id="banner_stop">
						<img src="<?php echo ADBLOCKS__PLUGIN_URL .'/blocks/block-pagebanner/assets/stop.svg'; ?>" class="banner-bg" alt="<?php esc_html_e('Stop video playback', 'adblocks'); ?>">
					</button>
					
					<?php } else { 
						echo '<img src="'.$bg.'" class="banner-bg" alt="">';	
					} ?>
					
								
					<?php if ( $text ) { ?>
					<div class="acf-block-banner-text">
						<?php echo $text; ?>
						
						<?php if ($scroll) { ?>
						<button class="scroll-down">
							<img src="<?php echo $btn; ?>" alt="<?php esc_html_e('Scroll Down', 'adblocks'); ?>">
						</button>
						<?php } ?>						
					</div>
					<?php } ?>
										
				</div>
			</section>
			<?php if ($scroll) { ?>
			<div id="banner_after"></div>
			<?php } ?>	
						
			<?php } ?>