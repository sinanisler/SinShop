<?php 

register_sidebars(1, array('name'=>'Sepet'));


function new_excerpt_length($length) {
	return 17;
} add_filter('excerpt_length', 'new_excerpt_length');
function new_excerpt_more($more) {
	return '[..]';
} add_filter('excerpt_more', 'new_excerpt_more');

add_theme_support( 'post-thumbnails');






 



add_action( 'init', 'create_my_taxonomies', 0 );
function create_my_taxonomies() {
	register_taxonomy( 'urunozellikler', 'post', array( 'hierarchical' => false, 'label' => 'Ürün Özellikleri', 'query_var' => true, 'rewrite' => true ) );

}


add_action( 'admin_bar_menu', 'add_menu_admin_bar' ,  70);




function add_menu_admin_bar() {
    global $wp_admin_bar;
 
    if ( !is_super_admin() || !is_admin_bar_showing() )
        return;
 
    $wp_admin_bar->add_menu( array( 'id' => 'theme_options', 'title' =>__( 'Sin Mağaza Tema Ayarları', 'sin-magaza' ), 'href' => admin_url('admin.php')."?page=settings" ) );
}
add_action( 'admin_bar_menu', 'add_menu_admin_bar' ,  70);


 


// ######################       TEMA AYARLARI      ###################### 


//get theme options
$options = get_option( 'theme_settings' );


//register settings
function theme_settings_init(){
    register_setting( 'theme_settings', 'theme_settings' );
}

//add settings page to menu
function add_settings_page() {
add_menu_page( __( 'Sin Mağaza Tema Ayarları' ), __( 'Sin Mağaza Tema Ayarları' ), 'manage_options', 'settings', 'theme_settings_page');
}

//add actions
add_action( 'admin_init', 'theme_settings_init' );
add_action( 'admin_menu', 'add_settings_page' );

//define your variables
$color_scheme = array('default','blue','green',);

//start settings page
function theme_settings_page() {

if ( ! isset( $_REQUEST['updated'] ) )
$_REQUEST['updated'] = false;

//get variables outside scope
global $color_scheme;
?>

<div>

<div id="icon-options-general"></div>
<h2><?php _e( 'Sin Mağaza Tema Ayarları' ) //your admin panel title ?></h2>



<form method="post" action="options.php">

  <p>
  <?php settings_fields( 'theme_settings' ); ?>
  <?php $options = get_option( 'theme_settings' ); ?>
    
    
  <style>
table tr, table td, table th{
text-align:left;
font-weight:normal;
	
}
.satir_renkli{
	background: #f0f0f0;
	padding:3px;
	text-align:left;
}
.satir_renkli td , .satir_renkli th {
 	padding:3px;
}

.paragraf p{
	margin-bottom:2px;
	margin-top:2px;
	line-height:18px;
	color:#999999;
}
	
	
#icon-options-general{
	height: 34px;
	width: 36px;
	float: left;
	background: transparent url(./images/icons32.png?ver=20100531) no-repeat -432px -5px;
	position:relative;
	top:-10px;
	margin-right:5px;
}
	
table textarea{
	height:70px;
}


</style>
</p>
  <p><iframe width="800" height="auto" src="http://sinanisler.com/demo/sinshop.php" style="border:solid 1px #CCCCCC;"></iframe></p>
  <table>


<tr valign="top" class="satir_renkli" >
	<th scope="row" ><strong>Özel Logo</strong> <br />(Resim  Adres)</th>
	<td><input id="theme_settings[custom_logo]" type="text" size="36" name="theme_settings[custom_logo]" value="<?php esc_attr_e( $options['custom_logo'] ); ?>" />	</td>
</tr>

<tr valign="top" class="satir_renkli" >
	<th scope="row" style="text-align:left;"><strong>Para Birimi Kodu</strong></th>
	<td><input id="theme_settings[para_birimi]" type="text" size="36" name="theme_settings[para_birimi]" value="<?php esc_attr_e( $options['para_birimi'] ); ?>" />	</td>
</tr>

<tr valign="top" class="satir_renkli" >
	<th scope="row" style="text-align:left;"><strong>Son Eklenen Ürünler Sayısı</strong> <br />(Sayı Giriniz)</th>
	<td><input id="theme_settings[son_eklenen_urunler]" type="text" size="36" name="theme_settings[son_eklenen_urunler]" value="<?php esc_attr_e( $options['son_eklenen_urunler'] ); ?>" />	</td>
