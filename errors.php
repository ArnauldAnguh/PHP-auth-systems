<?php if(count($errors) > 0) : ?>
<div class='error'>
<b>Warning:</b>
  	<?php foreach($errors as $error) : ?>
  	 <?php echo "<li style='width: 100%; text-align: left'>" . $error . "</li>"; ?>
  	<?php endforeach ?>
</div>
<?php endif ?>