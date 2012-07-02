<?php get_header(); ?>
	
	<div id="icerikler">
		<?php get_sidebar(); ?>
		<div id="icerik">
			<?php if (have_posts()) :  while (have_posts()) : the_post(); ?>
					<span class="icerik-baslik">
						<h1><?php the_title(); ?></h1>
						<span class="icerik-kategori"><?php $category = get_the_category(); echo $category[0]->cat_name ;?></span>
					</span>
					
					<span class="icerik-page">
						<?php the_content(); ?>
					</span>
					
				
			<?php endwhile; else : endif;  ?>
			
			
			
		</div>
	</div><!-- icerikler -->
	
<?php get_footer(); ?>