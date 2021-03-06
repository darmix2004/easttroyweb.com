<?php
/**
 * @package Make Plus
 */


interface MAKEPLUS_Component_PostsList_SetupInterface {
	public function build_query( array $options );

	public function render( WP_Query $query, array $display = array() );

	public function get_excerpt( $length = 55 );
}