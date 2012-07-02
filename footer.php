<?php $options = get_option( 'theme_settings' );  ?>
	<div id="footer">
		
		<span class="left"><?php bloginfo('name'); ?> © <?php the_date('Y');  ?>
        </span>
		<span class="right"> 
				<a href="<?php if($options['hakkimizda']) {   echo $options['hakkimizda'];   }  ?>" title="Hakkımızda">Hakkımızda</a>  
				<a href="<?php if($options['yardim']) {   echo $options['yardim'];   }  ?>" title="Yardım">Yardım</a> 
				<a href="<?php if($options['iletisim']) {   echo $options['iletisim'];   }  ?>" title="İletişim">İletişim</a>
				<a href="http://www.sinanisler.com/" title="WordPress" target="_blank">WordPress Tema</a> 
		</span>
		
	</div>
	
</div>

<?php wp_footer(); ?>
</body></html>
