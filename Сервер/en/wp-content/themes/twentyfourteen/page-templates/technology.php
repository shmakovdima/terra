<?php
/**
 * Template Name: Tech
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

get_header(); ?>



<?php $posts = get_posts ("category_name=tech&orderby=date"); ?>
            <?php if ($posts) : ?>
            <?php $count=2;?>
            <?php foreach ($posts as $post) : setup_postdata ($post); ?>
                <?php 
                    if (($count % 2 == 0)) {
                        echo "<div class='techb'>";
                    }else{
                        echo "<div class='techw'>";
                    }
                ?>

                    <?php echo "<div class='content'>";?>
              
                       <h3><?php the_title(); ?>
                        
                    </h3>  
                    <?php the_post_thumbnail('full'); ?> 
                    
                 
                    <?php the_content(); ?> 
                    
                    <?php echo "</div>";?>

                    
                </div>
                

                
                <?php $count++; ?> 


            <?php endforeach; ?>
            <?php endif; ?>
           
        </div>
    
        <div class="footer-push"></div>
  </div>

<script type="text/javascript">
    $(document).ready(function(){
        var coun = 0;
        $(".techb, .techw").each(function(){
            coun++;
        });

        if ((coun%2==0)|| (coun==0)) {
            //alert(coun);
        }else{
            $(".footer_black").remove();
        }
    });

</script>
           
<div class="footer_black"></div>

<?php
get_footer();
