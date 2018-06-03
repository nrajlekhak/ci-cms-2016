<div class="modal-header well">
  <h3><?php echo empty($page->id)? 'add a new page':'Edit page '.$page->title; ?></h3
</div>

<div class="modal-body">
  <div class= "loginmodal-container">
  <?php echo validation_errors(); ?>
  <?php echo form_open(); ?>
  <table class="table">
    <tr>
		<td>Parent</td>
		<td><?php echo form_dropdown('parent_id', $pages_no_parents, $this->input->post('parent_id') ? $this->input->post('parent_id') : $page->parent_id, 'class="form-control"'); ?></td>
	</tr>

  <tr>
  <td>Template</td>
  <td><?php echo form_dropdown('template', array('page'=>'page','blog'=>'Blog','homepage'=>'Homepage','contact'=>'contact', 'about' =>'about','developer'=> 'developer'), $this->input->post('template') ? $this->input->post('template') : $page->template, 'class="form-control"'); ?></td>
  </tr>

    <tr>
  		<td>Title</td>
  		<td><?php
      $titleData=array(
        'id'=>'title',
        'class'=>"form-control",
        'name'=>'title',
        'value'=>set_value('title',$page->title),
        'required'=>'required',
        'placeholder'=>'title',);
      echo form_input($titleData); ?></td>
	</tr>
  <tr>
      <td>Slug</td>
      <td><?php
          $slugData=array(
            'id'=>'slug',
            'class'=>"form-control",
            'name'=>'slug',
            'value'=>set_value('slug',$page->slug),
            'required'=>'required',
            'placeholder'=>'slug',);
       echo form_input($slugData); ?></td>
    </tr>

    <tr>
      <td>body</td>
      <td><?php
        $bodyData=array(
          'id'=>'body',
          'class'=>"form-control tinyMCE textarea",
          'name'=>'body',

          'value'=>set_value('body',$page->body),
          'placeholder'=>'body',);
       echo form_textarea($bodyData); ?></td>
    </tr>


    <tr>
      <td></td>
      <td><?php echo form_Submit('submit','save', 'class="btn btn-primary"'); ?></td>
    </tr>
  </table>
  <?php echo form_close(); ?>
</div>
</div>
