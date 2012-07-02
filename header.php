<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>><head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php wp_title('&laquo;', true, 'right'); ?> <?php bloginfo('name'); ?></title>
<?php $options = get_option( 'theme_settings' );  ?>



<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_directory'); ?>/style.css" />



<link rel="shortcut icon" href="<?php bloginfo('stylesheet_directory'); ?>/img/favicon.png" /> 
<meta name="description" content=" <?php  echo $options['seo_aciklama'];  ?> " /> 
<meta name="keywords" content="<?php echo $options['seo_kelimeler'];  ?>" />
 
<link rel="canonical" href="<?php bloginfo('home'); ?>" /> 

<?php  wp_head();  ?>
<script type='text/javascript' src='<?php bloginfo('stylesheet_directory'); ?>/sinan.js'></script> 
<?php if($options['tracking']) {   echo $options['tracking'];   }  ?>
</head><body>
<div id="hepsi">
	<div id="header">
		<div id="header-ust">
			<div id="header-ust-menu">
				<a href="<?php bloginfo('home'); ?>" title="Anasayfa">Anasayfa</a>  - 
				<a href="<?php if($options['hakkimizda']) {   echo $options['hakkimizda'];   }  ?>" title="Hakkımızda">Hakkımızda</a>  -  
				<a href="<?php if($options['yardim']) {   echo $options['yardim'];   }  ?>" title="Yardım">Yardım</a> -
				<a href="<?php if($options['iletisim']) {   echo $options['iletisim'];   }  ?>" title="İletişim">İletişim</a>
			</div>
			<div id="header-ust-giris">
				<?php if (get_option('login_form') == "yes" || get_option('login_form') == "") { ?>	
				<?php global $user_ID; if ( $user_ID ) :   global $current_user; get_currentuserinfo(); ?>
				 
					<?php _e('Hoşgeldin,','cp'); ?> <strong><?php echo $current_user->user_login; ?></strong>
					[ <a href="<?php echo get_option('home')?>/wp-admin/profile.php" title="Porfilinizi Düzenleyin"><?php _e('Profil','cp'); ?></a> | 
					<a href="<?php echo wp_logout_url( home_url() ); ?>" title="Dur çıkma ya :("><?php _e('Çıkış','cp'); ?></a> ]
				<?php else : ?> 
				<div class="giris-oncesi-gir">
				<form name="loginform" id="loginform" action="<?php bloginfo('home'); ?>/wp-login.php" method="post"> 
						<input type="text" name="log" class="i1" value="Kullanıcı Adı" 
						onfocus="if (this.value == 'Kullanıcı Adı') {this.value = '';}" 
						onblur="if (this.value == '') {this.value = 'Kullanıcı Adı';}"/>
						
						<input type="password" name="pwd" class="i1" value="*******"
						onfocus="if (this.value == '*******') {this.value = '';}" 
						onblur="if (this.value == '') {this.value = '*******';}" />
						
						<input name="c" type="image" src="<?php bloginfo('stylesheet_directory'); ?>/img/giris.png" id="giris" class="sola" /> 
						<input type="hidden" name="redirect_to" value="<?php bloginfo('home'); ?>/" /> 
						<input type="hidden" name="testcookie" value="1" /> 
				</form> 
				</div>
				
						<span class="giris-oncesi">
						<a href="<?php bloginfo('home'); ?>/wp-login.php?action=register" title="Kayıt OL">
							<img src="<?php bloginfo('stylesheet_directory'); ?>/img/kayitol.png" width="55" height="19" alt="" />
						</a>
						<a href="<?php bloginfo('home'); ?>/wp-login.php?action=lostpassword" title="Şifremi Unuttum ?!">
							<img src="<?php bloginfo('stylesheet_directory'); ?>/img/sifremiunuttum.png" width="15" height="19" alt="" />
						</a>
						</span>
						
				<?php endif; ?>
				<?php } ?>
			</div>
		</div>
		<div id="header-alt">
			<div id="header-logo">
				<?php 


				if($options['custom_logo']) { ?>
					<a href="<?php bloginfo('home'); ?>/">
					<img src="<?php echo $options['custom_logo']; ?>" width="188" height="57" alt="<?php bloginfo('name'); ?>" />
					</a>
				<?php } else { ?>
					<a href="<?php bloginfo('home'); ?>/">
					<img src="<?php bloginfo('stylesheet_directory'); ?>/img/logo.png" width="188" height="57" alt="<?php bloginfo('name'); ?>" />
					</a>
				<?php } ?>
			</div>
			<div id="header-ara">
				<?php if(function_exists('sbc')){ 
					sbc();
				} else { 
					// Your regular form code goes here
				  } ?>
			</div>
		</div>
	</div><!-- header -->