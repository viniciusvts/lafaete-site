<?php
/*
* @wordpress-plugin
*
Plugin Name: 		NC Taxonomy Meta
Description:	    NC Taxonomy Meta allows you to add custom meta fields to your wordpress default 
                    or custom taxonomies.
Version:            1.0.2
Author:             Nabaraj Chapagain
Author URI:         http://www.ncplugins.com
License:            GPLv2
License URI:        http://www.gnu.org/licenses/gpl-2.0.txt
Text Domain:        nc-taxonomy-meta
Domain Path:        /languages
*/

if (!defined('ABSPATH'))
{
    exit; // Exit if accessed directly
}

if(!class_exists('NC_taxonomy_meta')):

	class NC_taxonomy_meta{

		private static $textdomain='nc-taxonomy-meta';
		public static $instance;
		private $fields;
		private $pages;
		private static $pluginDirUrl;
		private static $version='1.0.1';

/**
 * This function automcatically fires if the class is instantiate
 * 
 * @since 1.0.1
 * @access  public
 *
 * @author Nabaraj Chapagain <nabarajc6@gmail.com>
 *
 */
private function __construct(){ 

	if(!is_admin())
		return;

	self::$pluginDirUrl=plugin_dir_url( __FILE__ );

	register_activation_hook( __FILE__, array($this,'nc_taxonomy_meta_create_table' ));
	add_action('init',array($this,'nc_taxonomy_meta_load_textdomain'));
	add_action( 'admin_init', array($this,'nc_taxonomy_meta_fields'));
	add_action( 'admin_init', array($this,'nc_taxonomy_check_table_column'));
	add_action( 'admin_enqueue_scripts', array($this,'nc_taxonomy_meta_admin_scripts'));
	add_action('admin_menu', array($this, 'nc_taxonomy_meta_menu'));
	add_action('wp_ajax_nc_taxonomy_meta_image',array($this,'nc_taxonomy_meta_image'));

}

public static function get_instance(){

	if(!self::$instance)
	{
		self::$instance=new self();
	}

	return self::$instance;
}

/**
 * This function register menu for nc taxonomy meta plugin
 *  
 * @since 1.0.1
 * @access  public
 *
 * @author Nabaraj Chapagain <nabarajc6@gmail.com>
 *
 */
public function  nc_taxonomy_meta_menu(){
	$settings=add_options_page('NC Taxonomy Meta Settings', 'NC Taxonomy Meta Settings', 'manage_options', 'nc_taxonomy_meta', array($this,'nc_taxonomy_meta_settings_page'));
	add_action( "load-{$settings}", array($this,'nc_taxonomy_meta_settings') );
	add_action( "load-{$settings}", array($this,'nc_taxonomy_meta_delete') );
}

/**
 * This function loads MO file into the list of domains
 *  
 * @since 1.0.1
 * @access  public
 *
 * @author Nabaraj Chapagain <nabarajc6@gmail.com>
 *
 */
public function nc_taxonomy_meta_load_textdomain(){

	load_plugin_textdomain( self::$textdomain, false, self::$pluginDirUrl. 'languages' );
}


/**
 * This function create required databases for the plugin if not existed.
 * 
 * @since 1.0.1
 * @access  public
 *
 * @author Nabaraj Chapagain <nabarajc6@gmail.com>
 *
 */					
public function nc_taxonomy_meta_create_table(){

	global $wpdb;

	$charset_collate = $wpdb->get_charset_collate();
	$table_name= $wpdb->prefix."nc_taxonomy_meta";
	$table_name1= $wpdb->prefix."nc_taxonomies";

	$sql = "CREATE TABLE $table_name (
	id bigint(9) NOT NULL auto_increment,
	meta_name  varchar(100) NOT NULL default '',
	meta_id  varchar(100) NOT NULL default '',
	meta_field_description  varchar(100) NOT NULL default '',
	meta_type varchar(100) NOT NULL default '',
	meta_repeatable_content varchar(100) NOT NULL default '',
	required tinyint(1) NOT NULL default '0',
	PRIMARY KEY (id)
	) $charset_collate;";

	$sql1 = "CREATE TABLE $table_name1 (
	id bigint(9) NOT NULL auto_increment,
	taxonomy_name  varchar(100) NOT NULL default '',
	meta_field_id  varchar(100) NOT NULL default '',
	PRIMARY KEY (id)
	) $charset_collate;";

	require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
	dbDelta(array($sql,$sql1));


}


/**
 * This function add columns to older version of plugins
 * 
 * @since 1.0.1
 * @access  public
 *
 * @author Nabaraj Chapagain <nabarajc6@gmail.com>
 *
 **/
