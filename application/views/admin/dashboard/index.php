<h2>Recently modified Articles</h2>
<?php if(count($recent_articles)): ?>
<ul>
  <?php foreach($recent_articles as $article): ?>
    <li><?php echo anchor('admin/articles/edit/'.$article->id, e($article->title));  echo "--------- last modified   ->".date('Y-m-d', strtotime($article->modified));?></li>
  <?php endforeach; ?>
</ul>
<?php endif; ?>
