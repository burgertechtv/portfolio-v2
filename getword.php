<?php

// https://stackoverflow.com/questions/71803670/how-to-make-previous-and-next-button-in-php 

$servername = "162.241.252.197";
$username = "burgerg1_dbuser";
$password = "2020Tech2020";
$dbname = "burgerg1_verblitz";

$wordID = NULL;
$prevID = NULL;
$nextID = NULL;



if ($_SERVER["REQUEST_METHOD"] == "GET") {
  if (isset($_GET['prev'])) {

      // Create connection
      $conn = new mysqli($servername, $username, $password, $dbname);
      // Check connection
      if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
      }

      // SQL SELECT STATEMENT
      $sql = "SELECT * FROM burgerg1_verblitz.Dictionary ORDER BY WordID DESC";

      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
          //Assign PHP var with SQL val
          $wordID = $row["WordID"];
          $en = $row["en"];
          
          //Check deGender, print N/A if Null
          if ($row["deGender"] == NULL) {
            $deGender = "N/A";
          } else {
            $deGender = $row["deGender"];
          }

          $de = $row["de"]; 
        }
      } else {
        echo "0 results";
      }
      $conn->close();

  } if (isset($_GET['next'])) {
  
      // Create connection
      $conn = new mysqli($servername, $username, $password, $dbname);
      // Check connection
      if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
      }

      // SQL SELECT STATEMENT
      $sql = "SELECT * FROM burgerg1_verblitz.Dictionary";

      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
          //Assign PHP var with SQL val
          $wordID = $row["WordID"];
          $en = $row["en"];
          
          //Check deGender, print N/A if Null
          if ($row["deGender"] == NULL) {
            $deGender = "N/A";
          } else {
            $deGender = $row["deGender"];
          }

          $de = $row["de"]; 
        }
      } else {
        echo "0 results";
      }
      $conn->close();
  } if (isset($_GET['random'])) {

  
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }

    // SQL SELECT STATEMENT
    $sql = "SELECT * FROM burgerg1_verblitz.Dictionary ORDER BY RAND()";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
        //Assign PHP var with SQL val
        $wordID = $row["WordID"]."<br>";
        $en = $row["en"]."<br>";
        
        //Check deGender, print N/A if Null
        if ($row["deGender"] == NULL) {
          $deGender = "N/A"."<br>";
        } else {
          $deGender = $row["deGender"]."<br>";
        }

        $de = $row["de"]."<br>"; 
      }
    } else {
      echo "0 results";
    }
      $conn->close();
  } 
} //End If statements for each button press


if (isset($wordID)) {
  echo "ID is Set: ";
  echo $wordID;
  echo "<br>";
} else {
  echo "ID is Blank";
}

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>GETWORD</title>
</head>
<body>
<p>
<form method="get">
  <input type="submit" name="prev" class="btn btn-info" value="Prev Word">
  <input type="submit" name="next" class="btn btn-info" value="Next Word">
</form>
</p>

<p>
<form  action = "getword.php" method="get">
  <input type="submit" name="random" class="btn btn-info" value="Random">  
</form>


</body>
</html>



