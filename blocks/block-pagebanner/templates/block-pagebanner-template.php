<?php if ( !defined('ABSPATH') ) die();

	$text = get_field('text');
	$type = get_field('bg_type');
	
	$bg = get_field('bg_img');
	$video = get_field('bg_video');
	$poster = get_field('poster');
	
	$slideshow = get_field('slideshow');

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
						<img src="<?php echo ADBLOCKS__PLUGIN_URL .'/blocks/block-pagebanner/assets/stop.svg'; ?>" class="banner-btn" alt="<?php esc_html_e('Stop video playback', 'adblocks'); ?>">
					</button>
					<button id="banner_play">
						<img src="<?php echo ADBLOCKS__PLUGIN_URL .'/blocks/block-pagebanner/assets/play.svg'; ?>" class="banner-btn" alt="<?php esc_html_e('Play video', 'adblocks'); ?>">
					</button>
					
					<?php } else if ( $type == 'slideshow' && $slideshow ) { ?>
					
					<div class="banner-slideshow splide">
						<div class="splide__track">
							<div class="splide__list">
					        <?php foreach( $slideshow as $slide ): ?>
					            <div class="splide__slide">
									<img src="<?php echo esc_url($slide['sizes']['adblocks-large-hd']); ?>" alt="<?php echo esc_attr($slide['alt']); ?>" />
					            </div>
					        <?php endforeach; ?>
							</div>
						</div>						
					</div>
					
					
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