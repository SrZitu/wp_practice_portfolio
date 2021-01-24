<?php
/**
 * Template Name: Testing Blog
 */
?>
<?php get_header(); ?>

    <?php 
     $args = array(
        'post_type' => 'post'
    );
    $loop = new WP_Query( $args ) ?>

        <?php $block=0; ?>
        <div class="container">
        <div class="row">
          <?php while ( $loop->have_posts() ) : $loop->the_post(); 
              
           if ($block%5==0 || $block%5==1|| $block%5==2) {        
            echo '<div class="col-lg-4  col-md-4 col-sm-12  test-blog">';
            echo '<h2>',the_title(),'</h2>';
             the_post_thumbnail(); 
             the_content();
            echo '</div>';
            $block++; 

          }elseif($block%5==3 || $block%5==4) {
           echo '<div class="col-lg-6  col-md-6 col-sm-12 test-blog">';
           echo '<h2>',the_title(),'</h2>';
           the_post_thumbnail();
           the_content();
           echo '</div>';
           $block++;

          }else{
            echo "no Post to Display";
          }
          
          ?>
        
          <?php  endwhile;
           wp_reset_query(); 
           ?>
            
     </div>
  </div>
 

<?php get_footer(); ?>