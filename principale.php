<!DOCTYPE html>
<html lang="fr">
<head>
<?php
        session_start();
        if(isset($_GET['deconnexion']))
        { 
           if($_GET['deconnexion']==true)
           {  
              session_unset();
              header("location:index.php");
           }
        }
        else if($_SESSION['username'] !== ""){
            $user = $_SESSION['username'];
            // afficher un message
            echo "<br>Bonjour $user, vous êtes connectés";
        }
    ?>
<meta charset="utf-8">

	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
  <link rel="stylesheet" href="style.css" >
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</head>

<body>
    <div class="jumbotron text-center " >
        <img src="https://location-photomaton-14.webself.net/file/si1173787/bienvenue-fi21361854x780.png" alt="<h1><b><u>bienvenue cher admin</u></b> </h1>">
    </div>

  <!-- Links -->
    <nav class="navbar navbar-expand-xl bg-dark  justify-content-center">
      <a class="navbar-brand" href="http://ossec.tn/img/OSSEC.png">
        <img src="http://ossec.tn/img/OSSEC.png" alt="Logo" style="width:80px;">
      </a>
  
      <ul class="nav nav-pills">
        <li class="nav-item">
         <a class="nav-link bg-light" href="#"><h5><b>HOME</b></h5></a>
        </li>
        
        <li class="nav-item">
          <a class="nav-link bg-light" href="user_page/home.php"><b><h5>USER PAGE</h5></b></a>
        </li>
        <li class="nav-item">
          <a class="nav-link bg-light" href="auteur/home.php"><b><h5>AUTEUR</h5></b></a>
        </li>
        <li class="nav-item justify-content-right">
          <a class="nav-link bg-light" href='principale.php?deconnexion=true'><b><h5>Deconnexion</h5></b></a>
        </li>
     </ul>
    </nav>
  <div class="jumbotron ">
    <img src="http://ossec.tn/img/sign.png"   align="right">
    <div class="container-fluid">
      <div class="jumbotron " > 
        <div class="jumbotron bg-info " > 
          <div class="jumbotron bg-primary " >
            <div class="row">
                <div>
                  <h3>catégorie settings:</h3><br><br>
                </div>
            </div>
          </div>
          <div class="jumbotron  " >
            <div class="row">
                <p><h6><u> taper ce boutton pour ajouter une catégorie:</u></h6>
                    <a href="crud_ca/create.php" class="btn btn-success">ajouter catégorie</a>
                </p>
            </div>
            <div class="row">
                <div class="col">
                  <h4>catégories</h4>
                  <table class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>id</th>
                          <th>titre</th>
                  
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php
                      include("DBconx.php");
                       $sql = 'SELECT * FROM CATEGORIE ';
                       
                       $req = $conn->query($sql);
                       while($row = $req->fetch(PDO::FETCH_NUM)) {
                                echo '<tr>';
                                echo '<td>'. $row[0] . '</td>';
                                echo '<td>'. $row[1] . '</td>';
                                echo '<td width=250>';
                                echo '<a class="btn" href="crud_ca/read.php?id='.$row[0].'">Read</a>';
                                echo ' ';
                                echo '<a class="btn btn-success" href="crud_ca/update.php?id='.$row[0].'">Update</a>';
                                echo ' ';
                                echo '<a class="btn btn-danger" href="crud_ca/delete.php?id='.$row[0].'">Delete</a>';
                                echo '</td>';
                                echo '</tr>';
                              }
                      ?>
                      </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        
     <!-- /container -->
    
    <div class="jumbotron bg-info " > 
      <div class="jumbotron bg-primary " >
        <div class="row">
          <h3> edition  settings:</h3><br><br>
        </div>
      </div>
      <div class="jumbotron  " >
        <div class="row">
            <p><h6><u> taper ce boutton pour ajouter une edition:</u></h6>
            <a href="crud_ed/create.php" class="btn btn-success">ajouter edition</a>
            </p>
        </div>
        <h4>éditions:</h4>
        <table class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>id</th>
                          <th>Numero</th>
                          <th>date</th>
                          <th>photo_couverture</th>
                          <th>Description</th>
                  
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php
                       include 'DBconx.php';
                       $sql = 'SELECT * FROM edition ';
                       
                       $req = $conn->query($sql);
                       while($row = $req->fetch(PDO::FETCH_NUM)) {
                                echo '<tr>';
                                echo '<td>'. $row[0] . '</td>';
                                echo '<td>'. $row[1] . '</td>';
                                echo '<td>'. $row[2] . '</td>';
                                echo '<td>'. $row[3] . '</td>';
                                echo '<td>'. $row[4] . '</td>';
                                echo '<td width=250>';
                                echo '<a class="btn" href="crud_ed/read.php?id='.$row[0].'">Read</a>';
                                echo ' ';
                                echo '<a class="btn btn-success" href="crud_ed/update.php?id='.$row[0].'">Update</a>';
                                echo ' ';
                                echo '<a class="btn btn-danger" href="crud_ed/delete.php?id='.$row[0].'">Delete</a>';
                                echo '</td>';
                                echo '</tr>';
                              }
                      ?>
                      </tbody>
                </table>
        </div>
      </div>
       
    <div class="jumbotron bg-info " > 
      <div class="jumbotron bg-primary " >
        <div class="row">
            <h3> article settings:</h3><br><br>
        </div>
      </div>
      <div class="jumbotron  " >
        <div class="row">
            <p><h6><u> taper ce boutton pour ajouter un article:</u></h6>
                <a href="crud_ar/create.php" class="btn btn-success">ajouter article</a>
            </p>
        </div>
        <h4>articles:</h4>
        <table class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>id</th>
                          <th>titre</th>
                          <th>image</th>
                          <th>date</th>
                  
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php
                       include 'DBconx.php';
                       $sql = 'SELECT * FROM article ';
                       
                       $req = $conn->query($sql);
                       while($row = $req->fetch(PDO::FETCH_NUM)) {
                                echo '<tr>';
                                echo '<td>'. $row[0] . '</td>';
                                echo '<td>'. $row[1] . '</td>';
                                echo '<td>'. $row[3] . '</td>';
                                echo '<td>'. $row[4] . '</td>';
                                echo '<td width=250>';
                                echo '<a class="btn" href="crud_ar/read.php?id='.$row[0].'">Read</a>';
                                echo ' ';
                                echo '<a class="btn btn-success" href="crud_ar/update.php?id='.$row[0].'">Update</a>';
                                echo ' ';
                                echo '<a class="btn btn-danger" href="crud_ar/delete.php?id='.$row[0].'">Delete</a>';
                                echo '</td>';
                                echo '</tr>';
                              }
                      ?>
                      </tbody>
                </table>
        </div>
      </div>

    </div>
 
  </body>
</html>