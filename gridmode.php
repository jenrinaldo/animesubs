<?php wp_reset_postdata();?>
<?php 
$meta_embed = get_post_meta( $post->ID, 'smoke_embed', true );
$meta_embed_length = sizeof($meta_embed);
$currLength = $meta_embed_length-1;
$EpsNow = explode(" ",$meta_embed[$currLength]);
$EpsNum = $EpsNow[1];
?>
<div class="gridmode">
<div class="grid-thumb">
<a href="<?php echo get_home_url().'/anime/'.$post->post_name.'/watch/?Episode-'.$EpsNum; ?>" title="<?php the_title(); ?>">
<div class="grid-thumbz">
<div class="darken"></div>
<span class='time'><?php $old_date = $post->post_modified;
$new_dates = strtotime($old_date);
echo human_time_diff( $new_dates, current_time( 'timestamp' ) ); ?></span>
<?php if( date('U') - get_the_modified_time('U', $post->ID) < 24*60*60 ) : ?><span class='new'>New</span><?php endif; ?>
    <?php
$imageid = MultiPostThumbnails::get_post_thumbnail_id('anime', 'cover-image', $post->ID,'thumb'); 
$imageurl = wp_get_attachment_image_src($imageid,'thumb'); if($imageid){ 
    echo "<img src='".$imageurl[0]."' title='".$post->post_title."' alt='".$post->post_title."'>"; }else { 
    echo "<img src='".get_stylesheet_directory_uri()."/inc/img/noimage.jpg' title='".$post->post_title."' alt='".$post->post_title."'>"; } 
?>
    <svg viewBox="0 0 24 24"><path d="M8,5.14V19.14L19,12.14L8,5.14Z"></path></svg>
<?php wp_reset_postdata(); ?>
</a>
</div>
</div>
<div class="text">
<a class="judul" href='<?php echo $post->guid; ?>'>
<h2 class='grid-tl'> <?php echo $post->post_title; ?></h2>
<span class="grid-eps">
Ep. <?php echo $EpsNum ?>
</span>
</a>
</div>
</div>	
