<?php

    if ( ! class_exists( 'Redux' ) ) {
        return;
    }

    // This is your option name where all the Redux data is stored.
    $opt_name = "yachtcharter_data";

    $theme = wp_get_theme(); // For use with some settings. Not necessary.
	
    $args = array(   
        'opt_name'             => $opt_name,
        'display_name'         => $theme->get( 'Name' ),
        'display_version'      => $theme->get( 'Version' ),
        'menu_type'            => 'menu',
        'allow_sub_menu'       => false,
        'menu_title'           => esc_html__( 'Theme Options', 'yachtcharter' ),
        'page_title'           => esc_html__( 'Theme Options', 'yachtcharter' ),
        'google_api_key'       => '',
        'google_update_weekly' => false,
        'async_typography'     => true,
        'admin_bar'            => true,
        'admin_bar_icon'       => 'dashicons-portfolio',
        'admin_bar_priority'   => 50,
        'global_variable'      => '',
        'dev_mode'             => false,
        'update_notice'        => true,
        'customizer'           => true,
        'page_priority'        => null,
        'page_parent'          => 'themes.php',
        'page_permissions'     => 'manage_options',
        'menu_icon'            => '',
        'last_tab'             => '',
        'page_icon'            => 'icon-themes',
        'page_slug'            => '',
        'save_defaults'        => true,
        'default_show'         => false,
        'default_mark'         => '',
        'show_import_export'   => true,
        'transient_time'       => 60 * MINUTE_IN_SECONDS,
        'output'               => true,
        'output_tag'           => true,
        'database'             => '',
        'use_cdn'              => true,
        'hints'                => array(
            'icon'          => 'el el-question-sign',
            'icon_position' => 'right',
            'icon_color'    => 'lightgray',
            'icon_size'     => 'normal',
            'tip_style'     => array(
                'color'   => 'red',
                'shadow'  => true,
                'rounded' => false,
                'style'   => '',
            ),
            'tip_position'  => array(
                'my' => 'top left',
                'at' => 'bottom right',
            ),
            'tip_effect'    => array(
                'show' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'mouseover',
                ),
                'hide' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'click mouseleave',
                ),
            ),
        )
    );

    Redux::setArgs( $opt_name, $args );

    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'General', 'yachtcharter' ),
        'id'               => 'general',
        'desc'             => '',
        'customizer_width' => '400px',
        'icon'             => 'el el-home',
		
		'fields'           => array(
			array(
                'id'       => 'site-layout-style',
                'type'     => 'radio',
                'title'    => esc_html__( 'Site Layout Style', 'yachtcharter' ),
                'subtitle' => esc_html__( '', 'yachtcharter' ),
                'desc'     => esc_html__( '', 'yachtcharter' ),
                'options'  => array(
                    'right-sidebar' => 'Right Sidebar',
                    'left-sidebar' => 'Left Sidebar',
                    'full-width' => 'Full Width'
                ),
                'default'  => 'right-sidebar'
            ),
			array(
				'id'       => 'site-header-style',
				'type'     => 'radio',
				'title'    => esc_html__( 'Header Style', 'yachtcharter' ),
				'subtitle' => esc_html__( '', 'yachtcharter' ),
				'desc'     => esc_html__( '', 'yachtcharter' ),
				'options'  => array(
					'yacht-header-left-align' => 'Left Align Logo',
					'yacht-header-center-align' => 'Center Align Logo'
				),
				'default'  => 'yacht-header-left-align'
			),
			array(
				'id'       => 'site-footer-style',
				'type'     => 'radio',
				'title'    => esc_html__( 'Footer Message Style', 'yachtcharter' ),
				'subtitle' => esc_html__( '', 'yachtcharter' ),
				'desc'     => esc_html__( '', 'yachtcharter' ),
				'options'  => array(
					'yacht-footer-left-align' => 'Left / Right Align',
					'yacht-footer-center-align' => 'Center Align'
				),
				'default'  => 'yacht-footer-left-align'
			),
			array(
                'id'       => 'currency-position',
                'type'     => 'radio',
                'title'    => esc_html__( 'Currency Symbol Position', 'yachtcharter' ),
                'subtitle' => esc_html__( '', 'yachtcharter' ),
                'desc'     => esc_html__( '', 'yachtcharter' ),
                'options'  => array(
                    'before' => 'Before e.g. $10',
                    'after' => 'After e.g. 10$'
                ),
                'default'  => 'before'
            ),
			array(
                'id'       => 'booking-url',
                'type'     => 'text',
                'title'    => esc_html__( 'Booking Form URL', 'yachtcharter' ),
                'subtitle' => esc_html__( '', 'yachtcharter' ),
                'desc'     => esc_html__( 'e.g. http://website.com/booking', 'yachtcharter' ),
                'default'  => '',
            ),
			array(
                'id'       => 'google-map-api-key',
                'type'     => 'text',
                'title'    => esc_html__( 'Google Map API Key', 'yachtcharter' ),
                'subtitle' => esc_html__( '', 'yachtcharter' ),
                'desc'     => esc_html__( '', 'yachtcharter' ),
                'default'  => '',
            ),
			array(
                'id'       => '404-background',
                'type'     => 'media',
                'title'    => esc_html__( '404 Page Background Image', 'yachtcharter' ),
                'desc'     => esc_html__( '', 'yachtcharter' ),
                'subtitle' => esc_html__( '', 'yachtcharter' )
            ),
			array(
                'id'       => 'top-left-address',
                'type'     => 'text',
                'title'    => esc_html__( 'Address', 'yachtcharter' ),
                'subtitle' => esc_html__( '', 'yachtcharter' ),
                'desc'     => esc_html__( 'e.g. 1 Roadtown Street, British Virgin Islands', 'yachtcharter' ),
                'default'  => '1 Roadtown Street, British Virgin Islands',
            ),
			array(
                'id'       => 'top-left-phone',
                'type'     => 'text',
                'title'    => esc_html__( 'Phone', 'yachtcharter' ),
                'subtitle' => esc_html__( '', 'yachtcharter' ),
                'desc'     => esc_html__( 'e.g. 1800-1111-2222', 'yachtcharter' ),
                'default'  => '1800-1111-2222',
            ),
			array(
                'id'       => 'top-left-open-times',
                'type'     => 'text',
                'title'    => esc_html__( 'Open Times', 'yachtcharter' ),
                'subtitle' => esc_html__( '', 'yachtcharter' ),
                'desc'     => esc_html__( 'e.g. Mon - Sat 9.00 - 18.30. Sunday Closed', 'yachtcharter' ),
                'default'  => 'Mon - Sat 9.00 - 18.30. Sunday Closed',
            ),
			array(
                'id'       => 'top-left-email',
                'type'     => 'text',
                'title'    => esc_html__( 'Email Address', 'yachtcharter' ),
                'subtitle' => esc_html__( '', 'yachtcharter' ),
                'desc'     => esc_html__( 'e.g. booking@example.com', 'yachtcharter' ),
                'default'  => 'booking@example.com',
            ),
			array(
                'id'       => 'top-right-button-text',
                'type'     => 'text',
                'title'    => esc_html__( 'Top Right Button Text', 'yachtcharter' ),
                'subtitle' => esc_html__( '', 'yachtcharter' ),
                'desc'     => esc_html__( 'e.g. Online Booking', 'yachtcharter' ),
                'default'  => 'Online Booking',
            ),
			array(
                'id'       => 'top-right-button-url',
                'type'     => 'text',
                'title'    => esc_html__( 'Top Right Button URL', 'yachtcharter' ),
                'subtitle' => esc_html__( '', 'yachtcharter' ),
                'desc'     => esc_html__( 'e.g. http://website.com/booking', 'yachtcharter' ),
                'default'  => '',
            ),
			array(
                'id'       => 'top-right-button-link-target',
                'type'     => 'checkbox',
                'title'    => esc_html__( 'Open top right button in new window/tab', 'yachtcharter' ),
                'subtitle' => esc_html__( '', 'yachtcharter' ),
                'desc'     => esc_html__( '', 'yachtcharter' ),
                'default'  => '0'// 1 = on | 0 = off
            ),
			array(
                'id'       => 'footer-message',
                'type'     => 'text',
                'title'    => esc_html__( 'Footer Message', 'yachtcharter' ),
                'subtitle' => esc_html__( '', 'yachtcharter' ),
                'desc'     => esc_html__( 'Text displayed in the bottom center of the site footer', 'yachtcharter' ),
                'default'  => '&copy; 2017 Yacht Charter. All Rights Reserved',
            ),
			array(
                'id'       => 'yacht_charters_slug',
                'type'     => 'text',
                'title'    => esc_html__( 'Yacht Charters Page URL', 'yachtcharter' ),
                'subtitle' => esc_html__( '', 'yachtcharter' ),
                'desc'     => esc_html__( 'Required for the breadcrumbs', 'yachtcharter' ),
                'default'  => '',
            ),
			array(
                'id'       => 'yacht_sales_slug',
                'type'     => 'text',
                'title'    => esc_html__( 'Yacht Sales Page URL', 'yachtcharter' ),
                'subtitle' => esc_html__( '', 'yachtcharter' ),
                'desc'     => esc_html__( 'Required for the breadcrumbs', 'yachtcharter' ),
                'default'  => '',
            ),
			array(
                'id'       => 'locations_slug',
                'type'     => 'text',
                'title'    => esc_html__( 'Locations Page URL', 'yachtcharter' ),
                'subtitle' => esc_html__( '', 'yachtcharter' ),
                'desc'     => esc_html__( 'Required for the breadcrumbs', 'yachtcharter' ),
                'default'  => '',
            ),
			array(
                'id'       => 'testimonials_slug',
                'type'     => 'text',
                'title'    => esc_html__( 'Testimonials Page URL', 'yachtcharter' ),
                'subtitle' => esc_html__( '', 'yachtcharter' ),
                'desc'     => esc_html__( 'Required for the breadcrumbs', 'yachtcharter' ),
                'default'  => '',
            ),
        )

    ) );

