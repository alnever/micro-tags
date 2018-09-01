<?php
/**
 * Creates  db tables during plugin activation
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    micro-tags
 * @subpackage micro-tags/includes
 */

/**
 * Creates  db tables during plugin activation
 *
 * This class creates  db tables during plugin activation
 *
 * @since      1.0.0
 * @package    micro-tags
 * @subpackage micro-tags/includes
 * @author     Alex Neverov <al_neverov@live.ru>
 */

 if (! class_exists('Micro_Tags_Db_Table'))
  require_once(dirname(__FILE__) . "/class-micro-tags-db-table.php");

 class Micro_Tags_Db_Creator
 {

   /*
    * Get a singleton instance of the class
    */

   protected static $instance;

   public static function get_instance()
   {
     if (!(self::$instance instanceof self)) {
                 self::$instance = new self();
             }
             return self::$instance;
   }

   public function create_db()
   {
     # (new Micro_Tags_Table_Years)->create_table();
     $table_info = Micro_Tags_Db::get_instance()->get_tables();
     $tables = new Micro_Tags_Db_Table;
     foreach ($table_info as $key => $value) {
       $tab = $tables->get_table($key);
       if (! empty($tab))
       {
         $tab->create_table();
         $tab->insert_defaults();
       }
     }
   }
 }


?>
