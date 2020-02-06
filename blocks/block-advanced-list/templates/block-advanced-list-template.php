<?php if ( !defined('ABSPATH') ) die();

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
						
			<section class="acf-block--advanced-list<?php if ($white) { echo ' white-text'; } if( $over) { echo ' has-overlay'; } if ($repeat) { echo ' repeat'; } echo esc_attr($align); ?>"<?php if ($bgcolor || $bgimg) { echo ' style="'.$has_bgcolor.' '.$has_bgimg.'"'; } ?>>
				<div class="acf-block-container<?php if ($max) { echo ' center-max'; } ?>">

					<?php if( have_rows('list') ): ?>
					<ul class="acf-block-list-items">
						
				        <?php while( have_rows('list') ): the_row();
							
							$icon = get_sub_field('icon');   
							$title = get_sub_field('title');   
							$desc = get_sub_field('desc');   
							$legend = get_sub_field('legend');   
							$featured = get_sub_field('featured_text');   
	
				        ?>
				        <li class="acf-block-list-item">					        
							<?php if ($icon) { ?>
							<div class="list-icon">
								<img src="<?php echo $icon['sizes']['adblocks-thumbnail-hd']; ?>" alt="<?php echo $icon['alt']; ?>">
							</div>
							<?php } ?>
							
							<?php if ($title) { ?>
							<div class="list-content">
								<<?php echo $h; ?> class="list-title"><?php echo $title; ?></<?php echo $h; ?>>
								<?php if ($desc) { ?>
								<span class="list-desc"><?php echo $desc; ?></span>
								<?php } ?>
							</div>
							<?php } ?>

							<?php if ($featured) { ?>
							<span class="list-featured"><?php echo $featured; ?></span>
							<?php } ?>
							
							<?php if ($legend) { ?>
							<small class="list-legend"><?php echo $legend; ?></small>
							<?php } ?>
				        </li>
				        <?php endwhile; ?>
				        
					</ul>
					<?php endif; ?>	

				</div>
			</section>