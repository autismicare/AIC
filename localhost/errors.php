<?php  if (count($errors) > 0) : ?>
  	<?php foreach ($errors as $error) : ?>
		<div class="alert alert-danger alert-dismissible">
	  		<button type="button" class="close" data-dismiss="alert">&times;</button>
	  		<strong><?php echo $error ?></strong>
	  	</div>
  	<?php endforeach ?>
  </div>
<?php  endif ?>

