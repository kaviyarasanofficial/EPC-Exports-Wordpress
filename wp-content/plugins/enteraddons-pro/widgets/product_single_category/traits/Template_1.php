<?php 
namespace EnteraddonsPro\Widgets\Product_Single_Category\Traits;
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
        $labelType = !empty( $settings['category_label_position_type'] ) ? $settings['category_label_position_type'] : '';
        $showCount = !empty( $settings['show_product_count'] ) ? $settings['show_product_count'] : '';
        $countText = !empty( $settings['product_count_text'] ) ? $settings['product_count_text'] : '';

        if( empty( $settings['product_cat'] ) ) {
            return;
        }

        $term = get_term( absint( $settings['product_cat'] ), 'product_cat' );

        // get the thumbnail id using the
        $thumbnail_id = get_term_meta( $term->term_id, 'thumbnail_id', true ); 
        // get the image URL
        $image = wp_get_attachment_url( $thumbnail_id );
        // Get category link
        $url = get_term_link( $term );

        ?>
        <div class="ea-wc-product-cat-single-item <?php echo esc_attr( $labelType ); ?>">
            <img src="<?php echo esc_url( $image ); ?>">
            <div class="ea-cat-info">
                <h3>
                    <a href="<?php echo esc_url( $url ); ?>"><?php echo esc_html( $term->name ); ?></a> 
                    <?php 
                    if( $showCount ):
                    ?>
                    <span>
                    <?php 
                    if( !empty( $countText ) ) {
                        $text = $term->count.' '.$countText;
                    }else {
                        $text = '('.$term->count.')';
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
    }

}