</tr>


<tr valign="top" class="satir_renkli" >
	<th scope="row" style="text-align:left;"><strong>E-Posta Abonelik </strong> <br />(Feedburner İsim)
		<a href="http://feedburner.google.com/" target="_blank">Yoksa Üye OL</a>	</th>
	<td><input id="theme_settings[feedburner_name]" type="text" size="36" name="theme_settings[feedburner_name]" value="<?php esc_attr_e( $options['feedburner_name'] ); ?>" />	</td>
</tr>


<tr valign="top"  class="satir_renkli"  >
	<th scope="row" ><strong>Analytics yada Takip Kodu</strong></th>
	<td>
	<textarea id="theme_settings[tracking]" name="theme_settings[tracking]" rows="5" cols="36"><?php esc_attr_e( $options['tracking'] ); ?></textarea></td>
</tr>

<tr valign="top" >
	<td ><br /></td>
</tr>

<tr valign="top" >
	<th scope="row"  > </th>
	<td><strong>MENÜ LİNKLER</strong></td>
</tr>


<tr valign="top"  class="satir_renkli"  >
	<th scope="row" ><strong>Hakkımızda Sayfası</strong></th>
	<td>
	<input id="theme_settings[hakkimizda]" type="text" size="36" name="theme_settings[hakkimizda]" value="<?php esc_attr_e( $options['hakkimizda'] ); ?>" /></td>
</tr>
<tr valign="top"  class="satir_renkli"  >
	<th scope="row" ><strong>Yardım Sayfası</strong></th>
	<td>
	<input id="theme_settings[yardim]" type="text" size="36" name="theme_settings[yardim]" value="<?php esc_attr_e( $options['yardim'] ); ?>" /></td>
</tr>
<tr valign="top"  class="satir_renkli"  >
	<th scope="row" ><strong>İletişim Sayfası</strong></th>
	<td>
	<input id="theme_settings[iletisim]" type="text" size="36" name="theme_settings[iletisim]" value="<?php esc_attr_e( $options['iletisim'] ); ?>" /></td>
</tr>



<tr valign="top" height="30" >
	<th scope="row"  > </th>
	<td> </td>
</tr>



<tr valign="top" >
	<th scope="row"  > </th>
	<td><strong>TEMEL SEO AYARLARI</strong></td>
</tr>
<tr valign="top" >
	<th colspan="2" scope="row"  > Bir eklenti kullanıyorsanız bu alanları boş bırakınız. </th>
	</tr>




<tr valign="top"  class="satir_renkli" >
	<th scope="row"  ><strong>Head Meta Desription</strong></br> (SEO Açıklama) </br> Not: En fazla 150 karakter giriniz</th>
	<td>
	<textarea id="theme_settings[seo_aciklama]" name="theme_settings[seo_aciklama]" rows="5" cols="36"><?php esc_attr_e( $options['seo_aciklama'] ); ?></textarea></td>
</tr>



<tr valign="top"   class="satir_renkli" >
	<th scope="row"  ><strong>Head Meta Keywords</strong> </br> (SEO Anahtar Kelimeler)</th>
	<td>
	<textarea id="theme_settings[seo_kelimeler]" name="theme_settings[seo_kelimeler]" rows="5" cols="36"><?php esc_attr_e( $options['seo_kelimeler'] ); ?></textarea></td>
</tr>
</table>

<p><input name="submit" id="submit" value="Ayarları Kaydet" type="submit"></p>
</form>

</div><!-- END wrap -->

<?php
}
//sanitize and validate
function options_validate( $input ) {
    global $select_options, $radio_options;
    if ( ! isset( $input['option1'] ) )
        $input['option1'] = null;
    $input['option1'] = ( $input['option1'] == 1 ? 1 : 0 );
    $input['sometext'] = wp_filter_nohtml_kses( $input['sometext'] );
    if ( ! isset( $input['radioinput'] ) )
        $input['radioinput'] = null;
    if ( ! array_key_exists( $input['radioinput'], $radio_options ) )
        $input['radioinput'] = null;
    $input['sometextarea'] = wp_filter_post_kses( $input['sometextarea'] );
    return $input;
}





 

 
function twentyten_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case '' :
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
 		<div class="comment-author vcard">
			
			<?php printf( __( '%s ', 'twentyten' ), sprintf( '<cite class="fn">%s</cite>', get_comment_author_link() ) ); ?>
		</div><!-- .comment-author .vcard -->
		<?php if ( $comment->comment_approved == '0' ) : ?>
			<em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'twentyten' ); ?></em>
			<br />
		<?php endif; ?>

		<div class="comment-meta commentmetadata"><a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>">
			<?php
				/* translators: 1: date, 2: time */
				printf( __( '%1$s at %2$s', 'twentyten' ), get_comment_date(),  get_comment_time() ); ?></a> 
		</div><!-- .comment-meta .commentmetadata -->

		<div class="comment-body"><?php comment_text(); ?></div>

		 
 
	<?php
			break;
		case 'pingback'  :
		case 'trackback' :
	?>
	 
		<p>   <?php comment_author_link(); ?> </p>
	<?php
			break;
	endswitch;
}

 


