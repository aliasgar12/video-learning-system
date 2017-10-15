<?php
//ini_set('display_errors','on');
//error_reporting(E_ALL);
require_once 'dbconfig.php';
include_once 'dBug.php';
if(isset($_GET['action'])){
	switch($_GET['action']){
		case "getVideoKeywords":
			getVideoKeywords($_GET['id']);
		break;
	}
} else{
	header("HTTP/1.0 405 Method Not Allowed");
	exit();
}

function getVideoKeywords($id){
	$myarr = Array();
	$mysubObject = Array();
	$sql="SELECT * FROM videos LEFT JOIN datafiles ON videos.datafile_id = datafiles.id LEFT JOIN categories ON videos.category_id = categories.id WHERE id_video=$id GROUP BY videos.id_video";
	$result_set=mysql_query($sql);
	while($row=mysql_fetch_assoc($result_set)){
	  $keyword=array_filter(explode(',', strtolower(trim($row['keywords']))));
	  foreach($keyword as $out) {
	  	$out = preg_replace('/\s+/', "_", trim($out));
	    $mysubObject = Array("word"=>trim($out),"link"=>'https://en.wikipedia.org/wiki/'.trim($out));
	    array_push($myarr,$mysubObject);
	  }
	}
	header('Content-Type: application/json');
	echo json_encode($myarr);
}

?>
