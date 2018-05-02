<div class="ep">
<h2 class='rel'><i class='fas fa-check-square-o'></i> Related Anime</h2>
<ul>
<?php $chap = get_the_ID($post->ID, "drama", true); ?>
<?php
$cukchap = new WP_Query(array(
'showposts' => '10',
'post_type' => 'anime',
'orderby' => 'rand',
));
?>
<?php
while ($cukchap->have_posts()):
$cukchap->the_post();
?>
<li>
<div class='related'>
<a href="<?php the_permalink() ?>" class="anime-rel" rel="<?php the_id();?>">
    <div class="darken"></div>
<?php
$imageid = MultiPostThumbnails::get_post_thumbnail_id('anime', 'depan-image', $post->ID,'thumb'); 
$imageurl = wp_get_attachment_image_src($imageid,'thumb'); if($imageid){
$str = $imageurl[0];
    echo "<img src='".$str."' title='".$post->post_title."' alt='".$post->post_title."'width='350' height='496'>"; }else { ?>
				<img src="<?php echo get_template_directory_uri(); ?>/inc/img/noimage.jpg" title="<?php the_title(); ?>" class="img-responsive" alt=" "width='350' height='180' />
<?php } ?>

<div class="jds"><h2><?php the_title(); ?></h2></div>
</a>
</div>
</li>
<?php endwhile; ?>
<?php wp_reset_query(); ?>
</ul>
</div>

<div class="tagpost">
<span itemprop="keywords"><?php the_title(); ?> Sub Eng</span> , <span itemprop="keywords"><?php the_title(); ?> English Sub</span> , <span itemprop="keywords"><?php the_title(); ?> 480p 720p 360p</span> , <span itemprop="keywords"><?php the_title(); ?> Mp4 Sub English</span> , <span itemprop="keywords"><?php the_title(); ?> HD Sub English</span> , <span itemprop="keywords"><?php the_title(); ?> Subtitle English</span> , <span itemprop="keywords"><?php the_title(); ?> Subtitle English</span>
</div>