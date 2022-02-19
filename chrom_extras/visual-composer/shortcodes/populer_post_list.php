<?php
/**
 * Visual Composer Element (populer post list )
 *
 * @package wow
 * @author Chrom Themes
 * @link http://chromthemes.com
 * @version 2.0
 *
 *
 */
function CHfw_shortcode_populer_post_list( $atts, $content = null ) {


	extract( shortcode_atts( array(
		'author_show'   => '',
		'picture_show'  => '',
		'date_show'     => '',
		'comments_show' => '',
		'title'         => '',
		'title_align'   => '',
		'color'         => '',
		'accent_color'  => '',
		'style'         => '',
		'border_width'  => '',
		'el_width'      => '',
		'el_class'      => '',
		'num_posts'     => '4',

	), $atts ) );


	$limit = isset( $atts['num_posts'] ) ? intval( $atts['num_posts'] ) : 4;


	$shortcode_params =  ( strlen( $title ) > 0 ) ? ' title="' . esc_attr( $title ) . '"' : '';
	$shortcode_params .= ( strlen( $title_align > 0 ) ? ' title_align="' . esc_attr( $title_align ) . '"' : '';
	$shortcode_params .= ( strlen( $color ) > 0 ) ? ' color="' . esc_attr( $color ) . '"' : '';
	$shortcode_params .= ( strlen( $accent_color ) > 0 ) ? ' accent_color="' . content_url$accent_color) . '"' : '';
	$shortcode_params .= ( strlen( $style ) > 0 ) ? ' style="' . esc_attr( $style ) . '"' : '';
	$shortcode_params .= ( strlen( $border_width ) > 0 ) ? ' border_width="' . esc_attr( $border_width ) . '"' : '';
	$shortcode_params .= ( strlen( $el_width ) > 0 ) ? ' el_width="' . esc_attr( $el_width ) . '"' : '';
	$shortcode_params .= ( strlen( $el_class ) > 0 ) ? ' el_class="' . esc_attr( $el_class ) . '"' : '';

	if ( strlen( $title ) > 0 ) {
		$title_ = do_shortcode( '[vc_text_separator ' . $shortcode_params . ']' );
	} else {
		$title_ = '';
	}

	?>
	<!-- last posts -->

	<?php
		$last_post_args = array(
			'posts_per_page'      => $limit,
			'orderby'             => 'post_date',
			'order'               => 'DESC',
			'post_type'           => 'post',
			'ignore_sticky_posts' => 1
		);


		$last_post_query = new WP_Query( $last_post_args );
		if ( ! isset( $atts['author_show'] ) ) {
			$atts['author_show'] = 0;
		}
		if ( ! isset( $atts['picture_show'] ) ) {
			$atts['picture_show'] = 0;
		}
		if ( ! isset( $atts['date_show'] ) ) {
			$atts['date_show'] = 0;
		}
		if ( ! isset( $atts['comments_show'] ) ) {
			$atts['comments_show'] = 0;
		}

		if ( $last_post_query->have_posts() ) : ?>

			<ul class="sc_fw-theme-last_post_list">
				<?php while ( $last_post_query->have_posts() ) : ?>
					<?php $last_post_query->the_post();
					?>
					<?php if ( get_the_content() != '' ) : ?>
						<li class="lastposts">
							<?php if ( $atts['picture_show'] != null ) : ?>
								<div class="thumbs">
									<?php
									if ( get_post_format() != 'quote' ) {
										echo get_the_post_thumbnail( get_the_ID(), 'thumbnail', array( 'class' => '' ) );
									}
									?>
								</div>
							<?php endif; ?>
							<div class="lastposts-container">
								<h4>
									<a href="<?php echo get_permalink(); ?>" class="nav-button" rel="bookmark"
									   title="<?php echo get_the_title(); ?>"><?php echo get_the_title(); ?></a>
								</h4>

								<div class="last_post_enrty">
									<?php if ( $atts['date_show'] != null ) : ?>
										<div class="post-date">
											<?php echo get_the_date( 'd M , Y' ); ?>
										</div>
									<?php endif; ?>
									<?php if ( $atts['author_show'] != null ) : ?>
										<span class="post-author"> by
											<?php echo get_the_author_link(); ?>
                               </span>
									<?php endif; ?>

									<?php if ( $atts['comments_show'] != null ) : ?>
										<div class="comments">
											<?php comments_popup_link( __( 'Comments (0)', 'chfw-lang' ), __( 'Comments (1)', 'chfw-lang' ), __( 'Comments (%)', 'chfw-lang' ) ); ?>
										</div>
									<?php endif; ?>
								</div>
							</div><!-- end lastposts-container -->
						</li>
					<?php endif; ?>
				<?php endwhile; ?>
			</ul>

		<?php endif; ?>

			<?php wp_reset_postdata();
			wp_reset_query();
			$output = ob_get_clean();
			return $output;
		}

add_shortcode( 'ch_populer_post_list', 'CHfw_shortcode_populer_post_list' );
	