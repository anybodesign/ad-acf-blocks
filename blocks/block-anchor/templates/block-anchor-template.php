<?php if ( !defined('ABSPATH') ) die();

	$html = get_field('html');
	$anchor = get_field('id');
	$offset_val = get_field('offset');
	
	if ($offset_val) {
		$offset = $offset_val;
	} else {
		$offset = 0;
	}

?>
			<<?php echo $html; if (is_admin() ) { echo ' class="acf-block--anchor"'; } ?>  data-offset="<?php echo $offset ;?>" id="<?php echo $anchor ;?>"></<?php echo $html; ?>>