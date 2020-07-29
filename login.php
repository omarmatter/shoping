<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "ec");

if(!isset($_GET['action'])){
if(isset($_COOKIE['user'])) {
    header("Location: inde.php");
}
if(!isset($_GET['action'])){
    if(isset($_COOKIE['admin'])){
        header("Location: dashboard.php");
    }
}

}
$x=0;
if(isset($_POST['login'])) {

    $user = $_POST['user'];
    $pass = $_POST['pass'];
//$pass2=sha1($pass);
    $pass2=$pass;
    if (mysqli_connect_errno()) {
        echo "no connect";
    } else {


        $qu = "select * from admin";

        $result = mysqli_query($conn, $qu);
        while ($row = mysqli_fetch_assoc($result)) {

            if($row['name']==$user && $row['passwords']==$pass2) {
                if(isset($_POST['remember'])){
                    setcookie("admin", $user, time() + 3600);

                }
                $x=0;
                $_SESSION['admin']=$user;

                header("Location: dashboard.php");


            }else{
               $x=1;
            }
                $qu = "select * from usar";

                $res = mysqli_query($conn, $qu);
                while ($row = mysqli_fetch_assoc($res)) {
                    if ($row['name'] == $user && $row['passwords'] == $pass2) {
                        $x=0;
                        if(isset($_POST['remember'])){
                            setcookie("user", $user, time() + 3600);
                            $_SESSION['user']=$user;

                        }
                        $_SESSION['user']=$user;

                        header("Location: inde.php");



                }else{
                       $x=1;

                    }
                    }


            }
            if($x==1){
                echo "<script> alert('The acount not avalid')</script>";
            }

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
    <link rel="stylesheet" href="fonts/font-awesome.min.css">
    <link rel="stylesheet" href="css/login.css">
</head>

<body>
    <div class="container-fluid">
        <div class="row mh-100vh">
            <div class="col-10 col-sm-8 col-md-6 col-lg-6 offset-1 offset-sm-2 offset-md-3 offset-lg-0 align-self-center d-lg-flex align-items-lg-center align-self-lg-stretch bg-white p-5 rounded rounded-lg-0 my-5 my-lg-0" id="login-block">
                <div class="m-auto w-lg-75 w-xl-50">
                    <h2 class="text-info font-weight-light mb-5"><i class="fa fa-diamond"></i> &ensp;Login</h2>
                    <form method="post">
                        <div class="form-group"><label class="text-secondary">Username</label>
                            <input class="form-control" type="text" name="user"></div>
                        <div class="form-group"><label class="text-secondary" >Password</label>
                            <input class="form-control mb-2" type="password" required="" name="pass">
                            <input type="checkbox" name="remember"  " >Remember me
                        </div>

                        <button class="btn btn-info mt-2" type="submit" name="login">Log In</button></form>
                    <p class="mt-3 mb-0"><a class="text-info small" href="#">Forgot your email or password?</a></p>
                </div>
            </div>
            <div class="col-lg-6 d-flex align-items-end" id="bg-block" style="background-image:url('imge/t.jpg');background-size:cover;background-position:center center;">
                <p class="ml-auto small text-dark mb-2"><br></p>
            </div>
        </div>
    </div>
    <script src="js/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
</body>

</html>