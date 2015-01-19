<?php
/**
 * The template for displaying Search Results pages
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

get_header(); ?>


			<?php if ( have_posts() ) : ?>
				<div id="main-content" class="main-content">
				<div class="products">
				<div class="content">
				<h2>Search by <?php echo get_search_query();?></h2>
				<div class="line">
				<?php $count=1;?>
			
				<?php
					// Start the Loop.
					while ( have_posts() ) : the_post();?>
					<div class="item">

						<div class="img_block">
 							<?php the_post_thumbnail('full'); ?> 
 						</div>
 					
 						<?php $title = get_the_title(); $keys= explode(" ",$s); $title = preg_replace('/('.implode('|', $keys) .')/iu', '<strong class="search-excerpt">\0</strong>', $title); ?>
 					    <h3><?php echo $title; ?></h3>
            			<?php the_content(); ?> 
 					</div>
 				<?php 
 					if (($count % 2 == 0) && ($count!=0)) {
 						echo "</div><div class='line'>";
 					} 

 					$count++;
											

					endwhile;
					// Previous/next post navigation.
					?>
					</div>
				</div>
			</div>
		</div>
<?php
				else :
					echo '
	<div id="primary" class="content-area no_found">
		<div id="content" class="site-content" role="main">
		    <h2>No items found by ';
		   echo get_search_query();
		    echo '</h2>
			
		</div><!-- #content -->
	</div><!-- #primary -->


';

					// If no content, include the "No posts found" template.
					//get_template_part( 'content', 'none' );

				endif;
			?>

		</div>
    
        <div class="footer-push"></div>
  </div>


<div class="footer_black"></div>


<?php

get_footer();
