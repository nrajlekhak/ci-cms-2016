<section>
  <h2>Articles</h2>
  <?php echo anchor('admin/articles/edit', '<i class="glyphicon glyphicon-edit"></i> add an articles'); ?>

  <table class="table table-striped table-bordered">

    <thead>
      <tr>
          <th>Title</th>
          <th>publication date</th>
          <th>Edit</th>
          <th>Delete</th>
      </tr>
    </thead>
    <tbody>
      <?php if(count($articles)): foreach($articles as $articles): ?>
      <tr>
        <td><?php echo anchor('admin/articles/edit/'.$articles->id, $articles->title) ?></td>
        <td><?php echo  $articles->pubdate; ?></td>
        <td><?php echo btn_edit('admin/articles/edit/'. $articles->id) ?></td>
        <td><?php echo btn_delete('admin/articles/delete/'. $articles->id)  ?></td>
      </tr>
      <?php endforeach; ?>
    <?php else: ?>
      <tr>
        <td colspan="3"> no articles found</td>
      </tr>
    <?php endif; ?>
    </tbody>
  </table>
</section>
