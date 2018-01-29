<?php
$themename = "Layout";
$shortname = "cstudio";

$options = array (
	array(	"name" => "Themes:",
			"type" => "title"),			
	array(	"type" => "open"),	
	array(	"name" => "Layout Settings",
			"desc" => "list.php untuk tampilan default , gridmode.php untuk tampilan grid",
            "id" => $shortname."_post",
            "type" => "select",
	    "options" => array("list.php" => "list.php","gridmode" => "gridmode.php"),
            "std" => "list.php",),
			
	array(	"type" => "close")
	
);

function mytheme_add_admin() {
    global $themename, $shortname, $options;
    if ( $_GET['page'] == basename(__FILE__) ) {
    
        if ( 'save' == $_REQUEST['action'] ) {
                foreach ($options as $value) {
                    update_option( $value['id'], $_REQUEST[ $value['id'] ] ); }
                foreach ($options as $value) {
                    if( isset( $_REQUEST[ $value['id'] ] ) ) { update_option( $value['id'], $_REQUEST[ $value['id'] ]  ); } else { delete_option( $value['id'] ); } }
                header("Location: themes.php?page=custom-functions.php&saved=true");
                die;
        } else if( 'reset' == $_REQUEST['action'] ) {
            foreach ($options as $value) {
                delete_option( $value['id'] ); }
            header("Location: themes.php?page=functions.php&reset=true");
            die;
        }
    }

    add_theme_page($themename." Options", "".$themename." Options", 'edit_themes', basename(__FILE__), 'mytheme_admin');

}

function mytheme_admin() {

    global $themename, $shortname, $options;

    if ( $_REQUEST['saved'] ) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' saved.</strong></p></div>';
  
    
?>
<div class="wrap">


<form method="post">

<?php foreach ($options as $value) { 
    
	switch ( $value['type'] ) {
	
		case "open":
		?>
        <table width="100%" style="background-color: #FFFFFF; padding:5px 10px;border: 1px solid #DDD;border-top: 0;margin-bottom: 10px;">
		
        
        
		<?php break;
		
		case "close":
		?>
		
        </table><br />
        
        
		<?php break;
		
		case "title":
		?>
		<table width="100%" style="background-color: #198ef3;color: #FFF;padding: 0 10px;font-size: 17px;"><tr>
        	<td colspan="2"><h3 style="font-weight: bold;color: #FFF;"><?php echo $value['name']; ?></h3></td>
        </tr>
                

		<?php 
		break;
		
		case 'select':
		?>
        <tr>
            <td width="20%" rowspan="2" valign="middle"><strong><?php echo $value['name']; ?></strong></td>
            <td width="80%"><select style="width:240px;" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>"><?php foreach ($value['options'] as $option) { ?><option<?php if ( get_settings( $value['id'] ) == $option) { echo ' selected="selected"'; } elseif ($option == $value['std']) { echo ' selected="selected"'; } ?>><?php echo $option; ?></option><?php } ?></select></td>
       </tr>
                
       <tr>
            <td><small><?php echo $value['desc']; ?></small></td>
       </tr><tr><td colspan="2">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>

		<?php
        break;
            
		case "checkbox":
		?>
            <tr>
            <td width="20%" rowspan="2" valign="middle"><strong><?php echo $value['name']; ?></strong></td>
                <td width="80%"><? if(get_settings($value['id'])){ $checked = "checked=\"checked\""; }else{ $checked = ""; } ?>
                        <input type="checkbox" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" value="true" <?php echo $checked; ?> />
                        </td>
            </tr>
                        
            <tr>
                <td><small><?php echo $value['desc']; ?></small></td>
           </tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #000000;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>
            
        <?php 		break;
	
 
} 
}
?>

<!--</table>-->
<p class="submit">
<input name="save" type="submit" value="Save changes" />    
<input type="hidden" name="action" value="save" />
</p>

</form>


<?php
}

add_action('admin_menu', 'mytheme_add_admin'); ?>
<?php
global $options;
foreach ($options as $value) {
	if (get_settings( $value['id'] ) === FALSE) { $$value['id'] = $value['std']; } else { $$value['id'] = get_settings( $value['id'] ); }
}
?>
<?php 
function CukStudio_MyAnimeList_API(){
	wp_enqueue_script("myanimelist", get_template_directory_uri(). "/js/myanimelist.js", null, null, true);
}

