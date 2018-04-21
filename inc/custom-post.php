<?php
add_action( 'init', 'anime' );
  function anime() {
  	$labels = array(
  		'name'               => _x( 'Anime', 'post type general name', 'text_domain' ),
  		'singular_name'      => _x( 'Anime', 'post type singular name', 'your-plugin-textdomain' ),
  		'menu_name'          => _x( 'Anime', 'admin menu', 'your-plugin-textdomain' ),
  		'name_admin_bar'     => _x( 'Anime', 'add new on admin bar', 'your-plugin-textdomain' ),
  		'add_new'            => _x( 'Add New', 'anime', 'your-plugin-textdomain' ),
  		'add_new_item'       => __( 'Add New Anime', 'your-plugin-textdomain' ),
  		'new_item'           => __( 'New Anime', 'your-plugin-textdomain' ),
  		'edit_item'          => __( 'Edit Anime', 'your-plugin-textdomain' ),
  		'view_item'          => __( 'View Anime', 'your-plugin-textdomain' ),
  		'all_items'          => __( 'All Anime', 'your-plugin-textdomain' ),
  		'search_items'       => __( 'Search Anime', 'your-plugin-textdomain' ),
  		'parent_item_colon'  => __( 'Parent Anime:', 'your-plugin-textdomain' ),
  		'not_found'          => __( 'No anime found.', 'your-plugin-textdomain' ),
  		'not_found_in_trash' => __( 'No anime found in Trash.', 'your-plugin-textdomain' )
  	);
  
  	$args = array(
  		'labels'             => $labels,
  		'description'        => __( 'Description.', 'your-plugin-textdomain' ),
  		'public'             => true,
  		'publicly_queryable' => true,
  		'show_ui'            => true,
  		'show_in_menu'       => true,
  		'query_var'          => true,
  		'rewrite'            => array( 'slug' => 'anime' ),
  		'capability_type'    => 'post',
  		'has_archive'        => true,
  		'hierarchical'       => false,
  		'menu_position'      => null,
  		'show_in_rest'       => true,
  		'rest_base'          => 'anime-api',
  		'rest_controller_class' => 'WP_REST_Posts_Controller',
  		'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' )
  	);
  
  	register_post_type( 'anime', $args );
}
add_action( 'init', 'my_book_taxonomy', 30 );
function my_book_taxonomy() {
 
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
		'show_in_rest'          => true,
        'rest_base'             => 'genre',
        'rest_controller_class' => 'WP_REST_Terms_Controller',
        'rewrite' => array( 'slug' => 'genre', 'with_front' => false )
	));
	register_taxonomy("tipe", "anime", array(
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
		'show_in_rest'          => true,
        'rest_base'             => 'tipe',
        'rest_controller_class' => 'WP_REST_Terms_Controller',
        'rewrite' => array( 'slug' => 'tipe', 'with_front' => false )
	));
		register_taxonomy("series", "anime", array(
		"labels"             => array(
			"name"                       => "Series",
			"singular_name"              => "Series",
			"menu_name"                  => "Series",
			"all_items"                  => "Semua Series",
			"edit_item"                  => "Ubah Series",
			"view_item"                  => "Lihat Series",
			"update_item"                => "Perbarui Series",
			"add_new_item"               => "Tambah Series Baru",
			"new_item_name"              => "Nama Series Baru",
			"parent_item"                => "Induk Series",
			"parent_item_colon"          => "Induk Series:",
			"search_items"               => "Cari Series",
			"popular_items"              => "Series Populer",
			"separate_items_with_commas" => "Batasi Series dengan Koma",
			"add_or_remove_items"        => "Tambah atau Hapus Series",
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
		'show_in_rest'          => true,
        'rest_base'             => 'series',
        'rest_controller_class' => 'WP_REST_Terms_Controller',
        'rewrite' => array( 'slug' => 'series', 'with_front' => false )
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
		'show_in_rest'          => true,
        'rest_base'             => 'season',
        'rest_controller_class' => 'WP_REST_Terms_Controller',
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
		'show_in_rest'          => true,
        'rest_base'             => 'producer',
        'rest_controller_class' => 'WP_REST_Terms_Controller',
        'rewrite' => array( 'slug' => 'producer', 'with_front' => false )
	));
 
}

?>