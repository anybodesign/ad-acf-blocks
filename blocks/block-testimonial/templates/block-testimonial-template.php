<?php if ( !defined('ABSPATH') ) die();

	$bgcolor = get_field('bg_color');
	$bgimg = get_field('bg_img');
	$max = get_field('center_max');
	$repeat = get_field('repeat');
	$white = get_field('white_text');
	$over = get_field('overlay');
	
	$slider = get_field('slider');
	$cols = get_field('cols');
	$dots = get_field('dots');
	$arrows = get_field('arrows');
	
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

	$className = 'acf-block--testimonial';
	if( !empty($block['className']) ) {
		$className .= ' ' . $block['className'];
	}
	if( !empty($block['align']) ) {
		$className .= ' align' . $block['align'];
	}
	
	//global $id;
	$id = 'slider-' . $block['id'];		
?>

			<?php // Block preview
				if( !empty( $block['data']['__is_preview'] ) ) { ?>
				<img src="<?php echo ADBLOCKS__PLUGIN_URL; ?>assets/previews/testimonial-preview.png" alt="" class="adblock-preview">
			<?php } else { ?>
			
				
			<section class="<?php echo esc_attr($className); if($bgimg) { echo ' has-bg-img'; } if($bgcolor) { echo ' has-bg-color'; } if ($white) { echo ' white-text'; } if ($slider) { echo ' has-slider'; } if( $over) { echo ' has-overlay'; } if ($repeat) { echo ' repeat'; } ?>"<?php if ($bgcolor || $bgimg) { echo ' style="'.$has_bgcolor.' '.$has_bgimg.'"'; } ?>>
				<div class="acf-block-container<?php if ($max) { echo ' center-max'; } ?>">

					<?php if( have_rows('testimonials') ): ?>
					
					<?php if( $slider ) { ?>
					<div class="acf-block-testimonials <?php echo $cols; ?> acf-block-testimonials-slider" id="<?php echo esc_attr($id); ?>">
					<?php } else { ?>
					<div class="acf-block-testimonials">
					<?php } ?>
						
				        <?php while( have_rows('testimonials') ): the_row();
							
							$avatar = get_sub_field('avatar');   
							$content = get_sub_field('content');
							$right = get_sub_field('right');
							
							$title = $content['title'];
							$text = $content['text'];
							$author = $content['author'];
							$desc = $content['desc'];
							
				        ?>
				        <article class="acf-block-testimonial-item<?php if ($right) { echo ' right'; } ?>">					        
							<?php if ($avatar) { ?>
							<div class="testimonial-picture">
								<img src="<?php echo $avatar['sizes']['adblocks-thumbnail-hd']; ?>" alt="<?php echo $avatar['alt']; ?>">
							</div>
							<?php } ?>

							<div class="testimonial-content">
								<?php if ($title) { ?>
								<p class="testimonial-title"><?php echo $title; ?></p>
								<?php } ?>
								
								<?php if ($text) { ?>
								<figure <?php if ($author || $desc) { echo ' role="group"'; } ?>>
									<blockquote>
										<?php echo $text; ?>
									</blockquote>
									<?php if ($author || $desc) { ?>
									<figcaption class="testimonial-caption">
										<?php if ($author) { echo '<span class="testimonial-author">'.$author.'</span>'; } ?>
										<?php if ($desc) { echo '<span class="testimonial-desc">'.$desc.'</span>'; } ?>
									</figcaption>
									<?php } ?>
								</figure>
								<?php } ?>
								
								
							</div>						    			        
				        </article>
				        <?php endwhile; ?>
				        
					</div>
					<?php endif; ?>	
						
						
										
				</div>
			</section>

			<?php 
				if ($slider) {
				
				if ($dots) {
					$show_dots = 'true';
				} else {
					$show_dots = 'false';
				}
				if ($arrows) {
					$show_arrows = 'true';
				} else {
					$show_arrows = 'false';
				}
				
				if ($cols == 'col2') {
					$n_small = 1;
					$n_med = 2;
					$n_large = 2;
				}
				else if ($cols == 'col3') {
					$n_small = 1;
					$n_med = 3;
					$n_large = 3;
				}
				else if ($cols == 'col4') {
					$n_small = 1;
					$n_med = 3;
					$n_large = 4;
				}
				echo "
					<script>
						jQuery(document).ready(function($) {
						
							var slick_slider;
							var settings;
							
							slick_slider = $('#".$id."');
							settings = {
								speed: 1000,
						    	slidesToShow: 1,
								slidesToScroll: 1,
								arrows: ".$show_arrows.",
								dots: ".$show_dots.",
								infinite: false,
								pauseOnHover: true,
								nextArrow: '<button type=\'button\' class=\'slick-next slick-arrow\' aria-label=\'".__('Next Pannel','adblocks')."\'> › </button>',
								prevArrow: '<button type=\'button\' class=\'slick-prev slick-arrow\' aria-label=\'".__('Previous Pannel','adblocks')."\'> ‹ </button>',
								mobileFirst: true,
								responsive: [
								    {
								      breakpoint: 480,
								      settings: {
								        slidesToShow: ".$n_small.",
								        slidesToScroll: ".$n_small.",
								      }
								    },
									{
								      breakpoint: 720,
								      settings: {
								        slidesToShow: ".$n_med.",
								        slidesToScroll: ".$n_med.",
								      }
								    },
								    {
								      breakpoint: 960,
								      settings: {
								        slidesToShow: ".$n_large.",
								        slidesToScroll: ".$n_large.",
								      }
								    }
								]
							};
							slick_slider.slick(settings);
							
							$('.slick-slide, .slick-slide a').removeAttr('tabindex');
							
							
							$(window).on('load',function() {
								$('.slick-slide').removeAttr('tabindex');
							});
							
							$(window).on('resize',function() {
								if ($(window).width() > 720) {
									$('.slick-slide').removeAttr('tabindex');
								}
							});	
							
							$('.slick-dots li button').prepend('".__('Pannel','adblocks')." ');
						});
					</script>
					";
			} ?>	
			
			<?php } ?>