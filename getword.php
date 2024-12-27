<!-- PHP Code -->
<?php
$servername = "162.241.252.197";
$username = "burgerg1_dbuser";
$password = "2020Tech2020";
$dbname = "burgerg1_verblitz";

$wordID = NULL;
$en = NULL;
$deGender = NULL;
$de = NULL;

$randID = NULL;
$enInput = NULL;
$deGenderInput = NULL;
$deInput= NULL;

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM burgerg1_verblitz.Dictionary";

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
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
<div class="jumbotron text-center" style="margin-bottom:0">
  <h1>Verblitz App</h1>
  <p>App for English Speakers to Learn German</p>
</div>

<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <a class="navbar-brand" href="#">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="#">Link</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Link</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Link</a>
      </li>    
    </ul>
  </div>  
</nav>

<div class="container" style="margin-top:25px">
  <div class="row text-center">
    <!-- Column 1 -->
    <div class="col-md-4">
      <h3>Verblitz</h3>
      <p>Enter Translation Below</p>
      
      <div class="container">      

        <form method="post" 
          action="
            <?php echo $_SERVER['PHP_SELF'];?>
          ">
            <p> English:  
                <input type="text" name="en">
            </p>
            
            <p>
            Gender:
              <input checked="checked" type="radio" name="gender" value="">N/A
              <input type="radio" name="gender" value="der">Male
              <input type="radio" name="gender" value="die">Female
              <input type="radio" name="gender" value="das">Neuter  
            </p>

            <p> German: 
                <input type="text" name="de">  
            </p>

            <input type="submit" value="Submit Translation">

          </form>

          <?php
          if ($_SERVER["REQUEST_METHOD"] == "POST") {
              // collect value of input field
              // $name =   $_POST['fname'];

              $randID =  rand(1, 9999999);
              $enInput =     $_POST['en'];
              
              //Check Gender to Prevent Error           
              if ($_POST['gender'] == NULL) {
                $deGenderInput = "N/A";  
              } else { 
                $deGenderInput = $_POST['gender'];
              }

              $deInput =     $_POST['de'];
          } ?>

      </div>
    </div>

    <div class="col-md-4">
      <h3 id="valH3">Values</h3>
      <!-- PHP Prints Submitted Word Pair -->
      <p id=wordID> 
        WordID:
        <?php echo $randID;?>    
      </p>
      
      <p id=en>
        English: 
        <?php echo $enInput;?>
      </p>
      
      <p id=deGender>
        German Gender (if Noun): 
        <?php echo $deGenderInput;?>
      </p>
      
      <p id=de>
        German: 
        <?php echo $deInput;?>
      </p>

    </div>

    <div class="col-md-4">
      <h3>Selected Word Pair</h3>
      <p id=wordID> 
        WordID:
        <?php echo $wordID;?>    
      </p>
      
      <p id=en>
        English: 
        <?php echo $en;?>
      </p>
      
      <p id=deGender>
        German Gender (if Noun): 
        <?php echo $deGender;?>
      </p>
      
      <p id=de>
        German: 
        <?php echo $de;?>
      </p>

      <form action="postword.php" method="get">
        <input type="submit" class="btn btn-info" value="Prev Word">
        <input type="submit" class="btn btn-info" value="Random">
        <input type="submit" class="btn btn-info" value="Next Word">
      </form>

    </div>
  </div> <!-- END ROW -->

    

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <!-- Optional JavaScript -->
    <!-- 
      <script type="text/javascript" src="tempcalc.js">  </script> 
    -->

    <!-- In Line Script -->



  </body>
</html>