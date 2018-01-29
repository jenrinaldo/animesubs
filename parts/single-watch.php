<div class='lexot'>

<?php 
$CurrentUrl = $_SERVER['REQUEST_URI']; // Get current url
$CurrentUrlLength = $CurrentUrl.length; // Get url length
$CurrentEps = explode('?',$CurrentUrl); // Explode array to get current eps
if(isset($CurrentEps)){
    $epscurr = (string)$CurrentEps[1];
    $epscurr = str_replace("-"," ",$epscurr);
}
$meta_embed = get_post_meta( get_the_ID(), 'smoke_embed', true );
$meta_embed_length = sizeof($meta_embed);
$currLength = $meta_embed_length-1;
$num = 0;
foreach ( $meta_embed as $string ) 
{
    if ( strpos( $string, $epscurr ) !== FALSE ){ 
        $currKey = $num; 
        break;
    }
$num++;
}
$nextval = $currKey+1;
$prevval = $currKey-1;
$next = $meta_embed[$nextval];
$prev = $meta_embed[$prevval];
if(isset($prev)){
        $prevEp = explode(" ",$prev);
        $prevEpNum = $prevEp[1];
        $prevEpStr = get_permalink()."watch/?Episode-".$prevEpNum;
    }
if($prevval<$currKey && $prevval>=0){
    $prevPagination = true;
}
if(isset($next)){
    $nextEp = explode(" ",$next);
    $nextEpNum = $nextEp[1];
    $nextEpStr = get_permalink()."watch/?Episode-".$nextEpNum;
};
if($currLength>$currKey){
    $nextPagination = true;
}

?>
<?php
$metas = get_post_meta( get_the_ID(), 'smoke_embed', true );
$meta = $metas[$currKey];
$meta_embed_length = sizeof($metas);
$ass = explode(" ",$meta);
$panjang = sizeof($ass);
$i=0;
$s=0;
for( $x = 2;$x<$panjang;$x+=2){
    $links[$i] = $ass[$x];
    $var1 = '//';
    $var2 = '.';
    $var3 = 'www.';
    $pool = $ass[$x];
    $temp = strpos($pool,$var3)+strlen($var3);
    if($temp!=''){
        $temp = strpos($pool,$var3)+strlen($var3);
    } else {
        $temp = strpos($pool,$var1)+strlen($var1);
    }
        $result = substr($pool,$temp,strlen($pool));
        if($result = 'vidstreaming'){
            $s++;
        }
        if($s==2){
            $result = 'vidcdn';
        } else{
            $result = substr($pool,$temp,strlen($pool));
        }
        $dd=strpos($result,$var2);
        if($dd == 0){
        $dd = strlen($result);
        }
        $name = substr($result,0,$dd);
        $name = str_replace('s://', '', $name);
        $name = ucfirst($name);
        $namanya[$i] = $name;
         
    $i++;
}

?>
<?php
$i = 0;
foreach ( $links as $meta )
{ $i++; if ($i == '1') { ?>
<div class="embed_holder">
<div id="lightsVideo">
<div class="player-embed" id="pembed"><iframe id='ganti' src="<?php echo do_shortcode( $meta ); ?>" width="100%" height="100%" frameborder="0" scrolling="no" allowfullscreen="allowfullscreen"></iframe></div>
</div>
<div id="tabmenu" >
<div class="drop">
  <div class="option active placeholder" data-value="placeholder">
    Choose Mirror
  </div>
 <?php $nem = 0;$ang = 0; foreach ($links as $drops) { $nem++ ?>
  <div class="option" data-value="<?php  echo $ang ?>"><?php echo $namanya[$ang]; $ang++;?></div>
<?php } ?> 
</div>

<?php if($nextPagination){?>
<div class="nextPag">
    <a href="<?php echo $nextEpStr ?>"><span>Next </span><i class="fa fa-angle-double-right" aria-hidden="true"></i></a>
</div>
<?php }?>
<div class="all">
 <a href="<?php the_permalink() ?>"><span>All </span><i class="fa fa-th-list" aria-hidden="true"></i></a>
</div>
<?php if($prevPagination){?>
<div class="nextPag">
<a href="<?php echo $prevEpStr ?>"><i class="fa fa-angle-double-left" aria-hidden="true"></i><span> Previous</span></a>
</div>
<?php }?>

<div class="theater">
<i class="fa fa-expand" aria-hidden="true"></i>
    <span>Expand</span>
</div>

<div class="light">
    <i class="fa fa-lightbulb-o" aria-hidden="true"></i>
    <span>Light Off</span>
</div>
<div class="share">
<i class="fa fa-share-alt" aria-hidden="true"></i>
    <span>Share</span>
</div>
<?php } } ?>
<div class='clear'>
</div>
</div>
</div>

