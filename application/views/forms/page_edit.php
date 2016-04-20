<?php print validation_errors(); ?>

<?php print form_open('page/'.$page['slug'].'/edit') ?>

	<label for="title">Title</label>
	<input type="input" name="title" value="<?php print $page['title']; ?>"/><br />

  <label for="slug">URL Slug / path</label>
	<input type="input" name="slug" value="<?php print $page['slug']; ?>"/><br />

	<label for="content">Content</label>
	<textarea name="content" rows="20" cols="60"><?php print $page['content']; ?></textarea><br />

	<input type="submit" name="submit" value="Update Page" />

</form>
