<?php
/**
 * Template Name: Allnews
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

get_header(); ?>

<div id="main-content" class="main-content">
	<div class="allnews last_news">
		<div class="content">

			<h2>Новости</h2>
			<div class="last_news_block">
			<div class="line">
			<?php $posts = get_posts ("category=6&orderby=date&numberposts=20"); ?>
			<?php if ($posts) : ?>
			<?php $count=1;?>
			<?php foreach ($posts as $post) : setup_postdata ($post); ?>
 				<div class="item">
 					<div class="time">
 						<div class="day"><?php the_time('j');?></div>
 						<div class="month"><?php the_time('F'); ?></div>
 					</div>
 					<h3><?php the_title(); ?></h3>
            		<?php the_excerpt() ?> 
            		<a class="button" href="<?php the_permalink(); ?>" title="Открыть новость">Больше</a>
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

		</div>
    
        <div class="footer-push"></div>
  </div>

<div class="footer_black"></div>

<?php
get_footer();
