<?php get_header(); ?>
<div class='menu-wrap'>
    <div class="rseries">
        <div class="rvads">
            <h1>
                <span>Latest Update</span>
                <span class="list-style-buttons">
                    <a href="#" id="list" class="switcher active">
                        <i class="fa fa-list"></i>
                    </a>
                    <a href="#" id="grid" class="switcher">
                        <i class="fa fa-th"></i>
                    </a>
                </span>
                <span>
                    <a href=/anime-list/>View More</a>
                </span>
            </h1>
        </div>
        <div class="rapi">
            <div class="venz">
                <div class = "index_loading">
                    <div id="products" class = "index_container"></div>
                </div>
            </div>
        </div>
    </div>
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
    <div class="clear"></div>
</div>
<?php get_sidebar(); ?>
</div>
</div>
<?php get_footer(); ?>