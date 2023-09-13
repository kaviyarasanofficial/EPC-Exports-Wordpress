<?php 
namespace EnteraddonsPro\Widgets\Source_Code\Traits;
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
        $getObj = self::getObj();
        
        $lng = $settings['language'];
        ?>
        <div class="ea-source-code">
            <div data-lng="<?php echo esc_attr( $lng ); ?>" class="<?php echo 'prismjs-' . esc_attr( $settings['theme'] ); ?> <?php echo esc_attr( $settings['copy_to_clipboard'] ); ?> <?php echo esc_attr( $settings['word_wrap'] ); ?>">
                <pre data-line="<?php echo esc_attr( $settings['highlight_lines'] ); ?>" class="highlight-height language-<?php echo esc_attr( $lng ); ?> <?php echo esc_attr( $settings['line_numbers'] ); ?>">
                    <code readonly="true" class="language-<?php echo esc_attr( $lng ); ?>">
                        <xmp><?php $getObj->print_unescaped_setting( 'code' ); ?></xmp>
                    </code>
                </pre>
            </div>
        </div>
        <?php
    }

}