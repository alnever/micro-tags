<?php
wp_enqueue_script( 'tinymce', plugin_dir_url( __FILE__ ) . '../../js/tiny_mce/tiny_mce.js', array( 'jquery' ), '', false );
wp_enqueue_script( 'micro-tags-tinymce', plugin_dir_url( __FILE__ ) . '../js/micro-tags-admin.js', array( 'jquery' , 'tinymce'), '4.6.5', false );

?>
<script>

</script>
<?php
  $this->form_view->form_handler();
?>

<div class="wrap">
    <div class="icon32 icon32-posts-post" id="icon-edit"><br></div>
    <h2><?php _e($this->form_view->get_table_name(), 'micro-tags-list')?>
      <a class="add-new-h2" href="<?php echo get_admin_url(get_current_blog_id(), 'admin.php?page='.$this->form_view->get_table_key().'-form');?>">
        <?php _e('Добавить еще', 'micro-tags-add-form')?>
      </a>
      <a class="add-new-h2" href="<?php echo get_admin_url(get_current_blog_id(), 'admin.php?page='.$this->form_view->get_table_key() );?>">
          <?php _e('Вернуться к списку', 'micro-tags-list')?>
      </a>
    </h2>

    <?php if (!empty($this->form_view->get_notice())): ?>
    <div id="notice" class="error"><p><?php echo $this->form_view->get_notice(); ?></p></div>
    <?php endif;?>
    <?php if (!empty($this->form_view->get_message())): ?>
    <div id="message" class="updated"><p><?php echo $this->form_view->get_message(); ?></p></div>
    <?php endif;?>
    <form id="form" method="POST">
        <input type="hidden" name="nonce" value="<?php echo wp_create_nonce(basename(__FILE__))?>"/>

        <div class="metabox-holder" id="poststuff">
            <div id="post-body">
                <div id="post-body-content">
                  <table cellspacing="2" cellpadding="5" style="width: 100%;" class="form-table">
                    <tbody>
                        <?php  $this->form_view->show_input_fields(); ?>
                    </tbody>
                  </table>
                  <input type="submit" value="<?php _e('Сохранить', 'micro-tags-list')?>" id="submit" class="button-primary" name="submit">
                </div>
            </div>
        </div>
    </form>
</div>
