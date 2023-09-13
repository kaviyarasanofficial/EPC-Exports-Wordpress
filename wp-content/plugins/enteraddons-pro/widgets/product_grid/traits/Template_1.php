<?php 
namespace EnteraddonsPro\Widgets\Product_Grid\Traits;
/**
 * Enteraddons template class
 *
 * @package     Enteraddons
 * @author      ThemeLooks
 * @copyright   2022 ThemeLooks
 * @license     GPL-2.0-or-later
 *
 *
 */

trait Template_1 {
    
    public static function markup_style_1() {

        $settings = self::getDisplaySettings();

        ?>
            <div class="entera-product-grid-wrap enteraddons-grid-col-<?php echo esc_attr( $settings['grid_column'] ); ?>">
                <?php
                // Product Query
                $args = array(
                    'limit' => !empty( $settings['product_limit'] ) ? $settings['product_limit'] : 10,
                    'order' => !empty( $settings['product_order'] ) ? $settings['product_order'] : 'ASC',
                );

                // Featured Product
                if( !empty( $settings['product_type'] ) && $settings['product_type'] == 'featured_product' ) {

                    $args['tax_query'][] = array(
                    'taxonomy' => 'product_visibility',
                    'field'    => 'name',
                    'terms'    => 'featured',
                    'operator' => 'IN', // or 'NOT IN' to exclude feature products
                    );

                }
                // on sale
                if( !empty( $settings['product_type'] ) && $settings['product_type'] == 'on_sale' ) {

                    $args['meta_query'] = array(
                        'relation' => 'OR',
                        array( // Simple products type
                            'key'           => '_sale_price',
                            'value'         => 0,
                            'compare'       => '>',
                            'type'          => 'numeric'
                        ),
                        array( // Variable products type
                            'key'           => '_min_variation_sale_price',
                            'value'         => 0,
                            'compare'       => '>',
                            'type'          => 'numeric'
                        )

                    );
                }
                
                $query = new \WC_Product_Query( $args );
                $products = $query->get_products();
                if( !empty( $products ) ):
                    foreach( $products  as $product ):
                    $productId = $product->get_id();
                    $productLink = get_permalink( $productId );
                    $sku = $product->get_sku();
                ?>
                <div class="ea-product-grid-item <?php echo esc_attr( $settings['product_layout'] ); ?>">
                    <a href="<?php echo esc_url( $productLink ); ?>" class="ea-grid-product-thumbnail"> 
                        <?php
                        echo wp_kses_post( $product->get_image() );
                        ?>
                    </a>
                    <div class="ea-grid-product-summary">
                        <div class="price-rating-area">
                            <span class="ea-product-grid-price">
                            <?php
                            echo wp_kses_post( $product->get_price_html() );
                            ?>
                            </span>
                            <?php
                            // Rating
                            if( !empty( $product->get_average_rating() ) && $product->get_average_rating() > 0 ) {
                                echo '<span class="star-rating">';
                                \Enteraddons\Classes\Helper::ratingStar( $product->get_average_rating() );
                                echo '</span>';
                            }
                            ?>
                        </div>
                        <h5 class="product-title"><a href="<?php echo esc_url( $productLink ); ?>"><?php echo esc_html( $product->get_name() ); ?></a></h5>
                        <div class="product-button-area">
                            <?php 
                            if( $product->is_type( 'variable' ) ) {
                                echo '<a href="'.esc_url( $productLink ).'" class="enteraddons-shop-btn" data-quantity="1" data-product_id="'.absint($productId).'" data-product_sku="'.esc_attr($sku).'">'.esc_html( $settings['variable_product_cart_btn_text'] ).'</a>';
                            } else {
                                echo '<a href="'.esc_attr( '?add-to-cart='.$productId ).'" class="enteraddons-shop-btn add_to_cart_button ajax_add_to_cart" data-quantity="1" data-product_id="'.absint($productId).'" data-product_sku="'.esc_attr($sku).'">'.esc_html( $settings['simple_product_cart_btn_text'] ).'</a>';
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <?php
                    endforeach;
                else: 
                    esc_html_e( 'No product found.', 'enteraddons' );
                endif;
                // End
                ?>
            </div>
        <?php
    }

}