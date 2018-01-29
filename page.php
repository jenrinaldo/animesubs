<?php get_header(); ?>
<div class="venser">
<div class="venutama">

<div class='breadcrumbs'>
<?php if ( function_exists('yoast_breadcrumb') ) {
yoast_breadcrumb('<div id="breadcrumbs">','</div>');
} ?></div>

<div class='jdlr'><h1><?php the_title(); ?></div>
<?php get_template_part('parts/pages'); ?>
<div class="clear"></div>

<div class="commentarea">
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<?php echo get_post_meta($post->ID, "embed", true); ?>
<?php comments_template(); ?>
<?php endwhile; endif; ?>
</div>

</div>
</div>


</div>

<?php get_footer(); ?>