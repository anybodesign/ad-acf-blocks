<?php if ( !defined('ABSPATH') ) die();

	$text = get_field('text');
	$type = get_field('bg_type');
	
	$bg = get_field('bg_img');
	$video = get_field('bg_video');
	$poster = get_field('poster');
	$loop = get_field('loop');
	$mute = get_field('muted');
	$auto = get_field('autoplay');
	
	$slideshow = get_field('slideshow');
	$s_speed = get_field('slideshow_speed');
	$s_autospeed = get_field('slideshow_autospeed');
	$s_loop = get_field('slideshow_loop');
	if ($s_loop == false) {
		$infinite = 'false';
	} else {
		$infinite = 'true';
	}

	$scroll = get_field('scroll');
	$scroll_btn = get_field('scroll_btn');
	$scroll_show = get_field('scroll_show');
	$scroll_label = get_field('scroll_label');
	
	if ( $type == 'video' ) {
		$the_type = ' has-video';
	} elseif ( $type == 'slideshow' ) {
		$the_type = ' has-slideshow';
	} else {
		$the_type = ' has-picture';
	}
	
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
			
			<section class="acf-block--pagebanner<?php echo $the_type; echo esc_attr($align); ?>">
				<div class="acf-block-container">
					
					<?php if ( $type == 'video' && $video ) { ?>
					<video id="banner_video" class="banner-video"<?php if ( $loop ) { echo ' loop'; } if ( $mute ) { echo ' muted'; } if ( $auto ) { echo ' autoplay'; } if ( $poster ) { echo ' poster="'.$poster.'"'; } ?>>
						<source type="video/mp4" src="<?php echo $video; ?>">
					</video>
					<button id="banner_stop"<?php if ( ! $auto ) { echo ' style="display:none"'; } ?>>
						<img src="<?php echo ADBLOCKS__PLUGIN_URL .'/blocks/block-pagebanner/assets/stop.svg'; ?>" class="banner-btn" alt="<?php esc_html_e('Stop video playback', 'adblocks'); ?>">
					</button>
					<button id="banner_play"<?php if ( ! $auto ) { echo ' style="display:block"'; } ?>>
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
					<?php if (!is_admin()) { ?>
					<script>
						jQuery(document).ready(function($) {
							var item_length = $('.banner-slideshow > div').length - 1;
							var slideshow = $('.banner-slideshow').slick({
								autoplay: true,
								speed: <?php echo $s_speed; ?>,
								autoplaySpeed: <?php echo $s_autospeed; ?>,
								infinite: <?php echo $infinite; ?>,
						    	slidesToShow: 1,
								slidesToScroll: 1,
								fade: true,
								arrows: false,
								dots: false,
								draggable: false,
								swipe: false,
								touchMove: false
						    });
							<?php if ($s_loop == false) { ?>
							// On before slide change
							slideshow.on('afterChange', function(event, slick, currentSlide, nextSlide){
							  if( item_length === slideshow.slick('slickCurrentSlide') ){
							    slideshow.slickPause();
							    //slideshow.slickSetOption("autoplay",false,false)
							  };
							});
							<?php } ?>
						});
					</script>
					<?php } ?>
					
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