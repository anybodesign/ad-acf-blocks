<?php if ( !defined('ABSPATH') ) die();

	$cols = get_field('columns');
	$type = get_field('type');
	$images = get_field('picture_gallery');
	$content = get_field('content_gallery');
	$legend = get_field('legend');
	
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
?>

			<section class="acf-block--gallery<?php if($white) { echo ' white-text'; } if( $over) { echo ' has-overlay'; } if ($repeat) { echo ' repeat'; } echo esc_attr($align); echo esc_attr(' '.$legend); ?>"<?php if ($bgcolor || $bgimg) { echo ' style="'.$has_bgcolor.' '.$has_bgimg.'"'; } ?>>
				<div class="acf-block-container<?php if ($max) { echo ' center-max'; } ?>">
					
				<?php if ($type == 'gallery') { ?>
				
					<?php if( $images ): ?>
					<div class="acf-block-gallery-pictures--<?php echo $cols; ?>">
						
				        <?php foreach( $images as $image ): ?>
				        <div class="acf-block-gallery-item">
					        
				            <a href="<?php echo $image['url']; ?>" title="<?php _e('Enlarge picture', 'adblocks'); ?>" data-fancybox="galerie">
					        <figure class="acf-block-gallery-figure"<?php if ( $image['caption'] ) { echo ' role="group"'; } ?>>
						            <img src="<?php echo $image['sizes']['thumbnail-hd']; ?>" alt="<?php echo $image['alt']; ?>">
									<?php if ( $image['caption'] ) { ?>
									<figcaption class="acf-block-gallery-caption">
										<span class="acf-block-gallery-caption-title"><?php echo $image['caption']; ?></span>
									</figcaption>
									<?php } ?>
						    </figure>
					        </a>
						    
				        </div>
				        <?php endforeach; ?>
				        
					</div>
					<?php endif; ?>							
					
				<?php } ?>
				
				
				
				<?php if ($type == 'content') { ?>

					<?php if( $content ): ?>
					<div class="acf-block-gallery-content--<?php echo $cols; ?>">
						
				        <?php foreach( $content as $c ): ?>
				        <div class="acf-block-gallery-item">
					        
				            <a href="<?php echo get_permalink( $c->ID ); ?>" title="<?php _e('Read ', 'adblocks'); echo get_the_title( $c->ID ); ?>">
					        <div class="acf-block-gallery-figure">
						            <?php 
							            if ( has_post_thumbnail( $c->ID ) ) { 
						            		echo get_the_post_thumbnail( $c->ID, 'thumbnail-hd'); 
										} else {
											echo '<img src="' . ADBLOCKS__PLUGIN_URL .'assets/fallback.png" alt="">'; 
							        } ?>
									<div class="acf-block-gallery-caption">
										<span class="acf-block-gallery-caption-title"><?php echo get_the_title( $c->ID ); ?></span>
									</div>
						    </div>
					        </a>
					        
				        </div>
				        <?php endforeach; ?>
				        
					</div>
					<?php endif; ?>	
					
				<?php } ?>
					
				
				</div>
			</section>