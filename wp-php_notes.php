<?php
/*
Template Name: PHP
*/
 ?>
 <title><?php wp_title( '|', true, 'right' ); ?></title>
<?php


$sale_items = get_option('sale');
if(empty($sale_items)){

$sale_items = array(
  'categories' => array(),
  'brands' => array()
 );
 echo "the sale list is empty";
}else{
  $sale_items = get_option('sale');
}

// array_push($sale_items["categories"], 147 , 159, 205);
// array_push($sale_items["brands"], 500 , 177, 2200);
// array_push($sale_items["categories"], 14 , 15, 20);
//
// update_option('sale' , $sale_items);
// echo '<pre>' . var_export($sale_items, true) . '</pre>';


foreach($sale_items as $key=>$val){
    // Here $val is also array like ["Hello World 1 A","Hello World 1 B"], and so on
    // And $key is index of $array array (ie,. 0, 1, ....)

    if($key == 'categories'){
      echo "categories ids:" .'<br>';
      foreach($val as $k=>$v){
        // $v is string. "Hello World 1 A", "Hello World 1 B", ......
        // And $k is $val array index (0, 1, ....)
        //echo $v . '<br />';
      }
    }
    if($key == 'brands'){
      echo "Brands ids:" .'<br>';
      foreach($val as $k=>$v){
        // $v is string. "Hello World 1 A", "Hello World 1 B", ......
        // And $k is $val array index (0, 1, ....)
        //echo $v . '<br />';
      }
    }
}

// update_option('sale', $sale_items);
echo '<pre>' . var_export($sale_items, true) . '</pre>';

function unset_item($array, $type, $item) {
  foreach($array as $key=>$val){
      if($key == $type){
        foreach($val as $k=>$v){
          if($v == $item) {
            unset($array[$type][$k]);
          }
        }
      }
  }
update_option('sale', $array);
return $array;
}

unset_item($sale_items, 'categories', 159);
echo '<pre>' . var_export(get_option('sale'), true) . '</pre>';


// if(in_array($v, $sale_items['categories'])) {
//   echo "Found cat ID on sale" . ' ' . $v;
// }


?>
 <?php wp_head(); ?>

 <?php wp_footer(); ?>
