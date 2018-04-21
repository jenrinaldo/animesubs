<?php get_header(); ?>
<div class="bgg">
<?php 
$cover = get_post_meta(get_the_ID(),'smoke-bgcover',true); 
$season = get_the_term_list($post->ID, 'season', '', ', ', '');
$episodes = get_post_meta( get_the_ID(), 'smoke-episodes', true );
$status = get_post_meta( get_the_ID(), 'smoke-status', true );
$duration = get_post_meta( get_the_ID(), 'smoke-duration', true );
$score = get_post_meta( get_the_ID(), 'smoke-score', true );
$aired = get_post_meta( get_the_ID(), 'smoke-aired', true );
$studios = get_post_meta( get_the_ID(), 'smoke-studios', true );
$producers = get_post_meta( get_the_ID(), 'smoke-producers', true );
$licensors = get_post_meta( get_the_ID(), 'smoke-licensors', true );
?>

<div class="bg-big">
<style>
  .bg-big { background-image: url(<?php echo $cover;?>); 
    height: 300px;
    overflow: hidden;
    background-repeat:no-repeat;
    background-size: cover;
    position: relative;
    background-position:50% 5%;
  }
  
</style>
<div class='dbinfo'>
<div class='dbtab'>
<h1><?php the_title(); ?><a class="minjs" href="#" onclick="toggle_visibility('alt-title');"><i class="fa fa-caret-left" aria-hidden="true"></i></a></h1>

<div id="alt-title">
			    <?php $english = get_post_meta( get_the_ID(), 'smoke-english', true ); if($english!==""){ echo $english." , ";}; ?>
			    <?php $synonim = get_post_meta( get_the_ID(), 'smoke-synonyms', true ); if($synonim!==""){ echo $synonim." , ";}; ?>
			    <?php $japan = get_post_meta( get_the_ID(), 'smoke-japanese', true ); if($japan!==""){ echo $japan;}; ?>
</div>
<script type="text/javascript">
    $('.minjs').click(function(){
     $("#alt-title").toggle("slow");
     $(this).find('i').toggleClass('fa fa-caret-left fa fa-caret-down');
     return false;
    
});

</script>

</div>

<div class="genre"><?php
echo get_the_term_list($post->ID, 'genre', '', ' ', '');
?></div>

</div>
<div class="overlay"></div>
</div>
<div class="dbcov">
    <?php
$imageid = MultiPostThumbnails::get_post_thumbnail_id('anime', 'depan-image', $post->ID,'thumb'); 
$imageurl = wp_get_attachment_image_src($imageid,'thumb'); if($imageid){
$str = $imageurl[0];
    echo "<img src='".$str."' title='".$post->post_title."' alt='".$post->post_title."'width='350' height='496'>"; }else { ?>
  				<img src="<?php echo get_template_directory_uri(); ?>/inc/img/noimage.jpg" title="<?php the_title(); ?>" class="img-responsive" alt=" "width='350' height='180' />
<?php }?>
</div>
<div class="bottomnav">
    
<div class="l"><span class="typ">
<?php
echo get_the_term_list($post->ID, 'tipe', '', ', ', '');
?>
</span>
<span class="ssn">
        <?php echo $season;?></span></div>
        
<div class="r">
<a href="http://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>" target="_blank" class="btn facebook">Facebook</a>
<a href="http://twitter.com/share?url=<?php the_permalink(); ?>&text=<?php the_title(); ?>" target="_blank" class="btn twitter"> Twitter</a>
<a href="https://plus.google.com/share?url=<?php the_permalink(); ?>" target="_blank" class="btn google">Google+</a>
</div>
</div>
</div>
<div class="venser">
    <div id="lights">
  <a class="boxcloses" id="boxcloses" onclick="lightbox_close();"></a>
 <iframe class="pv" src="<?php echo get_post_meta(get_the_ID(),'smoke-pv',true)?>" frameborder="0"></iframe>
</div>

<div id="fade" onClick="lightbox_close();"></div>
<div class='dbnime'>


<?php setup_postdata(get_the_ID());?>
<div class='dbsp show'>
<?php the_content(); ?>
</div>
<div class="commentar">
<h5><i class="fa fa-comments"></i> Comment <span><?php comments_number( __( '0', 'blank' ), __( '1', 'blank' ), __( '%', 'blank' ), 'comments-link', __('-', 'blank')); ?></span></h5>
<div class="commentwrapper"><ul><?php comments_template(); ?></ul></div>
</div>

</div>
<script>
    window.document.onkeydown = function(e) {
  if (!e) {
    e = event;
  }
  if (e.keyCode == 27) {
    lightbox_close();
  }
}
$("iframe.pv").attr("src", $("iframe.pv").attr("src").replace("autoplay=1", "autoplay=0"));
function lightbox_open() {
  $("iframe.pv").attr("src", $("iframe.pv").attr("src").replace("autoplay=0", "autoplay=1"));
  window.scrollTo(0, 0);
  document.getElementById('lights').style.display = 'block';
  document.getElementById('fades').style.display = 'block';
  lightBoxVideo.play();
}

function lightbox_close() {
$('.pv')[0].contentWindow.postMessage('{"event":"command","func":"' + 'stopVideo' + '","args":""}', '*'); 
  document.getElementById('lights').style.display = 'none';
  document.getElementById('fades').style.display = 'none';
  lightBoxVideo.pause();
}
</script>
<div style="margin-top:10px;"></div>
</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>