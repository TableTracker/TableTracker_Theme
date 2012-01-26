<?php


$themename 			= "TableTracker";
$version 				= "1.0";
$option_group 	= 'tt_options_group';
$option_name 		= 'tt_options';

// Load stylesheet and jscript
add_action('admin_init', 'tt_add_init');

function tt_add_init() {
	$file_dir = get_template_directory_uri();

	wp_enqueue_style("ttCss", $file_dir."/functions/themeoptions/theme-options.css", false, "1.0", "all");
	wp_enqueue_script("ttScript", $file_dir."/functions/themeoptions/theme-options.js", false, "1.0");

}

function my_admin_scripts() {
	wp_enqueue_script('media-upload');
	wp_enqueue_script('thickbox');
	wp_register_script('my-upload', '', array('jquery','media-upload','thickbox'));
	wp_enqueue_script('my-upload');
}

function my_admin_styles() {
	wp_enqueue_style('thickbox');
}

if (isset($_GET['page']) && $_GET['page'] == 'theme-options.php') {
add_action('admin_print_scripts', 'my_admin_scripts');
add_action('admin_print_styles', 'my_admin_styles');
}

// Create custom settings menu
add_action('admin_menu', 'tt_create_menu');

function tt_create_menu() {
	global $themename;
	//create new top-level menu
	add_theme_page(	__( $themename.' commando central' ), 
									__( 'TableTracker commando central' ), 
									'edit_theme_options', 
									basename(__FILE__), 
									'tt_settings_page' );
}

// Register settings
add_action( 'admin_init', 'register_settings' );

function register_settings() {
   global $themename, $version, $tt_options, $option_group, $option_name;
  	//register our settings
	register_setting( $option_group, $option_name);
}

