<div id="content">
  <?php print $page['content']; ?>
</div>

<?php if ($show_edit_links): ?>
    <div id="functions">
      <a href="page/<?php print $page['slug']; ?>/edit">Edit this page</a> | <a href="page/<?php print $page['slug']; ?>/delete">Delete this page</a>
    </div>
<?php endif; ?>
