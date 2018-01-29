<?php $aired = get_post_meta( get_the_ID(), 'smoke-aired', true );
 $years = explode(" ",$aired);
 $years_final = $years[2];
?>
<div class="anime">
    <div class="cover">
        <a href="<?php the_permalink()?>">
            <?php if ( has_post_thumbnail() ) { ?>
<?php the_post_thumbnail('thumb', array( 'title' => get_the_title() )); ?>
<?php } else { ?>
<img src="<?php echo get_template_directory_uri(); ?>/inc/img/noimage.jpg" title="<?php the_title(); ?>" />
<?php } ?>
        </a>
        <span class="score"><?php $meta = get_post_meta( get_the_ID(), 'smoke-score', true ); echo $meta; ?>
            <svg viewBox="0 0 24 24">
                <path d="M12,17.27L18.18,21L16.54,13.97L22,9.24L14.81,8.62L12,2L9.19,8.62L2,9.24L7.45,13.97L5.82,21L12,17.27Z"></path>
            </svg>
        </span>
    </div>
    <div class="info">
        <a href="<? the_permalink()?>" class="title">
            <div class="limit"><?php the_title(); ?></div>
        </a>
        <p class="year"><?php echo $years_final?> - <?php
echo get_the_term_list($post->ID, 'type', '', ', ', '');
?></p>
    </div>
</div>



