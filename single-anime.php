<?php get_header(); ?>
<div class="bgg">
<?php 
$cover = get_post_meta(get_the_ID(),'jensan-bgcover',true); 
$season = get_the_term_list($post->ID, 'season', '', ', ', '');
$episodes = get_post_meta( get_the_ID(), 'jensan-episodes', true );
$status = get_post_meta( get_the_ID(), 'jensan-status', true );
$duration = get_post_meta( get_the_ID(), 'jensan-duration', true );
$score = get_post_meta( get_the_ID(), 'jensan-score', true );
$aired = get_post_meta( get_the_ID(), 'jensan-aired', true );
$studios = get_post_meta( get_the_ID(), 'jensan-studios', true );
$producers = get_post_meta( get_the_ID(), 'jensan-producers', true );
$licensors = get_post_meta( get_the_ID(), 'jensan-licensors', true );
$broadcast = get_post_meta( get_the_ID(), 'jensan-broadcast', true );
$source = get_post_meta( get_the_ID(), 'jensan-soruce', true );
$rating = get_post_meta( get_the_ID(), 'jensan-rating', true );
$video = get_post_meta(get_the_ID(),'jensan-pv',true);
$rep = '&autoplay=1';
$video = str_replace($rep,'',$video);
?>

<div class="bg-big" itemprop="image" itemscope="" itemtype="https://schema.org/ImageObject">
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
<h1 itemprop="name"><?php the_title(); ?><a class="minjs" href="#" onclick="toggle_visibility('alt-title');"><i class="fa fa-caret-left" aria-hidden="true"></i></a></h1>

<div id="alt-title">
			    <?php $english = get_post_meta( get_the_ID(), 'jensan-english', true ); if($english!==""){ echo $english." , ";}; ?>
			    <?php $synonim = get_post_meta( get_the_ID(), 'jensan-synonyms', true ); if($synonim!==""){ echo $synonim." , ";}; ?>
			    <?php $japan = get_post_meta( get_the_ID(), 'jensan-japanese', true ); if($japan!==""){ echo $japan;}; ?>
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
<a href="#" data-tooltip="Watch trailer" class="trailer">
  <svg viewBox="0 0 24 24" class="n-m"><path d="M8,5.14V19.14L19,12.14L8,5.14Z"></path></svg>
</a>
</div>
<div class="dbcov">
    <?php
$imageid = MultiPostThumbnails::get_post_thumbnail_id('anime', 'depan-image', $post->ID,'thumb'); 
$imageurl = wp_get_attachment_image_src($imageid,'thumb'); if($imageid){
$str = $imageurl[0];
    echo "<img src='".$str."' title='".$post->post_title."' alt='".$post->post_title."'width='350' height='496'>"; }else { ?>
  				<img src="<?php echo get_template_directory_uri(); ?>/inc/img/noimage.jpg" title="<?php the_title(); ?>" class="img-responsive" alt=" "width='350' height='180' />
<?php }?>
<a href="#" data-tooltip="Watch trailer" class="trailer">
  <svg viewBox="0 0 24 24" class="n-m"><path d="M8,5.14V19.14L19,12.14L8,5.14Z"></path></svg>
</a>
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
<i class="close" aria-hidden="true"><svg viewBox="0 0 24 24"><path d="M19,6.41L17.59,5L12,10.59L6.41,5L5,6.41L10.59,12L5,17.59L6.41,19L12,13.41L17.59,19L19,17.59L13.41,12L19,6.41Z"></path></svg></i>
 <iframe class="pv" src="<?php echo $video?>" frameborder="0"></iframe>
</div>
<div class='dbnime'>


