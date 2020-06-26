<?php if ( !defined('ABSPATH') ) die();

	$html = get_field('html');
	$anchor = get_field('id');
	$offset_val = get_field('offset');
	$speed = get_field('speed');
	
	if ($offset_val) {
		$offset = $offset_val;
	} else {
		$offset = 0;
	}

?>

			<?php // Block preview
				if( !empty( $block['data']['__is_preview'] ) ) { ?>
			    <div>
				    <a href="#" class="action-btn" style="font-size: 1.6rem;">Scroll to the anchor</a>
			    </div>
			    <br>
			    	<div class="acf-block--anchor" style="padding: 3rem;"></div>

			<?php } else { ?>			
			
			<<?php echo $html; if (is_admin() ) { echo ' class="acf-block--anchor"'; } ?>  data-offset="<?php echo $offset ;?>" data-speed="<?php if ($speed) { echo $speed; } else { echo '1000'; } ?>" id="<?php echo $anchor ;?>"></<?php echo $html; ?>>
			
			<?php } ?>