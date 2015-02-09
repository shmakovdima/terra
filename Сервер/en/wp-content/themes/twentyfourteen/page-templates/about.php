<?php
/**
 * Template Name: About
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

get_header(); ?>

<div id="main-content" class="main-content">
<div class="about_page">
	<div class="content">
		<div class="about_item about_short">
			<h2>About us</h2>
			<?php $posts = get_posts ("category_name=aboutus&orderby=date&numberposts=1"); ?>
			<?php if ($posts) : ?>
			<?php foreach ($posts as $post) : setup_postdata ($post); ?>
 			
 			<div class="img_block">
 				<?php the_post_thumbnail('full'); ?> 
 			</div>
 			
            <h3><?php the_title(); ?></h3>
            <?php the_content(); ?> 
 			
			<?php endforeach; ?>
			<?php endif; ?>



		</div>
		<div class="about_item about_mis">
			<h2>Purposes & mission</h2>
			<?php $posts = get_posts ("category_name=purpandmis&orderby=date"); ?>
			<?php if ($posts) : ?>
			<?php foreach ($posts as $post) : setup_postdata ($post); ?>
 			<div class="item">
 					<div class="counter">
 						<span></span>
 					</div>
 				<h3><?php the_title(); ?></h3>
            	<?php the_content(); ?>	
 			</div>
 			
             
 			
			<?php endforeach; ?>
			<?php endif; ?>
		</div>
		<div class="about_item about_pred">
			<h2>our offers</h2>
			
			<?php $posts = get_posts ("category_name=ouroffers&orderby=date&numberposts=1"); ?>
			<?php if ($posts) : ?>
			
			<?php foreach ($posts as $post) : setup_postdata ($post); ?>
 				<h3><?php the_title(); ?></h3>
            	<?php the_content(); ?>	
 			
 			
             
 			
			<?php endforeach; ?>

			<?php endif; ?>
			
		</div>

		
	</div>
</div>	
</div><!-- #main-content -->

		</div>
    
        <div class="footer-push"></div>
  </div>



<div class="footer_black"></div>
<?php

get_footer();
