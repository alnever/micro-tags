<?php

/**
 * Fired during plugin activation
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    micro-tags
 * @subpackage micro-tags/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    micro-tags
 * @subpackage micro-tags/includes
 * @author     Alex Neverov <al_neverov@live.ru>
 */

 if (! class_exists('Micro_Tags_Db_Creator'))
  require_once(dirname(__FILE__) . "/class-micro-tags-db-creator.php");

class Micro_Tags_Activator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function activate() {
			Micro_Tags_Db_Creator::get_instance()->create_db();
	}

}