// Create theme options
function tt_settings_page() {
	require_once('sections/base.php');
   global $themename, $version, $tt_options, $option_group, $option_name;
?>

<div class="wrap">
<div class="options_wrap">
<?php screen_icon(); ?><h2><?php echo $themename; ?> <?php _e('TableTracker commando central','Tabletrackerpage'); ?></h2>
<p class="top-notice"><?php _e('Hello captain! You are about to change something on TableTracker, are you sure you should be pushing those buttons? ','Tabletrackerpage'); ?></p>
<?php if ( isset ( $_POST['reset'] ) ): ?>
<?php // Delete Settings
global $wpdb, $themename, $version, $tt_options, $option_group, $option_name;
delete_option('tt_theme_options');
wp_cache_flush(); ?>
<div class="updated fade"><p><strong><?php _e( $themename. ' options reset.' ); ?></strong></p></div>

<?php elseif ( isset ( $_REQUEST['updated'] ) ): ?>
<div class="updated fade"><p><strong><?php _e( $themename. ' options saved.' ); ?></strong></p></div>

<?php endif;
if ( isset ( $_REQUESTs['save'] ) ): ?>

<?php endif; ?>

<form method="post" action="options.php">

<?php settings_fields( $option_group ); ?>

<?php $options = get_option( $option_name ); ?>

<?php foreach ($tt_options as $value) {
if ( isset($value['id']) ) { $valueid = $value['id'];}

switch ( $value['type'] ) {

case "section":

?>

	<div class="section_wrap">

	<h3 class="section_title"><?php echo $value['name']; ?>

<?php break;

case "section-desc":

?>

	<span><?php echo $value['name']; ?></span></h3>

	<div class="section_body">

<?php

break;

case 'text':

?>

	<div class="options_input options_text">

		<div class="options_desc" style="background: #FFF;"><?php echo $value['desc']; ?></div>

		<span class="labels"><label for="<?php echo $option_name.'['.$valueid.']'; ?>"><?php echo $value['name']; ?></label></span>

		<input name="<?php echo $option_name.'['.$valueid.']'; ?>" id="<?php echo $option_name.'['.$valueid.']'; ?>" type="<?php echo $value['type']; ?>" value="<?php if ( isset( $options[$valueid]) ){ esc_attr_e($options[$valueid]); } else { esc_attr_e($value['std']); } ?>" />

	</div>

<?php

break;

case 'linkedin':

?>

	<div class="options_input options_text">

		<div class="options_desc" style="background: #FFF;"><?php echo $value['desc']; ?></div>


		<span class="labels"><label for="<?php echo $option_name.'['.$valueid.']'; ?>"><?php echo $value['name']; ?></label></span>
<script type="text/javascript" src="http://platform.linkedin.com/in.js">
  	api_key: G4f0kCTl0JngvL3HQSBNdyrZjHvM40FgBvA22Uz93gUIxPKvsU63bcCSaOgobuZz
  	authorize: true
</script>

<script type="in/Login">
<em>You have authenticated!</em> 
</script>
		<input name="<?php echo $option_name.'['.$valueid.']'; ?>" id="<?php echo $option_name.'['.$valueid.']'; ?>" type="text" value="<?php if ( isset( $options[$valueid]) ){ esc_attr_e($options[$valueid]); } else { esc_attr_e($value['std']); } ?>" />

	</div>

<?php

break;

case 'skypetext':

?>

	<div class="options_input options_text">

		<div class="options_desc" style="background: #FFF;"><?php echo $value['desc']; ?></div>

		<span class="labels"><label style="color: #FFF;" for="<?php echo $option_name.'['.$valueid.']'; ?>"><?php echo $value['name']; ?></label></span>

		<input name="<?php echo $option_name.'['.$valueid.']'; ?>" id="<?php echo $option_name.'['.$valueid.']'; ?>" type="text" value="<?php if ( isset( $options[$valueid]) ){ esc_attr_e($options[$valueid]); } else { esc_attr_e($value['std']); } ?>" />

	</div>

<?php

break;

case 'obs':

?>

	<div class="options_input options_text">

		<div style="background: none repeat scroll 0 0 #F1F1F1; color: #777; padding: 15px; border: 1px dotted red;margin: 0!important;">
			<span class="labels"><label><?php echo $value['name']; ?></label></span>
			<?php echo $value['text']; ?>
		</div>

	</div>

<?php

break;

case 'quote':

?>

	<div class="options_input options_text">

		<div class="options_desc"><?php echo $value['desc']; ?></div>

		<span class="labels"><label for="<?php echo $option_name.'['.$valueid.']'; ?>"><?php echo $value['name']; ?></label></span>
		<?php if ( $value['textarea'] != "1" ) { ?>
			<input maxlength="<?php echo $value['maxlength']; ?>" width="200px" name="<?php echo $option_name.'['.$valueid.']'; ?>" id="<?php echo $option_name.'['.$valueid.']'; ?>" type="text" value="<?php if ( isset( $options[$valueid]) ){ esc_attr_e($options[$valueid]); } else { esc_attr_e($value['std']); } ?>" />
		<?php } else { ?>
		
			<textarea maxlength="<?php echo $value['maxlength']; ?>" width="200px" name="<?php echo $option_name.'['.$valueid.']'; ?>" id="<?php echo $option_name.'['.$valueid.']'; ?>"><?php if ( isset( $options[$valueid]) ){ esc_attr_e($options[$valueid]); } else { esc_attr_e($value['std']); } ?></textarea>
		
		<?php } ?>
		
		<span style="float: left; width: 35%; text-align: right; font-style: italic; color: red; font-size: 11px;">Max length: <?php echo $value['maxlength']; ?> charachters</span>
	</div>

<?php

break;

case 'textarea':

?>

	<div class="options_input options_textarea">

		<div class="options_desc"><?php echo $value['desc']; ?></div>

		<span class="labels"><label for="<?php echo $option_name.'['.$valueid.']'; ?>"><?php echo $value['name']; ?></label></span>

		<textarea name="<?php echo $option_name.'['.$valueid.']'; ?>" type="<?php echo $option_name.'['.$valueid.']'; ?>" cols="" rows=""><?php if ( isset( $options[$valueid]) ){ esc_attr_e($options[$valueid]); } else { esc_attr_e($value['std']); } ?></textarea>

	</div>

<?php

break;


case 'select':

?>

	<div class="options_input options_select">

		<div class="options_desc"><?php echo $value['desc']; ?></div>

		<span class="labels"><label for="<?php echo $option_name.'['.$valueid.']'; ?>"><?php echo $value['name']; ?></label></span>

		<select name="<?php echo $option_name.'['.$valueid.']'; ?>" id="<?php echo $option_name.'['.$valueid.']'; ?>">

		<?php foreach ($value['options'] as $option) { ?>

				<option <?php if ($options[$valueid] == $option) { echo 'selected="selected"'; } ?>><?php echo $option; ?></option><?php } ?>

		</select>

	</div>

<?php

break;

case "radio":

?>

	<div class="options_input options_select">

		<?php if ( $value['desc'] != "" ) { ?><div class="options_desc"><?php echo $value['desc']; ?></div><?php } ?>

		<span class="labels"><label for="<?php echo $option_name.'['.$valueid.']'; ?>"><?php echo $value['name']; ?></label></span>

		  <?php foreach ($value['options'] as $key=>$option) {

			$radio_setting = $options[$valueid];

			if($radio_setting != ''){

				if ($key == $options[$valueid] ) {

					$checked = "checked=\"checked\"";

					} else {

						$checked = "";

					}

			}else{

				if($key == $value['std']){

					$checked = "checked=\"checked\"";

				}else{

					$checked = "";

				}

			}?>

			<input type="radio" id="<?php echo $option_name.'['.$valueid.']'; ?>" name="<?php echo $option_name.'['.$valueid.']'; ?>" value="<?php echo $key; ?>" <?php echo $checked; ?> /><?php echo $option; ?><br />

			<?php } ?>

	</div>

<?php

break;

case "skyperadio":

?>

	<div class="options_input options_select">

		<?php if ( $value['desc'] != "" ) { ?><div class="options_desc" style="background: #FFF;"><?php echo $value['desc']; ?></div><?php } ?>

		<span class="labels"><label style="color: #FFF;" for="<?php echo $option_name.'['.$valueid.']'; ?>"><?php echo $value['name']; ?></label></span>

		  <?php foreach ($value['options'] as $key=>$option) {

			$radio_setting = $options[$valueid];

			if($radio_setting != ''){

				if ($key == $options[$valueid] ) {

					$checked = "checked=\"checked\"";

					} else {

						$checked = "";

					}

			}else{

				if($key == $value['std']){

					$checked = "checked=\"checked\"";

				}else{

					$checked = "";

				}

			}?>

			<input type="radio" id="<?php echo $option_name.'['.$valueid.']'; ?>" name="<?php echo $option_name.'['.$valueid.']'; ?>" value="<?php echo $key; ?>" <?php echo $checked; ?> /><?php echo $option; ?><br />

			<?php } ?>

	</div>

<?php

break;

case "checkbox":

?>

	<div class="options_input options_checkbox">

		<div class="options_desc"><?php echo $value['desc']; ?></div>

		<?php if( isset( $options[$valueid] ) ){ $checked = "checked=\"checked\""; }elseif( $value['std'] == "true" ){ $checked = "checked=\"checked\""; } else { $checked = "";} ?>

		<input type="checkbox" name="<?php echo $option_name.'['.$valueid.']'; ?>" id="<?php echo $option_name.'['.$valueid.']'; ?>" value="true" <?php echo $checked; ?> />

		<label for="<?php echo $option_name.'['.$valueid.']'; ?>"><?php echo $value['name']; ?></label>

	 </div>

<?php

break;

case "image":

?>
<script type="text/javascript">
var CurrID = "";

jQuery(document).ready(function() {

	jQuery('#<?php echo $option_name; ?>\\[<?php echo $valueid; ?>\\]_button').click(function() {
		CurrID = '<?php echo $valueid; ?>';
		formfield = jQuery('#<?php echo $option_name; ?>\\[<?php echo $valueid; ?>\\]').attr('name');
 		tb_show('', 'media-upload.php?type=image&amp;TB_iframe=true');
 		return false;
	});

	window.send_to_editor = function(html) {
		align = jQuery('img',html).attr('class');
		if ( align.indexOf('alignleft') > -1 ) { align = "left"; 
		} else if ( align.indexOf('alignright') > -1 ) { align = "right"; 
		} else if ( align.indexOf('aligncenter') > -1 ) { align = "center";
		} else { align = ""; }
		
		jQuery('#<?php echo $option_name; ?>\\['+ CurrID +'\\]_align').val(align);
		
 		imgurl = jQuery('img',html).attr('src');
 		jQuery('#<?php echo $option_name; ?>\\['+ CurrID +'\\]').val(imgurl);
 		shortImgUrl = imgurl.split('/');
 		shortImgUrl = shortImgUrl[shortImgUrl.length-1];
 		jQuery('#<?php echo $option_name; ?>\\['+ CurrID +'\\]_span').html(shortImgUrl);
 		tb_remove();
	}
	
});
</script>

	<div class="options_input options_checkbox">
	
		<label for="<?php echo $option_name.'['.$valueid.']'; ?>"><?php echo $value['name']; ?></label>
		<div class="options_desc"><?php echo $value['desc']; ?></div>
		<br />
		<input id="<?php echo $option_name.'['.$valueid.']'; ?>_button" type="button" value="Upload Image" />
		<input name="<?php echo $option_name.'['.$valueid.']'; ?>" id="<?php echo $option_name.'['.$valueid.']'; ?>" type="hidden" value="<?php if ( isset( $options[$valueid]) ){ esc_attr_e($options[$valueid]); } else { esc_attr_e($value['std']); } ?>" style="width: 180px;" />

		<span id="<?php echo $option_name.'['.$valueid.']'; ?>_span" style="font-style: italic; font-size: 11px; color: #666;"><?php 
		
			if ( $options[$valueid] != "" ) {
				$imgname = explode('/',$options[$valueid]);
				echo $imgname[count($imgname)-1];
			} else {
				echo "No image";
			}
		
		 ?></span>
		
		<div style="margin-top: 5px;">
		Picture alignment: <select style="width: auto;" name="<?php echo $option_name.'['.$valueid.'_align]'; ?>" id="<?php echo $option_name.'['.$valueid.']_align'; ?>">
			<option >Left</option>
			<option <?php if(strtolower($options[$valueid . "_align"]) == 'center'){ echo 'selected="true"'; }?>>Center</option>
			<option <?php if(strtolower($options[$valueid . "_align"]) == 'right'){ echo 'selected="true"'; }?>>Right</option>
		</select>
		</div>	
			
		
	</div>

<?php

break;

case "homepageimagelink"

?>
	<div class="options_input options_text">

		<input name="<?php echo $option_name.'['.$valueid.']'; ?>" id="<?php echo $option_name.'['.$valueid.']'; ?>" type="hidden" value="<?php if ( isset( $options[$valueid]) ){ esc_attr_e($options[$valueid]); } else { esc_attr_e($value['std']); } ?>" />

	</div>
<?php

break;

case "skypebox-open":

?>

	<div class="options_input options_text">

		<div style="
			background: none repeat scroll 0 0 #a4cddc; 
			color: #FFF!important; 
			padding: 15px; 
			margin: 0!important;
			border-radius: 10px;">
			<img src="<?php bloginfo( 'template_directory' ); ?>/images/skype.png" />
			

<?php
break;

case "skypebox-close":

?>

		</div>

	</div>

<?php
break;

case "close":

?>

</div><!--#section_body-->

</div><!--#section_wrap-->

<?php
break;

}

}

?>

<span class="submit">
<input class="button button-primary" type="submit" name="save" value="<?php _e('Save All Changes', 'Tabletrackerpage') ?>" />
</span>
</form>

<form method="post" action="">

<span class="button-right" class="submit">

<input class="button button-secondary" type="submit" name="reset" value="<?php _e('Reset/Delete Settings', 'Tabletrackerpage') ?>" />
<input type="hidden" name="action" value="reset" />
<span><?php _e('Caution: All entries will be deleted from database. Press when starting afresh or completely removing the theme.','Tabletrackerpage') ?></span>

</span>

</form>
</div><!--#options-wrap-->
</div>

<?php } ?>