$sp_boxes = array (
    'Video Tanıtım' => array (
        
        array( 'videotanitim', 'Video tanıtım için video embed kodunu buraya yapıştırınız. (Video Genişliği  720 px önerilir)', 'textarea' ),


    ),
	
);


// Do not edit past this point.

// Use the admin_menu action to define the custom boxes
add_action( 'admin_menu', 'sp_add_custom_box' );

// Use the save_post action to do something with the data entered
// Save the custom fields
add_action( 'save_post', 'sp_save_postdata', 1, 2 );

// Adds a custom section to the "advanced" Post and Page edit screens
function sp_add_custom_box() {
    global $sp_boxes;

    if ( function_exists( 'add_meta_box' ) ) {

        foreach ( array_keys( $sp_boxes ) as $box_name ) {
            add_meta_box( $box_name, __( $box_name, 'sp' ), 'sp_post_custom_box', 'post', 'normal', 'high' );
        }
    }
}

function sp_post_custom_box ( $obj, $box ) {
    global $sp_boxes;
    static $sp_nonce_flag = false;

    // Run once
    if ( ! $sp_nonce_flag ) {
        echo_sp_nonce();
        $sp_nonce_flag = true;
    }

    // Genrate box contents
    foreach ( $sp_boxes[$box['id']] as $sp_box ) {
        echo field_html( $sp_box );
    }
}

function field_html ( $args ) {

    switch ( $args[2] ) {

        case 'textarea':
            return text_area( $args );

        case 'checkbox':
            // To Do

        case 'radio':
            // To Do

        case 'text':
        default:
            return text_field( $args );
    }
}

function text_field ( $args ) {
    global $post;

    // adjust data
    $args[2] = get_post_meta($post->ID, $args[0], true);
    $args[1] = __($args[1], 'sp' );

    $label_format =
          '<label for="%1$s">%2$s</label><br />'
        . '<input style="width: 95%%;" type="text" name="%1$s" value="%3$s" /><br /><br />';

    return vsprintf( $label_format, $args );
}

function text_area ( $args ) {
    global $post;

    // adjust data
    $args[2] = get_post_meta($post->ID, $args[0], true);
    $args[1] = __($args[1], 'sp' );

    $label_format =
          '<label for="%1$s">%2$s</label><br />'
        . '<textarea style="width: 95%%;" name="%1$s">%3$s</textarea><br /><br />';

    return vsprintf( $label_format, $args );
}

/* When the post is saved, saves our custom data */
function sp_save_postdata($post_id, $post) {
    global $sp_boxes;

    // verify this came from the our screen and with proper authorization,
    // because save_post can be triggered at other times
    if ( ! wp_verify_nonce( $_POST['sp_nonce_name'], plugin_basename(__FILE__) ) ) {
        return $post->ID;
    }

    // Is the user allowed to edit the post or page?
    if ( 'page' == $_POST['post_type'] ) {
        if ( ! current_user_can( 'edit_page', $post->ID ))
            return $post->ID;

    } else {
        if ( ! current_user_can( 'edit_post', $post->ID ))
            return $post->ID;
    }

    // OK, we're authenticated: we need to find and save the data
    // We'll put it into an array to make it easier to loop though.

    // The data is already in $sp_boxes, but we need to flatten it out.
    foreach ( $sp_boxes as $sp_box ) {
        foreach ( $sp_box as $sp_fields ) {
            $my_data[$sp_fields[0]] =  $_POST[$sp_fields[0]];
        }
    }

    // Add values of $my_data as custom fields
    // Let's cycle through the $my_data array!
    foreach ($my_data as $key => $value) {
        if ( 'revision' == $post->post_type  ) {
            // don't store custom data twice
            return;
        }

        // if $value is an array, make it a CSV (unlikely)
        $value = implode(',', (array)$value);

        if ( get_post_meta($post->ID, $key, FALSE) ) {

            // Custom field has a value.
            update_post_meta($post->ID, $key, $value);


        } else {

            // Custom field does not have a value.
            add_post_meta($post->ID, $key, $value);
        }

        if (!$value) {

            // delete blanks
            delete_post_meta($post->ID, $key);
        }
    }
}

