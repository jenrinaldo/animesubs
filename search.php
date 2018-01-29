<?php get_header(); ?>

<div class="venser">

<div class="rvad"><h1><span>Search Results</span></h1></div>
<div class="rapi">
<div class="venz">
<ul>
<?php if (have_posts()) : ?>
<?php while ( have_posts() ) : the_post(); ?>
<?php include (TEMPLATEPATH . '/parts/c-archive.php'); ?>
<?php endwhile; endif; ?>
</ul>

</div>
</div>
<div class="clear"></div>
<div class="pagination">
<?php pagenavi(); ?>
</div>

</div>
</div>

<?php get_footer(); ?>