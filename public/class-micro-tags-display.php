<?php
/**
 * The shortcode provider: [report-editor]
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    micro-tags
 * @subpackage micro-tags/public
 */

 if (! class_exists('Micro_Tags_Db_Table'))
  require_once(dirname(dirname(__FILE__)) . "/class-micro-tags-db-table.php");

final class Micro_Tags_Display
{

  private $id_part;
  private $tags;

  public function micro_tags($atts = [], $content = null, $tag = '') {
    $atts = array_change_key_case((array)$atts, CASE_LOWER);

    $args = extract( shortcode_atts( array('id_part' => 0), $atts, $tag ) );
    $this->id_part = $id_part;

    $this->tags = (new Micro_Tags_Db_Table)->get_table("tags")->get_list(array("id_part" => $id_part, "id_parent" => 0),"sort_order","",1000);

    include(dirname(__FILE__) . "/partials/micro-tags-display.php");
  }

  private function get_tag_type($id_type)
  {
    return (new Micro_Tags_Db_Table)->get_table("tag_types")->get_list(array("id_type" => $id_type))[0]["type_code"];
  }

  private function is_parent($id_tag)
  {
    return (count ((new Micro_Tags_Db_Table)->get_table("tags")->get_list(array("id_parent" => $id_tag),"sort_order","",1000)) == 0 ? false : true);
  }

  private function get_childs($id_parent)
  {
     return (new Micro_Tags_Db_Table)->get_table("tags")->get_list(array("id_parent" => $id_parent, "id_part" => $this->id_part),"sort_order","",1000);
  }

}




?>
