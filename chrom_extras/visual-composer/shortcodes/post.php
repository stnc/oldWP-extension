<?php
/**
 * Visual Composer Element ( post  )
 *
 * @package wow
 * @author Chrom Themes
 * @link http://chromthemes.com
 * @version 2.0
 */
function CHfw_shortcode_post( $atts, $content = null ) {
	global $scFW_globals;

	$default_columns         = '3';
	$default_display_pattern = 'category';

	$default__ = 'false';

	global $post;
	$rnd            = rand( 100, 1500 );
	$post_slider_id = 'posts-slider' . $post->ID . '_' . $rnd;

	extract( shortcode_atts( array(
		'post_in_id'          => '',//eğer boş ise tüm post lar gelsin açıklamaya yaz
		'post_excerpt_lenght' => 10,
		'title'               => '',
		'title_align'         => '',
		'color'               => '',
		'accent_color'        => '',
		'style'               => '',
		'border_width'        => '',
		'el_width'            => '',
		'el_class'            => '',
		'num_display_count'   => 6,
		'display_type'        => 'posts-minimal',
	), $atts ) );


	$display_type      = isset( $display_type ) ? esc_attr($display_type) : 'posts-minimal';
	$num_display_count = isset( $num_display_count ) ? intval($num_display_count) : 6;

	if ( $post_excerpt_lenght == '10' ) {
		$post_excerpt_lenght = intval($post_excerpt_lenght);
	}

	$args = array(
		'post_status'   => 'publish',
		'post_type'     => 'post',
		'category_name' => '',
		'post__in'      => ''
	);


	if ( isset( $atts['post_in_id'] ) ) {
		$array_post_in_id = explode( ",", $post_in_id );
		$array_post_in_id = array_unique( $array_post_in_id );
		$args['post__in'] = $array_post_in_id;
		unset ( $args['category_name'] );
	} else {
		unset ( $args['post__in'] );
	}


	$shortcode_params = ( strlen( $title ) > 0 ) ? ' title="' . esc_attr( $title ) . '"' : '';
	$shortcode_params .= ( strlen( $title_align ) > 0 ) ? ' title_align="' . esc_attr( $title_align ) . '"' : '';
	$shortcode_params .= ( strlen( $color ) > 0 ) ? ' color="' . esc_attr( $color ) . '"' : '';
	$shortcode_params .= ( strlen( $accent_color ) > 0 ) ? ' accent_color="' . esc_attr( $accent_color) . '"' : '';
	$shortcode_params .= ( strlen( $style ) > 0 ) ? ' style="' . esc_attr( $style ). '"' : '';
	$shortcode_params .= ( strlen( $border_width ) > 0 ) ? ' border_width="' . esc_attr( $border_width) . '"' : '';
	$shortcode_params .= ( strlen( $el_width ) > 0 ) ? ' el_width="' . esc_attr( $el_width) . '"' : '';
	$shortcode_params .= ( strlen( $el_class ) > 0 ) ? ' el_class="' . esc_attr( $el_class) . '"' : '';

	if ( strlen( $title ) > 0 ) {
		$title_ = do_shortcode( '[vc_text_separator ' . $shortcode_params . ']' );
	} else {
		$title_ = '';
	}

	$stnc['col'] = "col-md-" . $num_display_count . " col-sm-" . $num_display_count . "";

	$image_overlay_type = 'overlay-image_icon-bounce-in';
	ob_start();

	$wp_query = new WP_Query( $args );
	if ( $wp_query->have_posts() ) {
		?>
		<div class="container-illegal">
			<div class="row">
				<div id="<?php echo $post_slider_id ?>" class="single-embed-posts sc-embed-page">
					<?php echo $title_; ?>
					<ul class="sc-embed-post <?php echo $display_type ?> embed-post-container">
						<?php
						while ( $wp_query->have_posts() ) {
							$wp_query->the_post();
							$stnc['format_typeBull'] = get_post_format();

							if ( $display_type == "posts-minimal" ) {
								CHfw_Staff_get_template_part(  plugin_dir_path( __FILE__ ) ."inc/posts-minimal", $stnc );
							} elseif ( $display_type == "posts-medium" ) {
								CHfw_Staff_get_template_part(  plugin_dir_path( __FILE__ ) ."inc/posts-medium", $stnc );
							} else {
								CHfw_Staff_get_template_part( plugin_dir_path( __FILE__ ) . "inc/posts-big", $stnc );
							}
							// unset($previousday);
						}
						?>
					</ul>
				</div>
			</div>
		</div>
		<?php
	} else { ?>
		<p><?php _e( 'Sorry, no posts matched your criteria.', 'chfw-lang' ); ?></p>
	<?php }
	wp_reset_postdata();
	wp_reset_query();
	$output = ob_get_clean();

	return $output;
}

add_shortcode( 'ch_post', 'CHfw_shortcode_post' );
	