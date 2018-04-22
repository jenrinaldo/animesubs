<?php get_header();?>

<div class="venser">

<div class="rvad">
        <h1>
                <span>
                        <?php single_tag_title();?>
                </span>
        </h1>
</div>
<div class="rapi">
        <div class="venz">
                <ul>
                        <?php
                        if (have_posts()):
                                while (have_posts()): the_post();
                                include TEMPLATEPATH . '/grid.php';
                        endwhile;
                        else:
                                echo '<h3>';
                                _e('No Post Found');
                                echo '</h3>';
                        endif;
                        ?>
                </ul>
        </div>
</div>
<div class="clear"></div>
<div class="pagination">
        <?php pagenavi();?>
</div>
</div>
<?php get_sidebar()?>
</div>

<?php get_footer();?>