<?php
$product_id        = $product['product_id'];
$flash_shipping    = get_post_meta($product_id, 'flash_shipping', true);
$original_shipping = get_post_meta($product_id, 'estimated_shipping', true);
//get cat id by product id
$product_info = wc_get_product($product_id);
$product_cat_id = $product_info->{'category_ids'}[0];
//get brand by product id
$brands = get_the_terms( $item_no , 'yith_product_brand' );
$product_brand_id = $brands[0]->{'term_id'};
$sale_items = get_option('flash_options');

?>
