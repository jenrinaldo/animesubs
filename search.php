<?php get_header();?>

<div class="venser">
    <div class="rvads">
        <h1>
            <span>Search Results</span>
        </h1>
    </div>
    <div class="rapi">
        <div class="venz">
            <ul>
                <?php if (have_posts()): while (have_posts()): the_post();
                include TEMPLATEPATH . '/gridmode.php';
            endwhile;
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
<?php get_sidebar();?>
</div>
<?php get_footer();?>