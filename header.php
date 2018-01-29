<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head profile="http://gmpg.org/xfn/11">
<meta name="google-site-verification" content="s6lB6ifZm_Ih2o7hFcGJf-ZG04PUhuIAu5NcT0CFixI" />

<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<title><?php wp_title( '–', true, 'right' ); ?></title>
<meta content='Keyword' name='keywords'/>
<meta content='Index, Follow' name='robots'/>
<meta content='Admin' name='author'/>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta property="og:image" content="" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="<?php bloginfo('stylesheet_url'); ?>" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.1/assets/owl.carousel.min.css" rel="stylesheet" type="text/css" />
<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.1/owl.carousel.min.js" type="text/javascript" ></script>
<script>
// Owl Carousel js
function buttonUp(){var o=$(".searchbox-input").val();0!==(o=$.trim(o).length)?$(".searchbox-icon").css("display","block"):($(".searchbox-input").val(""),$(".searchbox-icon").css("display","block"))}$(document).ready(function(){$("#owl-demo").owlCarousel({loop:!0,margin:10,autoplay:!0,lazyContent:!0,responsiveClass:!0,responsive:{0:{items:2,nav:!1},600:{items:3,nav:!1},1e3:{items:5,nav:!1}}}),$("#owl-demo2").owlCarousel({loop:!0,margin:10,autoplay:!0,lazyContent:!0,responsiveClass:!0,responsive:{0:{items:2,nav:!1},600:{items:3,nav:!1},1e3:{items:5,nav:!1}}}),$("#owl-demo3").owlCarousel({loop:!0,margin:10,autoplay:!0,lazyContent:!0,responsiveClass:!0,responsive:{0:{items:2,nav:!1},600:{items:3,nav:!1},1e3:{items:5,nav:!1}}})}),$(document).ready(function(){var o=$(".searchbox-icon"),e=$(".searchbox-input"),n=$(".searchbox"),s=!1;o.click(function(){0==s?(n.addClass("searchbox-open"),e.focus(),s=!0):(n.removeClass("searchbox-open"),e.focusout(),s=!1)}),o.mouseup(function(){return!1}),n.mouseup(function(){return!1}),$(document).mouseup(function(){1==s&&($(".searchbox-icon").css("display","block"),o.click())})});var $=jQuery.noConflict();$(function(){$("#activator").click(function(){$("#box").animate({right:"0px"},500)}),$("#boxclose").click(function(){$("#box").animate({right:"-700px"},500)})}),$(document).ready(function(){$(".toggle_container").hide(),$(".trigger").click(function(){return $(this).toggleClass("active").next().slideToggle("slow"),!1})}),$(document).ready(function(){var o=$(".wp-pagenavi");console.log(o),0!=o.length&&($("span.current").remove(),$("a.page.larger").remove(),$("a.page.smaller").remove(),$("a.previouspostslink").css({"font-size":"1.5rem"}),$("a.nextpostslink").css({"font-size":"1.5rem"}))});  
		</script>
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<div class='wowmaskot'>

<!-- Start -->
<div id="awalsemua">
	
<div class="header-fix">
				<div class="wrap">
				<div class="logo">
					<a href="<?php echo( home_url() );?>"><span class="primary">Anime</span>subs<svg viewBox="0 0 24 24" class="circle"><path d="M12,2A10,10 0 0,0 2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12A10,10 0 0,0 12,2Z"></path></svg>net</a>
				</div>
				<div class="nav-icon">
					
					<a href="#" class="right_bt" id="activator"><span><i class="fa fa-bars"></i> </span> </a>
				</div>
				 <div class="box" id="box">
					 <div class="box_content">        					                         
						<div class="box_content_center">
						 	<div class="form_content">
								<div class="menu_box_list">
									<?php $nav_menu = wp_nav_menu(array(
'theme_location'=>'main', 
'container'=>'', 
'fallback_cb' => '', 
'echo' => 0)); 	echo $nav_menu;?>
										<div class="clear"> </div>
								</div>
								<a class="boxclose" id="boxclose"> <span><i class="fa fa-close"></i> </span></a>
							</div>                                  
						</div> 	
					</div> 
				</div>       	  
				<div class="container-search">
    <form class="searchbox">
        <input type="search" placeholder="Search......" name="s" class="searchbox-input" onkeyup="buttonUp();" required>
        <span class="searchbox-icon"><i class="fa fa-search"></i></span>
        <?php echo do_shortcode('[wpdreams_ajaxsearchlite]'); ?>
    </form>
</div>
				<div class="clear"> </div>
			</div>
		</div>	
		
<!-- End Menu -->
<div id="main-wrapper">
<div class='wrapper'>
<!-- Header -->
<div id="header">
<div class="center">



 </div>  
</div>
<!-- Header -->