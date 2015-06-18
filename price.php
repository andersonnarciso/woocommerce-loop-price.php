<?php
/**
 * Loop Price
 *
 * @author 		Anderson Narciso
 * @package 	WooCommerce/Loop
 * @version     2.3.11
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $product;

$saleprice= get_post_meta( get_the_ID(), '_sale_price', true);

if($saleprice == ''){

    $product = get_product();
    
     if ( $product->get_price() ) {
       
      $regularprice = get_post_meta( get_the_ID(), '_regular_price', true);
            
      $desc = 13.0; // Discount value 13%
    
      $cem = 100.0; // Multiplication per 100
      
      $percentage =  $desc / $cem ; // = 13%
      
      $per = $percentage * $regularprice;
      
      $finalvalue = $regularprice - $per;

      $price = number_format($finalvalue,2,",","."); //money_format('%.2n', $finalvalue);
      
    }
 echo '<span class="price">R$'.$price.' in sight with discount!</span>';
}else{
    
    // Here, if a product on sale it does not apply the discount, he leaves the product at a discount price.

    $product = get_product();
    
     if ( $product->get_price() ) {
       
      $regularprice = get_post_meta( get_the_ID(), '_regular_price', true);
      $saleprice= get_post_meta( get_the_ID(), '_sale_price', true);
            
      $desc = 0.0;
    
      $cem = 100.0;
      
      $percentage =  $desc / $cem ; //13%
      
      $per = $percentage * $saleprice;
      
      $finalvalue = $saleprice - $per;

      $price = number_format($finalvalue,2,",","."); //money_format('%.2n', $finalvalue);
      
    }
 echo '<span class="price"><del>R$'.$regularprice.'</del></span>';   
 echo '<span class="price">R$'.$price.' in sight with discount!</span>';
} 
?>
