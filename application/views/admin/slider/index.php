<section>
  <h2>Slider Images</h2>
  <?php echo anchor('admin/fileupload/edit', '<i class="glyphicon glyphicon-edit"></i> add Images'); ?>

  <table class="table table-striped table-bordered">

    <thead>
      <tr>
          <th>File Name</th>
          <th>Extension</th>
          <th>Caption</th>
          <th>Description</th>
          <th>Delete</th>
          <th>Edit</th>
      </tr>
    </thead>
    <tbody>
      <?php if(count($images)): foreach($images as $image): ?>

      <tr>
        <td><?php echo  $image->filename; ?></td>
        <td><?php  echo $image->file_ext; ?></td>
        <td><?php echo  $image->file_caption; ?></td>
        <td><?php echo  $image->file_desc; ?></td>
        <td><?php echo btn_delete('admin/fileupload/delete/'. $image->id) ; ?></td>
        <td><?php echo btn_edit('admin/fileupload/edit/'. $image->id) ; ?></td>
      </tr>
      <?php endforeach; ?>
    <?php else: ?>
      <tr>
        <td colspan="6"> no images found</td>
      </tr>
    <?php endif; ?>
    </tbody>
  </table>
</section>