function echo_sp_nonce () {

    // Use nonce for verification ... ONLY USE ONCE!
    echo sprintf(
        '<input type="hidden" name="%1$s" id="%1$s" value="%2$s" />',
        'sp_nonce_name',
        wp_create_nonce( plugin_basename(__FILE__) )
    );
}

// A simple function to get data stored in a custom field
if ( !function_exists('get_custom_field') ) {
    function get_custom_field($field) {
       global $post;
       $custom_field = get_post_meta($post->ID, $field, true);
       echo $custom_field;
    }
}

 

  

// Some Defaults
global $SBC_settings;
$SBC_settings                           = array();
$SBC_settings['focus']					= 'In All Categories';
$SBC_settings['hide_empty']				= '1'; // 1 means true
$SBC_settings['excluded_cats']			= array();
$SBC_settings['search_text']			= 'Search For...';
$SBC_settings['exclude_child']			= '0'; // 0 means false
$SBC_settings['raw_excluded_cats']		= array();
$SBC_settings['sbc_style']				= '1';
$SBC_settings['inall_exclude']          = array();

function sbc_activate(){
    global $SBC_settings;
    
    if(!get_option('sbc-focus')) {
        update_option("sbc-settings", $SBC_settings);
    }
    else {
        // Upgrade from 1.x to 1.5
        $SBC_settings['focus']					= get_option('sbc-focus');
        $SBC_settings['hide_empty']				= get_option('sbc-hide-empty');
        $SBC_settings['excluded_cats']			= get_option('sbc-excluded-cats');
        $SBC_settings['search_text']			= get_option('sbc-search-text');
        $SBC_settings['exclude_child']			= get_option('sbc-exclude-child');
        $SBC_settings['raw_excluded_cats']		= get_option('sbc-selected-excluded');
        $SBC_settings['sbc_style']				= get_option('sbc-style');
        
        add_option("sbc-settings", $SBC_settings);
        
        delete_option("sbc-focus");
        delete_option("sbc-hide-empty");
        delete_option("sbc-excluded-cats");
        delete_option("sbc-search-text");
        delete_option("sbc-selected-excluded");
        delete_option("sbc-exclude-child");
        delete_option("sbc-style");
    }
}
register_activation_hook( __FILE__ , 'sbc_activate' );

