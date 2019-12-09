<?php if ( !defined('ABSPATH') ) die();
/**
 * @package WordPress
 * @subpackage From_Scratch
 * @since 1.0
 * @version 1.0
 */
?>
					<?php 
						$cols = get_field('layout');
						$content = get_field('gallery');
						$title = get_field('legend');

						if( !empty($block['align']) ) {
						    $align = ' align' . $block['align'];
						} else {
							$align = null;
						}						
					?>

					<section class="acf-block--content<?php echo esc_attr($align); echo esc_attr(' '.$title); ?>">
						<div class="acf-block-container">
					
							<?php if( $content ): ?>
							<div class="acf-block-gallery-pictures">
								
						        <?php foreach( $content as $c ): ?>
						        <div class="acf-block-gallery-item-<?php echo $cols; ?>">
							        
							        <div class="acf-block-gallery-figure" role="group">
							            <a href="<?php echo get_permalink( $c->ID ); ?>" title="<?php _e('Read ', 'from-scratch'); echo get_the_title( $c->ID ); ?>">
								            <?php 
									            if ( has_post_thumbnail( $c->ID ) ) { 
								            		echo get_the_post_thumbnail( $c->ID, 'thumbnail-hd'); 
												} else {
													echo '<img src="' . FS_THEME_URL .'/img/fallback.png" alt="">'; 
									        } ?>
									        
											<div class="acf-block-gallery-caption">
												<span class="acf-block-gallery-caption-title"><?php echo get_the_title( $c->ID ); ?></span>
											</div>
								        </a>
								    </div>
								    
						        </div>
						        <?php endforeach; ?>
						        
							</div>
							<?php endif; ?>	
						
						</div>
					</section>