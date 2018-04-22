<?php
/*
Template Name: Anime List
*/

get_header(); 

?>

<div class="venser"> 
<div class='jdlr'><h1><?php the_title(); ?></div>
<div class="rapi">
<div class="venz">
<div class="navlist">
<a href="#All" data-id='all'>All<a href="#." data-id='.'>#</a><a href="#?" data-id='?'>?</a><a href="#A" data-id='A'>A</a><a href="#B" data-id='B'>B</a><a href="#C" data-id='C'>C</a><a href="#D" data-id='D'>D</a><a href="#E" data-id='E'>E</a><a href="#F" data-id='F'>F</a><a href="#G" data-id='G'>G</a><a href="#H" data-id='H'>H</a><a href="#I" data-id='I'>I</a><a href="#J" data-id='J'>J</a><a href="#K" data-id='K'>K</a><a href="#L" data-id='L'>L</a><a href="#M" data-id='M'>M</a><a href="#N" data-id='N'>N</a><a href="#O" data-id='O'>O</a><a href="#P" data-id='P'>P</a><a href="#Q" data-id='Q'>Q</a><a href="#R" data-id='R'>R</a><a href="#S" data-id='S'>S</a><a href="#T" data-id='T'>T</a><a href="#U" data-id='U'>U</a><a href="#V" data-id='V'>V</a><a href="#W" data-id='W'>W</a><a href="#X" data-id='X'>X</a><a href="#Y" data-id='Y'>Y</a><a href="#Z" data-id='Z'>Z</a><div class="clear"></div>  <a href="#0" data-id='0'>0</a><a href="#1" data-id='1'>1</a><a href="#2" data-id='2'>2</a><a href="#3" data-id='3'>3</a><a href="#4" data-id='4'>4</a><a href="#5" data-id='5'>5</a><a href="#6" data-id='6'>6</a><a href="#7" data-id='7'>7</a><a href="#8" data-id='8'>8</a><a href="#9" data-id='9'>9</a></div>
<div class="navlist2"><span>View By : </span> 
<a href="#Season" data-id='Season'>Season<a href="#Genre" data-id='Genre'>Genre</a><div class="clear"></div></div>
<div class="warnalist">
<h4>Penjelasan Warna</h4>
<ul>
<li class="initv">TV</li>
<li class="iniova">OVA</li>
<li class="inispecial">Special</li>
<li class="inimovie">Movie</li>
</ul>
</div>
<div class="seasonss">
    <ul>
<?php 
$i = 0;
$taxonomy = 'season';
$tax_terms = get_terms($taxonomy);
$i++;
foreach ($tax_terms as $tax_term) {
echo '<li>' . '<a href="' . esc_attr(get_term_link($tax_term, $taxonomy)) . '" data-id="season" title="' . sprintf( __( "View all seri in season %s" ), $tax_term->name ) . '" ' . '>' . $tax_term->name . '</a></li>';
}
?>
</ul>
</div>
<div class="genres">
    <ul>
<?php 
$i = 0;
$taxonomy = 'genre';
$tax_terms = get_terms($taxonomy);
$i++;
foreach ($tax_terms as $tax_term) {
echo '<li>' . '<a href="' . esc_attr(get_term_link($tax_term, $taxonomy)) . '" data-id="genre"  title="' . sprintf( __( "View all seri in genre %s" ), $tax_term->name ) . '" ' . '>' . $tax_term->name . '</a></li>';
}
?>
</ul>
</div>

        <div class = "content">
            <form class = "post-list">
                <input type = "hidden" value = "" />
            </form>
            <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <article class="entry-content clear">
                        <?php the_content(); ?>
                    </article>
                </article>
            <?php endwhile; ?>  
            
            <script type="text/javascript">
            var th_name = 'post_title';
            var ajaxurl = '<?php echo admin_url('admin-ajax.php'); ?>';
            
            function animelist_ajax(page, th_name){
                var post_data = {
                    page: page,
                    th_name: th_name
                };
                
                $('form.post-list input').val(JSON.stringify(post_data));
                
                var data = {
                    action: "demo_load_my_posts",
                    data: JSON.parse($('form.post-list input').val())
                };
                
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
                $('.animelist_container .animelist_pagination li.active').live('click',function(){
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
            
            <div class = "animelist_page_loading no-padding">
                <div class = "animelist_container">
                    <div class="animelist_content"></div>
                </div>
            </div>
        </div>
</div>
</div>
<div class="clear"></div>

</div>
<style>
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
.soralist ul li .spekBD {
    display: inline;
    font-weight: 400;
    margin: 0 2px;
}
.soralist ul li a.series {
    color: #333;
}
li.tv {
    color:#41A0FF
}
li.movie {
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
.warnalist li {float:left;width:24%;margin-right:1%;margin-bottom:1%;font-size:13px;text-align:center;height:30px;line-height:30px;font-weight:600;color:#fff;position:relative;cursor:pointer;}
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
<?php get_sidebar(); ?>
<?php get_footer(); ?>
