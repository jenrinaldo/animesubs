</div></div>
<!-- End -->
<!-- setwidget -->


<div class="clear"></div>
</div>
<!-- End Wrapper -->
<footer>
<div class="footer">
<!-- Footer Widget -->
<!-- Start About -->
<div class="about">
<h5><span class="fa fa-question"></span> About</h5>
<p><?php echo bloginfo('name'); ?> - Sebuah <b>Fanshare</b> tempat download anime gratis subtitle indonesia. Disini kami menyediakan anime dengan format mkv dan mp4. Ada banyak ukuran anime yang dishare disini, yaitu 480p, 720p, 360p, dan kadang kadang 240p.</p>
<div class="clear"></div>
</div>
<!-- End About -->
<div class="footerwidget">
<h3><span class="fa fa-cog"></span> Recent Anime TV</h3>
<?php $query = new WP_Query( array( 'posts_per_page' => 7,'tax_query' => array ( array ( 'taxonomy' => 'tipe', 'terms' => 'tv', 'field' => 'slug' ) ) ) ); while($query->have_posts()) : $query->the_post(); ?>
<li><a href="<?php the_permalink(); ?>"><?php if (( $meta = get_post_meta( get_the_ID(), 'title', true ))) { echo $meta; }else { echo the_title();} ?></a></li>
<?php endwhile; ?>
</div>
<!-- End Footer Widget -->
<!-- Footer Widget -->
<div class="footerwidget">
<h3><span class="fa fa-cog"></span> Recent Anime Movie</h3>
<?php $query = new WP_Query( array( 'posts_per_page' => 7,'tax_query' => array ( array ( 'taxonomy' => 'tipe', 'terms' => 'movie', 'field' => 'slug' ) ) ) ); while($query->have_posts()) : $query->the_post(); ?>
<li><a href="<?php the_permalink(); ?>"><?php if (( $meta = get_post_meta( get_the_ID(), 'title', true ))) { echo $meta; }else { echo the_title();} ?></a></li>
<?php endwhile; ?>
</div>
<!-- End Footer Widget -->
<!-- Footer Widget -->
<div class="footerwidget">
<h3><span class="fa fa-cog"></span> Recent Anime OVA</h3>
<?php $query = new WP_Query( array( 'posts_per_page' => 7,'tax_query' => array ( array ( 'taxonomy' => 'tipe', 'terms' => 'ova', 'field' => 'slug' ) ) ) ); while($query->have_posts()) : $query->the_post(); ?>
<li><a href="<?php the_permalink(); ?>"><?php if (( $meta = get_post_meta( get_the_ID(), 'title', true ))) { echo $meta; }else { echo the_title();} ?></a></li>
<?php endwhile; ?>
</div>
<!-- End Footer Widget -->
</div>
</footer>
<div class="credit">
<div class="credit2">Copyright <span class="fa fa-copyright"></span> <a href="<?php echo home_url('/'); ?>"><?php bloginfo('name'); ?></a> - Design Template By <?php bloginfo('name'); ?></div>
</div>
<?php wp_footer(); ?>

</div>
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
</script>
   <style>
