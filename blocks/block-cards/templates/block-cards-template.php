<?php if ( !defined('ABSPATH') ) die();

	$cols = get_field('columns');
	
	$h = get_field('title_level');
		
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

			<?php // Block preview
				if( !empty( $block['data']['__is_preview'] ) ) { ?>
				<img src="<?php echo ADBLOCKS__PLUGIN_URL; ?>assets/previews/cards-preview.png" alt="" class="adblock-preview">
			<?php } else { ?>

			<section class="acf-block--cards<?php if($white) { echo ' white-text'; } if( $over) { echo ' has-overlay'; } if ($repeat) { echo ' repeat'; } echo esc_attr($align); ?>"<?php if ($bgcolor || $bgimg) { echo ' style="'.$has_bgcolor.' '.$has_bgimg.'"'; } ?>>
				<div class="acf-block-container<?php if ($max) { echo ' center-max'; } ?>">

					<?php if ( have_rows( 'cards' ) ) : ?>
					<div class="acf-block-cards<?php echo '--'.$cols; ?>">
						
						<?php while ( have_rows( 'cards' ) ) : the_row(); ?>
							
				        <div class="acf-block-cards-item">
					        
					        <?php 
						        $infos = get_sub_field('infos');
						        $more = get_sub_field('picture_and_links');
						        
						        $title = $infos['title'];
						        $subtitle = $infos['subtitle'];
						        $text = $infos['text'];
						        
						        $picture = $more['picture'];
						        $link = $more['link'];
					        ?>
					        
						    
							<?php if ($picture) { ?>
					        <div class="acf-block-cards-figure">						        
						    	<img src="<?php echo $picture['sizes']['adblocks-thumbnail-hd']; ?>" alt="<?php echo $picture['alt']; ?>">
						    </div>
							<?php } ?>
							

							<?php if ($title || $subtitle || $text) { ?>
					        <div class="acf-block-cards-content">						        
						    	<?php if ($title) { ?>
						    		<<?php echo $h; ?> class="acf-block-cards-title"><?php echo $title; ?></<?php echo $h; ?>>
						    	<?php } ?>
						    	<?php if ($subtitle) { ?>
						    		<p class="acf-block-cards-subtitle"><?php echo $subtitle; ?></p>
						    	<?php } ?>
						    	<?php if ($text) { echo '<p>'.$text.'</p>'; } ?>
						    </div>
							<?php } ?>
						    

							<?php if ($link) { ?>
							<div class="acf-block-cards-link">
								<a href="<?php echo $link['url']; ?>" class="action-btn"><?php echo $link['title']; ?></a>
							</div>	
							<?php } ?>
					        
				        </div>
				        
					
						<?php endwhile; ?>
						
					</div>	
					<?php endif; ?>						
						
				        
					
				</div>
			</section>

			<?php } ?>			