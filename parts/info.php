<?php $meta = get_post_meta( get_the_ID(), 'smoke_series', true ); $post = get_post($meta); setup_postdata($post); ?>
<div class="zeeb">
<?php if ( has_post_thumbnail() ) { ?>
<?php the_post_thumbnail('thumb', array( 'title' => get_the_title() )); ?>
<?php } else { ?>
<img src="<?php echo get_template_directory_uri(); ?>/inc/img/noimage.jpg" />
<?php } ?>

<h2><?php the_title(); ?> <span style='color:#c74242;float:right;'>#<?php $meta = get_post_meta( get_the_ID(), 'jensan-score', true ); echo $meta; ?></span> </h2>
<div class='is'>
<span style='color: #fff;background: #ff5d5d;padding: 4px;font-size: 13px;'><?php $meta = get_post_meta(get_the_ID(), 'jensan-episodes', true); echo $meta; ?></span>
<span style='color: #fff;background: #ff6f2b;padding: 4px;font-size: 13px;'><?php $meta = get_post_meta(get_the_ID(), 'jensan-status', true); echo $meta; ?></span>
<span style='color: #fff;background: #77bf18;padding: 4px;font-size: 13px;'><?php
echo get_the_term_list($post->ID, 'genre', '', ', ', '');
?></span>
<span style='color: #fff;background: #259cf1;padding: 4px;font-size: 13px;'><?php
echo get_the_term_list($post->ID, 'season', '', ', ', '');
?></span>
<?php the_excerpt(); ?>

<span style='position: relative;top:5px;color: #fff;background: #4278c7;padding: 4px;font-size: 13px;'><a href="<?php the_permalink(); ?>" title='all episodes'>Info Lengkapnya</a></span>
</div>
</div>
<?php wp_reset_postdata(); ?>