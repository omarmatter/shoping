<?php
    session_start();
    if(isset($_SESSION['user']) ||isset($_COOKIE['user'])){
$conn = mysqli_connect("localhost", "root", "", "ec");
if (mysqli_connect_errno()) {
    echo "no connect";
} else {
    if(isset($_SESSION['cart'])) {
        $product = array_column($_SESSION['cart'], 'product_id');
        $qu = "select * from product";
        $result = mysqli_query($conn, $qu);
    }
    if(isset($_POST['remove'])){

        if($_GET['action']=='romove'){
            foreach ($_SESSION['cart']as $key=>$value){

                if($value['product_id']==$_GET['id']){
                   unset($_SESSION['cart'][$key]);
                   echo "<script> alert('Product has been Removed.....')</script>";

                }
            }
        }
    }

}



    function dis($imgproduct,$nameproduct,$productprice,$productid){
        echo "                    <form action=\"cart.php?action=romove&id=$productid\" method=\"post\" class=\"cart-item \">
                            <div class=\"border rounded\">
                                <div class=\"row bg-white\">
                                    <div class=\"col-md-3 pl-0\">
                                        <img src=$imgproduct class=\"img-fluid\">
                                    </div>
                                    <div class=\"col-md-6\">
                                        <h5 class=\"pt-2\">$nameproduct</h5>
                                        <small class=\"text-secondary\">omar matter</small>
                                        <h5 class=\"pt-2\"> $ $productprice</h5>
                                        <button type=\"submit\" class=\"btn btn-warning\">save for latter</button>
                                        <button type=\"submit\" class=\"btn btn-danger mx-2\" name=\"remove\"> Remove</button>
                                    </div>
                                    <div class=\"col-md-3 py-5\">
                                        <div>
                                            <button type=\"button\" class=\"btn bg-light border rounded-circle\"><i class=\"fa fa-minus\"></i></button>
                                            <input type=\"text\" value=\"1\" class=\"form-control w-25 d-inline\">
                                            <button type=\"button\" class=\"btn bg-light border rounded-circle\" name=\"plus\"><i class=\"fa fa-plus\"></i></button>


                                        </div>
                            </div>
                            </div>
                            </div>

                        </form>";

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
    <link rel="stylesheet" href="css/css.css">
    <link rel="stylesheet" href="css/style.css">

    <title>Document</title>
</head>
<body>

    <nav class="navbar navbar-dark bg-dark navbar-expand-md" id="app-navbar">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"><img src="imge/logo.png" class="img-fluid  w"> </a>
            <button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span>
                <span class="navbar-toggler-icon"></span></button>
            <div
                    class="collapse navbar-collapse" id="navcol-1">
                <ul class="nav navbar-nav ml-auto">
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
                        </a>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link " href="logout.php">log out &emsp13;<i class="fa fa-sign-out"></i> </a></li>
                </ul>
            </div>
        </div>

    </nav>



<div class="container-fluid">
    <div class="row px-5">
            <div class="col-md-7">
                <div class="shopping-cart">
                    <h6>My cart</h6>
                    <hr>
                    <?php
                    $total=0;
                    if(isset($_SESSION['cart'])) {
                        $product = array_column($_SESSION['cart'], 'product_id');

                        while ($row = mysqli_fetch_assoc($result)) {
                            foreach ($product as $id) {
                                if ($row['id'] == $id) {
                                    dis($row['imge'], $row['product_nam'], $row['product_price'],$row['id']);
                                    $total=(int)$total+$row['product_price'];

                                }
                            }

                        }
                    }else{
                        echo "The cart is Empty ";
                    }

                    ?>

                </div>
            </div>
        <div class="col-md-4 offset-md-1 border rounded mt-5 bg-white h-25">
            <div class="pt-4">
                <h6>PRIC DETAAILS </h6>
                <hr>
                <div class="row ">
                <div class="col-md-6">
                    <?php
                     if(isset($_SESSION['cart'])){
                         $count=count($_SESSION['cart']);
                         echo "<h6> Price ($count item)   </h6>";

                     }else{
                         echo "<h6> Price (0 item)</h6>";
                     }
                    ?>

                    <h6>Delevary Charges </h6>
                    <hr>
                    <h6>Amount Payable</h6>


                      </div>
                <div class="col-md-6">
                    <h6>$<?php echo $total?></h6>
                    <h6 class="text-success">Free</h6>
                    <hr>
                    <h6>$<?php echo $total?></h6>
                </div>
             </div>
            </div>
         </div>

</div>
    </div>
</div>

</body>
<?php }else{
    header("Location: login.php");

} ?>
</html>

