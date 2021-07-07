<?php if ( !defined('ABSPATH') ) die();

	$h = get_field('title_level');
	$size = get_field('icon_size_feature_size');

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
				<img src="<?php echo ADBLOCKS__PLUGIN_URL; ?>assets/previews/advancedlist-preview.png" alt="" class="adblock-preview">
			<?php } else { ?>
						
			<section class="acf-block--advanced-list<?php if($bgimg) { echo ' has-bg-img'; } if($bgcolor) { echo ' has-bg-color'; } if ($white) { echo ' white-text'; } if( $over) { echo ' has-overlay'; } if ($repeat) { echo ' repeat'; } echo esc_attr($align); ?>"<?php if ($bgcolor || $bgimg) { echo ' style="'.$has_bgcolor.' '.$has_bgimg.'"'; } ?>>
				<div class="acf-block-container<?php if ($max) { echo ' center-max'; } ?>">

					<?php if( have_rows('list') ): ?>
					<ul class="acf-block-list-items">
						
				        <?php while( have_rows('list') ): the_row();
							
							$icon = get_sub_field('icon');   
							$infos = get_sub_field('infos');
							$featured = get_sub_field('featured_text');   
							
							$title = $infos['title'];   
							$desc = $infos['desc'];   
							$legend = $infos['legend'];
							$link = $infos['link'];
				        ?>
				        <li class="acf-block-list-item">					        
							<?php if ($link) { ?><a href="<?php echo $link; ?>"><?php } ?>
								
							<?php if ($icon) { ?>
							<div class="list-icon">
								<?php if ($size) { ?> 
								<img src="<?php echo $icon['sizes']['adblocks-'.$size.'-hd']; ?>" alt="<?php echo $icon['alt']; ?>">
								<?php } else { ?> 
								<img src="<?php echo $icon['sizes']['adblocks-thumbnail-hd']; ?>" alt="<?php echo $icon['alt']; ?>">
								<?php } ?>
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

							<?php if ($link) { ?></a><?php } ?>
				        </li>
				        
				        <?php endwhile; ?>
				        
					</ul>
					<?php endif; ?>

				</div>
			</section>
			
			<?php } ?>