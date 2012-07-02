<?php get_header(); ?>
	
	<div id="icerikler">
		<?php get_sidebar(); ?>
		<div id="icerik">
					<?php if (have_posts()) :  while (have_posts()) : the_post(); ?>
					<div class="icerik-baslik">
						<h1><?php the_title(); ?></h1>
						<span class="icerik-kategori"><?php $category = get_the_category(); echo $category[0]->cat_name ;?></span>
					</div>
					
					<div class="resim-fiyat">
						<div class="icerik-resim"><?php the_post_thumbnail( array(462,315), array('class' => 'ress1') ); ?></div>
						<div class="icerik-fiyat-sag">
							<div class="icerik-fiyat">
								Fiyatı &nbsp;&nbsp;&nbsp;&nbsp; : &nbsp;&nbsp;&nbsp;&nbsp;
								<span class="r1">
									<strong>	
										<?php $key="price"; echo get_post_meta($post->ID, $key, true);    echo " ".$options['para_birimi'];      ?>
									</strong>
								</span>
							</div>
							
							<div class="icerik-baslik">
								Ürünün Özellikleri
							</div>
							
							<div class="icerik-ozellikler">
								<ul>
									<?php
									$terms = get_the_terms($post->ID, 'urunozellikler');
									if($terms){
										foreach($terms as $d){
											echo "<li>".$d->name."</li>"; 
										} 
									}
									?> 
								</ul>
							</div>
							
							
							
							
							<?php  echo (do_shortcode('[dpsc_display_product]')); ?> 
						</div>
					</div>
					<?php endwhile; else : endif;  ?>
						
					
					
					<span class="tablar">
						<span class="tablar-menu">
							<span class="a-aciklama" onclick="aciklamaGoster()">Ürün Açıklaması</span>
							<span class="a-video"    onclick="videoGoster()">	 Video Tanıtım</span>
							<span class="a-yorum"    onclick="yorumGoster()">	 Yorumlar</span>
						</span>
						<span class="tablar-ic urunAciklama">
							<?php  if (have_posts()) :  while (have_posts()) : the_post(); ?>
								
								<?php the_content(); ?>
								 
							<?php endwhile; else : endif; ?>
						</span>
						<span class="tablar-ic urunVideo">
							<?php  if (have_posts()) :  while (have_posts()) : the_post(); ?>
								 
								 <?php $key="videotanitim"; echo get_post_meta($post->ID, $key, true); ?>
								 
							<?php endwhile; else : endif; ?>
						</span>
						<span class="tablar-ic urunYorum">
							<?php  if (have_posts()) :  while (have_posts()) : the_post(); ?>
								 
 								<?php comments_template(); ?>
 								
							<?php endwhile; else : endif; ?>
						</span>
						<span class="tablar-alt"></span>
					</span><!-- tablar bitti -->
			
			
			
		</div>
	</div><!-- icerikler -->
	
<?php get_footer(); ?>