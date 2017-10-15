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
	<table width="100%" border="1">
    <tr>
    <th colspan="8">your uploads...<label><a href="index.php">upload new files...</a></label></th>
    </tr>
    <tr>
    <td>ID</td>
    <td>Title</td>
    <td>Video File</td>
    <td>File Type</td>
		<td>Data File</td>
		<td>Category</td>
    <td>Keywords</td>
    <td>View File</td>
		</tr>
    <?php
	$sql="SELECT * FROM videos LEFT JOIN datafiles ON videos.datafile_id = datafiles.id LEFT JOIN categories ON videos.category_id = categories.id GROUP BY videos.id_video";
	$result_set=mysql_query($sql);
	while($row=mysql_fetch_array($result_set))
	{
		?>
        <tr>
        <td><?php echo $row['id_video'] ?></td>
        <td><?php echo $row['title'] ?></td>
        <td><?php echo $row['file'] ?></td>
        <td><?php echo $row['type'] ?></td>
        <td><?php echo $row['filename'] ?></td>
        <td><?php echo $row['categoryname'] ?></td>
        <td><?php echo $row['keywords'] ?></td>
        <td><a href="uploads/videos/<?php echo $row['file'] ?>" target="_blank">view file</a></td>

        </tr>
        <?php
	}
	?>
    </table>

</div>
</body>
</html>
