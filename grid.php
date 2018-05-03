<div class="gridmode">
    <div class="grid-thumb">
        <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
        <div class="grid-thumbz">
            <div class="darken"></div>
            <?php
            if ( has_post_thumbnail() ) { ?>
                <?php the_post_thumbnail('thumb', array( 'title' => get_the_title() )); ?>
                <?php } else { ?>
                <img src="<?php echo get_template_directory_uri(); ?>/inc/img/noimage.jpg" title="<?php the_title(); ?>" />
                <?php } ?>
            <svg viewBox="0 0 24 24"><path d="M8,5.14V19.14L19,12.14L8,5.14Z"></path></svg>
        </div>
        </a>
    </div>
    <div class="text">
        <a v-tooltip.top="'<?php the_title(); ?>'" class="judul" href='<?php  the_permalink(); ?>'>
        <h2 class='grid-tl'> <?php the_title(); ?></h2>
        </a>
    </div>
</div>
<?php wp_reset_postdata(); ?>
