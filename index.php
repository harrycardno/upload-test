<?php # index.php

	#1. Load libraries
	
	require_once 'form.lib.php';
	require_once 'upload.lib.php';
	require_once 'url.lib.php';

	#2. Logic
	// print_r ($_FILES);

	# if any files were uploaded
	if($_FILES){

		#adding github

		$files = Upload::to_folder('uploads/');

		if($files[0]['error_message'] == false){

			URL::redirect($files[0]['filepath']);

		}else{

			echo $files[0]['error_message'];

		}



		// # get the temp name (tmp) and the file name		
		// $tmp = $_FILES['file']['tmp_name'][0];
		// $filename = $_FILES['file']['name'][0];

		// #move the files into the "uploads" folder
		// move_uploaded_file($tmp, 'uploads/'.$filename);

		#redirect to the newly uploaded file
		// URL::redirect('uploads/'.$filename);

	}

	#3. Load views

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Upload files with PHP</title>
</head>
<body>

	<h1>Upload files with PHP</h1>
	
<!-- 	# upload forms have to use the post method -->

	<?= Form::open_upload() ?>

	<?= Form::max_file_size()?>

		<div class="form_group">
			<?=Form::label('file', 'File') ?>
			<?=Form::file() ?>
	
		</div>
		
		<?= Form::submit() ?>

	<?= Form::close() ?>


	
</body>
</html>