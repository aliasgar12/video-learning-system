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


<div class="container-fluid">

  <?php

$sql="SELECT * FROM videos LEFT JOIN datafiles ON videos.datafile_id = datafiles.id LEFT JOIN categories ON videos.category_id = categories.id WHERE category_id=".$_GET['id']." GROUP BY videos.id_video ORDER BY TITLE asc" ;
$result_set=mysql_query($sql);
while($row=mysql_fetch_array($result_set))
{

        if ($n==0) {
          ?><h2><?php echo $row['categoryname'] ?></h2><?php
        }

        // echo videos here ...

        $n++;


  ?>

  <div class="well" style="width: 400px">

  <p><b>Title:</b> <?php echo $row['title'] ?><p />

  <p><b>Keywords:</b> <?php echo $row['keywords'] ?><p />
  <p><a href="player.php?id=<?php echo $row['id_video'] ?>">Play Video</a><p />

  </div>

<?php
}
?>

</div>

</body>
</html>
