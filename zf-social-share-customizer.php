<?php

/**
* Custom setting for Customizer
*/
function zfss_customize_register( $wp_customize ) {

	$prefix = 'zfss_';

	$i = 0;

	$social_media_names = array( 'facebook', 'twitter', 'linkedin', 'pinterest', 'email' );

	$social_media_labels = array( 'Facebook', 'Twitter', 'LinkedIn', 'Pinterest', 'Email' );

	$wp_customize->add_section( $prefix . 'settings', array(
		'title'    => __( 'Social Share Buttons', 'zfss' ),
		'priority' => 30,
	) );

	foreach ( $social_media_names as $social_media ) {

		$wp_customize->add_setting( $prefix . $social_media . '_checkbox', array(
			'capability' => 'edit_theme_options',
		) );

		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, $prefix . $social_media . '_checkbox', array(
			'type'     => 'checkbox',
			'section'  => $prefix . 'settings',
			'settings' => $prefix . $social_media . '_checkbox',
			'label'    => $social_media_labels[ $i ],
		) ) );

		$i++;

	}

}
add_action( 'customize_register', 'zfss_customize_register' );
