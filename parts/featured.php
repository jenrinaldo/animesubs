<?php
$myposts = array(
    'showposts' => 5,
    'post_type' => 'anime',
    'orderby' => 'rand',
);
$wp_query= null;
$wp_query = new WP_Query();
$wp_query->query($myposts);
?>
<?php while ($wp_query->have_posts()) : $wp_query->the_post(); ?> 
<div class='bgs'>
<div class='thumbnel'>
<?php if ( has_post_thumbnail() ) { ?>
<?php the_post_thumbnail('thumb', array( 'title' => get_the_title() )); ?>
<?php } else { ?>
<img src="<?php echo get_template_directory_uri(); ?>/inc/img/noimage.jpg" title="<?php the_title(); ?>" />
<?php } ?>
</div>
<div class='tts'>
<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
</div>
</div>

<?php endwhile; ?>
<?php wp_reset_query(); ?>