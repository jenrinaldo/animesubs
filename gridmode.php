<?php wp_reset_postdata();?>
<?php 
$meta_embed = get_post_meta( $post->ID, 'smoke_embed', true );
$meta_embed_length = sizeof($meta_embed);
$currLength = $meta_embed_length-1;
$EpsNow = explode(" ",$meta_embed[$currLength]);
$EpsNum = $EpsNow[1];
$nama = wp_get_object_terms( $post->ID, 'tipe', array( 'fields' => 'names' ) );
$nama = array_pop($nama);
?>
<div class="item list">
<div class="grid-thumb">
<a href="<?php echo get_home_url().'/anime/'.$post->post_name; ?>" title="<?php the_title(); ?>">
<div class="grid-thumbz">
<div class="darken"></div>
<span class='time'><?php echo $nama; ?></span>
<?php if( date('U') - get_the_modified_time('U', $post->ID) < 24*60*60 ) : ?><span class='new'>New</span><?php endif; ?>
    <?php
$imageid = MultiPostThumbnails::get_post_thumbnail_id('anime', 'cover-image', $post->ID,'thumb'); 
$imageurl = wp_get_attachment_image_src($imageid,'thumb'); if($imageid){ 
    $str = $imageurl[0];
    echo "<img src='".$str."' title='".$post->post_title."' alt='".$post->post_title."'width='400' height='225'>"; }else { 
    echo "<img src='".get_stylesheet_directory_uri()."/inc/img/noimage.jpg' title='".$post->post_title."' alt='".$post->post_title."'width='350' height='180'>"; } 
?>
    <svg viewBox="0 0 24 24"><path d="M8,5.14V19.14L19,12.14L8,5.14Z"></path></svg>
<?php wp_reset_postdata(); ?>
</a>
</div>
</div>
<div class="text">
<a class="judul" href='<?php  echo get_permalink($post->ID); ?>'>
<h2 class='grid-tl'> <?php echo $post->post_title; ?></h2>
<span class="grid-eps">
Ep. <?php echo $EpsNum ?>
</span>
</a>
</div>
<div class="info">
<ul>
<li><b><span class="fa fa-clock-o"></span> Date : </b> <?php echo get_the_time('d F Y', $post->ID); ?></li>
<li><b><span class="fa fa-comments-o"></span> Comment  : </b> <?php comments_number( __( '0', 'blank' ), __( '1', 'blank' ), __( '%', 'blank' ), 'comments-link', __('-', 'blank')); ?></li>
<li class="category"><b><span class="fa fa-tags"></span> Category : </b> <?php echo get_the_term_list($post->ID, 'genre', '', ', ', ''); ?></li>
<li class="status"><b><span class="fa fa-info-circle"></span> Status : </b><?php echo get_post_meta( $post->ID, 'smoke-status', true );?></li>
<li class="series"><b><span class="fa fa-th-list"></span> Series : </b> <?php echo get_the_term_list($post->ID,'series','','<span class="batasanseries">|</span>',''); ?></li>
</ul>
</div>
</div>	