function CukStudio_Gogoanime_API(){
	wp_enqueue_script("gogoanime", get_template_directory_uri(). "/js/gogoanime.js", null, null, true);
}
function MyAnimeList_API_Add_Meta_Box(){
	add_meta_box(
		"MyAnimeList-API",
		__("MyAnimeList API", "cstudio"),
		"MyAnimeList_API_Meta_Box",
		"anime",
		"normal",
		"default"
	);
}
function Gogoanime_API_Add_Meta_Box(){
	add_meta_box(
		"Gogoanime-API",
		__("Gogoanime API", "cstudio"),
		"Gogoanime_API_Meta_Box",
		"anime",
		"normal",
		"default"
	);
}

function CukStudio_Meta_Box( $meta_boxes ) {
	$prefix = "smoke-";
	$meta_boxes[] = array(
		"id" => "cstudio_meta_box",
		"title" => esc_html__( "Information Anime", "cstudio" ),
		"post_types" => array( "anime" ),
		"context" => "advanced",
		"priority" => "high",
		"autosave" => true,
		"fields" => array(
			array(
				"id" => "Background-Cover",
				"type" => "heading",
				"name" => esc_html("Background Cover","cstudio"),
			),
			array(
				"id" => $prefix. "bgcover",
				"type" => "text",
				"name" => esc_html__( "Background Cover", "cstudio" ),
			),
			array(
				"id" => "alternative-titles",
				"type" => "heading",
				"name" => esc_html__( "Alternative Titles", "cstudio" ),
			),
			array(
				"id" => $prefix . "english",
				"type" => "text",
				"name" => esc_html__( "English", "cstudio" ),
			),
			array(
				"id" => $prefix . "japanese",
				"type" => "text",
				"name" => esc_html__( "Japanese", "cstudio" ),
			),
			array(
				"id" => $prefix . "pv",
				"type" => "text",
				"name" => esc_html__( "Video Promosi", "cstudio" ),
			),
			array(
				"id" => $prefix . "synonyms",
				"type" => "text",
				"name" => esc_html__( "Synonyms", "shirozare" ),
			),
			array(
				"id" => "information",
				"type" => "heading",
				"name" => esc_html__( "Information", "cstudio" ),
			),
			array(
				"id" => $prefix . "episodes",
				"type" => "text",
				"name" => esc_html__( "Episodes", "cstudio" ),
			),
			array(
				"id" => $prefix . "status",
				"type" => "text",
				"name" => esc_html__( "Status", "cstudio" ),
			),
			array(
				"id" => $prefix . "aired",
				"type" => "text",
				"name" => esc_html__( "Aired", "cstudio" ),
			),
			array(
				"id" => $prefix . "broadcast",
				"type" => "text",
				"name" => esc_html__( "Broadcast", "cstudio" ),
			),
			array(
				"id" => $prefix . "licensors",
				"type" => "text",
				"name" => esc_html__( "Licensors", "cstudio" ),
			),
			array(
				"id" => $prefix . "studios",
				"type" => "text",
				"name" => esc_html__( "Studios", "cstudio" ),
			),
			array(
				"id" => $prefix . "source",
				"type" => "text",
				"name" => esc_html__( "Source", "cstudio" ),
			),
			array(
				"id" => $prefix . "duration",
				"type" => "text",
				"name" => esc_html__( "Duration", "cstudio" ),
			),
			array(
				"id" => $prefix . "rating",
				"type" => "text",
				"name" => esc_html__( "Rating", "cstudio" ),
			),
			array(
				"id" => "statistics",
				"type" => "heading",
				"name" => esc_html__( "Statistics", "cstudio" ),
			),
			array(
				"id" => $prefix . "score",
				"type" => "text",
				"name" => esc_html__( "Score", "cstudio" ),
			),
			array(
				"id" => $prefix . "ranked",
				"type" => "text",
				"name" => esc_html__( "Ranked", "cstudio" ),
			),
			array(
				"id" => $prefix . "popularity",
				"type" => "text",
				"name" => esc_html__( "Popularity", "cstudio" ),
			),
		),
	);
	return $meta_boxes;
}

