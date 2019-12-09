<?php if ( !defined('ABSPATH') ) die();
/**
 * @package WordPress
 * @subpackage From_Scratch
 * @since 1.0
 * @version 1.0
 */
?>
					<?php 
						$cols = get_field('columns');
						$images = get_field('gallery');
						$legend = get_field('legend');
						
						if( !empty($block['align']) ) {
						    $align = ' align' . $block['align'];
						} else {
							$align = null;
						}						
					?>

					<section class="acf-block--gallery<?php echo esc_attr($align); echo esc_attr(' '.$legend); ?>">
						<div class="acf-block-container">

							<?php if( $images ): ?>
							<div class="acf-block-gallery-pictures">
								
						        <?php foreach( $images as $image ): ?>
						        <div class="acf-block-gallery-item-<?php echo $cols; ?>">
							        
							        <figure class="acf-block-gallery-figure"<?php if ( $image['caption'] ) { echo ' role="group"'; } ?>>
							            <a href="<?php echo $image['url']; ?>" title="<?php _e('Enlarge picture', 'from-scratch'); ?>" data-fancybox="galerie">
								            <img src="<?php echo $image['sizes']['thumbnail-hd']; ?>" alt="<?php echo $image['alt']; ?>">
											<?php if ( $image['caption'] ) { ?>
											<figcaption class="acf-block-gallery-caption">
												<span class="acf-block-gallery-caption-title"><?php echo $image['caption']; ?></span>
											</figcaption>
											<?php } ?>
								        </a>
								    </figure>
								    
						        </div>
						        <?php endforeach; ?>
						        
							</div>
							<?php endif; ?>							
						
						</div>
					</section>