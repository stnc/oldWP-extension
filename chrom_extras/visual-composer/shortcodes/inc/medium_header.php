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
			 <span class="comments-span">
                   <?php
                   $category = get_the_category();
                   ?>
				   <a href="/<?php echo $category[0]->taxonomy . '/' . $category[0]->slug; ?>"><?php echo $category[0]->cat_name; ?></a>
                </span>
			<br>
			 <span class="date-span">

<br>
		   <span > <?php the_time( 'F jS, Y' ) ?></span>
		   <time><?php the_time( 'Y-m-d H:i:s' ) ?></time>

         </span>
		</div>
	</div>
</div>