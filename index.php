<?php get_header(); ?>



<!-- Index Home -->
<div class="rseries">
<div class="rvad"><h1><span>Latest Update</span></h1></div>
<div class="rapi">
<div class="venz">
<script type="text/javascript">
               jQuery(document).ready(function(n){var a="<?php echo admin_url('admin-ajax.php'); ?>";function c(c){n(".cvf_pag_loading").fadeIn().css("background","#ccc");var i={page:c,action:"demo-pagination-load-posts"};n.post(a,i,function(a){n(".cvf_universal_container").html(a),n(".cvf_pag_loading").css({background:"none",transition:"all 1s ease-out"})})}c(1),n(".cvf_universal_container .cvf-universal-pagination li.active").live("click",function(){c(n(this).attr("p"))})});
            </script>
            <div class = "cvf_pag_loading">
                <div class = "cvf_universal_container">
                </div>
            </div>
   <style>
.cvf-universal-pagination ul {
    margin: 0px 43%;
padding: 0;
width: auto;
}
.cvf-universal-pagination ul li {display: inline; margin: 3px; padding: 4px 8px; background: #FFF; color: black; }
.cvf-universal-pagination ul li.active:hover {cursor: pointer; background: #1E8CBE; color: white; }
.cvf-universal-pagination ul li.inactive {background: #7E7E7E;}
.cvf-universal-pagination ul li.selected {background: #1E8CBE; color: white;}
   </style>
</div>

</div></div>
<div class="clear"></div>

<div class="clear"></div>

<div style="margin-bottom:20px;"></div>
<div class="rvad"><h1><span>Most Popular</span></h1></div>
			<!--/movies-->				
			<div class="w3_agile_latest_movies">
			
				<div id="owl-demo" class="owl-carousel owl-theme">
                <?php $recent = array ('post_type' => 'anime','show_post'=> -1,'orderby'=> 'views','order'=> 'DESC',);
                      $wp_query= null; $wp_query = new WP_Query(); $wp_query->query($recent); while($wp_query->have_posts()) : $wp_query->the_post(); ?>
					<div class="item">
						<div class="w3l-movie-gride-agile w3l-movie-gride-slider ">
							<a href="<?php echo the_permalink() ?>" class="hvr-sweep-to-bottom">
							    <div class="darken"></div>
                            <?php if ( has_post_thumbnail() ) { ?>
				<?php the_post_thumbnail('thumb', array( 'title' => get_the_title() )); ?>
				<?php } else { ?>
				<img src="<?php echo get_template_directory_uri(); ?>/inc/img/noimage.jpg" title="<?php the_title(); ?>" class="img-responsive" alt=" "/>
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
				<!--//movies-->
<div class="clear"></div>
<div style="margin-bottom:5%;"></div>
<div class="rvad"><h1><span>Ongoing Series</span></h1></div>
			<!--/movies-->				
			<div class="w3_agile_latest_movies">
			
				<div id="owl-demo3" class="owl-carousel owl-theme">
                <?php $recent = array ('post_type' => 'anime','show_post'=> -1,'orderby'=> 'views','order'=> 'DESC','meta_key'=> 'smoke-status','meta_value'=> 'Currently Airing',);
                      $wp_query= null; $wp_query = new WP_Query(); $wp_query->query($recent); while($wp_query->have_posts()) : $wp_query->the_post(); ?>
					<div class="item">
						<div class="w3l-movie-gride-agile w3l-movie-gride-slider ">
							<a href="<?php echo the_permalink() ?>" class="hvr-sweep-to-bottom">
							    <div class="darken"></div>
                            <?php if ( has_post_thumbnail() ) { ?>
				<?php the_post_thumbnail('thumb', array( 'title' => get_the_title() )); ?>
				<?php } else { ?>
				<img src="<?php echo get_template_directory_uri(); ?>/inc/img/noimage.jpg" title="<?php the_title(); ?>" class="img-responsive" alt=" "/>
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
				<!--//movies-->
<div class="clear"></div>
<div style="margin-bottom:5%;"></div>
<div class="rvad"><h1><span>Latest Added</span></h1></div>

			<!--/movies-->				
			<div class="w3_agile_latest_movies">
			
				<div id="owl-demo2" class="owl-carousel owl-theme">
                <?php $recent = array ('post_type' => 'anime','show_post'=> -1,'orderby'=> 'date','order'=> 'DESC');
                      $wp_query= null; $wp_query = new WP_Query(); $wp_query->query($recent); while($wp_query->have_posts()) : $wp_query->the_post(); ?>
					<div class="item">
						<div class="w3l-movie-gride-agile w3l-movie-gride-slider ">
							<a href="<?php echo the_permalink() ?>" class="hvr-sweep-to-bottom">
							    <div class="darken"></div>
                            <?php if ( has_post_thumbnail() ) { ?>
				<?php the_post_thumbnail('thumb', array( 'title' => get_the_title() )); ?>
				<?php } else { ?>
				<img src="<?php echo get_template_directory_uri(); ?>/inc/img/noimage.jpg" title="<?php the_title(); ?>" class="img-responsive" alt=" "/>
				<?php } ?>
                				<div class="w3l-action-icon"><svg viewBox="0 0 24 24"><path d="M8,5.14V19.14L19,12.14L8,5.14Z"></path></svg></div>
							</a>
							<div class="mid-1 agileits_w3layouts_mid_1_home">
								<div class="w3l-movie-text">
									<h6><a href="<?php echo the_permalink() ?>"><?php the_title() ?></a></h6>							
								</div>
							</div>
						</div>
					</div>
                    <?php endwhile; ?>
					   </div>
				    </div>
				<!--//movies-->
<div class="clear"></div>
<div style="margin-bottom:5%;"></div>
<!-- Widget bottom -->
</div>


</div>
<?php get_footer(); ?>