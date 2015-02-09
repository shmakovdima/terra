<?php
/*
Single Post Template: Single Other
Description: This part is optional, but helpful for describing the Post Template

 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

get_header(); ?>




		<div class="techb single_news">
			<div class="content">

			<?php
				// Start the Loop.
				while ( have_posts() ) : the_post();?>

					
					<div class="time">
 						<div class="day"><?php the_time('j');?></div>
 						<div class="month"><?php the_time('F'); ?></div>
 					</div>
 					<h2 class="one_page h2_single_news"><?php the_title(); ?></h2>


					<?php the_content(); ?> 

					

					</div>
				<?php endwhile; ?>
			
			</div>

		</div>
    
        <div class="footer-push"></div>
  </div>





<?php

get_footer();