<?php setup_postdata(get_the_ID());?>
<div class='dbsp show'>
<?php the_content(); ?>
</div>
<div class="info2" id="Info">
<?php 
echo '<h5><span class="fa fa-info"></span> Info</h5><table><tbody>';
if(!empty($episodes)) echo  '<tr><td class="tablex">Episode <span>:</span></td><td>'.$episodes.'</td></tr>';
if(!empty($status)) echo  '<tr><td class="tablex">Status <span>:</span></td><td>'.$status.'</td></tr>';
if(!empty($aired)) echo  '<tr><td class="tablex">Aired / Tayang <span>:</span></td><td>'.$aired.'</td></tr>';
if(!empty($broadcast)) echo  '<tr><td class="tablex">Broadcast <span>:</span></td><td>'.$broadcast.'</td></tr>';
if(!empty($licensors)) echo  '<tr><td class="tablex">Licensors <span>:</span></td><td>'.$licensors.'</td></tr>';
if(!empty($studios)) echo  '<tr><td class="tablex">Studios <span>:</span></td><td>'.$studios.'</td></tr>';
if(!empty($source)) echo  '<tr><td class="tablex">Source <span>:</span></td><td>'.$source.'</td></tr>';
if(!empty($duration)) echo  '<tr><td class="tablex">Duration <span>:</span></td><td>'.$duration.'</td></tr>';
if(!empty($rating)) echo  '<tr><td class="tablex">Rating <span>:</span></td><td>'.$rating.'</td></tr>';
if(!empty($score)) echo  '<tr><td class="tablex">Score <span>:</span></td><td>'.$score.'</td></tr>';
echo  '</tbody></table>';
?>
</div>
<div class="download" id="LinkDownload"><h5><span class="fa fa-cloud-download"></span> Download Links</h5>
<?php $link = get_post_meta(get_the_ID(),'jensan-link',true);
$cekMovie = get_post_meta(get_the_ID(),'jensan-movie',true);
foreach($link as $links){
  $namaFinal = '';
  $namaBatch = '';
  if($links['Episode']=='Batch'){
    $namaBatch = 'Batch';
  } else if($links['Episode']!=='Movie'){
    $namaFinal = ' Episode '.$links['Episode'];
  };
  echo '<h4>';the_title(); echo $namaFinal.' Subtitle Indonesia '.$namaBatch.'</h4>';
  echo '<ul>';
  if($links['720p']!==''){
    $i=0;
    echo '<li><strong>720p</strong>';
    $pecah = explode(" ",$links['720p']);
    $var1 = '//';
    $var2 = '.';
    $var3 = 'www.';
    foreach($pecah as $petjah){
      $temp = strpos($petjah, $var3) + strlen($var3);
      if ($temp != ''){
        $temp = strpos($petjah, $var3) + strlen($var3);
      } else {
        $temp = strpos($petjah, $var1) + strlen($var1);
      }
      $result = substr($petjah, $temp, strlen($petjah));
      $dd = strpos($result, $var2);
      if ($dd == 0) {
        $dd = strlen($result);
      }
      $name = substr($result, 0, $dd);
      $name = str_replace('s://', '', $name);
      $name = ucfirst($name);
      $nama[$i] = $name;
      $i++;
    };
    $i=0;
    foreach($pecah as $petjah){
      $a = 'drive';
      if (strpos($petjah,$a) !== false) {
      $mentah = get_drive_id($petjah);
      $petjah = Drive($petjah);
      }
      echo '<a href='.$petjah.' data-wpel-link="external" target="_new" rel="nofollow noopener noreferrer">'.$nama[$i].'</a>';
      $i++;
    }
    echo '</li>';
  }
  if($links['480p']!==''){
    $i=0;
    echo '<li><strong>480p</strong>';
    $pecah = explode(" ",$links['480p']);
    foreach($pecah as $petjah){
      $a = 'drive';
      if (strpos($petjah,$a) !== false) {
      $mentah = get_drive_id($petjah);
      $petjah = Drive($petjah);
      }
      echo '<a href='.$petjah.'data-wpel-link="external" target="_new" rel="nofollow noopener noreferrer">'.$nama[$i].'</a>';
      $i++;
    }
    echo '</li>';
  }
  if($links['360p']!==''){
    $i=0;
    echo '<li><strong>360p</strong>';
    $pecah = explode(" ",$links['360p']);
    foreach($pecah as $petjah){
      $a = 'drive';
      if (strpos($petjah,$a) !== false) {
      $mentah = get_drive_id($petjah);
      $petjah = Drive($petjah);
      }
      echo '<a href='.$petjah.'data-wpel-link="external" target="_new" rel="nofollow noopener noreferrer">'.$nama[$i].'</a>';
      $i++;
    }
    echo '</li>';
  }
  if($links['240p']!==''){
    $i=0;
    echo '<li><strong>240p</strong>';
    $pecah = explode(" ",$links['240p']);
    foreach($pecah as $petjah){
      $a = 'drive';
      if (strpos($petjah,$a) !== false) {
      $mentah = get_drive_id($petjah);
      $petjah = Drive($petjah);
      }
      echo '<a href='.$petjah.'data-wpel-link="external" target="_new" rel="nofollow noopener noreferrer">'.$nama[$i].'</a>';
      $i++;
    }
    echo '</li>';
  }
  echo '</ul>';
};
?>
</div>
<div class="clear"></div>
<div class="keyword" itemscope itemtype="http://schema.org/CreativeWork">
<h5><span class="fa fa-key"></span> Keyword</h5>
<div class="keying"><?php $meta = get_the_title();  echo '<span itemprop="keywords">'.$meta.' Sub Indo</span> , <span itemprop="keywords">'.$meta.' Batch</span> , <span itemprop="keywords">'.$meta.' 480p 720p 360p</span> , <span itemprop="keywords">'.$meta.' Mp4 Sub Indo</span> , <span itemprop="keywords">'.$meta.' MKV Sub Indo</span> , <span itemprop="keywords">'.$meta.' Subtitle Indonesia</span> , <span itemprop="keywords">Download Anime '.$meta.' Subtitle Indonesia'; ?></div>
</div>
<?php
$seri = get_the_terms($post->ID, 'series');
$postid = $post->ID;
if($seri[0]->count>1){
?>
<div class="clear"></div>
<div class='recomx'>
<h5><span class="fa fa-link"></span> Related Anime</h5>
<ul class='recomendedanime'>

<?php $fix=$seri[0]->slug;$query = new WP_Query( array ('post__not_in' => array( $postid, ), 'posts_per_page' => 10, 'post_type' => 'anime','tax_query' => array(
        array(
            'taxonomy' => 'series',
            'field' => 'slug',
            'terms' => $fix,
        ),
    ) ) ); while($query->have_posts()) : $query->the_post(); ?><li>
    <a class='series' rel="<?php the_id();?>" href="<?php the_permalink() ?>" title="<?php the_title(); ?>">
    <?php
$imageid = MultiPostThumbnails::get_post_thumbnail_id('anime', 'depan-image', $post->ID,'thumb'); 
$imageurl = wp_get_attachment_image_src($imageid,'thumb'); if($imageid){
$str = $imageurl[0];
    echo "<img src='".$str."' title='".$post->post_title."' alt='".$post->post_title."'width='350' height='496'>"; }else { ?>
  				<img src="<?php echo get_template_directory_uri(); ?>/inc/img/noimage.jpg" title="<?php the_title(); ?>" class="img-responsive" alt=" "width='350' height='180' />
<?php }?>
    <div class="typerecomended"><?php $meta = get_post_meta( get_the_ID(), 'jensan-status', true ); echo $meta; ?></div>
    <h4><?php the_title() ?></h4>
    <div class="rating"><?php $meta = get_the_terms( get_the_ID(), 'tipe'); echo $meta[0]->name; ?></div>
    </a>
    </li>
<?php endwhile; wp_reset_query(); ?>
</ul></div>
<?php } ?>
</div>
<div class="clear"></div>
<div class="commentar">
<h5><span><i class="fa fa-comments"></span></i> Comment <span><?php comments_number( __( '0', 'blank' ), __( '1', 'blank' ), __( '%', 'blank' ), 'comments-link', __('-', 'blank')); ?></span></h5>
<div class="commentwrapper"><ul><?php comments_template(); ?></ul></div>
</div>
<div style="margin-top:10px;"></div>
</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>