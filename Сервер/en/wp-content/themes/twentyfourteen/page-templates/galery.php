<?php
/**
 * Template Name: Galery
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

get_header(); ?>

<div id="main-content" class="main-content">
	<div class="galery">
		<div class="content">
			<h2>Photogalery</h2>

			<div class="line">
			<?php $posts = get_posts ("category_name=photos&orderby=date"); ?>
			<?php if ($posts) : ?>
			<?php $count=1;?>
			<?php foreach ($posts as $post) : setup_postdata ($post); ?>
 				<div class="item">
 					
 					<?php the_post_thumbnail('full'); ?> 
 					
            		<h3><?php the_title(); ?>
            			<em></em>
            		</h3>
            		<?php the_content(); ?> 
            		<div class="opacity"></div>

            		
 				</div>
 				<?php 
 					if (($count % 3 == 0) && ($count!=0)) {
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