function your_prefix_register_meta_boxes( $meta_boxes ){
$prefix = 'smoke_';
$prefixx = 'smoker_';
$meta_boxes[] = array(
    'id' => 'link',
    'title' => __('Link for Gogoanime', 'meta-box'),
    'pages' => ('anime'),
    'context' => 'normal',
    'priority' => 'high',
    'autosave' => true,
    'fields' => array(
        array(
            "id" => $prefix . "drive",
            "name" => esc_html__( "Google drive", "cstudio" ),
            "type" => "text",
        ),
        array(
            "id" => $prefix . "streamoe",
            "name" => esc_html__( "Stream.moe", "cstudio" ),
            "type" => "text",
        ),
        array(
            "id" => $prefix . "anime",
            "name" => esc_html__( "Vidstreaming", "cstudio" ),
            "type" => "text",
        ),
        array(
            "id" => $prefix . "vidcdn",
            "name" => esc_html__( "Vidcdn", "cstudio" ),
            "type" => "text",
        ),
        array(
            "id" => $prefix . "streamango",
            "name" => esc_html__( "Streamango", "cstudio" ),
            "type" => "text",
        ),
        array(
            "id" => $prefix . "estram",
            "name" => esc_html__( "Estream", "cstudio" ),
            "type" => "text",
        ),
        array(
            "id" => $prefix . "open",
            "name" => esc_html__( "Oload", "cstudio" ),
            "type" => "text",
        ),
        array(
            "id" => $prefix . "openload",
            "name" => esc_html__( "Openload", "cstudio" ),
            "type" => "text",
        ),
        array(
            "id" => $prefix . "mp4",
            "name" => esc_html__( "Mp4Upload", "cstudio" ),
            "type" => "text",
        ),
    )
);

$meta_boxes[] = array(
		'id' => 'stream',
		'title' => __( 'Info Video', 'meta-box' ),
		'pages' => array( 'anime'),
		'context' => 'normal',
		'priority' => 'high',
		'autosave' => true,
		'fields' => array(
		array(
				'name'  => __( 'Embed Video', 'meta-box' ),
				'id'    => "{$prefix}embed",
				'desc'  => __( 'Episode Estream Mp4Upload Streamango Streamcherry Oload Vidstreaming Vidcdn', 'meta-box' ),
				'type' => 'textarea',
				'clone' => 'true',
			),
         )
			
);
	return $meta_boxes;
}



function MyAnimeList_API_Meta_Box($post){
?>
<div class="rwmb-meta-box">
	<div class="rwmb-field rwmb-text-wrapper">
		<div class="rwmb-label">
			<label for="smoke-myanimelist-api">MyAnimeList API</label>		
		</div>
		<div class="rwmb-input ui-shortable">
			<div class="rwmb-clone rwmb-text-clone">
				<input size="30" type="text" id="smoke-myanimelist-api" class="rwmb-text " name="smoke-myanimelist-api"/>
			</div>
			<a class="button-primary" id="smoke-myanimelist-api-generate">Generate</a>
		</div>
	</div>
</div>
<?php
}

function Gogoanime_API_Meta_Box($post){
    ?>
    <div class="rwmb-meta-box">
        <div class="rwmb-field rwmb-text-wrapper">
            <div class="rwmb-label">
                <label for="smoke-gogoanime-api">Gogoanime API</label>		
            </div>
            <div class="rwmb-input ui-shortable">
                <div class="rwmb-clone rwmb-text-clone">
                    <input size="30" type="text" id="smoke-gogoanime-api" class="rwmb-text " name="smoke-gogoanime-api"/>
                </div>
                <a class="button-primary" id="smoke-gogoanime-api-generate">Generate</a>
            </div>
        </div>
    </div>
    <?php
    }

