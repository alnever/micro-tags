<?php
/**
 * Class to get wpdb instance
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    micro-tags
 * @subpackage micro-tags/includes
 */

/**
 * Class to get wpdb instance
 *
 * This class provides access to $wpdb instance
 *
 * @since      1.0.0
 * @package    micro-tags
 * @subpackage micro-tags/includes
 * @author     Alex Neverov <al_neverov@live.ru>
 */

 class Micro_Tags_Db extends wpdb {
   protected static $instance = null;

   protected static $table_info = array(
     "parts" => array("class_name" => 'Micro_Tags_Table_Parts',
                             "file_name" => "/class-micro-tags-table-parts.php",
                             "admin_menu" => 1,
                             "caption" => 'Категории',
                             "singular" => 'Категория'
                           ),
     "tag_types" => array("class_name" => 'Micro_Tags_Table_Tag_Types',
                             "file_name" => "/class-micro-tags-table-tag-types.php",
                             "admin_menu" => 0,
                             "caption" => 'Типы тэгов',
                             "singular" => 'Тип тэгов'
                           ),
     "tags" => array("class_name" => 'Micro_Tags_Table_Tags',
                             "file_name" => "/class-micro-tags-table-tags.php",
                             "admin_menu" => 1,
                             "caption" => 'Тэги',
                             "singular" => 'Тэг'
                           )
   );


  /*
  * @return a single instance of the database connection object
  */
   public static function get_instance()
   {
     if (!self::$instance) {
       self::$instance = new Micro_Tags_Db(DB_USER, DB_PASSWORD, DB_NAME, DB_HOST);
     }

     return self::$instance;
   }

   public static function get_tables()
   {
     return self::$table_info;
   }
 }


 ?>
