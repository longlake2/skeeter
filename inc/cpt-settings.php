<?php

/* Slug for CPT plugin	*/
define('MVPWP_SLUG', 'projects');


/* Labels for CPT plugin	*/
function skeeter_mvpwp_product_labels( $labels ) {
	$labels = array(
	   'singular' => __('Project', 'skeeter'),
	   'plural'   => __('Projects', 'skeeter')
	);
	return $labels;
}
add_filter('mvpwp_default_projects_name', 'skeeter_mvpwp_product_labels');