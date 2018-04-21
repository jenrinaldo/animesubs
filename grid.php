<div class="gridmode">
<div class="grid-thumb">
<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
<div class="grid-thumbz">
<div class="darken"></div>
    <?php
$imageid = MultiPostThumbnails::get_post_thumbnail_id('anime', 'cover-image', $post->ID,'thumb'); 
$imageurl = wp_get_attachment_image_src($imageid,'thumb'); if($imageid){ 
    $str = $imageurl[0];
    echo "<img src='".$str."' title='".$post->post_title."' alt='".$post->post_title."'width='400' height='225'>"; }else { 
    echo "<img src='".get_stylesheet_directory_uri()."/inc/img/noimage.jpg' title='".$post->post_title."' alt='".$post->post_title."'width='350' height='180'>"; } 
?>
    <svg viewBox="0 0 24 24"><path d="M8,5.14V19.14L19,12.14L8,5.14Z"></path></svg>

</a>
</div>
</div>
<div class="text">
<a class="judul" href='<?php  the_permalink(); ?>'>
<h2 class='grid-tl'> <?php the_title(); ?></h2>
</a>
</div>
</div>
<?php wp_reset_postdata(); ?>
