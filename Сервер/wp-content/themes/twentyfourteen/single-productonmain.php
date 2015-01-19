<?php
/**
 * The Template for displaying all single posts
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

get_header(); ?>




		<div class="techw one_tech">
			<div class="content">
			<?php
				// Start the Loop.
				while ( have_posts() ) : the_post();?>
					<h2 class="one_page"><?php the_title(); ?></h2>
					<div class="item item_one page">
 						<div class="img_block">
 							<?php the_post_thumbnail('full'); ?> 
 						</div>
						<?php the_content(); ?> 

					

					</div>
				<?php endwhile; ?>
			
			</div>
</div>




		</div>
    
        <div class="footer-push"></div>
  </div>

<div class="footer_black"></div>

<?php

get_footer();

