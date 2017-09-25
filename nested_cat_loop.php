<?php


$taxonomy     = 'product_cat';
$orderby      = 'name';
$show_count   = 0;      // 1 for yes, 0 for no
$pad_counts   = 0;      // 1 for yes, 0 for no
$hierarchical = 1;      // 1 for yes, 0 for no
$title        = '';
$empty        = 0;

$args = array(
 'taxonomy'     => $taxonomy,
 'orderby'      => $orderby,
 'show_count'   => $show_count,
 'pad_counts'   => $pad_counts,
 'hierarchical' => $hierarchical,
 'title_li'     => $title,
 'hide_empty'   => $empty
);
$all_categories = get_categories( $args );
foreach ($all_categories as $cat) {
    if($cat->category_parent == 0) {
    $category_id = $cat->term_id;
    echo '<br><b>' . $cat->term_id . ' '. $cat->name . '</b>';

    $args2 = array(
            'taxonomy'     => $taxonomy,
            'child_of'     => 0,
            'parent'       => $category_id,
            'orderby'      => $orderby,
            'show_count'   => $show_count,
            'pad_counts'   => $pad_counts,
            'hierarchical' => $hierarchical,
            'title_li'     => $title,
            'hide_empty'   => $empty
    );
    $sub_cats = get_categories( $args2 );
    if($sub_cats) {
        foreach($sub_cats as $sub_category) {
            $category_id =  $sub_category->term_id;
            echo  '<br>' . $sub_category->term_id . '-' . $sub_category->name ;
            $args3 = array(
                    'taxonomy'     => $taxonomy,
                    'child_of'     => 0,
                    'parent'       => $category_id,
                    'orderby'      => $orderby,
                    'show_count'   => $show_count,
                    'pad_counts'   => $pad_counts,
                    'hierarchical' => $hierarchical,
                    'title_li'     => $title,
                    'hide_empty'   => $empty
            );
            $sub_sub_cats = get_categories( $args3 );
            //echo "<pre>".print_r($sub_sub_cats,true)."</pre>";
            // if($sub_sub_cats) {
              foreach ($sub_sub_cats as $k=>$v) {
                echo "<br>" . $v->term_id .  "--" . $v->name;
              }
            // }
        }
    }

  }
}
?>
