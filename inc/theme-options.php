<?php
/**
 * Initialize the custom theme options.
 */
add_action( 'init', 'custom_theme_options' );

/**
 * Build the custom settings & update OptionTree.
 */
function custom_theme_options() {

	// OptionTree is not loaded yet, or this is not an admin request.
	if ( ! function_exists( 'ot_settings_id' ) || ! is_admin() ) {
		return false;
	}

	// Get a copy of the saved settings array.
	$saved_settings = get_option( ot_settings_id(), array() );

	// Custom settings array that will eventually be passes to the OptionTree Settings API Class.
	$custom_settings = array(
		'contextual_help' => array(
			'sidebar' => esc_html__( '<p>sidebar content goes here!</p>', 'go' ),
		),
		'sections'        => array(
			array(
				'id'    => 'general_settings',
				'title' => esc_html__( 'General settings', 'go' ),
			),
			array(
				'id'    => 'social_media_settings',
				'title' => esc_html__( 'Social Media  settings', 'go' ),
			),
			array(
				'id'    => 'copyright_text',
				'title' => esc_html__( 'Copyright Content', 'go' ),
			),
			array(
				'id'    => 'advance_section',
				'title' => esc_html__( 'Advanced Section', 'go' ),
			),
		),
		'settings'        => array(
			array(
				'id'           => 'go_logo',
				'label'        => esc_html__( 'CJZ Logo', 'go' ),
				'desc'         => '',
				'std'          => '',
				'type'         => 'upload',
				'section'      => 'general_settings',
				'rows'         => '',
				'post_type'    => '',
				'taxonomy'     => '',
				'min_max_step' => '',
				'class'        => '',
				'condition'    => '',
				'operator'     => 'and',
			),
			array(
				'id'           => 'go_favicon',
				'label'        => esc_html__( 'CJZ Favicon', 'go' ),
				'desc'         => '',
				'std'          => '',
				'type'         => 'upload',
				'section'      => 'general_settings',
				'rows'         => '',
				'post_type'    => '',
				'taxonomy'     => '',
				'min_max_step' => '',
				'class'        => '',
				'condition'    => '',
				'operator'     => 'and',
			),
			array(
				'id'           => 'display_socials_in_header',
				'label'        => esc_html__( 'Display Social Icons in Header', 'go' ),
				'desc'         => '',
				'std'          => '',
				'type'         => 'on-off',
				'section'      => 'social_media_settings',
				'rows'         => '',
				'post_type'    => '',
				'taxonomy'     => '',
				'min_max_step' => '',
				'class'        => '',
				'condition'    => '',
				'operator'     => 'and',
			),
			array(
				'id'           => 'facebook_link',
				'label'        => esc_html__( 'Facebook Link', 'go' ),
				'desc'         => '',
				'std'          => '',
				'type'         => 'text',
				'section'      => 'social_media_settings',
				'rows'         => '',
				'post_type'    => '',
				'taxonomy'     => '',
				'min_max_step' => '',
				'class'        => '',
				'condition'    => '',
				'operator'     => 'and',
			),
			array(
				'id'           => 'linkedin_link',
				'label'        => esc_html__( 'Linkedin Link', 'go' ),
				'desc'         => '',
				'std'          => '',
				'type'         => 'text',
				'section'      => 'social_media_settings',
				'rows'         => '',
				'post_type'    => '',
				'taxonomy'     => '',
				'min_max_step' => '',
				'class'        => '',
				'condition'    => '',
				'operator'     => 'and',
			),
			array(
				'id'           => 'youtube_link',
				'label'        => esc_html__( 'Youtube Link', 'go' ),
				'desc'         => '',
				'std'          => '',
				'type'         => 'text',
				'section'      => 'social_media_settings',
				'rows'         => '',
				'post_type'    => '',
				'taxonomy'     => '',
				'min_max_step' => '',
				'class'        => '',
				'condition'    => '',
				'operator'     => 'and',
			),
			array(
				'id'           => 'copyright_content',
				'label'        => esc_html__( 'Copyright Content', 'go' ),
				'desc'         => '',
				'std'          => '',
				'type'         => 'text',
				'section'      => 'copyright_text',
				'rows'         => '',
				'post_type'    => '',
				'taxonomy'     => '',
				'min_max_step' => '',
				'class'        => '',
				'condition'    => '',
				'operator'     => 'and',
			),
			array(
				'id'           => 'privacy_content',
				'label'        => esc_html__( 'Privacy Link', 'go' ),
				'desc'         => '',
				'std'          => '',
				'type'         => 'text',
				'section'      => 'copyright_text',
				'rows'         => '',
				'post_type'    => '',
				'taxonomy'     => '',
				'min_max_step' => '',
				'class'        => '',
				'condition'    => '',
				'operator'     => 'and',
			),
			array(
				'id'           => 'terms_content',
				'label'        => esc_html__( 'Terms Link', 'go' ),
				'desc'         => '',
				'std'          => '',
				'type'         => 'text',
				'section'      => 'copyright_text',
				'rows'         => '',
				'post_type'    => '',
				'taxonomy'     => '',
				'min_max_step' => '',
				'class'        => '',
				'condition'    => '',
				'operator'     => 'and',
			),
			array(
				'id'           => 'script_content',
				'label'        => esc_html__( 'Custom Script', 'go' ),
				'desc'         => 'Use $j to run jquery in no conflict mode',
				'std'          => '',
				'type'         => 'javascript',
				'section'      => 'advance_section',
				'rows'         => '',
				'post_type'    => '',
				'taxonomy'     => '',
				'min_max_step' => '',
				'class'        => '',
				'condition'    => '',
				'operator'     => 'and',
			),
			array(
				'id'           => 'css_content',
				'label'        => esc_html__( 'Custom CSS', 'go' ),
				'desc'         => '',
				'std'          => '',
				'type'         => 'css',
				'section'      => 'advance_section',
				'rows'         => '',
				'post_type'    => '',
				'taxonomy'     => '',
				'min_max_step' => '',
				'class'        => '',
				'condition'    => '',
				'operator'     => 'and',
			),
		)
	);

	// Allow settings to be filtered before saving.
	$custom_settings = apply_filters( ot_settings_id() . '_args', $custom_settings );

	// Settings are not the same update the DB.
	if ( $saved_settings !== $custom_settings ) {
		update_option( ot_settings_id(), $custom_settings );
	}

	// Lets OptionTree know the UI Builder is being overridden.
	global $ot_has_custom_theme_options;
	$ot_has_custom_theme_options = true;
}
