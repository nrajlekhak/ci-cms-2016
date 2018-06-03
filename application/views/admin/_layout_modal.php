<?php $this->load->view("admin/components/page_head"); ?>
  <body style="background:#999;">
<div class="modal show" role="dialog">
  <div class="modal-dialog">

    <div class="modal-content">

  <?php
    $this->load->view($subview);
   ?>
  <div class="modal-footer">
    &copy; <?php echo config_item('site_name'); ?>
  </div>
</div>


</div>
</div>
  <?php $this->load->view("admin/components/page_tail"); ?>
