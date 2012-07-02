<div id="sidebar">
			<div class="sepet-kutu">
			<div class="sepet-baslik">Sepet</div>
			<div class="sepet-icerik">
				<ul>
				<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Sepet') ) : ?>
                <?php endif; ?>
				</ul>
			</div>
			</div>
			
			
			
			<div class="sidebar-kutu">
			<div class="sidebar-baslik">Kategoriler</div>
			<div class="sidebar-icerik kategoriler">
				<ul>
				<?php wp_list_categories('title_li='); ?>
				</ul>
			</div>
			</div>
				<?php $options = get_option( 'theme_settings' );  ?>
				<?php $sayi = $options['son_eklenen_urunler']; ?>
				
			<div class="sidebar-kutu">
			<div class="sidebar-baslik">Son Eklenen Ürünler</div>
			<div class="sidebar-icerik indirimli-urun">
				<ul>
				<?php  query_posts('posts_per_page='.$sayi."'"); if (have_posts()) :  while (have_posts()) : the_post(); ?>
					<li>
					
						<div class="urun">
							<span class="urun-resimcik">
							<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_post_thumbnail( array(40,40) ); ?></a>
							</span>
							
							<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a><br />
							<span class="r1"><strong><?php $key="price"; echo get_post_meta($post->ID, $key, true);    echo " ".$options['para_birimi'];      ?></strong></span>
							
						</div>
						
						
						
					</li>
				<?php endwhile; else : endif; wp_reset_query();  ?>
				</ul>
			</div>
			</div>
			
			
			
			
			<div class="sidebar-kutu">
			<div class="sidebar-baslik">E-Posta Abonelik</div>
			<div class="sidebar-icerik eposta">
				<p>Abone olarak yeni ürünlerden ve indirimlerden haberdar olabilirsiniz.</p>
				
				<form action="http://feedburner.google.com/fb/a/mailverify" method="post" target="popupwindow" 
					onsubmit="window.open('http://feedburner.google.com/fb/a/mailverify?uri=<?php  echo $options['feedburner_name']; ?>', 
					'popupwindow', 'scrollbars=yes,width=550,height=520');return true">
					<input type="text"  name="email" value="E-Posta Adresinizi Giriniz..." class="iposta"
					onfocus="if (this.value == 'E-Posta Adresinizi Giriniz...') {this.value = '';}" 
					onblur="if (this.value == '') {this.value = 'E-Posta Adresinizi Giriniz...';}"/>
					<input type="hidden" value="<?php  echo $options['feedburner_name']; ?>" name="uri"/>
					<input type="hidden" name="loc" value="en_US"/>
					<input type="submit" value="Kaydet" class="ikaydet" />
				</form>			
				
			</div>
			</div>
			
			
			
			
			
			
			
			
			
		</div><!-- sidebar -->