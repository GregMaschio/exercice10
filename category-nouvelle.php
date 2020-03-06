<?php
/////////////////////////////////NOUVELLES
echo '<h1>' . category_description(get_category_by_slug('nouvelle')) . '</h1>';        
/* The 2nd Query (without global var) */
$args2 = array(
    "category_name" => "nouvelle",
    "posts_per_page" => 6,
    "orderby" => "date",
    "order" => "DSC"
);
$query2 = new WP_Query( $args2 );

// The 2nd Loop
while ( $query2->have_posts() ) {
            $query2->the_post();
            echo '<div class ="posts-nouvelle2">';
            the_post_thumbnail('thumbnail');
            echo '<div class ="texte-nouvelle2">';
            echo '<h3> <a href ="' . get_permalink($id) . '">' . get_the_title() ." - ". get_the_date() . '</a></h3>';
            echo '<p>' . substr(get_the_excerpt(),0,200) . '</p>'; 
            echo '</div>';
            echo '</div>';
}
// Restore original Post Data
wp_reset_postdata();
?>