// Start the plugin
if ( ! class_exists( 'SBC_Admin' ) ) {

	class SBC_Admin {

		// prep options page insertion
		function add_config_page() {
			if ( function_exists('add_submenu_page') ) {
				add_options_page('Kategoriye Göre Arama Ayarları', 'Kategoriye Göre Arama', 10, basename(__FILE__), array('SBC_Admin','config_page'));
				
				
			}
		}

		// Options/Settings page in WP-Admin
		function config_page() {
			if ( isset($_POST['submit']) ) {
				$nonce = $_REQUEST['_wpnonce'];
				if (! wp_verify_nonce($nonce, 'sbc-updatesettings') ) die('Security check failed'); 
				if (!current_user_can('manage_options')) die(__('You cannot edit the search-by-category options.'));
				check_admin_referer('sbc-updatesettings');
				
				// Get our new option values
                $SBC_settings                           = get_option('sbc-settings');
				$SBC_settings['focus']					= mysql_real_escape_string($_POST['focus']);
				$SBC_settings['hide_empty']				= $_POST['hide-empty'];
				$SBC_settings['search_text']			= mysql_real_escape_string($_POST['search-text']);
				$SBC_settings['exclude_child']			= $_POST['exclude-child'];
				$SBC_settings['sbc_style']				= $_POST['sbc-style'];
                $SBC_settings['inall_exclude']          = $_POST['inall_exclude'];
                
				if(isset($_POST['post_category'])){
					$SBC_settings['raw_excluded_cats']      = $_POST['post_category'];
					
					// Fix our excluded category return values
					$fix = $SBC_settings['raw_excluded_cats'];
					array_unshift($fix, "1");
					$SBC_settings['excluded_cats']			= implode(',',$fix);
				}
				
				// Make sure checkboxes are set right
				if (empty($SBC_settings['hide_empty'])) $SBC_settings['hide_empty'] = '0'; // 0 means false
				if (empty($SBC_settings['exclude_child'])) $SBC_settings['exclude_child'] = '0'; // 0 means false
				if (empty($SBC_settings['sbc_style'])) $SBC_settings['sbc_style'] = '0'; // 0 means false 
				
				// Update the DB with the new option values
				update_option("sbc-settings", $SBC_settings);
			}
            
            $SBC_settings           = get_option("sbc-settings");
			$focus					= $SBC_settings['focus'];
			$hide_empty				= $SBC_settings['hide_empty'];
			$search_text			= $SBC_settings['search_text'];
			$excluded_cats			= $SBC_settings['excluded_cats'];
			$exclude_child			= $SBC_settings['exclude_child'];
			$raw_excluded_cats 		= $SBC_settings['raw_excluded_cats'];
			$sbc_style				= $SBC_settings['sbc_style'];
            $inall_exclude          = $SBC_settings['inall_exclude'];
			
			?>
			<div class="wrap">
                <div id="icon-options-general" class="icon32"><br /></div>
				<h2>Kategoriye Göre Arama Ayarları</h2>
                
				<form action="" method="post" id="sbc-config">
                <?php if (function_exists('wp_nonce_field')) { wp_nonce_field('sbc-updatesettings'); } ?>
					<table class="form-table">
						<tr>
							<th scope="row" valign="top"><label for="search-text">Arama kutusunda yazacak yazı:</label></th>
							<td><input type="text" name="search-text" id="search-text" class="regular-text" value="<?php echo $search_text; ?>"/></td>
						</tr>
						<tr>
							<th scope="row" valign="top"><label for="focus">Drop-down menünün başında görünen yazı:</label></th>
							<td><input type="text" name="focus" id="focus" class="regular-text" value="Kategori Seçiniz"/></td>
						</tr>
						<tr>
							<th scope="row" valign="top"><label for="hide-empty">Yazı olmayan kategorileri gizle?</label></th>
							<td><input type="checkbox" name="hide-empty" id="hide-empty" value="1" <?php if ($hide_empty === '1') echo 'checked="checked"'; ?> /></td>
						</tr>
						<tr>
							<th scope="row" valign="top"><label for="exclude-child">Alt kategorileri gösterme?</label></th>
							<td><input type="checkbox" name="exclude-child" id="exclude-child" value="1" <?php if ($exclude_child === '1') echo 'checked="checked"'; ?> /></td>
						</tr>
						<tr>
							<th scope="row" valign="top"><label for="sbc-style">Use the SBC Form styling?</label></th>
							<td><input type="checkbox" name="sbc-style" id="sbc-style" value="1" <?php if ($sbc_style === '1') echo 'checked="checked"'; ?> /> <em>* Styling doesn't display correctly in IE7 and earlier *</em></td>
						</tr>
						<tr>
							<th scope="row" valign="top"><label>İptal edilecek kategoriler:</label></th>
							<td><ul><?php wp_category_checklist(0,0,$raw_excluded_cats); ?></ul></td>
						</tr>
                        <tr>
							<th scope="row" valign="top"><label>Categories to always exclude from search results:</label></th>
							<td><input type="text" name="inall_exclude" id="inall_exclude" class="regular-text" value="<?php echo $inall_exclude; ?>"/><p><em><strong>Insert categories as comma seperated IDs (EX: 1,3,15,7)</strong></em></p></td>
                            <td><span class="description">Sometimes you don't want users to see posts from every category, categories listed here will be excluded from processing if users don't pick a specific category from the dropdown menu.</span></td>
                        </tr>
					</table>
                    
					<p class="submit"><input type="submit" id="submit" name="submit" class="button-primary" value="Save Changes" /></p>
				</form>
			</div>
<?php		}
	}
}


