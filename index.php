<?php get_header(); ?>
	
	<div id="icerikler">
		<?php get_sidebar(); ?>
		<div id="icerik">
			<?php if (have_posts()) :  while (have_posts()) : the_post(); ?>
				<div class="urun">
					<span class="urun-resimm">
					<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_post_thumbnail( array(162,126) );  ?></a>
					</span>
					
					<h4><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h4>
					<span class="fiyat"> 
						<?php $key="price"; echo get_post_meta($post->ID, $key, true);    echo " ".$options['para_birimi'];      ?>
					</span>
					
				</div>
			<?php endwhile; else : endif;  ?>
			
			<?php if(function_exists('wp_pagenavi')) { wp_pagenavi(); } ?>
		</div>
	</div><!-- icerikler -->
	
<?php get_footer(); ?>