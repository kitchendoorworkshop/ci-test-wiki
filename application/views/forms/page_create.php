<?php echo validation_errors(); ?>

<?php echo form_open('page/add') ?>

	<label for="title">Title</label>
	<input type="input" name="title" /><br />

	<label for="content">Content</label>
	<textarea name="content" rows="20" cols="60"></textarea><br />

	<input type="submit" name="submit" value="Add Page" />

</form>
