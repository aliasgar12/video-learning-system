<?php
include_once 'dbconfig.php';
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta charset="utf-8">
<title>File Uploading With PHP and MySql</title>
<!--Based on uploader tutorial by cleartuts.blogspot.com -->
<script src="https://code.jquery.com/jquery-2.1.4.min.js" type="text/javascript"></script>
<!-- bootstrap -->
<link rel="stylesheet" href="../bootstrap-3.3.5-dist/css/bootstrap.css" type="text/css" />
<link rel="stylesheet" href="../bootstrap-3.3.5-dist/css/bootstrap-theme.min.css" type="text/css" />
<script src="../bootstrap-3.3.5-dist/js/bootstrap.min.js" type="text/javascript" /></script>



</head>
<body>
<?php include '../navigation.php';?>
<div class="container">
<div class="well well-lg">
	<div class="col-md-12">
	<form action="upload.php" method="post" enctype="multipart/form-data">
	<div class="col-md-6">
		<hr />
		<label>Title:</label> <input type="text" name="title" /><br /><hr />
		<label>Category:</label>
		<?php

		$mysqli = new mysqli('localhost', 'root', 'school1', 'asgardb');

		/* check connection */
		if ($mysqli->connect_errno) {
				printf("Connect failed: %s\n", $mysqli->connect_error);
				exit();
		}

		// get all categories
		$query = "SELECT * FROM categories";
		if ($result = $mysqli->query($query)) {
			echo "";

			// dropdown for choosing category
			echo "<select name='category_id'>";
			while ($obj = $result->fetch_object()) {
				echo "<option value='".$obj->id."'>";
				echo $obj->categoryname;
				echo "</option>";
			}
			echo "</select>";

			/* free result set */
			$result->close();
		}

		?><br /><hr />
		<label>Select Video File</label><input type="file" name="file" /><br /><hr />
		<label>Select Json File</label><input type="file" name="datafile" /><br />
		<a href="../trackdata/data.json" target="new">Download json example file</a><br />
		<a href="http://jsonlint.com/" target="new">validate json file</a><hr />
		<label>Keywords:</label> <br />
		<textarea name="keywords" rows="4" cols="70" /></textarea><br /><br />
		Separate keywords and phrases by using commas. For now the keywords only link to wikipedia,
		so double check that there is an article for that keyword. Keywords are case sensitive.<hr />
		<button type="submit" name="btn-upload">upload</button>
		</form>
	</div>




    </div>
    <?php
	if(isset($_GET['success']))
	{
		?>
        <label><br /><br /File Uploaded Successfully... </label>
        <?php
	}
	else if(isset($_GET['fail']))
	{
		?>
        <label><br /><br /Problem While File Uploading !</label>
        <?php
	}
	else
	{
		?>
        <label><br /><br />Upload a mp4 file, a json file, title for video, set some key words or phrases and choose a category.</label>
        <?php
	}
	?>


  <?php


  ?>

	<label><a href="view.php">Click here to view all uploaded files.</a></label>

		</div>


</div>



</body>
</html>
