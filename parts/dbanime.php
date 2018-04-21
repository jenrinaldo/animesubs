<?php $cover = get_post_meta(get_the_ID(),'smoke-bgcover',true);
 $cover = str_replace('https://animesubs.net/wp-content/uploads', 'http://cdn.animesubs.net', $cover);?>

<div class="bg-big"></div>
<style>
  .bg-big { background-image: url(<?php echo $cover;?>); }
</style>
<div class="overlay"></div>
    <div id="lights">
  <a class="boxcloses" id="boxcloses" onclick="lightbox_close();"></a>
 <iframe class="pv" src="<?php echo get_post_meta(get_the_ID(),'smoke-pv',true)?>" frameborder="0"></iframe>
</div>

<div id="fade" onClick="lightbox_close();"></div>
<div class='dbnime'>

<div>

<div class='dbori'>
<a class="linkPrev" href="#" onclick="lightbox_open();">
<svg viewBox="0 0 24 24"><path d="M8,5.14V19.14L19,12.14L8,5.14Z"></path>
<?php
$imageid = MultiPostThumbnails::get_post_thumbnail_id('anime', 'depan-image', $post->ID,'thumb'); 
$imageurl = wp_get_attachment_image_src($imageid,'thumb'); if($imageid){
$str = $imageurl[0];
    $str = str_replace('https://animesubs.net/wp-content/uploads', 'http://cdn.animesubs.net', $str);
    echo "<img src='".$str."' title='".$post->post_title."' alt='".$post->post_title."'width='350' height='496'>"; }else { ?>
  				<img src="<?php echo get_template_directory_uri(); ?>/inc/img/noimage.jpg" title="<?php the_title(); ?>" class="img-responsive" alt=" "width='350' height='180' />
<?php }?>
</svg></a>
<div class='dbtitle'>
<h2> Information</h2>
<div class="info-item"><span>Type </span><p><?php
echo get_the_term_list($post->ID, 'type', '', ', ', '');
?></p>
</div>
<?php $season = get_the_term_list($post->ID, 'season', '', ', ', '');?>
<?php $episodes = get_post_meta( get_the_ID(), 'smoke-episodes', true );?>
<?php $status = get_post_meta( get_the_ID(), 'smoke-status', true );?>
<?php $duration = get_post_meta( get_the_ID(), 'smoke-duration', true );?>
<?php $score = get_post_meta( get_the_ID(), 'smoke-score', true );?>
<?php $aired = get_post_meta( get_the_ID(), 'smoke-aired', true );?>
<?php $studios = get_post_meta( get_the_ID(), 'smoke-studios', true );?>
<?php $producers = get_post_meta( get_the_ID(), 'smoke-producers', true );?>
<?php $licensors = get_post_meta( get_the_ID(), 'smoke-licensors', true );?>
<?php if($season!==""){?>
<div class="info-item"><span>Season</span><p>
    <?php echo $season;?>
</p>
</div>
<?php }?>
<?php if($episodes!==""){?>
<div class="info-item"><span>Episodes</span><p>
<?php echo $episodes;?>
</p>
</div>
<?php }?>
<?php if($status!==""){?>
<div class="info-item"><span>Status</span><p>
    <?php echo $status;?>
</p>
</div>
<?php }?>
<?php if($duration!==""){?>
<div class="info-item"><span>Duration</span><p>
    <?php echo $duration;?>
</p>
</div>
<?php }?>
<?php if($score!==""){?>
<div class="info-item"><span>Rating</span><p>
    <?php echo $score;?>
</p>
</div>
<?php }?>
<?php if($aired!==""){?>
<div class="info-item"><span>Released on</span><p>
    <?php echo $aired;?>
</p>
</div>
<?php }?>
<?php if($studios!==""){?>
<div class="info-item"><span>Studios</span><p>
    <?php echo $studios;?>
</p>
</div>
<?php }?>
<?php if($licensors!==""){?>
<div class="info-item"><span>Licensors</span><p>
    <?php echo $licensors;?>
</p>
</div>
<?php }?>
<?php if($producers!==""){?>
<div class="info-item"><span>Producers</span><p><?php echo $producers;?></p>
</div>
<?php }?>
</div></div>

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
</div>

<div class="genre"><?php
echo get_the_term_list($post->ID, 'genre', '', ' ', '');
?></div>
<div class='dbsp show'>
<?php the_content(); ?>
</div>
</div>
<?php setup_postdata(get_the_ID());?>


</div>