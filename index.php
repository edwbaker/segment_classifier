<html>
  <head>
   <title>Segments Demo</title>
  </head>

  <body>
    <h1>Segments Demo</h1>
    <?php
      //Get list of wav files from data directory
      $files = glob('data/*.wav');

      //Select file at random
      $file = $files[array_rand($files)];

      //Create html audio element
      echo "<audio controls autoplay>";
      echo "<source src='$file' type='audio/wav'>";
      echo "</audio>";


    ?>
  </body>

</html>
