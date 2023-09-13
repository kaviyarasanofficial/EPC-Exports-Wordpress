<?php 
namespace EnteraddonsPro\Widgets\Product_Category_Grid\Traits;
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
            <div class="ea-product-category-grid-wrap">
                <div class="enteraddons-grid-col-<?php echo esc_attr( $settings['grid_column'] ); ?>">
                    <?php
                    //
                    $labelType = !empty( $settings['category_label_position_type'] ) ? $settings['category_label_position_type'] : '';
                    $showCount = !empty( $settings['show_product_count'] ) ? $settings['show_product_count'] : '';
                    $countText = !empty( $settings['product_count_text'] ) ? $settings['product_count_text'] : '';
                    $limit   = !empty( $settings['product_limit'] ) ? $settings['product_limit'] : 5;
                    $order   = !empty( $settings['product_order'] ) ? $settings['product_order'] : 'ASC';
                    // Query args
                    $cat_args = array(
                        'order'      => esc_html( $order ),
                        'number'     => esc_html( $limit ),
                        'hide_empty' => true,
                    );
                     
                    $product_categories = get_terms( 'product_cat', $cat_args );
                    
                    if( !empty( $product_categories ) ):
                        foreach( $product_categories  as $category ):
                            
                        // get the thumbnail id using the
                        $thumbnail_id = get_term_meta( $category->term_id, 'thumbnail_id', true ); 
                        // get the image URL
                        $image = wp_get_attachment_url( $thumbnail_id );
                        // Get category link
                        $url = get_term_link( $category );
                    ?>
                    <div class="ea-cat-single-item <?php echo esc_attr( $labelType ); ?>">
                        <img src="<?php echo esc_url( $image ); ?>">
                        <div class="ea-cat-info">
                            <h3>
                                <a href="<?php echo esc_url( $url ); ?>"><?php echo esc_html( $category->name ); ?></a> 
                                <?php 
                                if( $showCount ):
                                ?>
                                <span>
                                <?php 
                                if( !empty( $countText ) ) {
                                    $text = $category->count.' '.$countText;
                                }else {
                                    $text = '('.$category->count.')';
                                }
                                echo esc_html( $text );
                                ?>
                                </span>
                                <?php 
                                endif;
                                ?>
                            </h3>
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
            </div>
        <?php
    }

}