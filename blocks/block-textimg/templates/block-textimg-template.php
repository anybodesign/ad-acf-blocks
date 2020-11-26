<?php if ( !defined('ABSPATH') ) die();

	$prop = get_field('proportions');
	$right = get_field('right');
	$round = get_field('round');
	$center = get_field('center');
	$zoom = get_field('zoom');
	$fancy = get_field('fancy');
	$img = get_field('picture');
	$text = get_field('text');
	$size = get_field('textimg_size_feature_size');
	$link = get_field('link');
	$caption = get_field('caption');
	
	$media = get_field('media_type');
	$video = get_field('video');

	$has_custom = get_field('has_custom_size');
	$customsize = get_field('custom_size');
		
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
				<img src="<?php echo ADBLOCKS__PLUGIN_URL; ?>assets/previews/textimg-preview.png" alt="" class="adblock-preview">
			<?php } else { ?>
						
			<section class="acf-block--textimg<?php if ($right) { echo ' right'; } if($white) { echo ' white-text'; } if( $over) { echo ' has-overlay'; } if ($repeat) { echo ' repeat'; } echo esc_attr($align); ?>"<?php if ($bgcolor || $bgimg) { echo ' style="'.$has_bgcolor.' '.$has_bgimg.'"'; } ?>>
				<div class="acf-block-container<?php if ($right) { echo ' right'; } ?><?php if ($center) { echo ' centered'; } if ($max) { echo ' center-max'; } echo ' '.esc_attr($prop); ?>">

					<div class="acf-block-textimg-picture">

					<?php 
						if ($media == 'video' && $video ) { 
							
							echo $video; 
						
						} else { ?>	
						
						<?php if ($img) { ?>
						<figure<?php if ( $img['caption'] ) { echo ' role="group"'; } ?>>
							
							<?php if ( $zoom || $link ) { 
								if ($zoom) {
									$href = '<a href="'.$img['url'].'" title="'.esc_attr__('Enlarge picture', 'adblocks').'">';
								}
								if ($zoom && $fancy) {
									$href = '<a href="'.$img['url'].'" title="'.esc_attr__('Enlarge picture', 'adblocks').'" data-fancybox="picture">';	
								}
								if ($link) {
									$href = '<a href="'.$link['url'].'" title="'.$link['title'].'" rel="nofollow">';
								}
								if ($link && $link['target']) {
									$href = '<a href="'.$link['url'].'" title="'.$link['title'].' - '.esc_attr__('Open in a new tab', 'adblocks').'" target="'.$link['target'].'" rel="nofollow">';
								}
								
								echo $href;
							} ?>
							
							<?php if ( $round ) { ?>
							
							<img class="is-round" src="<?php echo $img['sizes']['adblocks-thumbnail-hd']; ?>" alt="<?php echo $img['alt']; ?>">
							<?php } else { ?>
							
							<?php if ($size && ! $has_custom) { ?> 
							<img src="<?php echo $img['sizes']['adblocks-'.$size.'-hd']; ?>" alt="<?php echo $img['alt']; ?>">
							<?php } else if ($customsize && $has_custom) { ?> 
							<img src="<?php echo $img['sizes'][$customsize]; ?>" alt="<?php echo $img['alt']; ?>">
							<?php } else { ?> 
							<img src="<?php echo $img['sizes']['adblocks-medium-hd']; ?>" alt="<?php echo $img['alt']; ?>">
							<?php } ?>
							
							<?php } ?>

							<?php if ( $zoom || $link ) { ?>
							</a>
							<?php } ?>
							
							<?php if ( $caption && $img['caption'] ) { ?>
							<figcaption>
								<?php echo $img['caption']; ?>
							</figcaption>
							<?php } ?>
						</figure>
						<?php } ?>
						
					<?php } ?>
					

					</div>

					<div class="acf-block-textimg-text">
						<?php 
							if ( $text ) { echo $text; }
							if ( $link ) {
						?>
						<a href="<?php echo esc_attr($link['url']); ?>"<?php if($link['target']) { echo ' target="'.esc_attr($link['target']).'" title="'.esc_attr__('Open in a new tab', 'adblocks').'"'; }?> class="action-btn">
							<?php echo esc_html($link['title']); ?>
						</a>
						<?php } ?>
					</div>
										
				</div>
			</section>
			
			<?php } ?>