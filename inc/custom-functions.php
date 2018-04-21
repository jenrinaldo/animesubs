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
				'id' => $prefix . 'bd',
				'name' => esc_html__( 'BD', 'metabox-online-generator' ),
				'type' => 'checkbox',
				'desc' => esc_html__( 'BD', 'metabox-online-generator' ),
			),
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
				"id" => "current-episode",
				"type" => "text",
				"name" => esc_html__( "Episode Sekarang", "cstudio" ),
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
				array(
				'name'  => __( 'API Video Data', 'meta-box' ),
				'id'    => "{$prefix}data",
				'desc'  => __( 'Data Link From API'),
				'type'  => 'textarea'
			),
         )
			
);
	return $meta_boxes;
}

function your_prefix_get_meta_box( $meta_boxes ) {
	$prefix = 'prefix-';

	$meta_boxes[] = array(
		'id' => 'dlmetabox',
		'title' => esc_html__( 'Metabox Download', 'metabox-online-generator' ),
		'post_types' => 'anime',
		'context' => 'advanced',
		'priority' => 'default',
		'autosave' => false,
		'fields' => array(
			array(
				'id' => $prefix . 'link',
				'type' => 'fieldset_text',
				'name' => esc_html__( 'Link Download', 'metabox-online-generator' ),
				'desc' => esc_html__( 'Link Download', 'metabox-online-generator' ),
				'rows' => 4,
				'options' => array(
					'Episode' => 'Episode = Eps berapa, Batch = Batch, Movie = Movie',
					'720p' => '720p',
					'480p' => '480p',
					'360p' => '360p',
					'240p' => '240p',
				),
				'clone' => true,
				'add_button' => esc_html__( 'Download', 'metabox-online-generator' ),
				'attributes' => array(
					'Movie' => 'Movie',
				),
			),
		),
	);

	return $meta_boxes;
}
add_filter( 'rwmb_meta_boxes', 'your_prefix_get_meta_box' );

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
    add_action("admin_enqueue_scripts", "CukStudio_MyAnimeList_API");
    add_action("admin_enqueue_scripts", "CukStudio_Gogoanime_API");
    add_action("admin_enqueue_scripts", "slider");
	add_theme_support("post-thumbnails");
	add_theme_support("title-tag");
}
add_action("after_setup_theme", "CukStudio_Setup");