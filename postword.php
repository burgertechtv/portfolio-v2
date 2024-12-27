<!-- PHP Code -->
<?php
$servername = "162.241.252.197";
$username = "burgerg1_dbuser";
$password = "2020Tech2020";
$dbname = "burgerg1_verblitz";

$randID =         NULL;
$enInput =        NULL;
$deGenderInput =  NULL;
$deInput=         NULL;

if ($_SERVER["REQUEST_METHOD"] == "POST") { 
$randID =         rand(1, 9999999);
$enInput =        $_POST['en'];
$deGenderInput =  $_POST['deGender'];
$deInput =        $_POST['de'];
} 

echo $randID;
echo $enInput;
echo $deGenderInput;
echo $deInput;

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// prepare and bind
$sql = $conn->prepare("INSERT INTO burgerg1_verblitz.Dictionary (en, deGender, de) VALUES (?,?,?)");

$sql->bind_param("sss", $enInput, $deGenderInput, $deInput);

$sql->execute();


$sql->close();
mysqli_close($conn);


// Create SQL Query without Variables
// $sql =
// "
// INSERT INTO burgerg1_verblitz.Dictionary (WordID, en, deGender, de)
//     VALUES (?,?,?,?);
// ";

// if (mysqli_query($conn, $sql)) {
//   echo "New record created successfully";
// } else {
//   echo "Error: " . $sql . "<br>" . mysqli_error($conn);
// }

?>