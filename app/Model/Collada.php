<?php
/**
 * Colladas Model
 *
 * Colladas define threejs Collada loaders. Currently, these models cannot be modified via the admin interface as they
 * should remain constant for proper functionality.
 *
 * @author		Russell Toris - rctoris@wpi.edu
 * @copyright	2014 Worcester Polytechnic Institute
 * @link		https://github.com/WPI-RAIL/rms
 * @since		RMS v 2.0.0
 * @version		2.0.0
 * @package		app.Model
 */
class Collada extends AppModel {

/**
 * Colladas can have many log interactive markers.
 *
 * @var array
 */
	public $hasMany = array('Im' => array('className' => 'Im', 'dependent' => true));
}
