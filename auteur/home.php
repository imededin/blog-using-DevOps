<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="utf-8">

	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
  <link rel="stylesheet" href="../style.css" >
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</head>
<body>
    <nav class="navbar navbar-expand-xl bg-dark  justify-content-center">
      <a class="navbar-brand" href="http://ossec.tn/img/OSSEC.png">
        <img src="http://ossec.tn/img/OSSEC.png" alt="Logo" style="width:80px;">
      </a>
  
      <ul class="nav nav-pills">
        <li class="nav-item">
         <a class="nav-link bg-light" href="../principale.php"><h5><b>HOME</b></h5></a>
        </li>
        
        <li class="nav-item">
          <a class="nav-link bg-light" href="../user_page/home.php"><h5>USER PAGE</h5></a>
        </li>
        <li class="nav-item">
          <a class="nav-link bg-light" href="#"><h5>AUTEUR</h5></a>
        </li>
      </ul>
    </nav>

<div class="jumbotron bg-info " > 
          <div class="jumbotron bg-primary " >
            <div class="row">
                <div>
                  <h3>auteurs settings:</h3><br><br>
                </div>
            </div>
          </div>
          <div class="jumbotron  " >
            <div class="row">
                <p><h6><u> taper ce boutton pour ajouter un auteur:</u></h6>
                    <a href="create.php" class="btn btn-success">ajouter auteur</a>
                </p>
            </div>
            <div class="row">
                <div class="col">
                  <h4>auteurs</h4>
                  <table class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>id</th>
                          <th>nom</th>
                          <th>email</th>
                  
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php
                      include("../DBconx.php");
                       $sql = 'SELECT * FROM AUTEUR ';
                       
                       $req = $conn->query($sql);
                       while($row = $req->fetch(PDO::FETCH_NUM)) {
                                echo '<tr>';
                                echo '<td>'. $row[0] . '</td>';
                                echo '<td>'. $row[1] . '</td>';
                                echo '<td>'. $row[2] . '</td>';

                                echo '<td width=250>';
                                echo '<a class="btn" href="read.php?id='.$row[0].'">Read</a>';
                                echo ' ';
                                echo '<a class="btn btn-success" href="update.php?id='.$row[0].'">Update</a>';
                                echo ' ';
                                echo '<a class="btn btn-danger" href="delete.php?id='.$row[0].'">Delete</a>';
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