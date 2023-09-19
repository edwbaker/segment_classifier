<html>
  <head>
   <title>Segments Demo</title>
  </head>

  <body>
    <h1>Segments Demo</h1>
    <p>Listen to the audio segment and select the dominant sound.</p>
    <?php
      //Check if form has been submitted
      if (isset($_POST['thing'])) {
        //Get selected thing
        $thing = $_POST['thing'];

        //Get file name
        $file = $_POST['file'];

        //Open file for writing
        $fh = fopen('data.csv', 'a');

        //Write thing and file name to file
        fwrite($fh, "$thing,$file\n");

        //Close file
        fclose($fh);
      }

      //Get list of wav files from data directory
      $files = glob('data/*.wav');

      //Select file at random
      $file = $files[array_rand($files)];

      //Create html audio element
      echo "<audio controls autoplay>";
      echo "<source src='$file' type='audio/wav'>";
      echo "</audio>";

      //Array of things that might be in the audio file
      $things = array(
        "Birds",
        "Insects",
        "Other animals",
        "Cars", 
        "People", 
        "Other vehicles", 
        "Nothing"
      );

      //Create form with radio buttons for each thing
      echo "<form action='index.php' method='post'>";
      foreach ($things as $thing) {
        echo "<input type='radio' name='thing' value='$thing'>$thing<br>";
      }
      echo "<input type='submit' value='Submit'>";
      echo "</form>";

    ?>
  </body>

</html>
