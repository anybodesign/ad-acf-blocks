<?php if ( !defined('ABSPATH') ) die();

	$cols = get_field('columns');
	$content = get_field('posts_select');
	$h = get_field('title_level');
	$show = get_field('content_show');
	
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

			<section class="acf-block--posts<?php if($white) { echo ' white-text'; } if( $over) { echo ' has-overlay'; } if ($repeat) { echo ' repeat'; } echo esc_attr($align); ?>"<?php if ($bgcolor || $bgimg) { echo ' style="'.$has_bgcolor.' '.$has_bgimg.'"'; } ?>>
				<div class="acf-block-container<?php if ($max) { echo ' center-max'; } ?>">

					<?php if( $content ): ?>
					<div class="acf-block-post-content--<?php echo $cols; ?>">
						
				        <?php foreach( $content as $c ): ?>
				        <div class="acf-block-post-item">
					        
				            <a href="<?php echo get_permalink( $c->ID ); ?>" title="<?php _e('Read ', 'adblocks'); echo get_the_title( $c->ID ); ?>">
						        <div class="acf-block-post-figure">
						            <?php 
							            if ( has_post_thumbnail( $c->ID ) ) { 
						            		echo get_the_post_thumbnail( $c->ID, 'thumbnail-hd'); 
										} else {
											echo '<img src="' . ADBLOCKS__PLUGIN_URL .'assets/fallback.png" alt="">'; 
							        } ?>
							    </div>
							    
					    		<div class="acf-block-post-content">
									<<?php echo $h; ?> class="acf-block-post-title"><?php echo get_the_title( $c->ID ); ?></<?php echo $h; ?>>
									<?php 
										if ($show == 'excerpt') {
											echo '<p class="acf-block-post-excerpt">'.strip_tags(get_the_excerpt($c->ID)).'</p>'; 
										}
										if ($show == 'content' ) {
											echo $c->post_content; 
										}	
									?>
								</div>
					        </a>
					        
				        </div>
				        <?php endforeach; ?>
				        
					</div>
					<?php endif; ?>	
				
				</div>
			</section>