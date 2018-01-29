<?php
/*
Template Name: Ongoing Series
*/

get_header(); ?>

<div class="venser"> 
<div class='breadcrumbs'>
<?php if ( function_exists('yoast_breadcrumb') ) {
yoast_breadcrumb('<div id="breadcrumbs">','</div>');
} ?></div>
<div class='jdlr'><h1><?php the_title(); ?></div>
<div class="rapi">
<div class="venz">
<ul>
<?php
$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
$myposts = array(
    'showposts' => 51,
    'post_type' => 'anime',
    'meta_key' => 'smoke-status', 
    'meta_value' => 'Currently Airing',
    'orderby' => 'title',
    'paged' => $paged,
);
$wp_query= null;
$wp_query = new WP_Query();
$wp_query->query($myposts);
?>
<?php while ($wp_query->have_posts()) : $wp_query->the_post(); ?> 
<?php include (TEMPLATEPATH . '/parts/archive.php'); ?>
<?php endwhile; ?>
</ul>

</div>
</div>
<div class="clear"></div>

<div class="pagination">
<?php wp_pagenavi(); ?>
</div>

</div>

<?php get_footer(); ?>
