<?php if ( !defined('ABSPATH') ) die();
/**
 * @package WordPress
 * @subpackage From_Scratch
 * @since 1.0
 * @version 1.0
 */
?>
					<?php 
						$text = get_field('text') ?: __('Enter text here...', 'from-scratch');
						$link = get_field('link');
						
						$style = get_field('style');
						
						$color = $style['white_text'];
						$bgimg = $style['bg_image'];
						$bgcolor = $style['bg_color'];
						$over = $style['overlay'];
						
						if ($bgcolor) {
							$has_bgcolor = ' style="background-color: '.$bgcolor.'"';
						} else {
							$has_bgcolor = null;
						} 
						if ($bgimg) {
							$has_bgimg = ' style="background-image: url('.$bgimg['url'].')"';
						} else {
							$has_bgimg = null;
						} 

						if( !empty($block['align']) ) {
						    $align = ' align' . $block['align'];
						} else {
							$align = null;
						}						
					?>

					<section class="acf-block--cta<?php if($color) { echo ' white-text'; } if( $over) { echo ' cta-overlay'; } echo esc_attr($align); ?>"<?php echo $has_bgcolor; echo $has_bgimg; ?>>
						<div class="acf-block-container">
						
							<?php if( $text ) { ?>
							<div class="acf-block-cta-text">
								<?php echo $text; ?>
							</div>
							<?php } ?>
						
							<?php if( $link ) : ?>
							<div class="acf-block-cta-btn">
								<a href="<?php echo $link['url']; ?>" class="action-btn"<?php if($link['target']) { echo ' target="'.$link['target'].'"'; } ?>>
									<?php echo $link['title']; ?>
								</a>
							</div>
							<?php endif; ?>

						</div>
					</section>