Redux::setSection( $opt_name, array(
    'title'            => esc_html__( 'Logo', 'yachtcharter' ),
    'id'               => 'logo',
    'desc'             => '',
    'customizer_width' => '400px',
    'icon'             => 'el el-picture',
	
	'fields'           => array(
		array(
            'id'       => 'logo-image',
            'type'     => 'media',
            'title'    => esc_html__( 'Logo Image', 'yachtcharter' ),
            'desc'     => esc_html__( 'Add a logo image', 'yachtcharter' ),
            'subtitle' => esc_html__( '', 'yachtcharter' )
        ),
    )

) );

    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Colors', 'yachtcharter' ),
        'id'               => 'colors',
        'desc'             => '',
        'customizer_width' => '400px',
        'icon'             => 'el el-cog',
		
		'fields'     => array(
			array(
                'id'       => 'main-color',
                'type'     => 'color',
                'title'    => esc_html__( 'Main Color', 'yachtcharter' ),
                'subtitle' => esc_html__( 'Pick a main color for the theme (default: #85a5cc).', 'yachtcharter' ),
                'default'  => '#85a5cc',
				'validate' => 'color',
            ),
            array(
                'id'       => 'secondary-color',
                'type'     => 'color',
                'title'    => esc_html__( 'Secondary Background Color', 'yachtcharter' ),
                'subtitle' => esc_html__( 'Pick a background color for the footer / other dark areas (default: #1a1f2b).', 'yachtcharter' ),
                'default'  => '#1a1f2b',
                'validate' => 'color',
            ),
			array(
                'id'       => 'secondary-color-border',
                'type'     => 'color',
                'title'    => esc_html__( 'Secondary Color Border Color', 'yachtcharter' ),
                'subtitle' => esc_html__( 'Border color overlayed on the secondary color (default: #2f3545).', 'yachtcharter' ),
                'default'  => '#2f3545',
                'validate' => 'color',
            ),
			array(
                'id'       => 'mobile-nav-color',
                'type'     => 'color',
                'title'    => esc_html__( 'Mobile Navigation Background Color', 'yachtcharter' ),
                'subtitle' => esc_html__( 'Used for the mobile navigation (default: #272f43).', 'yachtcharter' ),
                'default'  => '#272f43',
                'validate' => 'color',
            ),
			array(
                'id'       => 'header-background-color',
                'type'     => 'color',
                'title'    => esc_html__( 'Header Background Color', 'yachtcharter' ),
                'subtitle' => esc_html__( 'Used for the page header area where the logo and menu are (default: #ffffff).', 'yachtcharter' ),
                'default'  => '#ffffff',
                'validate' => 'color',
            ),
			array(
                'id'       => 'header-text-color',
                'type'     => 'color',
                'title'    => esc_html__( 'Header Text Color', 'yachtcharter' ),
                'subtitle' => esc_html__( 'Used for the page header area where the logo and menu are (default: #424242).', 'yachtcharter' ),
                'default'  => '#424242',
                'validate' => 'color',
            ),
			array(
                'id'       => 'header-border-color',
                'type'     => 'color',
                'title'    => esc_html__( 'Header Border Color', 'yachtcharter' ),
                'subtitle' => esc_html__( 'Used for the borders in the page header area where the logo and menu are (default: #e8e8e8).', 'yachtcharter' ),
                'default'  => '#e8e8e8',
                'validate' => 'color',
            ),
			array(
                'id'       => 'footer-background-color',
                'type'     => 'color',
                'title'    => esc_html__( 'Footer Background Color', 'yachtcharter' ),
                'subtitle' => esc_html__( 'Used for the area where widgets are displayed in the footer (default: #1a1f2b).', 'yachtcharter' ),
                'default'  => '#1a1f2b',
                'validate' => 'color',
            ),
			array(
                'id'       => 'footer-bottom-background-color',
                'type'     => 'color',
                'title'    => esc_html__( 'Footer Bottom Background Color', 'yachtcharter' ),
                'subtitle' => esc_html__( 'Used for the area where the copyright message and social icons are displayed in the footer (default: #85a5cc).', 'yachtcharter' ),
                'default'  => '#85a5cc',
                'validate' => 'color',
            ),
			array(
                'id'       => 'footer-title-text-color',
                'type'     => 'color',
                'title'    => esc_html__( 'Footer Widget Title Text Color', 'yachtcharter' ),
                'subtitle' => esc_html__( 'Used for widgets in the footer (default: #ffffff).', 'yachtcharter' ),
                'default'  => '#ffffff',
                'validate' => 'color',
            ),
			array(
                'id'       => 'footer-text-color',
                'type'     => 'color',
                'title'    => esc_html__( 'Footer Text Color', 'yachtcharter' ),
                'subtitle' => esc_html__( 'Used for text in widgets display in the footer (default: #ffffff).', 'yachtcharter' ),
                'default'  => '#ffffff',
                'validate' => 'color',
            ),
			array(
                'id'       => 'footer-bottom-text-color',
                'type'     => 'color',
                'title'    => esc_html__( 'Footer Bottom Text Color', 'yachtcharter' ),
                'subtitle' => esc_html__( 'Used for the text where the copyright message and social icons are displayed in the footer (default: #ffffff).', 'yachtcharter' ),
                'default'  => '#ffffff',
                'validate' => 'color',
            ),
				
			)

	    ) );
	
	Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Fonts', 'yachtcharter' ),
        'id'               => 'fonts',
        'desc'             => '',
        'customizer_width' => '400px',
        'icon'             => 'el el-font',
		
		'fields'     => array(
			
			array(
                'id'       => 'google_font_name_1',
                'type'     => 'typography',
				'font-style' => 'false',
				'font-weight' => 'false',
				'font-size' => 'false',
				'color' => 'false',
				'text-align' => 'false',
				'line-height' => 'false',
                'title'    => esc_html__( 'Font Family 1 (Used For Titles)', 'yachtcharter' ),
                'subtitle' => esc_html__( '', 'yachtcharter' ),
                'desc'     => esc_html__( "", 'yachtcharter' ),
				'default'     => array(
					'font-family' => 'Source Serif Pro',
				)
            ),

			array(
                'id'       => 'google_font_name_2',
                'type'     => 'typography',
				'font-style' => 'false',
				'font-weight' => 'false',
				'font-size' => 'false',
				'color' => 'false',
				'text-align' => 'false',
				'line-height' => 'false',
                'title'    => esc_html__( 'Font Family 2 (Used For Body)', 'yachtcharter' ),
                'subtitle' => esc_html__( '', 'yachtcharter' ),
                'desc'     => esc_html__( "", 'yachtcharter' ),
				'default'     => array(
					'font-family' => 'Source Sans Pro',
				)
            ),
	
			)

	    ) );
	
	Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Page Header', 'yachtcharter' ),
        'id'               => 'page-header',
        'desc'             => '',
        'customizer_width' => '400px',
        'icon'             => 'el el-file',
		
		'fields'     => array(
            array(
                'id'       => 'page-header-image',
                'type'     => 'media',
                'title'    => esc_html__( 'Default Page Header Image', 'yachtcharter' ),
                'desc'     => esc_html__( 'Displayed on all pages a header image is not set in the page options', 'yachtcharter' ),
                'subtitle' => esc_html__( '', 'yachtcharter' )
            ),
	
			)

	    ) );
	
	Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Custom JS', 'yachtcharter' ),
        'id'               => 'custom-js',
        'desc'             => '',
        'customizer_width' => '400px',
        'icon'             => 'el el-edit',
		
		'fields'     => array(
            array(
                'id'       => 'custom_js',
                'type'     => 'textarea',
                'title'    => esc_html__( 'Custom JS', 'yachtcharter' ),
                'subtitle' => esc_html__( '', 'yachtcharter' ),
                'desc'     => esc_html__( 'Add your own custom JS to the theme', 'yachtcharter' ),
                'default'  => '',
            ),
	
			)

	    ) );
	
	Redux::setSection( $opt_name, array(
    	'title'            => esc_html__( 'Social', 'yachtcharter' ),
    	'id'               => 'social',
    	'desc'             => '',
    	'customizer_width' => '400px',
    	'icon'             => 'el el-facebook',
		'fields'           => array(
			array(
			    'id'       => 'top-right-social-link-1',
			    'type'     => 'select',
			    'title'    => esc_html__( 'Top Right Social Link #1', 'yachtcharter' ),
			    'subtitle' => '',
			    'desc'     => '',
			    'options'  => array(
					'none' => esc_html__( 'None', 'yachtcharter' ),
			        'facebook' => esc_html__( 'Facebook', 'yachtcharter' ),
			        'flickr' => esc_html__( 'Flickr', 'yachtcharter' ),
			        'googleplus' => esc_html__( 'GooglePlus', 'yachtcharter' ),
					'instagram' => esc_html__( 'Instagram', 'yachtcharter' ),
					'linkedin' => esc_html__( 'Linkedin', 'yachtcharter' ),
					'pinterest' => esc_html__( 'Pinterest', 'yachtcharter' ),
					'skype' => esc_html__( 'Skype', 'yachtcharter' ),
					'soundcloud' => esc_html__( 'Soundcloud', 'yachtcharter' ),
					'tumblr' => esc_html__( 'Tumblr', 'yachtcharter' ),
					'twitter' => esc_html__( 'Twitter', 'yachtcharter' ),
					'vimeo' => esc_html__( 'Vimeo', 'yachtcharter' ),
					'vine' => esc_html__( 'Vine', 'yachtcharter' ),
					'yelp' => esc_html__( 'Yelp', 'yachtcharter' ),
					'youtube' => esc_html__( 'Youtube', 'yachtcharter' )
			    ),
			    'default'  => 'none',
			),
			array(
			    'id'       => 'top-right-social-link-2',
			    'type'     => 'select',
			    'title'    => esc_html__( 'Top Right Social Link #2', 'yachtcharter' ),
			    'subtitle' => '',
			    'desc'     => '',
			    'options'  => array(
					'none' => esc_html__( 'None', 'yachtcharter' ),
			        'facebook' => esc_html__( 'Facebook', 'yachtcharter' ),
			        'flickr' => esc_html__( 'Flickr', 'yachtcharter' ),
			        'googleplus' => esc_html__( 'GooglePlus', 'yachtcharter' ),
					'instagram' => esc_html__( 'Instagram', 'yachtcharter' ),
					'linkedin' => esc_html__( 'Linkedin', 'yachtcharter' ),
					'pinterest' => esc_html__( 'Pinterest', 'yachtcharter' ),
					'skype' => esc_html__( 'Skype', 'yachtcharter' ),
					'soundcloud' => esc_html__( 'Soundcloud', 'yachtcharter' ),
					'tumblr' => esc_html__( 'Tumblr', 'yachtcharter' ),
					'twitter' => esc_html__( 'Twitter', 'yachtcharter' ),
					'vimeo' => esc_html__( 'Vimeo', 'yachtcharter' ),
					'vine' => esc_html__( 'Vine', 'yachtcharter' ),
					'yelp' => esc_html__( 'Yelp', 'yachtcharter' ),
					'youtube' => esc_html__( 'Youtube', 'yachtcharter' )
			    ),
			    'default'  => 'none',
			),
			array(
                'id'       => 'social-link-target',
                'type'     => 'checkbox',
                'title'    => esc_html__( 'Open social links in new window/tab', 'yachtcharter' ),
                'subtitle' => esc_html__( '', 'yachtcharter' ),
                'desc'     => esc_html__( '', 'yachtcharter' ),
                'default'  => '1'// 1 = on | 0 = off
            ),
			array(
                'id'       => 'facebook-icon',
                'type'     => 'text',
                'title'    => esc_html__( 'Facebook URL', 'yachtcharter' ),
                'subtitle' => esc_html__( '', 'yachtcharter' ),
                'desc'     => esc_html__( 'Enter URL e.g. http://website.com/username', 'yachtcharter' ),
                'default'  => '',
            ),
			array(
                'id'       => 'flickr-icon',
                'type'     => 'text',
                'title'    => esc_html__( 'Flickr URL', 'yachtcharter' ),
                'subtitle' => esc_html__( '', 'yachtcharter' ),
                'desc'     => esc_html__( 'Enter URL e.g. http://website.com/username', 'yachtcharter' ),
                'default'  => '',
            ),
			array(
                'id'       => 'googleplus-icon',
                'type'     => 'text',
                'title'    => esc_html__( 'GooglePlus URL', 'yachtcharter' ),
                'subtitle' => esc_html__( '', 'yachtcharter' ),
                'desc'     => esc_html__( 'Enter URL e.g. http://website.com/username', 'yachtcharter' ),
                'default'  => '',
            ),
			array(
                'id'       => 'instagram-icon',
                'type'     => 'text',
                'title'    => esc_html__( 'Instagram URL', 'yachtcharter' ),
                'subtitle' => esc_html__( '', 'yachtcharter' ),
                'desc'     => esc_html__( 'Enter URL e.g. http://website.com/username', 'yachtcharter' ),
                'default'  => '',
            ),
			array(
                'id'       => 'linkedin-icon',
                'type'     => 'text',
                'title'    => esc_html__( 'LinkedIn URL', 'yachtcharter' ),
                'subtitle' => esc_html__( '', 'yachtcharter' ),
                'desc'     => esc_html__( 'Enter URL e.g. http://website.com/username', 'yachtcharter' ),
                'default'  => '',
            ),
			array(
                'id'       => 'pinterest-icon',
                'type'     => 'text',
                'title'    => esc_html__( 'Pinterest URL', 'yachtcharter' ),
                'subtitle' => esc_html__( '', 'yachtcharter' ),
                'desc'     => esc_html__( 'Enter URL e.g. http://website.com/username', 'yachtcharter' ),
                'default'  => '',
            ),
			array(
                'id'       => 'skype-icon',
                'type'     => 'text',
                'title'    => esc_html__( 'Skype URL', 'yachtcharter' ),
                'subtitle' => esc_html__( '', 'yachtcharter' ),
                'desc'     => esc_html__( 'Enter URL e.g. http://website.com/username', 'yachtcharter' ),
                'default'  => '',
            ),
			array(
                'id'       => 'soundcloud-icon',
                'type'     => 'text',
                'title'    => esc_html__( 'Soundcloud URL', 'yachtcharter' ),
                'subtitle' => esc_html__( '', 'yachtcharter' ),
                'desc'     => esc_html__( 'Enter URL e.g. http://website.com/username', 'yachtcharter' ),
                'default'  => '',
            ),
			array(
                'id'       => 'tumblr-icon',
                'type'     => 'text',
                'title'    => esc_html__( 'Tumblr URL', 'yachtcharter' ),
                'subtitle' => esc_html__( '', 'yachtcharter' ),
                'desc'     => esc_html__( 'Enter URL e.g. http://website.com/username', 'yachtcharter' ),
                'default'  => '',
            ),
			array(
                'id'       => 'twitter-icon',
                'type'     => 'text',
                'title'    => esc_html__( 'Twitter URL', 'yachtcharter' ),
                'subtitle' => esc_html__( '', 'yachtcharter' ),
                'desc'     => esc_html__( 'Enter URL e.g. http://website.com/username', 'yachtcharter' ),
                'default'  => '',
            ),
			array(
                'id'       => 'vimeo-icon',
                'type'     => 'text',
                'title'    => esc_html__( 'Vimeo URL', 'yachtcharter' ),
                'subtitle' => esc_html__( '', 'yachtcharter' ),
                'desc'     => esc_html__( 'Enter URL e.g. http://website.com/username', 'yachtcharter' ),
                'default'  => '',
            ),
			array(
                'id'       => 'vine-icon',
                'type'     => 'text',
                'title'    => esc_html__( 'Vine URL', 'yachtcharter' ),
                'subtitle' => esc_html__( '', 'yachtcharter' ),
                'desc'     => esc_html__( 'Enter URL e.g. http://website.com/username', 'yachtcharter' ),
                'default'  => '',
            ),
			array(
                'id'       => 'yelp-icon',
                'type'     => 'text',
                'title'    => esc_html__( 'Yelp URL', 'yachtcharter' ),
                'subtitle' => esc_html__( '', 'yachtcharter' ),
                'desc'     => esc_html__( 'Enter URL e.g. http://website.com/username', 'yachtcharter' ),
                'default'  => '',
            ),
			array(
                'id'       => 'youtube-icon',
                'type'     => 'text',
                'title'    => esc_html__( 'Youtube URL', 'yachtcharter' ),
                'subtitle' => esc_html__( '', 'yachtcharter' ),
                'desc'     => esc_html__( 'Enter URL e.g. http://website.com/username', 'yachtcharter' ),
                'default'  => '',
            ),
        )

    ) );