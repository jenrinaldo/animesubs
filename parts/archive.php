<?php $aired = get_post_meta( $post->ID, 'smoke-aired', true );
 $years = explode(" ",$aired);
 $years_final = $years[2];
 setup_postdata($post->ID);
?>
<div class="anime">
    <div class="cover">
        <a href="<?php echo get_permalink($post->ID);?>">
<?php
$imageid = MultiPostThumbnails::get_post_thumbnail_id('anime', 'depan-image', $post->ID,'thumb'); 
$imageurl = wp_get_attachment_image_src($imageid,'thumb'); if($imageid){ 
    echo "<img src='".$imageurl[0]."' title='".$post->post_title."' alt='".$post->post_title."'width='350' height='496'>"; }else { ?>
<img src="//<?php echo get_template_directory_uri(); ?>/inc/img/noimage.jpg" title="<?php echo $post->post_title; ?>"alt=" "width='350' height='180' />

<?php } ?>
        </a>
        <span class="score"><?php $meta = get_post_meta( $post->ID, 'smoke-score', true ); echo $meta; ?>
            <svg viewBox="0 0 24 24">
                <path d="M12,17.27L18.18,21L16.54,13.97L22,9.24L14.81,8.62L12,2L9.19,8.62L2,9.24L7.45,13.97L5.82,21L12,17.27Z"></path>
            </svg>
        </span>
    </div>
    <div class="info">
        <a href="<?php echo get_permalink($post->ID);?>" class="title">
            <div class="limit"><?php echo $post->post_title; ?></div>
        </a>
        <p class="year"><?php echo $years_final?> - <?php
echo get_the_term_list($post->ID, 'type', '', ', ', '');
?></p>
    </div>
</div>



