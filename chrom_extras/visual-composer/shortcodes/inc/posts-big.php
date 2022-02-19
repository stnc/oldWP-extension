<?php
/**
 * Visual Composer Element Post (BIG)
 *
 * @package wow
 * @author Chrom Themes
 * @link http://chromthemes.com
 * @version 2.0
 */
global $scFW_globals,$CHfw_rdx_options,$ch_get_template_part_values;
$col = "col-md-4 col-sm-6 col-xs-6 col-ms-12";//$ch_get_template_part_values['col'];
$format_typeBull =$ch_get_template_part_values['format_typeBull'];
$scFW_globals['post_slider_is_open'] = $ch_get_template_part_values['post_slider_is_open'];
$scFW_globals['post_excerpt_lenght'] = $ch_get_template_part_values['post_excerpt_lenght'];
$scFW_globals['post_slider_is_open']=true;
switch ($format_typeBull) {
    case 'link':
        ?>
        <li class="embed-post-block <?php echo $col?> sc-embed-post-padding">
            <div class="sc-embed-post-content">
                <div class=slinks>
                    <div class="slink">
                        <a class=""
                           href="<?php echo CHfw_get_meta(get_the_ID(), 'wow_post-format-link_link'); ?>"><?php echo CHfw_get_meta(get_the_ID(), 'wow_post-format-link_link'); ?></a>
                    </div>

                </div>
                <?php   get_template_part( "includes/post-pages/post-types/inc_post_content_container" ); ?>
            </div> <!-- sc-embed-post-content -->
        </li> <!-- embed-post-block -->
        <?php
        break;
    case 'video':
        ?>
        <li class="embed-post-block <?php echo $col?> sc-embed-post-padding">
            <div class="sc-embed-post-content">
                <figure class="video-image">
                    <?php if ( CHfw_get_meta( get_the_ID(), 'wow_post-format-video_videoEmbed' ) == '' && CHfw_get_meta( get_the_ID(), 'wow_post-format-video_mp4FileUrl' ) != '' ) :
                        //$entry_post_small_layout_container_width        = 'bloglist_right';
                        //$entry_post_small_layout_container              = 'entry-post-small-layout-container';
                        ?>
                        <!-- MP4 for Safari, IE9, iPhone, iPad, Android, and Windows Phone 7 -->
                        <div class="embed-responsive embed-responsive-16by9">
                            <video controls="controls"
                                   poster="<?php echo CHfw_get_meta( get_the_ID(), 'wow_post-format-video_videoPosterImage' ); ?>"
                                   class="site-video embed-responsive-item">
                                <source
                                        src="<?php echo CHfw_get_meta( get_the_ID(), 'wow_post-format-video_mp4FileUrl' ); ?>"
                                        type="video/mp4">

                                <?php __('Your browser does not support the video tag.;', 'chfw-lang') ?>
                                <!-- Flash fallback for non-HTML5 browsers without JavaScript -->
                                <object type="application/x-shockwave-flash"
                                        data="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/assets/mediaelement/flashmediaelement.swf">
                                    <param name="movie"
                                           value="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/assets/mediaelement/flashmediaelement.swf"/>
                                    <param name="flashvars"
                                           value="controls=true&file=mediaelement/<?php echo CHfw_get_meta( get_the_ID(), 'wow_post-format-video_mp4FileUrl' ); ?>"/>
                                    <!-- Image as a last resort -->
                                    <img alt="<?php echo get_the_title(); ?>"
                                         src="<?php echo CHfw_get_meta( get_the_ID(), 'wow_post-format-video_videoPosterImage' ); ?>"
                                         title="No video playback capabilities"/>
                                </object>
                            </video>
                        </div>
                    <?php endif; ?>
                    <?php if ( CHfw_get_meta( get_the_ID(), 'wow_post-format-video_videoEmbed' ) != '' && CHfw_get_meta( get_the_ID(), 'wow_post-format-video_mp4FileUrl' ) == '' ) :
                        //$entry_post_small_layout_container_width        = 'bloglist_right';
                        //$entry_post_small_layout_container              = 'entry-post-small-layout-container';
                        ?>
                        <div class="embed-responsive embed-responsive-16by9">
                            <?php
                            echo wp_oembed_get( CHfw_get_meta( get_the_ID(), 'wow_post-format-video_videoEmbed' ) );
                            ?>
                        </div>

                    <?php endif; ?>
                </figure>
                <?php   get_template_part( "includes/post-pages/post-types/inc_post_content_container" ); ?>

            </div> <!-- sc-embed-post-content -->
        </li> <!-- embed-post-block -->
        <?php
        break;
    case 'image':
        $imagewow = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'wow-AllSidebarOpen');
        $imagewow = $imagewow[0];
        ?>
        <li class="embed-post-block <?php echo $col?> sc-embed-post-padding">
            <div class="sc-embed-post-content">
                <?php if ($imagewow != "") { ?>
                    <div class="">
                    <div class="body-post">
                        <figure class="image">
                        <a href="<?php the_permalink() ?>">
                            <img class="img-responsive"
                                 src="<?php echo $imagewow; ?>"
                                 alt="<?php echo the_title(); ?>">
							</a>
                        </figure>
                        </div>
                    </div>
                <?php } ?>
                <?php  get_template_part( "includes/post-pages/post-types/inc_post_content_container" ); ?>

            </div> <!-- sc-embed-post-content -->
        </li> <!-- embed-post-block -->

        <?php

        break;
    case 'audio':
        ?>
        <li class="embed-post-block <?php echo $col?> sc-embed-post-padding">

            <div class="sc-embed-post-content">
                <figure class="image">
                    <?php if (CHfw_get_meta(get_the_ID(), 'wow_post-format-audio_audioPosterImage') != '') { ?>
                        <img
                            src="<?php echo CHfw_get_meta(get_the_ID(), 'wow_post-format-audio_audioPosterImage') ?>"
                            alt="<?php echo the_title(); ?>"
                            class="img-responsive border-radius-none">
                    <?php } ?>
                    <audio class="site-audio" preload="none"
                           style="width: 100%; visibility: hidden;"
                           controls="controls">
                        <source type="audio/mpeg"
                                src="<?php echo CHfw_get_meta(get_the_ID(), 'wow_post-format-audio_mp3FileUrl') ?>"/>

                    </audio>
                    <a href="<?php echo CHfw_get_meta(get_the_ID(), 'wow_post-format-audio_mp3FileUrl') ?>">
                        <?php echo CHfw_get_meta(get_the_ID(), 'wow_post-format-audio_mp3FileUrl') ?></a>
                </figure>
                <?php   get_template_part( "includes/post-pages/post-types/inc_post_content_container" ); ?>

            </div> <!-- sc-embed-post-content -->
        </li> <!-- embed-post-block -->
        <?php

        break;
    case 'gallery':
        ?>
        <li class="embed-post-block <?php echo $col?> sc-embed-post-padding">
            <div class="sc-embed-post-content">
                <?php if (CHfw_get_meta(get_the_ID(), 'wow_post-format-gallery_media') != '') { ?>
                    <figure class="image">
                        <?php
                        $imagesBUll_ = trim( CHfw_get_meta( get_the_ID(), 'wow_post-format-gallery_media' ) );
                        if ( ! empty( $imagesBUll_ ) ) {
                            $imagesBUlls = explode( ',', $imagesBUll_ );
                            $imagesBUlls = array_unique( $imagesBUlls );

                            foreach ( $imagesBUlls as $key => $val ) {
                                if ( $val == '' ) {
                                    unset( $imagesBUlls[ $key ] );
                                }
                            }
                        }
                        $rnd       = rand( 100, 1500 );
                        $slider_id = 'gallery-slider' . get_the_ID() . '_' . $rnd;
                        ?>
                        <div class="gallery-container" id="<?php echo $slider_id ?>">
                            <ul class="ul-gallery">
                                <?php
                                if ( ! empty( $imagesBUlls ) ) :
                                    foreach ( $imagesBUlls as $imagesBUll ) :
                                        $imagewow = wp_get_attachment_image_src( ( $imagesBUll ), 'wow-BlogList_MediumSmall_SidebarOpen' );
                                        $imagewow = $imagewow[0];
                                        ?>
                                        <li><img data-lazy="<?php echo $imagewow ?>"
                                                 class="attachment-gallery-box-item img-responsive"
                                                 alt="<?php echo the_title(); ?>"/>
                                        </li>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </ul>
                        </div>
                    </figure>
                <?php } ?>
                <?php   get_template_part( "includes/post-pages/post-types/inc_post_content_container" ); ?>

            </div> <!-- sc-embed-post-content -->

            <?php
            add_action( 'wp_footer', function () use ( $slider_id ) {
                ?>
                <script type="text/javascript">
                    <?php
                    echo  "slick_slider_gallery_init('#".$slider_id."  .ul-gallery', true);" ?>
                </script>
                <?php
            }, 20 );
            ?>

        </li> <!-- embed-post-block -->
        <?php
        break;
    case 'quote':
      $imagewow = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'wow-AllSidebarOpen');
        $imagewow = $imagewow[0];
        ?>
        <li class="embed-post-block <?php echo $col?> sc-embed-post-padding">
            <div class="sc-embed-post-content">
                <?php if ($imagewow != "") : ?>
                    <figure class="image">
                        <img src="<?php echo $imagewow ?>"
                             class="img-responsive"
                             alt="<?php echo the_title(); ?>">
                    </figure>
                <?php endif; ?>

                <blockquote style="border-left:5px solid <?php echo CHfw_get_meta(get_the_ID(), 'wow_post-format-quote_borderColorQuote'); ?>">
                    <h2>
                        <?php echo '"'.CHfw_get_meta(get_the_ID(), 'wow_post-format-quote_quote').'"'; ?></h2>
                    <cite class="pull-right">
                         <?php echo '-'.CHfw_get_meta(get_the_ID(), 'wow_post-format-quote_quote_author').'-'; ?>
                        </cite>
                </blockquote>


            </div> <!-- sc-embed-post-content -->
        </li> <!-- embed-post-block -->
        <?php

        break;
        ?>
        <?php
    case 'status':
        ?>
        <li class="embed-post-block <?php echo $col?> sc-embed-post-padding">
            <div class="sc-embed-post-content">
                <figure class="inner-wrap_status" style="background-image: url(<?php
                echo CHfw_get_meta( get_the_ID(), 'wow_postSetting_backgroundImage' );
                ?> ) ; background-repeat: no-repeat;">

                    <div class="status_type status-wrap">
                        <div class="embed-responsive embed-responsive-16by9">
                            <?php if ( $CHfw_rdx_options['blog_show_full_posts'] === '1' ) : ?>
                                <div class="ch-post-content">
                                    <?php the_content(); ?>
                                </div>
                                <?php
                                wp_link_pages( array(
                                    'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'chfw-lang' ) . '</span>',
                                    'after'       => '</div>',
                                    'link_before' => '<span>',
                                    'link_after'  => '</span>'
                                ) );
                                ?>
                            <?php else : ?>
                                <?php the_excerpt(); ?>
                                <?php echo CHfw_content_more( $readmore_control ); ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </figure>
                <?php   get_template_part( "includes/post-pages/post-types/inc_post_content_container" ); ?>

            </div> <!-- sc-embed-post-content -->
        </li> <!-- embed-post-block -->
        <?php

        break;
    default:
        $imagewow = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'wow-AllSidebarOpen');
        $imagewow = $imagewow[0];
        ?>
        <li class="embed-post-block <?php echo $col?> sc-embed-post-padding">
            <div class="sc-embed-post-content">
                <?php if ($imagewow != "") { ?>
                    <div class="">
                        <figure class="image">
                            <a href="<?php the_permalink() ?>">
                            <img class="img-responsive"
                                 src="<?php echo $imagewow; ?>"
                                 alt="<?php echo the_title(); ?>">
							</a>
                        </figure>
                    </div>
                <?php } ?>
                <?php   get_template_part( "includes/post-pages/post-types/inc_post_content_container" ); ?>

            </div> <!-- sc-embed-post-content -->
        </li> <!-- embed-post-block -->
        <?php



}