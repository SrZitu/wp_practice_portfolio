<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package my_portfolio_demo
 */

get_header();
?>

	<main id="primary" class="site-main">

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', get_post_type() );

			the_post_navigation(
				array(
					'prev_text' => '<span class="nav-subtitle">' . esc_html__( 'Previous:', 'my-portfolio-demo' ) . '</span> <span class="nav-title">%title</span>',
					'next_text' => '<span class="nav-subtitle">' . esc_html__( 'Next:', 'my-portfolio-demo' ) . '</span> <span class="nav-title">%title</span>',
				)
			);

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

              
                   <!-- Relational joining -->
               <!-- Relational joining -->
               

                  <?php if(function_exists("the_field")) :?>
                  <div>
                  <h1><?php _e( "Related postss", "testt" ); ?></h1>
                  <?php
                  $related_posts= get_field("related");
                  $hello_world_rp= new WP_Query(array(
                    'post__in'=>$related_posts,
                    'orderby'=>'post__in',
                  ));

                  while($hello_world_rp->have_posts()){
                    $hello_world_rp->the_post();
                    ?>
                    <h4><?php the_title();?></h4>
                    <?php
                  }
                  wp_reset_query();
                  ?>
                  <?php endif; ?>
                  </div>
            
            <?php 
            //link for post
            wp_link_pages();
            
            ?>


	</main><!-- #main -->

<?php
get_sidebar();
get_footer();