public function nc_taxonomy_check_table_column(){

	global $wpdb;
	$table_name= $wpdb->prefix."nc_taxonomy_meta";
	$db_name=$wpdb->dbname;

	$find_column=$wpdb->query("SELECT COLUMN_NAME
		FROM INFORMATION_SCHEMA.COLUMNS
		WHERE table_name = '$table_name'
		AND table_schema = '$db_name'
		AND column_name = 'required'"
		);
	if($find_column!=0)
		return;

	$wpdb->query("ALTER TABLE $table_name ADD required int NOT NULL DEFAULT 0 after meta_repeatable_content");
}

/**
 * This function saves the meta fields to database and redirects thereafter.	
 * 
 * @since 1.0.1
 * @access  public
 *
 * @author Nabaraj Chapagain <nabarajc6@gmail.com>
 *
 */
public	function nc_taxonomy_meta_settings() {

	if (!isset($_POST["nc_taxonomy_meta_submit"]) || !wp_verify_nonce($_POST["nc_taxonomy_nonce"],'nc_taxonomy_nonce')) 
		return;

	$this->nc_taxonomy_meta_save_settings();

	$param = isset($_GET['tab'])? 'updated=true&tab='.$_GET['tab'] : 'updated=true';
	wp_redirect(admin_url('options-general.php?page=nc_taxonomy_meta&'.$param));
	exit;

}


/**
 * This function allow to delete existing meta fields and redirects thenafter.		
 * 
 * @since 1.0.1
 * @access  public
 *
 * @author Nabaraj Chapagain <nabarajc6@gmail.com>
 *
 */
public	function nc_taxonomy_meta_delete() {
	global $wpdb;
	if (isset($_GET["delete_meta"])) :
		$delete=$wpdb->query("delete from ".$wpdb->prefix ."nc_taxonomy_meta where id=".$_GET["delete_meta"]); 
	$delete=$wpdb->query("delete from ".$wpdb->prefix ."nc_taxonomies where meta_field_id=".$_GET["delete_meta"]); 
	$param = isset($_GET['tab'])? 'deletd=true&tab='.$_GET['tab'] : 'deleted=true';
	wp_redirect(admin_url('options-general.php?page=nc_taxonomy_meta&'.$param));
	exit;
	endif;
}

/**
 * This function displays the form for new meta field and existing meta fields.		
 * 
 * @since 1.0.1
 * @access  public
 *
 * @author Nabaraj Chapagain <nabarajc6@gmail.com>
 *
 */

public function nc_taxonomy_meta_settings_page(){
	include_once('inc/nc_taxonomy_meta_settings.php');
}

/**
 * This function generates the pretty slug for the meta filds.	
 * 
 * @since 1.0.1
 * @access  public
 *
 * @author Nabaraj Chapagain <nabarajc6@gmail.com>
 * @return text 
 *
 */

public static function nc_taxonomy_meta_slugify($text)
{
  	// replace non letter or digits by -
	$text = preg_replace('~[^\pL\d]+~u', '-', $text);

  	// transliterate
	$text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

  	// remove unwanted characters
	$text = preg_replace('~[^-\w]+~', '', $text);

  	// trim
	$text = trim($text, '-');

  	// remove duplicate -
	$text = preg_replace('~-+~', '-', $text);

 	// lowercase
	$text = strtolower($text);

	if (empty($text)) {
		return 'n-a';
	}

	return $text;
}		

/**
 * This function gets values like meta name, meta id, taxonomies etc via $_POST and sanitize them to
 * insert into databases.	
 * 
 * @since 1.0.1
 * @access  public
 *
 * @author Nabaraj Chapagain <nabarajc6@gmail.com>
 * @return text (returns the slug for the taxonomy meta)
 */
