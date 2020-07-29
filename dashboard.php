<?php
session_start();
if(isset($_SESSION['admin']) ||isset($_COOKIE['admin'])){

$conn = mysqli_connect("localhost", "root", "", "ec");
if (mysqli_connect_errno()) {
    echo "no connect";
} else {


    $result = $conn->query("SELECT COUNT(*) FROM category");
    $row = $result->fetch_row();
    $results = $conn->query("SELECT COUNT(*) FROM product");
    $rows = $results->fetch_row();
}

?>













<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Dashboard - Brand</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min2.css">

</head>

<body id="page-top">
<div id="wrapper" >
    <nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0">
        <div class="container-fluid d-flex flex-column p-0">
            <a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="#">
                <div class="sidebar-brand-icon rotate-n-15"><i class="fas fa-laugh-wink"></i></div>
                <div class="sidebar-brand-text mx-3"><span>Brand</span></div>
            </a>
            <hr class="sidebar-divider my-0">
            <ul class="nav navbar-nav text-light" id="accordionSidebar">
                <li class="nav-item" role="presentation"><a class=" nav-link active" href="dashboard.php"><i class="fas fa-tachometer-alt"></i><span>Dashboard</span></a></li>
                <li class="nav-item" role="presentation"><a class="nav-link" href="addcat.php"><i class="fa fa-plus-circle"></i><span>Add category</span></a></li>
                <li class="nav-item" role="presentation"><a class="nav-link" href="viewcat.php"><i class="fas fa-eye"></i><span>View category</span></a></li>
                <li class="nav-item" role="presentation"><a class="nav-link" href="insert.php"><i class="fas fa-plus-circle"></i><span>Add Product</span></a></li>
                <li class="nav-item" role="presentation"><a class="nav-link" href="viewproduct.php"><i class="fas fa-eye"></i><span>View Product</span></a></li>

                <li class="nav-item" role="presentation"><a class="nav-link" href="logout.php"><i class="fa fa-sign-out-alt"></i><span>Logout</span></a></li>
                <li class="nav-item" role="presentation"></li>

            </ul>
            <div class="text-center d-none d-md-inline"><button class="btn rounded-circle border-0" id="sidebarToggle" type="button"></button></div>
        </div>
    </nav>

    <div class="d-flex flex-column my-5" id="content-wrapper">
        <div id="content">
            <div class="container-fluid">
                <div class="d-sm-flex justify-content-between align-items-center mb-4">
                    <h3 class="text-dark mb-0">Dashboard</h3>
                </div>
                <div class="row">
                    <div class="col-md-6  mb-4">
                        <div class="card shadow border-left-primary py-2">
                            <div class="card-body">
                                <div class="row align-items-center no-gutters">
                                    <div class="col mr-2">
                                        <div class="text-uppercase text-primary font-weight-bold text-xs mb-1"><span>Catogery</span></div>
                                        <div class="text-dark font-weight-bold h5 mb-0"><span> <?php echo $row[0]?></span></div>
                                    </div>
                                    <div class="col-auto"><i class="fas fa-calendar fa-2x text-gray-300"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6  mb-4">
                        <div class="card shadow border-left-success py-2">
                            <div class="card-body">
                                <div class="row align-items-center no-gutters">
                                    <div class="col mr-2">
                                        <div class="text-uppercase text-success font-weight-bold text-xs mb-1"><span>Product</span></div>
                                        <div class="text-dark font-weight-bold h5 mb-0"><span><?php echo $rows[0]?></span></div>
                                    </div>
                                    <div class="col-auto"><i class="fas  fa-shopping-basket fa-2x text-gray-300"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <footer class="bg-white sticky-footer">
            <div class="container my-auto">
                <div class="text-center my-auto copyright"><span>Copyright © Omar matter  2020</span></div>
            </div>
        </footer>
    </div>
</div>
<script src="js/jquery.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="js/theme.js"></script>
</body>
<?php }else{
    header("Location: login.php");

} ?>
</html>