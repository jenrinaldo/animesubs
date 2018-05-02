</div>
</div>
<div class="clear"></div>
</div>
<!-- End Wrapper -->
<footer>
	<div class="footer">
		<!-- Footer Widget -->
		<!-- Start About -->
		<div class="about">
			<h5>
				<span class="fas fa-question"></span> About 
			</h5>
			<p>
				<?php echo bloginfo('name'); ?> - Sebuah 
				<b>Fanshare</b> tempat download anime gratis subtitle indonesia. Disini kami menyediakan anime dengan format mkv dan mp4. Ada banyak ukuran anime yang dishare disini, yaitu 480p, 720p, 360p, dan kadang kadang 240p.
			</p>
			<div class="clear"></div>
		</div>
		<!-- End About -->
		<div class="footerwidget">
			<h3>
				<span class="fas fa-cog"></span> Recent Anime TV
			</h3>
			<?php $query = new WP_Query( array( 'posts_per_page' => 7,'tax_query' => array ( array ( 'taxonomy' => 'tipe', 'terms' => 'tv', 'field' => 'slug' ) ) ) ); while($query->have_posts()) : $query->the_post(); ?>
			<li>
				<a href="
					<?php the_permalink(); ?>">
					<?php if (( $meta = get_post_meta( get_the_ID(), 'title', true ))) { echo $meta; }else { echo the_title();} ?>
				</a>
			</li>
			<?php endwhile; ?>
		</div>
		<!-- End Footer Widget -->
		<!-- Footer Widget -->
		<div class="footerwidget">
			<h3>
				<span class="fas fa-cog"></span> Recent Anime Movie
			</h3>
			<?php $query = new WP_Query( array( 'posts_per_page' => 7,'tax_query' => array ( array ( 'taxonomy' => 'tipe', 'terms' => 'movie', 'field' => 'slug' ) ) ) ); while($query->have_posts()) : $query->the_post(); ?>
			<li>
				<a href="
					<?php the_permalink(); ?>">
					<?php if (( $meta = get_post_meta( get_the_ID(), 'title', true ))) { echo $meta; }else { echo the_title();} ?>
				</a>
			</li>
			<?php endwhile; ?>
		</div>
		<!-- End Footer Widget -->
		<!-- Footer Widget -->
		<div class="footerwidget">
			<h3>
				<span class="fas fa-cog"></span> Recent Anime OVA
			</h3>
			<?php $query = new WP_Query( array( 'posts_per_page' => 7,'tax_query' => array ( array ( 'taxonomy' => 'tipe', 'terms' => 'ova', 'field' => 'slug' ) ) ) ); while($query->have_posts()) : $query->the_post(); ?>
			<li>
				<a href="
					<?php the_permalink(); ?>">
					<?php if (( $meta = get_post_meta( get_the_ID(), 'title', true ))) { echo $meta; }else { echo the_title();} ?>
				</a>
			</li>
			<?php endwhile; ?>
		</div>
		<!-- End Footer Widget -->
	</div>
</footer>
<div class="credit">
	<div class="credit2">Copyright 
		<span class="fas fa-copyright"></span>
		<a href="
			<?php echo home_url('/'); ?>">
			<?php bloginfo('name'); ?>
		</a> - Design Template By 
		<?php bloginfo('name'); ?>
	</div>
</div>
<?php wp_footer(); ?>
</div>
<style>
  .bg-big { background-image: url(<?php $cover = get_post_meta(get_the_ID(),"jensan-bgcover",true);echo $cover;?>); 
    height: 300px;
    overflow: hidden;
    background-repeat:no-repeat;
    background-size: cover;
    position: relative;
    background-position:50% 5%;
  }
  
</style>
<script type="text/javascript">
    $('.minjs').click(function(){
     $("#alt-title").toggle("slow");
     $(this).find('i').toggleClass('fas fa-caret-left fas fa-caret-down');
     return false;
    
});

