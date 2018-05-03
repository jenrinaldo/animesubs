<?php get_header(); ?>
<div class='menu-wrap'>
    <div class="rseries">
        <div class="rvads">
            <h1>
                <span>Latest Update</span>
                <span class="list-style-buttons">
                    <a href="#" v-tooltip.top="'List View'" id="list" class="switcher active">
                        <i class="fas fa-list"></i>
                    </a>
                    <a href="#" v-tooltip.top="'Grid View'" id="grid" class="switcher">
                        <i class="fas fa-th"></i>
                    </a>
                </span>
                <span>
                    <a href=/anime-list/>View More</a>
                </span>
            </h1>
        </div>
        <div class="rapi" itemtype="//schema.org/Blog">
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
        <template v-for="post in posts">
        <div class="gridmode">
    <div class="grid-thumb">
    <a v-tooltip.top="post.title.rendered" :href="post.link">
        <div class="grid-thumbz">
            <div class="darken"></div>
            <img :src="getThumbnail(post)" v-if="hasThumbnail(post)" class="img-fluid" v-bind:title="post.title.rendered" v-bind:alt="post.title.rendered"/>
            <div v-else><img src="http://127.0.0.1/wp-content/themes/animesubs/inc/img/noimage.jpg"></div>
            <svg viewBox="0 0 24 24"><path d="M8,5.14V19.14L19,12.14L8,5.14Z"></path></svg>
        </div>
        </a>
        </div>
    <div class="text">
        <a v-tooltip.top="post.title.rendered" class="judul" :href="post.link" v-html="post.title.rendered">
        <h2 class='grid-tl' v-html="post.title.rendered"> </h2>
        </a>
    </div>
</div>
                </template>
		</div>
    </div>
    <div class="clear"></div>
</div>
<?php get_sidebar(); ?>
</div>
</div>
<?php get_footer(); ?>