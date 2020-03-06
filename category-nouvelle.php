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

echo '<div class ="conteneur-nouvelles">';
// The 2nd Loop
while ( $query2->have_posts() ) {
    echo '<div class ="posts-nouvelles">';
            $query2->the_post();
            echo '<h3> <a href ="'. get_permalink($id) . '">' . substr(get_the_title( $query2->post->ID ),0,15) . '</a></h3>';
            the_post_thumbnail('thumbnail');
            echo '<p>' . substr(get_the_excerpt(),0,200) . '</p>'; 
            echo '</div>';
}
echo '</div>';
// Restore original Post Data
wp_reset_postdata();
?>