public function nc_taxonomy_meta_save_settings(){

	global $wpdb;

	if (isset($_GET['page'] ) !='nc_taxonomy_meta')
		return;

	$meta_name=esc_attr($_POST['meta_name']);
	$meta_id=esc_attr($_POST['meta_id']);
	$meta_id=self::nc_taxonomy_meta_slugify(!empty($meta_id) ? $meta_id : $meta_name);
	$meta_field_description=esc_attr($_POST['meta_field_description']);
	$meta_type=esc_attr($_POST['meta_type']);
	$meta_taxonomy=$_POST['meta_taxonomy'];
	$meta_required=$_POST['meta_field_is_required'];

	if(empty($meta_name) || empty($meta_id) || empty($meta_type) || empty($meta_taxonomy))
	{
		$param = isset($_GET['tab'])? 'add=fales&tab='.$_GET['tab'] : 'add=fales';
		wp_redirect(admin_url('options-general.php?page=nc_taxonomy_meta&'.$param));	
		exit;	
	}

	$list=array();

	// if meta type is selectbox or radio explode the options field inside variable called list
	if($meta_type=='selectbox' || $meta_type=='radio' || $meta_type=='checkbox')
	{
		$array_item=sanitize_text_field($_POST['nc_taxonomy_meta_multiple_item']);
		if($array_item):
			$list=explode(',',$array_item);	
		endif;	
	}

	// check if duplicate value exists in the database
	$duplicate=$wpdb->get_results("select * from ".$wpdb->prefix . "nc_taxonomy_meta where meta_name='".$meta_name."' and meta_id='".$meta_id."'"); 

	// insert meta fields to table called prefix_nc_taxonomy_meta
	if(!$duplicate){
		$insert=$wpdb->query("insert into ".$wpdb->prefix ."nc_taxonomy_meta(meta_name,meta_id,meta_field_description,meta_type,meta_repeatable_content,required) values('$meta_name','$meta_id','$meta_field_description','$meta_type','".maybe_serialize($list)."','$meta_required')"); 
	}

	$lastid= $wpdb->insert_id; 

	// insert single/multiple taxonomies to table called prefix_nc_taxonomies
	foreach($meta_taxonomy as $tax)
	{

		$insert=$wpdb->query("insert into ".$wpdb->prefix . "nc_taxonomies(taxonomy_name,meta_field_id) values('$tax','$lastid')"); 	
	}
}

/**
 * This function check the table nc_taxonomies to find avilable taxonomies for meta field with 
 * specific id	and list them in comma seperated format.
 *
 * @param id meta field id to check againts database
 * 
 * @since 1.0.1
 * @access  public
 *
 * @author Nabaraj Chapagain <nabarajc6@gmail.com>
 *
 */
public function nc_taxonomy_meta_display_taxonomy($id){

	global $wpdb; 
	$tax=$wpdb->get_results("select taxonomy_name from ".$wpdb->prefix . "nc_taxonomies where meta_field_id='".$id."'");
	$sep='';
	$tax_list='';
	$tax_new=array_unique($tax,SORT_REGULAR );
	if($tax_new):
		foreach($tax_new as $taxonomy)
		{
			$tax_list .=$sep.$taxonomy->taxonomy_name;	
			$sep=', ';	
		}
		return $tax_list;
		endif;
	}
	
/**
 * This function gets all the available taxonomies and displays them in select box while adding new 
 * meta field.
 * 
 * @since 1.0.1
 * @access  public
 *
 * @author Nabaraj Chapagain <nabarajc6@gmail.com>
 * @return html
 */	
public	function nc_taxonomy_meta_taxonomy_list()
{

	$output = 'objects'; // or names
	$taxonomies=get_taxonomies(array(),$output);
	$html ='';

	if  ($taxonomies) {
		foreach ($taxonomies  as $taxonomy ) {
			$html .= '<p><option class="term" value="'.$taxonomy->name.'" >'.$taxonomy->name.'</option></p>';
		}
	}  	

	return $html;
}

/**
 * This function displays all available meta types with select box while adding new meta field.
 * 
 * @since 1.0.1
 * @access  public
 *
 * @author Nabaraj Chapagain <nabarajc6@gmail.com>
 * @return html
 */			
public function nc_taxonomy_meta_types()
{
	$type=array('text','textarea', 'checkbox','selectbox','radio','image','editor',);
	$html= "<select  name='meta_type' id='meta_type' class='meta_type' style='width:95%' required>";
	foreach($type as $types){

		$html .='<option class="'.__( 'nc_'.$types,self::$textdomain).'" value="'.$types.'">'.ucfirst($types).'</option>';
	}
	$html .='</select>';	

	return $html;
}

/**
 * This function displays all available meta types with select box while adding new meta field.
 * 
 * @since 1.0.1
 * @access  public
 *
 * @author Nabaraj Chapagain <nabarajc6@gmail.com>
 *
 */			
