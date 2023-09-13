<?php 
namespace EnteraddonsPro\Widgets\Product_Viewer_360\Traits;
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

        $settings   = self::getSettings();
        $productViewerSettings = self::productViewerSettings();
        ?>
        <div class="ea-pv-wrapper" data-product-viewer-settings="<?php echo htmlspecialchars( $productViewerSettings, ENT_QUOTES, 'UTF-8' ); ?>">
            <div class="ea-productviewer" style="cursor: move;"></div>
        </div>
        <?php

    }

}