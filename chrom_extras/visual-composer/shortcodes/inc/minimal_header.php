<?php
/**
 * Visual Composer Element Post (Header)
 *
 * @package wow
 * @author Chrom Themes
 * @link http://chromthemes.com
 * @version 2.0
 */
global $CHfw_rdx_options ?>
<div class="post-content-container">
	<div class="center_container">
		<header class="entry-header">
			<h2 class="entry-title">
				<a href="<?php the_permalink() ?>"><?php the_title(); ?></a>
			</h2>
		</header>
		<div class="entry-byline">
   <span class="date-span">
	   <?php the_time( 'F jS, Y' ) ?>
	   <time><?php the_time( 'Y-m-d H:i:s' ) ?></time>
   </span>

			<div class="author-name" itemprop="author" itemscope="" itemtype="http://schema.org/Person">
				<div class="post-written-by">
					<span itemprop="name" class="author-title"> <?php esc_html_e( 'Posted by', 'chfw-lang' ); ?></span>
					<a itemprop="url"  href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"> <?php echo get_the_author_meta( 'display_name' ); ?></a>
				</div>
			</div>

		</div>
	</div>
</div>