<?php 
// widget top featured anime
add_action( 'widgets_init', 'featured_widget'); 
function featured_widget() {
register_widget( 'featured_widget_info' );
}
class featured_widget_info extends WP_Widget { 
function featured_widget_info () {
                                $this->WP_Widget('featured_widget_info', 'Featured Anime (C-Studio)', $widget_ops );        } 
public function form( $instance ) {
if ( isset( $instance[ 'name' ]) && isset ($instance[ 'total' ]) ) {
$name = $instance[ 'name' ];
$total = $instance[ 'total' ];
}
else {
$name = __( '', 'srs_widget_title' );
$total = __( '', 'srs_widget_title' );
} ?>
<p>Title: <input class="widefat" name="<?php echo $this->get_field_name( 'name' ); ?>" type="text" value="<?php echo esc_attr( $name );?>" /></p>
<?php
} 
function update($new_instance, $old_instance) { 
$instance = $old_instance; 
$instance['name'] = ( ! empty( $new_instance['name'] ) ) ? strip_tags( $new_instance['name'] ) : ''; 
$instance['total'] = ( ! empty( $new_instance['total'] ) ) ? strip_tags( $new_instance['total'] ) : ''; 
return $instance; 
}  
function widget($args, $instance) {
extract($args);
echo $before_widget;
$name = apply_filters( 'widget_title', $instance['name'] );
$total = empty( $instance['total'] ) ? '&nbsp;' : $instance['total'];
if ( !empty( $name ) ) { echo "<div class='rvad'><h1><span>" . $name . "</span></h1></div>"; };
echo "<div class='recomx'><ul>";
$i = 0;$popularpost = new WP_Query( array( 'posts_per_page' => '1', 'post_type' => 'anime', 'orderby' => 'rand'  ) ); while ( $popularpost->have_posts() ) : $popularpost->the_post(); ?>
<?php $i++ ?>
<li>
<div class="zeeb">

<?php if ( has_post_thumbnail() ) { ?>
<?php the_post_thumbnail('thumb', array( 'title' => get_the_title() )); ?>
<?php } else { ?>
<img src="<?php echo get_template_directory_uri(); ?>/inc/img/noimage.jpg" />
<?php } ?>

<h2><a style='color:#333;' href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a> <i style='color:#c74242;' class='fa fa-star'></i> <span style='color:#c74242;'>#<?php $meta = get_post_meta( get_the_ID(), 'smoke-score', true ); echo $meta; ?></span> <span class='watch' style='float:right;color: #fff;background: #2b9dff;padding: 5px;font-size: 13px;'><a href="<?php the_permalink() ?>"><i class='fa fa-play'></i> Watch Now</a> </span></h2>
<div class='is'>
<span style='color: #fff;background: #ff6f2b;padding: 4px;font-size: 13px;'><?php $meta = get_post_meta(get_the_ID(), 'smoke-status', true); echo $meta; ?></span>
<span style='color: #fff;background: #77bf18;padding: 4px;font-size: 13px;'><?php
echo get_the_term_list($post->ID, 'genre', '', ', ', '');
?></span>
<?php the_excerpt(); ?>


</div>

</div></li>
<?php wp_reset_query(); ?>
<?php endwhile;
echo "</ul></div>";
echo $after_widget; 
} }


