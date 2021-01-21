<?php
/**
 * Template Name: Custom Query
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

   $args = array(  
       'post__in' =>$post_ids,
  'orderby' =>'post__in',
  'post_type' => 'post' 
    );

    $loop = new WP_Query( $args ); 
        
    while ( $loop->have_posts() ) : $loop->the_post(); ?>
      <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></h2></a>
      <?php
    endwhile;

    wp_reset_query(); 

?>
    
    ?>



    <div class="container post-pagination">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-8">
                <?php
                //dynamic pagination
               echo paginate_links( array(
                 'total'=>ceil(count( $post_ids ) / $posts_per_page)
               ) );
                ?>
            </div>
        </div>
    </div>
</div>


<?php get_footer(); ?>