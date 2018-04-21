<?php get_header(); ?>

<div class="venser">

<div class="rvads"><h1><span><?php single_tag_title(); ?></span></h1></div>
<div class="rapi">
<div class="venz">
<ul>
<?php 
$nama = single_term_title("", false);
$fix = strtolower($nama);
      $args = array( 
        'post_type' => 'anime',
        'tax_query' => array(
                array(
                        'taxonomy' => 'genre',
                        'field' => 'name',
                        'terms' => $fix
                ),
        ),
);


// The Query
$query = new WP_Query( $args );
        if($query->have_posts()):while($query->have_posts()):$query->the_post(); ?>
              <?php include (TEMPLATEPATH . '/grid.php'); ?>
   <?php

        endwhile;
        endif;
   ?>
</ul>

</div>
</div>
<div class="clear"></div>
<div class="pagination">
<?php wp_pagenavi(); ?>
</div>

</div>

<?php get_sidebar(); ?>
</div>

<?php get_footer(); ?>