// widget bottom ongoing anime
add_action( 'widgets_init', 'recent_widget'); 
function recent_widget() {
register_widget( 'recent_widget_info' );
}
class recent_widget_info extends WP_Widget { 
function recent_widget_info () {
                                $this->WP_Widget('recent_widget_info', 'Ongoing Anime (C-Studio)', $widget_ops );        } 
public function form( $instance ) {
if ( isset( $instance[ 'name' ]) && isset ($instance[ 'total' ]) ) {
$name = $instance[ 'name' ];
$total = $instance[ 'total' ];
}
else {
$name = __( '', 'srs_widget_title' );
$total = __( '', 'srs_widget_title' );
} ?>
<p>Title: <input class="widefat" name="<?php echo $this->get_field_name( 'name' ); ?>" type="text" value="<?php echo esc_attr( $name );?>" /></p>
<p>Display: <input class="widefat" name="<?php echo $this->get_field_name( 'total' ); ?>" type="number" min="5" value="<?php echo esc_attr( $total ); ?>" /></p> 
<?php
} 
function update($new_instance, $old_instance) { 
$instance = $old_instance; 
$instance['name'] = ( ! empty( $new_instance['name'] ) ) ? strip_tags( $new_instance['name'] ) : ''; 
$instance['total'] = ( ! empty( $new_instance['total'] ) ) ? strip_tags( $new_instance['total'] ) : ''; 
return $instance; 
}  
function widget($args, $instance) {
extract($args);
echo $before_widget;
$name = apply_filters( 'widget_title', $instance['name'] );
$total = empty( $instance['total'] ) ? '&nbsp;' : $instance['total'];
if ( !empty( $name ) ) { echo "<div class='rvad'><h1><span>" . $name . "</span></h1></div>"; };

$recent = new WP_Query("post_type=anime&showposts=$total&order_by=title&order=ASC&meta_key=smoke-status&meta_value=Currently Airing"); while($recent->have_posts()) : $recent->the_post(); ?>
<div class='grid-2-panel'>
<div class='panel'>
<?php if ( has_post_thumbnail() ) { ?>
<?php the_post_thumbnail('thumb', array( 'title' => get_the_title() )); ?>
<?php } else { ?>
<img src="<?php echo get_template_directory_uri(); ?>/inc/img/noimage.jpg" />
<?php } ?>
<h2><a href='<?php the_permalink(); ?>' title='<?php the_title(); ?>'><?php the_title(); ?></a> </h2>


<?php
$valuez = get_the_ID($post->ID, $type, true);
?><?php
$listseri = new WP_Query(array(
'showposts' => '1',
'post_type' => $post,
'meta_key' => 'smoker_episode',
'meta_value' => 'true',
'orderby' => 'date',
'order' => 'DESC',
'meta_key' => 'smoke_series',
'meta_value' => $valuez
));
?><?php
if ($listseri->have_posts()):
while ($listseri->have_posts()):
$listseri->the_post();
?>

<div class="barusan"><a href="<?php
the_permalink();
?>"> #Eps.<?php
$meta = get_post_meta(get_the_ID(), 'smoker_episode', true);
echo $meta;
?></a> <?php $counter = wpb_get_post_views(get_the_ID()); if($counter > 5){ ?> <span style="background:#f33232;color:#fff;padding:1px 5px;" class="hot">Hot</span><?php } ?></div><div class = "baru"><a href="<?php
the_permalink();
?>"></div><?php endwhile; ?><?php
else:
?><?php
endif;
?><?php wp_reset_postdata(); ?>


</div>
</div>

<?php endwhile;
echo '<div class="clear"></div>';
echo $after_widget; 
} }

// widget sidebar popular anime
add_action( 'widgets_init', 'popular_widget'); 
function popular_widget() {
register_widget( 'popular_widget_info' );
}
class popular_widget_info extends WP_Widget { 
function popular_widget_info () {
                                $this->WP_Widget('popular_widget_info', 'Popular Anime (C-Studio)', $widget_ops );        } 
public function form( $instance ) {
if ( isset( $instance[ 'name' ]) && isset ($instance[ 'total' ]) ) {
$name = $instance[ 'name' ];
$total = $instance[ 'total' ];
}
else {
$name = __( '', 'srs_widget_title' );
$total = __( '', 'srs_widget_title' );
} ?>
<p>Title: <input class="widefat" name="<?php echo $this->get_field_name( 'name' ); ?>" type="text" value="<?php echo esc_attr( $name );?>" /></p>
<p>Display: <input class="widefat" name="<?php echo $this->get_field_name( 'total' ); ?>" type="number" min="5" value="<?php echo esc_attr( $total ); ?>" /></p> 
<?php
} 
function update($new_instance, $old_instance) { 
$instance = $old_instance; 
$instance['name'] = ( ! empty( $new_instance['name'] ) ) ? strip_tags( $new_instance['name'] ) : ''; 
$instance['total'] = ( ! empty( $new_instance['total'] ) ) ? strip_tags( $new_instance['total'] ) : ''; 
return $instance; 
}  
function widget($args, $instance) {
extract($args);
echo $before_widget;
$name = apply_filters( 'widget_title', $instance['name'] );
$total = empty( $instance['total'] ) ? '&nbsp;' : $instance['total'];
if ( !empty( $name ) ) { echo "<h3><span>" . $name . "</span><span style='float:right;'><i class='flaticon-prize-badge-with-star-and-ribbon'></i></span></h3>"; };
echo "<div class='aduh'>";
$i = 0;$popularpost = new WP_Query( array( 'posts_per_page' => $total, 'post_type' => 'anime', 'meta_key' => 'wpb_post_views_count', 'orderby' => 'meta_value_num' ) ); while ( $popularpost->have_posts() ) : $popularpost->the_post(); ?>
<?php $i++ ?>
<div class='polarpost'>
<div class='polargambar'><?php if ( has_post_thumbnail()) { the_post_thumbnail('thumb', array( 'title' => get_the_title() )); }?></div>
<div class='polarco'>
<div class='polarjdl'><a class='kmz' rel="<?php the_id();?>" href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><h2><?php the_title(); ?></h2></a></div>
<div class='genreser'>
 <span>
 <?php
echo get_the_term_list($post->ID, 'genre', '', ', ', '');
?>
</span>
</div>
</div></div>
<?php endwhile;
echo "</div>";
echo $after_widget;
} }

