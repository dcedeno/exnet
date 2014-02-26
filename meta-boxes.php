<?php
/**
 * Registering meta boxes
 *
 * All the definitions of meta boxes are listed below with comments.
 * Please read them CAREFULLY.
 *
 * You also should read the changelog to know what has been changed before updating.
 *
 * For more information, please visit:
 * @link http://www.deluxeblogtips.com/meta-box/
 */


add_filter( 'rwmb_meta_boxes', 'YOUR_PREFIX_register_meta_boxes' );

/**
 * Register meta boxes
 *
 * @return void
 */
function YOUR_PREFIX_register_meta_boxes( $meta_boxes )
{
	/**
	 * Prefix of meta keys (optional)
	 * Use underscore (_) at the beginning to make keys hidden
	 * Alt.: You also can make prefix empty to disable it
	 */
	// Better has an underscore as last sign
	$prefix = 'ght_';

	// 1st meta box
	
	// 2nd meta box
	/*
	$meta_boxes[] = array(
		'title' => __( 'Detalles de Evento', 'rwmb' ),

		'fields' => array(
			
			array(
				'name' => __( 'Fecha del Evento', 'rwmb' ),
				'id'   => "{$prefix}date_event",
				'type' => 'date',

				// jQuery date picker options. See here http://api.jqueryui.com/datepicker
				'js_options' => array(
					'appendText'      => __( ' (yyyy-mm-dd)', 'rwmb' ),
					'dateFormat'      => __( 'yy-mm-dd', 'rwmb' ),
					'changeMonth'     => true,
					'changeYear'      => true,
					'showButtonPanel' => true,
				),
			)

		)
	);*/
$meta_boxes[] = array(
	'id' => 'page_meta',
	'title' => 'Page Options',
	'context' => 'side',
	'pages' => array( 'page' ),
	'fields' => array(
	
		array(
			'name'		=> __( 'Landing Page', 'rwmb' ),
			'id'		=> "{$prefix}page_landing_check",
			'type'		=> 'checkbox',
		),
		

	)
);

	
	return $meta_boxes;
}


