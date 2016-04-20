<?php echo validation_errors(); ?>

<?php echo form_open('page/'.$page['slug'].'/delete') ?>

	<p>Really delete <?php print $page['title']; ?></p>

	<input type="submit" name="delete" value="Delete" />
  <a href="/<?php print $page['slug']; ?>">Cancel</a>

</form>
