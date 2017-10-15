<?php
include_once 'dbconfig.php';
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">

<script src="https://code.jquery.com/jquery-2.1.4.min.js" type="text/javascript"></script>
<!-- bootstrap -->
<link rel="stylesheet" href="bootstrap-3.3.5-dist/css/bootstrap.css" type="text/css" />
<link rel="stylesheet" href="bootstrap-3.3.5-dist/css/bootstrap-theme.min.css" type="text/css" />
<link rel="stylesheet" href="bootstrap-3.3.5-dist/css/style.css" type="text/css" />
<script src="bootstrap-3.3.5-dist/js/bootstrap.min.js" type="text/javascript" /></script>

</head>


<Title>Video Home</title>
<body>
<?php include 'navigation.php';?>


<div class="container">
<div class="col-md-12">
<div class="well well-lg">

  <!-- 16:9 aspect ratio -->
  <div class="embed-responsive embed-responsive-16by9">
    <video src="data/testvideo.mp4" controls>
    </video>

  </div>

  <p></p>
  <div class="col-sm-12 col-md-12">
    <div class="thumbnail">
      <div class="caption">
        <h3>Welcome to the interactive video tool</h3>
        <p>With this tool you can browse videos by category, select the video to play which will then play along with the user uploaded transcript.
        As you follow along you can click on any highlighted words that might pop up and information related to the highlighted word will populate next to the video player.
        To further explore feature <a href="faq.php">click here</a> to learn more.</p>
        <p>Below you can see a few featured videos to get you started.</p>

      </div>
    </div>
  </div>
  <h2 id="thumbnails-custom-content">Featured Videos</h2>
    <p></p>
    <div class="bs-example" data-example-id="thumbnails-with-custom-content">
      <div class="row">

        <div class="col-sm-6 col-md-4">
          <div class="thumbnail">
            <div class="caption">
              <h3>Thumbnail label</h3>
              <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
              <p><a href="player.php?id=45" class="btn btn-default" role="button">Button</a></p>
            </div>
          </div>
        </div>
        <div class="col-sm-6 col-md-4">
          <div class="thumbnail">
            <div class="caption">
              <h3>Thumbnail label</h3>
              <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
              <p><a href="player.php?id=45" class="btn btn-default" role="button">Button</a></p>
            </div>
          </div>
        </div>
        <div class="col-sm-6 col-md-4">
          <div class="thumbnail">
            <div class="caption">
              <h3>Thumbnail label</h3>
              <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
              <p><a href="player.php?id=45" class="btn btn-default" role="button">Button</a></p>
            </div>
          </div>
        </div>


      </div>


</div>



  </div>
</div>
</body>
</html>
