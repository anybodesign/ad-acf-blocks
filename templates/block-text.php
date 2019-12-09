<?php if ( !defined('ABSPATH') ) die();
/**
 * @package WordPress
 * @subpackage From_Scratch
 * @since 1.0
 * @version 1.0
 */
?>
					<?php 
						//$id = $block['id'];

						$layout = get_field('layout') ?: '1col';
						$center = get_field('center');
						
						$text1 = get_field('text_1') ?: __('Enter text here...', 'from-scratch');
						$text2 = get_field('text_2') ?: __('Enter text here...', 'from-scratch');
						$text3 = get_field('text_3') ?: __('Enter text here...', 'from-scratch');
					?>
						
					<section class="acf-block--text">
						<div class="acf-block-container">

							<div class="acf-block-text--<?php echo $layout; ?><?php if ($center) { echo ' centered'; } ?>">
							<?php if ( $layout == '1col' ) { ?>
					        	
					        	<div class="acf-block-text-column">
						        	<?php echo $text1;?>
					        	</div>
					        	
							<?php } elseif ( $layout == '2col' || $layout == '2-1col' || $layout == '1-2col' ) { ?>
					      
					        	<div class="acf-block-text-column">
						        	<?php echo $text1;?>
					        	</div>
					        	<div class="acf-block-text-column">
						        	<?php echo $text2;?>
					        	</div>
					
							<?php } elseif ( $layout == '3col' ) { ?>
							
								<div class="acf-block-text-column">
						        	<?php echo $text1;?>
					        	</div>
					        	<div class="acf-block-text-column">
						        	<?php echo $text2;?>
					        	</div>
					        	<div class="acf-block-text-column">
						        	<?php echo $text3;?>
					        	</div>
					        	
							<?php } ?>
							</div>
						
						</div>
					</section>