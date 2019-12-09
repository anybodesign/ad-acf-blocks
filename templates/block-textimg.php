<?php if ( !defined('ABSPATH') ) die();
/**
 * @package WordPress
 * @subpackage From_Scratch
 * @since 1.0
 * @version 1.0
 */
?>
					<?php 
						$right = get_field('right');
						$center = get_field('center');
						$zoom = get_field('zoom');
						$img = get_field('picture');
						$text = get_field('text');

						if( !empty($block['align']) ) {
						    $align = ' align' . $block['align'];
						} else {
							$align = null;
						}						
					?>
						
					<section class="acf-block--textimg<?php echo esc_attr($align); ?>">
						<div class="acf-block-container<?php if ($right) { echo ' right'; } ?><?php if ($center) { echo ' centered'; } ?>">
							
						<?php if ( $img ) { ?>
							<div class="acf-block-textimg-picture">
								<figure>
									<?php if ( $zoom ) { ?>
									<a href="<?php echo $img['url']; ?>" title="<?php _e('Enlarge picture', 'from-scratch'); ?>" data-fancybox>
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