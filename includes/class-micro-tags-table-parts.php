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

class Micro_Tags_Table_Parts extends Micro_Tags_Db_Table{

  protected $table_name = 'micro_tags_parts';

  protected $fields = array(
    "id_part" => array( "name" => "id_part", "type" => "int", "constraint" => "not null auto_increment", "default" => 0, "format" => '%d', "caption" => "ID",
                       "show_function" => null, "select_function" => null, "sortable" => false, "display" => false, "required" => false),
    "part_name" => array( "name" => "part_name", "type" => "varchar(512)", "constraint" => "not null", "default" => "", "format" => '%s', "caption" => "Раздел",
                       "show_function" => null, "select_function" => null, "sortable" => true, "display" => true, "required" => true)
  );

  protected $id_field = "id_part";
  protected $name_field = "part_name";
  protected $delete = true;
  protected $delete_before = array("micro_tags_tags");

  protected $default_values = array(
    array("part_name" => 'Основные сведения'),
    array("part_name" => 'Структура и органы управления образовательной организацией'),
    array("part_name" => 'Документы'),
    array("part_name" => 'Образование'),
    array("part_name" => 'Образовательные стандарты'),

    array("part_name" => 'Руководство. Педагогический (научно-педагогический) состав'),
    array("part_name" => 'Материально-техническое обеспечение и оснащенность образовательного процесса'),
    array("part_name" => 'Стипендии и иные виды материальной поддержки'),
    array("part_name" => 'Платные образовательные услуги'),
    array("part_name" => 'Финансово-хозяйственная деятельность'),

    array("part_name" => 'Вакантные места для приема (перевода)')
  );


}
