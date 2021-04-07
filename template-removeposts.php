<?php 
    // Template Name: Usunięcie postów ofert mieszkań
    $allposts= get_posts( array('post_type'=>'mieszkania','numberposts'=>-1) );

    foreach ($allposts as $eachpost) {
        wp_delete_post( $eachpost->ID, true );
    }
?>
Wykonane.