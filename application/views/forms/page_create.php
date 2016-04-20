<?php echo validation_errors(); ?>

<?php if ($slug): ?>
	<?php echo form_open('page/add/'.$slug); ?>
<?php else: ?>
	<?php echo form_open('page/add'); ?>
<?php endif; ?>

	<label for="title">Title</label>
	<input type="input" name="title" /><br />

	<?php if ($slug): ?>
		<input type="hidden" name="slug" value="<?php print $slug; ?>" />
	<?php endif; ?>

	<label for="content">Content</label>
	<textarea name="content" rows="20" cols="60"></textarea><br />

	<input type="submit" name="submit" value="Add Page" />

</form>