// Base function
function sbc($focus = null, $hide_empty = null, $search_text = null, $only_cat = null, $excluded_cats = null, $exclude_child = null, $inall_exclude = null) {
    
    $SBC_settings           = get_option("sbc-settings");
    
    // Set default values of arguments are not set
    $focus                  = !$focus ? $SBC_settings['focus'] : $focus;
    $hide_empty 	        = !$hide_empty ? $SBC_settings['hide_empty'] : $hide_empty;
    $search_text            = !$search_text ? $SBC_settings['search_text'] : $search_text;
    $search_text_default    = $search_text;
    $excluded_cats          = !$excluded_cats ? $SBC_settings['excluded_cats'] : $excluded_cats;
    $exclude_child          = !$exclude_child ? $SBC_settings['exclude_child'] : $exclude_child;
    $inall_exclude          = !$inall_exclude ? ','.$SBC_settings['inall_exclude'] : $inall_exclude;
    
    if(!$only_cat){
        // if $only_cat is still null, use settings from admin menu
        $exclude_setting = $excluded_cats.$inall_exclude;
        $settings = array('show_option_all' => $focus,
						'show_option_none' => '',
						'orderby' => 'name', 
						'order' => 'ASC',
						'show_last_update' => 0,
						'show_count' => 0,
						'hide_empty' => $hide_empty, 
						'child_of' => 0,
						'exclude' => $exclude_setting,
						'echo' => 0,
						'selected' => $cat_id,
						'hierarchical' => 1, 
						'name' => 'cat',
						'class' => 'postform',
						'depth' => $exclude_child);
        $input = wp_dropdown_categories($settings);
        $input_class = 'multi-cat';
    }
    else{
        $cat_id = !is_numeric($only_cat) ? get_cat_ID($only_cat) : $only_cat; // if it's not an ID, try getting it via the name
        $cat_id = ($cat_id === 0) ? get_category_by_slug($only_cat) : $cat_id; // if name doesn't work try it as a slug
        $input = "<input type='hidden' name='cat' id='cat' value='{$cat_id}' />\r\n";
        $input_class = 'single-cat';
    }
    
	if(is_category() && !is_tag() && !is_author() && !is_date()) $cat_id = get_cat_id(single_cat_title('' , false));

	if(is_search()){
		$cat_id = $_GET['cat'] ? (int) $_GET['cat'] : 0;
		$search_text = esc_attr(apply_filters('the_search_query', get_search_query()));
	}
	
	$blog_url = get_bloginfo("url");
	
	$form = <<< EOH
	<div id="sbc">
		<form method="get" id="sbc-search" action="{$blog_url}">
			<input type="text" value="{$search_text}" name="s" id="s" class="{$input_class}" onblur="if (this.value == '') {this.value = '{$search_text_default}';}"  onfocus="if (this.value == '{$search_text_default}') {this.value = '';}" />
			{$input}
			<input type="submit" id="sbc-submit" value="ARA" />
		</form>
	</div>	
EOH;
	
	echo $form;
}

function sbc_shortcode($atts){
    extract( shortcode_atts(array(
        'focus' => null,
        'hide_empty' => null,
        'search_text' => null,
        'only_cat' => null,
        'excluded_cats' => null,
        'exclude_child' => null,
        'inall_exclude' => null
    ), $atts) );
    
    sbc($focus, $hide_empty, $search_text, $only_cat, $excluded_cats, $exclude_child, $inall_exclude);
}

// Get results only from selected category
function return_only_selected_category() {
	if (isset($_REQUEST['sbc-submit'])){
		global $wp_query; $SBC_settings = get_option('sbc-settings');
		
		$desired_cat = $_REQUEST['cat'];
		if($desired_cat === '0') $desired_cat = $SBC_settings['inall_exclude'];
		
		$excluded = get_categories("hide_empty=false&exclude={$desired_cat}");
		
		$wp_query->query_vars['cat'] = "-{$excluded}";
	}
}

$sbc_settings = get_option("sbc-settings");
if($sbc_settings['sbc_style'] === '1'){
	// Add our styling
	function style_insert() {
		$current_path = get_option('siteurl').'/wp-content/plugins/'.basename(dirname(__FILE__));
		
		echo "<link href='{$current_path}/sbc-style.css' type='text/css' rel='stylesheet' />";
	}

	// insert custom stylesheet
	add_action('wp_head','style_insert');
}

// Highjack the search
add_filter('pre_get_posts', 'return_only_selected_category');

// insert into admin panel
add_action('admin_menu', array('SBC_Admin','add_config_page'));

// Allow use of [sbc]
add_shortcode('sbc', 'sbc_shortcode');






?>