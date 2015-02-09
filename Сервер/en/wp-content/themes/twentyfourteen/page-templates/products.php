<?php
/**
 * Template Name: Products
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

get_header(); ?>

<div id="main-content" class="main-content">
	<div class="products">
		<div class="content">
			<h2>Our products</h2>
			<div class="line">
			
			<?php $posts = get_posts ("category_name=prod&orderby=date"); ?>
			<?php if ($posts) : ?>
			<?php $count=1;?>
			<?php foreach ($posts as $post) : setup_postdata ($post); ?>
 				<div class="item">
 					<div class="img_block">
 						<?php the_post_thumbnail('full'); ?> 
 					</div>
            		<h3><?php the_title(); ?></h3>
            		<?php the_content(); ?> 
            		
 				</div>
 				<?php 
 					if (($count % 2 == 0) && ($count!=0)) {
 						echo "</div><div class='line'>";
 					} 
 				?>

 				
 				<?php $count++; ?> 


			<?php endforeach; ?>
			<?php endif; ?>
			</div>
		</div>


	</div>
</div>

		</div>
    
        <div class="footer-push"></div>
  </div>

<div class="footer_black"></div>

<?php
get_footer();
