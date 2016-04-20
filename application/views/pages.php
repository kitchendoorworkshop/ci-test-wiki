<div id="content">
  <ul>
    <?php foreach($pages as $page): ?>
      <li><a href="<?php print $page['slug']; ?>"><?php print $page['title']; ?></a></li>
    <?php endforeach; ?>
  </ul>
</div>
<div id="functions">
  <a href="page/add">Add a new page</a>
</div>
