<?php 
namespace EnteraddonsPro\Widgets\Team_Carousel\Traits;
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

trait Templates_Components {
	
    // Set Settings options
    protected static function getSettings() {
        return self::getDisplaySettings();
    }

    public static function carouselSettings() {

        $settings = self::getDisplaySettings();

        $responsive = [];
        if( !empty( $settings['slider_items_mobile'] ) || !empty( $settings['slider_items_tablet'] ) ) {
           $responsive = [ '0' => ['items' => $settings['slider_items_mobile']], '768' => [ 'items' => $settings['slider_items_tablet'] ], '1025' => ['items' => $settings['slider_items']] ]; 
        }

        $sliderSettings = [

            'items'         => !empty( $settings['slider_items'] ) ? $settings['slider_items'] : 3,
            'margin'        => !empty( $settings['slider_margin'] ) ? $settings['slider_margin'] : 0,
            'loop'          => !empty( $settings['slider_loop'] ) && $settings['slider_loop'] == 'yes' ? true : false,
            'smartSpeed'    => !empty( $settings['slider_smartSpeed'] ) ? $settings['slider_smartSpeed'] : 450,
            'autoplay'      => !empty( $settings['slider_autoplay'] ) && $settings['slider_autoplay'] == 'yes' ? true : false,
            'autoplayTimeout'  => !empty( $settings['slider_autoplayTimeout'] ) ? $settings['slider_autoplayTimeout'] : 8000,
            'center'        => !empty( $settings['slider_center'] ) && $settings['slider_center'] == 'yes' ? true : false,
            'animateIn'     => !empty( $settings['slider_animateIn'] ) && $settings['slider_animateIn'] == 'yes' ? true : false,
            'animateOut'    => !empty( $settings['slider_animateOut'] ) && $settings['slider_animateOut'] == 'yes' ? true : false,
            'nav'           => !empty( $settings['slider_nav'] ) && $settings['slider_nav'] == 'yes' ? true : false,
            'dots'          => !empty( $settings['slider_dots'] ) && $settings['slider_dots'] == 'yes' ? true : false,
            'mousedrag'     => !empty( $settings['slider_mouseDrag'] ) && $settings['slider_mouseDrag'] == 'yes' ? true : false,
            'autoWidth'     => !empty( $settings['slider_autoWidth'] ) && $settings['slider_autoWidth'] == 'yes' ? true : false,
            'responsive'     => $responsive

        ];

        return json_encode( $sliderSettings );

    }

   
    // Name
    public static function name( $team_item ) {

        if( !empty( $team_item['name'] ) ) {
            echo '<h5 class="team-carousel-title">'.esc_html( $team_item['name'] ).'</h5>';
        }
    }

    // Designation
    public static function designation( $team_item ) {

        if( !empty( $team_item['designation'] ) ) {
            echo '<p class="team-carousel-designation">'.esc_html( $team_item['designation'] ).'</p>';
        }
    }

    // Experience
    public static function experience( $team_item ) {

        if( !empty( $team_item['experience'] ) ) {
            echo '<span class="enteradd--experience">'.esc_html( $team_item['experience'] ).'</span>';
        }

    }

    // Descriptions
    public static function descriptions( $team_item ) {

        if( !empty( $team_item['descriptions'] ) ) {
            echo '<p class="enteradd--descriptions descriptions">'.esc_html( $team_item['descriptions'] ).'</p>';
        }
    }

    // Link
    public static function link( $team_item ) {

        $label     = !empty( $team_item['link_label'] ) ?  $team_item['link_label'] : esc_html__( 'VIEW DETAILS', 'enteraddons' );
        echo \Enteraddons\Classes\Helper::getElementorLinkHandler( $team_item['more_link'], $label, 'readme-more-link');
    }

    // Image
    public static function image( $team_item ) {

        if( !empty( $team_item['image']['url'] ) ) {
           echo  '<img src="'.esc_url( $team_item['image']['url'] ).'" >';
        }
    }

    // Social Icon

    public static function socialIcons1( $team_item ) {

        if (!empty ( $team_item ['website_icon']  && $team_item  ['website_url'] )) {
                $icon = \Enteraddons\Classes\Helper::getElementorIcon( $team_item['website_icon'] );
                echo \Enteraddons\Classes\Helper::getElementorLinkHandler( $team_item['website_url'], $icon );
        }
                
    }

    public static function socialIcons2( $team_item ) {

        if( !empty( $team_item ['email_icon']  && $team_item  ['email_icon'] )) {
                $icon = \Enteraddons\Classes\Helper::getElementorIcon( $team_item['email_icon'] );
                echo \Enteraddons\Classes\Helper::getElementorLinkHandler( $team_item['email_url'], $icon );
        }
        
    }

    public static function socialIcons3( $team_item ) {

        if( !empty( $team_item ['facebook_icon']  && $team_item  ['facebook_url'] )) {
                $icon = \Enteraddons\Classes\Helper::getElementorIcon( $team_item['facebook_icon'] );
                echo \Enteraddons\Classes\Helper::getElementorLinkHandler( $team_item['facebook_url'], $icon );
        }

    }

    public static function socialIcons4( $team_item ) {

        if( !empty( $team_item ['twitter_icon']  && $team_item  ['Twitter_url'] )) {
                $icon = \Enteraddons\Classes\Helper::getElementorIcon( $team_item['twitter_icon'] );
                echo \Enteraddons\Classes\Helper::getElementorLinkHandler( $team_item['Twitter_url'], $icon );
        }
    }

    public static function socialIcons5( $team_item ) {

        if(!empty ( $team_item ['instagram_icon']  && $team_item  ['instagram_url'] )) {
                $icon = \Enteraddons\Classes\Helper::getElementorIcon( $team_item['instagram_icon'] );
                echo \Enteraddons\Classes\Helper::getElementorLinkHandler( $team_item['instagram_url'], $icon );
        }
        
    }

    public static function socialIcons6( $team_item ) {
        
        if( !empty( $team_item ['github_icon']  && $team_item  ['github_url'] )) {
                $icon = \Enteraddons\Classes\Helper::getElementorIcon( $team_item['github_icon'] );
                echo \Enteraddons\Classes\Helper::getElementorLinkHandler( $team_item['github_url'], $icon );

        }
    }

    public static function socialIcons7( $team_item ) {
        
        if( !empty( $team_item ['linkedin_icon']  && $team_item ['linkedin_url'] )) {
                $icon = \Enteraddons\Classes\Helper::getElementorIcon( $team_item['linkedin_icon'] );
                echo \Enteraddons\Classes\Helper::getElementorLinkHandler( $team_item['linkedin_url'], $icon );
        }
        
    }
}