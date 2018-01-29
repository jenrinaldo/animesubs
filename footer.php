</div></div>
<!-- End -->
<!-- setwidget -->
<div id="areaget">
    <div class="centerx">
        <div class="boxbar">
        <?php if(is_active_sidebar('footer-1')){dynamic_sidebar('footer-1');} ?>
        </div>
        <div class="boxbar">
        <?php if(is_active_sidebar('footer-2')){dynamic_sidebar('footer-2');} ?>
        </div>
        <div class="boxbar">
        <?php if(is_active_sidebar('footer-3')){dynamic_sidebar('footer-3');} ?>
        </div>
    </div>
</div>
<!-- Footer -->
<div id='lightsoff'></div>			
<?php wp_footer(); ?>

</div>

<script type='text/javascript'>
$(function(){var s=200,t="Show More (+)";$(".show").each(function(){var a=$(this).text();if(a.length>s){var e=a.substr(0,s)+'<span class="dots">...</span><span class="morectnt"><span>'+a.substr(s,a.length-s)+'</span>&nbsp;&nbsp;<div class="showmoretxt"><a href="">'+t+"</a></div></span>";$(this).html(e)}}),$(".showmoretxt").click(function(){return $(this).hasClass("sample")?($(this).removeClass("sample"),$(this).text(t)):($(this).addClass("sample"),$(this).text("Show Less (-)")),$(this).parent().prev().toggle(),$(this).prev().toggle(),!1})});
</script>
</BODY>
</html>