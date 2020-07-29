<?php

session_start();

if(isset($_SESSION['user'])|| isset($_COOKIE['user'])){


    $id=$_GET['action'];




if($_GET['action']=='i'){

 $id= $_GET['e'];
if(isset($_POST['Add'])) {
    if (isset($_SESSION['cart'])) {
        $item_array = array_column($_SESSION['cart'], "product_id");
        if (in_array($_POST['Add'], $item_array)) {
            echo "<script> alert('product is already addedin the cart....')</script>";

        } else {
            $count = count($_SESSION['cart']);
            $item = array(
                'product_id' => $_POST['Add']
            );
            $_SESSION['cart'][$count] = $item;
        }


    } else {
        $item = array(
            'product_id' => $_POST['Add']

        );
        $_SESSION['cart'][0] = $item;

        //  print_r($_SESSION['cart']);
    }
}
}
function card($name ,$imge,$price,$product_id,$weight,$expir,$id,$discount){
    echo "
              <div class=\"col-md-3 col-sm-6\">
                <form method=\"post\"  action='product.php?action=i&e=$id'>
                <div class=\"card shadow my-3\">
                    <div>
                    <img src=$imge  alt=\"img1\" class=\"img-fluid card-img-top\">
                </div>
                <div class=\"card-body\">
                    <h5 class=\"card-title\">$name</h5>
                    <h6>
                        <i class=\"fa fa-star\"></i>
                        <i class=\"fa fa-star\"></i>
                        <i class=\"fa fa-star\"></i>
                        <i class=\"fa fa-star\"></i>
                        <i class=\"fa fa-star-o\"></i>

                    </h6>
                    <p class=\"card-text\">
                        This is one of the best types of cookies
                    </p>
                    <h5> 
                       <p class='text-secondary '>Weight : $weight g</p>
                       <p class='text-secondary'> Expiration : $expir</p>
                        ";
                        if($discount==null || $discount==0){
                            echo " <span class=\"price\">$$price</span>";

                        }else{
                            echo "   <small><s class=\"text-secondary\">$$price</s></small>";
                            $newprice=$price-$discount;
                            echo " <span class=\"price\">$$newprice</span>";



                        }
                        echo "   </h5>
                    <button type=\"get\" name=\"Add\" id='add' value='$product_id' class=\"btn btn-warning my-3\">Add to card <i class=\"fa fa-shopping-cart\"></i></button>
                </div>
            </div>
            </form>
            </div>";








}





$conn = mysqli_connect("localhost", "root", "", "ec");
if (mysqli_connect_errno()) {
    echo "no connect";
} else {
    $qu = "select * from product where gate_id= " . $id;

    $result = mysqli_query($conn, $qu);


    if (isset($_POST['search'])) {
        $find = "%{$_POST['key']}%";
        $qus = "select * from product where product_nam like '$find'";
        $result = mysqli_query($conn, $qus);
    }
}

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="fonts/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/css.css">
    <title>Document</title>
</head>
<body>

<div></div>
<nav class="navbar navbar-dark bg-dark navbar-expand-md" id="app-navbar">
    <div class="container-fluid"><a class="navbar-brand" href="#"><img src="imge/logo.png" class="img-fluid  w"> </a><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
        <div
                class="collapse navbar-collapse" id="navcol-1">
            <ul class="nav navbar-nav ml-auto">
                <form class="form-inline  mr-lg-5" method="post">
                    <input class="form-control se" type="search" placeholder="Search" name="key" aria-label="Search">
                    <button class="bt btn btn-outline-secondary   my-sm-0" type="submit" name="search"><i class="fa fa-search"></i></button>
                </form>

                <li class="nav-item" role="presentation"><a class="nav-link active" href="inde.php">Home</a></li>

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




<div class="container">
    <div class="row text-center py-5">
        <?php
        if (mysqli_num_rows($result)>0) {
            while ($row = mysqli_fetch_assoc($result)) {

                card($row['product_nam'], $row['imge'], $row['product_price'], $row['id'], $row['Weight'], $row['Expiration'], $id, $row['discount']);

            }
        }
        ?>
    </div>
</div>

















</script>


<script src="js/jquery.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
</body>
<?php }else{
    header("Location: login.php");

}?>
</html>

