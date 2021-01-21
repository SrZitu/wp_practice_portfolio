<?php
/**
 * Template Name: Custom Query Wpquery
 */
?>
<?php get_header(); ?>
<body <?php body_class(); ?>>
<?php get_template_part("/template-parts/common/hero"); ?>
<div class="posts text-center">
  
    <?php
    $paged= (get_query_var('paged')) ? get_query_var('paged') : 1;
    $posts_per_page = 2;
    $post_ids= array( 17, 139, 121, 111, 108 );

   $p = array(  
     'posts_per_page' => $posts_per_page,
       'post__in' =>$post_ids,
  'orderby' =>'post__in',
  'paged' => $paged
    );

    $newpost = new WP_Query($p); 
        
    while ( $newpost->have_posts() ) {
      $newpost->the_post();
       ?>
      <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></h2></a>
      <?php
    }
    wp_reset_query(); 
?>
    
    <div class="container post-pagination">
        <div class="row">
            
            <div class="col-md-12">
                <?php
                //dynamic pagination
               echo paginate_links( array(
                 'total'=>$newpost->max_num_pages,
                 'current'=> $pagedhttps://github.com/SrZitu/wp_practice_portfolio
                

               ) );
                ?>
            </div>
        </div>
    </div>
</div>


<?php get_footer(); ?>
