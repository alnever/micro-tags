<?php
 wp_enqueue_style( 'micro-tags-css', plugin_dir_url( __FILE__ ) . '../css/micro-tags-public.css', array(999), $this->version, 'all' );
?>
<table width="100%" cellspacing="0" cellspading="0">
  <?php
    // print_r($this->id_part);
    $i = 0;
    foreach($this->tags as $tag):
       if (!$this->is_parent($tag["id_tag"])):
         $tag_type = $this->get_tag_type($tag["id_tag_type"]);
  ?>
    <tr class="<?php echo ($i%2 == 0 ? "nodd" : "odd"); ?>">
      <?php if ($tag_type != "link") { ?>
        <td width="30%"><?php
                    echo $tag["tag_caption"];
            ?>
        </td>
        <td width="70%">
      <?php } else { ?>
        <td width="100%" colspan="2">
      <?php } ?>
        <?php

          if ($tag_type == "text" && $tag["itemprop"] != "" && !$this->is_parent($tag["id_tag"])):
        ?>
          <span itemprop="<?php echo $tag["itemprop"]; ?>">
            <?php echo strip_tags($tag["tag_value"]); ?>
          </span>
        <?php
          $tag_type = $this->get_tag_type($tag["id_tag_type"]);
          elseif ($tag_type == "html" && $tag["itemprop"] != "" && !$this->is_parent($tag["id_tag"])):
        ?>
          <span itemprop="<?php echo $tag["itemprop"]; ?>">
            <?php echo $tag["tag_value"]; ?>
          </span>
        <?php
          elseif ($tag_type == "text" && $tag["itemprop"] == "" && $tag["itemscope"] != ""&& !$this->is_parent($tag["id_tag"])):
        ?>
          <span itemscope itemtype="<?php echo $tag["itemtype"]; ?>">
            <?php echo strip_tags($tag["tag_value"]); ?>
          </span>
        <?php
          elseif ($tag_type == "html" && $tag["itemprop"] == "" && $tag["itemscope"] != ""&& !$this->is_parent($tag["id_tag"])):
        ?>
          <span itemscope itemtype="<?php echo $tag["itemtype"]; ?>">
            <?php echo $tag["tag_value"]; ?>
          </span>
        <?php
          elseif ($tag_type == "link"):
        ?>
          <a href="<?php echo $tag["link"]; ?>" itemprop="<?php echo $tag["itemprop"]; ?>" target="_blank">
            <?php echo strip_tags($tag["tag_value"]); ?>
          </a>
        <?php
          endif;
        ?>
      </td>
  <?php
     $i++;
     endif;
     endforeach;
  ?>
</table>

<!-- show child tables -->
<?php
  $parents = (new Micro_Tags_Db_Table)->get_table("tags")->get_parents($this->id_part);
  foreach($parents as $parent):
?>
  <h3 align="center"><?php echo strip_tags($parent["tag_value"]); ?></h3>

  <?php
    $childs = $this->get_childs($parent["id_tag"]);
  ?>

  <table width="100%" cellspacing="0" cellspading="0">
    <?php
      $i = 0;
      foreach($childs as $tag):
        $tag_type = $this->get_tag_type($tag["id_tag_type"]);
    ?>
      <tr class="<?php echo ($i%2 == 0 ? "nodd" : "odd"); ?>">
        <?php if ($tag_type !== "link") { ?>
        <td width="30%"><?php echo $tag["tag_caption"]; ?></td>
        <td width="70%">
        <?php } else { ?>
        <td width="100%" colspan="2">
        <?php } ?>
          <?php

            if ($tag_type == "text" && $tag["itemprop"] != "" && !$this->is_parent($tag["id_tag"])):
          ?>
            <span itemprop="<?php echo $tag["itemprop"]; ?>">
              <?php echo strip_tags($tag["tag_value"]); ?>
            </span>
          <?php
            $tag_type = $this->get_tag_type($tag["id_tag_type"]);
            elseif ($tag_type == "html" && $tag["itemprop"] != "" && !$this->is_parent($tag["id_tag"])):
          ?>
            <span itemprop="<?php echo $tag["itemprop"]; ?>">
              <?php echo $tag["tag_value"]; ?>
            </span>
          <?php
            elseif ($tag_type == "text" && $tag["itemprop"] == "" && $tag["itemscope"] != ""&& !$this->is_parent($tag["id_tag"])):
          ?>
            <span itemscope itemtype="<?php echo $tag["itemtype"]; ?>">
              <?php echo strip_tags($tag["tag_value"]); ?>
            </span>
          <?php
            elseif ($tag_type == "html" && $tag["itemprop"] == "" && $tag["itemscope"] != ""&& !$this->is_parent($tag["id_tag"])):
          ?>
            <span itemscope itemtype="<?php echo $tag["itemtype"]; ?>">
              <?php echo $tag["tag_value"]; ?>
            </span>
          <?php
            elseif ($tag_type == "link"):
          ?>
            <a href="<?php echo $tag["link"]; ?>" itemprop="<?php echo $tag["itemprop"]; ?>" target="_blank">
              <?php echo strip_tags($tag["tag_value"]); ?>
            </a>
          <?php
            endif;
          ?>
        </td>
    <?php
       $i++;
       endforeach;
    ?>
  </table>

<?php
  endforeach;
?>
