<?php
include_once 'dbconfig.php';
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">

<script src="https://code.jquery.com/jquery-2.1.4.min.js" type="text/javascript"></script>
<!-- bootstrap -->
<link rel="stylesheet" href="bootstrap-3.3.5-dist/css/bootstrap.min.css" type="text/css" />
<link rel="stylesheet" href="bootstrap-3.3.5-dist/css/bootstrap-theme.min.css" type="text/css" />
<script src="bootstrap-3.3.5-dist/js/bootstrap.min.js" type="text/javascript" /></script>

</head>


<Title>Categories</title>
<body>
<?php include 'navigation.php';?>


<div class="container">
  <div>
  	<table width="80%" border="1">

      <h2>All Videos</h2>

      <tr>
      <th colspan="4">Choose a category to view videos</th>
      </tr>
      <tr>

      <td>Title</td>
      <td>Category</td>
      <td>Keywords</td>
      <td>View File</td>
  		</tr>

      <?php

  	$sql="SELECT * FROM videos LEFT JOIN datafiles ON videos.datafile_id = datafiles.id LEFT JOIN categories ON videos.category_id = categories.id GROUP BY videos.id_video ORDER BY category_id" ;
  	$result_set=mysql_query($sql);
  	while($row=mysql_fetch_array($result_set))
  	{
  		?>

          <tr>



          <td><?php echo $row['title'] ?></td>
          <td><?php echo $row['categoryname'] ?></td>
          <td><?php echo $row['keywords'] ?></td>
          <td><a href="/~steffenhaaker/project/player.php?id=<?php echo $row['id_video'] ?>">view file</a></td>

          </tr>
          <?php
  	}
  	?>
      </table>

  </div>
</div>
</body>
</html>
