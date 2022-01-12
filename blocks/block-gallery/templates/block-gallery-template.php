<?php if ( !defined('ABSPATH') ) die();

	$cols = get_field('columns');
	$type = get_field('type');
	$display = get_field('display');
	
	$items = get_field('grid_gallery');
	$images = get_field('picture_gallery');
	$content = get_field('content_gallery');
	$legend = get_field('legend');
	
	$zoom = get_field('zoom');
	$fancy = get_field('fancy');
		
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
		
	$className = 'acf-block--gallery';
	if( !empty($block['className']) ) {
		$className .= ' ' . $block['className'];
	}
	if( !empty($block['align']) ) {
		$className .= ' align' . $block['align'];
	}

	$location = get_template_directory_uri(). '/img/';
	$location = str_replace("http://", "", $location);
	$location = str_replace("https://", "", $location);
	$location = str_replace($_SERVER['HTTP_HOST'], "", $location);
	$location = $_SERVER['DOCUMENT_ROOT'].$location;
	
	$path1 = $location. 'fallback.png';
	$path2 = $location. 'fallback.jpg';
	$fallback1 = get_template_directory_uri(). '/img/fallback.png';
	$fallback2 = get_template_directory_uri(). '/img/fallback.jpg';
?>

			<?php // Block preview
				if( !empty( $block['data']['__is_preview'] ) ) { ?>
				<img src="<?php echo ADBLOCKS__PLUGIN_URL; ?>assets/previews/gallery-preview.png" alt="" class="adblock-preview">
			<?php } else { ?>

			<section class="<?php echo esc_attr($className); if($bgimg) { echo ' has-bg-img'; } if($bgcolor) { echo ' has-bg-color'; } if($white) { echo ' white-text'; } if( $over) { echo ' has-overlay'; } if ($repeat) { echo ' repeat'; } echo esc_attr(' '.$legend); ?>"<?php if ($bgcolor || $bgimg) { echo ' style="'.$has_bgcolor.' '.$has_bgimg.'"'; } ?>>
				<div class="acf-block-container<?php if ($max) { echo ' center-max'; } ?>">
					
					
				<?php if ($type == 'gallery' && $display == 'grid') { ?>
				
					<?php if( $items ): ?>
					<div class="acf-block-gallery-pictures--<?php echo $cols; ?> gallery-grid">
						<?php foreach( $items as $item ): 
						
							$image = $item['grid_picture'];
							$size = $item['grid_size'];
							
							if ($size == 'square' || $size == 'big') {
								$the_size = $image['sizes']['adblocks-thumbnail-hd'];
							} else {
								$the_size = $image['sizes']['adblocks-medium-hd'];
							}
						?>
						<div class="acf-block-gallery-item<?php echo ' grid-'.$size; ?>">
							<?php if( $zoom ): ?>
				            <a href="<?php echo $image['url']; ?>" "title="<?php esc_attr_e('Enlarge picture', 'adblocks'); ?>"<?php if ($fancy) { echo ' data-fancybox="grid-gallery"'; } ?>>
					        <?php endif; ?>	   
					        <figure class="acf-block-gallery-figure"<?php if ( $image['caption'] ) { echo ' role="group"'; } ?>>
						            <div><img src="<?php echo $the_size; ?>" alt="<?php echo $image['alt']; ?>"></div>
									<?php if ( $image['caption'] ) { ?>
									<figcaption class="acf-block-gallery-caption">
										<span class="acf-block-gallery-caption-title"><?php echo $image['caption']; ?></span>
									</figcaption>
									<?php } ?>
						    </figure>
					        <?php if( $zoom): ?>
					        </a>
					        <?php endif; ?>	
							
							 
						</div>
						<?php endforeach; ?>
					</div>
					<?php endif; ?>	
					
					
				<?php } else if ($type == 'gallery' && $display != 'grid') { ?>
				
				
					<?php if( $images ): ?>
					<div class="acf-block-gallery-pictures--<?php echo $cols; ?>">
						
				        <?php foreach( $images as $image ): ?>
				        <div class="acf-block-gallery-item">
					        
					        <?php 								
								$size = get_field('img_size', $image['ID']);
								$link = get_field('img_link', $image['ID']);
								
								if ($size == 'medium') {
									$the_size = $image['sizes']['adblocks-medium-hd'];
								}
								else if ($size == 'large') {
									$the_size = $image['sizes']['adblocks-large-hd'];
								}
								else {
									$the_size = $image['sizes']['adblocks-thumbnail-hd'];
								}
								
								if ($link) {
									$the_link = $link;
									$the_title = 'target="_blank" title="'.__('Open a new tab', 'adblocks').'"';
								} else {
									$the_link = $image['url'];
									$the_title = 'title="'.__('Enlarge picture', 'adblocks').'"';
								}
						        
					        ?>
					        
					        <?php if( $zoom || $link ): ?>
				            <a href="<?php echo $the_link; ?>" <?php echo $the_title; if ($fancy && !$link) { echo ' data-fancybox="gallery"'; } ?>>
					        <?php endif; ?>	   
					        <figure class="acf-block-gallery-figure"<?php if ( $image['caption'] ) { echo ' role="group"'; } ?>>
						            <div><img src="<?php echo $the_size; ?>" alt="<?php echo $image['alt']; ?>"></div>
									<?php if ( $image['caption'] ) { ?>
									<figcaption class="acf-block-gallery-caption">
										<span class="acf-block-gallery-caption-title"><?php echo $image['caption']; ?></span>
									</figcaption>
									<?php } ?>
						    </figure>
					        <?php if( $zoom || $link ): ?>
					        </a>
					        <?php endif; ?>	
						    
				        </div>
				        <?php endforeach; ?>
				        
					</div>
					<?php endif; ?>							
					
				<?php } ?>
				
				
				
				<?php if ($type == 'content') { ?>

					<?php if( $content ): ?>
					<div class="acf-block-gallery-content--<?php echo $cols; ?>">
						
				        <?php foreach( $content as $c ): $cpt = get_post_type($c->ID); ?>
				        <div class="acf-block-gallery-item <?php echo 'type-'.$cpt; ?>">
					        
					        <?php 
						        $size = get_field('feature_size');
						        $btn = get_field('btn');
					        ?>
					        
				            <a href="<?php echo get_permalink( $c->ID ); ?>" title="<?php _e('Read ', 'adblocks'); echo get_the_title( $c->ID ); ?>">
					        <div class="acf-block-gallery-figure">						        
						            <?php 
							            if ( has_post_thumbnail( $c->ID ) ) { 
						            		if ($size) {
						            		echo '<div>'.get_the_post_thumbnail( $c->ID, 'adblocks-'.$size.'-hd').'</div>';
											} else {
						            		echo '<div>'.get_the_post_thumbnail( $c->ID, 'adblocks-thumbnail-hd').'</div>';
						            		} 
											
										} else {
											
											if ( file_exists( $path1 ) ) {
					            			echo '<div><img src="' . $fallback1. '" alt=""></div>';  
											} else if ( file_exists( $path2 ) ) {
					            			echo '<div><img src="' . $fallback2. '" alt=""></div>';  
											} else {
											echo '<div><img src="' . ADBLOCKS__PLUGIN_URL .'assets/fallback.png" alt=""></div>';
											} 
							        } ?>
									<div class="acf-block-gallery-caption">
										<span class="acf-block-gallery-caption-title"><?php echo get_the_title( $c->ID ); ?></span>
									</div>
						    </div>
					        </a>

							<?php if ($btn) { ?>
							<p><?php echo get_the_excerpt( $c->ID ); ?></p>
							<a href="<?php echo get_permalink( $c->ID ); ?>" class="action-btn"><?php _e('Read More', 'adblocks'); ?></a>	
							<?php } ?>
					        
				        </div>
				        <?php endforeach; ?>
				        
					</div>
					<?php endif; ?>	
					
				<?php } ?>
					
				
				</div>
			</section>

			<?php } ?>			