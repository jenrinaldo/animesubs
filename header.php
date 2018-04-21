<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head profile="http://gmpg.org/xfn/11">
<meta name="google-site-verification" content="s6lB6ifZm_Ih2o7hFcGJf-ZG04PUhuIAu5NcT0CFixI" />
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta property="og:title" content="<?php bloginfo( 'title' ); ?>" />
<meta property="og:url" content="<?php bloginfo('url'); ?>" />
<meta content='Index, Follow' name='robots'/>
<meta content='Admin' name='author'/>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php if(is_home()) {
    echo '<meta name="description" content="';bloginfo( 'description' );echo '"/>';
    echo '<meta name="keywords" content="Download Anime Subtitle Indonesia , Download Anime Sub Indo , Download Live Action Sub Indo , Anime Sub Indo , Anime 480p, 720p, 360p, Download Anime Batch Sub Indo , Download Anime Batch Sub Indo "/>';
} else {
    if(is_single()) {
        echo '<meta name="description" content=" Download Anime ';the_title_attribute();echo' Subtitle Indonesia BD dan Batch dengan ukuran 480p, 720p , 360p, 240p dalam format Mp4 dan MKV"/>';
        echo '<meta name="keywords" content=" ';the_title_attribute(); echo' Sub Indo, ';the_title_attribute(); echo' Subtitle Indonesia, ';the_title_attribute(); echo' Batch dan BD, ';the_title_attribute(); echo' Format Mp4 dan MKV, ';the_title_attribute(); echo' ukuran 480p, 720p, 360p, 240p "/>';
    }
    else if(is_archive()){ 
        echo '<meta name="description" content=" Archive yang anda cari adalah '; single_tag_title(); echo '"/>'; 
        echo '<meta name="keywords" content="  Download Anime '; single_tag_title();echo '"/>';
    }
    else if(is_search()){ 
        echo '<meta name="description" content=" Anime yang anda cari adalah '; the_search_query(); echo '"/>'; 
        echo '<meta name="keywords" content="'; the_search_query(); echo ' Sub Indo , ';the_search_query();echo ' Subtitle Indonesia , ';the_search_query();echo ' Batch dan BD , ';the_search_query();echo ' Format Mp4 dan MKV , ';the_search_query();echo ' ukuran 480p , 720p , 360p , 240p"/>';
    }
};?>

<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri() . "/style.css" ?>">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" as="style">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.1/assets/owl.carousel.min.css" as="style">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.1/owl.carousel.min.js" type="text/javascript" ></script>
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<div class='wowmaskot'>

<!-- Start -->
<div id="awalsemua">
<!-- Header -->	
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
				<div class="search">
  <input class="search_box" type="checkbox" id="search_box">
  <label class="icon-search" for="search_box"></label>
  <div class="search_form">
    <form action="#">
      <input type="search" placeholder="Search......" name="s">
      <button type="submit" class="searchsubmit" />
           <span class="icon"><i class="fa fa-search"></i></span>   
      </button>
    </form>
    <?php echo do_shortcode('[wpdreams_ajaxsearchlite]'); ?>
  </div>
</div>
</div>

<!-- Header End -->