function CukStudio_Setup(){
    add_action("add_meta_boxes", "MyAnimeList_API_Add_Meta_Box");
    add_action("add_meta_boxes", "Gogoanime_API_Add_Meta_Box");
    add_filter("rwmb_meta_boxes", "CukStudio_Meta_Box");
    add_filter( 'rwmb_meta_boxes', 'your_prefix_register_meta_boxes' );
	add_action("wp_enqueue_scripts", "CukStudio_Resources");
    add_action("admin_enqueue_scripts", "CukStudio_MyAnimeList_API");
    add_action("admin_enqueue_scripts", "CukStudio_Gogoanime_API");
    add_action("admin_enqueue_scripts", "slider");
	add_theme_support("post-thumbnails");
	add_theme_support("title-tag");
	register_taxonomy("genre", "anime", array(
		"labels"             => array(
			"name"                       => "Genre",
			"singular_name"              => "Genre",
			"menu_name"                  => "Genre",
			"all_items"                  => "Semua Genre",
			"edit_item"                  => "Ubah Genre",
			"view_item"                  => "Lihat Genre",
			"update_item"                => "Perbarui Genre",
			"add_new_item"               => "Tambah Genre Baru",
			"new_item_name"              => "Nama Genre Baru",
			"parent_item"                => "Induk Genre",
			"parent_item_colon"          => "Induk Genre:",
			"search_items"               => "Cari Genre",
			"popular_items"              => "Genre Populer",
			"separate_items_with_commas" => "Batasi Genre dengan Koma",
			"add_or_remove_items"        => "Tambah atau Hapus Genre",
			"choose_from_most_used"      => "Pilih dari yang paling sering digunakan",
			"not_found"                  => "Tidak ada"
		),
		"public"             => true,
		"publicly_queryable" => true,
		"show_ui"            => true,
		"show_in_menu"       => true,
		"show_in_nav_menus"  => true,
		"show_tagcloud"      => true,
		"show_in_quick_edit" => true,
		"show_admin_column"  => false,
		"hierarchical"       => false,
		"query_var"          => true,
		"sort"               => true,
        'rewrite' => array( 'slug' => 'genre', 'with_front' => false )
	));
	register_taxonomy("type", "anime", array(
		"labels"             => array(
			"name"                       => "Type",
			"singular_name"              => "Type",
			"menu_name"                  => "Type",
			"all_items"                  => "Semua Type",
			"edit_item"                  => "Ubah Type",
			"view_item"                  => "Lihat Type",
			"update_item"                => "Perbarui Type",
			"add_new_item"               => "Tambah Type Baru",
			"new_item_name"              => "Nama Type Baru",
			"parent_item"                => "Induk Type",
			"parent_item_colon"          => "Induk Type:",
			"search_items"               => "Cari Type",
			"popular_items"              => "Type Populer",
			"separate_items_with_commas" => "Batasi Type dengan Koma",
			"add_or_remove_items"        => "Tambah atau Hapus Type",
			"choose_from_most_used"      => "Pilih dari yang paling sering digunakan",
			"not_found"                  => "Tidak ada"
		),
		"public"             => true,
		"publicly_queryable" => true,
		"show_ui"            => true,
		"show_in_menu"       => true,
		"show_in_nav_menus"  => true,
		"show_tagcloud"      => true,
		"show_in_quick_edit" => true,
		"show_admin_column"  => false,
		"hierarchical"       => false,
		"query_var"          => true,
		"sort"               => true,
        'rewrite' => array( 'slug' => 'type', 'with_front' => false )
	));
	register_taxonomy("season", "anime", array(
		"labels"             => array(
			"name"                       => "Season",
			"singular_name"              => "Season",
			"menu_name"                  => "Season",
			"all_items"                  => "Semua Season",
			"edit_item"                  => "Ubah Season",
			"view_item"                  => "Lihat Season",
			"update_item"                => "Perbarui Season",
			"add_new_item"               => "Tambah Season Baru",
			"new_item_name"              => "Nama Season Baru",
			"parent_item"                => "Induk Season",
			"parent_item_colon"          => "Induk Season:",
			"search_items"               => "Cari Season",
			"popular_items"              => "Season Populer",
			"separate_items_with_commas" => "Batasi Season dengan Koma",
			"add_or_remove_items"        => "Tambah atau Hapus Season",
			"choose_from_most_used"      => "Pilih dari yang paling sering digunakan",
			"not_found"                  => "Tidak ada"
		),
		"public"             => true,
		"publicly_queryable" => true,
		"show_ui"            => true,
		"show_in_menu"       => true,
		"show_in_nav_menus"  => true,
		"show_tagcloud"      => true,
		"show_in_quick_edit" => true,
		"show_admin_column"  => false,
		"hierarchical"       => false,
		"query_var"          => true,
		"sort"               => true,
        'rewrite' => array( 'slug' => 'season', 'with_front' => false )
	));
	register_taxonomy("producer", "anime", array(
		"labels"             => array(
			"name"                       => "Producer",
			"singular_name"              => "Producer",
			"menu_name"                  => "Producer",
			"all_items"                  => "Semua Producer",
			"edit_item"                  => "Ubah Producer",
			"view_item"                  => "Lihat Producer",
			"update_item"                => "Perbarui Producer",
			"add_new_item"               => "Tambah Producer Baru",
			"new_item_name"              => "Nama Producer Baru",
			"parent_item"                => "Induk Producer",
			"parent_item_colon"          => "Induk Producer:",
			"search_items"               => "Cari Producer",
			"popular_items"              => "Producer Populer",
			"separate_items_with_commas" => "Batasi Producer dengan Koma",
			"add_or_remove_items"        => "Tambah atau Hapus Producer",
			"choose_from_most_used"      => "Pilih dari yang paling sering digunakan",
			"not_found"                  => "Tidak ada"
		),
		"public"             => true,
		"publicly_queryable" => true,
		"show_ui"            => true,
		"show_in_menu"       => true,
		"show_in_nav_menus"  => true,
		"show_tagcloud"      => true,
		"show_in_quick_edit" => true,
		"show_admin_column"  => false,
		"hierarchical"       => false,
		"query_var"          => true,
		"sort"               => true,
        'rewrite' => array( 'slug' => 'producer', 'with_front' => false )
	));
}
add_action("after_setup_theme", "CukStudio_Setup");