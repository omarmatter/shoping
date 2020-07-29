<?php
session_start();

if(isset($_SESSION['user'])||isset($_COOKIE['user'])){

 function gallary($imge ,$name ,$disc ,$id){
     echo "
      <div class=\"col-xl-3 col-lg-4 col-md-6 mb-4   \">
             <form method='post' action='product.php?action=$id'>

        <div class=\"bg-white rounded shadow-sm\"><img src= $imge     alt=\"\" class=\"img-fluid card-img-top\">
          <div class=\"p-4\">
            <h5> <button type='submit' class=\"text-dark \"  style='background: none ; border: none;' value=$id  name='Add'>$name</button></h5>
            <p class=\"small text-muted mb-0\">$disc</p>
            <div class=\"d-flex align-items-center justify-content-between rounded-pill bg-light px-3 py-2 mt-4\">
              <div class=\"badge badge-danger px-3 rounded-pill font-weight-normal\">New</div>
            </div>
          </div>
        </div>
      </div>
     </form>
     ";
 }


$conn = mysqli_connect("localhost", "root", "", "ec");
if (mysqli_connect_errno()) {
    echo "no connect";
} else {
    $qu = "select * from category ";

    $result = mysqli_query($conn, $qu);

    if (isset($_POST['search'])){
        $find="%{$_POST['key']}%";
        $qus = "select * from category where name like '$find'";
        $result = mysqli_query($conn, $qus);



    }
}














?>




<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Untitled</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto+Condensed:400,400i,700,700i">
    <link rel="stylesheet" href="fonts/font-awesome.min.css">
    <link rel="stylesheet" href="css/css.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" href="css/style.css">

</head>

<body>
  <!--Nav-->
    <nav class="navbar navbar-dark bg-dark navbar-expand-md    id="app-navbar">
        <div class="container-fluid"><a class="navbar-brand" href="#"><img src="imge/logo.png" class="img-fluid  w"> </a><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div
                class="collapse navbar-collapse" id="navcol-1">
                <ul class="nav navbar-nav ml-auto">
                <li class="nav-item" role="presentation">
                    <form class="form-inline  mr-lg-5" method="post">
                        <input class="form-control se" type="search" placeholder="Search" name="key" aria-label="Search">
                        <button class="bt btn btn-outline-secondary  " type="submit" name="search"><i class="fa fa-search"></i></button>
                    </form>
                </li>
                    <li class="nav-item" role="presentation"><a class="nav-link active" href="inde.php">Home</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="#Product">Products</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="#about">About</a></li>

                    <li>   <a href="cart.php" class="nav-item nav-link active">
                            <h5 class="px-5 cart">
                                <i class="fa fa-shopping-cart"></i> Cart

                                <?php
                                if(isset($_SESSION['cart'])) {
                                    $count = count($_SESSION['cart']);
                                    echo "    <span  class=\"text-warning bg-light co\">$count</span>";

                                }else{
                                    echo " <span  class=\"text-warning co\">0</span>";

                                }
                                ?>
                            </h5>
                        </a></li>

                    <li class="nav-item" role="presentation">
                        <a class="nav-link " href="logout.php">log out &emsp13;<i class="fa fa-sign-out"></i> </a></li>
                </ul>
        </div>
        </div>
    </nav>
    <!--End-->
    <section id="carousel" >
        <div class="carousel slide" data-ride="carousel" id="carousel-1">
            <div class="carousel-inner" role="listbox">
                <div class="carousel-item">
                    <div class="jumbotron pulse animated hero-nature carousel-hero">
                        <h1 class="hero-title">Hero Nature</h1>
                        <p class="hero-subtitle">Nullam id dolor id nibh ultricies vehicula ut id elit. Cras justo odio, dapibus ac facilisis in, egestas eget quam.</p>
                        <p><a class="btn btn-primary hero-button plat" role="button" href="#">Learn more</a></p>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="jumbotron pulse animated hero-photography carousel-hero">
                        <h1 class="hero-title">Hero Photography</h1>
                        <p class="hero-subtitle">Nullam id dolor id nibh ultricies vehicula ut id elit. Cras justo odio, dapibus ac facilisis in, egestas eget quam.</p>
                        <p><a class="btn btn-primary hero-button plat" role="button" href="#">Learn more</a></p>
                    </div>
                </div>
                <div class="carousel-item active">
                    <div class="jumbotron pulse animated hero-technology carousel-hero">
                        <h1 class="hero-title">Hero Technology</h1>
                        <p class="hero-subtitle">Nullam id dolor id nibh ultricies vehicula ut id elit. Cras justo odio, dapibus ac facilisis in, egestas eget quam.</p>
                        <p><a class="btn btn-primary hero-button plat" role="button" href="#">Learn more</a></p>
                    </div>
                </div>
            </div>
            <div><a class="carousel-control-prev" href="#carousel-1" role="button" data-slide="prev"><i class="fa fa-chevron-left"></i><span class="sr-only">Previous</span></a><a class="carousel-control-next" href="#carousel-1" role="button" data-slide="next"><i class="fa fa-chevron-right"></i><span class="sr-only">Next</span></a></div>
            <ol
                class="carousel-indicators">
                <li data-target="#carousel-1" data-slide-to="0"></li>
                <li data-target="#carousel-1" data-slide-to="1"></li>
                <li data-target="#carousel-1" data-slide-to="2" class="active"></li>
                </ol>
        </div>
    </section>
  <div class="photo-gallery">
<div class="container-fluid" id="Product">
    <h1 class="text-center my-lg-5">Products</h1>

    <div class="px-lg-5">

    <div class="row" >
      <!-- Gallery item -->

      <!-- End -->

      <!-- Gallery item -->

     <?php
     if (mysqli_num_rows($result)>0){

     while ($row=mysqli_fetch_assoc($result)){
         gallary($row['imge'],$row['name'],$row['description'],$row['id']);
     }



     ?>

      </div>
      <!-- End -->


     


    </div>

  </div>
</div>

</div>
  <?php
  }else {
      echo "<div class=\"text-secondary  text-center \" >No found any item</div>
      ";
  }
  ?>
<!--Testmonial-->
    <div class="carousel slide" data-ride="carousel" data-interval="10000" id="carousel-t">
        <h1 class="text-center my-lg-5 font-weight-lighter" id="about">What our customers say about us</h1>
        <div class="carousel-inner" role="listbox">
            <div class="carousel-item active">
                <div class="col-9 text-center mx-auto testimonial-content"><img class="rounded-circle" src="imge/test-man.jpg" width="100">
                    <p class="text-center rating">5&nbsp;<i class="fa fa-star"></i></p>
                    <p class="text-center"><em>"Lorem ipsum dolor sit amet, nec cu omnium ponderum instructior, eligendi gubergren cotidieque te eam. Sed ceteros salutatus definiebas eu, ut modo argumentum reprimique quo. Per te convenire facilisis. Eu vel noster scaevola molestiae.&nbsp;Lorem ipsum dolor sit amet, nec cu omnium ponderum instructior, eligendi gubergren cotidieque te eam. Sed ceteros salutatus definiebas eu, ut modo argumentum reprimique quo. Per te convenire facilisis. Eu vel noster scaevola molestiae."</em><br></p>
                    <p
                        class="signature">Omar Matter.</p>
                        <p class="text-center date">May 12, 2020<br></p>
                </div>
            </div>
            <div class="carousel-item">
                <div class="col-9 offset-xl-1 text-center mx-auto testimonial-content"><img class="rounded-circle" src="imge/test-woman.jpg" width="100">
                    <p class="text-center rating">5&nbsp;<i class="fa fa-star"></i></p>
                    <p class="text-center"><em>"Lorem ipsum dolor sit amet, nec cu omnium ponderum instructior, eligendi gubergren cotidieque te eam. Sed ceteros salutatus definiebas eu, ut modo argumentum reprimique quo. Per te convenire facilisis. Eu vel noster scaevola molestiae.&nbsp;Lorem ipsum dolor sit amet, nec cu omnium ponderum instructior, eligendi gubergren cotidieque te eam. Sed ceteros salutatus definiebas eu, ut modo argumentum reprimique quo. Per te convenire facilisis. Eu vel noster scaevola molestiae."</em><br></p>
                    <p
                        class="signature">Hadeel .T</p>
                        <p class="text-center date">May 12, 2020<br></p>
                </div>
            </div>
            <div class="carousel-item">
                <div class="col-9 text-center mx-auto testimonial-content"><img class="rounded-circle" src=" imge/test-man2.jpg" width="100">
                    <p class="text-center rating">5&nbsp;<i class="fa fa-star"></i></p>
                    <p class="text-center"><em>"Lorem ipsum dolor sit amet, nec cu omnium ponderum instructior, eligendi gubergren cotidieque te eam. Sed ceteros salutatus definiebas eu, ut modo argumentum reprimique quo. Per te convenire facilisis. Eu vel noster scaevola molestiae.&nbsp;Lorem ipsum dolor sit amet, nec cu omnium ponderum instructior, eligendi gubergren cotidieque te eam. Sed ceteros salutatus definiebas eu, ut modo argumentum reprimique quo. Per te convenire facilisis. Eu vel noster scaevola molestiae."</em><br></p>
                    <p
                        class="signature">Omar M.</p>
                        <p class="text-center date">May 12, 2020<br></p>
                </div>
            </div>
            <div class="carousel-item">
                <div class="col-9 offset-xl-1 text-center mx-auto testimonial-content"><img class="rounded-circle" src="imge/test-woman2.jpg" width="100">
                    <p class="text-center rating">5&nbsp;<i class="fa fa-star"></i></p>
                    <p class="text-center"><em>"Lorem ipsum dolor sit amet, nec cu omnium ponderum instructior, eligendi gubergren cotidieque te eam. Sed ceteros salutatus definiebas eu, ut modo argumentum reprimique quo. Per te convenire facilisis. Eu vel noster scaevola molestiae.&nbsp;Lorem ipsum dolor sit amet, nec cu omnium ponderum instructior, eligendi gubergren cotidieque te eam. Sed ceteros salutatus definiebas eu, ut modo argumentum reprimique quo. Per te convenire facilisis. Eu vel noster scaevola molestiae."</em><br></p>
                    <p
                        class="signature">Jane D.</p>
                        <p class="text-center date">May 12, 2020<br></p>
                </div>
            </div>
        </div>
        <div><a class="carousel-control-prev" href="#carousel-t" role="button" data-slide="prev"><i class="icon ion-android-arrow-dropleft-circle d-flex d-lg-flex justify-content-center align-items-center"></i><span class="sr-only">Previous</span></a><a class="carousel-control-next"
                href="#carousel-t" role="button" data-slide="next"><i class="icon ion-android-arrow-dropright-circle d-flex d-lg-flex justify-content-center align-items-center"></i><span class="sr-only">Next</span></a></div>
        <ol class="carousel-indicators">
            <li data-target="#carousel-t" data-slide-to="0" class="active"></li>
            <li data-target="#carousel-t" data-slide-to="1"></li>
            <li data-target="#carousel-t" data-slide-to="2"></li>
            <li data-target="#carousel-t" data-slide-to="3"></li>
        </ol>
    </div>

  <!---End-->

    <!--fotter-->
    <footer id="myFooter">
        <div class="container-fluid">
            <div class="row text-center">
                <div class="col-12 col-sm-6 col-md-3">
                    <h1 class="logo" style="margin-top:30px;  ">
                        <a href="#">&nbsp;<img src="imge/logo.png" class="w img-fluid"></a></h1>
                </div>
                <div class="col-12 col-sm-6 col-md-2">
                    <h5>Get started</h5>
                    <ul>
                        <li><a href="#">Home</a></li>
                        <li><a href="#">Downloads<br></a></li>
                        <li><a href="#">Sign Up</a></li>
                        <li><a href="#">Other Links</a></li>
                    </ul>
                </div>
                <div class="col-12 col-sm-6 col-md-2">
                    <h5>Our Company</h5>
                    <ul>
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">Company Information<br></a></li>
                        <li><a href="#">Reviews</a></li>
                        <li><a href="#">Contacts</a></li>
                    </ul>
                </div>
                <div class="col-sm-6 col-md-2">
                    <h5>Support</h5>
                    <ul>
                        <li><a href="#">FAQ</a></li>
                        <li><a href="#">Help Desk<br></a></li>
                        <li><a href="#">Forums</a></li>
                        <li><a href="#">External Links</a></li>
                    </ul>
                </div>
                <div class="col-md-3 social-networks">
                    <div></div><a class="facebook" href="#"><i class="fa fa-facebook"></i></a><a class="twitter" href="#"><i class="fa fa-twitter"></i></a><a class="google" href="#"><i class="fa fa-google-plus"></i></a><a class="linkedin" href="#"><i class="fa fa-linkedin"></i></a>
                    <button
                        class="btn btn-primary" style="margin-top:20px;" type="button">Contact us</button>
                </div>
            </div>
            <div class="row footer-copyright">
                <div class="col">
                    <p>© 2020 Copyright by Omar Matter <i class="text-danger fa fa-heart-o"></i></p>
                </div>
            </div>
        </div>
    </footer>
    <!--End-->
    <script src="js/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
   
</body>
<?php }else{
    header("Location: login.php");

} ?>
</html>