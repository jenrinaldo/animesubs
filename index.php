<?php get_header(); ?>
<div class='menu-wrap'>
<div class="rseries">
<div class="rvads"><h1><span>Latest Update</span><span class="list-style-buttons">
     <a href="#" id="list" class="switcher active"><i class="fa fa-list"></i>
            </a><a href="#" id="grid" class="switcher"><i class="fa fa-th"></i></a></span><span><a href=/anime-list/>View More</a></span></h1></div>

<div class="rapi">
<div class="venz">
            <div class = "cvf_pag_loading">
                <div id="products" class = "cvf_universal_container">
                </div>
            </div>
<script>
    jQuery(document).ready(function(n) {
         var a = "<?php echo admin_url('admin-ajax.php'); ?>";
     function c(c) {
         n(".cvf_pag_loading").fadeIn().css("background", "#ccc");
         var i = {
             page: c,
             action: "demo-pagination-load-posts",
         };
         n.post(a, i, function(a) {
             n(".cvf_universal_container").html(a), n(".cvf_pag_loading").css({
                 background: "none",
                 transition: "all 1s ease-out"
             })
         })
     }
     c(1), n(".cvf_universal_container .cvf-universal-paginations li.active").live("click", function() {
         c(n(this).attr("p"))
     })
 });
</script>
</div>

</div></div>
<div class="clear"></div>

<div class="rvads"><h1><span>Recomended Anime</span><span><a href=/anime-list/>View More</a></span></h1></div>
<div class="rapi">
<div class="venz">
<?php
	$recent = array(
		'post_type' => 'anime',
		'showposts' => 6,
		'orderby' => 'rand'
	);
	$wp_query = null;
	$wp_query = new WP_Query();
	$wp_query->query($recent);
	while ($wp_query->have_posts()):
		$wp_query->the_post();
		include (TEMPLATEPATH . '/grid.php');

	endwhile; ?>
					   </div>
				    </div>
				<!--//movies-->
<div class="clear"></div>
</div>
<?php get_sidebar(); ?>
<!-- Widget bottom -->
</div>
<style>
.list-style-buttons{
    float: right;
    overflow: hidden;
    display: inline-block;
    padding: 0px 5px;
    margin: auto;
    background: #EB3349;
    background: -webkit-linear-gradient(to right,rgba(212,17,103,0.01) 6%,#eb3349 200%);
    background: linear-gradient(to right,rgba(212,17,103,0.01) 6%,#eb3349 200%);
}
.switcher i {
    color:#fff;
}
.glyphicon { margin-right:5px; }
.thumbnail
{
    margin-bottom: 20px;
    padding: 0px;
    -webkit-border-radius: 0px;
    -moz-border-radius: 0px;
    border-radius: 0px;
}

.item.list-group-item
{
    float: none;
    width: 100%;
    background-color: #fff;
    margin-bottom: 10px;
}
.item.list-group-item:nth-of-type(odd):hover,.item.list-group-item:hover
{
    background: #428bca;
}

.item.list-group-item .list-group-image
{
    margin-right: 10px;
}
.item.list-group-item .thumbnail
{
    margin-bottom: 0px;
}
.item.list-group-item .caption
{
    padding: 9px 9px 0px 9px;
}
.item.list-group-item:nth-of-type(odd)
{
    background: #eeeeee;
}

.item.list-group-item:before, .item.list-group-item:after
{
    display: table;
    content: " ";
}

.item.list-group-item img
{
    float: left;
}
.item.list-group-item:after
{
    clear: both;
}
.list-group-item-text
{
    margin: 0 0 11px;
}

</style>

</div>
<?php get_footer(); ?>