</script>
<script type="text/javascript">
            var th_name = 'post_title';
            var ajaxurl = '<?php echo admin_url('admin-ajax.php'); ?>';
            
            function animelist_ajax(page, th_name){
                var post_data = {
                    page: page,
                    th_name: th_name
                };
                
                $('form.post-list input').val(JSON.stringify(post_data));
                var cek = $('form.post-list input').val();
                if(typeof cek!=='undefined'){
                    var data = {
                    action: "animelist_ajax",
                    data: JSON.parse(cek)
                };
                }
                
                
                $.post(ajaxurl, data, function(response) {
                        // If successful Append the data into our html container
                        $(".animelist_container").html(response);
                        // End the transition
                        $(".animelist_page_loading").css({'background':'none', 'transition':'all 1s ease-out'});
                    });
            } 
            
            jQuery(document).ready(function($) {                                                                
                
                // Initialize default item to sort and it's sort order
                
                // Check if our hidden form input is not empty, meaning it's not the first time viewing the page.
                if($('form.post-list input').val()){
                    // Submit hidden form input value to load previous page number
                    data = JSON.parse($('form.post-list input').val());
                    animelist_ajax(data.page, data.th_name);
                } else {
                    // Load first page
                    animelist_ajax(1, 'post_title');
                }
                
                var th_active = $('.table-post-list th.active');
                var th_name = $(th_active).attr('id');
                
                // Pagination Clicks                    
                $(document).on('click','.animelist_container .animelist_pagination li.active',function(){
                    var page = $(this).attr('p');
                    animelist_ajax(page, th_name); 
                }); 
                $('.navlist a').click(function() {
                var text = $(this).attr('data-id');
                if(text=='all'){
                    animelist_ajax(1, 'post_title');
                } else {
                    animelist_ajax(1, text);
                }
                });
            }); 
            </script>
<script async type="text/javascript">
var URLs = 'index';
 jQuery(document).ready(function(n) {
         var a = "<?php echo admin_url('admin-ajax.php'); ?>";
     function c(c) {
         n(".index_loading").fadeIn().css("background", "#ccc");
         var i = {
             page: c,
             action: "index_ajax",
             'post_id': URLs,
         };
         n.post(a, i, function(a) {
             n(".index_container").html(a), n(".index_loading").css({
                 background: "none",
                 transition: "all 1s ease-out"
             })
         })
     }
     c(1), n(document).on("click",".index_container .index_paginations li.active", function() {
         c(n(this).attr("p"))
     })
 });
</script>
<script>
$('.ongoing_holder').slick({
    lazyLoad: 'ondemand',
    autoplay: true,
    autoplaySpeed: 2000,
    dots: true,
    infinite: true,
    speed: 300,
    slidesToShow: 6,
    slidesToScroll: 1,
    responsive: [{
            breakpoint: 1024,
            settings: {
                slidesToShow: 5,
                slidesToScroll: 1,
                infinite: true,
                dots: true
            }
        },
        {
            breakpoint: 680,
            settings: {
                slidesToShow: 4,
                slidesToScroll: 1
            }
        },
        {
            breakpoint: 480,
            settings: {
                slidesToShow: 3,
                slidesToScroll: 1
            }
        },
        {
            breakpoint: 380,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 1
            }
        }
    ]
});


