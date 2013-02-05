<?php
/**
 * Conditions include functions for the RMS API.
 *
 * Allows read and write access to condition entries via PHP function calls. Used throughout RMS and
 * within the RMS API.
 *
 * @author     Russell Toris <rctoris@wpi.edu>
 * @copyright  2013 Russell Toris, Worcester Polytechnic Institute
 * @license    BSD -- see LICENSE file
 * @version    December, 5 2012
 * @package    api.user_studies.conditions
 * @link       http://ros.org/wiki/rms
 */

include_once(dirname(__FILE__).'/../../../inc/config.inc.php');

/**
 * Get an array of all condition entires in the database or null if none exist.
 *
 * @return array|null The array of condition entries or null if none exist.
 */
function get_conditions() {
  global $db;

  // grab the javascript entries and push them into an array
  $result = array();
  $query = mysqli_query($db, "SELECT * FROM `conditions`");
  while($cur = mysqli_fetch_assoc($query)) {
    $result[] = $cur;
  }

  return (count($result) === 0) ? null : $result;
}

/**
 * Get the condition array for the entry with the given ID, or null if none exist.
 *
 * @param integer $id The condition ID number
 * @return array|null An array of the condition's SQL entry or null if none exist
 */
function get_condition_by_id($id) {
  global $db;

  // grab the article
  $sql = sprintf("SELECT * FROM `conditions` WHERE `condid`='%d'", cleanse($id));
  return mysqli_fetch_assoc(mysqli_query($db, $sql));
}
?>
