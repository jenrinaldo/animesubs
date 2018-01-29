<?php get_header(); ?>
<div class="venser-watch">
<div class="venutama">

<?php
$nilai = $_SERVER['REQUEST_URI'];
$exp=explode('?',$nilai);
$nama = $exp[1];
$namabaru = str_replace("-"," ", $nama);
?>
<div class='jdlr'><h1><?php echo the_title()." ".$namabaru; ?></div>

<?php get_template_part('parts/c-single'); ?>
<div class="clear"></div>
<?php get_template_part('parts/c-related'); ?>



<div class="commentarea">
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<?php echo get_post_meta($post->ID, "embed", true); ?>
<?php comments_template(); ?>
<?php endwhile; endif; ?>
</div>

</div>
</div>
</div>
<?php get_sidebar(); ?>
</div>


<?php get_footer(); ?>