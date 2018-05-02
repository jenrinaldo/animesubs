<?php 
wp_reset_postdata();
$EpsNum = get_post_meta( $post->ID, 'jensan-episode', true );
$finaleps = get_post_meta($post->ID, 'jensan-episodes',true);
$cekBD = get_post_meta( $post->ID, 'jensan-bd', true );
$nama = wp_get_object_terms( $post->ID, 'tipe', array( 'fields' => 'names' ) );
$nama = array_pop($nama);
$cekEps = ($EpsNum==$finaleps)? true:false;
?>
<div class="item list">
	<div class="grid-thumb">
		<a href="
			<?php echo get_permalink( $post->ID ); ?>" title="<?php echo get_the_title($post->ID); ?>">
			<div class="grid-thumbz">
				<div class="darken"></div>
				<span class='time'>
					<?php echo $nama; ?>
				</span>
				<?php if( date('U') - get_the_modified_time('U', $post->ID) < 24*60*60 ) : ?>
				<span class='new'>New</span>
                <?php endif; 
                $imageid = MultiPostThumbnails::get_post_thumbnail_id('anime', 'cover-image', $post->ID,'thumb'); 
                $imageurl = wp_get_attachment_image_src($imageid,'thumb'); if($imageid){ 
                $str = $imageurl[0];
                echo "<img src='".$str."' title='".$post->post_title."' alt='".$post->post_title."'width='400' height='225'>"; }else { 
                echo "<img src='".get_stylesheet_directory_uri()."/inc/img/noimage.jpg' title='".$post->post_title."' alt='".$post->post_title."'width='350' height='180'>"; } 
                ?>
				<svg viewBox="0 0 24 24">
					<path d="M8,5.14V19.14L19,12.14L8,5.14Z"></path>
                </svg>
                <?php wp_reset_postdata(); ?>
            </div>
        </a>
    </div>
	<div class="text">
		<a class="judul" href="<?php  echo get_permalink($post->ID); ?>" title="<?php  echo get_the_title($post->ID); ?>" alt="<?php  echo get_the_title($post->ID); ?>" data-wpel-link="internal">
			<h2 class='grid-tl' itemprop="name"><?php echo get_the_title($post->ID).' Sub Indo '; if($cekEps==true)echo '(End)'; ?></h2>
			<span class="grid-eps">Ep. <?php echo $EpsNum ?></span>
		</a>
	</div>
    <div class="info">
        <ul>
		    <li>
				    <span class="fas fa-clock-o"></span> Date : 	
	    		<?php echo get_the_time('d F Y', $post->ID); ?>
		    </li>
		    <li>
				    <span class="fas fa-comments"></span> Comment  : 	
	    		<?php comments_number( __( '0', 'blank' ), __( '1', 'blank' ), __( '%', 'blank' ), 'comments-link', __('-', 'blank')); ?>
		    </li>
		    <li class="category">
				    <span class="fas fa-tags"></span> Category :
	    		<?php echo get_the_term_list($post->ID, 'genre', '', ', ', ''); ?>
		    </li>
		    <li class="status">
				    <span class="fas fa-info-circle"></span> Status : 	
	    		<?php echo get_post_meta( $post->ID, 'jensan-status', true );?>
		    </li>
		    <li class="series">
				    <span class="fas fa-th-list"></span> Series : 	 
            	<?php echo get_the_term_list($post->ID,'series','','<span class="batasanseries">|</span>',''); ?>
		    </li>
		    <?php if($cekBD){
                echo  '<li class="statusBD"><span>BD</span></li>';
                }?>
        </ul>
    </div>
</div>	
