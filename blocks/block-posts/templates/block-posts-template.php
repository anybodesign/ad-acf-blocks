<?php if ( !defined('ABSPATH') ) die();

	$cols = get_field('columns');

	$has_title = get_field('title');
	$title = get_field('title_text');
	$has_intro = get_field('intro');
	$intro = get_field('intro_text');
	$has_link = get_field('link');
	$link = get_field('link_value');
	
	$content = get_field('posts_select');
	$h1 = get_field('first_title_level');
	$h = get_field('title_level');
	$show = get_field('content_show');
	$metas = get_field('metas');
	$your_metas = get_field('your_metas');
	
	$size = get_field('posts_size_feature_size');
	$slider = get_field('slider');
	$mob = get_field('slider_mobile');
	
	$has_custom = get_field('has_custom_size');
	$customsize = get_field('custom_size');
	
	if ($h1) {
		$h_title = $h1;
	} else {
		$h_title = 'h2';
	}
	
	// Bg
	
	$bgcolor = get_field('bg_color');
	$bgimg = get_field('bg_img');
	$max = get_field('center_max');
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
	
	//global $id;
	$id = 'slider-' . $block['id'];						
?>

			<?php // Block preview
				if( !empty( $block['data']['__is_preview'] ) ) { ?>
				<img src="<?php echo ADBLOCKS__PLUGIN_URL; ?>assets/previews/posts-preview.png" alt="" class="adblock-preview">
			<?php } else { ?>

			<section class="acf-block--posts<?php if($white) { echo ' white-text'; } if( $over) { echo ' has-overlay'; } if ($repeat) { echo ' repeat'; } echo esc_attr($align); ?>"<?php if ($bgcolor || $bgimg) { echo ' style="'.$has_bgcolor.' '.$has_bgimg.'"'; } ?>>
				<div class="acf-block-container<?php if ($max) { echo ' center-max'; } ?>">
					
					<?php if ( $has_intro || $has_title ) { ?>
					<div class="acf-block-post-intro">
						<?php if ( $has_title ) { echo '<'.$h_title.' class="acf-block-post-intro-title">'.$title.'</'.$h_title.'>'; } ?>
						<?php if ( $has_intro ) { echo $intro; } ?>
					</div>
					<?php } ?>
					
					<?php if( $content ): ?>
					<?php if( $slider ) { ?>
					<div class="acf-block-post-content--<?php echo $cols; ?> acf-block-post-slider" id="<?php echo esc_attr($id); ?>">
					<?php } else { ?>
					<div class="acf-block-post-content--<?php echo $cols; ?>">
					<?php } ?>
						
				        <?php foreach( $content as $c ): 
					        
			        		$cat = get_the_category($c->ID);
							$cpt = get_post_type($c->ID);

				        ?>
				        <div class="acf-block-post-item <?php echo $cpt.'-block'; ?>">
					        
					        <div class="acf-block-post-figure">
						        <a href="<?php echo get_permalink( $c->ID ); ?>" title="<?php _e('Read ', 'adblocks'); echo get_the_title( $c->ID ); ?>" rel="nofollow">
					            <?php 
						            if ( has_post_thumbnail( $c->ID ) && $size && ! $has_custom ) { 
					            		echo get_the_post_thumbnail( $c->ID, 'adblocks-'.$size.'-hd');
									}
									else if ( has_post_thumbnail( $c->ID ) && $customsize && $has_custom ) { 
					            		echo get_the_post_thumbnail( $c->ID, $customsize); 
									} 
									else if ( has_post_thumbnail( $c->ID ) ) {
					            		echo get_the_post_thumbnail( $c->ID, 'adblocks-thumbnail-hd'); 
									} 
									else {
										echo '<img src="' . ADBLOCKS__PLUGIN_URL .'assets/fallback.png" alt="">'; 
						        	} 
						        ?>
						        </a>
						    </div>
						    
				    		<div class="acf-block-post-content">
								
								<header class="acf-block-post-header">
									<<?php echo $h; ?> class="acf-block-post-title">
										<a href="<?php echo get_permalink( $c->ID ); ?>">
										<?php echo get_the_title( $c->ID ); ?>
										</a>
									</<?php echo $h; ?>>
									
									<?php if ( $metas ) { ?>
									<div class="acf-block-post-metas">
										<span class="meta-date">
											<span class="meta-date-text"><?php _e( 'Posted on&nbsp;', 'adblocks' ); ?></span><span class="meta-date-time"><?php echo '<span class="day">'.get_the_time( ('j'), $c->ID ).'</span> '; echo '<span class="month">'.get_the_time( ('F'), $c->ID ).'</span> '; echo '<span class="year">'.get_the_time( ('Y'), $c->ID ).'</span>'; ?></span>
										</span>
										<?php if( $your_metas && in_array('author', $your_metas) ) { ?>
										<span class="meta-author">
											<?php _e( 'by&nbsp;', 'adblocks' ); echo get_the_author(); ?>
										</span>
										<?php } ?>
										<?php if( $your_metas && in_array('cat', $your_metas) && $cpt == 'post' ) { ?>
										<span class="meta-category">
											<?php _e( 'in&nbsp;', 'adblocks' ); echo '<a href="'.esc_url( get_category_link( $cat[0]->term_id) ).'">' . esc_html( $cat[0]->name) . '</a>'; ?>
										</span>
										<?php } ?>
									</div>
									<?php } ?>									
								</header>

								<div class="acf-block-post-excerpt">
									<?php 
										if ($show == 'excerpt') {
											
											$my_excerpt = $c->post_excerpt;
											$manual_excerpt = get_the_excerpt( $c->ID );
											$permalink = get_permalink( $c->ID );
											
											if ( $my_excerpt != '' ) {												
										        echo '<p>'.$manual_excerpt.' <a class="read-more" href="'.$permalink.'" rel="nofollow">'.esc_html__('Read more', 'adblocks').'</a></p>';
										    } else {
												echo adblocks_get_excerpt(125, $c->ID);
											}											
										}
										
										if ($show == 'content' ) {
											echo $c->post_content; 
										}	
									?>
								</div>
									
							</div>
					        
				        </div>
				        <?php endforeach; ?>

					</div>
					<?php endif; ?>
					
					
					<?php if ( $has_link ) { ?>
					<div class="acf-block-post-link">
						<a href="<?php echo $link['url']; ?>" class="action-btn"<?php if ( $link['target'] ) { echo ' target="'.$link['target'].'"'; } ?>><?php echo $link['title']; ?></a>
						
					</div>
					<?php } ?>	
				
				</div>
			</section>
			
			
			<?php 
				if ($slider && $mob) { 
				
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
								arrows: true,
								dots: true,
								infinite: false,
								pauseOnHover: true,
								nextArrow: '<button type=\'button\' class=\'slick-next slick-arrow\' aria-label=\'Next pannel\'> › </button>',
								prevArrow: '<button type=\'button\' class=\'slick-prev slick-arrow\' aria-label=\'Previous pannel\'> ‹ </button>',
								mobileFirst: true,
								responsive: [
								    {
								      breakpoint: 375,
								      settings: {
								        slidesToShow: 2,
								        slidesToScroll: 2,
								      }
								    },
									{
								      breakpoint: 720,
								      settings: {
								        slidesToShow: 3,
								        slidesToScroll: 3,
								      }
								    },
								    {
								      breakpoint: 960,
								      settings: 'unslick'
								    }
								]
							};
							slick_slider.slick(settings);
							
							$(window).on('resize',function() {
								if ($(window).width() > 959) {
									if (slick_slider.hasClass('slick-initialized')) {
										slick_slider.slick('unslick');
										$('.acf-block-post-item').removeAttr('tabindex');
									}
									return;
								}
								if (!slick_slider.hasClass('slick-initialized')) {
									return slick_slider.slick(settings);
								}
								return;
							});
							
							$('.slick-slide, .slick-slide a').removeAttr('tabindex');
							
							$(window).on('load',function() {
								$('.slick-slide').removeAttr('tabindex');
							});
							
							$(window).on('resize',function() {
								if ($(window).width() > 720) {
									$('.slick-slide').removeAttr('tabindex');
								}
							});	
							
							$('.slick-dots li button').prepend('Pannel ');
						});
					</script>
					";
				
				}
				else if ($slider && !$mob) {
				// RWD
				
				if ($cols == '1col') {
					$n_small = 1;
					$n_med = 1;
					$n_large = 1;
				}
				else if ($cols == '2cols') {
					$nb = 2;
					$n_small = 2;
					$n_med = 2;
					$n_large = 2;
				}
				else if ($cols == '3cols') {
					$n_small = 2;
					$n_med = 3;
					$n_large = 3;
				}
				else if ($cols == '4cols') {
					$n_small = 2;
					$n_med = 3;
					$n_large = 4;
				}
				else if ($cols == '5cols') {
					$n_small = 2;
					$n_med = 3;
					$n_large = 5;
				}
				else if ($cols == '6cols') {
					$n_small = 2;
					$n_med = 3;
					$n_large = 6;
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
								arrows: true,
								dots: true,
								infinite: false,
								pauseOnHover: true,
								nextArrow: '<button type=\'button\' class=\'slick-next slick-arrow\' aria-label=\'Next pannel\'> › </button>',
								prevArrow: '<button type=\'button\' class=\'slick-prev slick-arrow\' aria-label=\'Previous pannel\'> ‹ </button>',
								mobileFirst: true,
								responsive: [
								    {
								      breakpoint: 375,
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
							
							$('.slick-dots li button').prepend('Pannel ');
						});
					</script>
					";
			} ?>		
			
			<?php } ?>