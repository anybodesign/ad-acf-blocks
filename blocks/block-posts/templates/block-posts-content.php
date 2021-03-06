<?php if ( !defined('ABSPATH') ) die(); ?>

						<div class="acf-block-post-item <?php echo $cpt.'-block'; ?>">
					        
					        <div class="acf-block-post-figure">
						        <a href="<?php echo get_permalink( $c->ID ); ?>" title="<?php _e('Read ', 'adblocks'); echo get_the_title( $c->ID ); ?>" rel="nofollow">
					            <?php 
						            if ( has_post_thumbnail( $c->ID ) && $size && ! $has_custom ) { 
					            		echo get_the_post_thumbnail( $c->ID, 'adblocks-'.$size.'-hd');
									}
									else if ( has_post_thumbnail( $c->ID ) && $customsize && $has_custom ) { 
					            		echo get_the_post_thumbnail( $c->ID, $customsize); 
									} 
									else if ( has_post_thumbnail( $c->ID ) ) {
					            		echo get_the_post_thumbnail( $c->ID, 'adblocks-thumbnail-hd'); 
									} 
									else {
										echo '<img src="' . ADBLOCKS__PLUGIN_URL .'assets/fallback.png" alt="">'; 
						        	} 
						        ?>
						        </a>
						    </div>
						    
				    		<div class="acf-block-post-content">
								
								<header class="acf-block-post-header">
									<<?php echo $h; ?> class="acf-block-post-title">
										<a href="<?php echo get_permalink( $c->ID ); ?>">
										<?php echo get_the_title( $c->ID ); ?>
										</a>
									</<?php echo $h; ?>>
									
									<?php if ( $metas ) { ?>
									<div class="acf-block-post-metas">
										<span class="meta-date">
											<span class="meta-date-text"><?php _e( 'Posted on&nbsp;', 'adblocks' ); ?></span><span class="meta-date-time"><?php echo '<span class="day">'.get_the_time( ('j'), $c->ID ).'</span> '; echo '<span class="month">'.get_the_time( ('F'), $c->ID ).'</span> '; echo '<span class="year">'.get_the_time( ('Y'), $c->ID ).'</span>'; ?></span>
										</span>
										<?php if( $your_metas && in_array('author', $your_metas) ) { ?>
										<span class="meta-author">
											<?php _e( 'by&nbsp;', 'adblocks' ); echo get_the_author(); ?>
										</span>
										<?php } ?>
										<?php if( $your_metas && in_array('cat', $your_metas) && $cpt == 'post' ) { ?>
										<span class="meta-category">
											<?php _e( 'in&nbsp;', 'adblocks' ); echo '<a href="'.esc_url( get_category_link( $cat[0]->term_id) ).'">' . esc_html( $cat[0]->name) . '</a>'; ?>
										</span>
										<?php } ?>
									</div>
									<?php } ?>									
								</header>

								<div class="acf-block-post-excerpt">
									<?php 
										if ($show == 'excerpt') {
											
											$my_excerpt = $c->post_excerpt;
											$manual_excerpt = get_the_excerpt( $c->ID );
											$permalink = get_permalink( $c->ID );
											
											if ( $my_excerpt != '' ) {												
										        echo '<p>'.$manual_excerpt.' <a class="read-more" href="'.$permalink.'" rel="nofollow">'.esc_html__('Read more', 'adblocks').'</a></p>';
										    } else {
												echo adblocks_get_excerpt(125, $c->ID);
											}											
										}
										
										if ($show == 'content' ) {
											echo $c->post_content; 
										}	
									?>
								</div>
									
							</div>
					        
				        </div>