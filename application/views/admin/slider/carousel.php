<section>
  <div class="well well-sm">


  <h2>Add Slider images</h2>
   <?php  /* echo anchor('admin/fileupload/edit', '<i class="glyphicon glyphicon-edit"></i> add images');  */?>

</div>

  <div class="home-carousel">
    <?php  if(!empty($error)){ echo $error;}?>

    <?php echo form_open_multipart('admin/fileupload/do_upload'); ?>
    <table class="table">
      <input type="hidden" name="fileid" value="<?php echo $images->id; ?>">
      <tr>
        <td>Select Images</td>
        <td>
          <input type="file" class="" name="userfile" size="20" value="<?php echo $images->filename; ?>" />
        </td>
      </tr>

      <tr>
        <td>Caption</td>
        <td>
          <input type="text" class="form-control" name="file_caption" value="<?php echo $images->file_caption; ?>"  />
        </td>
      </tr>

      <tr>
        <td>Description</td>
        <td>
          <input type="text" class="form-control" name="file_desc"  value="<?php echo $images->file_desc; ?>"/>
        </td>
      </tr>

        <tr>
          <td>upload</td>
          <td>
            <input type="submit" class="btn btn-primary" value="upload" />
          </td></tr>
        </table>
      </div>