<div class="clear"></div>
<div class='socialshare'>
    <div class="centerr">
    <p>Share anime to your friends!</p>
<a href="http://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>" target="_blank" class="sfb"><span class="dashicons dashicons-facebook-alt"></span></a>
<a href="http://twitter.com/share?url=<?php the_permalink(); ?>&text=<?php the_title(); ?>" target="_blank" class="stw"> <span class="dashicons dashicons-twitter"></span></a>
<a href="https://plus.google.com/share?url=<?php the_permalink(); ?>" target="_blank" class="sgp"><span class="dashicons dashicons-googleplus"></span></a>
</div>
</div>
<script type="text/javascript">
    var linkArray= <?php echo json_encode($links); ?>;
    var nameArray= <?php echo json_encode($namanya); ?>;
 </script>

<script type="text/javascript">
 var width,widthFix,ubah,DarkMode=!1;$(".theater").click(function(){if(0==DarkMode){$(".embed_holder").toggleClass("theater-on");var e=$(".jdlr").height()+$(".jdlr").outerHeight(!0);widthFix=$(".venser").width(),$(this).find("i").toggleClass("fa fa-expand fa fa-compress"),$(".embed_holder").css({top:e+40,width:widthFix,height:"auto"}),$(".jdlr").css({width:widthFix,position:"absolute"}),width=$(".embed_holder").outerHeight(!0),$("#sidebar").css({"margin-top":width+e}),$(".lexot").css({"margin-top":width+e}),DarkMode=!0}else $("#sidebar").css({"margin-top":""}),$(".lexot").css({"margin-top":""}),$(".embed_holder").removeClass("theater-on"),$(".embed_holder").css({top:"",width:"",height:""}),$(".jdlr").css({width:"",position:""}),DarkMode=!1,$(this).find("i").toggleClass("fa fa-compress fa fa-expand")}),$(".share").click(function(){return $(".socialshare").toggle("slow"),!1});
</script>
<script>
$(document).ready(function(){$(".light").click(function(){$(".header-fix").css({display:"none"}),$(".embed_holder").append("<div id='dark' style='width: 100%;height: 100%;position: fixed;left: 0px;top: 0px;z-index: 3;background: rgb(0, 0, 0);opacity: 0.97;display: block'></div>"),$(".embed_holder").css({display:"block"}),$("div #dark").last().click(function(){$(this).last().remove(),$(".embed_holder").css({display:""}),$(".header-fix").css({display:""})})})}),$(document).ready(function(){$(".drop .option").click(function(){var i,t=$(this).attr("data-value"),a=$(".drop"),e=$(".drop .option.active").attr("data-value"),s=$(".drop .option").length,d=$("#ganti");if(a.find(".option.active").addClass("mini-hack"),a.toggleClass("visible"),a.removeClass("withBG"),$(this).css("top"),a.toggleClass("opacity"),$(".mini-hack").removeClass("mini-hack"),a.hasClass("visible")&&setTimeout(function(){a.addClass("withBG")},200+100*s),$(".drop").hasClass("visible"),i=10,$(".drop").css("width","10em"),setTimeout(function(){$(".drop").css("width",i+"em")},200),"placeholder"!==t||"placeholder"===e){$(".drop .option").removeClass("active"),$(this).addClass("active");var o=$(this).attr("data-value")}if((t!=t||e!==o)&&d.length)return d.attr("src",linkArray[t]),!1})});
</script>
