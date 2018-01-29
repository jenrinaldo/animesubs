<?php get_header();
$current_fp = get_query_var('fpage'); ?>
<style>
.morectnt span{display:None;}
.venser{width:100%;float:none;}
</style>
<div class="venser">
<?php  if ($current_fp == 'watch') {
			get_template_part('watch');
			} else { ?>
            <?php get_template_part('parts/dbanime'); ?>
            </div>
<?php }; ?>

<div style="margin-top:10px;"></div>

<div class="venutama">

</div>
</div>
<?php get_footer(); ?>