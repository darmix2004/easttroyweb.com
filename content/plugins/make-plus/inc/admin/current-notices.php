<?php
/**
 * @package Make
 */

// Bail if this isn't being included inside of a MAKE_Admin_NoticeInterface.
if ( ! isset( $this ) || ! $this instanceof MAKEPLUS_Admin_NoticeInterface ) {
	return;
}

global $wp_version;

// Notice of unsupported WordPress version
if ( version_compare( $wp_version, MAKEPLUS_MIN_WP_VERSION, '<' ) ) {
	$this->register_admin_notice(
		'makeplus-wp-lt-min-version-' . MAKEPLUS_MIN_WP_VERSION,
		sprintf(
			__( 'Make Plus requires version %1$s of WordPress or higher. Your current version is %2$s. Please <a href="%3$s">update WordPress</a> to ensure full compatibility.', 'make-plus' ),
			MAKEPLUS_MIN_WP_VERSION,
			esc_html( $wp_version ),
			admin_url( 'update-core.php' )
		),
		array(
			'cap'     => 'update_core',
			'dismiss' => false,
			'screen'  => array( 'dashboard', 'plugins', 'update-core.php' ),
			'type'    => 'error',
		)
	);
}

// Notice of Make Plus being activated without Make
if ( ! $this->mode()->is_make_active_theme() ) {
	$this->register_admin_notice(
		'makeplus-theme-inactive',
		__( 'The Make Plus plugin was designed to work with the Make theme. To enjoy full use of the plugin, please install and activate Make.', 'make-plus' ),
		array(
			'cap'     => 'switch_themes',
			'dismiss' => true,
			'screen'  => array( 'dashboard', 'themes', 'plugins' ),
			'type'    => 'warning',
		)
	);
}

// Notice of missing Make API object
if ( $this->mode()->is_make_active_theme() && ! $this->mode()->has_make_api() ) {
	$this->register_admin_notice(
		'makeplus-api-missing',
		__( 'The current version of the Make Plus plugin requires version 1.7.0 or higher of the Make theme to fully function. Please update Make to the latest version.', 'make-plus' ),
		array(
			'cap'     => 'switch_themes',
			'dismiss' => true,
			'screen'  => array( 'dashboard', 'themes', 'plugins' ),
			'type'    => 'warning',
		)
	);
}

// Notice of upcoming drop of support for 4.2
if ( version_compare( $wp_version, '4.2', '<=' ) ) {
	$this->register_admin_notice(
		'makeplus-wp-lte-42',
		sprintf(
			__( 'Make Plus will soon be dropping support for WordPress version 4.2. Your current version is %1$s. Please <a href="%2$s">update WordPress</a> to ensure full compatibility.', 'make-plus' ),
			esc_html( $wp_version ),
			admin_url( 'update-core.php' )
		),
		array(
			'cap'     => 'update_core',
			'dismiss' => true,
			'screen'  => array( 'dashboard', 'plugins', 'update-core.php' ),
			'type'    => 'warning',
		)
	);
}