<?php if ( !defined('ABSPATH') ) die();

	$text = get_field('text');
	$type = get_field('bg_type');
	
	$bg = get_field('bg_img');
	$video = get_field('bg_video');
	$poster = get_field('poster');
	
	$slideshow = get_field('slideshow');

	$scroll = get_field('scroll');
	$scroll_btn = get_field('scroll_btn');
	$scroll_show = get_field('scroll_show');
	$scroll_label = get_field('scroll_label');
	
	if ($scroll_btn) {
		$btn = $scroll_btn;
	} else {
		$btn = ADBLOCKS__PLUGIN_URL .'/blocks/block-pagebanner/assets/arrow.svg';
	}
	if ($scroll_label) {
		$label = $scroll_label;
	} else {
		$label = 'Scroll Down';
	}

	if( !empty($block['align']) ) {
	    $align = ' align' . $block['align'];
	} else {
		$align = null;
	}	
?>

			<?php // Block preview
				if( !empty( $block['data']['__is_preview'] ) ) { ?>
				<img src="<?php echo ADBLOCKS__PLUGIN_URL; ?>assets/previews/pagebanner-preview.png" alt="" class="adblock-preview">
			<?php } else { ?>			
			
			<section class="acf-block--pagebanner<?php echo esc_attr($align); ?>">
				<div class="acf-block-container">
					
					<?php if ( $type == 'video' && $video ) { ?>
					<video id="banner_video" class="banner-video" loop muted autoplay<?php if ( $poster ) { echo ' poster="'.$poster.'"'; } ?>>
						<source type="video/mp4" src="<?php echo $video; ?>">
					</video>
					<button id="banner_stop">
						<img src="<?php echo ADBLOCKS__PLUGIN_URL .'/blocks/block-pagebanner/assets/stop.svg'; ?>" class="banner-btn" alt="<?php esc_html_e('Stop video playback', 'adblocks'); ?>">
					</button>
					<button id="banner_play">
						<img src="<?php echo ADBLOCKS__PLUGIN_URL .'/blocks/block-pagebanner/assets/play.svg'; ?>" class="banner-btn" alt="<?php esc_html_e('Play video', 'adblocks'); ?>">
					</button>
					
					<?php } else if ( $type == 'slideshow' && $slideshow ) { ?>
					
					<div class="banner-slideshow">
				    <?php foreach( $slideshow as $slide ): ?>
			            <div class="slick-item">
							<img src="<?php echo esc_url($slide['sizes']['adblocks-large-hd']); ?>" alt="<?php echo esc_attr($slide['alt']); ?>" />
			            </div>
			        <?php endforeach; ?>				
					</div>
					
					
					<?php } else { 
						echo '<img src="'.$bg.'" class="banner-bg" alt="">';	
					} ?>
					
								
					<?php if ( $text ) { ?>
					<div class="acf-block-banner-text">
						<?php echo $text; ?>
						
						<?php if ($scroll) { ?>
						<button class="scroll-down">
							<?php if ($scroll_show) { ?>
							<img src="<?php echo $btn; ?>" alt="">
							<?php } else { ?>
							<img src="<?php echo $btn; ?>" alt="<?php esc_attr_e($label, 'adblocks'); ?>">
							<?php } ?>
							<?php if ($scroll_show) { esc_attr_e($label, 'adblocks'); } ?>
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