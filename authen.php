
<?php

session_start();
include ('DBconx.php');
$nameErr = $passwordErr  = "";
$username = $password = "";
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
$valide=true;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["username"])) {
    $nameErr = "Name is required";
    $valide=false;
  }
   else {
    //$username = test_input($_POST["username"]);
    $username=$_POST["username"];
  }

  if (empty($_POST["password"])) {
    $passwordErr = "password is required";
    $valide=false;
  } 
  else {
    $password = test_input($_POST["password"]);
  }
}
if($valide){
  $req = $conn->query('SELECT * FROM `LoginAdmin` ');
  //le fetch
  $admin = $req->fetch(PDO::FETCH_NUM);
    if($admin[1]==$username && $admin[2]==$password){
        $_SESSION["username"]=$admin[1];
        header("Location: principale.php");

    }
    else{
      header('Location: index.php?erreur=1 $passwordErr');
       
    }
   
}


?>