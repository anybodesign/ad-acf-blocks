<?php if ( !defined('ABSPATH') ) die();

	$right = get_field('right');
	$center = get_field('center');
	$zoom = get_field('zoom');
	$img = get_field('picture');
	$text = get_field('text');

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
						
			<section class="acf-block--textimg<?php if($white) { echo ' white-text'; } if( $over) { echo ' has-overlay'; } if ($repeat) { echo ' repeat'; } echo esc_attr($align); ?>"<?php if ($bgcolor || $bgimg) { echo ' style="'.$has_bgcolor.' '.$has_bgimg.'"'; } ?>>
				<div class="acf-block-container<?php if ($right) { echo ' right'; } ?><?php if ($center) { echo ' centered'; } if ($max) { echo ' center-max'; } ?>">
					
				<?php if ( $img ) { ?>
					<div class="acf-block-textimg-picture">
						<figure<?php if ( $img['caption'] ) { echo ' role="group"'; } ?>>
							<?php if ( $zoom ) { ?>
							<a href="<?php echo $img['url']; ?>" title="<?php _e('Enlarge picture', 'adblocks'); ?>" data-fancybox>
							<?php } ?>
							<img src="<?php echo $img['url']; ?>" alt="<?php echo $img['alt']; ?>">
							<?php if ( $zoom ) { ?>
							</a>
							<?php } ?>
							
							<?php if ( $img['caption'] ) { ?>
							<figcaption>
								<?php echo $img['caption']; ?>
							</figcaption>
							<?php } ?>
						</figure>
					</div>
				<?php } ?>

				<?php if ( $text ) { ?>
					<div class="acf-block-textimg-text">
						<?php echo $text; ?>
					</div>
				<?php } ?>
										
				</div>
			</section>