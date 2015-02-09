<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme and one
 * of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query,
 * e.g., it puts together the home page when no home.php file exists.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

get_header(); ?>




<div id="main-content" class="main-content">
	<div class="main_page-products">
		<div class='content'>

			<?php
				$temp = 1;?>
			 <?php $posts = get_posts ("category=2&orderby=date&numberposts=3"); ?>
			<?php if ($posts) : ?>
			<?php foreach ($posts as $post) : setup_postdata ($post); ?>
 				<div class="main_page-products-item" attr = "<?php
				echo $temp;?>">
 					<div class="img_block">
 						<?php the_post_thumbnail('full'); ?> 
 						<div class="opacity"> </div>
 					</div>
            		<h2><?php the_title(); ?></h2>
            		<?php the_excerpt(); ?> 
            		<a class="button" href="<?php the_permalink(); ?>" title="More">More</a>
 				</div>


			<?php endforeach; ?>
			<?php endif; ?>
		</div>
	
	</div>
	<div class="foto_galery">
		<div class='content'>
			<h2>Photogalery</h2>
			<?php $posts = get_posts ("category=3&orderby=date&numberposts=1"); ?>
				<?php if ($posts) : ?>
					<?php foreach ($posts as $post) : setup_postdata ($post); ?>
					<?php the_content(); ?> 
			<?php endforeach; ?>
			<?php endif; ?>
			
			<div class="foto_galery-slides">
			<?php $posts = get_posts ("category=4&orderby=date&numberposts=4");
			$tempid = 0;
			 ?>
			  <?php if ($posts) : ?>
				<?php foreach ($posts as $post) : setup_postdata ($post); ?>
 				<div class="foto_galery-item" title="Open to see">
 						<?php the_post_thumbnail('full'); ?> 
            		<h3><?php the_title(); ?>
            			<em></em>
            		</h3>
            		<?php the_content(); ?> 
            		<div class="opacity" class=<?php echo "'".$tempid."'";?> ></div>
            		<?php $tempid++; ?>
 				</div>
			<?php endforeach; ?>
			<?php endif; ?>
			</div>
			<a class="button" href="/galery/" title="See more photos">More</a>
		</div>
	</div>
	<div class="last_news">
		<div class="content">
			<h2>Last news</h2>
			<div class="last_news_block">
			<?php $posts = get_posts ("category_name=news&orderby=date&numberposts=2"); ?>
			<?php if ($posts) : ?>
			<?php foreach ($posts as $post) : setup_postdata ($post); ?>
 				<div class="item">
 					<div class="time">
 						<div class="day"><?php the_time('j');?></div>
 						<div class="month"><?php the_time('F'); ?></div>
 					</div>
            		<h3><?php the_title(); ?></h3>
            		<?php the_excerpt() ?> 
            		<a class="button" href="<?php the_permalink(); ?>" title="Open news">More</a>
 				</div>
			<?php endforeach; ?>
			<?php endif; ?>
			
			</div>
			
		</div>
	</div>
	
</div><!-- #main-content -->
		</div>
    
        <div class="footer-push"></div>
  </div>



<?php
get_footer();