<?php
include_once 'dbconfig.php';
?>
<!DOCTYPE html>
<html>
<head>
  <meta content="text/html;charset=utf-8" http-equiv="Content-Type">
  <meta content="utf-8" http-equiv="encoding">

  <script src="https://code.jquery.com/jquery-2.1.4.min.js" type="text/javascript"></script>
  <!-- bootstrap -->
  <link rel="stylesheet" href="bootstrap-3.3.5-dist/css/bootstrap.css" type="text/css" />
  <link rel="stylesheet" href="bootstrap-3.3.5-dist/css/bootstrap-theme.min.css" type="text/css" />
  <script src="bootstrap-3.3.5-dist/js/bootstrap.min.js" type="text/javascript" /></script>

  <script src="js/popcorn-complete.js" type="text/javascript"></script>
  <script src="js/popcorn.parser.js" type="text/javascript"></script>
  <script src="js/popcorn.parserJSON.js" type="text/javascript"></script>
  <script src="js/popcorn.footnote.js" type="text/javascript"></script>
  <script src="js/popcorn.wikipedia.js" type="text/javascript"></script>

  <script type="text/javascript">

    var words = [{
      word: 'computer',
      link: 'https://en.wikipedia.org/wiki/Computer'
    }, {
      word: 'Atari 2600',
      link: 'https://en.wikipedia.org/wiki/Atari_2600'
    }, {
      word: 'programming',
      link: 'https://en.wikipedia.org/wiki/programming'
    }, {
      word: 'Python',
      link: 'https://en.wikipedia.org/wiki/Python'
    }, {
      word: 'C++',
      link: 'https://en.wikipedia.org/wiki/C++'
    }];

    function createLinks() {
      //iterate the array
      $.each(words,
        function() {
          var searchWord = this.word;
          var link = this.link;
          $('#footnote-container div').each(function(index) {
            var theContent = $(this).html();
            var linkedContent = theContent.replace(searchWord, "<a href='" + link + "' target='webpage'>" + searchWord + "</a>");
            // console.log(linkedContent);
            $(this).html(linkedContent);
          })
        }
      );
    }


          <?php
        $sql="SELECT * FROM videos LEFT JOIN datafiles ON videos.datafile_id = datafiles.id LEFT JOIN categories ON videos.category_id = categories.id WHERE id_video=".$_GET['id']." GROUP BY videos.id_video";
        $result_set=mysql_query($sql);
        while($row=mysql_fetch_array($result_set))
        {
          ?>


    document.addEventListener('DOMContentLoaded', function() {
      var p = Popcorn("#ourvideo");
      p.parseJSON("dbupload/uploads/datafiles/<?php echo $row['filename'];?>", function() {
        console.log("JSON Parsed Successfully");
        createLinks();
      });
    }, false);

    <?php
}
?>
  </script>


<title>Video Player</title>
</head>

<body>
<?php include 'navigation.php';?>

<?php
$sql="SELECT * FROM videos LEFT JOIN datafiles ON videos.datafile_id = datafiles.id LEFT JOIN categories ON videos.category_id = categories.id WHERE id_video=".$_GET['id']." GROUP BY videos.id_video";
$result_set=mysql_query($sql);
while($row=mysql_fetch_array($result_set))
{
?>
<div class="container">

  <div class="col-md-6">

    <video height="320" width="480" id="ourvideo" controls class="trackSupported">
      <source src="dbupload/uploads/videos/<?php echo $row['file'] ?>">
    </video>


    <div class="well"><p>Subtitles:</p>
      <div class="displays" id="footnote-container">

      </div>
    </div>

    <div class="well">Suggested Videos
      <div class="displays" id="suggestedvideo">


      </div>
    </div>
        <?php
    }
    ?>
  </div>

  <div class="col-md-6">
    <iframe name="webpage" width="600" height="600" frameborder="0"></iframe>
  </div>
</div>


</body>

</html>