// widget sidebar latest anime
add_action( 'widgets_init', 'latest_widget'); 
function latest_widget() {
register_widget( 'latest_widget_info' );
}
class latest_widget_info extends WP_Widget { 
function latest_widget_info () {
                                $this->WP_Widget('latest_widget_info', 'Latest Anime (C-Studio)', $widget_ops );        } 
public function form( $instance ) {
if ( isset( $instance[ 'name' ]) && isset ($instance[ 'total' ]) ) {
$name = $instance[ 'name' ];
$total = $instance[ 'total' ];
}
else {
$name = __( '', 'srs_widget_title' );
$total = __( '', 'srs_widget_title' );
} ?>
<p>Title: <input class="widefat" name="<?php echo $this->get_field_name( 'name' ); ?>" type="text" value="<?php echo esc_attr( $name );?>" /></p>
<p>Display: <input class="widefat" name="<?php echo $this->get_field_name( 'total' ); ?>" type="number" min="5" value="<?php echo esc_attr( $total ); ?>" /></p> 
<?php
} 
function update($new_instance, $old_instance) { 
$instance = $old_instance; 
$instance['name'] = ( ! empty( $new_instance['name'] ) ) ? strip_tags( $new_instance['name'] ) : ''; 
$instance['total'] = ( ! empty( $new_instance['total'] ) ) ? strip_tags( $new_instance['total'] ) : ''; 
return $instance; 
}  
function widget($args, $instance) {
extract($args);
echo $before_widget;
$name = apply_filters( 'widget_title', $instance['name'] );
$total = empty( $instance['total'] ) ? '&nbsp;' : $instance['total'];
if ( !empty( $name ) ) { echo "<h3><span>" . $name . "</span><span style='float:right;'><i class='flaticon-prize-badge-with-star-and-ribbon'></i></span></h3>"; };
echo "<div class='aduh'>";
$i = 0;$popularpost = new WP_Query( array( 'posts_per_page' => $total, 'post_type' => 'anime', 'orderby' => 'date' ) ); while ( $popularpost->have_posts() ) : $popularpost->the_post(); ?>
<?php $i++ ?>
<div class='polarpost'>
<div class='polargambar'><?php if ( has_post_thumbnail()) { the_post_thumbnail('thumb', array( 'title' => get_the_title() )); }?></div>
<div class='polarco'>
<div class='polarjdl'><a class='kmz' rel="<?php the_id();?>" href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><h2><?php the_title(); ?></h2></a></div>
<div class='genreser'>
<span>
 <?php
echo get_the_term_list($post->ID, 'genre', '', ', ', '');
?>
</span>
</div>
</div></div>
<?php endwhile;
echo "</div>";
echo $after_widget;
} }



// widget seasons list
add_action( 'widgets_init', 'seasons_widget'); 
function seasons_widget() {
register_widget( 'seasons_widget_info' );
}
class seasons_widget_info extends WP_Widget { 
function seasons_widget_info () {
                                $this->WP_Widget('seasons_widget_info', 'Seasons List (C-Studio)', $widget_ops );        } 
public function form( $instance ) {
if ( isset( $instance[ 'name' ]) && isset ($instance[ 'total' ]) ) {
$name = $instance[ 'name' ];
$total = $instance[ 'total' ];
}
else {
$name = __( '', 'srs_widget_title' );
$total = __( '', 'srs_widget_title' );
} ?>
<p>Title: <input class="widefat" name="<?php echo $this->get_field_name( 'name' ); ?>" type="text" value="<?php echo esc_attr( $name );?>" /></p>
<p>Display: <input class="widefat" name="<?php echo $this->get_field_name( 'total' ); ?>" type="number" min="5" value="<?php echo esc_attr( $total ); ?>" /></p> 
<?php
} 
function update($new_instance, $old_instance) { 
$instance = $old_instance; 
$instance['name'] = ( ! empty( $new_instance['name'] ) ) ? strip_tags( $new_instance['name'] ) : ''; 
$instance['total'] = ( ! empty( $new_instance['total'] ) ) ? strip_tags( $new_instance['total'] ) : ''; 
return $instance; 
}  
function widget($args, $instance) {
extract($args);
echo $before_widget;
$name = apply_filters( 'widget_title', $instance['name'] );
$total = empty( $instance['total'] ) ? '&nbsp;' : $instance['total'];
if ( !empty( $name ) ) { echo "<h3><span>" . $name . "</span><span style='float:right;'><i class='flaticon-prize-badge-with-star-and-ribbon'></i></span></h3>"; };
echo "<div class='seasonswidget'><ul>";
$i = 0;$taxonomy = 'season';
$tax_terms = get_terms($taxonomy);
?>
<?php $i++ ?>
<?php
foreach ($tax_terms as $tax_term) {
echo '<li>' . '<a href="' . esc_attr(get_term_link($tax_term, $taxonomy)) . '" title="' . sprintf( __( "View all seri in genre %s" ), $tax_term->name ) . '" ' . '>' . $tax_term->name . '</a></li>';
}
?>
<?php
echo "</ul></div>";
echo $after_widget;
} }