var $ = jQuery.noConflict();
$(function() {
    $("#activator").click(function() {
        $("#box").animate({
            right: "0px"
        }, 500)
    }), $("#boxclose").click(function() {
        $("#box").animate({
            right: "-700px"
        }, 500)
    })
}), $(document).ready(function() {
    $(".toggle_container").hide(), $(".trigger").click(function() {
        return $(this).toggleClass("active").next().slideToggle("slow"), !1
    })
});
$(document).ready(function() {
    $('#list').click(function(event) {
        event.preventDefault();
        $('#products .item').removeClass('gridmode');
        $('#products .item').addClass('list');
    });
    $('#grid').click(function(event) {
        event.preventDefault();
        $('#products .item').removeClass('list');
        $('#products .item').addClass('gridmode');
    });
});
$(document).ready(function() {
    $('.warnalist li').click(function(event) {
        event.preventDefault();
        var text = $(this).attr('class');
        if (text == 'initv') {
            $(".soralist li").removeClass('active');
            $("li.tv").addClass('active');
        } else if (text == 'iniova') {
            $(".soralist li").removeClass('active');
            $("li.ova").addClass('active');
        } else if (text == 'inimovie') {
            $(".soralist li").removeClass('active');
            $("li.movie").addClass('active');
        } else if (text == 'inispecial') {
            $(".soralist li").removeClass('active');
            $("li.special").addClass('active');
        } else if (text == 'initvova') {
            $(".soralist li").removeClass('active');
            $("li.tvova").addClass('active');
        } else if (text == 'initvspecial') {
            $(".soralist li").removeClass('active');
            $("li.tvspesial").addClass('active');
        }
    });

    $(".seasonss").hide();
    $(".genres").hide();
    var count = 0;
    $('.navlist2 a').click(function(event) {
        event.preventDefault();
        var text = $(this).attr('data-id');
        if (text == 'Season') {
            $(".seasonss").toggle("slow");
            $(".genres").hide();
        } else if (text == "Genre") {
            $(".seasonss").hide();
            $(".genres").toggle("slow");
        }
    });
    function disableScrolling(){
    var x=window.scrollX;
    var y=window.scrollY;
    window.onscroll=function(){window.scrollTo(x, y);};
}

function enableScrolling(){
    window.onscroll=function(){};
}
    $("#lights").hide();
    $('a.trailer').click(function(event) {
        event.preventDefault();
        $("#lights").toggle("slow");
        disableScrolling();
        $('iframe.pv')[0].contentWindow.postMessage('{"event":"command","func":"' + 'playVideo' + '","args":""}', '*');
    });
    $('i.close').click(function(event) {
        event.preventDefault();
        $("#lights").toggle("slow");
        enableScrolling();
        $('iframe.pv')[0].contentWindow.postMessage('{"event":"command","func":"' + 'stopVideo' + '","args":""}', '*');
    });

});
$(document).ready(function() {
    /* Check width on page load*/
    if ($(window).width() < 480) {
        $('#products .item').addClass('gridmode');
        $('#products .item').removeClass('list');
    }
    if ($(window).width() < 555) {
        $('a.btn.facebook').text('');
        $('a.btn.twitter').text('');
        $('a.btn.google').text('');
        $('a.btn.facebook').append('<i class="fas fa-facebook"></i>');
        $('a.btn.twitter').append('<i class="fas fa-twitter"></i>');
        $('a.btn.google').append('<i class="fas fa-google-plus"></i>');
    }
});

$(window).resize(function() {
    /*If browser resized, check width again */
    if ($(window).width() < 470) {
        $('#products .item').addClass('gridmode');
        $('#products .item').removeClass('list');
    } else {
        $('#products .item').addClass('list');
        $('#products .item').removeClass('gridmode');
    }
    if ($(window).width() < 555) {
        $('a.btn.facebook').text('');
        $('a.btn.twitter').text('');
        $('a.btn.google').text('');
        $('a.btn.facebook').append('<i class="fas fa-facebook"></i>');
        $('a.btn.twitter').append('<i class="fas fa-twitter"></i>');
        $('a.btn.google').append('<i class="fas fa-google-plus"></i>');
    } else {
        $('a.btn.facebook').text('Facebook');
        $('a.btn.twitter').text('Twitter');
        $('a.btn.google').text('Google+');
        $('a.btn.facebook i').remove();
        $('a.btn.twitter i').remove();
        $('a.btn.google i').remove();
    }
});
if ($('.top').length) {
    var scrollTrigger = 100, // px
        backToTop = function() {
            var scrollTop = $(window).scrollTop();
            if (scrollTop > scrollTrigger) {
                $('.top').addClass('show');
            } else {
                $('.top').removeClass('show');
            }
        };
    backToTop();
    $(window).on('scroll', function() {
        backToTop();
    });
    $('.top').on('click', function(e) {
        e.preventDefault();
        $('html,body').animate({
            scrollTop: 0
        }, 700);
    });
}
</script>
<script>
console.clear()

new Vue({
  el: 'div.wrapper',
  data: {
    message: 'Akanime.net'
  }
})
</script>
<script>
    var apiURL = '/wp-json/wp/v2/anime-api/?_embed&per_page=10'

/**
 * Posts demo with ability to change author
 */

var posts = new Vue({

	el: '#app',

	data: {
		authors: ['1', '590'],
		currentAuthor: '1',
		posts: null
	},

	created: function() {
		this.fetchData()
	},

	watch: {
		currentAuthor: 'fetchData'
	},

	methods: {
		fetchData: function() {
			var xhr = new XMLHttpRequest()
			var self = this
			xhr.open('GET', apiURL + self.currentAuthor)
			xhr.onload = function() {
				self.posts = JSON.parse(xhr.responseText)
				console.log(self.posts[0].link)
			}
			xhr.send()
		}
	}
})
</script>
</BODY>
</html>