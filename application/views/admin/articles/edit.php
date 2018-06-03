<div class="modal-header well">
  <h3><?php echo empty($articles->id)? 'add a new articles':'Edit articles '.$articles->title; ?></h3
</div>

<div class="modal-body">
  <div class= "loginmodal-container">
  <?php echo validation_errors(); ?>
  <?php echo form_open(); ?>
  <table class="table">

    <tr>
  		<td>Title</td>
  		<td><?php
      $titleData=array(
        'id'=>'title',
        'class'=>"form-control",
        'name'=>'title',
        'value'=>set_value('title',$articles->title),
        'required'=>'required',
        'placeholder'=>'title',);
      echo form_input($titleData); ?></td>
	</tr>
  <td>Publication Date</td>
  <td><?php
  $pubData=array(
    'id'=>'pubdate',
    'class'=>"form-control datepicker",
    'name'=>'pubdate',
    'value'=>set_value('pubdate',$articles->pubdate),
    'required'=>'required',
    'placeholder'=>'publication date',);
  echo form_input($pubData); ?></td>
</tr>
  <tr>
      <td>Slug</td>
      <td><?php
          $slugData=array(
            'id'=>'slug',
            'class'=>"form-control",
            'name'=>'slug',
            'value'=>set_value('slug',$articles->slug),
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

          'value'=>set_value('body',$articles->body),
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
<script type="text/javascript">
$(function(){
  $('.datepicker').datepicker({format: "yyyy-mm-dd"});
});
</script>
