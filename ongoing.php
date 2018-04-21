<?php
/*
Template Name: Ongoing Series
*/

get_header(); ?>

<div class="venser"> 
<div class='jdlr'><h1><?php the_title(); ?></div>
<div class="rapi">
<div class="venz">
<div id="blog">

    <div class="loading"><i v-if="!posts" class="fa fa-spinner fa-spin"></i></div>
<div class="soralist"><ul>
<li v-for="post in posts" v-bind:class="post._embedded['wp:term'][1][0].name">
          <a :href="post.link" target="_blank" class="commit">{{post.title.rendered}}
            </a>
            <i class="fa fa-check"></i>
            </li>
            </ul>
        </div>
            <div class="page-nav">
      <div class="button" v-on:click="currentPage -= 1, posts = null">Prev</div>

      <label>Page : {{ currentPage }}</label>
      <div class="button" v-on:click="currentPage += 1, posts = null">Next</div>
    </div>
      </div>
</div>
</div>
</div>
<?php get_sidebar(); ?>
</div>
<script>
    var blogURL = 'https://animesubs.net/wp-json/wp/v2/anime-api?_embed&per_page=4&page='

var blog = new Vue({
  el: '#blog',
  
  data: {
		currentPage: 1,
		posts: null
	},
  
  watch: {
		currentPage: 'fetchData'
	},

  created: function () {
    this.fetchData()
  },
  
  methods: {
    fetchData: function () {
      var xhr = new XMLHttpRequest()
      var self = this
      xhr.open('GET', blogURL + self.currentPage )
      xhr.onload = function () {
        self.posts = JSON.parse(xhr.responseText)
        console.log(self.posts)
      }
      xhr.send()
    },
    hasThumbnail: function(post) {
      if (post._embedded['wp:featuredmedia'] && post._embedded['wp:featuredmedia'][0].media_details && post._embedded['wp:featuredmedia'][0].media_details.sizes){
      return  post._embedded['wp:featuredmedia'][0].media_details.sizes.medium;}
   },

    getThumbnail: function (post) {
      if (post._embedded['wp:featuredmedia'][0].media_details.sizes.medium.source_url){
      return post._embedded['wp:featuredmedia'][0].media_details.sizes.medium.source_url;
      }
    },

    postContent: function(post){
      return post.content.rendered;
    },
    postExcerpt: function(post){
      return post.excerpt.rendered;
    },
    authorName: function(post){
      if (post._embedded.author[0].name){
     return  post._embedded.author[0].name
      }
    }
  },
   pageUp: function(){
     this.currentPage = this.currentPage+1
     this.posts = null
   }
  
})
</script>
<style>
.thumby {
  height: 310px;
  width: 310px;
  background-color: green;
  overflow:hidden;
}

.post-title {
  height: 60px;
}

.post-excerpt {
  height: 120px;
}

#addPage {
  width: 60px;
  height: 20px;
  background-color: red;
}

.button {
  display: inline-block;
  width: 120 px;
  border: 1px solid black;
  padding: 7px 15px;
  margin: 10px;
}

.button:hover {
  background-color: #efefef;
  cursor: pointer;
}

.loading {
  font-size: 3em;
  color: red;
  position: absolute;
  top: 30%;
  left: 50%;
}

.page-nav {
  width: 50%;
  margin: 0 auto;
}
.soralist ul {
margin: 0;
    padding: 5px;
    margin-top: 10px;
    margin-bottom: 15px;
    overflow: hidden;
    list-style: disc;
    background-color: #f7f7f7;
}
.soralist ul li {
    margin-left: 15px;
    float: left;
    line-height: 21px;
    width: 45%;
}
.soralist ul li a.series {
    color: #333;
}
li.TV {
    color:#41A0FF
}
li.Movie {
    color:#FFA441
}
li.special {
    color:#2EE924
}
li.ova {
    color:#FF41E3
}
li.tvspesial {
    color:#8F4AF0
}
li.tvova {
    color:#F64E4E
}
.warnalist {margin-top:7px;overflow:hidden;}
.warnalist h4 {text-align:center;margin-bottom:7px;}
.warnalist ul {width:101%;}
.warnalist li {float:left;width:32.3%;margin-right:1%;margin-bottom:1%;font-size:13px;text-align:center;height:30px;line-height:30px;font-weight:600;color:#fff;position:relative;cursor:pointer;}
.warnalist li:after {font-family:FontAwesome;content:"\f124";position:absolute;left:0;top:0;width:30px;transition:0.2s;}
.warnalist li:hover:after {background:#eee;}
.warnalist li:nth-child(1){background:#41A0FF}
.warnalist li:nth-child(2){background:#FF41E3}
.warnalist li:nth-child(3){background:#2EE924}
.warnalist li:nth-child(4){background:#FFA441}
.warnalist li:nth-child(5){background:#F64E4E}
.warnalist li:nth-child(6){background:#8F4AF0}
.soralist ul li i{
    margin-left:2px;
    display:none;
}
li.active i{
    display:inline-block!important;
}
   </style>

<?php get_footer(); ?>
