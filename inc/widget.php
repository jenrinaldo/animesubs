<?php 
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
if ( !empty( $name ) ) { echo "<h3><span>" . $name . "</span><span style='float:right;'><i class='flaticon-prize-badge-with-star-and-ribbon'></i></span></h3>"; };

$recent = new WP_Query("post_type=anime&showposts=$total&order_by=title&order=ASC&meta_key=smoke-status&meta_value=Currently Airing"); 
while($recent->have_posts()) : $recent->the_post(); ?>
<div class='polarpost'>
<div class='polargambar'>
<?php
$post_id = get_the_ID();
$imageid = MultiPostThumbnails::get_post_thumbnail_id('anime', 'cover-image', $post_id,'thumb'); 
$imageurl = wp_get_attachment_image_src($imageid,'thumb'); 
if($imageid){
	$str = $imageurl[0];
	echo "<img src='".$str."' title='";the_title(); echo "' alt='";the_title(); echo "'width='100%' height='auto'>"; } else { ?>
	<img src="<?php echo get_template_directory_uri(); ?>/inc/img/noimage.jpg" title="<?php the_title(); ?>" class="img-responsive" alt="<?php the_title(); ?>"width='100%' height='auto' />
<?php } ?>
</div>
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
<div class='polargambar'>
<?php
$post_id = get_the_ID();
$imageid = MultiPostThumbnails::get_post_thumbnail_id('anime', 'cover-image', $post_id,'thumb'); 
$imageurl = wp_get_attachment_image_src($imageid,'thumb'); if($imageid){
$str = $imageurl[0];
    echo "<img src='".$str."' title='";the_title(); echo "' alt='";the_title(); echo "'width='100%' height='auto'>"; }else { ?>
							<img src="<?php echo get_template_directory_uri(); ?>/inc/img/noimage.jpg" title="<?php the_title(); ?>" class="img-responsive" alt="<?php the_title(); ?>"width='100%' height='auto' />
				<?php } ?>
				</div>
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

// widget tipe list
add_action( 'widgets_init', 'tipe_widget'); 
function tipe_widget() {
register_widget( 'tipe_widget_info' );
}
class tipe_widget_info extends WP_Widget { 
function tipe_widget_info () {
                                $this->WP_Widget('tipe_widget_info', 'Tipe List (C-Studio)', $widget_ops );        } 
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
$i = 0;$taxonomy = 'tipe';
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