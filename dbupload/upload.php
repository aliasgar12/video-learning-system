<?php
include_once 'dbconfig.php';
if(isset($_POST['btn-upload']))
{

	$file = rand(1000,100000)."-".$_FILES['file']['name'];
  $file_loc = $_FILES['file']['tmp_name'];
	$file_size = $_FILES['file']['size'];
	$file_type = $_FILES['file']['type'];
	$folder="uploads/videos/";

  $datafile = rand(1000,100000)."-".$_FILES['datafile']['name'];
  $datafile_loc = $_FILES['datafile']['tmp_name'];
	$datafile_size = $_FILES['datafile']['size'];
	$datafile_type = $_FILES['datafile']['type'];
	$datafolder="uploads/datafiles/";


	// new file size in KB
	$new_size = $file_size/1024;
	// new file size in KB
  $new_size = $datafile_size/1024;


	// make file name in lower case
	$new_file_name = strtolower($file);
	// make file name in lower case
  $new_datafile_name = strtolower($datafile);


	$final_file=str_replace(' ','-',$new_file_name);
  $final_datafile=str_replace(' ','-',$new_datafile_name);

	if(move_uploaded_file($datafile_loc,$datafolder.$final_datafile))
  {
    $sql="INSERT INTO datafiles(filename) VALUES('$final_datafile')";
    mysql_query($sql);
		// get last inserted id
		$datafile_id = mysql_insert_id();
    ?>
    <script>
    alert('Upload Successful');
        window.location.href='index.php?success';
        </script>
    <?php
  }
  else
  {
    ?>
    <script>
    alert('error while uploading file');
        window.location.href='index.php?fail';
        </script>
    <?php
  }
}

	if(move_uploaded_file($file_loc,$folder.$final_file))
	{
		// we don't have datafile uploaded, set to 0
		if (!isset($datafile_id)) {
			$datafile_id = 0;
		}

		$sql="INSERT INTO videos(file,type,size,category_id,title,keywords,datafile_id) VALUES('$final_file','$file_type','$new_size','$_POST[category_id]','$_POST[title]','$_POST[keywords]','$datafile_id')";
    mysql_query($sql);
		?>
		<script>
		alert('successfully uploaded');
        window.location.href='index.php?success';
        </script>
		<?php
	}
	else
	{
		?>
		<script>
		alert('error while uploading file');
        window.location.href='index.php?fail';
        </script>
		<?php
	}


?>
