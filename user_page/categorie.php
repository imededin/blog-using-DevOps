<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>magazine-categorie</title>
        <meta content="width=device-width, initial-scale=1" name="viewport">
        <meta content="" name="keywords">
        <meta content="" name="description">

        <!-- Favicon -->
        <link href="img/favicon.ico" rel="icon">

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,600&display=swap" rel="stylesheet"> 

        <!-- CSS Libraries -->
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
        <link href="lib/slick/slick.css" rel="stylesheet">
        <link href="lib/slick/slick-theme.css" rel="stylesheet">

        <!-- Template Stylesheet -->
        <link href="css/style.css" rel="stylesheet">
        <!-- Template Stylesheet -->
        <!-- Template Stylesheet -->
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="responsive.css">
    
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,500,600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,500,700,900" rel="stylesheet">
    </head>

<body>
        <!-- Top Bar Start -->
    <div class="wrapper">
        
        <!-- Brand Start -->
        <div class="brand">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-4">
                        <div class="b-logo">
                            <a href="index.html">
                                <img src="img/ensi.png" alt="Logo">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-4">
                        <div class="b-ads">
                            <a href="img/ossec-logo.png">
                                <img src="img/ossec-logo.png" alt="Ads" style="width:13%;height:14%">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4">
                        <div class="b-search">
                            <input type="text" placeholder="Search">
                            <button><i class="fa fa-search"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Brand End -->

        <!-- Nav Bar Start -->
        <header class="header">
            <div class="container">
                <div class="row">
                    <div class="col-md-2">
                        <div class="logo">
                            <h2><a href="http://ossec.tn/">ossec</a></h2>
                        </div>
                    </div>
                    <div class="col-md-10">
                        <div class="menu">
                            <ul>
                                <li ><a href="home.php">Home</a></li>
                                <li class="active"><a href="categorie.php">categorie</a></li>
                                
                                <li><a href="#">article</a></li>
                                <li><a href="contact.php">contact</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </header>
   <!-- Nav Bar End -->

        <!-- Top News Start-->
        <div class="top-news">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 tn-left">
                        <div class="row tn-slider">
                            <div class="col-md-6">
                                <div class="tn-img">
                                    <img src="img/magazine.jpg" style="width:100%" />
                                    <div class="tn-title">
                                        <a href="">March 2016</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="tn-img">
                                    <img src="img/magazine1.jpg" style="width:100%" />
                                    <div class="tn-title">
                                        <a  href="">Sept 2014</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 tn-right">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="tn-img">
                                    <img src="img/ossec.png" style="width:100%"/>
                                    <div class="tn-title">
                                        <a href="">May 2018</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="tn-img">
                                    <img src="img/ossec1.jpg" style="width:100%"/>
                                    <div class="tn-title">
                                        <a href="">August 2015</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="tn-img">
                                    <img src="img/magazine3.jpg" style="width:100%"/>
                                    <div class="tn-title">
                                        <a href="">July 2014</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="tn-img">
                                    <img src="img/magazine4.jpg" style="width:100%"/>
                                    <div class="tn-title">
                                        <a href="">April 2017</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Top News End-->

        <!-- Category News Start-->
        <?php
                require 'database.php';
                $pdo = Database::connect();
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $sql = 'SELECT * FROM categorie ';
                       
                $req = $pdo->query($sql);
                 echo   "<div class='cat-news'>
                           <div class='container'>
                               <div class='row'>";
                
                while($row = $req->fetch(PDO::FETCH_NUM)){
                    
                    $article="SELECT  * FROM article where id_categorie=$row[0]";
                    $req2 = $pdo->query($article);
                       
       
              echo " <div class='col-md-6'>
                    <h2>$row[1]</h2>
                        <div class='row cn-slider'>";
                        while($row1 = $req2->fetch(PDO::FETCH_NUM)){

                        

                         echo   " <div class='col-md-6'>
                                <div class='cn-img'>";
                          echo          " <img src=$row1[3] >";
                           echo "   <div class='cn-title'>
                                        <a href='article.php?id=$row1[0]'>$row1[1]</a>
                                    </div>
                                </div>
                            </div>";
                        }
                       echo " </div>
                    </div>";
        
                }
                echo "</div>
                </div>
                </div>";
        ?>
        <!-- Category News End-->

        <!-- Footer Start -->
        <div class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="footer-widget">
                            <h3 class="title">contact</h3>
                            <div class="contact-info">
                                <p><i class="fa fa-map-marker"></i>UNIVERSITÉ DE LA MANOUBA, École nationale des sciences de l'informatique, 2010 MANOUBA , TUNISIE.</p>
                                <p><i class="fa fa-envelope"></i>ossec@ensi-uma.tn</p>
                                <p><i class="fa fa-phone"></i>+216 29 333 477</p>
                                <div class="social">
                                    <a href=""><i class="fab fa-twitter"></i></a>
                                    <a href=""><i class="fab fa-facebook-f"></i></a>
                                    <a href=""><i class="fab fa-linkedin-in"></i></a>
                                    <a href=""><i class="fab fa-instagram"></i></a>
                                    <a href=""><i class="fab fa-youtube"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-lg-3 col-md-6">
                        <div class="footer-widget">
                            <h3 class="title">liens utiles</h3>
                            <ul>
                                <li><a href="home.php">home</a></li>
                                <li><a href="http://ossec.tn/">ossec officiel website</a></li>
                                <li><a href="http://magazine.ossec.tn/">magazine ossec</a></li>
                                <li><a href="http://ossec.tn/About%20us.html">A propos de nous</a></li>
                                <li><a href="contact.php">contact</a></li>
                            </ul>
                        </div>
                    </div>

                    
                    <div class="col-lg-3 col-md-6">
                        <div class="footer-widget">
                            <h3 class="title">abonnez-vous</h3>
                            <div class="newsletter">
                                <p>
                                En vous abonnant, vous obtiendrez toute l'actualité et toute les nouveautés des nos articles
                                </p>
                                <form>
                                    <input class="form-control" type="email" placeholder="Your email here">
                                    <button class="btn">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer End -->
        
        <!-- Footer Menu Start -->
        <div class="footer-menu">
            <div class="container">
                <div class="f-menu">
                    <a href="">Terms of use</a>
                    <a href="">Privacy policy</a>
                    <a href="">Cookies</a>
                    <a href="">Accessibility help</a>
                    <a href="">Advertise with us</a>
                    <a href="">Contact us</a>
                </div>
            </div>
        </div>
        <!-- Footer Menu End -->

        <!-- Footer Bottom Start -->
        <div class="footer-bottom">
            <div class="container">
                <div class="row">
                    

                </div>
            </div>
        </div>
        <!-- Footer Bottom End -->

        <!-- Back to Top -->
        <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

        <!-- JavaScript Libraries -->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
        <script src="lib/easing/easing.min.js"></script>
        <script src="lib/slick/slick.min.js"></script>

        <!-- Template Javascript -->
        <script src="js/main.js"></script>
    </body>
</html>
