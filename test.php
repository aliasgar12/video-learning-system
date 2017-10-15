
<?php
//ini_set('display_errors','on');
//error_reporting(E_ALL);
require_once 'dbconfig.php';
include_once 'dBug.php';
$myarr = Array();
$mysubObject = Array();
$sql="SELECT * FROM videos LEFT JOIN datafiles ON videos.datafile_id = datafiles.id LEFT JOIN categories ON videos.category_id = categories.id WHERE id_video=".$_GET['id']." GROUP BY videos.id_video";
$result_set=mysql_query($sql);
while($row=mysql_fetch_assoc($result_set)){
  $keyword=array_filter(explode(',', strtolower(trim($row['keywords']))));//what will do here
  foreach($keyword as $out) {
  	$out = preg_replace('/\s+/', "_", trim($out));
    $mysubObject = Array("word"=>trim($out),"link"=>'https://en.wikipedia.org/wiki/'.trim($out));
    array_push($myarr,$mysubObject);
  }
  //new dBug($f);
}
echo json_encode($myarr);
?>

