<?php
/**
 * Extends micro_tags_db_table class to work with school-years
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    micro-tags
 * @subpackage micro-tags/includes
 */

/**
 * Extends micro_tags_db_table class to work with school-years
 *
 * This class extends micro_tags_db_table class to work with school-years
 *
 * @since      1.0.0
 * @package    micro-tags
 * @subpackage micro-tags/includes
 * @author     Alex Neveroc <al_neverov@live.ru>
 */

 if (! class_exists('Micro_Tags_Db_Table'))
  require_once(dirname(__FILE__) . "/class-micro-tags-db-table.php");

class Micro_Tags_Table_Tag_Types extends Micro_Tags_Db_Table{

  protected $table_name = 'micro_tags_tag_types';

  protected $fields = array(
    "id_type" => array( "name" => "id_type", "type" => "int", "constraint" => "not null auto_increment", "default" => 0, "format" => '%d', "caption" => "ID",
                       "show_function" => null, "select_function" => null, "sortable" => false, "display" => false, "required" => false),
    "type_name" => array( "name" => "type_name", "type" => "varchar(512)", "constraint" => "not null", "default" => "", "format" => '%s', "caption" => "Тип тэга",
                       "show_function" => null, "select_function" => null, "sortable" => true, "display" => true, "required" => true),
    "type_code" => array( "name" => "type_code", "type" => "varchar(512)", "constraint" => "not null", "default" => "", "format" => '%s', "caption" => "Код тэга",
                      "show_function" => null, "select_function" => null, "sortable" => true, "display" => true, "required" => true)
  );

  protected $id_field = "id_type";
  protected $name_field = "type_name";
  protected $delete = true;
  protected $delete_before = array();

  protected $default_values = array(
    array("type_name" => 'Ссылка', "type_code" => 'link'),
    array("type_name" => 'Текст', "type_code" => 'text'),
    array("type_name" => 'HTML', "type_code" => 'html'),
    array("type_name" => 'Подраздел', "type_code" => 'subpart')
  );


}
