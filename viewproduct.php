<?php
session_start();
if(isset($_SESSION['admin']) ||isset($_COOKIE['admin'])){

$conn = mysqli_connect("localhost", "root", "", "ec");
if (mysqli_connect_errno()) {
    echo "no connect";
} else {
    $qur = "select * from product ";



}
if(isset($_POST['s'])) {
    $qu = "delete from product where id=" . $_POST['s'];
   if( mysqli_query($conn, $qu)){
       echo "<script> alert('Succsess....')</script>";

   }

}
$result = mysqli_query($conn, $qur);


if(isset($_POST['save'])){
    $type=$_POST['select'];
    $qe='select name from category where id='.$type;
    $re=mysqli_query($conn,$qe);
    $e=mysqli_fetch_assoc($re);
   $er=$e['name'];
     $price=$_POST['price'];
    $names=$_POST['name'];
    $discount=$_POST['discount'];
    echo $discount;
    $Weight=$_POST['Weight'];
    $Expiration=$_POST['expir'];
    $id=$_POST['id'];
         $imge = $_FILES['file'];
    $img_tem = $_FILES['file']['tmp_name'];
    $name = $_FILES['file']['name'];
    $nameimge = "imge/". $name;
    move_uploaded_file($img_tem, 'C:\xampp\htdocs\project\shoping\imge\\' . $name);

    $qu = "update product set          gate_id='$type',  product_nam='$names', product_price='$price' ,  discount='$discount',Weight='$Weight',Expiration='$Expiration',product_type='$er', imge='$nameimge' where id='$id'";
    if( mysqli_query($conn, $qu)){
        header("Location: viewproduct.php");


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
    <link rel="stylesheet" href="fonts/fontawesome-all.min.css">

    <link rel="stylesheet" href="bootstrap/css/bootstrap.min2.css">

    <title>Document</title>
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

<div class="container   my-5" >

<div class="panel-body" >

    <table class="table table-striped table-bordered table-list" >
        <thead>
        <tr>
            <th><em class="fa fa-cog"></em></th>
            <th class="hidden-xs">ID</th>
            <th>Product type</th>

            <th>Product name</th>
            <th>Product price</th>
            <th> discount</th>

            <th>Weight </th>
            <th>Expire</th>
            <th>Imge</th>



        </tr>
        </thead>
        <?php

        while ($row = mysqli_fetch_assoc($result)) {


        ?>






        <tr>

        <tr>
            <td>
                <form method="POST">
                    <button type="button" name="edit" class="btn btn-defult but" value=<?php echo $row['id']?> data-toggle="modal" data-target="#exampleModal" id="but">
                        <i class="fas fa-pencil-alt" ></i></button>

                    <button type="submit" name="s" class="btn btn-danger" value=<?php echo $row['id']?>  >
                        <i class="fa fa-trash" ></i></button>


            </td>
            <?php
            echo "
                            <td class='hidden-xs' >" . $row['id'];
            echo "</td>";
            echo "<td >" . $row['product_type'];
            echo "</td>";
            echo "<td >" . $row['product_nam'];
            echo "</td>";
            echo "<td >" . $row['product_price'];
            echo "</td>";
            echo "<td >" . $row['discount'];
            echo "</td>";
            echo "<td >" . $row['Weight'];
            echo "</td>";
            echo "<td >" . $row['Expiration'];
            echo "</td>";
            echo "<td>"  ?>

                      <img src="<?php  echo $row['imge']?>" class="img-fluid w-25">

                <?php



            echo "</td>";


            echo "  </tr>
                        </tbody>
                        ";


            }

            ?>
    </table>


</div>

</div>
</div>

</div>


    </form>

</div>




<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="edi" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Updata</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container my-2">

                    <form method="post" enctype='multipart/form-data'>
                        <input hidden id="id" name="id">
                        <label> type</label>
                        <select class="form-control" name="select"   required id="type" >
                            <?php
                            $q = "select * from category";
                            $result=mysqli_query($conn,$q);
                            while ($row=mysqli_fetch_assoc($result)){

                                ?>

                                <option value=<?php echo $row['id']?>> <?php echo $row['name']?></option>

                                <?php
                            }

                            ?>
                        </select>
                        <div class="form-group">
                            <label> Name</label>
                            <input class="form-control" type="text" id="name" name="name" required >
                        </div>
                        <div class="form-group">
                            <label> discount</label>
                            <input class="form-control" type="text" id="discount" name="discount"  >
                        </div>


                        <div class="form-group">
                            <label> price</label>
                            <input class="form-control" type="text" id="price" name="price" required >
                        </div>
                        <div class="form-group">
                            <label >Weight</label>
                            <input class="form-control" type="text" id="weight" name="Weight" required>
                        </div>
                        <div class="form-group">
                            <label >Expiration</label>
                            <input class="form-control" type="text" id="expiration" name="expir" required>
                        </div>

                        <div class="form-group">
                            <label >insart-imge</label>
                            <input type="file" id="imge " name="file"  required ></div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" name="save">Save changes</button>
                </form>

            </div>
        </div>
    </div>
</div>



























<script src="js/jquery.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="js/theme.js"></script>

<script>

    $(document).ready(function () {
        $('.but').on('click',function () {
            $('#edi').modal('show');

            $tr=$(this).closest('tr');
            var data =$tr.children('td').map(function () {
                return $(this).text();


            }).get();
            $('#id').val(data[1]);
            $('#type').val(data[2]);

            $('#name').val(data[3]);
            $('#price').val(data[4]);
            $('#discount').val(data[5]);

            $('#weight').val(data[6]);

            $('#expiration').val(data[7]);
            $('#imge').val(data[8]);


        })

    })
</script>
</body>
<?php }else{
    header("Location: login.php");

}?>

</html>

