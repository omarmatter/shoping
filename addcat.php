<?php
session_start();
if(isset($_SESSION['admin']) ||isset($_COOKIE['admin'])){
if(isset($_POST['submit'])) {
    $nameg = $_POST['name'];
    $disc = $_POST['descri'];

    $imge=$_FILES['file'];
    $img_tem=$_FILES['file']['tmp_name'];
    $name=$_FILES['file']['name'];
    $nameimge="imge/".$name;

    move_uploaded_file($img_tem,'C:\xampp\htdocs\project\shoping\imge\\'.$name);

    $conn = mysqli_connect("localhost", "root", "", "ec");
    if (mysqli_connect_errno()) {
        echo "no connect";
    } else {
        $query = "insert into category(name,description,imge)values('" . $nameg . "','" . $disc . "','" . $nameimge ."')";

        if( mysqli_query($conn, $query)){
            echo "<script> alert('Sucsses')</script>";
        }else{
            echo "<script> alert('Faild')</script>";

        }


    }
}
?>








<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>f</title>
    <link rel="stylesheet" href="fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min2.css">
    <link rel="stylesheet" href="css/select.css">
</head>

<body>
<div id="wrapper">
<nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0">
    <div class="container-fluid d-flex flex-column p-0">
        <a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="#">
            <div class="sidebar-brand-icon rotate-n-15"><i class="fas fa-laugh-wink"></i></div>
            <div class="sidebar-brand-text mx-3"><span>Brand</span></div>
        </a>
        <hr class="sidebar-divider my-0">
        <ul class="nav navbar-nav text-light" id="accordionSidebar">
            <li class="nav-item" role="presentation"><a class="nav-link active" href="dashboard.php"><i class="fas fa-tachometer-alt"></i><span>Dashboard</span></a></li>
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

<div class="container my-5 d-flex flex-column">

    <form method="post" enctype='multipart/form-data'>

        <div class="form-group">
            <label >Name</label>
            <input class="form-control" type="text"  name="name" required>
        </div>
        <div class="form-group">
            <label> description	</label>
            <input class="form-control" type="text" id="text-input" name="descri" required>
        </div>

        <div class="form-group">
            <label >insart-imge</label>
            <input type="file" id="file-input" name="file"  required ></div>
        <div class="form-group"><button class="btn btn-primary" type="submit" name="submit">Add</button>
        </div>
    </form>
</div>
</div>
<script src="js/jquery.min.js"></script>
<script src="js/theme.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
</body>
<?php }else{
    header("Location: login.php");

}?>
</html>