.animelist_page_nav,.cvf-pagination-nav{
    width:100%;
    float:none;
    overflow:hidden;
}
.animelist_paginations ul, .cvf-universal-paginations ul {
margin: auto;
    width: auto;
    margin-top: 10px;
}
.animelist_paginations ul li, .cvf-universal-paginations ul li {display: inline; margin: 3px; padding: 4px 8px; background: #FFF; color: black; float:left; }
.animelist_paginations ul li.active:hover, .cvf-universal-paginations ul li.active:hover {cursor: pointer; background: #1E8CBE; color: white; }
.animelist_paginations ul li.inactive, .cvf-universal-paginations ul li.inactive {background: #7E7E7E;}
.animelist_paginations ul li.selected, .cvf-universal-paginations ul li.selected {background: #1E8CBE; color: white;}
   </style>
<script async type='text/javascript'>
$(function() {
var showTotalChar = 200, hideChar = "Show More (+)", showChar = "Show Less (-)";
$('.show').each(function() {
var content = $(this).text();
if (content.length > showTotalChar) {
var con = content.substr(0, showTotalChar);
var hcon = content.substr(showTotalChar, content.length - showTotalChar);
var txt= con +  '<span class="dots"></span><span class="morectnt"><span>' + hcon + '</span>&nbsp;&nbsp;<div class="showmoretxt"><a href="">' + showChar + '</a></div></span>';
$(this).html(txt);
}
});
$(".showmoretxt").click(function() {
if ($(this).hasClass("sample")) {
$(this).removeClass("sample");
$(this).text(showChar);
} else {
$(this).addClass("sample");
$(this).text(hideChar);
}
$(this).parent().prev().toggle();
$(this).prev().toggle();
return false;
});
});
</script>
<script async type="text/javascript">
var URLs = 'index';
 jQuery(document).ready(function(n) {
         var a = "<?php echo admin_url('admin-ajax.php'); ?>";
     function c(c) {
         n(".cvf_pag_loading").fadeIn().css("background", "#ccc");
         var i = {
             page: c,
             action: "demo-pagination-load-posts",
             'post_id': URLs,
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
 });</script>
 <script async>
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
}), $(document).ready(function() {
    var o = $(".wp-pagenavi");
    console.log(o), 0 != o.length && ($("span.current").remove(), $("a.page.larger").remove(), $("a.page.smaller").remove(), $("a.previouspostslink").css({
        "font-size": "1.5rem"
    }), $("a.nextpostslink").css({
        "font-size": "1.5rem"
    }))
});
</script>
<script>
$(document).ready(function() {
    $('#list').click(function(event){event.preventDefault();
    $('#products .item').removeClass('gridmode');
    $('#products .item').addClass('list');});
    $('#grid').click(function(event){event.preventDefault();
    $('#products .item').removeClass('list');
    $('#products .item').addClass('gridmode');});
});
$(document).ready(function() {
    $(".seasonss").hide();
    $(".genres").hide();
$('.navlist2 a').click(function(event){event.preventDefault();
                var text = $(this).attr('data-id');
                if(text=='Season'){
                    $(".seasonss").show();
                    $(".genres").hide();
                } else if(text=="Genre"){
                    $(".seasonss").hide();
                    $(".genres").show();
                }
});

$('.warnalist li').click(function(event){event.preventDefault();
                var text = $(this).attr('class');
                if(text=='initv'){
                    $(".soralist li").removeClass('active');
                    $( "li.tv" ).addClass('active');
                }  else if(text=='iniova'){
                    $(".soralist li").removeClass('active');
                    $( "li.ova" ).addClass('active');
                }  else if(text=='inimovie'){
                    $(".soralist li").removeClass('active');
                    $( "li.movie" ).addClass('active');
                }  else if(text=='inispecial'){
                    $(".soralist li").removeClass('active');
                    $( "li.special" ).addClass('active');
                }   else if(text=='initvova'){
                    $(".soralist li").removeClass('active');
                    $( "li.tvova" ).addClass('active');
                }  else if(text=='initvspecial'){
                    $(".soralist li").removeClass('active');
                    $( "li.tvspesial" ).addClass('active');
                }
});

});
$(document).ready( function() {
    /* Check width on page load*/
    if ( $(window).width() < 480) {
     $('#products .item').addClass('gridmode');
     $('#products .item').removeClass('list');
    }
    if ( $(window).width() < 555) {
     $('a.btn.facebook').text('');
     $('a.btn.twitter').text('');
     $('a.btn.google').text('');
     $('a.btn.facebook').append('<i class="fa fa-facebook"></i>');
     $('a.btn.twitter').append('<i class="fa fa-twitter"></i>');
     $('a.btn.google').append('<i class="fa fa-google-plus"></i>');
    }
 });

 $(window).resize(function() {
    /*If browser resized, check width again */
    if ($(window).width() < 470) {
     $('#products .item').addClass('gridmode');
     $('#products .item').removeClass('list');
    }
    else {
     $('#products .item').addClass('list');
     $('#products .item').removeClass('gridmode');
    }
    if ( $(window).width() < 555) {
     $('a.btn.facebook').text('');
     $('a.btn.twitter').text('');
     $('a.btn.google').text('');
     $('a.btn.facebook').append('<i class="fa fa-facebook"></i>');
     $('a.btn.twitter').append('<i class="fa fa-twitter"></i>');
     $('a.btn.google').append('<i class="fa fa-google-plus"></i>');
    }else {
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
        backToTop = function () {
            var scrollTop = $(window).scrollTop();
            if (scrollTop > scrollTrigger) {
                $('.top').addClass('show');
            } else {
                $('.top').removeClass('show');
            }
        };
    backToTop();
    $(window).on('scroll', function () {
        backToTop();
    });
    $('.top').on('click', function (e) {
        e.preventDefault();
        $('html,body').animate({
            scrollTop: 0
        }, 700);
    });
}

</script>
</BODY>
</html>