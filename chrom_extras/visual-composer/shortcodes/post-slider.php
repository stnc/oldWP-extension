<?php
/**
 * Visual Composer Element ( post slider )
 *
 * @package wow
 * @author Chrom Themes
 * @link http://chromthemes.com
 * @version 2.0
 */
function CHfw_shortcode_post_slider( $atts, $content = null ) {
	global $post;

	$default_columns         = '3';
	$default_display_pattern = 'category';
	$default_category_       = 'All';
	$default__               = 'false';


	$rnd            = rand( 100, 1500 );
	$post_slider_id = 'posts-slider' . $post->ID . '_' . $rnd;

	extract( shortcode_atts( array(
		'category'                => $default_category_,
		'post_in_id'              => '',
		'display_pattern'         => $default_display_pattern,
		'post_excerpt_lenght'     => 55,
		'autoplay'                => $default__,
		'infinite'                => $default__,
		'arrows'                  => $default__,
		'dots'                    => $default__,
		'autoplay_speed'          => 5000,
		'title'                   => '',
		'display_type'            => 'posts-minimal',
		'title_align'             => '',
		'color'                   => '',
		'accent_color'            => '',
		'style'                   => '',
		'border_width'            => '',
		'el_width'                => '',
		'el_class'                => '',
		'slider_type'             => 'horizontal',
		'slide_to_standard_piece' => '4',
		'slide_to_1024_piece'     => '3',
		'slide_to_768_piece'      => '3',
		'slide_to_600_piece'      => '3',
		'slide_to_480_piece'      => '2',
		'slide_to_375_piece'      => '2',
		'slide_to_320_piece'      => '1',
	), $atts ) );


	if ( $autoplay == '1' ) {
		$autoplay = 'true';
	} else {
		$autoplay = 'false';
	}

	$slider_type = 'horizontal';//later v3 changed --> line 33 remember

	if ( $slider_type == 'horizontal' ) {
		$slider_type_vertical = 'false';
	} else {
		$slider_type_vertical = 'true';
	}

	if ( $infinite == '1' ) {
		$infinite = 'true';
	} else {
		$infinite = 'false';
	}

	if ( $dots == '1' ) {
		$dots = 'true';
	} else {
		$dots = 'false';
	}

	if ( $arrows == '1' ) {
		$arrows = 'true';
	} else {
		$arrows = 'false';
	}

	if ( $post_excerpt_lenght == '10' ) {
		$post_excerpt_lenght = intval($post_excerpt_lenght);
	}

	$num_posts = isset( $atts['num_posts'] ) ?  intval($atts['num_posts']) : 4;


	$arrays_values = '{ "autoplay": ' . $autoplay . ', "infinite": ' . $infinite . ', "dots": ' . $dots . ', "vertical":' . $slider_type_vertical . ',  "arrows": ' . $arrows . ',"autoplaySpeed": ' . esc_attr($autoplay_speed) . ',"slide_to_standard_piece":' . esc_attr( $slide_to_standard_piece ) . ',	  "slide_to_1024_piece":' . esc_attr( $slide_to_1024_piece ) . ',"slide_to_768_piece":' . esc_attr( $slide_to_768_piece ) . ',  "slide_to_600_piece":' . esc_attr( $slide_to_600_piece ) . ', "slide_to_480_piece":' . esc_attr( $slide_to_480_piece ) . ',		  "slide_to_375_piece":' . esc_attr( $slide_to_375_piece ) . ',		   "slide_to_320_piece":' . esc_attr( $slide_to_320_piece ) . '}';

	/*	$arrays_values = '{ "autoplay": "' . $autoplay . '", "infinite": "' . $infinite . '", "dots": ' . $dots . ', "vertical":"'.$slider_type_vertical.'",  "arrows": ' . $arrows . ',"autoplaySpeed": "' . $autoplay_speed .'","slide_to_standard_piece":"' . esc_attr( $slide_to_standard_piece ) . '",	  "slide_to_1024_piece":"' . esc_attr( $slide_to_1024_piece ) . '","slide_to_768_piece":"' . esc_attr( $slide_to_768_piece ) . '",  "slide_to_600_piece":"' . esc_attr( $slide_to_600_piece ) . '", "slide_to_480_piece":"' . esc_attr( $slide_to_480_piece ) . '",		  "slide_to_375_piece":"' . esc_attr( $slide_to_375_piece ) . '",		   "slide_to_320_piece":"' . esc_attr( $slide_to_320_piece ) . '"}';*/

	$args = array(
		'post_status'    => 'publish',
		'display_type'   => 'post',
		'posts_per_page' => intval( $num_posts ),
		'category_name'  => '',
		'post__in'       => ''
	);

	if ( isset( $atts['display_pattern'] ) ) {

		if ( isset( $atts['post_in_id'] ) ) {
			$array_post_in_id = explode( ",", $post_in_id );
			$array_post_in_id = array_unique( $array_post_in_id );
			$args['post__in'] =  $array_post_in_id;
			unset ( $args['category_name'] );
		} else {

			unset ( $args['post__in'] );
			$args['category_name'] =  $default_category_;
		}
	} else {

		$category_name = isset( $atts['category'] ) ? $atts['category'] : $default_category_;
		if ( $category_name != 'All' ) {
			$args['category_name'] = $category_name;
		} else {
			unset ( $args['category_name'] );
			// $args['category_name'] = isset($atts['category']) ? $atts['category'] : $default_category_;
		}
		$atts['display_pattern'] = esc_attr($default_display_pattern);
		unset ( $args['post__in'] );
		$args['posts_per_page'] =esc_attr( $num_posts);
	}

	$display_type = isset( $atts['display_type'] ) ? esc_attr($atts['display_type']) : 'posts-minimal';
	$shortcode_params = ( strlen( $title ) > 0 ) ? ' title="' . esc_attr( $title ) . '"' : '';
	$shortcode_params .= ( strlen( $title_align ) > 0 ) ? ' title_align="' . esc_attr( $title_align ) . '"' : '';
	$shortcode_params .= ( strlen( $color ) > 0 ) ? ' color="' . esc_attr( $color ) . '"' : '';
	$shortcode_params .= ( strlen( $accent_color ) > 0 ) ? ' accent_color="' . $accent_color . '"' : '';
	$shortcode_params .= ( strlen( $style ) > 0 ) ? ' style="' . $style . '"' : '';
	$shortcode_params .= ( strlen( $border_width ) > 0 ) ? ' border_width="' . $border_width . '"' : '';
	$shortcode_params .= ( strlen( $el_width ) > 0 ) ? ' el_width="' . $el_width . '"' : '';
	$shortcode_params .= ( strlen( $el_class ) > 0 ) ? ' el_class="' . $el_class . '"' : '';
	if ( strlen( $title ) > 0 ) {
		$title_ = do_shortcode( '[vc_text_separator ' . $shortcode_params . ']' );
	} else {
		$title_ = '';
	}
	$image_overlay_type = 'overlay-image_icon-bounce-in';
	ob_start();
	$scFW_globals['col'] = "";
	$scFW_globals['post_slider_is_open'] = true;
	$scFW_globals['post_excerpt_lenght'] = $post_excerpt_lenght;
	$wp_query            = new WP_Query( $args );
	if ( $wp_query->have_posts() ) {
		?>
				<div id="<?php echo $post_slider_id ?>" class="sc-embed-post-slider blog ">
					<?php echo $title_; ?>
					<ul class="sc-embed-post <?php echo esc_attr($display_type) ?> embed-post-container slick-slider">
						<?php
						while ( $wp_query->have_posts() ) {
							$wp_query->the_post();
							$scFW_globals['format_typeBull'] = get_post_format();
							if ( $display_type == "posts-minimal" ) {
								CHfw_Staff_get_template_part(  plugin_dir_path( __FILE__ ) ."inc/posts-minimal", $scFW_globals );
							} elseif ( $display_type == "posts-medium" ) {
								CHfw_Staff_get_template_part(  plugin_dir_path( __FILE__ ) ."inc/posts-medium", $scFW_globals );
							} else {
								CHfw_Staff_get_template_part(  plugin_dir_path( __FILE__ ) ."inc/posts-big", $scFW_globals );
							}
							unset( $previousday );
						}
						?>
					</ul>
				</div>
		<?php
	} else { ?>
		<p><?php _e( 'Sorry, no posts matched your criteria.', 'chfw-lang' ); ?></p>
	<?php }
	wp_reset_postdata();
	wp_reset_query();
	add_action( 'wp_footer', function () use ( $post_slider_id, $arrays_values ) {
		$post_slider_id = '#' . $post_slider_id . ' .sc-embed-post';
		?>
		<script type="text/javascript">
			<?php      echo  "slick_slider_init('$post_slider_id','$arrays_values');" ?>
		</script>
		<?php
	}, 20 );
	$output = ob_get_clean();
	return $output;
}
add_shortcode( 'ch_post_slider', 'CHfw_shortcode_post_slider' );
	