private function nc_taxonomy_fields(){
	global $wpdb;
	$fields=$wpdb->get_results( "
		SELECT      key1.*,key2.taxonomy_name
		FROM        ".$wpdb->prefix."nc_taxonomy_meta key1
		INNER JOIN  ".$wpdb->prefix."nc_taxonomies  key2
		ON key1.id = key2.meta_field_id
		");
	$this->fields=$fields;
	return $this->fields;
}

/**
 * This function returns all the taxonomies which have custom fields.
 * 
 * @since 1.0.1
 * @access  public
 *
 * @author Nabaraj Chapagain <nabarajc6@gmail.com>
 * @return pages
 */			
private function nc_taxonomy_pages(){

	$fields=$this->nc_taxonomy_fields();
	$value='';

	if($fields){

		foreach($fields as $field){

			$this->pages[$field->taxonomy_name.'_name']=$field->taxonomy_name;
		}

		array_unique($this->pages, SORT_REGULAR);
		$value=$this->pages;
	}

	return $value;
}

/**
 * This function displays all available meta types with select box while adding new meta field.
 * 
 * @since 1.0.1
 * @access  public
 *
 * @author Nabaraj Chapagain <nabarajc6@gmail.com>
 *
 */			
public function nc_taxonomy_meta_fields(){	

	$taxonomies=$this->nc_taxonomy_pages();

	if($taxonomies):
		foreach($taxonomies as $tax):

    // Add new category data fields
			add_action( $tax.'_add_form_fields', array($this, 'nc_taxonomy_add_custom_meta'));
    //Edit category data fields
		add_action(  $tax.'_edit_form_fields', array($this, 'nc_taxonomy_edit_custom_meta'));
    //Save the category data
		add_action( 'edited_'.$tax, array($this, 'nc_taxonomy_save_custom_meta'), 10, 2);
		add_action( 'create_'.$tax, array($this, 'nc_taxonomy_save_custom_meta'), 10, 2);

		endforeach;
		endif;

	}

/**
 * This function get saved meta field from the option table.
 *
 * @param term_id term id for the term to find the available data from option table
 * @param meta_id meta id for the term to find available data from the option table
 * 
 * @since 1.0.1
 * @access  public
 *
 * @author Nabaraj Chapagain <nabarajc6@gmail.com>
 * @return value
 */			
public function nc_tax_meta($term_id,$meta_id){


	if(empty($term_id) || empty($meta_id))
		return;

	$value='';
	$data=get_option('tax_meta_'.$term_id);

	if(is_array($data)):
		$value= $data[$meta_id];
	return $value;
	endif;

}

/**
 * This function displays meta fields while creating new term.
 * 
 * @since 1.0.1
 * @access  public
 *
 * @author Nabaraj Chapagain <nabarajc6@gmail.com>
 *
 */			
public function nc_taxonomy_add_custom_meta($term){

	$fields =$this->nc_taxonomy_fields();

	echo "<div id='nc_taxonomy_meta_fields'>";

	foreach($fields as $field){

		if($field->taxonomy_name==$term)
		{
			if($field->meta_type =='selectbox' || $field->meta_type=='radio' || $field->meta_type=='checkbox'):
				$options=maybe_unserialize($field->meta_repeatable_content);
			else:
				$options='';
			endif;

			$this->nc_taxonomy_field_type_callback($field->meta_type,$field->meta_name,$field->meta_id,$options,'',$html_format='normal',$field->required);
		}
	}
	echo "</div>";
}

/**
 * This function dispaly meta fields with existing values for terms while editing the terms.
 * 
 * @since 1.0.1
 * @access  public
 *
 * @author Nabaraj Chapagain <nabarajc6@gmail.com>
 *
 */			
public function nc_taxonomy_edit_custom_meta($term){

	$fields =$this->nc_taxonomy_fields();
	echo "<div id='nc_taxonomy_meta_fields'>";
	foreach($fields as $field){

		if($field->taxonomy_name==$term->taxonomy)
		{
			$value=get_option('tax_meta_'.$term->term_id);
			$fields=nc_tax_meta($term->term_id,$field->meta_id);
			if($field->meta_type =='selectbox' || $field->meta_type=='radio' || $field->meta_type=='checkbox'):
				$options=maybe_unserialize($field->meta_repeatable_content);
			else:
				$options='';
			endif;

			$this->nc_taxonomy_field_type_callback($field->meta_type,$field->meta_name,$field->meta_id,$options,$value,$html_format='table',$field->required);

		}
	}
	echo "</div>";
}

/**
 * This function saves meta field for specific term to options table.
 * 
 * @since 1.0.1
 * @access  public
 *
 * @author Nabaraj Chapagain <nabarajc6@gmail.com>
 *
 */			

public function nc_taxonomy_save_custom_meta($term_id){

	if(!isset($_POST['nc_taxonomy_meta']))
		return;

	if(get_option('tax_meta_'.$term_id))
	{
		delete_option('tax_meta_'.$term_id);
		update_option('tax_meta_'.$term_id,$_POST['nc_taxonomy_meta']);
	}
	else{

		add_option('tax_meta_'.$term_id,$_POST['nc_taxonomy_meta']);
	}

}

/**
 * This function list out all the meta fields available in the custom table.
 * 
 * @since 1.0.1
 * @access  public
 *
 * @author Nabaraj Chapagain <nabarajc6@gmail.com>
 *
 */			

public function nc_taxonomy_meta_display_meta(){
	global $wpdb;	
	$data=$wpdb->get_results ( "select * from " . $wpdb->prefix . "nc_taxonomy_meta");

	return $data;	


}

/**
 * This function check if the specific meta field is available 
 *
 * @param type meta type
 * 
 * @since 1.0.1
 * @access  public
 *
 * @author Nabaraj Chapagain <nabarajc6@gmail.com>
 * @return had_field
 */	
public  function nc_taxonomy_has_field($type){

	if(empty($type))
		return;

	$fields=$this->nc_taxonomy_meta_display_meta(); 
	$has_field=0;

	foreach ($fields as  $field) {

		if($field->meta_type==$type):
			$has_field=1; break;
		endif;
	}

	return $has_field;
}

/**
 * This function enqueues all stylesheets and scripts for admin section
 * 
 * @since 1.0.1
 * @access  public
 *
 * @author Nabaraj Chapagain <nabarajc6@gmail.com>
 *
 */			
public function nc_taxonomy_meta_admin_scripts(){

	$has_image=$this->nc_taxonomy_has_field('image');
	$version=self::$version;
	$path=self::$pluginDirUrl;

	if($has_image==1){

		wp_enqueue_script('jquery');
		wp_enqueue_media();
		wp_enqueue_script( 'nc-taxonomy-meta-media-upload', $path. '/assets/js/nc-media-upload.js', array( 'jquery' ) );

	}
	wp_enqueue_script('nc-taxonomy-meta-custom-script', $path.'assets/js/nc-custom-script.js', array('jquery'),$version,true);
	wp_enqueue_style( 'nc-taxonomy-style', $path. 'assets/css/nc-taxonomy-style.css','',$version);

}

/**
 * This function return table start row for the add tag page
 *
 * @author Nabaraj Chapagain <nabarajc6@gmail.com>
 * @return html
 */
public function nc_taxonomy_table_field_start($html_format,$required='',$type){

	$required_class=''; $extra_html='';

	if($required==1):
		$required_class='form-required'; 
	endif;

	if($type=='image-field')
		$extra_html='data-ajax-url="'.admin_url('admin-ajax.php').'"';


	$html .='<div '.$extra_html.' class="form-field '.$required_class.' nc_taxonomy_meta_fields nc-taxonomy-meta-'.$type.'">';

	if($html_format=='table'){

		if($required==1)
			$required_class='form-required';
		
		$html='<tr '.$extra_html.' class="form-field '.$required_class.' nc-taxonomy-meta-'.$type.'"><th>';
		
	}


	return $html;
}

/**
 * This function return table middle row for the add tag page
 *
 * @author Nabaraj Chapagain <nabarajc6@gmail.com>
 * @return html
 */
public function nc_taxonomy_table_field_middle($html_format){


	if($html_format=="table"):
		$html='</th><td>';
	endif;

	return $html;
}


/**
 * This function return table close row for the add tag page
 *
 * @author Nabaraj Chapagain <nabarajc6@gmail.com>
 * @return html
 */
public function nc_taxonomy_table_field_close($html_format){

	$html="</div>";

	if($html_format=='table'):
		$html='</td></tr>';
	endif;

	return $html;
}


/**
 * This function is to display new/existing text meta field. 
 *
 * @param lablel label for the text input field
 * @param name name for the text input field
 * @param value existing value for the text input field while editing the existing meta fields.
 * 
 * @since 1.0.1
 * @access  public
 *
 * @author Nabaraj Chapagain <nabarajc6@gmail.com>
 * @return html
 */	

function nc_taxonomy_text_field($label,$name,$value=array(),$html_format,$required)
{	

	if(empty($label) || empty($name))
		return;

	$value=self::nc_taxonomy_value_finder($value,$name);

	$aria_required=''; 
	
	if($required==1):
		$aria_required='aria-required="true"';
	endif;

	$html =$this->nc_taxonomy_table_field_start($html_format,$required,'text-field');
	$html .='<label for="nc_taxonomy_meta['.$name.']">'.__( ucfirst($label),self::$textdomain).'</label>';
	$html .=$this->nc_taxonomy_table_field_middle($html_format);
	$html .='<input '.$aria_required.' type="text" name="nc_taxonomy_meta['.$name.']" id="'.$name.'" value="'.$value.'">';
	$html .=$this->nc_taxonomy_table_field_close($html_format);

	return $html;
}

/**
 * This function is to display new/existing textarea meta field. 
 *
 * @param lablel label for the text input field
 * @param name name for the text input field
 * @param value existing value for the text input field while editing the existing meta fields.
 * 
 * @since 1.0.1
 * @access  public
 *
 * @author Nabaraj Chapagain <nabarajc6@gmail.com>
 * @return html
 */	
function nc_taxonomy_textarea_field($label,$name,$value=array(),$html_format,$required)
{
	if(empty($label) || empty($name))
		return;

	$value=self::nc_taxonomy_value_finder($value,$name);

	$aria_required=''; 
	
	if($required==1):
		$aria_required='aria-required="true"';
	endif;

	$html .=$this->nc_taxonomy_table_field_start($html_format,$required,'textarea-field');
	$html .='<label for="nc_taxonomy_meta['.$name.']">'.__( ucfirst($label),self::$textdomain).'</label>';
	$html .=$this->nc_taxonomy_table_field_middle($html_format);
	$html .='<div class="field-data">';
	$html .='<textarea '.$aria_required.' type="text" name="nc_taxonomy_meta['.$name.']" id="'.$name.'">'.$value.'</textarea>';
	$html .='</div>';
	$html .=$this->nc_taxonomy_table_field_close($html_format);

	return $html;
}

/**
 * This function is to display new/existing editor meta field. 
 *
 * @param lablel label for the text input field
 * @param name name for the text input field
 * @param value existing value for the text input field while editing the existing meta fields.
 * 
 * @since 1.0.1
 * @access  public
 *
 * @author Nabaraj Chapagain <nabarajc6@gmail.com>
 * @return html
 */
function nc_taxonomy_editor_field($label,$name,$value=array(),$html_format)
{
	if(empty($label) || empty($name))
		return;

	$value=self::nc_taxonomy_value_finder($value,$name);

	ob_start();

	echo $this->nc_taxonomy_table_field_start($html_format,'','editor-field');
	echo '<label for="nc_taxonomy_meta['.$name.']">'.__( ucfirst($label),self::$textdomain).'</label>';
	echo $this->nc_taxonomy_table_field_middle($html_format);
	wp_editor( $value, 'content_editor_'.$name, array('textarea_name'=>'nc_taxonomy_meta['.$name.']','editor_class'=>'nc_taxonomy_textarea') );
	echo $this->nc_taxonomy_table_field_close($html_format);
	$html=ob_get_contents() ;
	ob_end_clean();

	return $html;
}

/**
 * This function is to display new/existing checkbox meta field. 
 *
 * @param lablel label for the checkbox input field
 * @param name name for the checkbox input field
 * @param value existing value for the checkbox input field while editing the existing meta fields.
 * 
 * @since 1.0.1
 * @access  public
 *
 * @author Nabaraj Chapagain <nabarajc6@gmail.com>
 * @return html
 */
function nc_taxonomy_checkbox_field($label,$name,$options,$value=array(),$html_format)
{
	if(empty($label) || empty($name) || empty($options))
		return;

	$value=(array) self::nc_taxonomy_value_finder($value,$name,'checkbox');

	$html .=$this->nc_taxonomy_table_field_start($html_format,$required,'checkbox-field');
	$html .='<label for="'.$name.'">'.__( ucfirst($label),self::$textdomain).'</label>';
	$html .=$this->nc_taxonomy_table_field_middle($html_format);
	if(sizeof($options)>0):
		foreach($options as $option):

			$checked=in_array($option,$value) ? 'checked' : '';
		$html .='<input type="checkbox"  name="nc_taxonomy_meta[checkbox_'.$name.']['.$option.']" value="'.$option.'" id="'.$option.'" '.$checked.'> '.$option.'&nbsp;&nbsp;';

		endforeach;
		endif;
		$html .=$this->nc_taxonomy_table_field_close($html_format);

		return $html;
	}

/**
 * This function is to display new/existing image meta field. 
 *
 * @param lablel label for the image field
 * @param name name for the image field
 * @param value existing value for the image field while editing the existing meta fields.
 * 
 * @since 1.0.1
 * @access  public
 *
 * @author Nabaraj Chapagain <nabarajc6@gmail.com>
 * @return html
 */
public function nc_taxonomy_image_field($label,$name,$value=array(),$html_format)
{
	if(empty($label) || empty($name))
		return;

	$value= self::nc_taxonomy_value_finder($value,$name,'image');

	$html .=$this->nc_taxonomy_table_field_start($html_format,$required,'image-field');
	$html .='<label for="'.$name.'">'.__( ucfirst($label),self::$textdomain).'</label>';
	$html .=$this->nc_taxonomy_table_field_middle($html_format);
	$html .='
	<div class="field-data" data-type="media">
		<div class="nc_tax_image_wrapper">
			<div class="nc_taxonomy_field_'.$name.'">'.
				$value.
				'</div>
			</div>
		</div>';
		$html .=$this->nc_taxonomy_table_field_close($html_format);

		return $html;


	}

/**
 * This function is to display new/existing selectbox meta field. 
 *
 * @param lablel label for the selectbox field
 * @param name name for the selectbox field
 * @param options select box options for the selectbox field
 * @param value existing value for the selectbox field while editing the existing meta fields.
 * 
 * @since 1.0.1
 * @access  public
 *
 * @author Nabaraj Chapagain <nabarajc6@gmail.com>
 * @return html
 */
public function nc_taxonomy_selectbox_field($label,$name,$options=array(),$value=array(),$html_format,$required)
{

	if(empty($label) || empty($name) || empty($options))
		return;

	$value=self::nc_taxonomy_value_finder($value,$name);

	$aria_required=''; 
	
	if($required==1):
		$aria_required='aria-required="true"';
	endif;


	$html .=$this->nc_taxonomy_table_field_start($html_format,$required,'selectbox-field');
	$html .='<label for="'.$name.'">'.__( ucfirst($label),self::$textdomain).'</label>';
	$html .=$this->nc_taxonomy_table_field_middle($html_format);
	$html .='<select '.$aria_required.' name="nc_taxonomy_meta['.$name.']" id="'.$name.'" >';
	if(sizeof($options)>0):
		foreach($options as $option):

			$selected=$option==$value ? 'selected="selected"' : '';
		$html .='<option value="'.$option.'" '.$selected.'>'.$option.'</option>';

		endforeach;
		endif;
		$html .='</select>';
		$html .=$this->nc_taxonomy_table_field_close($html_format,$required);

		return $html;
	}

/**
 * This function is to display new/existing radio meta field. 
 *
 * @param lablel label for the radio meta field
 * @param name name for the radio meta field
 * @param options select box options for the radio meta field
 * @param value existing value for the radio meta field while editing the existing meta fields.
 * 
 * @since 1.0.1
 * @access  public
 *
 * @author Nabaraj Chapagain <nabarajc6@gmail.com>
 * @return html
 */
public function nc_taxonomy_radio_field($label,$name,$options=array(),$value=array(),$html_format)
{

	if(empty($label) || empty($name) || empty($options))
		return;

	$value=self::nc_taxonomy_value_finder($value,$name);
	

	$html .=$this->nc_taxonomy_table_field_start($html_format,'','radio-field');
	$html .='<label for="'.$name.'">'.__( ucfirst($label),self::$textdomain).'</label>';
	$html .=$this->nc_taxonomy_table_field_middle($html_format);
	if(sizeof($options)>0):
		foreach($options as $option):

			$checked=$option==$value ? 'checked="checked"' : '';
		$html .='<input type="radio" value="'.$option.'" name="nc_taxonomy_meta['.$name.']"  '.$checked.'>'.$option.'&nbsp;&nbsp;';

		endforeach;
		endif;
		$html .=$this->nc_taxonomy_table_field_close($html_format);

		return $html;
	}

/**
 * This function find saved value for meta fields via array key
 *
 * @param value option value array for specific term
 * @param name name for the meta field
 * 
 * @since 1.0.1
 * @access  public
 *
 * @author Nabaraj Chapagain <nabarajc6@gmail.com>
 * @return value
 */
public static function  nc_taxonomy_value_finder($value,$name,$type=''){

	$val='';
	if(sizeof($value)>0){

		if($type=="checkbox" && !empty($value['checkbox_'.$name])){

			$val=$value['checkbox_'.$name];
		}
		else if($type=='image')
		{

			$id='';
			$img='';
			$remove_display='none';
			$upload_display='inline-block';

			if(is_array($value[$name]) &&  !empty($value[$name]['url']) && !empty($value[$name]['id']))
			{

				$img=$value[$name]['url'];
				$has_image ='<img src="'.$img.'" >';
				$id=$value[$name]['id'];
				$remove_display='inline-block';
				$upload_display='none';

			}

			$val='
			<input class="nc_taxonomy_img_id" type="hidden" name="nc_taxonomy_meta['.$name.'][id]" value="'.$id.'"" />
			<input class="nc_taxonomy_img_url" type="hidden" name="nc_taxonomy_meta['.$name.'][url]"" value="'.$img.'"" />
			<span style="display:'.$remove_display.'" class="remove" data-id="'.$name.'">×</span><span class="image_placeholder_wrap">'.$has_image.'</span>
			<input class="nc_taxonomy_img_upload" style="display:'.$upload_display.'" data-name="'.$name.'" type="button"  value="'.__('Upload Image',self::$textdomain).'" />';	
		}
		
		else if(!empty($value[$name])){

			$val=$value[$name];	
		}
	}
	
	return $val;
}


/**
 * Function to request image via ajax
 *
 * 
 * @since 1.0.1
 * @access  public
 *
 * @author Nabaraj Chapagain <nabarajc6@gmail.com>
 */
public function nc_taxonomy_meta_image(){

	// if(!isset($_REQUEST['action']) && $_REQUEST['action']!='nc_taxonomy_meta_image')
	// 	return;

	$id=$_REQUEST['id'];

	$img=wp_get_attachment_image_src($id,'thumbnail');

	echo $img[0]; exit;


}

/**
 * This function displays the meta fields depending on the meta type provided. 
 *
 * @param type meta type that needs to be displayed for e.g. text,textarea,image etc.
 * @param label label for the  meta field
 * @param name name for the  meta field
 * @param options select box options for the radio meta field
 * @param value existing value for the radio meta field while editing the existing meta fields.
 * 
 * @since 1.0.1
 * @access  public
 *
 * @author Nabaraj Chapagain <nabarajc6@gmail.com>
 * @return html
 */
public function nc_taxonomy_field_type_callback($type,$label,$name,$options=array(),$value=array(),$html_format='normal',$required){


	switch ($type){

		case "text":

		echo $this->nc_taxonomy_text_field($label,$name,$value,$html_format,$required);

		break;

		case "textarea":

		echo $this->nc_taxonomy_textarea_field($label,$name,$value,$html_format,$required);

		break;

		case "editor":

		echo $this->nc_taxonomy_editor_field($label,$name,$value,$html_format,$required);

		break;

		case "checkbox":

		echo $this->nc_taxonomy_checkbox_field($label,$name,$options,$value,$html_format);

		break;

		case "image":

		echo $this->nc_taxonomy_image_field($label,$name,$value,$html_format);

		break;

		case "selectbox":

		echo $this->nc_taxonomy_selectbox_field($label,$name,$options,$value,$html_format,$required);

		break;

		case "radio":

		echo $this->nc_taxonomy_radio_field($label,$name,$options,$value,$html_format);

		break;


	}
}

}

