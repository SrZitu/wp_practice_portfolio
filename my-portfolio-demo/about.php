<?php
/**
 * Template Name: About
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package my_portfolio_demo
 */

get_header();
?>

  <main id="main">

    <!-- ======= About Section ======= -->
    <section id="about" class="about-mf sect-pt4 route">
      <div class="container">
        <div class="row">
          <div class="col-sm-12">
            <div class="box-shadow-full">
              <div class="row">
                <div class="col-md-6">
                  <div class="row">
                    <div class="col-sm-6 col-md-5">
                      <div class="about-img">
                      <?php 
                    $image = get_field('newimage');
                    if( !empty( $image ) ): ?>
                        <img  src="<?php echo esc_url($image['url']); ?>" class="img-fluid rounded b-shadow-a" alt="<?php echo esc_attr($image['alt']); ?>" />
                    <?php endif; ?>
                       
                      </div>
                    </div>
                    <div class="col-sm-6 col-md-7">
                      <div class="about-info">
                        <p><span class="title-s">Name: </span> <span><?php  the_field("name");?></span></p>
                        <p><span class="title-s">Profile: </span> <span><?php  the_field("profile");?></span></p>
                        <p><span class="title-s"> Date:</span> <span>
                        <?php
                        $date= get_field('date');
                        echo esc_html($date);
                        ?>
                        </span></p>
                        
                      </div>
                    </div>
                  </div>
                  <div class="skill-mf">
                    <p class="title-s">Skill</p>
                    <span>HTML</span> <span class="pull-right">85%</span>
                    <div class="progress">
                      <div class="progress-bar" role="progressbar" style="width: 85%;" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <span>CSS3</span> <span class="pull-right">75%</span>
                    <div class="progress">
                      <div class="progress-bar" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <span>PHP</span> <span class="pull-right">50%</span>
                    <div class="progress">
                      <div class="progress-bar" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <span>JAVASCRIPT</span> <span class="pull-right">90%</span>
                    <div class="progress">
                      <div class="progress-bar" role="progressbar" style="width: 90%" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="about-me pt-4 pt-md-0">
                    <div class="title-box-2">
                      <h5 class="title-left">
                       Download File
                      </h5>
                       <!-- thumbnail image for file via id -->
                        <?php
                        $file= get_field("newfile");
                          if($file){
                            $file_url=wp_get_attachment_url($file);
                          
                            $file_thumb= get_field("thumbnail", $file);
                         
                            //here ("thumbnail", $file) here thumbnail is another meta field name and $file is the file id which is saved in the variable file.

                            if($file_thumb){
                             $file_thumb_details=wp_get_attachment_image_src( $file_thumb);
                              echo  "<a target='_blank' href='{$file_url}'><img src='". esc_url($file_thumb_details[0]) ."'></a>";

                            }else{

                               echo  "<a target='_blank' href='{$file_url}'>{$file_url}</a>";
                            }
                          }
                  
                      ?>
                   
                  <pre>
                   
                   
                   
                   
                    </div>
           
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section><!-- End About Section -->


   



  

  </main><!-- End #main -->

<?php

get_footer();
