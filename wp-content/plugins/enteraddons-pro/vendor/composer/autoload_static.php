<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit55b5d2d4a3edae905653280405916b91
{
    public static $prefixLengthsPsr4 = array (
        'E' => 
        array (
            'EnteraddonsPro\\Widgets\\' => 23,
            'EnteraddonsPro\\Settings_Panel\\' => 30,
            'EnteraddonsPro\\Modules\\' => 23,
            'EnteraddonsPro\\Inc\\' => 19,
            'EnteraddonsPro\\Classes\\' => 23,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'EnteraddonsPro\\Widgets\\' => 
        array (
            0 => __DIR__ . '/../..' . '/widgets',
        ),
        'EnteraddonsPro\\Settings_Panel\\' => 
        array (
            0 => __DIR__ . '/../..' . '/settings-panel',
        ),
        'EnteraddonsPro\\Modules\\' => 
        array (
            0 => __DIR__ . '/../..' . '/modules',
        ),
        'EnteraddonsPro\\Inc\\' => 
        array (
            0 => __DIR__ . '/../..' . '/inc',
        ),
        'EnteraddonsPro\\Classes\\' => 
        array (
            0 => __DIR__ . '/../..' . '/classes',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
        'EnteraddonsPro\\Classes\\Deactivation' => __DIR__ . '/../..' . '/classes/Deactivation.php',
        'EnteraddonsPro\\Classes\\Editor_Widgets_Assets' => __DIR__ . '/../..' . '/classes/Editor_Widgets_Assets.php',
        'EnteraddonsPro\\Inc\\Cross_CP' => __DIR__ . '/../..' . '/inc/Cross_CP.php',
        'EnteraddonsPro\\Inc\\Extensions_Flag' => __DIR__ . '/../..' . '/inc/Extensions_Flag.php',
        'EnteraddonsPro\\Inc\\Helper' => __DIR__ . '/../..' . '/inc/Helper.php',
        'EnteraddonsPro\\Inc\\Hooks' => __DIR__ . '/../..' . '/inc/Hooks.php',
        'EnteraddonsPro\\Inc\\Hooks_Callback' => __DIR__ . '/../..' . '/inc/Hooks_Callback.php',
        'EnteraddonsPro\\Inc\\Widgets_Flag' => __DIR__ . '/../..' . '/inc/Widgets_Flag.php',
        'EnteraddonsPro\\Modules\\Accessibilities' => __DIR__ . '/../..' . '/modules/accessibilities/Accessibilities.php',
        'EnteraddonsPro\\Modules\\Accessibilities_Based' => __DIR__ . '/../..' . '/modules/accessibilities/Accessibilities_Based.php',
        'EnteraddonsPro\\Modules\\Convert_Webp' => __DIR__ . '/../..' . '/modules/webp-converter/Convert_Webp.php',
        'EnteraddonsPro\\Modules\\HFS_Database_Table' => __DIR__ . '/../..' . '/modules/header-footer-scripts/HFS_Database_Table.php',
        'EnteraddonsPro\\Modules\\HFS_View_Components' => __DIR__ . '/../..' . '/modules/header-footer-scripts/HFS_View_Components.php',
        'EnteraddonsPro\\Modules\\HF_Template_ID' => __DIR__ . '/../..' . '/modules/header-footer/HF_Template_ID.php',
        'EnteraddonsPro\\Modules\\Header_Footer_Snippets' => __DIR__ . '/../..' . '/modules/header-footer-scripts/Header_Footer_Snippets.php',
        'EnteraddonsPro\\Modules\\Image_Compress' => __DIR__ . '/../..' . '/modules/image-compressor/Image_Compress.php',
        'EnteraddonsPro\\Modules\\Image_Compressor' => __DIR__ . '/../..' . '/modules/image-compressor/Image_Compressor.php',
        'EnteraddonsPro\\Modules\\Image_Compressor_Based' => __DIR__ . '/../..' . '/modules/image-compressor/Image_Compressor_Based.php',
        'EnteraddonsPro\\Modules\\Maintenance_Mode' => __DIR__ . '/../..' . '/modules/maintenance-mode/Maintenance_Mode.php',
        'EnteraddonsPro\\Modules\\Media_Directory' => __DIR__ . '/../..' . '/modules/Media_Directory.php',
        'EnteraddonsPro\\Modules\\Modules_DB' => __DIR__ . '/../..' . '/modules/Modules_DB.php',
        'EnteraddonsPro\\Modules\\Modules_Utility' => __DIR__ . '/../..' . '/modules/Modules_Utility.php',
        'EnteraddonsPro\\Modules\\Path_info' => __DIR__ . '/../..' . '/modules/webp-converter/Path_info.php',
        'EnteraddonsPro\\Modules\\Shortener_Components' => __DIR__ . '/../..' . '/modules/url-shortener/Shortener_Components.php',
        'EnteraddonsPro\\Modules\\Snippets_Handler' => __DIR__ . '/../..' . '/modules/header-footer-scripts/Snippets_Handler.php',
        'EnteraddonsPro\\Modules\\Speedup' => __DIR__ . '/../..' . '/modules/speedup/Speedup.php',
        'EnteraddonsPro\\Modules\\Tweaks_Based' => __DIR__ . '/../..' . '/modules/speedup/Tweaks_Based.php',
        'EnteraddonsPro\\Modules\\Url_Shortener' => __DIR__ . '/../..' . '/modules/url-shortener/Url_Shortener.php',
        'EnteraddonsPro\\Modules\\Url_Shortener_DB' => __DIR__ . '/../..' . '/modules/url-shortener/Url_Shortener_DB.php',
        'EnteraddonsPro\\Modules\\Url_Shortener_Handler' => __DIR__ . '/../..' . '/modules/url-shortener/Url_Shortener_Handler.php',
        'EnteraddonsPro\\Modules\\Url_Tracking' => __DIR__ . '/../..' . '/modules/url-shortener/Url_Tracking.php',
        'EnteraddonsPro\\Modules\\Webp_Converter' => __DIR__ . '/../..' . '/modules/webp-converter/Webp_Converter.php',
        'EnteraddonsPro\\Modules\\Webp_Upload_Support' => __DIR__ . '/../..' . '/modules/webp-converter/Webp_Upload_Support.php',
        'EnteraddonsPro\\Settings_Panel\\Accessibilities_Settings_Panel' => __DIR__ . '/../..' . '/settings-panel/Accessibilities_Settings_Panel.php',
        'EnteraddonsPro\\Settings_Panel\\Convert_Webp_Settings_Panel' => __DIR__ . '/../..' . '/settings-panel/Convert_Webp_Settings_Panel.php',
        'EnteraddonsPro\\Settings_Panel\\Image_Compress_Settings_Panel' => __DIR__ . '/../..' . '/settings-panel/Image_Compress_Settings_Panel.php',
        'EnteraddonsPro\\Settings_Panel\\Maintenance_Mode_Settings_Panel' => __DIR__ . '/../..' . '/settings-panel/Maintenance_Mode_Settings_Panel.php',
        'EnteraddonsPro\\Settings_Panel\\SettingsField\\Checkbox' => __DIR__ . '/../..' . '/settings-panel/inc/settingsfields/Checkbox.php',
        'EnteraddonsPro\\Settings_Panel\\SettingsField\\Colorpicker' => __DIR__ . '/../..' . '/settings-panel/inc/settingsfields/Colorpicker.php',
        'EnteraddonsPro\\Settings_Panel\\SettingsField\\MediaUpload' => __DIR__ . '/../..' . '/settings-panel/inc/settingsfields/MediaUpload.php',
        'EnteraddonsPro\\Settings_Panel\\SettingsField\\MultipleSelect' => __DIR__ . '/../..' . '/settings-panel/inc/settingsfields/MultipleSelect.php',
        'EnteraddonsPro\\Settings_Panel\\SettingsField\\Number' => __DIR__ . '/../..' . '/settings-panel/inc/settingsfields/Number.php',
        'EnteraddonsPro\\Settings_Panel\\SettingsField\\Selectbox' => __DIR__ . '/../..' . '/settings-panel/inc/settingsfields/Selectbox.php',
        'EnteraddonsPro\\Settings_Panel\\SettingsField\\Settings_Fields_Base' => __DIR__ . '/../..' . '/settings-panel/inc/settingsfields/Settings_Fields_Base.php',
        'EnteraddonsPro\\Settings_Panel\\SettingsField\\Text' => __DIR__ . '/../..' . '/settings-panel/inc/settingsfields/Text.php',
        'EnteraddonsPro\\Settings_Panel\\SettingsField\\Textarea' => __DIR__ . '/../..' . '/settings-panel/inc/settingsfields/Textarea.php',
        'EnteraddonsPro\\Settings_Panel\\Settings_Panel' => __DIR__ . '/../..' . '/settings-panel/Settings_Panel.php',
        'EnteraddonsPro\\Settings_Panel\\Settings_Panel_Base' => __DIR__ . '/../..' . '/settings-panel/Settings_Panel_Base.php',
        'EnteraddonsPro\\Settings_Panel\\Speedup_Settings_Panel' => __DIR__ . '/../..' . '/settings-panel/Speedup_Settings_Panel.php',
        'EnteraddonsPro\\Settings_Panel\\TabsContent\\Accessibilities_Security_Tab' => __DIR__ . '/../..' . '/settings-panel/inc/tabscontent/Accessibilities_Security_Tab.php',
        'EnteraddonsPro\\Settings_Panel\\TabsContent\\General_Settings_Tab' => __DIR__ . '/../..' . '/settings-panel/inc/tabscontent/General_Settings_Tab.php',
        'EnteraddonsPro\\Settings_Panel\\TabsContent\\Image_Compress_Settings_Tab' => __DIR__ . '/../..' . '/settings-panel/inc/tabscontent/Image_Compress_Settings_Tab.php',
        'EnteraddonsPro\\Settings_Panel\\TabsContent\\Image_Compress_Tab' => __DIR__ . '/../..' . '/settings-panel/inc/tabscontent/Image_Compress_Tab.php',
        'EnteraddonsPro\\Settings_Panel\\TabsContent\\Maintenance_Mode_Tab' => __DIR__ . '/../..' . '/settings-panel/inc/tabscontent/Maintenance_Mode_Tab.php',
        'EnteraddonsPro\\Settings_Panel\\TabsContent\\Tweaks_Tab' => __DIR__ . '/../..' . '/settings-panel/inc/tabscontent/Tweaks_Tab.php',
        'EnteraddonsPro\\Settings_Panel\\TabsContent\\Url_Shortener_Tab' => __DIR__ . '/../..' . '/settings-panel/inc/tabscontent/Url_Shortener_Tab.php',
        'EnteraddonsPro\\Settings_Panel\\TabsContent\\Webp_Convert_Tab' => __DIR__ . '/../..' . '/settings-panel/inc/tabscontent/Webp_Convert_Tab.php',
        'EnteraddonsPro\\Settings_Panel\\Url_Shortener_Settings_Panel' => __DIR__ . '/../..' . '/settings-panel/Url_Shortener_Settings_Panel.php',
        'EnteraddonsPro\\Widgets\\Accordion_Tab\\Accordion_Tab' => __DIR__ . '/../..' . '/widgets/accordion_tab/Accordion_Tab.php',
        'EnteraddonsPro\\Widgets\\Accordion_Tab\\Accordion_Tab_Template' => __DIR__ . '/../..' . '/widgets/accordion_tab/Accordion_Tab_Template.php',
        'EnteraddonsPro\\Widgets\\Accordion_Tab\\Traits\\Template_1' => __DIR__ . '/../..' . '/widgets/accordion_tab/traits/Template_1.php',
        'EnteraddonsPro\\Widgets\\Accordion_Tab\\Traits\\Templates_Components' => __DIR__ . '/../..' . '/widgets/accordion_tab/traits/Templates_Components.php',
        'EnteraddonsPro\\Widgets\\Advanced_Data_Table\\Advanced_Data_Table' => __DIR__ . '/../..' . '/widgets/advanced_data_table/Advanced_Data_Table.php',
        'EnteraddonsPro\\Widgets\\Advanced_Data_Table\\Advanced_Data_Table_Template' => __DIR__ . '/../..' . '/widgets/advanced_data_table/Advanced_Data_Table_Template.php',
        'EnteraddonsPro\\Widgets\\Advanced_Data_Table\\Traits\\Template_1' => __DIR__ . '/../..' . '/widgets/advanced_data_table/traits/Template_1.php',
        'EnteraddonsPro\\Widgets\\Advanced_Data_Table\\Traits\\Template_2' => __DIR__ . '/../..' . '/widgets/advanced_data_table/traits/Template_2.php',
        'EnteraddonsPro\\Widgets\\Advanced_Data_Table\\Traits\\Template_3' => __DIR__ . '/../..' . '/widgets/advanced_data_table/traits/Template_3.php',
        'EnteraddonsPro\\Widgets\\Advanced_Data_Table\\Traits\\Templates_Components' => __DIR__ . '/../..' . '/widgets/advanced_data_table/traits/Templates_Components.php',
        'EnteraddonsPro\\Widgets\\Comparison_Table\\Comparison_Table' => __DIR__ . '/../..' . '/widgets/comparison_table/Comparison_Table.php',
        'EnteraddonsPro\\Widgets\\Comparison_Table\\Comparison_Table_Template' => __DIR__ . '/../..' . '/widgets/comparison_table/Comparison_Table_Template.php',
        'EnteraddonsPro\\Widgets\\Comparison_Table\\Traits\\Template_1' => __DIR__ . '/../..' . '/widgets/comparison_table/traits/Template_1.php',
        'EnteraddonsPro\\Widgets\\Comparison_Table\\Traits\\Templates_Components' => __DIR__ . '/../..' . '/widgets/comparison_table/traits/Templates_Components.php',
        'EnteraddonsPro\\Widgets\\Domain_Search\\Domain_Search' => __DIR__ . '/../..' . '/widgets/domain_search/Domain_Search.php',
        'EnteraddonsPro\\Widgets\\Domain_Search\\Domain_Search_Template' => __DIR__ . '/../..' . '/widgets/domain_search/Domain_Search_Template.php',
        'EnteraddonsPro\\Widgets\\Domain_Search\\Traits\\Template_1' => __DIR__ . '/../..' . '/widgets/domain_search/traits/Template_1.php',
        'EnteraddonsPro\\Widgets\\Domain_Search\\Traits\\Template_2' => __DIR__ . '/../..' . '/widgets/domain_search/traits/Template_2.php',
        'EnteraddonsPro\\Widgets\\Domain_Search\\Traits\\Templates_Components' => __DIR__ . '/../..' . '/widgets/domain_search/traits/Templates_Components.php',
        'EnteraddonsPro\\Widgets\\Iframe\\Iframe' => __DIR__ . '/../..' . '/widgets/iframe/Iframe.php',
        'EnteraddonsPro\\Widgets\\Iframe\\Iframe_Template' => __DIR__ . '/../..' . '/widgets/iframe/Iframe_Template.php',
        'EnteraddonsPro\\Widgets\\Iframe\\Traits\\Template_1' => __DIR__ . '/../..' . '/widgets/iframe/traits/Template_1.php',
        'EnteraddonsPro\\Widgets\\Iframe\\Traits\\Templates_Components' => __DIR__ . '/../..' . '/widgets/iframe/traits/Templates_Components.php',
        'EnteraddonsPro\\Widgets\\Image_Hover_Effect\\Image_Hover_Effect' => __DIR__ . '/../..' . '/widgets/image_hover_effect/Image_Hover_Effect.php',
        'EnteraddonsPro\\Widgets\\Image_Hover_Effect\\Image_Hover_Effect_Template' => __DIR__ . '/../..' . '/widgets/image_hover_effect/Image_Hover_Effect_Template.php',
        'EnteraddonsPro\\Widgets\\Image_Hover_Effect\\Traits\\Template_1' => __DIR__ . '/../..' . '/widgets/image_hover_effect/traits/Template_1.php',
        'EnteraddonsPro\\Widgets\\Image_Hover_Effect\\Traits\\Templates_Components' => __DIR__ . '/../..' . '/widgets/image_hover_effect/traits/Templates_Components.php',
        'EnteraddonsPro\\Widgets\\Image_Swap\\Image_Swap' => __DIR__ . '/../..' . '/widgets/image_swap/Image_Swap.php',
        'EnteraddonsPro\\Widgets\\Image_Swap\\Image_Swap_Template' => __DIR__ . '/../..' . '/widgets/image_swap/Image_Swap_Template.php',
        'EnteraddonsPro\\Widgets\\Image_Swap\\Traits\\Template_1' => __DIR__ . '/../..' . '/widgets/image_swap/traits/Template_1.php',
        'EnteraddonsPro\\Widgets\\Image_Swap\\Traits\\Template_2' => __DIR__ . '/../..' . '/widgets/image_swap/traits/Template_2.php',
        'EnteraddonsPro\\Widgets\\Image_Swap\\Traits\\Templates_Components' => __DIR__ . '/../..' . '/widgets/image_swap/traits/Templates_Components.php',
        'EnteraddonsPro\\Widgets\\Marquee_Image\\Marquee_Image' => __DIR__ . '/../..' . '/widgets/marquee_image/Marquee_Image.php',
        'EnteraddonsPro\\Widgets\\Marquee_Image\\Marquee_Image_Template' => __DIR__ . '/../..' . '/widgets/marquee_image/Marquee_Image_Template.php',
        'EnteraddonsPro\\Widgets\\Marquee_Image\\Traits\\Template_1' => __DIR__ . '/../..' . '/widgets/marquee_image/traits/Template_1.php',
        'EnteraddonsPro\\Widgets\\Marquee_Image\\Traits\\Templates_Components' => __DIR__ . '/../..' . '/widgets/marquee_image/traits/Templates_Components.php',
        'EnteraddonsPro\\Widgets\\Masonry_Gallery\\Masonry_Gallery' => __DIR__ . '/../..' . '/widgets/masonry_gallery/Masonry_Gallery.php',
        'EnteraddonsPro\\Widgets\\Masonry_Gallery\\Masonry_Gallery_Template' => __DIR__ . '/../..' . '/widgets/masonry_gallery/Masonry_Gallery_Template.php',
        'EnteraddonsPro\\Widgets\\Masonry_Gallery\\Traits\\Template_1' => __DIR__ . '/../..' . '/widgets/masonry_gallery/traits/Template_1.php',
        'EnteraddonsPro\\Widgets\\Masonry_Gallery\\Traits\\Template_2' => __DIR__ . '/../..' . '/widgets/masonry_gallery/traits/Template_2.php',
        'EnteraddonsPro\\Widgets\\Masonry_Gallery\\Traits\\Templates_Components' => __DIR__ . '/../..' . '/widgets/masonry_gallery/traits/Templates_Components.php',
        'EnteraddonsPro\\Widgets\\Mini_Cart\\Mini_Cart' => __DIR__ . '/../..' . '/widgets/mini_cart/Mini_Cart.php',
        'EnteraddonsPro\\Widgets\\Mini_Cart\\Mini_Cart_Template' => __DIR__ . '/../..' . '/widgets/mini_cart/Mini_Cart_Template.php',
        'EnteraddonsPro\\Widgets\\Mini_Cart\\Traits\\Template_1' => __DIR__ . '/../..' . '/widgets/mini_cart/traits/Template_1.php',
        'EnteraddonsPro\\Widgets\\Mini_Cart\\Traits\\Templates_Components' => __DIR__ . '/../..' . '/widgets/mini_cart/traits/Templates_Components.php',
        'EnteraddonsPro\\Widgets\\Modal_Popup\\Modal_Popup' => __DIR__ . '/../..' . '/widgets/modal_popup/Modal_Popup.php',
        'EnteraddonsPro\\Widgets\\Modal_Popup\\Modal_Popup_Template' => __DIR__ . '/../..' . '/widgets/modal_popup/Modal_Popup_Template.php',
        'EnteraddonsPro\\Widgets\\Modal_Popup\\Traits\\Template_1' => __DIR__ . '/../..' . '/widgets/modal_popup/traits/Template_1.php',
        'EnteraddonsPro\\Widgets\\Modal_Popup\\Traits\\Templates_Components' => __DIR__ . '/../..' . '/widgets/modal_popup/traits/Templates_Components.php',
        'EnteraddonsPro\\Widgets\\Panorama\\Panorama' => __DIR__ . '/../..' . '/widgets/panorama/Panorama.php',
        'EnteraddonsPro\\Widgets\\Panorama\\Panorama_Template' => __DIR__ . '/../..' . '/widgets/panorama/Panorama_Template.php',
        'EnteraddonsPro\\Widgets\\Panorama\\Traits\\Template_1' => __DIR__ . '/../..' . '/widgets/panorama/traits/Template_1.php',
        'EnteraddonsPro\\Widgets\\Panorama\\Traits\\Templates_Components' => __DIR__ . '/../..' . '/widgets/panorama/traits/Templates_Components.php',
        'EnteraddonsPro\\Widgets\\Photo_Frame\\Photo_Frame' => __DIR__ . '/../..' . '/widgets/photo_frame/Photo_Frame.php',
        'EnteraddonsPro\\Widgets\\Photo_Frame\\Photo_Frame_Template' => __DIR__ . '/../..' . '/widgets/photo_frame/Photo_Frame_Template.php',
        'EnteraddonsPro\\Widgets\\Photo_Frame\\Traits\\Template_1' => __DIR__ . '/../..' . '/widgets/photo_frame/traits/Template_1.php',
        'EnteraddonsPro\\Widgets\\Photo_Frame\\Traits\\Template_2' => __DIR__ . '/../..' . '/widgets/photo_frame/traits/Template_2.php',
        'EnteraddonsPro\\Widgets\\Photo_Frame\\Traits\\Template_3' => __DIR__ . '/../..' . '/widgets/photo_frame/traits/Template_3.php',
        'EnteraddonsPro\\Widgets\\Photo_Frame\\Traits\\Templates_Components' => __DIR__ . '/../..' . '/widgets/photo_frame/traits/Templates_Components.php',
        'EnteraddonsPro\\Widgets\\Product_Category_Carousel\\Product_Category_Carousel' => __DIR__ . '/../..' . '/widgets/product_category_carousel/Product_Category_Carousel.php',
        'EnteraddonsPro\\Widgets\\Product_Category_Carousel\\Product_Category_Carousel_Template' => __DIR__ . '/../..' . '/widgets/product_category_carousel/Product_Category_Carousel_Template.php',
        'EnteraddonsPro\\Widgets\\Product_Category_Carousel\\Traits\\Template_1' => __DIR__ . '/../..' . '/widgets/product_category_carousel/traits/Template_1.php',
        'EnteraddonsPro\\Widgets\\Product_Category_Carousel\\Traits\\Templates_Components' => __DIR__ . '/../..' . '/widgets/product_category_carousel/traits/Templates_Components.php',
        'EnteraddonsPro\\Widgets\\Product_Category_Grid\\Product_Category_Grid' => __DIR__ . '/../..' . '/widgets/product_category_grid/Product_Category_Grid.php',
        'EnteraddonsPro\\Widgets\\Product_Category_Grid\\Product_Category_Grid_Template' => __DIR__ . '/../..' . '/widgets/product_category_grid/Product_Category_Grid_Template.php',
        'EnteraddonsPro\\Widgets\\Product_Category_Grid\\Traits\\Template_1' => __DIR__ . '/../..' . '/widgets/product_category_grid/traits/Template_1.php',
        'EnteraddonsPro\\Widgets\\Product_Category_Grid\\Traits\\Templates_Components' => __DIR__ . '/../..' . '/widgets/product_category_grid/traits/Templates_Components.php',
        'EnteraddonsPro\\Widgets\\Product_Grid\\Product_Grid' => __DIR__ . '/../..' . '/widgets/product_grid/Product_Grid.php',
        'EnteraddonsPro\\Widgets\\Product_Grid\\Product_Grid_Template' => __DIR__ . '/../..' . '/widgets/product_grid/Product_Grid_Template.php',
        'EnteraddonsPro\\Widgets\\Product_Grid\\Traits\\Template_1' => __DIR__ . '/../..' . '/widgets/product_grid/traits/Template_1.php',
        'EnteraddonsPro\\Widgets\\Product_Grid\\Traits\\Templates_Components' => __DIR__ . '/../..' . '/widgets/product_grid/traits/Templates_Components.php',
        'EnteraddonsPro\\Widgets\\Product_Single_Category\\Product_Single_Category' => __DIR__ . '/../..' . '/widgets/product_single_category/Product_Single_Category.php',
        'EnteraddonsPro\\Widgets\\Product_Single_Category\\Product_Single_Category_Template' => __DIR__ . '/../..' . '/widgets/product_single_category/Product_Single_Category_Template.php',
        'EnteraddonsPro\\Widgets\\Product_Single_Category\\Traits\\Template_1' => __DIR__ . '/../..' . '/widgets/product_single_category/traits/Template_1.php',
        'EnteraddonsPro\\Widgets\\Product_Single_Category\\Traits\\Templates_Components' => __DIR__ . '/../..' . '/widgets/product_single_category/traits/Templates_Components.php',
        'EnteraddonsPro\\Widgets\\Product_Viewer_360\\Product_Viewer_360' => __DIR__ . '/../..' . '/widgets/product_viewer_360/Product_Viewer_360.php',
        'EnteraddonsPro\\Widgets\\Product_Viewer_360\\Product_Viewer_360_Template' => __DIR__ . '/../..' . '/widgets/product_viewer_360/Product_Viewer_360_Template.php',
        'EnteraddonsPro\\Widgets\\Product_Viewer_360\\Traits\\Template_1' => __DIR__ . '/../..' . '/widgets/product_viewer_360/traits/Template_1.php',
        'EnteraddonsPro\\Widgets\\Product_Viewer_360\\Traits\\Templates_Components' => __DIR__ . '/../..' . '/widgets/product_viewer_360/traits/Templates_Components.php',
        'EnteraddonsPro\\Widgets\\Source_Code\\Source_Code' => __DIR__ . '/../..' . '/widgets/source_code/Source_Code.php',
        'EnteraddonsPro\\Widgets\\Source_Code\\Source_Code_Template' => __DIR__ . '/../..' . '/widgets/source_code/Source_Code_Template.php',
        'EnteraddonsPro\\Widgets\\Source_Code\\Traits\\Template_1' => __DIR__ . '/../..' . '/widgets/source_code/traits/Template_1.php',
        'EnteraddonsPro\\Widgets\\Team_Carousel\\Team_Carousel' => __DIR__ . '/../..' . '/widgets/team_carousel/Team_Carousel.php',
        'EnteraddonsPro\\Widgets\\Team_Carousel\\Team_Carousel_Template' => __DIR__ . '/../..' . '/widgets/team_carousel/Team_Carousel_Template.php',
        'EnteraddonsPro\\Widgets\\Team_Carousel\\Traits\\Template_1' => __DIR__ . '/../..' . '/widgets/team_carousel/traits/Template_1.php',
        'EnteraddonsPro\\Widgets\\Team_Carousel\\Traits\\Templates_Components' => __DIR__ . '/../..' . '/widgets/team_carousel/traits/Templates_Components.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit55b5d2d4a3edae905653280405916b91::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit55b5d2d4a3edae905653280405916b91::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit55b5d2d4a3edae905653280405916b91::$classMap;

        }, null, ClassLoader::class);
    }
}