<style>
.search {
    position: relative;
    display: inline-block;
    margin: auto;
    min-height: 25px;
    float: right;
    padding: 5px;
}
input[type=checkbox], input[type=radio] {
    margin: 0px 0 0;
    margin-top: 1px\9;
    line-height: normal;
}
input[type=checkbox], input[type=radio] {
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
    padding: 0;
}
.search_box {
    visibility: hidden;
}
[class^="icon-"] {
    background: #b7053f;
    color: #fff;
    border-radius: 5px;
    display: inline-block;
    padding: 6px 7px 7px;
    font-size: 16px;
    text-shadow: 1px 1px 2px #21638F;
    box-shadow: inset 0px 0px 0px #21638F;
    transition: all 0.5s ease;
    -webkit-transition: all 0.5s ease;
    cursor: pointer;
    z-index: 10;
    position: relative;
}
.search_box:checked~.search_form {
    width: 220px;
    height: 32px;
    padding: 5px;
    top: 50px;
    transition: height 0.2s ease-out, top 0.2s ease-out, padding 0.2s ease-out, 0.3s width ease-out 0.2s;
    -webkit-transition: height 0.2s ease-out, top 0.2s ease-out, padding 0.2s ease-out, 0.3s width ease-out 0.2s;
    right:10px;
}
.search_form {
    background: #5dade2;
    position: absolute;
    z-index: 0;
    padding: 0px 5px;
    right: 0;
    top: 15px;
    overflow: hidden;
    border-radius: 2px;
    width: 20px;
    height: 0px;
    transition: height 0.2s ease-out 0.5s , top 0.2s ease-out 0.5s, padding 0.2s ease-out 0.5s, width 0.3s ease-out 0.2s;
    -webkit-transition: height 0.2s ease-out 0.5s , top 0.2s ease-out 0.5s, padding 0.2s ease-out 0.5s, width 0.3s ease-out 0.2s;
}
.search_box:checked~.search_form form {
    opacity: 1;
    transition: 0.3s all ease-out 0.5s;
    -webkit-transition: 0.3s all ease-out 0.5s;
}
.search_form form {
    opacity: 0;
    transition: all 0.3s ease-out;
    -webkit-transition: all 0.3s ease-out;
}
.search_form input[type='text'] {
    border-radius: 2px 0 0 2px;
    width: 80%;
    margin: -4px 0 0px -4px;
    /* padding: 0px 5px 1px; */
    min-height: 30px;
    float: left;
    overflow: hidden;
}
.search_form input {
    background: #fff;
    border: none;
}
.search_form input[type='submit'] {
    border-radius: 0 2px 2px 0;
    text-transform: uppercase;
    font-size: 11px;
    /* padding: 0px 5px; */
    min-height: 30px;
    margin: -4px 0px 0px 0;
    cursor: pointer;
    float: right;
    width: 20%;
    display: inline-block;
}
.searchsubmit{
    float: right;
    display: inline-block;
    min-height: 26px;
    width: auto;
    margin: -2px -2px;
    background: transparent;
    border: none;
}
.search_form input {
    background: #fff;
    border: none;
    float: left;
    display: inline-block;
    min-height: 26px;
    margin: -2px -2px;
    padding: 0;
    width: 85%;
}
</style>
				<div class="clear"> </div>
			</div>
		</div>	

<!-- End Menu -->
<div id="main-wrapper">
    <div class="anon">Currently under construction</div>
    
    <?php if(is_front_page()==true){ ?>
       <div class="ongoing-wrap">
<!-- New Ongoing -->
<!-- Index Home -->
<div class="head-title"><h1><span>Ongoing Series</span><span><a id="link" href=/ongoing-series/>View More</a></span></h1></div>
			<!--/movies-->				
			<div class="w3_agile_latest_movies">
			
				<div id="owl-demo" class="owl-carousel owl-theme">
                <?php $recent = array ('post_type' => 'anime','showposts'=> 8,'orderby'=> 'views','order'=> 'DESC',);
                      $wp_query= null; $wp_query = new WP_Query(); $wp_query->query($recent); while($wp_query->have_posts()) : $wp_query->the_post(); ?>
                      <?php $terms = get_the_terms( $post->ID, 'season' );
                      $term = array_shift( $terms );
                      $nama = "/season/".$term->slug;
                      ?>
					<div class="item">
						<div class="w3l-movie-gride-agile w3l-movie-gride-slider ">
							<a href="<?php echo the_permalink() ?>" class="hvr-sweep-to-bottom">
							    <div class="darken"></div>
                            <?php
$imageid = MultiPostThumbnails::get_post_thumbnail_id('anime', 'cover-image', $post->ID,'thumb'); 
$imageurl = wp_get_attachment_image_src($imageid,'thumb'); if($imageid){
$str = $imageurl[0];
    echo "<img src='".$str."' title='".$post->post_title."' alt='".$post->post_title."'width='350' height='496'>"; }else { ?>
							<img src="<?php echo get_template_directory_uri(); ?>/inc/img/noimage.jpg" title="<?php the_title(); ?>" class="img-responsive" alt=" "width='350' height='180' />
				<?php } ?>
                				<div class="w3l-action-icon"><svg viewBox="0 0 24 24"><path d="M8,5.14V19.14L19,12.14L8,5.14Z"></path></svg></div>
                											<div class="mid-1 agileits_w3layouts_mid_1_home">
								<div class="w3l-movie-text">
									<h6><a href="<?php echo the_permalink() ?>"><?php the_title() ?></a></h6>							
								</div>
							</div>
							</a>

						</div>
					</div>
                    <?php endwhile; ?>
					   </div>
				    </div>
<script>
var slug = <?php echo json_encode($nama)?>;
$(document).ready(function() {
$("#link").attr("href", slug);

});
</script>				    
				<!--//movies-->
<div class="clear"></div>
<div style="margin-bottom:20px;"></div>
</div> 
    <?php }?>
<div class='wrapper'>
<!-- Header -->