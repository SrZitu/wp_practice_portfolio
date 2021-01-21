<?php
single_cat_title();
$current_term= get_queried_object(  );
echo "<pre>";
$term_thumb_id=get_field("thumbnail",$current_term);
if($term_thumb_id){
    $file_thumb_details=wp_get_attachment_image_src( $term_thumb_id);
    echo  "<img src='". esc_url($file_thumb_details[0]) ."'>";

  }

echo "</pre>";

?> 