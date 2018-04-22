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
for( $x = 2;$x<$panjang;$x+=1){
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
  var width,widthFix,ubah,o,x,y,DarkMode=!1;function setCookie(t,e){var i=new Date;i.setTime(i.getTime()+864e5),document.cookie=t+"="+e+";expires="+i.toUTCString()}function getCookie(t){var e=document.cookie.match("(^|;) ?"+t+"=([^;]*)(;|$)");return e?e[2]:null}$(".theater").click(function(){if(0==DarkMode){$(".embed_holder").toggleClass("theater-on");var t=$(".jdlr").height()+$(".jdlr").outerHeight(!0);widthFix=$(".venser").width(),$(this).find("i").toggleClass("fa fa-expand fa fa-compress"),$(".embed_holder").css({top:t+40,width:widthFix,height:"auto"}),$(".jdlr").css({width:widthFix,position:"absolute"}),width=$(".embed_holder").outerHeight(!0),$("#sidebar").css({"margin-top":width+t}),$(".lexot").css({"margin-top":width+t}),DarkMode=!0}else $("#sidebar").css({"margin-top":""}),$(".lexot").css({"margin-top":""}),$(".embed_holder").removeClass("theater-on"),$(".embed_holder").css({top:"",width:"",height:""}),$(".jdlr").css({width:"",position:""}),DarkMode=!1,$(this).find("i").toggleClass("fa fa-compress fa fa-expand")}),$(".share").click(function(){return $(".socialshare").toggle("slow"),!1}),$(document).ready(function(){$(".light").click(function(){$(".header").css({display:"none"}),$(".embed_holder").append("<div id='dark' style='width: 100%;height: 100%;position: fixed;left: 0px;top: 0px;z-index: 3;background: rgb(0, 0, 0);opacity: 0.97;display: block'></div>"),$(".embed_holder").css({display:"block"}),$("div #dark").last().click(function(){$(this).last().remove(),$(".embed_holder").css({display:""}),$(".header").css({display:""})})})}),$(document).ready(function(){$(".drop .option").click(function(){var t=$(this).attr("data-value"),e=$(".drop"),i=$(".drop .option.active").attr("data-value"),a=$(".drop .option").length,s=$("#ganti");if(e.find(".option.active").addClass("mini-hack"),e.toggleClass("visible"),e.removeClass("withBG"),$(this).css("top"),e.toggleClass("opacity"),$(".mini-hack").removeClass("mini-hack"),e.hasClass("visible")&&setTimeout(function(){e.addClass("withBG")},200+100*a),$(".drop").hasClass("visible"),$(".drop").css("width","10em"),setTimeout(function(){$(".drop").css("width","10em")},200),("placeholder"!==t||"placeholder"===i)&&($(".drop .option").removeClass("active"),$(this).addClass("active"),o=$(this).attr("data-value"),setCookie("name",x=$(this).text())),(t!=t||i!==o)&&s.length)return s.attr("src",linkArray[t]),!1})});var status=getCookie("name");""!==status&&($(".option").each(function(t){$(this).text()==status&&(y=$(this).attr("data-value"))}),$('.option div[data-value="'+y+'"]').addClass("active"),$("#ganti").attr("src",linkArray[y]));
 </script>