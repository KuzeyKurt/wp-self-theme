<?php
/**
 * qasaba Theme Customizer
 *
 * @package qasaba
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function qasaba_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
	// попытка сделать кастомнизируемый хедер 
	// $wp_customize->get_setting( 'header_color')->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial(
			'blogname',
			array(
				'selector'        => '.site-title a',
				'render_callback' => 'qasaba_customize_partial_blogname',
			)
		);
		$wp_customize->selective_refresh->add_partial(
			'blogdescription',
			array(
				'selector'        => '.site-description',
				'render_callback' => 'qasaba_customize_partial_blogdescription',
			)
		);

		
	}
// добавление контроля цветов 
/*
	$wp_customize -> add_setting('qasaba_link_color', array(
		'default' => 'ffffff',
		'transport' => 'refresh',
	));

	$wp_customize -> add_section('qasaba_standard_colors', array(
		'title' => __('Standard Colors', 'qasaba'),
		'priority' => 30,
	));

	$wp_customize -> add_control( new WP_Customize_Color_Control( $wp_customize, 'qasaba_link_color_control', array(
		'label' => __('Link Color', 'qasaba'),
		'section' => 'qasaba_link_color',
		'settings' =>  'lwp_link_color'
	))); */
}
add_action( 'customize_register', 'qasaba_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function qasaba_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function qasaba_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function qasaba_customize_preview_js() {
	wp_enqueue_script( 'qasaba-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), _S_VERSION, true );
}
add_action( 'customize_preview_init', 'qasaba_customize_preview_js' );
