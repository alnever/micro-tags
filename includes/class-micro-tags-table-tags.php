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

class Micro_Tags_Table_Tags extends Micro_Tags_Db_Table{

  protected $table_name = 'micro_tags_tags';

  protected $fields = array(
    "id_tag" => array( "name" => "id_tag", "type" => "int", "constraint" => "not null auto_increment", "default" => 0, "format" => '%d', "caption" => "ID",
                       "show_function" => null, "select_function" => null, "sortable" => false, "display" => false, "required" => false),
    "tag_caption" => array( "name" => "tag_caption", "type" => "varchar(2048)", "constraint" => "not null", "default" => "", "format" => '%s', "caption" => "Заголовок тэга",
                     "show_function" => null, "select_function" => null, "sortable" => true, "display" => true, "required" => true),
    "id_tag_type" => array( "name" => "id_tag_type", "type" => "int", "constraint" => "not null", "default" => "", "format" => '%d', "caption" => "Тип тэга",
                     "show_function" => "get_tag_type", "select_function" => "get_tag_types", "sortable" => false, "display" => true, "required" => true),
    "id_part" => array( "name" => "id_part", "type" => "int", "constraint" => "not null", "default" => "", "format" => '%d', "caption" => "Категория",
                      "show_function" => "get_part", "select_function" => "get_parts", "sortable" => false, "display" => true, "required" => true),
    "itemprop" => array( "name" => "itemprop", "type" => "varchar(50)", "constraint" => "not null", "default" => "", "format" => '%s', "caption" => "Название тэга (itemprop)",
                       "show_function" => null, "select_function" => null, "sortable" => false, "display" => true, "required" => false),
    "tag_value" => array( "name" => "tag_value", "type" => "text", "constraint" => "not null", "default" => "", "format" => '%s', "caption" => "Значение",
                      "show_function" => null, "select_function" => null, "sortable" => false, "display" => true, "required" => false),
    "link" => array( "name" => "link", "type" => "varchar(512)", "constraint" => "not null", "default" => "", "format" => '%s', "caption" => "Ссылка",
                     "show_function" => null, "select_function" => null, "sortable" => false, "display" => true, "required" => false),
    "id_parent" => array( "name" => "id_parent", "type" => "int", "constraint" => "not null", "default" => "0", "format" => '%d', "caption" => "Родительский тэг",
                    "show_function" => "get_parent_tag", "select_function" => "get_parent_tags", "sortable" => false, "display" => true, "required" => false),
    "itemscope " => array( "name" => "itemscope", "type" => "varchar(512)", "constraint" => "not null", "default" => "", "format" => '%s', "caption" => "itemscope",
                        "show_function" => null, "select_function" => null, "sortable" => false, "display" => true, "required" => false),
    "itemtype " => array( "name" => "itemtype", "type" => "varchar(512)", "constraint" => "not null", "default" => "", "format" => '%s', "caption" => "itemtype",
                        "show_function" => null, "select_function" => null, "sortable" => false, "display" => true, "required" => false),
    "sort_order" => array( "name" => "sort_order", "type" => "int", "constraint" => "not null", "default" => "0", "format" => '%d', "caption" => "Порядок показа",
                        "show_function" => null, "select_function" => null, "sortable" => false, "display" => true, "required" => true)
  );

  protected $id_field = "id_tag";
  protected $name_field = "tag_caption";
  protected $delete = true;
  protected $delete_before = array();

  protected $default_values = array();

  public function get_tag_types()
  {
    return new Micro_Tags_Table_Tag_Types;
  }

  public function get_tag_type($id)
  {
    $tab = new Micro_Tags_Table_Tag_Types;
    $tmp = $tab->get($id);
    return $tmp[$tab->get_name_field()];
  }

  public function get_parts()
  {
    return new Micro_Tags_Table_Parts;
  }

  public function get_part($id)
  {
    $tab = new Micro_Tags_Table_Parts;
    $tmp = $tab->get($id);
    return $tmp[$tab->get_name_field()];
  }

  public function get_parent_tags()
  {
    return new Micro_Tags_Table_Tags;
  }

  public function get_parent_tag($id)
  {
    $tmp = $this->get($id);
    return $tmp[$this->get_name_field()];
  }

  public function get_parents($id_part)
  {
    $sql = "select id_tag, tag_caption, tag_value
              from micro_tags_tags
              where id_tag in (select id_parent from micro_tags_tags)
              and id_part = $id_part
            order by sort_order
    ";

    return $this->connection->get_results($sql, "ARRAY_A");
  }

}
