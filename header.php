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
<?php
if (is_home()) {
    echo '<meta name="description" content="';
    bloginfo('description');
    echo '"/>';
    echo '<meta name="keywords" content="Download Anime Subtitle Indonesia , Download Anime Sub Indo , Download Live Action Sub Indo , Anime Sub Indo , Anime 480p, 720p, 360p, Download Anime Batch Sub Indo , Download Anime Batch Sub Indo "/>';
} else {
    if (is_single()) {
        echo '<meta name="description" content=" Download Anime ';
        the_title_attribute();
        echo ' Subtitle Indonesia BD dan Batch dengan ukuran 480p, 720p , 360p, 240p dalam format Mp4 dan MKV"/>';
        echo '<meta name="keywords" content=" ';
        the_title_attribute();
        echo ' Sub Indo, ';
        the_title_attribute();
        echo ' Subtitle Indonesia, ';
        the_title_attribute();
        echo ' Batch dan BD, ';
        the_title_attribute();
        echo ' Format Mp4 dan MKV, ';
        the_title_attribute();
        echo ' ukuran 480p, 720p, 360p, 240p "/>';
    } else if (is_archive()) {
        echo '<meta name="description" content=" Archive yang anda cari adalah ';
        single_tag_title();
        echo '"/>';
        echo '<meta name="keywords" content="  Download Anime ';
        single_tag_title();
        echo '"/>';
    } else if (is_search()) {
        echo '<meta name="description" content=" Anime yang anda cari adalah ';
        the_search_query();
        echo '"/>';
        echo '<meta name="keywords" content="';
        the_search_query();
        echo ' Sub Indo , ';
        the_search_query();
        echo ' Subtitle Indonesia , ';
        the_search_query();
        echo ' Batch dan BD , ';
        the_search_query();
        echo ' Format Mp4 dan MKV , ';
        the_search_query();
        echo ' ukuran 480p , 720p , 360p , 240p"/>';
    }
}; ?>
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri() . "/style.css" ?>">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css">
<link rel="stylesheet" href="https://unpkg.com/vue-directive-tooltip@latest/css/index.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>
<script src="https://unpkg.com/popper.js"></script>
<script src="https://unpkg.com/vue/dist/vue.js"></script>
<script src="https://unpkg.com/v-tooltip"></script>
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<div class='body_wrapper'>
    <!-- Header -->	
    <div class="header">
        <div class="wrap">
            <div class="logo">
                <a href="<?php echo( home_url() );?>"><span class="primary">AKA</span>Nime<svg viewBox="0 0 24 24" class="circle"><path d="M12,2A10,10 0 0,0 2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12A10,10 0 0,0 12,2Z"></path></svg>net</a>
            </div>
            <div class="nav-icon">
                <a href="#" class="right_bt" id="activator"><span><i class="fas fa-bars"></i> </span> </a>
            </div>
            <div class="box" id="box">
                <div class="box_content">        					                         
                    <div class="box_content_center">
                        <div class="form_content">
                            <div class="menu_box_list">
                                <?php $nav_menu = wp_nav_menu(
                                    array(
                                        'theme_location'=>'main', 
                                        'container'=>'', 
                                        'fallback_cb' => '', 
                                        'echo' => 0
                                        )
                                    );
                                        echo $nav_menu;
                                ?>
                            </div>
                            <a class="boxclose" id="boxclose"> <span><i class="fas fa-close"></i> </span></a>
                        </div>                                  
                    </div> 	
                </div> 
            </div>       	  
            <div class="search">
                <input class="search_box" type="checkbox" id="search_box">
                <label class="icon-search" for="search_box"><i class="fas fa-search"></i></label>
                <div class="search_form">
                    <form action="#">
                        <input type="search" placeholder="Search......" name="s">
                        <button type="submit" class="searchsubmit"/>
                            <span class="icon">
                                <i class="fas fa-search"></i>
                            </span>   
                        </button>
                    </form>
                    <?php echo do_shortcode('[wpdreams_ajaxsearchlite]'); ?>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->	
    <!-- Back to Top -->
    <div class="top">
        <span class="fas fa-rocket"></span>
    </div>
    <!-- Back to Top End -->
    <!-- Main Wrapper -->
    <div id="main-wrapper">
        <!-- Anouncement -->
        <div class="anon">Currently under construction</div>
        <!-- Anouncement End -->
        <?php if(is_front_page()==true){ ?>
            <!-- Ongoing Carousel -->
            <div class="ongoing-wrap">
                <div class="head-title">
                    <h1>
                        <span>Ongoing Series</span>
                        <span>
                            <a id="link" href=/ongoing-series/>View More</a>
                        </span>
                    </h1>
                </div>
                <div class="ongoing_holder">
                        <?php $recent = new WP_Query( 
                            array(
                                'post_type' => 'anime',          // name of post type.
                                'meta_query' => array(
                                    array(
                                        'key' => 'jensan-status',
                                        'value' => 'Currently Airing',
                                        )
                                    ),
                                'showposts' => 8,
                                )
                            );
                            while($recent->have_posts()) : $recent->the_post();
                            $terms = get_the_terms( $post->ID, 'season' );
                            $term = array_shift( $terms );
                            $nama = "/season/".$term->slug;
                        ?>
						    <div class="grid ">
							    <a href="<?php echo the_permalink() ?>" class="ongoing_hover_bottom">
                                    <div class="darken"></div>
                                    <?php
                                    $imageid = MultiPostThumbnails::get_post_thumbnail_id('anime', 'depan-image', $post->ID,'thumb'); 
                                    $imageurl = wp_get_attachment_image_src($imageid,'thumb'); if($imageid){
                                    $str = $imageurl[0];
                                    echo "<img src='".$str."' title='".$post->post_title."' alt='".$post->post_title."'width='350' height='496'>"; }else { ?>
							        <img src="<?php echo get_template_directory_uri(); ?>/inc/img/noimage.jpg" title="<?php the_title(); ?>" class="img-responsive" alt=" "width='350' height='180' />
                                    <?php } ?>
                                    <div class="icon">
                                        <svg viewBox="0 0 24 24">
                                            <path d="M8,5.14V19.14L19,12.14L8,5.14Z"></path>
                                        </svg>
                                    </div>
                                    <div class="ongoing_hold">
                                        <div class="text_ongoing">
                                            <h6>
                                                <a href="<?php echo the_permalink() ?>"><?php the_title() ?></a>
                                            </h6>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        <?php endwhile; ?>
                </div>				    
                <div class="clear"></div>
            </div> 
            <?php }?>
            <script>
    var slug = <?php echo json_encode($nama)?>;
    $(document).ready(
        function() {
            $("#link").attr("href", slug);
        }
    );
</script>
            <!-- Ongoing Carousel End -->
            <!-- Content Wrapper -->
            <div class='wrapper'>