// widget genre list
add_action( 'widgets_init', 'genre_widget'); 
function genre_widget() {
register_widget( 'genre_widget_info' );
}
class genre_widget_info extends WP_Widget { 
function genre_widget_info () {
                                $this->WP_Widget('genre_widget_info', 'Genres List (C-Studio)', $widget_ops );        } 
public function form( $instance ) {
if ( isset( $instance[ 'name' ]) && isset ($instance[ 'total' ]) ) {
$name = $instance[ 'name' ];
$total = $instance[ 'total' ];
}
else {
$name = __( '', 'srs_widget_title' );
$total = __( '', 'srs_widget_title' );
} ?>
<p>Title: <input class="widefat" name="<?php echo $this->get_field_name( 'name' ); ?>" type="text" value="<?php echo esc_attr( $name );?>" /></p>
<p>Display: <input class="widefat" name="<?php echo $this->get_field_name( 'total' ); ?>" type="number" min="5" value="<?php echo esc_attr( $total ); ?>" /></p> 
<?php
} 
function update($new_instance, $old_instance) { 
$instance = $old_instance; 
$instance['name'] = ( ! empty( $new_instance['name'] ) ) ? strip_tags( $new_instance['name'] ) : ''; 
$instance['total'] = ( ! empty( $new_instance['total'] ) ) ? strip_tags( $new_instance['total'] ) : ''; 
return $instance; 
}  
function widget($args, $instance) {
extract($args);
echo $before_widget;
$name = apply_filters( 'widget_title', $instance['name'] );
$total = empty( $instance['total'] ) ? '&nbsp;' : $instance['total'];
if ( !empty( $name ) ) { echo "<h3><span>" . $name . "</span><span style='float:right;'><i class='flaticon-prize-badge-with-star-and-ribbon'></i></span></h3>"; };
echo "<div class='seasonswidget'><ul>";
$i = 0;$taxonomy = 'genre';
$tax_terms = get_terms($taxonomy);
?>
<?php $i++ ?>
<?php
foreach ($tax_terms as $tax_term) {
echo '<li>' . '<a href="' . esc_attr(get_term_link($tax_term, $taxonomy)) . '" title="' . sprintf( __( "View all seri in genre %s" ), $tax_term->name ) . '" ' . '>' . $tax_term->name . '</a></li>';
}
?>
<?php
echo "</ul></div>";
echo $after_widget;
} }


// navigasi number
function pagenavi($before = '', $after = '', $prelabel = '', $nxtlabel = '', $pages_to_show = 10, $always_show = false) {
	global $request, $posts_per_page, $wpdb, $paged;
	if(empty($prelabel)) {
		$prelabel  = '&laquo;';
	}
	if(empty($nxtlabel)) {
		$nxtlabel = '&raquo;';
	}
	$half_pages_to_show = round($pages_to_show/2);
	if (!is_single()) {
		if(!is_category()) {
			preg_match('#FROM\s(.*)\sORDER BY#siU', $request, $matches);		
		} else {
			preg_match('#FROM\s(.*)\sGROUP BY#siU', $request, $matches);		
		}
		$fromwhere = $matches[1];
		$numposts = $wpdb->get_var("SELECT COUNT(DISTINCT ID) FROM $fromwhere");
		$max_page = ceil($numposts /$posts_per_page);
		if(empty($paged)) {
			$paged = 1;
		}
		if($max_page > 1 || $always_show) {
			echo "$before <div class='page'><span class='naviright'>Pages $paged of $max_page</span><span class='navileft'>";
			if ($paged >= ($pages_to_show-1)) {
				echo '<a href="'.get_pagenum_link().'">&laquo; First</a> <strong>...</strong> ';
			}
			previous_posts_link($prelabel);
			for($i = $paged - $half_pages_to_show; $i  <= $paged + $half_pages_to_show; $i++) {
				if ($i >= 1 && $i <= $max_page) {
					if($i == $paged) {
						echo "<strong class='now'>$i</strong>";
					} else {
						echo ' <a href="'.get_pagenum_link($i).'">'.$i.'</a> ';
					}
				}
			}
			next_posts_link($nxtlabel, $max_page);
			if (($paged+$half_pages_to_show) < ($max_page)) {
				echo ' <strong>...</strong> <a href="'.get_pagenum_link($max_page).'">Last &raquo;</a>';
			}
			echo "</div> $after";
		}
	}
}
?>