endif;

// instantiate the calss NC_taxonomy_meta
NC_taxonomy_meta::get_instance();

/**
 * This function get saved meta field from the option table.
 *
 * @param term_id term id for the term to find the available data from option table
 * @param meta_id meta id for the term to find available data from the option table
 *
 * @author Nabaraj Chapagain <nabarajc6@gmail.com>
 * @return value
 */	
if(!function_exists('nc_tax_meta')):
	function nc_tax_meta($term_id,$meta_id){

		if(empty($term_id) || empty($meta_id))
			return;

		$value='';
		$data=get_option('tax_meta_'.$term_id);
		
		// check if meta type is checkbox and return array of lists.
		if(is_array($data) && array_key_exists('checkbox_'.$meta_id,$data)):

			$value= $data['checkbox_'.$meta_id];
		// return default value if not checkbox or image field
		elseif(is_array($data) && array_key_exists($meta_id,$data)):

			$value= $data[$meta_id];

		endif;
		
		return $value;
	}
	endif;

/**
 * This function get saved meta field from the option table.
 *
 * @param term_id term id for the term to find the available data from option table
 * @param meta_id meta id for the term to find available data from the option table
 *
 * @author Nabaraj Chapagain <nabarajc6@gmail.com>
 * @return value
 */
if(!function_exists('get_tax_meta')):
	function get_tax_meta($term_id,$meta_id){

		if(empty($term_id) || empty($meta_id))
			return;

		return nc_tax_meta($term_id,$meta_id);

	}
	endif;

/**
 * This function add the link to plugin page for user to navigate to settings page.
 *
 * @author Nabaraj Chapagain <nabarajc6@gmail.com>
 * 
 */
if(function_exists('nc_taxonomy_meta_add_settings_link')):
	function nc_taxonomy_meta_add_settings_link( $links ) {
		$settings_link = '<a href="options-general.php?page=nc_taxonomy_meta">' . __( 'Settings' ) . '</a>';
		array_push( $links, $settings_link );
		return $links;
	}
	$plugin = plugin_basename( __FILE__ );
	add_filter( "plugin_action_links_$plugin", 'nc_taxonomy_meta_add_settings_link' );

	endif;


