<?php
/**
 * Nav2D API script. This allows the creation of Nav2D widgets using RMS SQL entires. This is used
 * throughout interface creation.
 *
 * @author     Russell Toris <rctoris@wpi.edu>
 * @copyright  2012 Russell Toris, Worcester Polytechnic Institute
 * @license    BSD -- see LICENSE file
 * @version    December, 13 2012
 * @package    api.robot_environments.widgets.nav2d
 * @link       http://ros.org/wiki/rms
 */

include_once(dirname(__FILE__).'/../map2d/widget.api.php');

/**
 * Create the Javascript and HTML needed for a given Nav2D widget. The Javascript will be wrapped in
 * its own <script> and an HTML5 canvas will be created. This should be placed somewhere in your HTML
 * BODY section. Note that this returns the HTML, you will need to echo it in the appropriate spot.
 *
 * @param array $nav2d The SQL entry for the navigation we are creating (this can be easily found in the interface's robot_environment object)
 * @param integer $width The width of the widget
 * @param integer $height The hight of the widget
 * @return string The HTML to create the map object
 */
function create_nav2d($nav2d, $width, $height) {
  // check the map
  if(!$map2d = get_map_by_id($nav2d['mapid'])) {
    return '<h2>Navigation has invalid map ID.</h2>';
  } else {
    $continuous = ($map2d['continuous']) ? ', continuous : true' : '';

    // create the widget with a unique ID
    $id = time() + rand(0, time());

    $result = '
<canvas id="nav-'.$id.'" width="480" height="360"></canvas>

<script type="text/javascript">
	var nav = new Nav2D({
		ros : ros,
		serverName : \''.$nav2d['actionserver'].'\',
		actionName : \''.$nav2d['action'].'\',
		mapTopic : \''.$map2d['topic'].'\',
		canvasID : \'nav-'.$id.'\'
	});
</script>
';

    return $result;
  }
}
?>
