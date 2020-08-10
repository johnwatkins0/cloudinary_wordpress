<?php
/**
 * Defines the tab structure for Cloudinary settings page.
 *
 * @package Cloudinary
 */
$dirs = wp_get_upload_dir();
$base = wp_parse_url( $dirs['baseurl'] );

$struct = array(
	'title'           => __( 'Storage', 'cloudinary' ),
	'heading'         => __( 'Manage local WordPress storage', 'cloudinary' ),
	'description'     => __( 'Manage local WordPress storage', 'cloudinary' ),
	'requires_config' => true,
	'fields'          => array(
		'offload' => array(
			'label'   => __( 'Storage', 'cloudinary' ),
			'type'    => 'select',
			'default' => 'dual_full',
			'choices' => array(
				'dual_full' => __( 'Cloudinary and WordPress.' ),
				'cld'       => __( 'Cloudinary only.' ),
				'dual_low'  => __( 'Cloudinary low resolution on WordPress.' ),
			),
		),
		'low_res' => array(
			'label'       => __( 'Low Resolution', 'cloudinary' ),
			'description' => __( 'The compression quality to apply to local stored assets.', 'cloudinary' ),
			'type'        => 'select',
			'choices'     => array(
				'40' => '40',
				'20' => '20',
				'10' => '10',
				'5'  => '5',
				'2'  => '2',
			),
			'default'     => '10',
			'suffix'      => '%',
			'condition'   => array(
				'offload' => 'dual_low',
			),
		),
	),
);

return apply_filters( 'cloudinary_admin_tab_storage', $struct );
