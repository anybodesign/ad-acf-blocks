<?php if ( !defined('ABSPATH') ) die();

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

	$className = 'acf-block--testimonial';
	if( !empty($block['className']) ) {
		$className .= ' ' . $block['className'];
	}
	if( !empty($block['align']) ) {
		$className .= ' align' . $block['align'];
	}						
?>

			<?php // Block preview
				if( !empty( $block['data']['__is_preview'] ) ) { ?>
				<img src="<?php echo ADBLOCKS__PLUGIN_URL; ?>assets/previews/testimonial-preview.png" alt="" class="adblock-preview">
			<?php } else { ?>
						
			<section class="<?php echo esc_attr($className); if($bgimg) { echo ' has-bg-img'; } if($bgcolor) { echo ' has-bg-color'; } if ($white) { echo ' white-text'; } if( $over) { echo ' has-overlay'; } if ($repeat) { echo ' repeat'; } ?>"<?php if ($bgcolor || $bgimg) { echo ' style="'.$has_bgcolor.' '.$has_bgimg.'"'; } ?>>
				<div class="acf-block-container<?php if ($max) { echo ' center-max'; } ?>">

					<?php if( have_rows('testimonials') ): ?>
					<div class="acf-block-testimonials">
						
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
			
			<?php } ?>