<?php
// post type anime
function anime() {

	$labels = array(
		'name'                => _x( 'Anime', 'Post Type General Name', 'text_domain' ),
		'singular_name'       => _x( 'Anime', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'           => __( 'Anime Index', 'text_domain' ),
		'name_admin_bar'      => __( 'Anime', 'text_domain' ),
		'parent_item_colon'   => __( 'Parent Anime :', 'text_domain' ),
		'all_items'           => __( 'All Anime', 'text_domain' ),
		'add_new_item'        => __( 'Add New Anime', 'text_domain' ),
		'add_new'             => __( 'Add New', 'text_domain' ),
		'new_item'            => __( 'New Anime', 'text_domain' ),
		'edit_item'           => __( 'Edit Anime', 'text_domain' ),
		'update_item'         => __( 'Update Anime', 'text_domain' ),
		'view_item'           => __( 'View Anime', 'text_domain' ),
		'search_items'        => __( 'Search Anime', 'text_domain' ),
		'not_found'           => __( 'Not found', 'text_domain' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'text_domain' ),
	);
	$args = array(
		'label'               => __( 'Anime', 'text_domain' ),
		'description'         => __( 'Anime', 'text_domain' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor', 'thumbnail','comments'),
		'taxonomies'          => array( 'genres', 'season','type','producer'),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'menu_position'       => 6,
		'menu_icon'           => 'dashicons-list-view',
		'show_in_admin_bar'   => true,
		'show_in_nav_menus'   => true,
		'can_export'          => true,
		'has_archive'         => true,		
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'post',
	);
	register_post_type( 'anime', $args );

}
add_action( 'init', 'anime');
// Fake pages' permalinks and titles
    $my_fake_pages = array(
        'watch' => 'Watch'
    );
    add_filter('rewrite_rules_array', 'fsp_insertrules');
    add_filter('query_vars', 'fsp_insertqv');
     
    // Adding fake pages' rewrite rules
    function fsp_insertrules($rules)
    {
        global $my_fake_pages;
     
		$newrules = array();
		foreach ($my_fake_pages as $slug => $title)
			$newrules['anime/([^/]+)/' . $slug . '/?$'] = 'index.php?anime=$matches[1]&fpage=' . $slug;
     
        return $newrules + $rules;
    }
     
    // Tell WordPress to accept our custom query variable
    function fsp_insertqv($vars)
    {
        array_push($vars, 'fpage');
        return $vars;
    }

    // Remove WordPress's default canonical handling function
	
    remove_filter('wp_head', 'rel_canonical');
    add_filter('wp_head', 'fsp_rel_canonical');
    function fsp_rel_canonical()
    {
        global $current_fp, $wp_the_query;
     
        if (!is_singular())
            return;
     
        if (!$id = $wp_the_query->get_queried_object_id())
            return;
     
        $link = trailingslashit(get_permalink($id));
     
        // Make sure fake pages' permalinks are canonical
        if (!empty($current_fp))
            $link .= user_trailingslashit($current_fp);
     
        echo '<link rel="canonical" href="'.$link.'" />';
    }

/* Yoast Canonical Removal from Book pages */
add_filter( 'wpseo_canonical', 'wpseo_canonical_exclude' );

function wpseo_canonical_exclude( $canonical ) {
		global $post;
		if (is_singular('anime')) {
    		$canonical = false;
    }
	return $canonical;
}

