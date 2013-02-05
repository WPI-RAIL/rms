<?php
/**
 * System log script. Currently, this level of the API contains no useful functions.
 *
 * Returns a bad request response.
 *
 * @author     Russell Toris <rctoris@wpi.edu>
 * @copyright  2013 Russell Toris, Worcester Polytechnic Institute
 * @license    BSD -- see LICENSE file
 * @version    December, 6 2012
 * @package    api.config.logs
 * @link       http://ros.org/wiki/rms
 */

include_once(dirname(__FILE__).'/../../api.inc.php');

// JSON response
header('Content-type: application/json');
header('Cache-Control: no-cache, must-revalidate');

// check for authorization
if($auth = authenticate()) {
  $result = create_404_state($_SERVER['REQUEST_METHOD'].' method is unavailable.');
} else {
  $result = create_401_state();
}

echo json_encode($result);
?>
