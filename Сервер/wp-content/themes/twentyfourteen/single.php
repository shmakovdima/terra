<?php
  $post = $wp_query->post;
 
  if (in_category('2')) {
      include(TEMPLATEPATH.'/single-productonmain.php');
  } else {
      include(TEMPLATEPATH.'/single-news.php');
  }
?>